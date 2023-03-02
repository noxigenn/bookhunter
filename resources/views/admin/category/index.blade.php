@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Категории</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Наименование</th>
                        <th>Описание</th>
                        <th>Изображение</th>
                        <th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="{{ asset('assets/uploads/category/' . $item->image) }}"
                                    alt="изображение для категории" class="cate-image">
                            </td>
                            <td>
                                <a href="{{url('edit-prod/'.$item->id)}}" class="btn btn-primary">Редактировать</a>
                                <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
