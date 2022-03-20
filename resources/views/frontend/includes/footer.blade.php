@if ($setting_newslatter && $setting_newslatter->newsletter==1)
<div class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6">
                <div class="d-flex align-items-center">
                    <div>
                        <i class="las la-paper-plane me-3"></i>
                    </div>
                    <div>
                        <h3 class="mb-0">@lang('file.Subscribe to our Newsletter')</h3>
                        <p>@lang('file.Subscribe and get notification about discounts')</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <form class="newsletter" id="newsLatterSubmitForm" action="{{route('cartpro.newslatter_store')}}" method="POST">
                    @csrf
                    <input type="email" placeholder="Enter your email" name="email" required>
                    <button type="submit" class="button style1 btn-search" type="submit">@lang('file.Subscribe')</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

<!--Scroll to top starts-->
<a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
<!--Scroll to top ends-->
<!-- Footer section Starts-->
<div class="footer-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-4">
                <div class="footer-logo">
                    <a href="#"><img src="{{$header_logo_path}}"></a>
                </div>
                <div class="footer-text">
                    <h5 class="text-grey mb-0">@lang('file.Got Question? Call us') :</h5>
                    <h4>{{$setting_store->store_email ?? null}}</h4>
                </div>
                <div class="footer-text">
                    <h6 class="text-grey mb-0">@lang('file.Contact Info')</h6>
                    <p><span><i class="las la-envelope"></i> &nbsp; {{$setting_store->store_email ?? null}}</span></p>
                    <p><span><i class="las la-map-marker"></i> &nbsp; {{$storefront_address}}</span></p>
                </div>
                <ul class="footer-social mt-3 p-0">
                    @if ($storefront_facebook_link!=null)
                        <li><a href="{{$storefront_facebook_link}}"><i class="ti-facebook"></i></a></li>
                    @endif
                    @if ($storefront_twitter_link!=null)
                        <li><a href="{{$storefront_twitter_link}}"><i class="ti-twitter"></i></a></li>
                    @endif
                    @if ($storefront_instagram_link!=null)
                        <li><a href="{{$storefront_instagram_link}}"><i class="ti-instagram"></i></a></li>
                    @endif
                    @if ($storefront_youtube_link!=null)
                        <li><a href="{{$storefront_youtube_link}}"><i class="ti-youtube"></i></a></li>
                    @endif
                </ul>
            </div>
            <div class="col-lg-7 col-md-8">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>{{$footer_menu_one_title}}</h3>
                            <div class="d-flex justify-content-between">
                                <ul class="footer-menu">
                                    @if ($footer_menu_one)
                                        @forelse($footer_menu_one->items as $value)
                                            @if ($value->locale==$locale)
                                                <li><a class="" href="">{{$value->label}}</a></li>
                                            @endif
                                        @empty
                                        @endforelse
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>{{$footer_menu_title_two}}</h3>
                            <ul class="footer-menu">
                                @if ($footer_menu_two)
                                    @forelse($footer_menu_two->items as $value)
                                        <li><a class="" href="">{{$value->label}}</a></li>
                                    @empty
                                    @endforelse
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="footer-widget style1">
                            <h3>Company</h3>
                            <ul class="footer-menu">
                                <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                                <li><a href="{{route('cartpro.brands')}}">@lang('file.Brands')</a></li>
                                <li><a href="{{route('cartpro.shop')}}">@lang('file.Shop')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row footer-bottom">
            <div class="col-md-6">
                <p>{!! html_entity_decode($storefront_copyright_text) !!}</p>
            </div>
            <div class="col-md-6">
                <div class="footer-payment-options">
                    <img src="{{$payment_method_image}}" width="342px" height="30px">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer section Ends-->
