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
@section('title','Category Wise Products')

@section('extra_css')
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('public/frontend/css/jquery-ui-min.css')}}">
<noscript><link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{asset('public/frontend/css/jquery-ui-min.css')}}"></noscript>
@endsection
@section('frontend_content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="{{route('cartpro.home')}}">@lang('file.Home')</a></li>
                        <li class="active">@lang('file.Category')</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!-- Shop Page Starts-->
    <div class="shop-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar_filters mb-5">

                        <form id="sidebarFilter">

                            <!--sidebar-categories-box start-->
                            <div class="sidebar-widget sidebar-category-list">
                                {{-- @if ($category->childs->count()!=0) --}}
                                @if ($category->childs)
                                <div class="sidebar-title">
                                    <h2 data-bs-toggle="collapse" href="#collapseCategory" aria-expanded="true">@lang('file.Other Categories')</h2>
                                </div>
                                @endif

                                @if($category->childs)
                                    <div class="category-sub-menu style1 mar-top-15 collapse show" id="collapseCategory">
                                        <ul>
                                            @forelse ($category->childs as $item)
                                                <li><a href="{{route('cartpro.category_wise_products',$item->slug)}}">{{$item->childCategoryName}}</a> <span class="count">

                                                    {{-- @php $count =0; @endphp
                                                    @forelse ($item->categoryProduct as $childCategoryProduct)
                                                        @if ($childCategoryProduct->product)
                                                            @php $count++; @endphp
                                                        @endif
                                                    @empty
                                                    @endforelse
                                                    ({{$count}}) --}}
                                                    ({{ $item->totalProducts }})

                                                </span>
                                                    @if (isset($item->childs))
                                                        @forelse ($item->childs as $value)
                                                            <ul>
                                                                <li><a href="{{route('cartpro.category_wise_products',$value->slug)}}">{{$value->childCategoryName}}<span class="count">
                                                                    {{-- @php $count =0; @endphp
                                                                    @forelse ($value->categoryProduct as $childCategoryProduct)
                                                                        @if ($childCategoryProduct->product)
                                                                            @php $count++; @endphp
                                                                        @endif
                                                                    @empty
                                                                    @endforelse
                                                                    ({{$count}}) --}}
                                                                    ({{ $value->totalProducts }})
                                                                </span></a></li>
                                                            </ul>
                                                        @empty
                                                        @endforelse
                                                    @endif
                                                </li>
                                            @empty
                                            @endforelse
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <!--sidebar-categores-box start  -->

                            <!-- Filter By Price -->
                            <div class="sidebar-widget filters">
                                <div class="sidebar-title">
                                    <h2 data-bs-toggle="collapse" href="#collapsePrice" aria-expanded="true">@lang('file.Filter By Price')</h2>
                                </div>
                                <div class="filter-area collapse show" id="collapsePrice">
                                        <div id="slider-range" class="price-range mar-bot-20"></div>
                                        <div class="d-flex justify-content-center">
                                            <div><input type="text" id="amount" name="amount"></div>
                                            <div><input type="hidden" name="category_slug" value="{{$category->slug ?? null}}"></div>
                                        </div>
                                </div>
                            </div>


                            <!-- Filter By Attribute Value-->
                            @if (count($attributes)>0)
                                <input type="hidden" name="attribute_value_ids" id="value_ids">
                                <input type="hidden" name="category_slug" value="{{$category->slug}}">

                                {{-- @foreach ($attribute_values->keyBy('attribute_name') as $key => $item)
                                    <div class="sidebar-widget filters">
                                        <div class="sidebar-title">
                                            <h2 data-bs-toggle="collapse" href="#collapseSize" aria-expanded="true">@lang('file.Filter By') {{$key}}</h2>
                                        </div>
                                        <div class="filter-area collapse show" id="collapseSize">
                                            <div class="size-checkbox">
                                                <ul class="filter-opt size pt-2">
                                                    @foreach ($attribute_values->where('attribute_name',$key) as $value)
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                <label class="custom-control-label attribute_value" data-attribute_name="{{$key}}" id="valueId_{{$value->attribute_value_id}}" data-value_id="{{$value->attribute_value_id}}" data-value_name="{{$value->attribute_value_name}}" for="size-s"><span class="size-block">{{$value->attribute_value_name}}</span></label>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}
                                @foreach ($attributes as $attribute)
                                    <div class="sidebar-widget filters">
                                        <div class="sidebar-title">
                                            @isset($attribute->name)
                                                <h2 data-bs-toggle="collapse" href="#collapseSize" aria-expanded="true">@lang('file.Filter By') {{$attribute->name}}</h2>
                                            @endisset
                                        </div>
                                        <div class="filter-area collapse show" id="collapseSize">
                                            <div class="size-checkbox">
                                                <ul class="filter-opt size pt-2">
                                                    @if($attribute->attributeValues)
                                                        @foreach ($attribute->attributeValues as $attributeValue)
                                                            <li>
                                                                <div class="custom-control custom-checkbox">
                                                                <label for="size-s" class="custom-control-label attribute_value" data-attribute_name="{{$attribute->name}}" id="valueId_{{$attributeValue->id}}" data-value_id="{{$attributeValue->id}}" data-value_name="{{$attributeValue->name}}"><span class="size-block">{{$attributeValue->name}}</span></label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            <!--sidebar-categories-box end-->
                            <div><button type="submit" class="mt-2 btn btn-success">{{__('Filter')}}</button></div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="page-title h5 uppercase mb-0">{{$category->categoryName}}</h1>
                        <span class="d-none d-md-block"><strong class="theme-color">{{$category->totalProducts}}</strong> @lang('file.Products Found')</span>
                    </div>

                    <div class="products-header">
                        <ul class="nav shop-item-filter-list">
                            <li class="d-none d-md-block d-lg-block"><a class="view-grid active"><i class="ti-view-grid"></i></a></li>
                            <li class="d-none d-md-block d-lg-block"><a class="view-list"><i class="ti-layout-list-thumb"></i></a></li>
                            <li class="d-md-block d-sm-block d-lg-none"><a class="filter-icon"><i class="las la-sliders-h"></i> @lang('file.Filters')</a></li>
                        </ul>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('file.Show')
                            </button>
                            <input type="hidden" id="categorySlug" value="{{$category->slug}}">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item active limitCategoryProductShow" data-id="2" href="#" >2</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="3" href="#">3</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="4" href="#">4</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="5" href="#">5</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang('file.Sort by')
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item sortBy" data-condition="latest" data-category_slug="{{$category->slug}}">Latest</a></li>
                                <li><a class="dropdown-item sortBy" data-condition="low_to_high" data-category_slug="{{$category->slug}}">Price: Low to High</a></li>
                                <li><a class="dropdown-item sortBy" data-condition="high_to_low" data-category_slug="{{$category->slug}}">Price: High to Low</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="shop-products-wrapper">
                        <div class="product-grid categoryWiseProductField">
                            @if ($category->products)
                                @forelse ($category->products as $product)
                                    @if ($product->isActive==1) <!--Change in query later-->
                                        <form class="addToCart">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$product->productId}}">
                                            <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                            <input type="hidden" name="category_id" value="{{$category->categoryId}}">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="product-grid-item">
                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <a href="{{url('product/'.$product->slug.'/'. $category->categoryId)}}"><img class="lazy" data-src="{{$product->image}}"></a>

                                                        <!-- product-promo-text -->
                                                        @include('frontend.includes.product-promo-text',['manage_stock'=>$product->manageStock, 'qty'=>$product->qty, 'in_stock'=>$product->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$product->newTo])
                                                        <!--/ product-promo-text -->

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#id_{{$product->productId}}"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a><span class="ti-heart @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$product->productId}}" data-product_slug="{{$product->slug}}" data-category_id="{{$category->categoryId}}" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="@lang('file.Add to wishlist')"></span></a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="{{url('product/'.$product->slug.'/'. $category->categoryId)}}">
                                                            {{$product->name}}
                                                        </a>
                                                        <div class="product-short-description">
                                                            {{$product->shortDescription}}
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            @php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($product->avgRating)){  @endphp
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
                                                                    @if ($product->specialPrice!=NULL && $product->specialPrice>0 && $product->specialPrice < $product->price)
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            <span class="promo-price">{{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')}} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')</span>
                                                                            <span class="old-price">{{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')</span>
                                                                        @else
                                                                            <span class="promo-price">@include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')}} </span>
                                                                            <span class="old-price"> @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @endif
                                                                    @else
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            <span class="price">{{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')</span>
                                                                        @else
                                                                            <span class="price">@include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                @else
                                                                    <button class="button style2 sm" type="submit" title="Add To Cart" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-options">
                                                        <div class="product-price mt-2">
                                                            @if ($product->specialPrice!=NULL && $product->specialPrice>0 && $product->specialPrice<$product->price)
                                                                <span class="promo-price">
                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                        {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                    @else
                                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                    @endif
                                                                </span>
                                                                <span class="old-price">
                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                        {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                    @else
                                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                    @endif
                                                                </span>
                                                            @else
                                                                <span class="price">
                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                        {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                                    @else
                                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </div>

                                                        @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                                            <button disabled class="button style1 sm d-block w-100 mt-3 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('file.Out of Stock')}}"><i class="las la-cart-plus"></i>{{__('file.Add to Cart')}}</button>
                                                        @else
                                                            <button class="button style1 sm d-block w-100 mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('file.Add to Cart')}}"><i class="las la-cart-plus"></i>{{__('file.Add to Cart')}}</button>
                                                        @endif
                                                        <a class="button style1 sm d-block align-items-center @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$product->productId}}" data-product_slug="{{$product->slug}}" data-category_id="{{$category->categoryId}}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{__('file.Add to wishlist')}}"><span class="ti-heart"></span> {{__('file.Add to wishlist')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                @empty
                                    <h2 class="h4">@lang('file.No items found')</h2>
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page Ends-->

    <!-- Quick Shop Modal starts -->
    @foreach ($category->products as $product)
            <!-- Quick Shop Modal starts -->
            <div class="modal fade quickshop" id="id_{{$product->productId}}" tabindex="-1" role="dialog" aria-labelledby="{{$product->slug}}" aria-hidden="true">
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
                                            @foreach ($product->additionalImage as $value)
                                                    <div class="slider-for__item ex1">
                                                        <img src="{{$value->image}}" alt="..." />
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
                                        <input type="hidden" name="product_id" value="{{$product->productId}}">
                                        <input type="hidden" name="product_slug" value="{{$product->slug}}">
                                        <input type="hidden" name="category_id" value="{{$category->categoryId}}">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="value_ids" class="value_ids_shop">

                                        <div class="item-details">
                                            <h3 class="item-name">{{$product->name}}</h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="item-brand">@lang('file.Brand'): <a href="">{{$product->brandName}}</a></div>
                                                <div class="item-review">
                                                    <ul class="p-0 m-0">
                                                        @php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($product->avgRating)){  @endphp
                                                                    <li><i class="las la-star"></i></li>
                                                        @php
                                                                }else { @endphp
                                                                    <li><i class="lar la-star"></i></li>
                                                        @php        }
                                                            }
                                                        @endphp
                                                    </ul>
                                                    <span>( {{round($product->avgRating)}} )</span>
                                                </div>
                                                @if ($product->sku)
                                                    <div class="item-sku">@lang('file.SKU'): {{$product->sku ?? null}}</div>
                                                @endif
                                            </div>
                                            <hr>
                                            @if ($product->specialPrice!=NULL && $product->specialPrice>0 && $product->specialPrice<$product->price)
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                    <hr>
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        <small class="old-price"><del>{{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL') </del></small>
                                                    @else
                                                        <small class="old-price"><del>@include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} </del></small>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="item-price">
                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                        {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }} @include('frontend.includes.SHOW_CURRENCY_SYMBOL')
                                                    @else
                                                        @include('frontend.includes.SHOW_CURRENCY_SYMBOL') {{ number_format((float)$product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '') }}
                                                    @endif
                                                </div>
                                            @endif

                                            <div class="item-short-description">
                                                <p>{{$product->shortDescription}}</p>
                                            </div>
                                            <hr>
                                            @php
                                                $attributes = $product->attributes;
                                            @endphp
                                            @foreach ($attributes as $key => $attribute)
                                                <div class="item-variant">
                                                    <span>{{$attribute->name}}:</span>
                                                    <ul class="product-variant size-opt p-0 mt-1">
                                                        @foreach ($attribute->values as $value)
                                                            <li class="attribute_value"
                                                                data-attribute_name="{{$value->name }}"
                                                                id="valueId_{{$value->id}}"
                                                                data-value_id="{{$value->id}}"
                                                                data-value_name="{{$value->name }}">
                                                                <span>{{$value->name}}</span>
                                                            </li>
                                                            <input type="hidden" name="value_id[]" value="{{$value->id}}">
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endforeach


                                            <div class="item-options">
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
                                                @if (($product->manageStock==1 && $product->qty==0) || ($product->inStock==0))
                                                    <button class="button button-icon style1" disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @else
                                                    <button class="button button-icon style1" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span>@lang('file.Add to Cart')</span></span></button>
                                                @endif
                                                <div class="button button-icon style4 sm @auth add_to_wishlist @else forbidden_wishlist @endauth" data-product_id="{{$product->productId}}" data-product_slug="{{$product->slug}}" data-category_id="{{$category->categoryId}}" data-qty="1"><span><i class="ti-heart"></i> <span>@lang('file.Add to Wishlist')</span></span></div>
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
            <!--Quick shop modal ends-->
    @endforeach

@endsection





@push('scripts')
    <script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript">

        // $('.attribute_value_productTab1').on("click",function(e){
        //     e.preventDefault();
        //     $(this).addClass('selected');

        //     var selectedVal = $(this).data('value_id');
        //     values.push(selectedVal);
        //     $('.value_ids_productTab1').val(values);
        // });

        //Limit Category Product Show
        $(document).on('click','.limitCategoryProductShow',function(event) {
            event.preventDefault();
            var limit_data = $(this).data('id');
            var category_slug = $('#categorySlug').val();
            $.ajax({
                url: "{{ route('cartpro.limit_category_product_show') }}",
                type: "GET",
                data: {limit_data:limit_data, category_slug:category_slug},
                success: function (data) {
                    console.log(data);
                    $('.categoryWiseProductField').html(data);
                }
            })
        });

        $('.sortBy').on('click',function(e){
            e.preventDefault();
            var condition = $(this).data('condition');
            var category_slug = $(this).data('category_slug');
            $.ajax({
                url: "{{route('cartpro.category_wise_products_condition')}}",
                type: "GET",
                data: {condition:condition, category_slug:category_slug},
                success: function (data) {
                    console.log(data);
                    $('.categoryWiseProductField').empty();
                    $('.categoryWiseProductField').html(data);
                }
            })
        });

        $("#priceRange" ).on('click',function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "GET",
                url: "{{route('cartpro.category.price_range')}}",
                data: form.serialize(),
                success: function(data){
                    console.log(data);
                    $('.categoryWiseProductField').empty().html(data);
                }
            });
        });


        //New
        $('#sidebarFilter').on('submit',function (e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "GET",
                url: "{{route('cartpro.category.sidebar_filter')}}",
                data: form.serialize(),
                success: function(data){
                    console.log(data);
                    $('.categoryWiseProductField').empty().html(data);
                }
            });
        });
    </script>

    <script>
        /*------------------------
             price range slider
        --------------------------*/
        let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";

        if ($('#slider-range').length) {
            $("#slider-range").slider({
                range: true,
                min: 0 * {{$CHANGE_CURRENCY_RATE}},
                max: 10000 * {{$CHANGE_CURRENCY_RATE}},
                values: [0 * {{$CHANGE_CURRENCY_RATE}}, 5000 * {{$CHANGE_CURRENCY_RATE}}],
                slide: function(event, ui) {
                    $("#amount").val(moneySymbol+' '+ + ui.values[0] + " - "+moneySymbol+' ' + ui.values[1]);
                }
            });
            $("#amount").val(moneySymbol+' '+ $("#slider-range").slider("values", 0) +
                " - "+moneySymbol+' '+ $("#slider-range").slider("values", 1));
        }
    </script>
@endpush
