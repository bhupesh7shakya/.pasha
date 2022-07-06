@extends('home.layouts.app')
@section('custom-style')
@endsection
@section('home-content')
    <div class="row mt-5">
        <div class="col-lg-5 col-md-12 col-12">
            <img class="img-fluid w-100 pb-1" src="{{ url('/storage/images/' . $data['product']->img_url_first) }}"
                id="MainImg" alt="">
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="images/f10.jpg" class="small-img" alt="" width="100%">
                </div>
                <div class="small-img-col">
                    <img src="images/f9.jpg" class="small-img" alt="" width="100%">
                </div>
                <div class="small-img-col">
                    <img src="images/e1.jpg" class="small-img" alt="" width="100%">
                </div>
                <div class="small-img-col">
                    <img src="images/e2.jpg" class="small-img" alt="" width="100%">
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-12">
            {{-- <h6 class="transparent">Home/ Hoodies</h6> --}}
            <h2 class="py-4">{{ $data['product']->name }}</h2>

            <h3>NRS {{ $data['product']->price }}/-</h3>
            {{-- <select class="my-3">
                <option>Select Size</option>
                <option>Small</option>
                <option>Large</option>
                <option>XL</option>
                <option>XXL</option>
            </select> --}}
            @while ($data['average_rating'] > 0)
                @if ($data['average_rating'] > 0.5)
                    <i class="fas fa-star" style="color: 	#DAA520"></i>
                @else
                    <i class="fas fa-star-half" style="color: 	#DAA520"></i>
                @endif
                @php $data['average_rating']--; @endphp
            @endwhile
            <input class="form-control" type="number" style="width: 80px;" value="1">
            <p class="text-muted my-4">
                {{-- {{ $data['product']->description }} --}}
                Stock:-10 pcs.
            </p>
            <button onclick="addToCart({{ $data['product']->id }})"
                class="buy-btn btn-danger text-uppercase float-end">Add
                to Cart</button>

            <h3 class="mt-5 mb-5">{{ $data['product']->details }}</h3>
            <span>
                {{ $data['product']->description }}
            </span>
        </div>
    </div>
    <div class="container my-5">
        <h1>Related Product</h1>
        <div class="row row-cards mx-4">
            @foreach ($data['related_product'] as $product)
                @if ($loop->index % 3 == 0)
                    <div class="mt-3"></div>
                @endif
                <div class="col-sm-2 col-lg-3">
                    <div class="card card-xs">
                        <a href="{{ route('product', $product->id) }}" class="d-block"><img
                                style="min-height: 18em;max-height: 20rem;"
                                src="{{ url('/storage/images/' . $product->img_url_first) }}" class="card-img-top"></a>
                        <div class="card-body">
                            <div class="align-items-center">
                                <div class="fw-bold ">{{ $product->name }}</div>
                                <div class="text-muted " style="font-size: 10px">
                                    {{ $product->category->name }}</div>
                                <div class="text-end  fw-bold ">Nrs {{ $product->price }}</div>
                                <div class="text-end  text-muted" style="font-size: 10px">Stock: 10
                                    available
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- @if ($loop->index % 2 == 0) --}}
        </div>
    </div>
    <div class="container mt-5 p-5"style="border: #00000073 1px solid">
        <span>Reviews</span>
        @auth
            <form action="{{route('review.store')}}" method="post" class="my-5">
                @csrf
                <input type="hidden" name="product_id" value="{{$data['product']->id}}">
                <textarea name="comment" id="" cols="30" rows="2" class="form-control "></textarea>
                <br>
                <button type="submit" class="btn btn-primary float-end">save</button>
            </form>
        @endauth

        @foreach ($data['reviews'] as $review)
            <div class="container p-5">
                <div class="row mt-1">
                    <div class="col-1">
                        <img src="#" alt="#" class="avatar">
                    </div>
                    <div class="col-8">
                        {{ $review->user->name }}
                        <?php $i = 0; ?>

                        @while ($review->rating > 0)
                            @if ($review->rating > 0.5)
                                <i class="fas fa-star" style="color: 	#DAA520"></i>
                            @else
                                <i class="fas fa-star-half" style="color: 	#DAA520"></i>
                            @endif
                            @php $review->rating--; @endphp
                        @endwhile
                        <p>{{ $review->comment }}</p>
                    </div>
                </div>
                <p class="float-end">10 days ago</p>
            </div>
            <hr>
        @endforeach
    </div>
@endsection

@section('custom-scripts')
    <script>
        function addToCart(id) {
            @if (Auth::check())
                var quantity = $('input[type="number"]').val();
                $.ajax({
                    url: '{{ route('cart.add') }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: id,
                        quantity: quantity
                    },
                    success: function(data) {
                        renderCart(data);
                    }
                });
            @else
                swal({
                    title: "Please Login First",
                    text: "You need to login to add to cart",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
            @endif
        }
    </script>
@endsection
