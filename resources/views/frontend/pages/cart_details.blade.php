@extends('frontend.layouts.master')
@section('frontend_content')

<!--Breadcrumb Area start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Shop Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Area ends-->



    <!--Shop cart starts-->
    <section class="shop-cart-section pt-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="page-title h2 text-center uppercase mt-1 mb-5">Your Cart</h1>
                </div>
                <div class="col-lg-8">
                    <div class="table-content table-responsive cart-table">
                        <table class="table" >
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
                                                        <a href="{{url('product/'.$item->options->product_slug.'/'. $item->options->category_id)}}">
                                                            <h3 class="h6">{{$item->name}}</h3>
                                                        </a>
                                                        <div class="input-qty">
                                                            <form class="quantity_change_submit" data-id="{{$item->rowId}}" method="get">
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="quantity-left-minus " data-id="{{$item->rowId}}">
                                                                        <span class="ti-minus"></span>
                                                                    </button>
                                                                </span>
                                                                <input type="text" class="input-number {{$item->rowId}}" value="{{$item->qty}}">
                                                                <span class="input-group-btn">
                                                                    <button type="submit" class="quantity-right-plus quantity_change" data-id="{{$item->rowId}}">
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
                                                {{-- <div class="cart-amount-mobile">Total:
                                                    <span class="amount">
                                                        $90.00
                                                    </span>
                                                </div> --}}
                                            </td>
                                            <td class="cart-product-subtotal">
                                                <span class="amount">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        <span class="subtotal_{{$item->rowId}}">{{$item->subtotal}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                    @else
                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="subtotal_{{$item->rowId}}">{{$item->subtotal}}</span>
                                                    @endif
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </div>
                            </tbody>
                        </table>

                        <a href="{{route('cartpro.home')}}" class="button style3"><i class="ti-arrow-left"></i> Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-4">

                    <form action="{{route('cart.checkout')}}" method="post">
                    @csrf
                        {{-- <form class="newsletter">
                            <input class="" type="text" placeholder="Enter coupon code" name="coupon">
                            <button class="button style1 btn-search" type="submit">Apply</button>
                        </form> --}}

                        <div class="cart-subtotal">
                            <div class="subtotal">
                                <div class="label">Subtotal</div>
                                <div class="price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        <span class="cartSubtotal">{{$cart_subtotal}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                    @else
                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="cartSubtotal">{{$cart_subtotal}}</span>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="shipping">
                                <div class="label">Shiping</div>
                                @if ($setting_free_shipping->shipping_status==1)
                                    <div class="custom-control custom-radio mt-3">
                                        <input type="radio" name="shipping" class="custom-control-input shippingCharge" value="{{$setting_free_shipping->minimum_amount ?? 0}}">
                                        <label class="custom-control-label">{{$setting_free_shipping->label ?? null}}
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
                                        <input type="radio" name="shipping" class="custom-control-input shippingCharge" value="{{$setting_local_pickup->cost ?? null}}">
                                        <label class="custom-control-label">{{$setting_local_pickup->label ?? null}}
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
                                        <input type="radio" name="shipping" class="custom-control-input shippingCharge" value="{{$setting_flat_rate->cost ?? null}}">
                                        <label class="custom-control-label">{{$setting_flat_rate->label ?? null}}
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
                            </div> --}}
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
                        </div>
                        <button type="submit" class="button lg style1 d-block text-center">Proceed to Checkout</button>
                    </form>
                </div>
            </div>

        </div>
    </section>
    <!--Shop cart ends-->



@endsection
