@php
session_start();

    $total_qty = session()->has('total_qty') ? session()->get('total_qty') : 0;
    $subTotal = session()->has('subTotal') ? session()->get('subTotal') : 0;

    $subTotal = number_format($subTotal,2);
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Document Title -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="author" content="LionCoders" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Links -->
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/images/favicon.png') }}" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{ asset('public/frontend/css/plugins.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/frontend/css/bootstrap-select.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!-- style CSS -->
    <link href="{{ asset('public/frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/frontend/css/payment-fonts.css') }}" rel="stylesheet" />
</head>

<body>
    <!--Header Area starts-->
    <header>
        <div id="header-middle" class="header-middle">
            <div class="container">
                <div class="d-flex justify-content-between align-baseline">
                    <div class="mobile-menu-icon d-lg-none"><i class="ti-menu"></i></div>
                    <div class="logo">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('public/frontend/images/logo-black.png') }}" alt="Brand logo">
                        </a>
                    </div>
                    <form class="header-search">
                        <div class="header-search-container">
                            <input id="search" type="text" placeholder="Search products..." name="search">
                        </div>
                        <button class="btn btn-search" type="submit"><i class="ti-search"></i></button>
                    </form>
                    <div class="fixed-menu"></div>
                    <ul class="offset-menu-wrapper">
                        @guest
                        <li> 
                            <a href="{{ url('login')}}">Login</a>
                        </li>
                        @endguest
                        @if(auth()->user())
                        <li class="user-menu">
                            <i class="ti-user"></i>
                            <ul class="user-dropdown-menu">
                                <li><a href="{{url('/dashboard')}}">My Account</a></li>
                                <li><a href="{{url('/orders')}}">Order History</a></li>
                                <!-- <li><a href="{{url('/wishlist')}}">Wishlist</a></li> -->
                                <li><a href="{{url('/checkout')}}">Checkout</a></li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-link" type="submit"><i class="dripicons-exit"></i> {{trans('file.logout')}}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <li class="cart__menu">
                            <i class="ti-bag"></i>
                            <span class="badge badge-light cart_qty">{{ $total_qty ?? 0}}</span>
                            <span class="total">$ {{ $subTotal ?? 0.00}}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-header-inner">
                            <div id="main-menu" class="main-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        <li {{ (request()->is('/')) ? 'class=active' : '' }} {{ (request()->is('/')) ? 'class=active' : '' }}><a href="{{ url('/') }}">Home</a></li>
                                        <li {{ (request()->is('/shirts')) ? 'class=active' : '' }}><a href="{{ url('/collections/shirts') }}">Shirts</a></li>
                                        <li {{ (request()->is('/hoodies')) ? 'class=active' : '' }}><a href="{{ url('/collections/hoodies') }}">Hoodies</a></li>
                                        <li {{ (request()->is('/contact')) ? 'class=active' : '' }}><a href="{{ url('contact') }}">Contact</a></li>                                        
                                        @php

                                            // $data = \App\Navigation::with('childs','page')
                                            //         ->where('parent_id',NULL)
                                            //         ->where('is_active',1)
                                            //         ->get();   

                                            $storefront_menu = \App\Models\StorefrontMenu::with('menu')->first();

                                            if (($storefront_menu->primary_menu_id !=NULL) && ($storefront_menu->menu->count()>0)) {

                                                $data = \App\Models\MenuItem::with('childs','page')
                                                    ->where('menu_id',$storefront_menu->primary_menu_id)
                                                    ->where('parent_id',NULL)
                                                    ->where('is_active',1)
                                                    ->get();  
                                            }
                                        @endphp

                                        <!--Testing-->

                                        {{-- @foreach ($data as $item)
                                            @if ($item->type=='page')
                                                <li><a href="{{ route('page.slug',$item->page->meta_title)}}" @if($item->target=='new_tab') target="_blank" @endif >{{$item->item_name}}</a></li>
                                            @elseif ($item->type=='url')
                                                <li>
                                                    <a href="{{ $item->url }}" @if($item->target=='new_tab') target="_blank" @endif>{{$item->item_name}}</a>
                                                </li>
                                            @endif
                                        @endforeach --}}

                                        @if (isset($data))
                                            @foreach ($data as $item)
                                                @if ($item->childs->count()>0)
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{$item->item_name}}</a>
                                                        <div class="dropdown-menu">
                                                            @foreach ($item->childs as $subMenu)
                                                                @if ($item->type=='category')
                                                                    <li><a href="#" @if($subMenu->target=='new_tab') target="_blank" @endif >{{$subMenu->item_name}}</a></li>
                                                                @elseif ($subMenu->type=='page')
                                                                    <li><a href="{{ route('page.slug',$subMenu->page->meta_title)}}" @if($subMenu->target=='new_tab') target="_blank" @endif >{{$subMenu->item_name}}</a></li>
                                                                @elseif($subMenu->type=='url')
                                                                    <a class="dropdown-item" href="{{ $subMenu->url }}" @if($subMenu->target=='new_tab') target="_blank" @endif>{{$subMenu->item_name}}</a>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </li>
                                                @else 
                                                    @if ($item->type=='category')
                                                        <li><a href="#" @if($item->target=='new_tab') target="_blank" @endif >{{$item->item_name}}</a></li>
                                                    @elseif ($item->type=='page')
                                                        <li><a href="{{ route('page.slug',$item->page->meta_title)}}" @if($item->target=='new_tab') target="_blank" @endif >{{$item->item_name}}</a></li>
                                                    @elseif($item->type=='url')
                                                        <li><a href="{{ $item->url }}" @if($item->target=='new_tab') target="_blank" @endif>{{$item->item_name}}</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                       
                                        <!--Testing-->
                                        {{-- @elseif ($item->type=='url' && $item->parent_id!=NULL)
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else here</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#">Separated link</a>
                                                    </div>
                                                </li> --}}
                                        {{-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="#">Action</a>
                                            </div>
                                        </li> --}}

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="body__overlay"></div>
    <!-- Offset Wrapper starts-->
    <div class="offset__wrapper">
        <div class="shopping__cart">
            <div class="shopping__cart__header">
                <span class="h6">My Cart</span>
                <div class="offsetmenu__close__btn">
                    <i class="ion-ios-close-empty"></i>
                </div>
            </div>
            <div class="shopping__cart__inner">
                <div class="shp__cart__wrap">
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $cart_product)
                        @php
                            $images = explode(',',$cart_product['image']);
                        @endphp
                        <div class="shp__single__product" id="cart-item-{{ $cart_product['sku'] }}">
                            <div class="shp__pro__thumb">
                                @if($cart_product['parent_sku'])
                                <img src="{{ asset('public/images/products/') }}/{{$cart_product['parent_sku']}}/small/{{ $images[0] }}" alt="..."> 
                                @else
                                <img src="{{ asset('public/images/products/') }}/{{$cart_product['sku']}}/small/{{ $images[0] }}" alt="...">
                                @endif
                            </div>
                            <div class="shp__pro__details">
                                <h2>{{ $cart_product['name'] }} - {{ $cart_product['color'] }} - {{ $cart_product['size'] }}</h2>
                                <span>{{ $cart_product['qty'] }}</span> x <span class="shp__price">$ {{ $cart_product['total_price'] / $cart_product['qty'] }}</span>
                            </div>
                            <div class="remove__btn">
                                <a class="remove-from-cart" data-sku="{{ $cart_product['sku'] }}" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                
            </div>
            <div class="shopping__cart__footer">
                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price">$ {{ $subTotal ?? 0.00 }}</li>
                </ul>
                <a href="{{ url('cart/') }}" class="button style1">View Cart</a>
                <a href="{{ url('checkout/') }}" class="button style2">Checkout</a>
            </div>
        </div>
    </div>
    <!-- Offset Wrapper ends -->
    <!-- Header Area  ends -->

    <div class="alert alert-dismissible text-center fade" role="alert">
        <button type="button" class="close"><i class="ion ion-ios-close-empty"></i></button>
        <div class="message">
        </div>
    </div>
    @yield('content')
    
    <!--Scroll to top starts-->
    <a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
    <!--Scroll to top ends-->
    <!-- Footer section Starts-->
    <div class="footer-wrapper pt-0">
        <div class="container">
            <div class="row footer-bottom mt-0">
                <div class="col-md-6">
                    <p>&copy; 2020. All rights reserved</p>
                </div>
                <div class="col-md-6">
                    <div class="footer-payment-options">
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Paypal"><i class="pw pw-paypal"></i></span>
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Visa"><i class="pw pw-visa"></i></span>
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Mastercard"><i class="pw pw-mastercard"></i></span>
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Amex"><i class="pw pw-american-express"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer section Ends-->
    <!-- Quick Shop Modal starts -->
    <div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ti-close"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="" alt="" />
                        </div>
                        <div class="col-md-6">
                            <h3 class="item-name"></h3>
                            <div class="item-price"></div>
                            <div class="item-short-description">
                                <p></p>
                            </div>
                            <div class="item-options">
                                <form id="" method="post" class="mar-bot-20">
                                    @csrf
                                    <div class="input-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus">
                                                <span class="ti-minus"></span>
                                            </button>
                                        </span>
                                        <input type="number" name="qty" class="input-number" value="1" min="1">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus">
                                                <span class="ti-plus"></span>
                                            </button>
                                        </span>
                                    </div>
                                    <br>
                                    <input class="product-id" type="hidden" name="product_id" value="">
                                    <button data-id="" class="button style1 mar-tb-0 add-to-cart-modal"><i class="ti-shopping-cart"></i> Add to cart</button>
                                </form>
                                <a class="btn btn-link btn-sm"><i class="ti-heart"></i> Add to wishlist</a>
                            </div>
                            <div class="item-share  mar-top-30"><span>Share</span>
                                <ul class="footer-social d-inline pad-left-15">
                                    <li><a href="#"><i class="ti-facebook"></i></a></li>
                                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                                    <li><a href="#"><i class="ti-instagram"></i></a></li>
                                    <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
    <!--Plugin js -->
    <script src="{{ asset('public/frontend/js/plugin.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bootstrap-typeahead.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap/js/bloodhound.min.js') }}"></script>
    <script src="{{ asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js') }}"></script>
    <!-- Main js -->
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>

    <script type="text/javascript">
        "use strict";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //SEARCH FIELD SUGGESTION
        if(('#search').length > 0) {
            var products = new Bloodhound({
                datumTokenizer: function(datum) {
                    return Bloodhound.tokenizers.whitespace(datum.value);
                },
                queryTokenizer: Bloodhound.tokenizers.whitespace,

                remote: {
                    wildcard: '%QUERY',
                    url: "{{url('/')}}/search/%QUERY",

                },
            });

            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 2,
            },
            {
                name: 'Products',
                display: 'value',
                source: products,
                limit: 10,
                templates: {
                    notFound: [
                        "<div class=empty-message>",
                        "no items found matching your query!",
                        "</div>"
                      ].join("\n"),
                    //   footer : [
                    //     '<div class="more-results">',
                    //       '<button class="btn btn-search btn-block" type="submit">More Results</button>',
                    //     '<div>'
                    //   ].join('\n'),
                      suggestion: function(product) {
                        var image = product.image.split(',');
                        return "<div class=\"search-result\"><a href=\"{{url('/products')}}/"+product.slug+"/"+product.sku+"\"><img src=\"{{url('/')}}/public/images/products/"+product.sku+"/small/"+image[0]+"\">&nbsp;"+product.product_name+"</a></div>";
                    }
                }   
            })
        }

        // Show empty cart message
        var cart_total = $('.shoping__total .total__price').html();

        if(parseFloat(cart_total.replace('$ ', '')) < 1) {
            $('.shp__cart__wrap').html('<h6 class="mar-top-30">No item in your cart</h6>');
        }

        // sidebar cart show products in cart
        $(document).on('click', '.cart__menu', function() {
            var route = "{{ route('cart') }}";
            $.ajax({
                url: route,
                type:"GET",
                success:function(response){
                    console.log(response);
                    if(response.cart) {
                        $('.shp__cart__wrap').html('');
                        $.each(response.cart, function( index, value ) {
                            var image = value.image.split(',');
                            if(value.parent_sku){
                                var sku = value.parent_sku;
                            } else {
                                var sku = value.sku;
                            }
                            var item =  '<div class="shp__single__product" id="cart-item-'+value.sku+'"><div class="shp__pro__thumb"><a href="#"><img src="{{asset('/')}}/public/images/products/'+sku+'/small/'+image[0]+'" alt="product images"></a></div><div class="shp__pro__details"><h2>'+value.name+'-'+value.color+'-'+value.size+'</h2><span>'+value.qty+'</span> x <span class="shp__price">'+(value.total_price/value.qty)+'</span></div><div class="remove__btn"><a class="remove-from-cart" data-sku="'+value.sku+'" title="Remove this item"><i class="ion-ios-close-empty"></i></a></div></div>';
                            $('.shp__cart__wrap').append(item);
                        })
                        $('.shoping__total .total__price').html('$ '+response.subTotal);

                        if(parseFloat(response.subTotal) < 1) {
                            $('.shp__cart__wrap').html('<h6 class="mar-top-30">No item in your cart</h6>');
                        }
                    }
                },
            });
        })

        // Remove from sidebar cart
        $(document).on('click', '.remove-from-cart', function(e){
            e.preventDefault();
            var sku = $(this).data('sku');

            var route = "{{ route('removeFromCart') }}";

            $(this).parent().parent().remove();

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
                        $('.shoping__total .total__price').html('$ '+response.subTotal);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('.cart__menu .total').html('$ '+response.subTotal);
                        

                        if(response.subTotal < 1) {
                            $('.shp__cart__wrap').html('<h6 class="mar-top-30">No item in your cart</h6>');
                            $('.cart__menu .cart_qty').html('0');
                            $('.cart__menu .total').html('$ 0');

                            setTimeout(function() {
                                $('.alert').removeClass('show');
                            }, 4000);
                        }
                    }
                },
            });
        })

        // Open Modal
        $(document).on('click','.view-details', function(){
            var product_id = $(this).data('id');
            var product_name = $(this).data('name');
            var product_price = $(this).data('price');
            var qty = $(this).data('qty');
            var product_promotion_price = $(this).data('promotion-price');
            var product_details = $(this).data('details');
            var product_image = "{{ asset('public/images/product/large') }}/"+$(this).data('image');

            $('#detailsModal img').attr('src', product_image);
            $('#detailsModal .product-id').val(product_id);
            $('#detailsModal .item-name').html(product_name);
            if(product_promotion_price > 1) {
               $('#detailsModal .item-price').html('$ '+product_promotion_price); 
            } else {
                $('#detailsModal .item-price').html('$ '+product_price);
            }
            $('#detailsModal .item-short-description').html(product_details);
        })

        $(document).on('click', '.add-to-cart-modal', function(e){
            e.preventDefault();
            var id = $(this).siblings('.product-id').val();
            var parent = '#add_to_cart_modal_'+id;

            var qty = $(parent+" input[name=qty]").val();

            var route = "{{ route('addToCart') }}";

            $.ajax({
                url: route,
                type:"POST",
                data:{
                    product_id: id,
                    qty: qty,
                },
                success:function(response){
                    console.log(response);
                    if(response) {
                        $('.alert').addClass('alert-custom show');
                        $('.alert-custom .message').html(response.success);
                        $('.cart__menu .cart_qty').html(response.total_qty);
                        $('.cart__menu .total').html('$ '+response.subTotal);
                        $('#detailsModal').modal('toggle');

                        setTimeout(function() {
                            $('.alert').removeClass('show');
                        }, 4000);
                    }
                },
            });
        })
    </script>

    @yield('script')
</body>

</html>