<!-- Cookie consent Starts-->
{{-- <div class="alert alert-primary alert-dismissible fade show cookie-alert" role="alert">
<div class="d-flex justify-content-center align-items-center">
    <i class="las la-info-circle"></i> --}}
    @include('cookieConsent::index')
{{-- </div>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> --}}
<!-- Cookie consent Ends-->
<!-- Quick Shop Modal starts -->
<div class="modal fade quickshop" id="quickshop" tabindex="-1" role="dialog" aria-labelledby="quickshop" aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="las la-times"></i></span>
            </button>
            <div class="row">
                <div class="col-md-6">
                    <div class="slider-wrapper">
                        <div class="slider-for-modal">
                            <div class="slider-for__item ex1">
                                <img src="images/products/apple-watch.png" alt="..." />
                            </div>
                            <div class="slider-for__item ex1">
                                <img src="images/products/apple-watch-2.jpg" alt="..." />
                            </div>
                            <div class="slider-for__item ex1">
                                <img src="images/products/apple-watch-3.jpg" alt="..." />
                            </div>
                            <div class="slider-for__item ex1">
                                <img src="images/products/apple-watch-4.jpg" alt="..." />
                            </div>
                        </div>
                        <div class="slider-nav-modal">
                            <div class="slider-nav__item">
                                <img src="images/products/apple-watch.png" alt="..." />
                            </div>
                            <div class="slider-nav__item">
                                <img src="images/products/apple-watch-2.jpg" alt="..." />
                            </div>
                            <div class="slider-nav__item">
                                <img src="images/products/apple-watch-3.jpg" alt="..." />
                            </div>
                            <div class="slider-nav__item">
                                <img src="images/products/apple-watch-4.jpg" alt="..." />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item-details">
                        <a class="item-category" href="">Electronics</a>
                        <h3 class="item-name">Samsung Curved Widescreen 4k Ultra HD TV</h3>
                        <div class="d-flex justify-content-between">
                            <div class="item-brand">Brand: <a href="">Samsung</a></div>
                            <div class="item-review">
                                <ul class="p-0 m-0">
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star"></i></li>
                                    <li><i class="las la-star-half"></i></li>
                                </ul>
                                <span>( 04 )</span>
                            </div>
                            <div class="item-sku">SKU: LC123456789</div>
                        </div>
                        <hr>
                        <div class="item-price">$125.30</div>
                        <hr>
                        <div class="item-short-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum eros idoni rutrum fermentum. Proin nec felis dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                        </div>
                        <hr>
                        <div class="item-variant">
                            <span>Color:</span> <span class="semi-bold">Green</span>
                            <ul class="product-variant mt-1">
                                <li class="bg-green selected"></li>
                                <li class="bg-antique"></li>
                                <li class="bg-amber"></li>
                            </ul>
                        </div>
                        <div class="item-variant">
                            <span>Size:</span> <span class="semi-bold">M</span>
                            <ul class="product-variant size-opt p-0 mt-1">
                                <li><span>S</span></li>
                                <li class="selected"><span>M</span></li>
                                <li><span>L</span></li>
                                <li><span>XL</span></li>
                            </ul>
                        </div>
                        <div class="item-options">
                            <form class="mb-3">
                                <div class="input-qty">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus">
                                            <span class="ti-minus"></span>
                                        </button>
                                    </span>
                                    <input type="number" class="input-number" value="1" min="1">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus">
                                            <span class="ti-plus"></span>
                                        </button>
                                    </span>
                                </div>
                                <button class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                            </form>
                            <button class="button button-icon style4 sm"><span><i class="ti-heart"></i> <span>Add to wishlist</span></span></button>
                            <button class="button button-icon style4 sm"><span><i class="ti-control-shuffle"></i> <span>Add to compare</span></span></button>
                        </div>
                        <hr>
                        <div class="item-share mt-3"><span>Share</span>
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
</div>
<!--Quick shop modal ends-->
<!-- Quick Shop Modal starts -->

@if (Session::get('disable_newslatter')!='yes')
    <div class="modal fade newsletter-modal" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="newsletter-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background-image: url('{{asset('public/images/storefront/newsletter/newslatter.jpg')}}') ;background-size: cover;background-position: bottom;">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="las la-times"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="h2 semi-bold">@lang('file.Subscribe and get notification about discounts')</h3>
                            <p class="lead mb-5">Subscribe to our mailing list to receive updates on new arrivals, special offers and our promotions.</p>
                            <form class="newsletter" id="newsLatterSubmitFormPopUp" action="{{route('cartpro.newslatter_store')}}" method="POST">
                                @csrf
                                <input class="" type="email" placeholder="Enter your email" name="email" required>
                                <input type="hidden" name="disable_newslatter" value="0" id="disable_popup_newslatter">
                                <button type="submit" class="button style1 btn-search" type="submit">Subscribe</button> <br>
                            </form>

                            <div class="form-check">
                                <label class="form-check-label" for="disable-popup">
                                    Got it! Don't show this popup again.
                                </label>
                                <input class="form-check-input" type="checkbox" value="1" id="disable_popup">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<!--Quick shop modal ends-->
