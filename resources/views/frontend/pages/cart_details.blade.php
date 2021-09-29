@extends('frontend.layouts.master')
@section('frontend_content')


    <!--Shop cart starts-->
    <section class="shop-cart-section pt-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title h2 text-center uppercase mt-1 mb-5">Your Cart</h1>
                </div>
                <div class="col-lg-8">
                    <div class="table-content table-responsive cart-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cart_content as $item)
                                    <tr>
                                        <td class="cart-product">
                                            <div class="item-details">
                                                <a><input type="hidden" id="deleteCart" value="{{$item->rowId}}"><i class="ti-close"></i></a>
                                                <img src="{{asset('public/'.$item->options->image ?? null)}}" alt="...">
                                                <div class="">
                                                    <a href="{{url('product/'.$item->options->product_slug.'/'. $item->options->category_id)}}">
                                                        <h3 class="h6">{{$item->name}}</h3>
                                                    </a>
                                                    <div class="input-qty">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="quantity-left-minus">
                                                                <span class="ti-minus"></span>
                                                            </button>
                                                        </span>
                                                        <input type="text" class="input-number" value="{{$item->qty}}">
                                                        <span class="input-group-btn">
                                                            <button type="button" class="quantity-right-plus">
                                                                <span class="ti-plus"></span>
                                                            </button>
                                                        </span>
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
                                            <div class="cart-amount-mobile">Total:
                                                <span class="amount">
                                                    $90.00
                                                </span>
                                            </div>
                                        </td>
                                        <td class="cart-product-subtotal">
                                            <span class="amount">
                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                    {{$item->subtotal}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                @else
                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{$item->subtotal}}
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>

                        <a href="{{route('cartpro.home')}}" class="button style3"><i class="ti-arrow-left"></i> Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form class="newsletter">
                        <input class="" type="text" placeholder="Enter coupon code" name="coupon">
                        <button class="button style1 btn-search" type="submit">Apply</button>
                    </form>

                    <div class="cart-subtotal">
                        <div class="subtotal">
                            <div class="label">Subtotal</div>
                            <div class="price">
                                @if(env('CURRENCY_FORMAT')=='suffix')
                                    {{$cart_total}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                @else
                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{$cart_total}}
                                @endif
                            </div>
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
                    </div>

                    <a href="shop-checkout.html" class="button lg style1 d-block text-center">Proceed to Checkout</a>
                </div>
            </div>

        </div>
    </section>
    <!--Shop cart ends-->



@endsection
