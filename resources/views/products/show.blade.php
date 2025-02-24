@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <h1>Просмотр товара</h1>

    <table class="table table-bordered">
        <tr>
            <th>Номер</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Название</th>
            <td>{{ $product->name }}</td>
        </tr>
        <tr>
            <th>Цена</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>Категория</th>
            <td>{{ $product->category->title }}</td>
        </tr>
        <tr>
            <th>Описание</th>
            <td>{{ $product->description }}</td>
        </tr>
    </table>

    <a href="{{ route('products.index') }}" class="btn btn-secondary">Обратно к списку</a>
@endsection
