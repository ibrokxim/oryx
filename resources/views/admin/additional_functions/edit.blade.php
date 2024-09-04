@php
    $title = 'Редактировать дополнительную функцию';
@endphp
@extends('layouts.admin')
@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ route('additional-functions.update', $additionalFunction->id) }}">
        @csrf
        @method('PUT') <!-- Используйте метод PUT для обновления -->

        <div class="content-wrap">
            <div class="buttons-top">
                <button type="submit" class="save">  <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.26764 0.490234H13.0988L15.7858 3.25151V14.0084C15.7858 14.8379 15.1133 15.5104 14.2838 15.5104H2.26764C1.4381 15.5104 0.765625 14.8379 0.765625 14.0084V1.99225C0.765625 1.16271 1.4381 0.490234 2.26764 0.490234ZM12.0301 1.99243V6.49848H4.51998V1.99243H2.26696V14.0085H3.76897V8.00049H12.7811V14.0085H14.2831V3.86188L12.464 1.99243H12.0301ZM6.02202 4.99646V1.99243H10.5281V4.99646H6.02202ZM5.27135 9.50256V14.0086H11.2794V9.50256H5.27135ZM9.77776 2.7431H8.27575V4.24511H9.77776V2.7431Z" fill="white"/></svg>Сохранить</button>
                <a class="go-back" href="{{ route('additional-functions.index') }}"> <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.734375 7.99988L9.49987 15.6697V11.2264C12.258 10.9323 14.5383 11.7168 16.4106 13.5891L17.8332 15.0117V12.9999C17.8332 7.7786 14.9571 4.94273 9.49987 4.68574V0.330078L0.734375 7.99988ZM3.26537 7.9999L7.83322 4.00304V6.33323H8.66655C13.0004 6.33323 15.3753 7.87575 15.9988 11.097C13.8795 9.67865 11.375 9.20365 8.52955 9.6779L7.83322 9.79396V11.9968L3.26537 7.9999Z" fill="white"/></svg>Назад</a>
            </div>
            <div class="content content-inner">
                <div class="profiles">
                    <div class="flex flex-wrap between align-center">
                        <div class="prof-head">{{ $title }}</div>
                    </div>

                    <div class="prof-inputs flex flex-wrap">
                        <div class="new-flex w-two">
                            <p class="input-name">Название</p>
                            <input type="text" name="name" class="input-withid" value="{{ $additionalFunction->name }}" placeholder="Введите название" />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="new-flex w-two">
                            <p class="input-name">Текст</p>
                            <textarea name="text" style="width: 585px; height: 150px" class="input-withid" placeholder="Введите текст при отображении">{{ $additionalFunction->text }}</textarea>
                            @error('text')
                            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
                            @enderror
                        </div>
                        <div class="new-flex w-two">
                            <p class="input-name">Цена</p>
                            <input type="text" name="price" class="input-withid" value="{{ $additionalFunction->price }}" placeholder="Введите цену" />
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        $(function(){
            $("#referal").autocomplete({
                source: "{{ route('ajax.user') }}",
                minLength: 1,
                select: function( event, ui ) {
                    $('#ref_id').val(ui.item.user);
                }
            });
        });
    </script>
@endsection
