@extends('home.layouts.app')
@section('home-content')
    <div class="page-wrapper m-4">
        <div class="container-xl">
            <!-- Page title -->
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Search results
                        </h2>
                        <div class="text-muted mt-1">About {{ $data['number_of_search_result_products'] }} result
                            ({{ $data['total_time'] }} seconds)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            <div class="container-xl">
                <div class="row g-4">
                    <div class="col-3">
                        <form action="" method="get">
                            <input type="hidden" name="search" value="{{ $data['recent']['search'] }}">
                            <div class="subheader mb-2">SORT By</div>
                            <div class="list-group list-group-transparent mb-3">
                                <select name="filter_by_order" id="" class="form-control form">
                                    <option selected value="">Select-Sort</option>
                                    <option @if (isset($data['recent']['filter_by_order']) && $data['recent']['filter_by_order'] == 'asc') selected @endif value="asc">
                                        Price Low to High
                                    </option>
                                    <option @if (isset($data['recent']['filter_by_order']) && $data['recent']['filter_by_order'] == 'desc') selected @endif value="desc">
                                        Price High to Low
                                    </option>
                                    <option @if (isset($data['recent']['filter_by_order']) && $data['recent']['filter_by_order'] == 'new') selected @endif value="new">
                                        Newest
                                    </option>

                                </select>
                            </div>
                            <div class="subheader mb-2">Filter By Category</div>
                            <div class="list-group list-group-transparent mb-3">
                                <select name="category" id="" class="form-control form">
                                    <option value="" selected>Select-Category</option>
                                    @foreach ($data['category'] as $c)
                                        <option
                                        {{(isset($data['recent']['category']) && $data['recent']['category'] == $c->id) ? "selected" : ''}}
                                        value="{{ $c->id }}">
                                            {{ $c->name }}
                                            {{-- <small class="text-muted ms-auto">24</small> --}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="subheader mb-2">Rating</div>
                            <div class="mb-3">
                                <label class="form-check mb-1">
                                    <input type="radio" class="form-check-input" name="form-stars" value="5 stars"
                                        checked="">
                                    <span class="form-check-label">5 stars</span>
                                </label>
                                <label class="form-check mb-1">
                                    <input type="radio" class="form-check-input" name="form-stars" value="4 stars">
                                    <span class="form-check-label">4 stars</span>
                                </label>
                                <label class="form-check mb-1">
                                    <input type="radio" class="form-check-input" name="form-stars" value="3 stars">
                                    <span class="form-check-label">3 stars</span>
                                </label>
                                <label class="form-check mb-1">
                                    <input type="radio" class="form-check-input" name="form-stars" value="2 and less stars">
                                    <span class="form-check-label">2 and less stars</span>
                                </label>
                            </div> --}}
                            <div class="subheader mb-2">Price Range</div>
                            <div class="row g-2 align-items-center mb-3">
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            NRS
                                        </span>
                                        <input type="text" class="form-control" name="min_price" min=0 placeholder="from"
                                            value="{{ $data['recent']['min_price'] }}" autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-auto">-</div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            NRS
                                        </span>
                                        <input type="text" value="{{ $data['recent']['max_price'] }}" class="form-control"
                                            name="max_price" placeholder="to" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5">
                                <button type="submit" class="btn btn-primary w-100">
                                    Confirm changes
                                </button>
                                {{-- <a href="#" class="btn btn-link w-100">
                                    Reset to defaults
                                </a> --}}
                            </div>
                        </form>
                    </div>
                    <div class="col-9">
                        @if ($data['number_of_search_result_products'] < 1)
                            <div class="row row-cards">
                                <div class="col-12">
                                    <div class="card" style="margin-left: 36px">
                                        <div class="card-body text-center py-5 m-3">
                                            <img src="{{ asset('images/undraw_Empty_re_opql.png') }}" alt=""
                                                class="image-fluid col-6" srcset="">
                                            <div class="text-center">
                                                <h3 class="fw-bold">No Result Found</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row row-cards mx-4">
                            @foreach ($data['search_result'] as $product)
                                @if ($loop->index % 3 == 0)
                                    <div class="mt-3"></div>
                                @endif
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card card-sm">
                                        <a href="{{route('product',$product->id)}}" class="d-block"><img style="min-height: 15em;max-height: 18em;"
                                                src="{{ url('/storage/images/' . $product->img_url_first) }}"
                                                class="card-img-top"></a>
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
                        {{-- @endif --}}
                        <div class="float-end my-3">
                            {{ $data['search_result']->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
