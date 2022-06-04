@extends('layouts.app')
@section('content')
    @include('admin.layouts.nav')
    @include('admin.layouts.sidebar')
    <div class="page">
        <div class="page-wrapper m-3">

            <ol class="breadcrumb breadcrumb-arrows" aria-label="breadcrumbs">
                @foreach (explode(" ",ucwords(str_replace('.', ' ', Route::currentRouteName())))  as $item)
                         <li class="breadcrumb-item"><a href="#"></a>{{$item}}</li>
                @endforeach
              </ol>
              @yield('admin-content')



        </div>
    </div>
@endsection
@section('custom-scripts')
    @yield('admin-scripts')
@endsection
