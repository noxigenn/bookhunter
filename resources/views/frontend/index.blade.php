@extends('layouts.front')

@section('title')
    Добро пожаловать в магазин "Бук Хантер"
@endsection

@section('content')
    @include('layouts.inc.slider')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Популярные категории</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{ url('view-category/' . $tcategory->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/' . $tcategory->image) }}"
                                        alt="Обложка для категории">
                                    <div class="card-body">
                                        <h5> {{ $tcategory->name }}</h5>
                                        <p>
                                            {{ $tcategory->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Популярные книги</h2>
                <div class="owl-carousel featured-carousel owl-theme">

                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <a href="{{ url('category/' . $prod->category->name . '/' . $prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Обложка книги">
                                    <div class="card-body">

                                        <h6> {{ $prod->name }}</h6>

                                        <span class="float-start">{{ $prod->selling_price }} &#8381</span>
                                        <span class="float-end"> <s> {{ $prod->original_price }} &#8381</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Ассортимент</h2>
                <div class="owl-carousel featured-carousel">
                    @foreach ($all_books as $prod)
                        <div class="item">
                            <a href="{{ url('category/' . $prod->category->name . '/' . $prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="Обложка книги">
                                    <div class="card-body">

                                        <h6> {{ $prod->name }}</h6>

                                        <span class="float-start">{{ $prod->selling_price }} &#8381</span>
                                        <span class="float-end"> <s> {{ $prod->original_price }} &#8381</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <footer class="text-center text-white" style="background-color: #f1f1f1;">
        <!-- Grid container -->
        <div class="container pt-4">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              > <i class="fa fa-vk" aria-hidden="true"></i></a>
      
            <!-- Twitter -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fa fa-telegram" aria-hidden="true"></i></a>
      
            <!-- Google -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
      
            <!-- Instagram -->
            <a
              class="btn btn-link btn-floating btn-lg text-dark m-1"
              href="#!"
              role="button"
              data-mdb-ripple-color="dark"
              ><i class="fa fa-youtube" aria-hidden="true"></i></a>
      
            
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
      </footer>
    
@endsection









@section('scripts')
    <script>
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
       
    </script>
@endsection
