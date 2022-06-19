@extends('home.layouts.app')

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
