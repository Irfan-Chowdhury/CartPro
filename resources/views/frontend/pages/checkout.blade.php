@extends('frontend.layouts.master')

@section('extra_css')

@section('frontend_content')
<!--Breadcrumb Area start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Area ends-->


    <!-- Content Wrapper -->
    <section class="content-wrapper mt-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title h2 text-center uppercase mt-1 mb-5">Checkout</h1>
                </div>
                <div class="col-md-6 offset-md-3 col-sm-12 text-right mar-bot-20">
                    <div class="alert alert-secondary text-center res-box" role="alert">
                        <div class="alert-icon"><i class="ion-android-favorite-outline mr-2"></i> <span>Returning customer? </span><a href="#" class="semi-bold theme-color">Click here to login</a></div>
                    </div>
                </div>

                <!-- Alert Message -->
                <div class="d-flex justify-content-center d-none" id="alert_div">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <div id="alert_message">

                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6 mar-top-30">
                    <h3 class="section-title">Billing Details</h3>
                    <form class="row calculate-shipping" action="{{route('order.store')}}" method="POST">
                        @csrf
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="billing_first_name" placeholder="First Name *">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="billing_last_name" placeholder="Last Name *">
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control selectpicker" name="billing_country" id="billing_country">
                                    <option value="">--Select Country--</option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="billing_address_1" placeholder="Street Address">
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="billing_address_2" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="billing_city" placeholder="City / Town">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="billing_state" placeholder="State / County">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="billing_zip_code" placeholder="Postcode / Zip">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="email" name="billing_email" placeholder="Email *">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="billing_phone" placeholder="Phone *">
                        </div>

                        @if (!Auth::check())
                            <div class="custom-control custom-checkbox mt-5" data-bs-toggle="collapse" href="#create_account_collapse" role="button" aria-expanded="false" aria-controls="create_account_collapse">
                                <input type="checkbox" class="custom-control-input" id="billing_create_account_check" value="1">
                                <label class="label custom-control-label" for="create_account">Create Account</label>
                            </div>
                        @endif


                        <div class="collapse" id="create_account_collapse">
                            <input class="form-control mt-3" type="text" placeholder="Enter Username" name="username">
                            <input class="form-control mt-3" type="password" placeholder="Enter Password" name="password">
                            <input class="form-control mt-3" type="password" placeholder="Enter Confirm Password" name="password_confirmation">
                        </div>

                        <div class="custom-control custom-checkbox mt-4 mb-3" data-bs-toggle="collapse" href="#shipping_address_collapse" role="button" aria-expanded="false" aria-controls="shipping_address_collapse">
                            <input type="checkbox" class="custom-control-input" id="shipping_address_check" value="1">
                            <label class="label custom-control-label" for="shipping_address">Ship to a different address</label>
                        </div>
                        <div class="collapse" id="shipping_address_collapse">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_first_name" placeholder="First Name *">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_last_name" placeholder="Last Name *">
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control selectpicker" name="shipping_country" id="shipping_country">
                                            <option value="">--Select Country--</option>
                                            @foreach ($countries as $country)
                                                <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="shipping_address_1" placeholder="Street Address">
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="shipping_address_2" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="shipping_city" placeholder="City / Town">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_state" placeholder="State / County">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_zip_code" placeholder="Postcode / Zip">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_email" placeholder="Email *">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="shipping_phone" placeholder="Phone *">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mar-top-30">
                    <h3 class="section-title">Your order</h3>
                    <div class="cart-subtotal">
                        <div class="table-content table-responsive cart-table">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cartTable">
                                    <div id="content">
                                        @forelse ($cart_content as $item)
                                            <tr id="{{$item->rowId}}">
                                                <td class="cart-product">
                                                    <div class="item-details">
                                                        <a class="remove_cart_from_details" data-id="{{$item->rowId}}"><i class="ti-close"></i></a>
                                                        <img src="{{asset('public/'.$item->options->image ?? null)}}" alt="...">
                                                        <div class="">
                                                            <a href="">
                                                                <h3 class="h6">Samsung Curved Widescreen 4k Ultra HD TV - varaint 1 - variant 2</h3>
                                                            </a>
                                                            <div class="input-qty">
                                                                <form class="quantity_change_submit" data-id="{{$item->rowId}}" method="get">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="quantity-left-minus">
                                                                            <span class="ti-minus"></span>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="input-number {{$item->rowId}}" value="{{$item->qty}}">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="quantity-right-plus">
                                                                            <span class="ti-plus"></span>
                                                                        </button>
                                                                    </span>
                                                                </form>
                                                            </div>
                                                            X
                                                            <span class="amount">
                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                    {{$item->price}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                @else
                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{$item->price}}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="cart-amount-mobile">Total: <span class="amount">$70.00</span></div>
                                                </td>
                                                <td class="cart-product-subtotal"><span class="amount">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        <span class="subtotal_{{$item->rowId}}">{{$item->subtotal}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                    @else
                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="subtotal_{{$item->rowId}}">{{$item->subtotal}}</span>
                                                    @endif
                                                </span></td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </div>
                                </tbody>
                            </table>
                        </div>
                        <div class="subtotal mt-3">
                            <div class="label">Subtotal</div>
                            <div class="price">
                                @if(env('CURRENCY_FORMAT')=='suffix')
                                    <span class="cartSubtotal">{{$cart_subtotal}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="cartSubtotal">{{$cart_subtotal}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox" data-bs-toggle="collapse" href="#apply_coupon_collapse" role="button" aria-expanded="false" aria-controls="apply_coupon_collapse">
                            <input type="checkbox" class="custom-control-input" id="apply_coupon">
                            <label class="label custom-control-label" for="apply_coupon">I've a coupon</label>
                        </div>
                        <div class="collapse" id="apply_coupon_collapse">
                            <form class="newsletter" id="applyCoupon">
                                <input class="" type="text" placeholder="Enter coupon code" name="coupon_code" id="coupon_code">
                                <input class="" type="hidden" name="coupon_value" id="coupon_value">
                                <button class="button style1 btn-search" type="submit">Apply</button>
                            </form>
                        </div>
                        <div class="shipping">
                            <div class="label">Shiping</div>

                            @if ($setting_free_shipping->shipping_status==1)
                                <div class="custom-control custom-radio mt-3">
                                    <input type="radio" @if($setting_free_shipping->minimum_amount == $shipping_charge) checked @endif name="shipping" class="custom-control-input shippingCharge" value="{{$setting_free_shipping->minimum_amount ?? 0}}">
                                    <label class="custom-control-label" for="customRadio1">{{$setting_free_shipping->label ?? null}}
                                        <span class="price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$setting_free_shipping->minimum_amount, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$setting_free_shipping->minimum_amount, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            @endif

                            @if ($setting_local_pickup->pickup_status==1)
                                <div class="custom-control custom-radio mt-3">
                                    <input type="radio" @if($setting_local_pickup->cost == $shipping_charge) checked @endif name="shipping" class="custom-control-input shippingCharge" value="{{$setting_local_pickup->cost ?? null}}">
                                    <label class="custom-control-label" for="customRadio2">{{$setting_local_pickup->label ?? null}}
                                        <span class="price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$setting_local_pickup->cost, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$setting_local_pickup->cost, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            @endif

                            @if ($setting_flat_rate->flat_status==1)
                                <div class="custom-control custom-radio mt-3">
                                    <input type="radio" @if($setting_flat_rate->cost == $shipping_charge) checked @endif name="shipping" class="custom-control-input shippingCharge" value="{{$setting_flat_rate->cost ?? null}}">
                                    <label class="custom-control-label" for="customRadio3">{{$setting_flat_rate->label ?? null}}
                                        <span class="price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{ number_format((float)$setting_flat_rate->cost, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$setting_flat_rate->cost, env('FORMAT_NUMBER'), '.', '') }}
                                            @endif
                                        </span>
                                    </label>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <div class="label">{{__('file.Tax')}}</div>
                            <div class="price">
                                @if(env('CURRENCY_FORMAT')=='suffix')
                                    <span class="tax_rate">0</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="tax_rate">0</span>
                                @endif
                            </div>
                        </div>

                        <hr>

                        <div class="total">
                            <div class="label">{{__('file.Total')}}</div>
                            <div class="price">
                                @if(env('CURRENCY_FORMAT')=='suffix')
                                    <span class="cart_total total_amount">{{$cart_total}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="cart_total total_amount">{{$cart_total}}</span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="payment-options">
                            {{-- <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer" value="card">
                                <span class="sm-heading">Direct Bank Transfer</span>
                            </label> --}}
                            {{-- <div class="alert alert-general no-border mar-bot-0">
                                <div class="alert-text">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div>
                            </div> --}}
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer" id="cashOnDelivery">
                                <span class="sm-heading">Cash On Delivery</span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer" id='paypal' value="paypal">
                                <span class="sm-heading">{{__('file.Paypal')}}</span>
                                <span class="card-options"><img src="{{asset('public/frontend/images/others/paypal.jpg')}}" alt="..."></span>
                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer" id='stripe' value="stripe">
                                <span class="sm-heading">{{__('file.Stripe')}}</span>
                                <span class="card-options"><img src="{{asset('public/frontend/images/others/stripe.png')}}" alt="..."></span>
                            </label>
                            <div class="custom-control custom-checkbox text-center mt-5 mb-5">
                                <input type="checkbox" class="custom-control-input" id="accept_terms">
                                <label class="custom-control-label" for="accept_terms">I've read and accecpt the <a class="theme-color" href="">Terms & Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <!--Paypal-->
                    <div id="paypal-button-container"></div>

                    <!--Stripe-->
                    <div id="stripeContent">
                        @include('frontend.pages.payment_page.stripe_from')
                    </div>

                    <div class="checkout-actions mar-top-30" id="payNowPaypal">
                        <button class="button lg style1 d-block text-center w-100" id="orderBtn">{{__('file.Pay Now')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency=USD" data-namespace="paypal_sdk"></script>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
$(function(){


    $('#billing_country').change(function() {
        var billing_country = $("#billing_country").val();
        var total = $('.total_amount').text();
        // console.log(total);
        $.ajax({
            url: "{{ route('cart.country_wise_tax') }}",
            type: "GET",
            data: {
                billing_country:billing_country,
                total:total
            },
            success: function (data) {
                console.log(data.tax_rate);
                // if (condition) {

                // }
                $('.tax_rate').text(data.tax_rate);
                $('.total_amount').text(data.total_amount);
            }
        })

    });

    //Coupon
    $('#applyCoupon').on("click",function(e){
        e.preventDefault();
        var coupon_code = $('#coupon_code').val();
        var shipping_charge =$('.shippingCharge:checked').val();
        console.log(shipping_charge);
        $.ajax({
            url: "{{ route('cart.apply_coupon') }}",
            type: "GET",
            data: {coupon_code:coupon_code,shipping_charge:shipping_charge},
            success: function (data) {
                console.log(data)
                if (data.type=='success') {
                    console.log('irfan')
                    $('.total_amount').text(data.total_amount);
                    $('#coupon_value').val(data.coupon_value);
                }
            }
        })
    });

    //Shipping
    $('.shippingCharge').on("click",function(e){
        var cost = $(this).val();
        var coupon_value = $('#coupon_value').val();
        if (!coupon_value) {
            coupon_value = 0;
        }
        $.ajax({
            url: "{{ route('cart.shipping_charge') }}",
            type: "GET",
            data: {cost:cost,coupon_value:coupon_value},
            success: function (data) {
                console.log(data)
                if (data.type=='success') {
                    $('.total_amount').text(data.total_with_shipping);
                }
            }
        })
    });

    $('#paypal').on('click',function(event){
        $('#payNowPaypal').show();
        $('#stripeContent').hide();

        $('#orderBtn').on('click',function(event){

            var billing_create_account_check = $("#billing_create_account_check:checked").val();
            if (billing_create_account_check) {
                var billing_first_name = $("input[name=billing_first_name]").val();
                var billing_last_name = $("input[name=billing_last_name]").val();
                var username = $("input[name=username]").val();
                var billing_email = $("input[name=billing_email]").val();
                var billing_phone = $("input[name=billing_phone]").val();
                var password = $("input[name=password]").val();
                var password_confirmation = $("input[name=password_confirmation]").val();
                $.ajax({
                    url: "{{ route('customer.register') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    data: {
                        billing_first_name:billing_first_name,
                        billing_last_name:billing_last_name,
                        username:username,
                        billing_email:billing_email,
                        billing_phone:billing_phone,
                        password:password,
                        password_confirmation:password_confirmation,
                        billing_create_account_check:billing_create_account_check
                    },
                    success: function (data) {
                        console.log(data);
                        let html = '';
                        if (data.errors) {
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            $('#alert_div').removeClass('d-none');
                            $('#alert_message').html(html);
                        }
                        else if (data.type=='success') {
                            console.log('OK');
                        }
                    }
                })
            }

            var paypal = $("input[name=paypal]:checked").val();
            var paypal_test = $("#paypal:checked").val();
            if (paypal_test) {

                var total = $('.total_amount').text();

                paypal_sdk.Buttons({
                    createOrder: function(data, actions) {
                        // This function sets up the details of the transaction, including the amount and line item details.
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: total
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        // This function captures the funds from the transaction.
                        return actions.order.capture().then(function(details) {
                            // This function shows a transaction success message to your buyer.
                            // alert('Transaction completed by ' + details.payer.name.given_name);

                            var billing_first_name = $("input[name=billing_first_name]").val();
                            var billing_last_name = $("input[name=billing_last_name]").val();
                            var billing_country = $("#billing_country").val();
                            var billing_address_1 = $("input[name=billing_address_1]").val();
                            var billing_city = $("input[name=billing_city]").val();
                            var billing_state = $("input[name=billing_state]").val();
                            var billing_zip_code = $("input[name=billing_zip_code]").val();
                            var billing_email = $("input[name=billing_email]").val();
                            var billing_phone = $("input[name=billing_phone]").val();

                            var  coupon_value = $("#coupon_value").val();

                            var shipping_address_check = $("#shipping_address_check_check:checked").val();
                            if (!shipping_address_check) {
                                shipping_address_check=0;
                            }
                            //Shipping
                            var shipping_first_name = $("input[name=shipping_first_name]").val();
                            var shipping_last_name = $("input[name=shipping_last_name]").val();
                            var shipping_country = $("#shipping_country option:selected").text();
                            var shipping_address_1 = $("input[name=shipping_address_1]").val();
                            var shipping_city = $("input[name=shipping_city]").val();
                            var shipping_state = $("input[name=shipping_state]").val();
                            var shipping_zip_code = $("input[name=shipping_zip_code]").val();
                            var shipping_email = $("input[name=shipping_email]").val();
                            var shipping_phone = $("input[name=shipping_phone]").val();

                            $.ajax({
                                url: "{{ route('order.store') }}",
                                type: "GET",
                                data:{
                                    billing_first_name:billing_first_name,
                                    billing_last_name:billing_last_name,
                                    billing_country:billing_country,
                                    billing_address_1:billing_address_1,
                                    billing_city:billing_city,
                                    billing_state:billing_state,
                                    billing_zip_code:billing_zip_code,
                                    billing_email:billing_email,
                                    billing_phone:billing_phone,

                                    shipping_address_check:shipping_address_check,

                                    shipping_first_name:shipping_first_name,
                                    shipping_last_name:shipping_last_name,
                                    shipping_country:shipping_country,
                                    shipping_address_1:shipping_address_1,
                                    shipping_city:shipping_city,
                                    shipping_state:shipping_state,
                                    shipping_zip_code:shipping_zip_code,
                                    shipping_email:shipping_email,
                                    shipping_phone:shipping_phone,

                                    payment_method:'Paid By Paypal',
                                    coupon_value:coupon_value,
                                    total:total,
                                    payment_id:details.id,
                                },
                                success: function (data) {
                                    console.log(data);
                                    // alert('Transaction completed by ' + details.payer.name.given_name);
                                    //window.location.href="{{route('cartpro.home')}}",
                                }
                            })
                        });
                    }
                }).render('#paypal-button-container');
                $('#orderBtn').addClass('d-none');
            }
        });
    });

    //----------- Stripe ----------
    $('#stripe').on('click',function(event){
        $('#payNowPaypal').hide();
        $('#paypal-button-container').hide();
        $('#stripeContent').show();


        var billing_first_name = $("input[name=billing_first_name]").val();
        var billing_last_name = $("input[name=billing_last_name]").val();
        var billing_country = $("#billing_country").val();
        var billing_address_1 = $("input[name=billing_address_1]").val();
        var billing_city = $("input[name=billing_city]").val();
        var billing_state = $("input[name=billing_state]").val();
        var billing_zip_code = $("input[name=billing_zip_code]").val();
        var billing_email = $("input[name=billing_email]").val();
        var billing_phone = $("input[name=billing_phone]").val();
        var coupon_value = $("#coupon_value").val();

        var billing_create_account_check = $("#billing_create_account_check:checked").val();
        var username = $("input[name=username]").val();
        var password = $("input[name=password]").val();
        var password_confirmation = $("input[name=password_confirmation]").val();

        var shipping_address_check = $("#shipping_address_check:checked").val();
        if (!shipping_address_check) {
            shipping_address_check=0;
        }
        //Shipping
        var shipping_first_name = $("input[name=shipping_first_name]").val();
        var shipping_last_name = $("input[name=shipping_last_name]").val();
        var shipping_country_stripe = $("#shipping_country").val();
        var shipping_address_1 = $("input[name=shipping_address_1]").val();
        var shipping_city = $("input[name=shipping_city]").val();
        var shipping_state = $("input[name=shipping_state]").val();
        var shipping_zip_code = $("input[name=shipping_zip_code]").val();
        var shipping_email = $("input[name=shipping_email]").val();
        var shipping_phone = $("input[name=shipping_phone]").val();
        var total = $('.total_amount').text();

        var card_number = $('.card-num').val();
        var cvc = $('.card-cvc').val();
        var card_expiry_month = $('.card-expiry-month').val();
        var card_expiry_year = $('.card-expiry-year').val();

            var $form = $(".validation");
            $('form.validation').bind('submit', function(e) {
                var $form = $(".validation"),
                inputVal  = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'].join(', '),
                $inputs      = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid        = true;
                $errorStatus.addClass('d-none');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorStatus.removeClass('d-none');
                        e.preventDefault();
                    }
                });
                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-num').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeHandleResponse);
                }
            });

            function stripeHandleResponse(status, response) {
                if (response.error) {
                    $('.error').removeClass('d-none').find('.alert').text(response.error.message);
                }else {
                    var billing_create_account_check = $("#billing_create_account_check:checked").val();
                    if (billing_create_account_check) {
                        $.ajax({
                            url: "{{ route('customer.register') }}",
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: 'JSON',
                            data: {
                                billing_first_name:billing_first_name,
                                billing_last_name:billing_last_name,
                                username:username,
                                billing_email:billing_email,
                                billing_phone:billing_phone,
                                password:password,
                                password_confirmation:password_confirmation,
                                billing_create_account_check:billing_create_account_check
                            },
                            success: function (data) {
                                let html = '';
                                if (data.errors) {
                                    for (var count = 0; count < data.errors.length; count++) {
                                        html += '<p>' + data.errors[count] + '</p>';
                                    }
                                    $('#alert_div').removeClass('d-none');
                                    $('#alert_message').html(html);
                                }
                                else if (data.type=='success') {
                                    console.log('OK');
                                }
                            }
                        })
                    }
                    var token = response['id'];
                    $.ajax({
                        url: "{{route('stripe.payment')}}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: "json",
                        data:{
                            billing_first_name:billing_first_name,
                            billing_last_name:billing_last_name,
                            billing_country:billing_country,
                            billing_address_1:billing_address_1,
                            billing_city:billing_city,
                            billing_state:billing_state,
                            billing_zip_code:billing_zip_code,
                            billing_email:billing_email,
                            billing_phone:billing_phone,
                            coupon_value:coupon_value,

                            billing_create_account_check:billing_create_account_check,
                            username:username,
                            password:password,
                            password_confirmation:password_confirmation,

                            shipping_address_check:shipping_address_check,
                            shipping_first_name:shipping_first_name,
                            shipping_last_name:shipping_last_name,
                            shipping_country_stripe:shipping_country_stripe,
                            shipping_address_1:shipping_address_1,
                            shipping_city:shipping_city,
                            shipping_state:shipping_state,
                            shipping_zip_code:shipping_zip_code,
                            shipping_email:shipping_email,
                            shipping_phone:shipping_phone,
                            total:total,

                            card_number:card_number,
                            cvc:cvc,
                            card_expiry_month:card_expiry_month,
                            card_expiry_year:card_expiry_year,
                            stripeToken:token
                        },
                        success: function (data) {
                            // console.log(data);
                            window.location.href = "{{ route('cartpro.home')}}";
                        }
                    });
                }
            }
    });

    $('#cashOnDelivery').on('click',function(event){
        $('#stripeContent').hide();



        $('#orderBtn').on('click',function(event){

            var billing_create_account_check = $("#billing_create_account_check:checked").val();
            if (billing_create_account_check) {
                var billing_first_name = $("input[name=billing_first_name]").val();
                var billing_last_name = $("input[name=billing_last_name]").val();
                var username = $("input[name=username]").val();
                var billing_email = $("input[name=billing_email]").val();
                var billing_phone = $("input[name=billing_phone]").val();
                var password = $("input[name=password]").val();
                var password_confirmation = $("input[name=password_confirmation]").val();
                $.ajax({
                    url: "{{ route('customer.register') }}",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'JSON',
                    data: {
                        billing_first_name:billing_first_name,
                        billing_last_name:billing_last_name,
                        username:username,
                        billing_email:billing_email,
                        billing_phone:billing_phone,
                        password:password,
                        password_confirmation:password_confirmation,
                        billing_create_account_check:billing_create_account_check
                    },
                    success: function (data) {
                        console.log(data);
                        let html = '';
                        if (data.errors) {
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            $('#alert_div').removeClass('d-none');
                            $('#alert_message').html(html);
                        }
                        else if (data.type=='success') {
                            console.log('OK');
                        }
                    }
                })
            }

            var billing_first_name = $("input[name=billing_first_name]").val();
            var billing_last_name = $("input[name=billing_last_name]").val();
            var billing_country = $("#billing_country").val();
            var billing_address_1 = $("input[name=billing_address_1]").val();
            var billing_city = $("input[name=billing_city]").val();
            var billing_state = $("input[name=billing_state]").val();
            var billing_zip_code = $("input[name=billing_zip_code]").val();
            var billing_email = $("input[name=billing_email]").val();
            var billing_phone = $("input[name=billing_phone]").val();

            var  coupon_value = $("#coupon_value").val();

            var shipping_address_check = $("#shipping_address_check_check:checked").val();
            if (!shipping_address_check) {
                shipping_address_check=0;
            }
            //Shipping
            var shipping_first_name = $("input[name=shipping_first_name]").val();
            var shipping_last_name = $("input[name=shipping_last_name]").val();
            var shipping_country = $("#shipping_country option:selected").text();
            var shipping_address_1 = $("input[name=shipping_address_1]").val();
            var shipping_city = $("input[name=shipping_city]").val();
            var shipping_state = $("input[name=shipping_state]").val();
            var shipping_zip_code = $("input[name=shipping_zip_code]").val();
            var shipping_email = $("input[name=shipping_email]").val();
            var shipping_phone = $("input[name=shipping_phone]").val();

            var total = $('.total_amount').text();

            $.ajax({
                url: "{{ route('order.cash_on_delivery') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON',
                data:{
                    billing_first_name:billing_first_name,
                    billing_last_name:billing_last_name,
                    billing_country:billing_country,
                    billing_address_1:billing_address_1,
                    billing_city:billing_city,
                    billing_state:billing_state,
                    billing_zip_code:billing_zip_code,
                    billing_email:billing_email,
                    billing_phone:billing_phone,

                    shipping_address_check:shipping_address_check,

                    shipping_first_name:shipping_first_name,
                    shipping_last_name:shipping_last_name,
                    shipping_country:shipping_country,
                    shipping_address_1:shipping_address_1,
                    shipping_city:shipping_city,
                    shipping_state:shipping_state,
                    shipping_zip_code:shipping_zip_code,
                    shipping_email:shipping_email,
                    shipping_phone:shipping_phone,

                    payment_method:'Paid By Paypal',
                    coupon_value:coupon_value,
                    total:total,
                },
                success: function (data) {
                    console.log(data);
                    // alert('Transaction completed by ' + details.payer.name.given_name);
                    //window.location.href="{{route('cartpro.home')}}",
                }
            });

        });
    });
});
</script>
@endpush
