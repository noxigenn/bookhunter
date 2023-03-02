@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Товары</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Категория</th>
                        <th>Наименование</th>
                        <th>Автор</th>
                        <th>Цена</th>
                        <th>Цена со скидкой</th>
                        <th>Изображение</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->author }}</td>
                            <td>{{ $item->original_price}}</td>
                            <td>{{ $item->selling_price}}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/products/' . $item->image) }}"
                                    alt="изображение для категории" class="cate-image">
                            </td>
                            <td>
                                <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary btn-sm">Редактировать</a>
                                <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
