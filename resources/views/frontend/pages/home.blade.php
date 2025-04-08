@extends('frontend.layouts.master')

@section('meta_info')
    <meta product="og:site_name"
        @isset($settingHomePageSeo->meta_site_name) content="{{ $settingHomePageSeo->meta_site_name }}" @endisset>
    <meta product="og:title" @isset($settingHomePageSeo->meta_title) content="{{ $settingHomePageSeo->meta_title }}" @endisset>
    <meta product="og:description"
        @isset($settingHomePageSeo->meta_description) content="{{ $settingHomePageSeo->meta_description }}" @endisset>
    <meta product="og:url" @isset($settingHomePageSeo->meta_url) content="{{ $settingHomePageSeo->meta_url }}" @endisset>
    <meta product="og:type" @isset($settingHomePageSeo->meta_type) content="{{ $settingHomePageSeo->meta_type }}" @endisset>
    @isset($settingHomePageSeo->meta_image)
        <meta product="og:image" content="{{ asset($settingHomePageSeo->meta_image) }}">
    @endisset
@endsection


@section('frontend_content')


    <!--Home Banner starts -->
    <div class="banner-area v3">
        <div class="container">
            <div class="single-banner-item style2">
                <div class="row">
                    @if ($homeData->settings->storeFrontSliderFormat == 'full_width')
                        <div class="col-md-12">
                            <div class="banner-slider">
                                @foreach ($sliders as $item)
                                    <div class="item">
                                        @if ($item->slider_image !== null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image)))
                                            <div class="img-fill"
                                                style="background-image: url({{ url($item->slider_image_full_width) }}); background-size: cover; background-position: center;">
                                            @else
                                                <div class="img-fill"
                                                    style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                                        @endif
                                        <div class="@if ($item->text_alignment == 'right') info right @else info @endif">
                                            <div>
                                                <h3 style="color: {{ $item->text_color ?? '#ffffff' }} ">
                                                    {{ $item->slider_title }}</h3>
                                                <h5 style="color: {{ $item->text_color ?? '#ffffff' }} ">
                                                    {{ $item->slider_subtitle }}</h5>
                                            </div>
                                            @if ($item->type == 'category')
                                                <a class="button style1 md"
                                                    href="{{ route('cartpro.category_wise_products', $item->slider_slug) }}">Read
                                                    More</a>
                                            @elseif ($item->type == 'url')
                                                <a class="button style1 md" href="{{ $item->url }}">Read More</a>
                                            @endif
                                        </div>
                                    </div>
                            </div>
                    @endforeach
                </div>
            </div>

            <div class="col-md-12">
                <div class="row">
                    @foreach ($sliderBanners as $key => $item)
                        <div class="col-sm-4">
                            <a href="{{ $item->action_url }}" target="{{ $item->new_window == 1 ? '__blank' : '' }}">
                                @if ($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($item->image)))
                                    <div class="slider-banner"
                                        style="background-image:url({{ asset($item->image) }});background-size:cover;background-position: center;">
                                    @else
                                        <div class="slider-banner"
                                            style="background-image:url('https://dummyimage.com/75.1526x75.1526/e5e8ec/e5e8ec&text=Slider-Banner');background-size:cover;background-position: center;">
                                @endif
                                <h4 class="text-dark">{{ $item->title }}</h4>
                        </div></a>
                </div>
                @endforeach
            </div>
        </div>
    @else
        <!-- Half Width -->
        <div class="col-md-8">
            <div class="banner-slider">
                @forelse ($sliders as $item)
                    <div class="item">
                        @if ($item->slider_image !== null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image)))
                            <div class="img-fill"
                                style="background-image: url({{ asset($item->slider_image) }}); background-size: cover; background-position: center;">
                        @else
                            <div class="img-fill"
                                style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                        @endif
                                <div class="@if ($item->text_alignment == 'right') info right @else info @endif">
                                    <div>
                                        <h3 style="color: {{ $item->text_color ?? '#ffffff' }} ">{{ $item->slider_title }}</h3>
                                        <h5 style="color: {{ $item->text_color ?? '#ffffff' }} ">{{ $item->slider_subtitle }}</h5>

                                        @if ($item->type == 'category')
                                            <a class="button style1 md"
                                                href="{{ route('cartpro.category_wise_products', $item->slider_slug) }}">Read
                                                More</a>
                                        @elseif ($item->type == 'url')
                                            <a class="button style1 md" href="{{ $item->url }}">Read More</a>
                                        @endif

                                    </div>
                                </div>
                            </div>
                </div>
        @empty
            <div class="item">
                <div class="img-fill"
                    style="background-image: url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider'); background-size: cover; background-position: center;">
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <div class="col-md-4">
        @foreach ($sliderBanners as $key => $item)
            @if ($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($item->image)))
                <a href="{{ $item->action_url }}" target="{{ $item->new_window == 1 ? '__blank' : '' }}">
                    <div class="slider-banner"
                        style="background-image:url({{ asset($item->image) }});background-size:cover;background-position: center;">
                        <h4 class="text-dark">{{ $item->title }}</h4>
                    </div>
                </a>
            @else
                <div class="slider-banner"
                    style="background-image:url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider-Banner');background-size:cover;background-position: center;">
                </div>
            @endif
        @endforeach
    </div>
    @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Top Category Section -->
    @if ($homeData->settings->isTopCategorySectionEnabled)
        <section class="category-tab-section pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title mb-3">
                            <div class="d-flex align-items-center">
                                <h3>{{ __('file.Top Categories') }}</h3>
                            </div>
                            <!-- Add Pagination -->
                            <div class="category-navigation">
                                <div class="category-button-prev"><i class="ti-angle-left"></i></div>
                                <div class="category-button-next"><i class="ti-angle-right"></i></div>
                            </div>
                        </div>

                        <div class="category-slider-wrapper swiper-container">
                            <div class="swiper-wrapper">
                                @forelse ($categories as $item)
                                    <div class="swiper-slide">
                                        <a href="{{ url('category') }}/{{ $item->slug }}">
                                            <div class="category-container">
                                                @if ($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($item->image)))
                                                    <img class="lazy" data-src="{{ asset($item->image) }}">
                                                @else
                                                    <img class="lazy"
                                                        data-src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=Top-Category"
                                                        alt="...">
                                                @endif

                                                <div class="category-name">
                                                    {{ $item->name ?? null }}
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
            </div>
        </section>
    @endif


    <!--Three Coloumn Banner Full--->
    @if ($threeColumnBanner->isThreeColumnBannerFullEnabled)
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($threeColumnBanner->banners as $item)
                        <div class="col-sm-4">
                            <a href="{{$item->actionUrl}}" target="{{$item->isNewWindow ? '__blank' : '' }}"><img class="lazy" data-src="{{asset($item->image)}}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif




    <!--Product area starts-->
    @if ($productDetailsTab->isSectionEnabled)
        <section class="product-tab-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="nav nav-tabs product-details-tab" id="lionTab" role="tablist">
                            @foreach ($productDetailsTab->productTabs as $key => $item)
                                <li class="nav-item">
                                    <a @if($key==0) class="nav-link active" @else class="nav-link" @endif data-bs-toggle="tab" href="#{{$item->key}}" role="tab" aria-selected="true">{{ $item->title }}</a>
                                </li>
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
                            @foreach ($productDetailsTab->productTabs as $key => $productTab)
                                @php $category = $productTab->categoryWithProducts; @endphp

                                <div class="tab-pane fade {{$key === 0 ? 'show active' : ''}}" id="{{$productTab->key}}" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="product-slider-wrapper swiper-container">
                                        <div class="swiper-wrapper">
                                            @foreach ($category->products as $item)
                                                @if ($item->isActive==1)
                                                    <div class="swiper-slide">
                                                        <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{$item->productId}}">
                                                            <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                                            <input type="hidden" name="category_id" value="{{$category->categoryId}}">
                                                            <input type="hidden" name="qty" value="1">

                                                            <div class="single-product-wrapper">
                                                                <div class="single-product-item">
                                                                    @if (isset($item->mediumImage))
                                                                        <a href="{{url('product/'.$item->slug.'/'. $category->categoryId)}}"><img class="swiper-lazy" data-src="{{$item->mediumImage}}"></a>
                                                                    @else
                                                                        <a href="{{url('product/'.$item->slug.'/'. $category->categoryId)}}"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                    @endif

                                                                    <!-- product-promo-text -->
                                                                    @include('frontend.includes.product-promo-text',['manage_stock'=>$item->manageStock, 'qty'=>$item->qty, 'in_stock'=>$item->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->newTo])
                                                                    <div class="product-overlay">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#id_{{$item->productId}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                                        <a><span class="ti-heart add_to_wishlist" data-product_id="{{$item->productId}}" data-product_slug="{{$item->slug}}" data-category_id="{{$category->categoryId}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('file.Add to wishlist')"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a class="product-name" href="{{url('product/'.$item->slug.'/'. $category->categoryId)}}">
                                                                        {{$item->name}}
                                                                    </a>

                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <ul class="product-rating">
                                                                                @php
                                                                                    for ($i=1; $i <=5 ; $i++){
                                                                                        if ($i<= round($item->avgRating)){  @endphp
                                                                                            <li><i class="las la-star"></i></li>
                                                                                @php
                                                                                        }else { @endphp
                                                                                            <li><i class="lar la-star"></i></li>
                                                                                @php        }
                                                                                    }
                                                                                @endphp
                                                                            </ul>
                                                                            <div class="product-price">
                                                                                @if ($item->specialPrice!=NULL && $item->specialPrice> 0 && $item->specialPrice < $item->price)
                                                                                    <span class="promo-price">
                                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                            {{ number_format((float)$item->specialPrice * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                                        @else
                                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                                        @endif
                                                                                    </span>
                                                                                    <span class="old-price">
                                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                            {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                                        @else
                                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                                        @endif
                                                                                    </span>
                                                                                @else
                                                                                    <span class="price">
                                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                                            {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                                        @else
                                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                                        @endif
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                            @else
                                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <!--QuickShop Modal--->
    @foreach ($productDetailsTab->productTabs as $key => $productTab)
        @php $category = $productTab->categoryWithProducts; @endphp
        @foreach ($category->products as $item)

            <!-- Quick Shop Modal starts -->
            <div class="modal fade quickshop" id="id_{{$item->productId}}" tabindex="-1" role="dialog" aria-labelledby="{{$item->productId}}" aria-hidden="true">
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
                                            @foreach ($item->additionalImage as $value)
                                                <div class="slider-for__item ex1">
                                                    <img class="lazy" data-src="{{asset($value->image)}}" alt="..." />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="slider-nav-modal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$item->productId}}">
                                        <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                        <input type="hidden" name="category_id" value="{{$category->categoryId}}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="value_ids" class="value_ids_products">

                                        <div class="item-details">
                                            <a class="item-category" href="">{{$category->categoryName}}</a>
                                            <h3 class="item-name">{{$item->name}}</h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="item-brand">@lang('file.Brand'): <a href="">{{isset($item->brand->name) ? $item->brand->name : ''}}</a></div>
                                                <div class="item-review">
                                                    <ul class="p-0 m-0">
                                                        @php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  @endphp
                                                                    <li><i class="las la-star"></i></li>
                                                        @php
                                                                }else { @endphp
                                                                    <li><i class="lar la-star"></i></li>
                                                        @php        }
                                                            }
                                                        @endphp
                                                    </ul>
                                                    <span>( {{round($item->avgRating)}} )</span>
                                                </div>
                                                @if ($item->sku)
                                                    <div class="item-sku">@lang('file.SKU'): {{$item->sku ?? null}}</div>
                                                @endif
                                            </div>
                                            <hr>
                                            @if ($item->specialPrice !=NULL && $item->specialPrice >0 && $item->specialPrice <$item->price)
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                    <hr>
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        <small class="old-price"><del>{{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}} </del></small>
                                                    @else
                                                        <small class="old-price"><del>{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                    @else
                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="item-short-description">
                                                <p>{!! $item->shortDescription !!}</p>
                                            </div>
                                            <hr>
                                            @php
                                                $attributes = $item->attributes;
                                            @endphp
                                            @foreach ($attributes as $key => $attribute)
                                                <div class="item-variant">
                                                    <span>{{$attribute->name}}:</span>
                                                    <ul class="product-variant size-opt p-0 mt-1">
                                                        @foreach ($attribute->attributeValues as $value)
                                                            <li class="attribute_value"
                                                                data-attribute_name="{{$value->name }}"
                                                                id="valueId_{{$value->attributeValueId}}"
                                                                data-value_id="{{$value->attributeValueId}}"
                                                                data-value_name="{{$value->name }}">
                                                                <span>{{$value->name}}</span>
                                                            </li>
                                                            <input type="hidden" name="value_id[]" value="{{$value->attributeValueId}}">
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                            <div class="item-options">
                                                <div class="input-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus decrementProductQty-{{$item->productId}}">
                                                            <span class="ti-minus"></span>
                                                        </button>
                                                    </span>
                                                    @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                        <input type="number" name="qty" required class="input-number quantity-{{$item->productId}}" value="1" min="1" max="0">
                                                    @else
                                                        <input type="number" name="qty" required class="input-number quantity-{{$item->productId}}" value="1" min="1" max="{{$item->qty}}">
                                                    @endif
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus incrementProductQty-{{$item->productId}}">
                                                            <span class="ti-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                    <button disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @else
                                                    <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @endif
                                                <a><div class="button button-icon style4 sm @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$item->productId}}" data-product_slug="{{$item->slug}}" data-category_id="{{$category->categoryId ?? null}}" data-qty="1"><p><span><i class="ti-heart"></i> </span>@lang('file.Add to Wishlist')</p></div></a>
                                            </div>

                                            <hr>
                                            <div class="item-share mt-3" id="social-links"><span>@lang('file.Share')</span>
                                                <ul class="footer-social d-inline pad-left-15">
                                                    {{-- <li><a href="{{$socialShare['facebook']}}"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="{{$socialShare['twitter']}}"><i class="ti-twitter"></i></a></li>
                                                    <li><a href="{{$socialShare['linkedin']}}"><i class="ti-linkedin"></i></a></li>
                                                    <li><a href="{{$socialShare['reddit']}}"><i class="ti-reddit"></i></a></li> --}}

                                                    <li><a href="{{$socialShareLinks->facebook}}"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->twitter}}"><i class="ti-twitter"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->reddit}}"><i class="ti-reddit"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Quick shop modal ends-->

            @push('scripts')
                <script type="text/javascript">
                    //Quantity Manage in Modal
                    $(".decrementProductQty-{{$item->productId}}").on("click",function(e){
                        $(".decrementProductQty-{{$item->productId}}").prop("disabled",false);
                    });
                    $(".incrementProductQty-{{$item->productId}}").on("click",function(e){
                        var inputNumber = $('.quantity-{{$item->productId}}').val();
                        var maxNumber = $('.quantity-{{$item->productId}}').attr('max');
                        console.log(maxNumber);

                        if (maxNumber==0) {
                            console.log(Number(maxNumber));
                        }else{
                            if ((Number(inputNumber)+1) > Number(maxNumber)) {
                                $('.quantity-{{$item->productId}}').val(Number(maxNumber)-1);
                                $(this).prop("disabled",true);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Available product is : '+ maxNumber,
                                });
                            }
                        }
                    });
                </script>
            @endpush
        @endforeach
    @endforeach
    <!--/ Product area-->



    <!--Two Coloumn Banner --->
    @if ($twoColumnBanner->isTwoColumnBannerFullEnabled)
        <section>
            <div class="container">
                <div class="row">
                    @foreach ($twoColumnBanner->banners as $item)
                        <div class="col-sm-6">
                            <a href="{{$item->actionUrl}}" target="{{$item->isNewWindow ? '__blank' : '' }}"><img class="lazy" data-src="{{asset($item->image)}}" alt=""></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif




    <!-- Trending Start-->
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
                    @forelse ($trendProducts as $item)
                        @if ($item->isActive && isset($item->category))
                            <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$item->productId}}">
                                <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                <input type="hidden" name="category_id" value="{{$item->category->id}}">
                                <input type="hidden" name="qty" value="1">

                                <div class="product-grid-item">
                                    <div class="single-product-wrapper">
                                        <div class="single-product-item">
                                            <a class="product-name" href="{{url('product/'.$item->slug.'/'. $item->category->id)}}">
                                            @if (isset($item->mediumImage))
                                                <img class="lazy" data-src="{{$item->mediumImage}}">
                                            @else
                                                <img class="lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro">
                                            @endif
                                            </a>

                                            <!-- product-promo-text -->
                                            @include('frontend.includes.product-promo-text',['manage_stock'=>$item->manageStock, 'qty'=>$item->qty, 'in_stock'=>$item->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->newTo])
                                            <!--/ product-promo-text -->

                                            <div class="product-overlay">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshopTrend_{{$item->productId}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                <a><span class="ti-heart add_to_wishlist" data-product_id="{{$item->productId}}" data-product_slug="{{$item->slug}}" data-category_id="{{$item->category->id}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('file.Add to wishlist')"></span></a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="{{url('product/'.$item->slug.'/'. $item->category->id)}}">
                                                {{$item->name}}
                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <ul class="product-rating">
                                                        @php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  @endphp
                                                                    <li><i class="las la-star"></i></li>
                                                        @php
                                                                }else { @endphp
                                                                    <li><i class="lar la-star"></i></li>
                                                        @php        }
                                                            }
                                                        @endphp
                                                    </ul>
                                                    <div class="product-price">
                                                        @if ($item->specialPrice!=NULL && $item->specialPrice>0 && $item->specialPrice < $item->price)
                                                            <span class="old-price">
                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                    {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                @else
                                                                    @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                @endif
                                                            </span>
                                                            <span class="promo-price">
                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                    {{ number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                @else
                                                                    @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                @endif
                                                            </span>
                                                        @else
                                                            <span class="promo-price">
                                                                @if(env('CURRENCY_FORMAT')=='suffix')
                                                                    {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                @else
                                                                    @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                                @endif
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div>
                                                    @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                    @else
                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!--QuickShop Trend Modal--->
    @foreach ($trendProducts as $item)
        @if ($item->isActive && isset($item->category))
            <!-- Quick Shop Modal starts -->
            <div class="modal fade quickshop" id="quickshopTrend_{{$item->productId}}" tabindex="-1" role="dialog" aria-labelledby="quickshopTrend_{{$item->productId}}" aria-hidden="true">
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
                                            @foreach ($item->additionalImage as $value)
                                                <div class="slider-for__item ex1">
                                                    <img class="lazy" data-src="{{asset($value->image)}}" alt="..." />
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="slider-nav-modal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$item->productId}}">
                                        <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                        <input type="hidden" name="category_id" value="{{$item->category->id}}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="value_ids" class="value_ids_products">

                                        <div class="item-details">
                                            <a class="item-category" href="">{{$category->categoryName}}</a>
                                            <h3 class="item-name">{{$item->name}}</h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="item-brand">@lang('file.Brand'): <a href="">{{isset($item->brand->name) ? $item->brand->name : ''}}</a></div>
                                                <div class="item-review">
                                                    <ul class="p-0 m-0">
                                                        @php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  @endphp
                                                                    <li><i class="las la-star"></i></li>
                                                        @php
                                                                }else { @endphp
                                                                    <li><i class="lar la-star"></i></li>
                                                        @php        }
                                                            }
                                                        @endphp
                                                    </ul>
                                                    <span>( {{round($item->avgRating)}} )</span>
                                                </div>
                                                @if ($item->sku)
                                                    <div class="item-sku">@lang('file.SKU'): {{$item->sku ?? null}}</div>
                                                @endif
                                            </div>
                                            <hr>
                                            @if ($item->specialPrice !=NULL && $item->specialPrice >0 && $item->specialPrice < $item->price)
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                    <hr>
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        <small class="old-price"><del>{{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}} </del></small>
                                                    @else
                                                        <small class="old-price"><del>{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                    @else
                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="item-short-description">
                                                <p>{!! $item->shortDescription !!}</p>
                                            </div>
                                            <hr>
                                            @php
                                                $attributes = $item->attributes;
                                            @endphp
                                            @foreach ($attributes as $key => $attribute)
                                                <div class="item-variant">
                                                    <span>{{$attribute->name}}:</span>
                                                    <ul class="product-variant size-opt p-0 mt-1">
                                                        @foreach ($attribute->attributeValues as $value)
                                                            <li class="attribute_value"
                                                                data-attribute_name="{{$value->name }}"
                                                                id="valueId_{{$value->attributeValueId}}"
                                                                data-value_id="{{$value->attributeValueId}}"
                                                                data-value_name="{{$value->name }}">
                                                                <span>{{$value->name}}</span>
                                                            </li>
                                                            <input type="hidden" name="value_id[]" value="{{$value->attributeValueId}}">
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach
                                            <div class="item-options">
                                                <div class="input-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus decrementProductQty-{{$item->productId}}">
                                                            <span class="ti-minus"></span>
                                                        </button>
                                                    </span>
                                                    @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                        <input type="number" name="qty" required class="input-number quantity-{{$item->productId}}" value="1" min="1" max="0">
                                                    @else
                                                        <input type="number" name="qty" required class="input-number quantity-{{$item->productId}}" value="1" min="1" max="{{$item->qty}}">
                                                    @endif
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus incrementProductQty-{{$item->productId}}">
                                                            <span class="ti-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                    <button disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @else
                                                    <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @endif
                                                <a><div class="button button-icon style4 sm @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$item->productId}}" data-product_slug="{{$item->slug}}" data-category_id="{{$item->category->id}}" data-qty="1"><p><span><i class="ti-heart"></i> </span>@lang('file.Add to Wishlist')</p></div></a>
                                            </div>

                                            <hr>
                                            <div class="item-share mt-3" id="social-links"><span>@lang('file.Share')</span>
                                                <ul class="footer-social d-inline pad-left-15">
                                                    
                                                    <li><a href="{{$socialShareLinks->facebook}}"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->twitter}}"><i class="ti-twitter"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->linkedin}}"><i class="ti-linkedin"></i></a></li>
                                                    <li><a href="{{$socialShareLinks->reddit}}"><i class="ti-reddit"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <!--Quick shop modal ends-->
<!-- Trending ends-->



<!-- One Coloumn Banner --->
@if ($oneColumnBanner->isOneColumnBannerEnabled)
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{$oneColumnBanner->actionUrl}}" target="{{$oneColumnBanner->isNewWindow ? '__blank' : '' }}"><img class="lazy" data-src="{{asset($oneColumnBanner->image)}}" alt=""></a>
            </div>
        </div>
    </div>
</section>
@endif



@endsection






@push('scripts')
    <script type="text/javascript">
        //for Product_Tab_1
        $('.attribute_value_productTab1').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_productTab1').val(values);
        });

        //for FlashSale
        $('.attribute_value_flashSale').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_flashSale').val(values);
        });

        //for Trending
        $('.attribute_value_trending').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_trending').val(values);
        });


        $('#star_1').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(1);

            $('#star_2').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_2').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(2);
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_3').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(3);
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_4').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_4').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(4);
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_5').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_4').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_5').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(5);
        })
    </script>
@endpush
