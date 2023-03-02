@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Редактировать категорию</h4>
        </div>
        <div class="card-body">
            <form  enctype="multipart/form-data" action="{{ url('update-category/'.$category->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Наименование</label>
                        <input type="text" value="{{$category->name}}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$category->slug}}"  class="form-control" name="slug">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Описание</label>
                        <textarea name="description" rows="3" class="form-control">{{$category->description}} </textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Статус</label>
                        <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}}  name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Популярность</label>
                        <input type="checkbox" {{$category->popular == '1' ? 'checked' : ''}} name="popular">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" value="{{$category->meta_title}}"   name="meta_title" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$category->meta_keywords}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_descrip" rows="3" class="form-control">{{$category->meta_descrip}}</textarea>
                    </div>
                    @if ($category->image)
                         <img src="{{asset('assets/uploads/category/'.$category->image)}}" alt="Изображение категории">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Редактировать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
