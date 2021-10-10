@extends('frontend.layouts.master')
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
            </div>
            <div class="row">
                <div class="col-md-6 mar-top-30">
                    <h3 class="section-title">Billing Details</h3>
                    <form class="row calculate-shipping">

                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="first-name" placeholder="First Name *">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="last-name" placeholder="Last Name *">
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <select class="form-control selectpicker">
                                    <option>Country</option>
                                    <option>Australia</option>
                                    <option>Canada</option>
                                    <option>Mexico</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="street-address" placeholder="Street Address">
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="street-address2" placeholder="Apartment, suite, unit etc. (optional)">
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="text" name="city-town" placeholder="City / Town">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="state" placeholder="State / County">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="post-code" placeholder="Postcode / Zip">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="email" placeholder="Email *">
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control" type="text" name="phone" placeholder="Phone *">
                        </div>
                        <div class="custom-control custom-checkbox mt-5" data-bs-toggle="collapse" href="#create_account_collapse" role="button" aria-expanded="false" aria-controls="create_account_collapse">
                            <input type="checkbox" class="custom-control-input" id="create_account">
                            <label class="label custom-control-label" for="create_account">Create Account</label>
                        </div>
                        <div class="collapse" id="create_account_collapse">
                            <input class="form-control mt-3" type="password" placeholder="Enter Password" name="password">
                        </div>

                        <div class="custom-control custom-checkbox mt-4 mb-3" data-bs-toggle="collapse" href="#shipping_address_collapse" role="button" aria-expanded="false" aria-controls="shipping_address_collapse">
                            <input type="checkbox" class="custom-control-input" id="shipping_address">
                            <label class="label custom-control-label" for="shipping_address">Ship to a different address</label>
                        </div>
                        <div class="collapse" id="shipping_address_collapse">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="first-name" placeholder="First Name *">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="last-name" placeholder="Last Name *">
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <select class="form-control selectpicker">
                                            <option>Country</option>
                                            <option>Australia</option>
                                            <option>Canada</option>
                                            <option>Mexico</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="street-address" placeholder="Street Address">
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="street-address2" placeholder="Apartment, suite, unit etc. (optional)">
                                </div>
                                <div class="col-12">
                                    <input class="form-control" type="text" name="city-town" placeholder="City / Town">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="state" placeholder="State / County">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="post-code" placeholder="Postcode / Zip">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="email" placeholder="Email *">
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="phone" placeholder="Phone *">
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
                                    <span class="cart_total">{{$cart_total}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="cart_total">{{$cart_total}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox" data-bs-toggle="collapse" href="#apply_coupon_collapse" role="button" aria-expanded="false" aria-controls="apply_coupon_collapse">
                            <input type="checkbox" class="custom-control-input" id="apply_coupon">
                            <label class="label custom-control-label" for="apply_coupon">I've a coupon</label>
                        </div>
                        <div class="collapse" id="apply_coupon_collapse">
                            <form class="newsletter">
                                <input class="" type="text" placeholder="Enter coupon code" name="coupon">
                                <button class="button style1 btn-search" type="submit">Apply</button>
                            </form>
                        </div>
                        <div class="shipping">
                            <div class="label">Shiping</div>
                            <div class="custom-control custom-radio mt-3">
                                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio1">Standard <span class="price">$20.00</span></label>
                            </div>
                            <div class="custom-control custom-radio mt-3">
                                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio2">Express <span class="price">$40.00</span></label>
                            </div>
                            <div class="custom-control custom-radio mt-3">
                                <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio3">Free shipping <span class="price">FREE</span></label>
                            </div>
                        </div>
                        <div class="total">
                            <div class="label">Total</div>
                            <div class="price">$377.80</div>
                        </div>
                        <hr>
                        <div class="payment-options">
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer">
                                <span class="sm-heading">Direct Bank Transfer</span>
                            </label>
                            <div class="alert alert-general no-border mar-bot-0">
                                <div class="alert-text">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div>
                            </div>
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer">
                                <span class="sm-heading">Credit card</span>
                                <span class="card-options"><img src="images/payment/payment-1.png" alt="..."></span>
                                <span class="card-options pad-right-5"><img src="images/payment/payment-2.png" alt="..."></span>
                                <span class="card-options pad-right-5"><img src="images/payment/payment-3.png" alt="..."></span>

                            </label>
                            <label class="custom-checkbox">
                                <input type="radio" name="bank-transfer">
                                <span class="sm-heading">Paypal</span>
                                <span class="card-options"><img src="images/others/paypal.jpg" alt="..."></span>
                            </label>
                            <div class="custom-control custom-checkbox text-center mt-5 mb-5">
                                <input type="checkbox" class="custom-control-input" id="accept_terms">
                                <label class="custom-control-label" for="accept_terms">I've read and accecpt the <a class="theme-color" href="">Terms & Conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-actions mar-top-30">
                        <button class="button lg style1 d-block text-center w-100">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
