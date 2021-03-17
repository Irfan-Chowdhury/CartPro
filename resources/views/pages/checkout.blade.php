@extends('layouts.app')
@section('content')
  <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">Shop Checkout</h1>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">Shop Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!-- Content Wrapper -->
    <section class="content-wrapper">
        <div class="container ">
            @guest
            <div class="col-12 mar-bot-20">
                <div class="alert-general text-center res-box" role="alert">
                    <div class="alert-icon"><i class="ion-ios-chatbubble-outline"></i><span>Alredy registered? </span><a href="#" data-toggle="modal" data-target="#loginModal" class="bold">Click here to login</a></div>
                </div>
            </div>
            @endguest
            <h3 class="section-title mb-0">Your order</h3>
            <form id="checkout" action="{{ url('/place-order') }}" class="d-block calculate-shipping" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8 mar-top-30">
                        <div class="cart-total">
                            <div class="cart-table table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product</th>
                                            <th class="cart-product-quantity">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cart as $id => $cart_product)
                                        @php
                                            $images = explode(',',$cart_product['image']);
                                        @endphp
                                        <tr class="single-cart-item-{{$cart_product['sku']}}">
                                            <td class="cart-product-name">
                                                <div class="d-flex align-self-center">
                                                    <div class="remove">
                                                        <a class="remove-from-cart-checkout" title="Remove from Cart" data-sku="{{$cart_product['sku']}}">
                                                            <span class="ti-trash"></span>
                                                        </a>
                                                    </div>
                                                    @if($cart_product['parent_sku'])
                                                    <img src="{{ asset('public/images/products/') }}/{{$cart_product['parent_sku']}}/small/{{ $images[0] }}" alt="..."> 
                                                    @else
                                                    <img src="{{ asset('public/images/products/') }}/{{$cart_product['sku']}}/small/{{ $images[0] }}" alt="...">
                                                    @endif
                                                    <strong class=" justify-content-center align-self-center">{{ $cart_product['name'] }}</strong>
                                                </div>
                                            </td>
                                            <!-- <td class="cart-product-price"><span class="amount">{{ $cart_product['total_price'] / $cart_product['qty'] }}</span></td> -->
                                            <td class="cart-product-quantity">
                                                <div class="product-subtotal">
                                                    $ <strong class="amount">{{ $cart_product['total_price'] }}</strong>
                                                </div>
                                                <div class="input-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="cart-quantity-left-minus" data-sku="{{$cart_product['sku']}}">
                                                            <span class="ti-minus"></span>
                                                        </button>
                                                    </span>
                                                    <input type="text" class="input-number mb-0" value="{{ $cart_product['qty'] }}">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="cart-quantity-right-plus" data-sku="{{$cart_product['sku']}}">
                                                            <span class="ti-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <h6 class="d-flex justify-content-between mar-top-30">
                                    <span>Sub Total: </span>
                                    <span>$ <span class="sub_total">{{ $subTotal ?? 0.00 }}</span></span>
                                    <input type="hidden" name="sub_total" id="input_sub_total" value="{{ $subTotal ?? 0.00 }}">
                                </h6>
                                <h6 class="d-flex justify-content-between mar-top-10">
                                    <span>Shipping cost: </span>
                                    <span>$ <span id="shipping_cost">0</span></span>
                                    <input type="hidden" name="shipping_cost" id="input_shipping_cost" value="">
                                </h6>
                                <h4 class="d-flex justify-content-between mar-top-10">
                                    <span>Grand Total: </span>
                                    <span>$ <span id="total">0</span></span>
                                    <input type="hidden" name="grand_total" id="input_total" value="">
                                </h4>
                            </div>
                            
                            <div class="block block-subtotal mar-top-30">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="label h6">Enter coupon code</div>
                                        <form>
                                            @csrf
                                            <div class="input-group coupon-code">
                                                <input type="text" class="form-control" id="coupon_code">
                                                <button type="submit" class="button style1 apply-coupon">Apply coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mar-top-30">
                        <div class="payment-options text-center">
                            <div class="custom-control custom-checkbox text-center mt-3 mb-3">
                                <input type="checkbox" class="custom-control-input" id="tnc">
                                <label class="custom-control-label" for="tnc">I've read and accept the</label> <a class="theme-color" href="{{url('/terms-and-conditions')}}">Terms and Conditions</a>
                            </div>

                            <input type="hidden" id="coupon_id" name="coupon_id" value="">
                            <input type="hidden" id="coupon_discount" name="coupon_discount" value="">

                            <input type="hidden" id="payment_id" name="payment_id" value="">
                            <input type="hidden" id="item" name="item" value="">
                            <input type="hidden" id="total_qty" name="total_qty" value="{{ $total_qty ?? 0 }}">

                            <div id="pay-now"></div>

                        </div>
                    </div>
                    <div class="col-md-6 mar-top-30">
                        <div class="row mar-top-30">                          
                            <div class="col-sm-12">
                                <input class="form-control" type="hidden" name="cus_name" id="name" placeholder="Name *" value="{{ $customer->name ?? ''}}" required>
                            </div>
                            <div class="col-6">
                                <input class="form-control" type="hidden" name="cus_phone" id="phone" placeholder="Mobile Number *" value="{{ $customer->phone_number ?? ''}}">
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="hidden" name="cus_email" id="email" placeholder="email" value="{{ $customer->email ?? ''}}">
                            </div>
                            <div class="col-12">
                                <input class="form-control" type="hidden" name="ship_address" id="ship_address" placeholder="Street Address" value="{{ $customer->ship_address ?? ''}}">
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="hidden" name="ship_city" id="ship_city" placeholder="City / Town" value="{{ $customer->ship_city ?? ''}}">
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="hidden" name="ship_state" id="ship_state" placeholder="State" value="{{ $customer->ship_state ?? ''}}">
                            </div>
                            <div class="col-sm-4">
                                <input class="form-control" type="hidden" name="ship_postcode" id="ship_postal_code" placeholder="Postcode / Zip" value="{{ $customer->ship_postal_code ?? ''}}">
                            </div>
                        </div>
                        <!-- <div class="row">       
                            <div class="col-12">
                                <textarea class="form-control mar-top-20" name="sale_note" placeholder="Order Notes" id="sale_note"></textarea>
                            </div>
                        </div> -->
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Content Wrapper Ends -->
@endsection

