@extends('frontend.layouts.master')
@section('frontend_content')

<!--Home Banner starts -->
<div class="banner-area v3">
    <div class="container">
        <div class="single-banner-item style2">
            <div class="row">

                @if ($store_front_slider_format == 'full_width')
                    <div class="col-md-12">
                        <div class="banner-slider">
                            <!-- Item -->
                            @foreach ($sliders as $item)
                                @if ($item->sliderTranslation->isNotEmpty())
                                    <div class="item">
                                        <div class="img-fill" style="background-image: url({{url('public/'.$item->slider_image)}}); background-size: cover; background-position: center;">
                                            <div class="@if($item->text_alignment=='right') info right @else info @endif" >
                                                <div>
                                                    <h3>{{$item->sliderTranslation[0]->slider_title}}</h3>
                                                    <h5>{{$item->sliderTranslation[0]->slider_subtitle}}</h5>
                                                    {{-- <a class="button style1 md" href="">Read More</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($slider_banners as $key => $item)
                                <div class="slider-banner col-sm-4">
                                    <div>
                                        <img src="{{asset('public/'.$slider_banners[$key]['image'])}}" alt="...">
                                    </div>
                                    <div>
                                        <h4>{{$slider_banners[$key]['title']}}</h4>
                                        {{-- <a href="{{$slider_banners[$key]['action_url']}}" class="link-hov style1">Shop Now</a> --}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-8">
                        <div class="banner-slider">
                            <!-- Item -->
                            @foreach ($sliders as $item)
                                @if ($item->sliderTranslation->isNotEmpty())
                                    <div class="item">
                                        <div class="img-fill" style="background-image: url({{url('public/'.$item->slider_image)}}); background-size: cover; background-position: center;">
                                            <div class="@if($item->text_alignment=='right') info right @else info @endif" >
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
                            <div class="slider-banner ">
                                <div>
                                    <img src="{{asset('public/'.$slider_banners[$key]['image'])}}" alt="...">
                                </div>
                                <div>
                                    <h4>{{$slider_banners[$key]['title']}}</h4>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
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
                        <h3>{{__('file.Top Categories')}}</h3>
                        {{-- <a href="#" class="button style4 mb-2 d-none d-md-block">All categories</a> --}}
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


                    @forelse ($top_categories as $item)
                    {{-- @forelse ($categories as $item) --}}
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
                                                                @else
                                                                    <img src="{{asset('public/images/empty.jpg')}}">
                                                                @endif

                                                                @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                    <div class="product-promo-text style1">
                                                                        <span>Stock Out</span>
                                                                    </div>
                                                                @endif

                                                                <div class="product-overlay">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                                    <a><span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span></a>
                                                                </div>

                                                            </div>
                                                            <div class="product-details">
                                                                <a class="product-category" href="{{route('cartpro.category_wise_products',$item->category->slug)}}">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                                <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                                    {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
                                                                </a>

                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <div class="rating-summary">
                                                                            <div class="rating-result" title="60%">
                                                                                <ul class="product-rating">
                                                                                    @php
                                                                                        for ($i=1; $i <=5 ; $i++){
                                                                                            if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                                <li><i class="ion-android-star"></i></li>
                                                                                    @php
                                                                                            }else { @endphp
                                                                                                <li><i class="ion-android-star-outline"></i></li>
                                                                                    @php        }
                                                                                        }
                                                                                    @endphp
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-price">
                                                                            @if ($item->product->special_price>0)
                                                                                <span class="promo-price">
                                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                        {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                    @else
                                                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                    @endif
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                        {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                    @else
                                                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                    @endif
                                                                                </span>
                                                                            @else
                                                                                <span class="price">
                                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                        {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                    @else
                                                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                    @endif
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                            <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        @else
                                                                             <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        @endif
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

                                                            @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                <div class="product-promo-text style1">
                                                                    <span>Stock Out</span>
                                                                </div>
                                                            @endif
                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a>
                                                                    <span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <a class="product-category" href="{{route('cartpro.category_wise_products',$item->category->slug)}}">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                            <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                                {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                            </a>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <div class="rating-summary">
                                                                        <div class="rating-result" title="60%">
                                                                            <ul class="product-rating">
                                                                                @php
                                                                                    for ($i=1; $i <=5 ; $i++){
                                                                                        if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                            <li><i class="ion-android-star"></i></li>
                                                                                @php
                                                                                        }else { @endphp
                                                                                            <li><i class="ion-android-star-outline"></i></li>
                                                                                @php        }
                                                                                    }
                                                                                @endphp
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        @if ($item->product->special_price>0)
                                                                            <span class="promo-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                            <span class="old-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @else
                                                                            <span class="price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                        <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @else
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @endif                                                                </div>
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

                                                            @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                <div class="product-promo-text style1">
                                                                    <span>Stock Out</span>
                                                                </div>
                                                            @endif
                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a>
                                                                    <span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <a class="product-category" href="{{route('cartpro.category_wise_products',$item->category->slug)}}">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                            <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                                {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                            </a>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <div class="rating-summary">
                                                                        <div class="rating-result" title="60%">
                                                                            <ul class="product-rating">
                                                                                @php
                                                                                    for ($i=1; $i <=5 ; $i++){
                                                                                        if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                            <li><i class="ion-android-star"></i></li>
                                                                                @php
                                                                                        }else { @endphp
                                                                                            <li><i class="ion-android-star-outline"></i></li>
                                                                                @php        }
                                                                                    }
                                                                                @endphp
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        @if ($item->product->special_price>0)
                                                                            <span class="promo-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                            <span class="old-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @else
                                                                            <span class="price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                        <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @else
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @endif                                                                </div>
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

                                                            @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                <div class="product-promo-text style1">
                                                                    <span>Stock Out</span>
                                                                </div>
                                                            @endif

                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a>
                                                                    <span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <a class="product-category" href="{{route('cartpro.category_wise_products',$item->category->slug)}}">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a>
                                                            <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                                {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL}}
                                                            </a>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <div class="rating-summary">
                                                                        <div class="rating-result" title="60%">
                                                                            <ul class="product-rating">
                                                                                @php
                                                                                    for ($i=1; $i <=5 ; $i++){
                                                                                        if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                            <li><i class="ion-android-star"></i></li>
                                                                                @php
                                                                                        }else { @endphp
                                                                                            <li><i class="ion-android-star-outline"></i></li>
                                                                                @php        }
                                                                                    }
                                                                                @endphp
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-price">
                                                                        @if ($item->product->special_price>0)
                                                                            <span class="promo-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                            <span class="old-price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @else
                                                                            <span class="price">
                                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                    {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                                @else
                                                                                    {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                                @endif
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                        <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @else
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    @endif                                                                </div>
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


    <!--Flash Sale And Vertical Products Start-->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-xl-4 col-md-12">
                    <div class="section-title mb-3">
                        <h3>
                            {{$storefront_flash_sale_title}}
                        </h3>
                    </div>
                    <div class="deals-slider-wrapper swiper-container">
                        <div class="swiper-wrapper">
                            @if ($flash_sales)
                                @forelse ($flash_sales->flashSaleProducts as $item)
                                    <div class="swiper-slide">
                                        <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$item->product->id}}">
                                            <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                            <input type="hidden" name="category_id" value="{{$item->product->categoryProduct[0]->category_id}}">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="single-product-wrapper deals">
                                                <div class="single-product-item">

                                                    @if ($item->product->baseImage)
                                                        <img src="{{asset('public/'.$item->product->baseImage->image)}}" >
                                                    @else
                                                        <img src="{{asset('public/images/empty.jpg')}}">
                                                    @endif
                                                    <div class="product-overlay">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#flash_sale_{{$item->product->slug ?? null}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                        </a>
                                                        <a>
                                                            <span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->product->categoryProduct[0]->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                        </a>
                                                        {{-- <a href="compare.html">
                                                            <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                        </a> --}}
                                                    </div>
                                                </div>
                                                <div class="product-details">
                                                    <a class="product-name text-center" href="{{url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)}}">
                                                        {{$item->product->productTranslation->product_name ?? null}}
                                                    </a>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="60%">
                                                                    <ul class="product-rating">
                                                                        @php
                                                                            for ($i=1; $i <=5 ; $i++){
                                                                                if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                    <li><i class="ion-android-star"></i></li>
                                                                        @php
                                                                                }else { @endphp
                                                                                    <li><i class="ion-android-star-outline"></i></li>
                                                                        @php        }
                                                                            }
                                                                        @endphp
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="product-price">
                                                                @if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price)
                                                                    <span class="promo-price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                        @else
                                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                        @endif
                                                                    </span>
                                                                    <span class="old-price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                        @else
                                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                        @endif
                                                                    </span>
                                                                @else
                                                                    <span class="promo-price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                        @else
                                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                        @endif
                                                                    </span>
                                                                @endif

                                                            </div>
                                                        </div>
                                                        <div>
                                                            @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            @else
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="daily-deals-wrap">
                                                        <!-- countdown start -->
                                                        <div class="countdown-deals text-center" data-countdown="{{$item->end_date}}">
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
                                                    @if ($item->product->manage_stock==1)
                                                        Available: {{$item->product->qty}}
                                                    @endif

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @empty
                                @endforelse
                            @endif
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
                                <h3>{{$storefront_vertical_product_1_title}}</h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-1-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-1-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-1 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        @forelse ($vertical_product_1 as $item)
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper list">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            @php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  @endphp
                                                                                        <li><i class="ion-android-star"></i></li>
                                                                            @php
                                                                                    }else { @endphp
                                                                                        <li><i class="ion-android-star-outline"></i></li>
                                                                            @php        }
                                                                                }
                                                                            @endphp
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    @if ($item->product->special_price>0)
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                    <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @else
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @endif
                                                                {{-- <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @empty
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="section-title mb-3">
                                <h3>{{$storefront_vertical_product_2_title}}</h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-2-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-2-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-2 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        @forelse ($vertical_product_2 as $item)
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper list">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
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
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                    <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @else
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @endif
                                                                {{-- <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @empty
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="section-title mb-3">
                                <h3><h3>{{$storefront_vertical_product_3_title}}</h3></h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-3-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-3-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-3 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        @forelse ($vertical_product_3 as $item)
                                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                                <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                                <input type="hidden" name="category_id" value="{{$item->category_id ?? null}}">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper list">
                                                    <div class="single-product-item">
                                                        @if (isset($item->productBaseImage->image))
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}">
                                                        @else
                                                            <img src="{{asset('public/images/empty.jpg')}}">
                                                        @endif
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->category_id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
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
                                                                        <span class="promo-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                        <span class="old-price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @else
                                                                        <span class="price">
                                                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                            @else
                                                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                            @endif
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                                    <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @else
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @endif
                                                                {{-- <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @empty
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    @if ($flash_sales)
        @forelse ($flash_sales->flashSaleProducts as $item )
            @include('frontend.includes.quickshop_flash_sale')
        @empty
        @endforelse
    @endif
    <!--Flash Sale And Vertical Products End-->


<!--Product Trending Start-->
<section class="product-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-3">
                    <h3>{{__('file.Trending')}}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-grid">
                @forelse ($order_details as $item)
                    <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$item->product->id}}">
                        <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                        <input type="hidden" name="category_id" value="{{$item->product->categoryProduct[0]->category_id}}">
                        <input type="hidden" name="qty" value="1">

                        <div class="product-grid-item">
                            <div class="single-product-wrapper">
                                <div class="single-product-item">
                                    @if (isset($item->product->baseImage))
                                        <img src="{{asset('public/'.$item->product->baseImage->image)}}">
                                    @else
                                        <img src="{{asset('public/images/empty.jpg')}}">
                                    @endif
                                    @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                        <div class="product-promo-text style1">
                                            <span>Stock Out</span>
                                        </div>
                                    @endif
                                    <div class="product-overlay">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quickshopTrend_{{$item->product->slug}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                        </a>
                                        <a>
                                            <span class="ti-heart add_to_wishlist" data-product_id="{{$item->product_id}}" data-product_slug="{{$item->product->slug}}" data-category_id="{{$item->product->categoryProduct[0]->category_id ?? null}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-details">
                                    <a class="product-category" href="{{route('cartpro.category_wise_products',$item->product->categoryProduct[0]->category->slug)}}">
                                        {{$item->product->categoryProduct[0]->category->catTranslation->category_name ?? NULL}}
                                    </a>
                                    <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)}}">
                                        {{$item->product->productTranslation->product_name ?? null}}
                                    </a>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="rating-summary">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        @php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->product->avg_rating)){  @endphp
                                                                    <li><i class="ion-android-star"></i></li>
                                                        @php
                                                                }else { @endphp
                                                                    <li><i class="ion-android-star-outline"></i></li>
                                                        @php        }
                                                            }
                                                        @endphp
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-price">
                                                @if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price)
                                                    <span class="promo-price">
                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                            {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                        @else
                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '') }}
                                                        @endif
                                                    </span>
                                                    <span class="old-price">
                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                            {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                        @else
                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                        @endif
                                                    </span>
                                                @else
                                                    <span class="promo-price">
                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                            {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                        @else
                                                            {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                        @endif
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            @if (($item->product->qty==0) || ($item->product->in_stock==0))
                                                <button class="button style2 sm" disabled title="Disabled" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                            @else
                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                            @endif
                                            {{-- <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
@forelse ($order_details as $item )
    @include('frontend.includes.quickshop_trending')
@empty
@endforelse
<!--product Trending ends-->





<!--Product area starts Brands-->
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
<!--Product area starts Brands-->

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


@push('scripts')
    <script type="text/javascript">
        $('.add_to_wishlist').on("click",function(e){
            var product_id = $(this).data('product_id');
            var category_id = $(this).data('category_id');
            var product_slug = $(this).data('product_slug');

            console.log(category_id);
            $.ajax({
                url: "{{ route('wishlist.add') }}",
                type: "GET",
                data: {
                    product_id:product_id,
                    category_id:category_id,
                    product_slug:product_slug
                },
                success: function (data) {
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: data.message,
                        })
                    }
                    $('.wishlist_count').text(data.wishlist_count);
                }
            })
        });

        //for Product_Tab_1
        $('.attribute_value_productTab1').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_productTab1').val(values);
        });

        //for FlashSale
        $('.attribute_value_flashSale').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_flashSale').val(values);
        });

        //for Trending
        $('.attribute_value_trending').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_trending').val(values);
        });
    </script>
@endpush



