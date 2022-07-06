@extends('home.layouts.app')
@section('home-content')
    <div class="container m-5">
        <div class="card">
            <table id="cart-table" class="table table-bordered">
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
                    @foreach ($data['cart_list'] as $cart)
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
                        <td id="gtotal">0</td>
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
    <!-- Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="checkoutLabel">Final Checkout Process</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('order.confirm') }}">
                        <input type="hidden" name="order_id" value="PASHA{{uniqid()}}">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputaddress1" class="form-label">Address</label>
                            <input required type="address" name="address" class="form-control" id="exampleInputaddress1"
                                aria-describedby="addressHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputphone_number1" class="form-label">Phone
                                number</label>
                            <input required type="number"  name="phone_number" min="10" class="form-control"
                                id="exampleInputphone_number1">
                        </div>
                        <label class="form-check-label" for="exampleCheck1">Payment method</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod"
                                checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Cash On Delivery
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment" id="epay" value="epay">
                            <label class="form-check-label" for="exampleRadios2">
                                EPay
                            </label>
                        </div>

                        <div id="khalti" class="invisible">
                            <button class="btn-primary" type="button" id="payment-button">Pay with Khalti</button>
                        </div>

                        <input type="hidden" id="epayment" name="epayment">
                        <button type="submit" id="c_order" class="btn btn-primary float-end">Confirm Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-scripts')
    <script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_424dea265563478e961e0df0a9dee1dd",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
            ],
            "eventHandler": {
                onSuccess(payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);
                    $('#epayment').val(payload);
                    $('#c_order').prop('disabled', false)
                },
                onError(error) {
                    console.log(error);
                },
                onClose() {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function() {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({
                amount: 1000
            });
        }
    </script>
    <script>
        $('#epay').click(function(e) {

            if ($('epayment') !== null) {
                $('#c_order').prop('disabled', true)
            }
            $('#khalti').attr("class", "visible");
        });
        $('#cod').click(function(e) {

            if ($('epayment') !== null) {
                $('#c_order').prop('disabled', false)
                $('#khalti').attr("class", "invisible");

            }
        });
        grandtotal()

        function grandtotal() {
            console.log("called");
            $("#gtotal").html(0);
            var table = $("#cart-table tbody");
            var gtotal = 0;

            table.find('tr').each(function(i, el) {
                var tds = $(this).find("td:eq(3)").html();
                //  v= $tds.eq(3). $("input['name]").val();
                gtotal += +tds;
                console.log("the grnd:" + gtotal);
                // do something with productId, product, Quagntity
            });
            $("#gtotal").html(gtotal);
        }

        function orderNow() {
            grandtotal()

            $.ajax({
                type: "get",
                url: "{{ route('address.check') }}",
                success: function(response) {
                    console.log(response);
                    if (response.message == "true") {
                        $('#checkoutModal').modal("show");
                    } else {
                        $('#checkoutModal').modal("show");

                        // swal({
                        //     title: "Address not Set",
                        //     text: "Please add your address On Your Profile",
                        //     icon: "warning",
                        //     buttons: true,
                        //     dangerMode: true,
                        // })
                    }
                },
            });
        }
    </script>
@endsection
