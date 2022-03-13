@extends('frontend.layouts.master')

@section('extra_css')

@section('frontend_content')
<!--Breadcrumb Area start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="home.html">@lang('file.Home')</a></li>
                    <li class="active">@lang('file.Checkout')</li>
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
                    <h1 class="page-title h2 text-center uppercase mt-1 mb-5">@lang('file.Checkout')</h1>
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

            @if (session()->has('message'))
                <div class="d-flex justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('message')}}!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <!-- Error Message -->
                @include('frontend.includes.error_message')
            <!-- Error Message -->

            <div class="row">
                <form action="{{route('payment.process')}}" method="POST"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" class="validation" id="payment-form">
                    @csrf
                    <input type="hidden" name="shipping_type" id="shippingType">
                    <input type="hidden" name="totalAmount" class="cart_total" id="totalAmount" value="{{$cart_total}}">
                    <input type="hidden" name="tax_id" id="taxId">
                    <input type="hidden" name="shipping_cost_temp" id="shippingCost">
                    <input type="hidden" name="coupon_code_temp" id="couponCode">
                    <input type="hidden" name="coupon_value_temp" id="couponValue">

                    <div class="row">
                        <div class="col-md-6 mar-top-30">
                            <h3 class="section-title">@lang('file.Billing Details')</h3>

                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="billing_first_name" placeholder="First Name *">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="billing_last_name" placeholder="Last Name *">
                                </div>


                            <div class="col-sm-6">
                                <input class="form-control" type="email" name="billing_email"  placeholder="Email *">
                            </div>
                            <div class="col-sm-6">
                                <input class="form-control" type="number" name="billing_phone" min='0' onkeypress="return isNumberKey(event)" placeholder="Phone *">
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <select class="form-control" name="billing_country" id="billingCountry">
                                        <option value="">* Select Country</option>
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
                        </div>


                            @if (!Auth::check())
                                <div class="custom-control custom-checkbox mt-5" data-bs-toggle="collapse" href="#create_account_collapse" role="button" aria-expanded="false" aria-controls="create_account_collapse">
                                    <input type="checkbox" class="custom-control-input" name="billing_create_account_check" id="billing_create_account_check" value="1">
                                    <label class="label custom-control-label" for="create_account">Create Account</label>
                                </div>
                            @endif


                            <div class="collapse" id="create_account_collapse">
                                <input class="form-control mt-3 @error('username') is-invalid @enderror" value="{{ old('username') }}" type="text" placeholder="Enter Username" name="username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input class="form-control mt-3 @error('password') is-invalid @enderror" type="password" placeholder="Enter Password" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input class="form-control mt-3 @error('password_confirmation') is-invalid @enderror" type="password" placeholder="Enter Confirm Password" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-control custom-checkbox mt-4 mb-3" data-bs-toggle="collapse" href="#shipping_address_collapse" role="button" aria-expanded="false" aria-controls="shipping_address_collapse">
                                <input type="checkbox" class="custom-control-input" id="shipping_address_check" name="shipping_address_check" value="1">
                                <label class="label custom-control-label" for="shipping_address">@lang('file.Ship to a different address')</label>
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
                                            <select class="form-control" name="shipping_country" id="shipping_country">
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
                                        <input class="form-control" type="text" name="shipping_email" placeholder="Email">
                                    </div>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="text" name="shipping_phone" min='0' onkeypress="return isNumberKey(event)" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mar-top-30">
                            <h3 class="section-title">@lang('file.Your order')</h3>
                            <div class="cart-subtotal">
                                <div class="table-content table-responsive cart-table">
                                    <table class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th>@lang('file.Product')</th>
                                                <th class="text-center">@lang('file.Total')</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cartTable">
                                            <div id="content">
                                                @forelse ($cart_content as $item)
                                                    <tr id="{{$item->rowId}}">
                                                        <td class="cart-product">
                                                            <div class="item-details">
                                                                {{-- <a class="remove_cart_from_details" data-id="{{$item->rowId}}"><i class="ti-close"></i></a> --}}
                                                                <img src="{{asset('public/'.$item->options->image ?? null)}}" alt="...">
                                                                <div class="">
                                                                    <h3 class="h6">{{$item->name}}</h3>
                                                                </div>
                                                            </div>
                                                            <div class="cart-amount-mobile">@lang('file.Total') <span class="amount">$70.00</span></div>
                                                        </td>
                                                        <td class="cart-product-subtotal"><span class="amount">
                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                <span class="subtotal_{{$item->rowId}}">{{$item->subtotal  * $CHANGE_CURRENCY_RATE}}</span> @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                            @else
                                                                @include('frontend.includes.SHOW_CURRENCY_SYMBOL') <span class="subtotal_{{$item->rowId}}">{{$item->subtotal * $CHANGE_CURRENCY_RATE}}</span>
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
                                    <div class="label">@lang('file.Subtotal')</div>
                                    <input type="hidden" name="subtotal" class="cartSubtotal" value="{{$cart_subtotal}}">

                                    <div class="price">
                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                            <span class="cartSubtotal">{{ number_format((float)$cart_subtotal * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}</span> @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                        @else
                                            {{-- @include('frontend.includes.SHOW_CURRENCY_SYMBOL') <span class="cartSubtotal">{{ number_format((float)$cart_subtotal * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}</span> --}}
                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') <span class="cartSubtotal">{{$cart_subtotal}}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="custom-control custom-checkbox" data-bs-toggle="collapse" href="#apply_coupon_collapse" role="button" aria-expanded="false" aria-controls="apply_coupon_collapse">
                                    <input type="checkbox" class="custom-control-input" id="apply_coupon" name="coupon_checked" value="1">
                                    <label class="label custom-control-label" for="apply_coupon">I've a coupon</label>
                                </div>
                                <div class="collapse" id="apply_coupon_collapse">
                                    <div class="newsletter" id="applyCoupon">
                                        <input type="text" placeholder="Enter Coupon Code" name="coupon_code" id="coupon_code">
                                        <input type="hidden" name="coupon_value" id="coupon_value">
                                        <button class="button style1 btn-search" type="submit">@lang('file.Apply')</button>
                                    </div>
                                </div>
                                <div class="shipping">
                                    <div class="label">@lang('file.Shiping')</div>

                                    @if (isset($setting_free_shipping) && $setting_free_shipping->shipping_status==1)
                                        <div class="custom-control custom-radio mt-3">
                                            <input type="radio" data-shipping_type='free' name="shipping_cost" class="custom-control-input shippingCharge" value="{{$setting_free_shipping->minimum_amount ?? 0}}">
                                            <label class="custom-control-label" for="customRadio1">{{$setting_free_shipping->label ?? null}}
                                                <span class="price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$setting_free_shipping->minimum_amount * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$setting_free_shipping->minimum_amount  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                </span>
                                            </label>
                                        </div>
                                    @endif

                                    @if (isset($setting_local_pickup) && $setting_local_pickup->pickup_status==1)
                                        <div class="custom-control custom-radio mt-3">
                                            <input type="radio" data-shipping_type='local_pickup' name="shipping_cost" class="custom-control-input shippingCharge" value="{{$setting_local_pickup->cost ?? null}}">
                                            <label class="custom-control-label" for="customRadio2">{{$setting_local_pickup->label ?? null}}
                                                <span class="price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$setting_local_pickup->cost * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$setting_local_pickup->cost  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                </span>
                                            </label>
                                        </div>
                                    @endif

                                    @if (isset($setting_flat_rate) && $setting_flat_rate->flat_status==1)
                                        <div class="custom-control custom-radio mt-3">
                                            <input type="radio" data-shipping_type='flat_rate' name="shipping_cost" class="custom-control-input shippingCharge" value="{{$setting_flat_rate->cost ?? null}}">
                                            <label class="custom-control-label" for="customRadio3">{{$setting_flat_rate->label ?? null}}
                                                <span class="price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$setting_flat_rate->cost * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$setting_flat_rate->cost * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
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
                                            <span class="tax_rate">0</span> @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                        @else
                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') <span class="tax_rate">0</span>
                                        @endif
                                    </div>
                                </div>

                                <hr>

                                <div class="total">
                                    <div class="label">{{__('file.Total')}}</div>
                                    <div class="price">
                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                            <span class="total_amount">{{$cart_total}}</span> @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                        @else
                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') <span class="total_amount">{{$cart_total}}</span>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="payment-options">

                                    @if (isset($cash_on_delivery) && $cash_on_delivery->status==1)
                                        <label class="custom-checkbox">
                                            <input type="radio" name="payment_type" id="cashOnDelivery" value="cash_on_delivery">
                                            <span class="sm-heading">@lang('file.Cash On Delivery')</span>
                                        </label>
                                    @endif

                                    @if (isset($paypal) && $paypal->status==1)
                                        <label class="custom-checkbox">
                                            <input type="radio" name="payment_type" id='paypal' value="paypal">
                                            <span class="card-options"><img src="{{asset('public/frontend/images/payment_gateway_logo/paypal.jpg')}}" alt="..."></span>
                                            <span class="sm-heading">{{__('file.Paypal')}}</span>
                                        </label>
                                    @endif

                                    @if (isset($stripe) && $stripe->status==1)
                                        <label class="custom-checkbox">
                                            <input type="radio" name="payment_type" id='stripe' value="stripe">
                                            <span class="card-options"><img src="{{asset('public/frontend/images/payment_gateway_logo/stripe.png')}}" alt="..."></span>
                                            <span class="sm-heading">{{__('file.Stripe')}}</span>
                                        </label>
                                    @endif

                                    @if (env('SSL_COMMERZ_STATUS')==1)
                                        <label class="custom-checkbox">
                                            <input type="radio" name="payment_type" id='sslcommerz' value="sslcommerz">
                                            <span class="card-options"><img src="{{asset('public/frontend/images/payment_gateway_logo/ssl_commerz.png')}}" alt="..."></span>
                                            <span class="sm-heading">{{__('file.SSL Commerz')}}</span>
                                        </label>
                                    @endif
                                    <div class="custom-control custom-checkbox text-center mt-5 mb-5">
                                        <input type="checkbox" class="custom-control-input" id="acceptTerms">
                                        <label class="custom-control-label" for="accept_terms">I've read and accecpt the <a class="theme-color" @isset($terms_and_condition_page_slug) href="{{route('page.Show',$terms_and_condition_page_slug)}}" target="__blank" @endisset >Terms & Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                            <!--Paypal-->
                            <div id="paypal-button-container"></div>

                            <!--Stripe-->
                            <div id="stripeContent">
                                @include('frontend.pages.payment_page.stripe_from')
                            </div>

                            <div class="checkout-actions mar-top-30">
                                <button class="button lg style1 d-block text-center w-100" disabled title="disabled"  id="orderBtn">{{__('file.Pay Now')}}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://www.paypal.com/sdk/js?client-id={{env('PAYPAL_SANDBOX_CLIENT_ID')}}&currency=USD" data-namespace="paypal_sdk"></script>


<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>

<script>
$(function(){

    $('#acceptTerms').change(function() {
        if(this.checked) {
            $('#orderBtn').prop("disabled",false);
            $('#orderBtn').prop("title",'Pay Now');
        }else{
            $('#orderBtn').prop("disabled",true);
            $('#orderBtn').prop("title",'Disable');
        }
    });

    $('#billingCountry').change(function() {
        var billingCountry = $("#billingCountry").val();
        var couponCode = $('#couponCode').val();
        var shippingCost = $("#shippingCost").val();
        $.ajax({
            url: "{{ route('cart.country_wise_tax') }}",
            type: "GET",
            data: {
                billing_country:billingCountry,
                coupon_code:couponCode,
                shipping_cost:shippingCost,
            },
            success: function (data) {
                console.log(data);
                $('.tax_rate').text(data.tax_rate);
                $('#taxId').val(data.tax_id); //For Form
                $('.total_amount').text(data.total_amount);
                $('#totalAmount').val(data.total_amount); //For Form
            }
        })

    });

    //Coupon
    $('#applyCoupon').on("click",function(e){
        e.preventDefault();
        var taxId = $('#taxId').val();
        var shippingCost = $('.shippingCharge:checked').val();
        var coupon_code = $('#coupon_code').val();
        $.ajax({
            url: "{{ route('cart.apply_coupon') }}",
            type: "GET",
            data: {tax_id:taxId, coupon_code:coupon_code,shipping_cost:shippingCost},
            success: function (data) {
                console.log(data)
                if (data.type=='success') {
                    $('.tax_rate').text(data.tax_rate);
                    $('#taxId').val(data.tax_id); //For Form
                    $('.total_amount').text(data.total_amount);
                    $('#totalAmount').val(data.total_amount); //For Form
                    $('#couponValue').val(data.coupon_value); //For Form
                }
            }
        })
    });


    //Shipping
    $('.shippingCharge').on("click",function(e){
        var shippingCost = $(this).val();
        $('#shippingCost').val(shippingCost);

        var shipping_type = $(this).data('shipping_type');
        $('#shippingType').val(shipping_type);

        var couponValue = $('#couponValue').val();
        var taxId = $('#taxId').val();

        $.ajax({
            url: "{{ route('cart.shipping_charge') }}",
            type: "GET",
            data: {shipping_cost:shippingCost,coupon_value:couponValue,tax_id:taxId},
            success: function (data) {
                console.log(data)
                if (data.type=='success') {
                    $('#couponValue').val(data.coupon_value); //For Form
                    $('.tax_rate').text(data.tax_rate);
                    $('#taxId').val(data.tax_id); //For Form
                    $('.total_amount').text(data.total_amount);
                    $('#totalAmount').val(data.total_amount); //For Form
                }
            }
        })
    });



    //----------- Paypal ----------

    $('#paypal').on('click',function(event){
        console.log(50);

        $('#payNowPaypal').show();
        $('#stripeContent').hide();

        $('#orderBtn').on('click',function(event){

            var totalAmountP = parseFloat($("input[name=totalAmount]").val()).toFixed(2);
            paypal_sdk.Buttons({
                createOrder: function(data, actions) {
                    $.ajax({
                        url: "{{route('payment.process')}}",
                        method: "POST",
                        data: $('#payment-form').serialize(),
                        success: function (data) {
                            var x = 2;
                        }
                    });
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: totalAmountP,
                                currency_code: "USD",
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                    });
                }
            }).render('#paypal-button-container');
            $('#orderBtn').addClass('d-none');
        });
    });



    //----------- Stripe ----------
    $('#stripe').on('click',function(event){
        $('#payNowPaypal').hide();
        $('#paypal-button-container').hide();
        $('#stripeContent').show();

        var $form         = $(".validation");
        $('form.validation').bind('submit', function(e) {
            var $form         = $(".validation"),
                inputVal = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'].join(', '),
                $inputs       = $form.find('.required').find(inputVal),
                $errorStatus = $form.find('div.error'),
                valid         = true;
            $errorStatus.addClass('hide');

            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorStatus.removeClass('hide');
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
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });

  // //----------- Cash On Delivery ----------
  $('#cashOnDelivery').on('click',function(event){
        // $('#stripeContent').hide();
        $('#stripeContent').empty();
        $('#paypal-button-container').hide();
  });

});
</script>
@endpush
