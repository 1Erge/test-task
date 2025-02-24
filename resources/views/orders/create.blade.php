@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать заказ</h1>
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">Пользователь</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Продукт</label>
                <select name="product_id" id="product_id" class="form-control" required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Количество</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Комментарий</label>
                <textarea name="comment" id="comment" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Создать</button>
        </form>
    </div>
@endsection
