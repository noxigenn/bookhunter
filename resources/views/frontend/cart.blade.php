@extends('layouts.front')

@section('title')
    Моя корзина
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Главная
                </a> /
                <a href="{{ url('cart') }}">
                    Корзина
                </a>

            </h6>
        </div>
    </div>
    <div class="container my-5">
        <div class="card shadow">
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cartitems as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" height="150px"
                                width="100px" alt="Изображение товара">
                        </div>

                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>

                        <div class="col-md-2 my-auto">
                            <h6>{{ $item->products->selling_price }} &#8381</h6>
                        </div>

                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            <label for="Quantity">Количество</label>
                            <div class="input-group text-center mb-3" style="width:130px;">
                                <button class="input-group-text changeQuantity decrement">-</button>
                                <input type="text" name="quantity" class="form-control qty-input text-center"
                                    value="{{ $item->prod_qty }}">
                                <button class="input-group-text changeQuantity increment">+</button>

                            </div>
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart-item">
                                Удалить
                                <i class="fa fa-trash" aria-hidden="true"></i>

                            </button>
                        </div>
                    </div>
                    @php
                        $total += $item->products->selling_price * $item->prod_qty;
                    @endphp
                    <hr>
                @endforeach

            </div>
            <div class="card-footer ">
                <h6>Итоговая цена: {{ $total }} &#8381
                    <button class="btn btn-outline-success float-end">Перейти к покупке</button>
                </h6>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



            $('.increment').click(function(e) {
                e.preventDefault();

                var inc_value = $(this).closest('.product_data').find('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? '0' : value;
                if (value < 10) {
                    value++;
                    $(this).closest('.product_data').find('.qty-input').val(value);
                }
            });
            $('.decrement').click(function(e) {
                e.preventDefault();

                var dec_value = $(this).closest('.product_data').find('.qty-input').val();

                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? '0' : value;
                if (value > 1) {
                    value--;
                    $(this).closest('.product_data').find('.qty-input').val(value);

                }
            });

            $('.delete-cart-item').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var prod_id = $(this).closest('.product_data').find('.prod_id').val();

                $.ajax({
                    method: "POST",
                    url: "delete-cart-item",
                    data: {
                        'prod_id': prod_id,
                    },
                    success: function(response) {
                        window.location.reload();
                        swal("", response.status, "success");
                    }
                });
            });


            $('.changeQuantity').click(function(e) {
                e.preventDefault();
                var prod_id = $(this).closest('.product_data').find('.prod_id').val();
                var qty = $(this).closest('.product_data').find('.qty-input').val();

                data = {
                    'prod_id': prod_id,
                    'prod_qty': qty,
                }
                $.ajax({
                    method: "POST",
                    url: "update-cart",
                    data: data,
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
