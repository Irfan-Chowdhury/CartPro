@php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}

if (Session::has('currency_symbol')){
    $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
}else{
    $CHANGE_CURRENCY_SYMBOL = env('DEFAULT_CURRENCY_SYMBOL');
    Session::put('currency_symbol',$CHANGE_CURRENCY_SYMBOL);
}
@endphp

@extends('frontend.layouts.master')

@section('meta_info')
    <meta product="og:site_name" content="CartPro">
    <meta product="og:title" content="{{$product->basic->meta_title ?? null}}">
    <meta product="og:description" content="{{$product->basic->meta_description ?? null}}">
    <meta product="og:url" content="{{url('product/'.$product->basic->slug.'/'. $category->id)}}">
    <meta product="og:type" content="Product">

    @if ($product->imageCollection->baseImage)
        <meta product="og:image" content="{{asset($product->imageCollection->baseImage->image)}}">
    @endif
@endsection

@php
    $product_name = $product->basic->name;
@endphp
@section('title',$product_name)


@section('frontend_content')

    <!--Product details section starts-->
    <section class="product-details-section">
        <div class="container">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                    <li class="active"><a href="{{route('cartpro.category_wise_products',$category->slug)}}">{{$category->name}}</a> </li>
                    <li>{{$product->basic->name}}</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-6 mar-bot-30">
                    <div class="slider-wrapper">
                        <div class="slider-nav">
                             @if ($product->imageCollection->baseImage)
                                <div class="slider-nav__item">
                                    @if (isset($product->imageCollection->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($product->imageCollection->baseImage->image)))
                                        <img src="{{asset($product->imageCollection->baseImage->image)}}">
                                    @else
                                        <img src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro">
                                    @endif
                                </div>
                            @endif
                            @forelse ($product->imageCollection->additionalImage as $value)
                                <div class="slider-nav__item">
                                    @if (isset($value->image_small) && Illuminate\Support\Facades\File::exists(public_path($value->image_small)))
                                        <img src="{{asset($value->image_small)}}">
                                    @else
                                        <img src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro">
                                    @endif
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="slider-for">
                            @if ($product->imageCollection->baseImage)
                                <div class="slider-for__item ex1">
                                    @if (isset($product->imageCollection->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($product->imageCollection->baseImage->image)))
                                        <img class="lazy" data-src="{{asset($product->imageCollection->baseImage->image)}}">
                                    @else
                                        <img src="https://dummyimage.com/518x518/e5e8ec/e5e8ec&text=CartPro">
                                    @endif
                                </div>
                            @endif
                            @forelse ($product->imageCollection->additionalImage as $value)
                                <div class="slider-for__item ex1">
                                    @if (isset($value->image) && Illuminate\Support\Facades\File::exists(public_path($value->image)))
                                        <img class="lazy" data-src="{{asset($value->image)}}">
                                    @else
                                        <img src="https://dummyimage.com/518x518/e5e8ec/e5e8ec&text=CartPro">
                                    @endif
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="mb-3" id="productAddToCartSingle" action="{{route('product.add_to_cart')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->basic->id}}">
                        <input type="hidden" name="product_slug" value="{{$product->basic->slug}}">
                        <input type="hidden" name="category_id" value="{{$category->id}}">
                        <input type="hidden" name="value_ids" class="value_ids" id="value_ids">
                        <input type="hidden" name="value_names" class="value_names" id="value_names">
                        <input type="hidden" name="attribute_names" class="attribute_names" id="attribute_names">

                        {{-- @isset($flash_sale_product)
                            <input type="hidden" name="flash_sale" value="1">
                            <input type="hidden" name="flash_sale_price" value="{{$flash_sale_product->price}}">
                        @endisset --}}


                        <div class="item-details">
                            <a class="item-category" href="{{route('cartpro.category_wise_products',$category->slug)}}">{{$category->name}}</a>
                            <h3 class="item-name">{{$product->basic->name}}</h3>
                            <div class="d-flex justify-content-between">
                                @if (isset($product->brand->name))
                                    <div class="item-brand">@lang('file.Brand'): <a href="">{{$product->brand->name}}</a></div>
                                @endif
                                <div class="item-review">
                                    <ul class="p-0 m-0">
                                        @php
                                            for ($i=1; $i <=5 ; $i++){
                                                if ($i<= round($product->basic->avg_rating)){  @endphp
                                                    <li><i class="las la-star"></i></li>
                                        @php
                                                }else { @endphp
                                                    <li><i class="lar la-star"></i></li>
                                        @php        }
                                            }
                                        @endphp
                                    </ul>
                                    <span>( @lang('file.Reviews'): {{count($reviews)}} )</span>
                                </div>
                                @if ($product->basic->sku)
                                    <div class="item-sku">@lang('file.SKU') : {{$product->basic->sku}}</div>
                                @endif
                            </div>
                            <hr>

                            @if ($product->basic->special_price!=NULL && $product->basic->special_price>0 && $product->basic->special_price < $product->basic->price)
                                <div class="item-price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        {{ number_format((float)$product->basic->special_price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                    @else
                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->basic->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                    @endif
                                </div>
                                <div class="old-price">
                                    <del>
                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                            {{ number_format((float)$product->basic->price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                        @else
                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->basic->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                        @endif
                                    </del>
                                </div>
                            @else
                                <div class="item-price">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        {{ number_format((float)$product->basic->price, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                    @else
                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->basic->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                    @endif
                                </div>
                            @endif


                            @if (isset($product->basic->short_description))
                                <hr>
                                <div class="item-short-description">
                                    <p>{{strip_tags($product->basic->short_description)}}</p>
                                </div>
                            @endif

                            <hr>
                            @forelse ($attributes as $key => $item)
                                <div class="item-variant">
                                    <span>{{$item->name}}:</span>
                                    <ul class="product-variant size-opt p-0 mt-1">
                                        @forelse ($item->attributeValues as $value)
                                                <li class="attribute_value"
                                                    data-attribute_name="{{$value->name }}"
                                                    id="valueId_{{$value->id}}"
                                                    data-value_id="{{$value->id}}"
                                                    data-value_name="{{$value->name }}">
                                                    <span>{{$value->name}}</span>
                                            </li>
                                                <input type="hidden" name="value_id[]" value="{{$value->id}}">
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @empty
                            @endforelse

                            <div class="item-options">
                                    <div class="input-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus">
                                                <span class="ti-minus"></span>
                                            </button>
                                        </span>
                                        @if(isset($flash_sale_product)) <!--New Added-->
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="{{$flash_sale_product->qty}}">
                                        @elseif (($product->basic->manage_stock==1 && $product->basic->qty==0) || ($product->basic->in_stock==0))
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="0">
                                        @else
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="{{$product->basic->qty}}">
                                        @endif
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus">
                                                <span class="ti-plus"></span>
                                            </button>
                                        </span>
                                    </div>

                                    @if (($product->basic->manage_stock==1 && $product->basic->qty==0) || ($product->basic->in_stock==0))
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Out of Stock" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to cart')</span></span></button>
                                    @else
                                        <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to cart')</span></span></button>
                                    @endif
                                        <a><div class="button button-icon style4 sm @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$product->basic->id}}" data-product_slug="{{$product->basic->slug}}" data-category_id="{{$category->id ?? null}}" data-qty="1"><span><i class="ti-heart"></i> <span>@lang('file.Add to wishlist')</span></span></div></a>
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
    </section>
    <!--Product details section ends-->

    <!--content wrapper section starts-->
    <section class="content-wrapper-section pt-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tabs style2">
                    <ul class="nav nav-tabs mar-top-30 product-details-tab justify-content-center" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-selected="true">@lang('file.Description')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="graphic-design-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-selected="false">@lang('file.Reviews') <span class="text-grey"> ({{count($reviews)}})</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content product-description" id="lionTabContent">
            <div class="container">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="desc-intro">
                        {!! htmlspecialchars_decode($product->basic->description) !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="h5"> {{count($reviews)}} @lang('file.Reviews')</h3>
                            <div class="item-reviews">

                                @foreach ($reviews as $item)
                                    <div class="row mar-tb-30 mt-3">
                                        <div class="col-md-2">
                                            <div class="reviewer-img">
                                                @if ($item->image==null)
                                                    <img class="lazy" data-src="{{asset('public/images/user_default_image.jpg')}}">
                                                @else
                                                    <img class="lazy" data-src="{{asset($item->image)}}">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="product-rating">
                                                @php
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<=$item->rating){  @endphp
                                                            <li><i class="las la-star"></i></li>
                                                @php
                                                        }else { @endphp
                                                            <li><i class="lar la-star"></i></li>
                                                @php        }
                                                    }
                                                @endphp
                                            </ul>
                                            <h5 class="reviewer-text">{{$item->name}}- <span> {{$item->created_at}}</span></h5>
                                            <p>{{$item->comment}}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="comment-respond">
                                <h3 class="h5">@lang('file.Write your Review')</h3>
                                <span>@lang('file.Your email address will not be published. Required fields are marked with') *</span>

                                <form action="{{route('review.store')}}" method="post" class="row contact-form mar-top-20">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{$product->basic->id}}">
                                    <input type="hidden" name="rating" id="rating" value="0">

                                    <div class="col-sm-12">
                                        <label ></label>
                                        <ul class="product-rating">
                                            <li><i class="lar la-star" id="star_1"></i></li>
                                            <li><i class="lar la-star" id="star_2"></i></li>
                                            <li><i class="lar la-star" id="star_3"></i></li>
                                            <li><i class="lar la-star" id="star_4"></i></li>
                                            <li><i class="lar la-star" id="star_5"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 text-area">
                                        <textarea id="comment" required @if(!$userAndProductExists) readonly @endif class="form-control" placeholder="Your Review....*" name="comment" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="author" required @if(!$userAndProductExists) readonly @endif class="form-control" placeholder="Name*" name="author" type="text" required @auth value="{{auth()->user()->first_name.' '.auth()->user()->last_name}}" @endauth >
                                    </div>
                                    <div class="col-md-6">
                                        <input id="subject" required @if(!$userAndProductExists) readonly @endif class="form-control" placeholder="Email*" name="email" type="email" @auth value="{{auth()->user()->email}}" @endauth required>
                                    </div>

                                    @if(!$userAndProductExists)
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </symbol>
                                        </svg>
                                        <div class="m-3 alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            @if (Auth::check())
                                                {{__('file.You have to buy this product first')}}
                                            @else
                                                <div>
                                                    {{__('file.Please login first and buy this product')}}
                                                </div>
                                            @endif


                                        </div>
                                    @else
                                        @foreach ($reviews as $item)
                                            @if ($item->userId==Auth::user()->id)
                                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </symbol>
                                                </svg>
                                                <div class="m-3 alert alert-danger d-flex align-items-center" role="alert">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    <div>
                                                        {{__('file.You can review one time')}}
                                                    </div>
                                                </div>
                                                @break
                                            @endif
                                        @endforeach
                                    @endif

                                    <div class="col-sm-12 mar-top-20 mt-3">
                                        <button class="button style1" @if(!$userAndProductExists)
                                                                        disabled title="Please login first"
                                                                      @else
                                                                        @foreach ($reviews as $item)
                                                                            @if ($item->userId==Auth::user()->id)
                                                                                disabled title=""
                                                                                @break
                                                                            @endif
                                                                        @endforeach
                                                                      @endif
                                                name="submit" type="submit" id="submit">@lang('file.Submit')</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Realated Product area starts-->
    <section class="product-tab-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title style1 mar-bot-30">
                        <h3>@lang('file.Related Products')</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-slider-wrapper v1 swiper-container">
                        <div class="swiper-wrapper">
                            @forelse ($categoryWiseProducts as $item)
                                @if ($item->isActive==1)
                                    <div class="swiper-slide">
                                        <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$item->productId}}">
                                            <input type="hidden" name="product_slug" value="{{$item->slug}}">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="single-product-wrapper">
                                                <div class="single-product-item">
                                                    <a href="{{url('product/'.$item->slug.'/'. $category->id)}}">
                                                        @if (isset($item->image))
                                                            <img class="lazy" src="{{$item->image}}">
                                                        @else
                                                            <img src="https://dummyimage.com/221x221/e5e8ec/e5e8ec&text=CartPro">
                                                        @endif
                                                    </a>



                                                    @if (($item->manageStock==1 && $item->qty==0) || ($item->inStock==0))
                                                        <div class="product-promo-text style1">
                                                            <span>Stock Out</span>
                                                        </div>
                                                    @endif

                                                    <div class="product-overlay">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#id_{{$item->productId}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                    </div>

                                                </div>
                                                <div class="product-details">
                                                    <a class="product-category" href="{{route('cartpro.category_wise_products',$category->slug)}}">{{$category->name}}</a>
                                                    <a class="product-name" href="{{url('product/'.$item->slug.'/'. $category->id)}}">
                                                        {{$item->name }}
                                                    </a>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="60%">
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
                                                                </div>
                                                            </div>
                                                            <div class="product-price">
                                                                @if ($item->specialPrice>0)
                                                                    <span class="promo-price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                        @else
                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->specialPrice  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                        @endif
                                                                    </span>
                                                                    <span class="old-price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                        @else
                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                        @endif
                                                                    </span>
                                                                @else
                                                                    <span class="price">
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            {{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                        @else
                                                                            @include('frontend.includes.SHOW_CURRENCY_SYMBOL'){{ number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
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
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="product-navigation">
                    <div class="product-button-next v1"><i class="ti-angle-right"></i></div>
                    <div class="product-button-prev v1"><i class="ti-angle-left"></i></div>
                </div>
            </div>
        </div>
    </section>

    {{-- @forelse ($category_products as $item)
        @if (isset($item->product))
            @include('frontend.includes.quickshop')
        @endif
    @empty
    @endforelse --}}
    <!--Related product area ends-->

    @endsection

@push('scripts')
    <script src="{{ asset('publlic/js/share.js') }}"></script>

    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(".quantity-left-minus").on("click",function(e){
                $(".quantity-right-plus").prop("disabled",false);
            });
            $(".quantity-right-plus").on("click",function(e){
                var inputNumber = $('.input-number').val();
                var maxNumber = $('.input-number').attr('max');
                if (maxNumber==0) {
                    console.log(Number(maxNumber));
                }else{
                    if ((Number(inputNumber)+1) > Number(maxNumber)) {
                        $('.input-number').val(Number(maxNumber)-1);
                        $(this).prop("disabled",true);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Available product is : '+ maxNumber,
                        });
                    }
                }
            });


            $("#productAddToCartSingle").on("submit",function(e){
                e.preventDefault();
                let qty = $("input[name=qty]").val();
                if (qty) {
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
                        title: 'Successfully added on your cart'
                    });
                    $.ajax({
                        url: "{{route('product.add_to_cart')}}",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $('.attribute_value').removeClass('text-primary')
                                                    .removeClass('selected')
                                                    .addClass('deselect');

                            if (data.type=='success') {
                                let amountConvertToCurrency = parseFloat(data.cart_total) * {{$CHANGE_CURRENCY_RATE}}
                                let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";

                                $('.cart_count').text(data.cart_count);
                                $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                                $('.total_price').text(amountConvertToCurrency.toFixed(2));

                                var html = '';
                                var cart_content = data.cart_content;
                                $.each(cart_content, function( key, value ) {
                                    let singleProductCurrency = parseFloat(value.price) * {{$CHANGE_CURRENCY_RATE}};

                                    // For Attribute
                                    if (value.options.attributes) {
                                        var data = value.options.attributes;
                                        var attributes = [];
                                        for (var i = 0; i < data.name.length; i++) {
                                            attributes.push({
                                                name: data.name[i],
                                                value: data.value[i]
                                            });
                                        }
                                    }
                                    // var image = "{{url('/')}}/"+'public'+value.options.image;
                                    var image = value.options.image;
                                    html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                                '<img src="'+image+'">'+
                                                '</a></div><div class="shp__pro__details"><h2>'+
                                                '<a href="#">'+value.name+'</a></h2>';
                                    // For Attribute
                                    if (value.options.attributes) {
                                        for (var i = 0; i < attributes.length; i++) {
                                        var attribute = attributes[i];
                                            html += "<div class='row'><span>" + attribute.name + " :" + attribute.value + "</span></div>";
                                        }
                                    }
                                    html += '<span>'+value.qty+'</span> x <span class="shp__price">'+ moneySymbol +' '+singleProductCurrency.toFixed(2)+'</span>'+
                                            '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="las la-times"></i></a></div></div>';
                                });
                                $('.cart_list').html(html);

                                if (data.wishlist_id>0) {
                                    $('#wishlist_'+data.wishlist_id).remove();
                                }
                            }
                            else if(data.type=='quantity_limit'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Available product is : '+data.product_quantity
                                });
                            }
                        }
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please insert a number.'
                    });
                }
            });

            $('#star_1').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(1);

                $('#star_2').removeClass('las la-star').addClass('lar la-star');
                $('#star_3').removeClass('las la-star').addClass('lar la-star');
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_2').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(2);
                $('#star_3').removeClass('las la-star').addClass('lar la-star');
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_3').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(3);
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_4').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#star_4').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(4);
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_5').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#star_4').removeClass('lar la-star').addClass('las la-star');
                $('#star_5').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(5);
            })

            // $('.attribute_value_productTab1').on("click",function(e){
            //     e.preventDefault();
            //     $(this).addClass('selected');
            //     var selectedVal = $(this).data('value_id');
            //     values.push(selectedVal);
            //     $('.value_ids_products').val(values);
            // });

        })(jQuery);
    </script>
@endpush
