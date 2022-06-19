<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    {{-- <meta http-equiv="refresh" content="1"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="69224837317-bbv99vpku9tf2bhk2j0sruv9et57jl44">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/responsive.css') }}">

    {{-- tabler --}}
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/css/tabler-flags.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/css/tabler-payments.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/css/tabler-vendors.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/1.35.0/iconfont/tabler-icons.min.css">
    <script src="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/js/tabler.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/css/tabler.min.css">
    {{-- tabler --}}
    <title>{{ ucwords(str_replace('.', ' ', Route::currentRouteName())) }}</title>



    <link rel="stylesheet" href="https://unpkg.com/@tabler/core@1.0.0-beta10/dist/css/tabler.min.css">


    <script src="https://kit.fontawesome.com/4ce11a3539.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap"
        rel="stylesheet" />
    <title>ClothingStore</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">
    {{-- @include('layouts.sidebar') --}}
    {{-- {{-- <section id="content"> --}}
    @include('home.layouts.nav')
    <h1>fsfds</h1>
    @yield('home-content')
    {{-- </section> --}}
    @include('home.layouts.footer')
    <!-- Optional JavaScript; choose one of the two! -->




    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
    {{-- file fond --}}
    {{-- <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script> --}}


    {{-- sweet alert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- <script src="{{ asset('script.js') }}"></script> --}}
    {{-- <script src="{{asset('global.min.js')}}"></script> --}}
    {{-- <script src="{{asset("script/custom.min.js")}}"></script>
    <script src="{{asset("script/dlabnav-init.js")}}"></script> --}}

    <script>
        function renderCart(data) {
            if (data.status == '200') {
                console.log(data);
                $('#cart-count').text(data.count);
                $.map(data.data, function(item, indexOrKey) {
                    $('#item-list').append(`
                                    <a href="#">
                                        <div class="list-group-item">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <a href="#">
                                                        <img class="avatar" src="{{ url('/storage/images/${item.product.img_url_first}') }}"></span>
                                                    </a>
                                                </div>
                                                <div class="col text-truncate">
                                                    <a href="#" class="text-body d-block">${item.product.name}</a>
                                                    <div class="text-muted text-truncate mt-n1">qty: ${item.quantity}</div>
                                                </div>
                                                <div class= "col-auto">
                                                    <div class="text-muted">
                                                        <span class="text-muted">NRS ${item.product.price*item.quantity}</span>
                                                    </div>
                                                </div>
                                                <div class= "col-auto">
                                                    <button class='btn btn-white border-0' onclick="removeItem(this,${item.id})">
                                                        <div class="text-muted">
                                                            <span class="text-muted">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg>
                                                            </span>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </a>

                            `);
                });


            } else {
                swal('Error', data.message, 'error');
            }
        }
    </script>

    <script>
        // alert('hello');
        function removeItem(obj, id) {
            $.ajax({
                type: "delete",
                url: "{{ route('cart.delete', '') }}/" + id,
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $(obj.parentElement.parentElement.parentElement).fadeTo(150, 0.01, function() {
                        $(obj.parentElement.parentElement.parentElement).slideUp(150, function() {
                            $(obj.parentElement.parentElement.parentElement).remove();
                        });
                    });
                    renderCart(data);
                },
                error: function(data) {
                    console.log(data);
                    renderCart(data);

                }
            });

        }
    </script>
    <script>
        @if (Auth::check())
            var quantity = $('input[type="number"]').val();
            $.ajax({
                url: '{{ route('getCartData') }}',
                type: 'get',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(data) {
                    renderCart(data);
                }
            });
        @else
            // swal({
            //     title: "Please Login First",
            //     text: "You need to login to add to cart",
            //     icon: "warning",
            //     buttons: true,
            //     dangerMode: true,
            // })
        @endif
    </script>
    @yield('custom-scripts')

</body>

</html>
