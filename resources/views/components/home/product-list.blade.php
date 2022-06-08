<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="headline text-center mb-5">
                <h2 class="pb-3 position-relative d-inline-block">
                    {{ $title }}
                </h2>
            </div>
        </div>
    </div>
    <div class="row">

        @foreach ($products as $fp)
            <div class="col-sm-6 col-lg-4">
                <a href="#" class="d-block text-center mb-4">
                    <div class="product-list">
                        <div class="product-image position-relative">

                            <img src="{{ url('storage/images/' . $fp->img_url_first) }}" alt="products"
                                class="img-fluid product-image-first">
                            <img src="{{ url('storage/images/' . $fp->img_url_second) }}" alt="products"
                                class="img-fluid product-image-secondary">
                        </div>
                        <div class="product-name pt-3">
                            <h3 class="text-capitalize">{{ $fp->name }}</h3>
                            <p class="mb-0 amount">Nrs {{ $fp->price }}</p>

                            <button type="button" class="Add-to-cart">SHOP NOW</button>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
</div>
