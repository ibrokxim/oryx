@extends('layouts.admin')

@section('header')
    <div class="header header-users" style="top: 0">
        <div class="inner">
            <a href="/" class="logo"><img src="{{ asset('admin/images/logoadmin.png') }}"></a>
            <div class="cms">CMS</div>
        </div>
        <div class="content-head_wrap">
            <div class="search">
            <form action="{{ route('transactions.index') }}" method="GET">
                <div class="search-group">
                    <input type="text" value="{{ request('s') }}" name="s" placeholder="ID Пользователя или трек" class="input-search" />
                    <input type="text" value="{{ request('track') }}" name="track" placeholder="Трек" class="input-search" />
                    <input type="text" value="{{ request('amount') }}" name="amount" placeholder="Сумма оплаты" class="input-search" />
                    <button class="button-search" type="submit">
                        <svg width="16" height="15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.4137 9.22526H10.7554L10.5221 9.00026C11.3387 8.05026 11.8304 6.81693 11.8304 5.47526C11.8304 2.48359 9.4054 0.0585938 6.41374 0.0585938C3.42207 0.0585938 0.99707 2.48359 0.99707 5.47526C0.99707 8.46693 3.42207 10.8919 6.41374 10.8919C7.7554 10.8919 8.98874 10.4003 9.93874 9.58359L10.1637 9.81693V10.4753L14.3304 14.6336L15.5721 13.3919L11.4137 9.22526ZM6.41374 9.22526C4.33874 9.22526 2.66374 7.55026 2.66374 5.47526C2.66374 3.40026 4.33874 1.72526 6.41374 1.72526C8.48874 1.72526 10.1637 3.40026 10.1637 5.47526C10.1637 7.55026 8.48874 9.22526 6.41374 9.22526Z" fill="#333333"/></svg>
                    </button>
                </div>
            </form>
            </div>
        </div>

    </div>
@endsection

@section('content')
    <div class="content-wrap">
        <div class="content">
            <div class="content-top">
                <div class="content-head_wrap">
                        <form action="{{ route('transactions.index') }}" method="GET">
                                <input type="text" value="{{ request('s') }}" name="s" placeholder="ID Пользователя или трек" />
                                <input type="text" value="{{ request('track') }}" name="track" placeholder="Трек"  />
                                <input type="text" value="{{ request('amount') }}" name="amount" placeholder="Сумма оплаты"  />
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                     fill="none">
                                    <path
                                        d="M19.0002 19.0002L14.6572 14.6572M14.6572 14.6572C15.4001 13.9143 15.9894 13.0324 16.3914 12.0618C16.7935 11.0911 17.0004 10.0508 17.0004 9.00021C17.0004 7.9496 16.7935 6.90929 16.3914 5.93866C15.9894 4.96803 15.4001 4.08609 14.6572 3.34321C13.9143 2.60032 13.0324 2.01103 12.0618 1.60898C11.0911 1.20693 10.0508 1 9.00021 1C7.9496 1 6.90929 1.20693 5.93866 1.60898C4.96803 2.01103 4.08609 2.60032 3.34321 3.34321C1.84288 4.84354 1 6.87842 1 9.00021C1 11.122 1.84288 13.1569 3.34321 14.6572C4.84354 16.1575 6.87842 17.0004 9.00021 17.0004C11.122 17.0004 13.1569 16.1575 14.6572 14.6572Z"
                                        stroke="#E84438" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <button type="reset" id="reset-button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                     fill="none">
                                    <path
                                        d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"
                                        fill="#E84438"/>
                                </svg>
                            </button>

                        </form>
                    <div class="content-head">
                        Транзакции
                    </div>
                    <div class="content-text">
                        Список проведенных транзакций
                    </div>
                </div>

                <div class="buttons-top">
                    <form id="transaction-filter">
                        <input type="hidden" name="s" value="{{ request('s') }}">
                        <div style="display: inline-block;">
                            <label>Тип транзакции:
                                <select name="tab" id="transaction-tab">
                                    <option value="replenishment" {{ $tab === 'replenishment' ? 'selected' : '' }}>Пополнение баланса</option>
                                    <option value="payments" {{ $tab === 'payments' ? 'selected' : '' }}>Оплата заказов</option>
                                </select>
                            </label>

                        </div>

                        <div style="display: inline-block; margin-left: 20px;">
                            <label>c <input type="date" name="ds" value="{{ request('ds') }}"></label>
                            <label>по <input type="date" name="de" value="{{ request('de') }}"></label>
                        </div>
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </form>
                </div>
            </div>

            <form action="{{ route('parcels.delete') }}" method="POST">
                @csrf
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID платежа</th>
                        <th>Код банка</th>
                        <th>Пользователь</th>
                        <th>Трек</th>
                        <th>Дата</th>
                        <th>Сумма USD</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->order }}</td>
                            <td>
                                @can('users')
                                    <a href="{{ route('users.edit', $item->user_id) }}">{{ $item->user_id }}</a>
                                @else
                                    {{ $item->user_id }}
                                @endcan
                            </td>
                            <td>{{ $item->parcel->track ?? '' }}</td>
                            <td>{{ $item->created_at->format('d.m.Y') }}</td>
                            <td>{{ $item->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </form>

            {{ $items->links() }}
        </div>
    </div>

    <script>
        document.getElementById('transaction-tab').addEventListener('change', function () {
            document.getElementById('transaction-filter').submit();
        });
    </script>
@endsection
