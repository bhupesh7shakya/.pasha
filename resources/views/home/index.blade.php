@extends('home.layouts.app')
@section('home-content')
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-interval="10000" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($data['sliders'] as $slider)
                <div class="carousel-item
            @if ($loop->first) active @endif
                ">
                    <img src="{{ url('/storage/images/' . $slider->image) }}" class="d-block w-100" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="headline text-center mb-5">
                    <h2 class="pb-3 position-relative d-inline-block">
                        Category
                    </h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            @foreach ($data['category'] as $c)
            <div class="col-xs-6 col-sm-2 col-sm-4  col-lg-2 my-1">
                <a href="{{route('search-result')."?category=".$c->id}}" class="card card-link card-link-pop d-flex" style="height: 100%">
                  <div class="card-body text-center fs-6 text-uppercase align-items-center d-flex justify-content-center tracking-tight antialiased">{{$c->name}}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="headline text-center mb-5">
                    <h2 class="pb-3 position-relative d-inline-block">
                        New Arrivals
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($data['new_arrivals'] as $na)
                <div class="col-sm-6 col-lg-4">
                    <a href="{{route('product',$na->id)}}" class="d-block text-center mb-4">
                        <div class="product-list">
                            <div class="product-image position-relative">
                                <span class="sale">New</span>
                                <img src="{{ url('storage/images/' . $na->img_url_first) }}" alt="products"
                                    class="img-fluid product-image-first">
                                <img src="{{ url('storage/images/' . $na->img_url_second) }}" alt="products"
                                    class="img-fluid product-image-secondary">
                            </div>
                            <div class="product-name pt-3">
                                <h3 class="text-capitalize">{{ $na->name }}</h3>
                                <p class="mb-0 amount">Nrs {{ $na->price }}</p>
                                {{-- <div class="py-1">
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div> --}}
                                <button type="button" class="Add-to-cart">SHOP NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12">
                <div class="headline text-center mb-5">
                    <h2 class="pb-3 position-relative d-inline-block">
                        FEATURED PRODUCTS
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($data['featured_products'] as $fp)
                <div class="col-sm-6 col-lg-4">
                    <a href="{{route('product',$na->id)}}" class="d-block text-center mb-4">
                        <div class="product-list">
                            <div class="product-image position-relative">
                                <span class="sale">sale</span>
                                <img src="{{ url('storage/images/' . $fp->product->img_url_first) }}" alt="products"
                                    class="img-fluid product-image-first">
                                <img src="{{ url('storage/images/' . $fp->product->img_url_second) }}" alt="products"
                                    class="img-fluid product-image-secondary">
                            </div>
                            <div class="product-name pt-3">
                                <h3 class="text-capitalize">{{ $fp->product->name }}</h3>
                                <p class="mb-0 amount">Nrs {{ $fp->product->price }}</p>
                                {{-- <div class="py-1">
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                    <span class="fa-solid fa-star"></span>
                                </div> --}}
                                <button type="button" class="Add-to-cart">SHOP NOW</button>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
