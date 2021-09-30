@extends('frontend.layouts.master')
@section('frontend_content')

<!--Home Banner starts -->
<div class="banner-area v3">
    <div class="container">
        <div class="single-banner-item style2">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner-slider">
                        <!-- Item -->
                        @foreach ($sliders as $item)
                            @if ($item->sliderTranslation->isNotEmpty())
                                <div class="item">
                                    <div class="img-fill" style="background-image: url({{url('public/'.$item->slider_image)}}); background-size: cover; background-position: center;">
                                        <div class="info">
                                            <div>
                                                <h3>{{$item->sliderTranslation[0]->slider_title}}</h3>
                                                <h5>{{$item->sliderTranslation[0]->slider_subtitle}}</h5>
                                                <a class="button style1 md" href="">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    @foreach ($slider_banners as $key => $item)
                        <div class="slider-banner">
                            <div>
                                <img src="{{asset('public/'.$slider_banners[$key]['image'])}}" alt="...">
                            </div>
                            <div>
                                <h4>{{$slider_banners[$key]['title']}}</h4>
                                <a href="{{$slider_banners[$key]['action_url']}}" class="link-hov style1">Shop Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!--Home Banner Area ends-->
<section class="category-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-3">
                    <div class="d-flex align-items-center">
                        <h3><a href="#" class="button style4 mb-2 d-none d-md-block">All categories</a></h3>
                        <h3>Top categories</h3>
                    </div>
                    <!-- Add Pagination -->
                    <div class="category-navigation">
                        <div class="category-button-prev"><i class="ti-angle-left"></i></div>
                        <div class="category-button-next"><i class="ti-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="category-slider-wrapper swiper-container">
                <div class="swiper-wrapper">


                    @forelse ($categories as $item)
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="{{asset('public/'.$item->image)}}">
                                    <div class="category-name">
                                        {{$item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>


<!--Product area starts-->
@if ($settings[81]->plain_value==1)
    <section class="product-tab-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="nav nav-tabs product-details-tab" id="lionTab" role="tablist">

                        @php $i=0; @endphp
                        @foreach ($settings as $setting)
                            @if ($setting->key =='storefront_product_tabs_1_section_tab_1_title'|| $setting->key =='storefront_product_tabs_1_section_tab_2_title' || $setting->key =='storefront_product_tabs_1_section_tab_3_title' || $setting->key =='storefront_product_tabs_1_section_tab_4_title')
                                <li class="nav-item">
                                    <a @if($i==0) class="nav-link active" @else class="nav-link" @endif id="all-tab" data-bs-toggle="tab" href="#{{$setting->key}}" role="tab" aria-selected="true">{{$setting->settingTranslation->value ?? $setting->settingTranslationDefaultEnglish->value ?? null}}</a>
                                </li>
                                @php $i++ ; @endphp
                            @endif
                        @endforeach

                        {{-- <li class="nav-item">
                            <a class="nav-link" id="all-tab" data-bs-toggle="tab" href="#best" role="tab" aria-selected="true">Test Irfan</a>
                        </li> --}}
                    </ul>
                    <div class="product-navigation">
                        <div class="product-button-next v1"><i class="ti-angle-right"></i></div>
                        <div class="product-button-prev v1"><i class="ti-angle-left"></i></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content mt-3" id="lionTabContent">

                        <!-- Product_Tab_1-Section_1 -->
                        <div class="tab-pane fade show active" id="{{$product_tabs_one_titles[0] ?? null}}" role="tabpanel" aria-labelledby="all-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($product_tab_one_section_1 as $item)
                                            <div class="swiper-slide">
                                                <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                    <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                    <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                    <input type="hidden" name="qty" value="1">

                                                    <div class="single-product-wrapper">
                                                        <div class="single-product-item">
                                                            @if (isset($item->productBaseImage->image))
                                                                <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                            @else
                                                                <img src="{{asset('public/images/empty.jpg')}}">
                                                            @endif

                                                            <div class="product-promo-text style1">
                                                                <span>Sold</span>
                                                            </div>
                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a href="wishlist.html">
                                                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                                </a>
                                                                <a href="compare.html">
                                                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>

                                                            <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                                {{$item->productTranslation->product_name ?? $item->productTranslationEnglish->product_name ?? null}}
                                                            </a>

                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <div class="rating-summary">
                                                                        <div class="rating-result" title="60%">
                                                                            <ul class="product-rating">
                                                                                <li><i class="ion-android-star"></i></li>
                                                                                <li><i class="ion-android-star"></i></li>
                                                                                <li><i class="ion-android-star"></i></li>
                                                                                <li><i class="ion-android-star-half"></i></li>
                                                                                <li><i class="ion-android-star-half"></i></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        @if ($item->product->special_price>0)
                                                                            <span class="promo-price">$ {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                            <span class="old-price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @else
                                                                            <span class="price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @endif

                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    {{-- <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus">Add To Cart</i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_2 -->
                        <div class="tab-pane fade" id="{{$product_tabs_one_titles[1] ?? null}}" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($product_tab_one_section_2 as $item)
                                        <div class="swiper-slide">
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#Irfan95"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span> --}}
                                                            </a>
                                                            <a href="wishlist.html">
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                            <a href="compare.html">
                                                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($item->product->special_price>0)
                                                                        <span class="promo-price">$ {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        <span class="old-price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @else
                                                                        <span class="price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_3 -->
                        <div class="tab-pane fade" id="{{$product_tabs_one_titles[2] ?? null}}" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($product_tab_one_section_3 as $item)
                                        <div class="swiper-slide">
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            </a>
                                                            <a href="wishlist.html">
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                            <a href="compare.html">
                                                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($item->product->special_price>0)
                                                                        <span class="promo-price">$ {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        <span class="old-price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @else
                                                                        <span class="price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_4 -->
                        <div class="tab-pane fade" id="{{$product_tabs_one_titles[3] ?? null}}" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    @forelse ($product_tab_one_section_4 as $item)
                                        <div class="swiper-slide">
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            </a>
                                                            <a href="wishlist.html">
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                            <a href="compare.html">
                                                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                            <li><i class="ion-android-star-half"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($item->product->special_price>0)
                                                                        <span class="promo-price">$ {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        <span class="old-price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @else
                                                                        <span class="price">${{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                    @endif

                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>

    @forelse ($product_tab_one_section_1 as $item)
        @include('frontend.includes.quickshop')
    @empty
    @endforelse

    @forelse ($product_tab_one_section_2 as $item)
        @include('frontend.includes.quickshop')
    @empty
    @endforelse

    @forelse ($product_tab_one_section_3 as $item)
        @include('frontend.includes.quickshop')
    @empty
    @endforelse

    @forelse ($product_tab_one_section_4 as $item)
        @include('frontend.includes.quickshop')
    @empty
    @endforelse

@endif


 <!--product area ends-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="section-title mb-3">
                    <h3>Best Deals</h3>
                </div>
                <div class="deals-slider-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="single-product-wrapper deals">
                                <div class="single-product-item">
                                    <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                    <div class="product-overlay">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                        </a>
                                        <a href="wishlist.html">
                                            <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                        </a>
                                        <a href="compare.html">
                                            <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a class="product-name text-center" href="#">
                                        Samsung Curved Widescreen 4k Ultra HD TV
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="rating-summary">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <span class="promo-price">$383</span>
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="daily-deals-wrap">
                                        <!-- countdown start -->
                                        <div class="countdown-deals text-center" data-countdown="2022/5/01">
                                            <div class="cdown day">
                                                <span class="time-count">0</span>
                                                <p>Days</p>
                                            </div>
                                            <div class="cdown hour">
                                                <span class="time-count">0</span>
                                                <p>Hours</p>
                                            </div>
                                            <div class="cdown minutes">
                                                <span class="time-count">00</span>
                                                <p>mins</p>
                                            </div>
                                            <div class="cdown second">
                                                <span class="time-count">00</span>
                                                <p>secs</p>
                                            </div>
                                        </div>
                                        <!-- countdown end -->
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    sold: 75
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="single-product-wrapper deals">
                                <div class="single-product-item">
                                    <img src="{{asset('public/frontend/images/products/apple-watch-2.jpg')}}" alt="...">
                                    <div class="product-overlay">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                        </a>
                                        <a href="wishlist.html">
                                            <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                        </a>
                                        <a href="compare.html">
                                            <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a class="product-name text-center" href="#">
                                        Samsung Curved Widescreen 4k Ultra HD TV
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="rating-summary">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                <span class="promo-price">$383</span>
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div>
                                            <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="daily-deals-wrap">
                                        <!-- countdown start -->
                                        <div class="countdown-deals text-center" data-countdown="2022/5/01">
                                            <div class="cdown day">
                                                <span class="time-count">0</span>
                                                <p>Days</p>
                                            </div>
                                            <div class="cdown hour">
                                                <span class="time-count">0</span>
                                                <p>Hours</p>
                                            </div>
                                            <div class="cdown minutes">
                                                <span class="time-count">00</span>
                                                <p>mins</p>
                                            </div>
                                            <div class="cdown second">
                                                <span class="time-count">00</span>
                                                <p>secs</p>
                                            </div>
                                        </div>
                                        <!-- countdown end -->
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    sold: 75
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="deals-navigation">
                        <div class="deals-button-next"><i class="ti-angle-right"></i></div>
                        <div class="deals-button-prev"><i class="ti-angle-left"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="section-title mb-3">
                            <h3>Featured</h3>
                            <!-- Add Pagination -->
                            <div class="list-navigation">
                                <div class="list-button-prev"><i class="ti-angle-left"></i></div>
                                <div class="list-button-next"><i class="ti-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="list-slider-wrapper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-title mb-3">
                            <h3>On Sale</h3>
                            <!-- Add Pagination -->
                            <div class="list-navigation">
                                <div class="list-button-prev"><i class="ti-angle-left"></i></div>
                                <div class="list-button-next"><i class="ti-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="list-slider-wrapper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="section-title mb-3">
                            <h3>Top Selling</h3>
                            <!-- Add Pagination -->
                            <div class="list-navigation">
                                <div class="list-button-prev"><i class="ti-angle-left"></i></div>
                                <div class="list-button-next"><i class="ti-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="list-slider-wrapper swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-product-wrapper list">
                                        <div class="single-product-item">
                                            <img src="{{asset('public/frontend/images/products/redPhone-300x300.png')}}" alt="...">
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="#">
                                                Samsung Curved Widescreen 4k Ultra HD TV
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <div class="rating-summary">
                                                        <div class="rating-result" title="60%">
                                                            <ul class="product-rating">
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                                <li><i class="ion-android-star-half"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-price">
                                                        <span class="promo-price">$383</span>
                                                        <span class="old-price">$499</span>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Product area starts-->
<section class="product-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-3">
                    <h3>Trending</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-grid">
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-item">
                    <div class="single-product-wrapper">
                        <div class="single-product-item">
                            <img src="{{asset('public/frontend/images/products/widetv.png')}}" alt="...">
                            <div class="product-promo-text style1">
                                <span>Sold</span>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                </a>
                                <a href="wishlist.html">
                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                </a>
                                <a href="compare.html">
                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                </a>
                            </div>
                        </div>
                        <div class="product-details">
                            <a class="product-category" href="#">Electronics</a>
                            <a class="product-name" href="#">
                                Samsung Curved Widescreen 4k Ultra HD TV
                            </a>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <div class="rating-summary">
                                        <div class="rating-result" title="60%">
                                            <ul class="product-rating">
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <span class="promo-price">$383</span>
                                        <span class="old-price">$499</span>
                                    </div>
                                </div>
                                <div>
                                    <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--product area ends-->
<!--Product area starts-->
<section class="brand-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-slider-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        @forelse ($brands as $brand)
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="{{asset('public/'.$brand->brand_logo)}}">
                                </a>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="brand-navigation">
                <div class="brand-button-next"><i class="ti-angle-right"></i></div>
                <div class="brand-button-prev"><i class="ti-angle-left"></i></div>
            </div>
        </div>
    </div>
</section>
<!--product area ends-->
<!--Hero Promo Area starts--->
<div class="hero-promo-area v1">
    <div class="container">
        <div class="row">

            @if ($settings[18]->plain_value==1)
                <!-- Feature 1 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="{{$settings[21]->plain_value ?? null }}"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>{{$settings[19]->settingTranslation->value ?? $settings[19]->settingTranslationDefaultEnglish->value ?? NULL }}</h5>
                        <span>{{$settings[20]->settingTranslation->value ?? $settings[19]->settingTranslationDefaultEnglish->value ?? NULL }}</span>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="{{$settings[24]->plain_value ?? null }}"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>{{$settings[22]->settingTranslation->value ?? $settings[22]->settingTranslationDefaultEnglish->value ?? NULL }}</h5>
                        <span>{{$settings[23]->settingTranslation->value ?? $settings[23]->settingTranslationDefaultEnglish->value ?? NULL }}</span>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="{{$settings[27]->plain_value ?? null }}"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>{{$settings[25]->settingTranslation->value ?? $settings[22]->settingTranslationDefaultEnglish->value ?? NULL }}</h5>
                        <span>{{$settings[26]->settingTranslation->value ?? $settings[23]->settingTranslationDefaultEnglish->value ?? NULL }}</span>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="{{$settings[30]->plain_value ?? null }}"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>{{$settings[28]->settingTranslation->value ?? $settings[28]->settingTranslationDefaultEnglish->value ?? NULL }}</h5>
                        <span>{{$settings[29]->settingTranslation->value ?? $settings[29]->settingTranslationDefaultEnglish->value ?? NULL }}</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