@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=AbP2W-PIGeKEFHMO1IbLVy1GfxG1J8CqtttUKAOhNzjppusFOz3iyEaH6fZ-qtxFiU5EfihEy0oecOt8"></script>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units : [{
                        amount: {
                            value: $('#input_total').val()
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    console.log(details);
                    $("#payment_id").val(details.id);
                    $("#name").val(details.purchase_units[0].shipping.name.full_name);
                    $("#ship_address").val(details.purchase_units[0].shipping.address.address_line_1);
                    $("#ship_city").val(details.purchase_units[0].shipping.address.admin_area_2);
                    $("#ship_state").val(details.purchase_units[0].shipping.address.admin_area_1);
                    $("#ship_postal_code").val(details.purchase_units[0].shipping.address.postal_code);
                    $("#email").val(details.purchase_units[0].payee.email_address);
                    //window.location.replace("{{url('/paypal/success')}}")
                    var form = $('#checkout');
                    var url = form.attr('action');
    
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: form.serialize(),
                        success: function(data)
                        {
                            window.location.replace("{{url('/paypal/success')}}") 
                        }
                    });
                })
            },
            onCancel: function (data) {
                window.location.replace("{{url('/paypal/cancel')}}")
            }
        }).render('#pay-now');
    </script>
    <script type="text/javascript">
    "use strict";

        var item = $('.cart-product-name').length;
        $('#item').val(item);

        $(document).on('click', '.remove-from-cart-checkout', function(e){
            e.preventDefault();
            var sku = $(this).data('sku');

            var route = "{{ route('removeFromCart') }}";

            $(this).parent().parent().parent().parent().remove();

            $.ajax({
                url: route,
                type:"POST",
                data:{
                    sku: sku,
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.alert').addClass('alert-custom show');
                        $('.alert-custom .message').html(response.success);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('#total_qty').val(response.total_qty);
                        $('.cart__menu .total').html('$ '+response.subTotal);
                        $('.sub_total').html(response.subTotal);
                        $('#input_sub_total').val(response.subTotal);

                        var item = $('.cart-product-name').length;
                        $('#item').val(item);

                        if(response.subTotal < 1) {
                            $('.shp__cart__wrap').html('<h6 class="mar-top-30">No item in your cart</h6>');
                            $('.cart__menu .cart_qty').html('0');
                            $('#total_qty').val(0);
                            $('.cart__menu .total').html('$ 0');
                            $('.sub_total').html('0');
                            $('#input_sub_total').val(0);
                        }
                    }
                },
            });
        });

        var quantitiy = 0;
        $('.cart-quantity-right-plus').on("click", function(e) {
            e.preventDefault();
            var sku = $(this).data('sku');
            var quantity = parseInt($(this).parent().siblings("input.input-number").val());
            var price = (parseFloat($(this).parent().parent().siblings(".product-subtotal").children(".amount").html()) / quantity);
            $(this).parent().siblings("input.input-number").val(quantity + 1);
            var quantity = parseInt($(this).parent().siblings("input.input-number").val());
            price = (price * quantity);
            $(this).parent().parent().siblings(".product-subtotal").children(".amount").html(parseFloat(price).toFixed(2));

            var sub_total = 0;
            // iterate through each td based on class and add the values
            $(".product-subtotal .amount").each(function() {
                var value = parseFloat($(this).html());
                // add only if the value is number
                if(!isNaN(value) && value.length != 0) {
                    sub_total += value;
                }
            });

            $('.sub_total').html(parseFloat(sub_total).toFixed(2));

            var route = "{{ route('updateCart') }}";

            $.ajax({
                url: route,
                type:"POST",
                data:{
                    sku: sku,
                    product_qty: quantity,
                },
                success:function(response){
                    console.log(response);
                    $('.cart__menu .cart_qty').html(response.total_qty);
                    $('#total_qty').val(response.total_qty);
                    $('.cart__menu .total').html('$ '+response.subTotal);
                },
            });
            
        });
        $('.cart-quantity-left-minus').on("click", function(e) {
            e.preventDefault();
            var sku = $(this).data('sku');
            var quantity = parseInt($(this).parent().siblings("input.input-number").val());
            var price = (parseFloat($(this).parent().parent().siblings(".product-subtotal").children(".amount").html()) / quantity);
            if (quantity > 1) {
                $(this).parent().siblings("input.input-number").val(quantity - 1);
                var quantity = parseInt($(this).parent().siblings("input.input-number").val());
                price = (price * quantity);
                $(this).parent().parent().siblings(".product-subtotal").children(".amount").html(parseFloat(price).toFixed(2));

                var sub_total = 0;
                // iterate through each td based on class and add the values
                $(".product-subtotal .amount").each(function() {
                    var value = parseFloat($(this).html());
                    // add only if the value is number
                    if(!isNaN(value) && value.length != 0) {
                        sub_total += value;
                    }
                });

                $('.sub_total').html(parseFloat(sub_total).toFixed(2));

                var route = "{{ route('updateCart') }}";

                $.ajax({
                    url: route,
                    type:"POST",
                    data:{
                        sku: sku,
                        product_qty: quantity,
                    },
                    success:function(response){
                        console.log(response);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('#total_qty').val(response.total_qty);
                        $('.cart__menu .total').html('$ '+response.subTotal);
                    },
                });
            }
        });

        //coupon discount
        $(document).on('click', '.apply-coupon', function(e){
            e.preventDefault();

            var coupon_code = $('#coupon_code').val();
            var route = "{{ route('applyCoupon') }}";

            if(coupon_code == '') {
                $('.alert').addClass('alert-danger show');
                $('.alert-danger .message').html('Please enter a valid coupon code');
            } else {
                $('.apply-coupon').attr('disabled', true);

                $.ajax({
                    url: route,
                    type:"POST",
                    data:{
                        coupon_code: coupon_code,
                    },
                    success:function(response){
                        console.log(response);
                        if(response.status == 'success') {
                            $('.alert').addClass('alert-custom show');
                            $('.alert-custom .message').html(response.message);

                            var total = parseFloat($('.sub_total').html());

                            $('#coupon_id').val(response.coupon_id);

                            if(response.coupon_type == 'percentage') {
                                var discount_amount = Math.round(((total * response.discount_amount) / 100));
                                $('#coupon_discount').val(discount_amount);
                                total = Math.round((total - discount_amount));
                                $('.sub_total').html(total); 
                                $('#input_sub_total').val(total);

                                var sub_total = parseFloat($('.sub_total').html());

                                if(sub_total > 5000){
                                    $('#shipping_cost').html('0');
                                    $('#total').html(sub_total);
                                    $('#input_shipping_cost').val('0');
                                    $('#input_total').val(sub_total);
                                } else {
                                    $('#shipping_cost').html('0');
                                    $('#input_shipping_cost').val('0');
                                    var total = (sub_total + 0);
                                    $('#total').html(total);
                                    $('#input_total').val(total);
                                }

                            } else {

                                $('#coupon_discount').val(response.discount_amount);
                                total = Math.round((total - response.discount_amount));
                                $('.sub_total').html(total);
                                $('#input_sub_total').val(total);

                                var sub_total = parseFloat($('.sub_total').html());

                                if(sub_total > 5000){
                                    $('#shipping_cost').html('0');
                                    $('#total').html(sub_total);
                                    $('#input_shipping_cost').val('0');
                                    $('#input_total').val(sub_total);
                                } else {
                                    $('#shipping_cost').html('0');
                                    $('#input_shipping_cost').val('0');
                                    var total = (sub_total + 0);
                                    $('#total').html(total);
                                    $('#input_total').val(total);
                                }

                            }
                        } else {
                            $('.alert').addClass('alert-danger show');
                            $('.alert-danger .message').html('Please enter a valid coupon code');
                        }
                    },
                });
            }

        });

        //shipping cost
        $(document).on('click', function(){
            var sub_total = parseFloat($('.sub_total').html());

            if(sub_total > 5000){
                $('#shipping_cost').html('0');
                $('#total').html(sub_total);
                $('#input_shipping_cost').val('0');
                $('#input_total').val(sub_total);
            } else {
                $('#shipping_cost').html('0');
                $('#input_shipping_cost').val('0');
                var total = (sub_total + 0);
                $('#total').html(total);
                $('#input_total').val(total);
            }
        }) 

        var sub_total = parseFloat($('.sub_total').html());

        if(sub_total > 5000){
            $('#shipping_cost').html('0');
            $('#total').html(sub_total);
            $('#input_shipping_cost').val('0');
            $('#input_total').val(sub_total);
        } else {
            $('#shipping_cost').html('0');
            $('#input_shipping_cost').val('0');
            var total = (sub_total + 0);
            $('#total').html(total);
            $('#input_total').val(total);
        }

        $(document).on('click', '.pay-button', function(e){
            $('.pay-button').removeClass('selected');
            $(this).toggleClass('selected');
        });

  </script>
@endsection