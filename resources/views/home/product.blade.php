@extends('home.layouts.app')
@section('custom-style')
    <style>
    /* .rating-list li {
    float: right;
    color: #ddd;
    padding: 10px 5px;
    }

    .rating-list li:hover,
    .rating-list li:hover ~ li {
    color: #ffd700;
    }

    .rating-list {
    display: inline-block;
    list-style: none;
    } */
    fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/
    .rating {
  border: none;
  float: left;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
</fieldset>
        </style>
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
                {{--
                <ul class="list-inline d-flex rating-list">
                    <li><i class="fa fa-star" onclick="rate(5)" title="Rate 5"></i></li>
                    <li><i class="fa fa-star" onclick="rate(4)" title="Rate 4"></i></li>
                    <li><i class="fa fa-star" onclick="rate(3)" title="Rate 3"></i></li>
                    <li><i class="fa fa-star" onclick="rate(2)" title="Rate 2"></i></li>
                    <li><i class="fa fa-star" onclick="rate(1)" title="Rate 1"></i></li>
                  </ul> --}}
                  <input type="hidden" id="rating" name="rating" value="0">
                  @error('rating')
                    <p class="text-red">{{$message}}</p>
                @enderror
                  <fieldset class="rating">
                    <input type="radio" onclick="rate(5)" id="star5"  value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                    <input type="radio" onclick="rate(4.5)" id="star4half" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                    <input type="radio" onclick="rate(4)" id="star4"  value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                    <input type="radio" onclick="rate(3.5)" id="star3half"  value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                    <input type="radio" onclick="rate(3)" id="star3"  value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                    <input type="radio" onclick="rate(2.5)" id="star2half"  value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                    <input type="radio" onclick="rate(2)" id="star2"  value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                    <input type="radio" onclick="rate(1.5)" id="star1half"  value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                    <input type="radio" onclick="rate(1)" id="star1"  value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                    <input type="radio" onclick="rate(0.5)"  id="starhalf"  value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                </fieldset>
                <input type="hidden" name="product_id" value="{{$data['product']->id}}">
                <textarea name="comment" id="" cols="30" rows="2" class="form-control "></textarea>
                @error('comment')
                    <p class="text-red">{{$message}}</p>
                @enderror
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
        function rate(num) {
            $('#rating').val(num);
         }
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
