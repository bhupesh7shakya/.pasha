@extends('home.layouts.app')
@section('home-content')
    <div class="container m-5">
        <div class="card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $cart)
                        <tr>
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ $cart->product->price }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->product->price * $cart->quantity }}</td>
                            <td>
                                <a onclick="removeItem(this,{{ $cart->id }},false)" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Total</td>
                        <td>0</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            <button onclick="orderNow()">Order Now</button>
            {{-- <p class="m-3"><button class="float-end" id="payment-button"
                    style="background-color: #5C2D91; cursor: pointer; color: #fff; border: none; padding: 5px 10px; border-radius: 2px">Pay
                    with Khalti</button>
            </p> --}}
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        function orderNow() {
            $.ajax({
                type: "get",
                url: "{{route('address.check')}}",
                success: function (response) {
                    console.log(response);
                    if(response.message == "true"){

                    }else{
                        swal({
                            title: "Address not Set",
                            text: "Please add your address On Your Profile",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                    }
                },
            });
        }
        </script>
@endsection
