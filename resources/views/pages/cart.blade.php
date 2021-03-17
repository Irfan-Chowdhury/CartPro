@extends('layouts.app')
@section('content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">Shop Cart</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Shop Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!--Shop cart starts-->
    <section class="shop-cart-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="cart-table table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="cart-product-name">Product</th>
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
                                                <a class="remove-from-cart-cart" title="Remove from Cart" data-sku="{{$cart_product['sku']}}">
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
                                                <button type="button" class="cart-quantity-left-minus"data-sku="{{$cart_product['sku']}}">
                                                    <span class="ti-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" class="input-number" value="{{ $cart_product['qty'] }}">
                                            <span class="input-group-btn">
                                                <button type="button" class="cart-quantity-right-plus"data-sku="{{$cart_product['sku']}}">
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
                        <h4 class="text-right pad-lr-45 mar-tb-30">Sub Total: $ <span class="sub_total">{{ $subTotal ?? 0.00 }}</span></h4>
                    </div>
                </div>
            </div>
            <div class="row pad-lr-45">
                <div class="col-md-6  col-sm-6 col-12 mar-top-40 text-center">
                    <a href="{{ url('shop') }}" class="button style3">Continue Shopping</a>
                </div>
                <div class="col-md-6 col-sm-6 col-12 mar-top-40 text-center">
                    <a href="{{ url('checkout') }}" class="button style1">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    </section>
    <!--Shop cart ends-->
@endsection

@section('script')
  <script type="text/javascript">
    "use strict";

    $(document).on('click', '.remove-from-cart-cart', function(e){
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
                    if(response) {
                        $('.alert').addClass('alert-custom show');
                        $('.alert-custom .message').html(response.success);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('.cart__menu .total').html('$ '+response.subTotal);
                        $('.sub_total').html(response.subTotal);

                        if(response.subTotal < 1) {
                            $('.shp__cart__wrap').html('<h6 class="mar-top-30">No item in your cart</h6>');
                            $('.cart__menu .cart_qty').html('0');
                            $('.cart__menu .total').html('$ 0');
                            $('.sub_total').html('0');
                        }
                    }
                },
            });
        })

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
                        $('.cart__menu .total').html('$ '+response.subTotal);
                    },
                });
            }
        });
  </script>
@endsection