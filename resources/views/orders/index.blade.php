@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Список заказов</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Добавить заказ</a>
        <table class="table">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Пользователь</th>
                <th>Продукт</th>
                <th>Цена товара</th>
                <th>Количество</th>
                <th>Сумма</th>
                <th>Статус</th>
                <th>Дата заказа</th>
                <th>Комментарий</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name.' '. $order->user->surname. ' '. $order->user->patronymic  }}</td>
                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->product->price }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ __('order.status.' . $order->getStatusAttribute()) }}</td>
                    <td>{{ $order->created_at}}</td>
                    <td>{{ $order->comment ?? '-' }}</td>
                    <td>
                        @if($order->status === 'new')
                            <form action="{{ route('orders.complete', $order) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-sm">Готово</button>
                            </form>
                        @endif
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить заказ?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
