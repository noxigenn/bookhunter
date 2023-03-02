@extends('layouts.admin')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <div class="card">
        <div class="card-header">
            <h4>Редактировать товар</h4>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" action="{{ url('update-product/'.$products->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" >
                            <option value="">{{$products->category->name}}</option>
                        
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Наименование</label>
                        <input type="text" class="form-control" value="{{$products->name}}" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Автор</label>
                        <input type="text" class="form-control" value="{{$products->author}}" name="author">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{$products->slug}}" class="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Краткое описание</label>
                        <input type="text" class="form-control" name="small_description" value="{{$products->small_description}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Описание</label>
                        <textarea name="description" rows="3" class="form-control">{{$products->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Цена</label>
                        <input type="number" class="form-control" name="original_price" value="{{$products->original_price}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Цена со скидкой</label>
                        <input type="number" class="form-control" name="selling_price" value="{{$products->selling_price}}">
                    </div>
                    
                    @if ($products->image)
                        <img src="{{asset('assets/uploads/products/'.$products->image)}}" alt="">
                    @endif
                    <div class="col-md-12 mb-3">
                        <label for="">Количество</label>
                        <input type="number" class="form-control" name="qty" value="{{$products->qty}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Статус</label>
                        <input type="checkbox" name="status" {{$products->status == '1' ? 'checked' : ''}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Популярность</label>
                        <input type="checkbox" name="trending" {{$products->trending == '1' ? 'checked' : ''}}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{$products->meta_title}}">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$products->meta_keywords}}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$products->meta_description}}</textarea>
                    </div>

                  
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
