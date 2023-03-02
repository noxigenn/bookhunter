@extends('layouts.front')

@section('title', $products->name)


@section('content')

    <div class="py-3 mb-4 shadow-sm bg-success border-top">
        <div class="container">
           <h6 class="mb-0">
            <a href="{{url('category')}}">
                Категории
            </a> /
            <a href="{{url('category/'.$products->category->slug)}}">
                {{$products->category->name}}
            </a> /
            <a href="{{url('category/'.$products->category->slug.'/'.$products->slug)}}">
                {{$products->name}}
            </a>
           </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label for="" style="font-size: 16px"
                                    class="float-end badge bg-danger trending_tag">Бестселлер</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Обычная цена: <s>&#8381 {{ $products->original_price }}</s></label>
                        <label class="fw-bold">Цена со скидкой: &#8381 {{ $products->selling_price }}</label>
                        <p class="mt-3">
                            {{ $products->small_description }}
                        </p>
                        <hr>
                        @if ($products->qty > 0)
                            <label for="" class="badge bg-success">В наличии</label>
                        @else
                            <label for="" class="badge bg-danger">Нет в наличии</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">

                                <label for="Quantity">Количество</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-button">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control qty-input text-center">
                                    <button class="input-group-text increment-button">+</button>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-9">
                            <br>
                            <button type="button" class="btn btn-primary addToCartBtn me-3 float-start">Добавить в Корзину
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-success  me-3 float-start">Добавить в Желаемое <i
                                    class="fa fa-heart" aria-hidden="true"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Описание</h3>
                <p class="mt-3">
                    {!! $products->description !!}
                </p>
            </div>
        </div>
    </div>

@endsection



@section('scripts')
    <script>
        
        $(document).ready(function() {

           

            $('.addToCartBtn').click(function(e) {
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $.ajax({
                    method: 'POST',
                    url: "{{url('/add-to-cart')}}",
                    data: {
                        'product_id': product_id,
                        'product_qty': product_qty,
                    },

                    success: function(response) {
                        swal(response.status);
                    }

                });
                
            });


            $('.increment-button').click(function(e) {
                e.preventDefault();

                var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? '0' : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
            });
            $('.decrement-button').click(function(e) {
                e.preventDefault();

                var dec_value = $(this).closest('.product_data').find('.qty-input').val();

                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? '0' : value;
                if (value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);

                }
            });

        });
    </script>
@endsection
