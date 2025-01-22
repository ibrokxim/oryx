@extends('layouts.admin')
@section('content')

    <div class="content-wrap">
        <div class="content">
            <div class="content-top">
                <div class="content-head_wrap">
                    <div class="content-head">
                        Загрузить EXCEL
                    </div>
                    <div class="content-text">
                        Загрузить посылки из excel документа и объеденить с текущей базой посылок
                    </div>
                </div>
                <div class="buttons-top">
                    <form action="{{ route('parcels.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="display: inline-block">
                            <label>Выберите файл: <input type="file" name="excel_file" accept=".xlsx, .xls, .csv"></label>
                            <button type="submit">Загрузить</button>
                        </div>
                    </form>
                </div>
                <div class="buttons-top">
                    <a class="go-back" href="{{route('parcels.index')}}">Назад</a>
                </div>
            </div>

            <div class="matched">
                @foreach (['Совпавшие посылки','Частичное совпадение','Не совпавшие посылки'] as $key=>$name)
                    <a class="{{ request()->input('t',0)==$key? 'active' : '' }}" href="{{route('parcels.excel',['id'=>$id,'t'=>$key])}}">{{ $name }} ({{ count(${'items'.$key}) }})</a>
                @endforeach
            </div>
            <form action="{{route('parcels.replaces',$id)}}" method="POST">
                @csrf
                <table class="table tablebordered">
                    <thead>
                    <tr>
                        <td class="checks">
                            <div class="check-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox" id="ch-all">
                                    <label class="custom-control-label" for="ch-all"></label>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="select-delete">
                                <p class="selected">Выбранo: <span class="count-delete">0</span></p>
                                <button type="submit" class="del">Обновить</button>
                            </div>
                        </td>
                        <td><p class="table-items">Трек номер</p></td>
                        <td><p class="table-items">Получатель</p></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(${'items'.request()->input('t',0)} as $item)
                        <tr>
                            <td class="checks">
                                <div class="default-checkbox">
                                    <input type="checkbox" class="custom-control-input checkbox" id="ch-only-{{$item->id}}" name="id[]" value="{{$item->id}}">
                                    <label class="custom-control-label" for="ch-only-{{$item->id}}"></label>
                                </div>
                            </td>
                            <td>#{{$item->id}}</td>
                            <td>
                                @if ($t==1)
                                    <div class="t-group">
                                        <p class="track">{{ $item->track }} <span>(частичное совпадение)</span></p>
                                        <div class="yellow-track">
                                            @foreach ($tracks_full as $key=>$track)
                                                @if (strpos((string)$item->track, (string)$tracks6[$key]) !== false)
                                                    <input type="hidden" name="r[{{$item->id}}]" value="{{$track[0]}}">
                                                    @if ($item->id)
                                                        <input type="hidden" name="status[{{$item->id}}]" value="{{ $track[4] ?? '' }}">
                                                        <input type="hidden" name="user_id[{{$item->id}}]" value="{{ $track[1] ?? '' }}">
                                                        <input type="hidden" name="weight[{{$item->id}}]" value="{{ $track[2] ?? '' }}">
                                                        <input type="hidden" name="date_out[{{$item->id}}]" value="{{ $track[3] ?? '' }}">
                                                        <input type="hidden" name="integration_id[{{$item->id}}]" value="{{ $track[5] ?? '' }}">
                                                        <input type="hidden" name="name[{{$item->id}}]" value="{{ $track[6] ?? '' }}">
                                                        <input type="hidden" name="prod_price[{{$item->id}}]" value="{{ $track[7] ?? '' }}">
                                                        <input type="hidden" name="city[{{$item->id}}]" value="{{ $track[8] ?? '' }}">
                                                    @endif
                                                    <p class="yellow">{{ $track[0] }}</p>
                                                    <a href="{{route('parcels.replace',[
                                                'id'=>$id,
                                                'pid'=>$item->id,
                                                'status'=>$track[4] ?? '',
                                                'user_id'=>$track[1] ?? '',
                                                'weight'=>$track[2] ?? '',
                                                'date_out'=>$track[3] ?? '',
                                                'integration_id'=>$track[5] ?? '',
                                                'name'=>$track[6] ?? '',
                                                'prod_price'=>$track[7] ?? '',
                                                'city'=>$track[8] ?? ''
                                                ])}}" class="ex-buttons">Заменить</a>
                                                    |
                                                    @if (isset(__('ui.status')[$item->status]) && __('ui.status')[$item->status] == ($track[4] ?? ''))
                                                        Обновлен
                                                    @else
                                                        <a href="{{route('parcels.replace',[
                                                    'id'=>$id,
                                                    'pid'=>$item->id,
                                                    'status'=>$track[4] ?? '',
                                                    'user_id'=>$track[1] ?? '',
                                                    'weight'=>$track[2] ?? '',
                                                    'date_out'=>$track[3] ?? '',
                                                    'integration_id'=>$track[5] ?? '',
                                                    'name'=>$track[6] ?? '',
                                                    'prod_price'=>$track[7] ?? '',
                                                    'city'=>$track[8] ?? ''
                                                    ])}}" class="ex-buttons">Обновить статус</a>
                                                        &nbsp; {{ __('ui.status')[$item->status] ?? 'Неизвестный статус' }} -> {{ $track[4] ?? '' }}
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @elseif($t==2)
                                    <div class="t-group">
                                        <p class="track">{{ $item->track }} <span>(отсутствует)</span></p>
                                        <p class="track"><a href="{{ route('parcels.create',['t'=>$item->track]) }}" class="ex-buttons" target="_blank">Создать</a></p>
                                    </div>
                                @else
                                    <div class="t-group">
                                        <p class="track">{{ $item->track }} <span>(полное совпадение)</span></p>
                                        <div class="yellow-track">
                                            @foreach ($tracks_full as $track)
                                                @if (strpos((string)$item->track, (string)$track[0]) !== false)
                                                    @if ($item->id)
                                                        <input type="hidden" name="status[{{$item->id}}]" value="{{ $track[4] ?? '' }}">
                                                        <input type="hidden" name="user_id[{{$item->id}}]" value="{{ $track[1] ?? '' }}">
                                                        <input type="hidden" name="weight[{{$item->id}}]" value="{{ $track[2] ?? '' }}">
                                                        <input type="hidden" name="date_out[{{$item->id}}]" value="{{ $track[3] ?? '' }}">
                                                        <input type="hidden" name="integration_id[{{$item->id}}]" value="{{ $track[5] ?? '' }}">
                                                        <input type="hidden" name="name[{{$item->id}}]" value="{{ $track[6] ?? '' }}">
                                                        <input type="hidden" name="prod_price[{{$item->id}}]" value="{{ $track[7] ?? '' }}">
                                                        <input type="hidden" name="city[{{$item->id}}]" value="{{ $track[8] ?? '' }}">
                                                    @endif
                                                    @if (isset(__('ui.status')[$item->status]) && __('ui.status')[$item->status] == ($track[4] ?? ''))
                                                        Обновлен
                                                    @else
                                                        <a href="{{route('parcels.replace',[
                                                'id'=>$id,
                                                'pid'=>$item->id,
                                                'status'=>$track[4] ?? '',
                                                'user_id'=>$track[1] ?? '',
                                                'weight'=>$track[2] ?? '',
                                                'date_out'=>$track[3] ?? '',
                                                'integration_id'=>$track[5] ?? '',
                                                'name'=>$track[6] ?? '',
                                                'prod_price'=>$track[7] ?? '',
                                                'city'=>$track[8] ?? ''
                                                ])}}" class="ex-buttons">Обновить статус</a>
                                                        &nbsp; {{ __('ui.status')[$item->status] ?? 'Неизвестный статус' }} -> {{ $track[4] ?? '' }}
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td>{{ $item->recipient->surname ?? '' }} {{ $item->recipient->name ?? '' }} {{ $item->recipient->fname ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

    <script>
        $(function(){
            $('#ch-all').change(function () {
                if($(this).is(':checked')){
                    $('tbody .checks .checkbox').prop('checked',true);
                }else{
                    $('tbody .checks .checkbox').prop('checked',false);
                }
                $('.count-delete').html($('tbody .checks .checkbox:checked').length);
            });

            $('tbody .checks .checkbox').change(function () {
                if($('tbody .checks .checkbox').length == $('tbody .checks .checkbox:checked').length)
                    $('#ch-all').prop('checked',true);
                else
                    $('#ch-all').prop('checked',false);
                $('.count-delete').html($('tbody .checks .checkbox:checked').length);
            });

            $('button.delete').click(function(){
                $('#ch-only-'+$(this).data('id')).prop('checked',true);
                $(this).parents('form').submit();
            });

            $('.buttons-top3 a').click(function(e){
                e.preventDefault();
                $(this).next().click();
            });

            $(".buttons-top3 [name=file]").change(function () {
                $(this).next().click();
            });
        });
    </script>
@endsection
