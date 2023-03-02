@extends('layouts.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-success borer-top">
    <div class="container">
        <h6 class="mb-0">Главная / {{$category->name}}</h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $prod)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{url('category/'.$category->slug.'/'.$prod->slug)}}">
                            <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Обложка книги" class="w-100">
                            <div class="card-body">
                                <h5> {{ $prod->name }}</h5>
                                <span class="float-start">{{ $prod->selling_price }} &#8381</span>
                                <span class="float-end"> <s> {{ $prod->original_price }} &#8381</s></span>
                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
