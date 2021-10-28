@extends('frontend.layouts.master')
@section('frontend_content')
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">Shop</li>
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
                    <div class="sidebar_filters">

                        <!--sidebar-categories-box start-->
                        <div class="sidebar-widget sidebar-category-list">
                            <div class="sidebar-title">
                                <h2 data-bs-toggle="collapse" href="#collapseCategory" aria-expanded="true">Categories</h2>
                            </div>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu style1 mar-top-15 collapse show" id="collapseCategory">
                                <ul>
                                    <li class="has-sub"><a href="# ">Shirts</a> <span class="count">(7)</span>
                                        <ul>
                                            <li><a href="#">Calvin Klein <span class="count">(7)</span></a></li>
                                            <li><a href="#">H&M <span class="count">(7)</span></a></li>
                                            <li><a href="#">Nautica <span class="count">(7)</span></a></li>
                                            <li><a href="#"> Bosch <span class="count">(7)</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Jeans</a> <span class="count">(5)</span>
                                        <ul>
                                            <li><a href="#">Levi's <span class="count">(7)</span></a></li>
                                            <li><a href="#">Diesel <span class="count">(7)</span></a></li>
                                            <li><a href="#">Calvin Klein <span class="count">(7)</span></a></li>
                                            <li><a href="#">Armani <span class="count">(7)</span></a></li>
                                            <li><a href="#">Nostrum <span class="count">(7)</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Watch</a> <span class="count">(8)</span>
                                        <ul>
                                            <li><a href="#">Titan <span class="count">(7)</span></a></li>
                                            <li><a href="#">Omega SA <span class="count">(7)</span></a></li>
                                            <li><a href="#">Breguet <span class="count">(7)</span></a></li>
                                            <li><a href="#">Seiko <span class="count">(7)</span></a></li>
                                            <li><a href="#">Rolex <span class="count">(7)</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-sub"><a href="#">Shoes</a> <span class="count">(3)</span>
                                        <ul>
                                            <li><a href="#">Reebok <span class="count">(7)</span></a></li>
                                            <li><a href="#">Jordan <span class="count">(7)</span></a></li>
                                            <li><a href="#">Vans <span class="count">(7)</span></a></li>
                                            <li><a href="#">Converse <span class="count">(7)</span></a></li>
                                            <li><a href="#">Puma <span class="count">(7)</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->

                        </div>
                        <!--sidebar-categores-box end  -->


                        <!--sidebar-categores-box start  -->
                        <!-- Filter By Price -->
                        <div class="sidebar-widget filters">
                            <div class="sidebar-title">
                                <h2 data-bs-toggle="collapse" href="#collapsePrice" aria-expanded="true">Filter By Price</h2>
                            </div>
                            <div class="filter-area collapse show" id="collapsePrice">
                                <div id="slider-range" class="price-range mar-bot-20"></div>
                                <input type="text" id="amount">
                            </div>
                        </div>

                        <!-- Filter By Size -->
                        <div class="sidebar-widget filters">
                            <div class="sidebar-title">
                                <h2 data-bs-toggle="collapse" href="#collapseSize" aria-expanded="true">Filter By Size</h2>
                            </div>
                            <div class="filter-area collapse show" id="collapseSize">
                                <div class="size-checkbox">
                                    <form action="#">
                                        <ul class="filter-opt size pt-2">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-s" name="example1">
                                                    <label class="custom-control-label" for="size-s"><span class="size-block">S</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-m" name="example1">
                                                    <label class="custom-control-label" for="size-m"><span class="size-block">M</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-l" name="example1">
                                                    <label class="custom-control-label" for="size-l"><span class="size-block">L</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-xl" name="example1">
                                                    <label class="custom-control-label" for="size-xl"><span class="size-block">XL</span></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="size-xxl" name="example1">
                                                    <label class="custom-control-label" for="size-xxl"><span class="size-block">XXL</span></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Filter By Color -->
                        <div class="sidebar-widget filters">
                            <div class="sidebar-title">
                                <h2 data-bs-toggle="collapse" href="#collapseColor" aria-expanded="true">Filter By Color</h2>
                            </div>
                            <div class="filter-area collapse show" id="collapseColor">
                                <div class="color-category">
                                    <form action="#">
                                        <ul class="filter-opt color">
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="amber" name="example1">
                                                    <label class="custom-control-label" for="amber"data-bs-toggle="tooltip" data-bs-placement="top" title="Amber">
                                                        <span class="color-block bg-amber"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="black" name="example1">
                                                    <label class="custom-control-label" for="black"data-bs-toggle="tooltip" data-bs-placement="top" title="Amber">
                                                        <span class="color-block bg-black"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="white" name="example1">
                                                    <label class="custom-control-label" for="white"data-bs-toggle="tooltip" data-bs-placement="top" title="Amber">
                                                        <span class="color-block bg-white"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="antique" name="example1">
                                                    <label class="custom-control-label" for="antique" data-bs-toggle="tooltip" data-bs-placement="top" title="Amber">
                                                        <span class="color-block bg-antique"></span>
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="green" name="example1">
                                                    <label class="custom-control-label" for="green"  data-bs-toggle="tooltip" data-bs-placement="top" title="Amber">
                                                        <span class="color-block bg-green"></span>
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                        </div>
                        <!--sidebar-categories-box end-->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="page-title h5 uppercase mb-0">Electronics</h1>
                        <span class="d-none d-md-block"><strong class="theme-color">{{$category->categoryProduct->count() ?? 0}}</strong> products found</span>
                    </div>

                    <div class="products-header">
                        <ul class="nav shop-item-filter-list">
                            <li><a class="view-grid active"><i class="ti-view-grid"></i></a></li>
                            <li><a class="view-list"><i class="ti-layout-list-thumb"></i></a></li>
                            <li class="d-md-block d-sm-block d-lg-none"><a class="filter-icon"><i class="las la-sliders-h"></i> Filters</a></li>
                        </ul>
                        <!-- shop-item-filter-list start -->
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Show: 12
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
                            Sort by Latest
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Popularity</a></li>
                                <li><a class="dropdown-item" href="#">Top rated</a></li>
                                <li><a class="dropdown-item active" href="#">Latest</a></li>
                                <li><a class="dropdown-item" href="#">Price: Low to High</a></li>
                                <li><a class="dropdown-item" href="#">Price: High to Low</a></li>
                            </ul>
                        </div>
                        <!-- shop-item-filter-list end -->
                    </div>


                    <!--Shop product wrapper starts-->
                    <div class="shop-products-wrapper">
                        <div class="product-grid categoryWiseProductField">
                                @forelse ($category->categoryProduct as $item)
                                        <form action="{{route('product.add_to_cart')}}" class="addToCart" method="post">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{$item->product_id}}">
                                            <input type="hidden" name="product_slug" value="{{$item->product->slug}}">
                                            <input type="hidden" name="category_id" value="{{$category->id ?? null}}">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="product-grid-item">
                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        @if ($item->productBaseImage!=NULL)
                                                            <img src="{{asset('public/'.$item->productBaseImage->image)}}" alt="...">
                                                        @else
                                                            <img src="{{asset(url('public/images/empty.jpg'))}}" alt="...">
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
                                                        {{-- <a class="product-category" href="#">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL}}</a> --}}
                                                        <a class="product-name" href="{{url('product/'.$item->product->slug.'/'. $category->id)}}">
                                                            {{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}
                                                        </a>
                                                        <div class="product-short-description">
                                                            {!!$item->productTranslation->description ?? $item->productTranslationDefaultEnglish->description ?? null !!}
                                                        </div>
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
                                                                    @if ($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price < $item->product->price)
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            <span class="promo-price">{{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')}} {{env('DEFAULT_CURRENCY_SYMBOL')}}</span>
                                                                            <span class="old-price">{{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}</span>
                                                                        @else
                                                                            <span class="promo-price">{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')}} </span>
                                                                            <span class="old-price"> {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @endif
                                                                    @else
                                                                        @if(env('CURRENCY_FORMAT')=='suffix')
                                                                            <span class="price">{{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}</span>
                                                                        @else
                                                                            <span class="price">{{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-options">
                                                        <div class="product-price mt-2">
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
                                                                <span class="price">
                                                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                                                        {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                                                    @else
                                                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} {{ number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '') }}
                                                                    @endif
                                                                </span>
                                                            @endif
                                                        </div>
                                                            <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i>{{__('Add to cart')}}</button>

                                                            {{-- <a class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i> Add to cart</a> --}}
                                                        <div class="d-flex justify-content-between">
                                                            <a href="wishlist.html">
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span> Wishlist
                                                            </a>
                                                            <a href="compare.html">
                                                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                                Comapre
                                                            </a>
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
            </div>
        </div>
    </div>
    <!-- Shop Page Ends-->



    <!-- Quick Shop Modal starts -->
    @forelse ($category->categoryProduct as $item)
        <div class="modal fade quickshop" id="{{$item->product->slug ?? null}}" tabindex="-1" role="dialog" aria-labelledby="{{$item->product->slug ?? null}}" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                        </button>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-wrapper">
                                    <div class="slider-for-modal">
                                        @forelse ($item->additionalImage as $value)
                                            <div class="slider-for__item ex1">
                                                <img src="{{asset('public/'.$value->image)}}" alt="..." />
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                    <div class="slider-nav-modal">
                                        {{-- <div class="slider-nav__item">
                                            <img src="{{asset('public/frontend/images/products/apple-watch.png')}}" alt="..." />
                                        </div>
                                        <div class="slider-nav__item">
                                            <img src="{{asset('public/frontend/images/products/apple-watch-2.jpg')}}" alt="..." />
                                        </div>
                                        <div class="slider-nav__item">
                                            <img src="{{asset('public/frontend/images/products/apple-watch-3.jpg')}}" alt="..." />
                                        </div>
                                        <div class="slider-nav__item">
                                            <img src="{{asset('public/frontend/images/products/apple-watch-4.jpg')}}" alt="..." />
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-details">
                                    <a class="item-category" href="">{{$item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null}}</a>
                                    <h3 class="item-name">{{$item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null}}</h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand">Brand: <a href=""></a></div>
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-ios-star"></i></li>
                                                <li><i class="ion-android-star-half"></i></li>
                                            </ul>
                                            <span>( 04 )</span>
                                        </div>
                                        <div class="item-sku">SKU: {{$item->product->sku ?? null}}</div>
                                    </div>
                                    <hr>
                                    @if ($item->product->special_price>0)
                                        <div class="item-price">$ {{$item->product->special_price ?? null}}</div>
                                        <hr>
                                        <div class="item-price"><del>$ {{$item->product->price ?? null}}</del></div>
                                        <hr>
                                    @else
                                        <div class="item-price">$ {{$item->product->price ?? null}}</div>
                                        <hr>
                                    @endif

                                    <div class="item-short-description">
                                        <p>{!!$item->productTranslation->description ?? $item->productTranslationDefaultEnglish->description ?? null !!}</p>
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
    @empty
    @endforelse
    <!--Quick shop modal ends-->
@endsection
