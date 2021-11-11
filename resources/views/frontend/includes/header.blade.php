    <!--Header Area starts-->
    <header>
        <div id="header-top" class="header-top">
            <div class="container">
                <div class="d-lg-flex d-xl-flex justify-content-between">
                    <div class="header-top-left d-none d-lg-flex d-xl-flex">
                        <ul class="header-top-social menu">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="header-top-middle d-none d-lg-flex d-xl-flex">
                        <span class="announcement">
                            <!--Welcome-->
                            @if ($settings[0]->settingTranslation || $settings[0]->settingTranslationDefaultEnglish)
                                {{$settings[0]->settingTranslation->value ?? $settings[0]->settingTranslationDefaultEnglish->value ?? NULL}}
                            @endif
                        </span>
                    </div>
                    <div class="header-top-right">
                        <ul>
                            <li class="has-dropdown"><a href="#">{{$languages[$locale]->language_name}}</a>
                                <ul class="dropdown">
                                    @foreach ($languages as $item)
                                        <li><a href="{{route('cartpro.default_language_change',$item->id)}}" {{$item->local==Session::get('currentLocal') ? 'selected': ''}}>{{$item->language_name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">Currency</a>
                                <ul class="dropdown">
                                    @foreach ($currency_codes as $item)
                                        <li><a href="#">{{$item->currency_code}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            {{-- <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact Us</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-middle" class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-7">
                        <div class="mobile-menu-icon d-lg-none"><i class="ti-menu"></i></div>
                        <div class="logo">
                            <a href="#">
                                <img src="{{asset($header_logo_path)}}" alt="Brand logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                        <form class="header-search">
                            <input class="" type="text" id="searchText" placeholder="Search products" name="search">
                            <select name="category" class="selectpicker" onchange="location = this.value;">
                                <option value="" selected="">All Categories</option>
                                @forelse ($categories as $category)
                                    <option value="{{route('cartpro.category_wise_products',$category->slug)}}">{{$category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null}}</option>
                                @empty
                                @endforelse
                            </select>
                            <button class="btn btn-search" type="submit"><i class="ti-search"></i></button>
                        </form>
                        <div class="fixed-menu"></div>
                    </div>
                    <div class="col-lg-3 col-5">
                        <ul class="offset-menu-wrapper">
                            <li class="d-lg-none">
                                <a><i class="las la-search" data-bs-toggle="collapse" href="#mobile-search" role="button" aria-expanded="false" aria-controls="mobile-search"></i></a>
                            </li>

                            @auth
                                <li>
                                    <a href="{{route('user_account')}}"><i class="las la-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="My Account"></i></a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route('customer_login_form')}}"><i class="las la-user-lock" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"></i></a>
                                </li>
                            @endauth


                            @auth
                                <li class="wishlist__menu d-none d-lg-inline-block d-xl-inline-block">
                                    <a href="{{route('wishlist.index')}}">
                                        <i class="lar la-heart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Wishlist"></i>
                                    </a>
                                    <span class="badge badge-light wishlist_count">{{$total_wishlist }}</span>
                                </li>
                            @else
                                <li class="cart__menu d-none d-lg-inline-block d-xl-inline-block">
                                    <a href="#">
                                        <i class="lar la-heart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Wishlist"></i>
                                    </a>
                                    <span class="badge badge-light">0</span>
                                </li>
                            @endauth


                            <li class="cart__menu">
                                <i class="las la-shopping-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart"></i>
                                <span class="badge badge-light cart_count">{{$cart_count}}</span>
                                <span class="total">
                                    @if(env('CURRENCY_FORMAT')=='suffix')
                                        <span class="cart_total">{{$cart_total}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                    @else
                                        {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="cart_total">{{$cart_total}}</span>
                                    @endif
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Search Field-->
                <div class="row" id="search_field">
                    <div class="col-12 d-xl-flex justify-content-center" >
                        <table id="result">
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-4 d-none d-lg-flex d-xl-flex">
                        <div class="category-list">
                            <ul>
                                <li class="has-dropdown"><a class="category-button" href="#"><i class="ti-menu"></i>{{__('file.Shop By Category')}}</a>
                                    <ul class="dropdown">
                                        @forelse ($categories as $category)
                                            @if ($category->child->isNotEmpty())
                                                <li class="has-dropdown"><a href="{{route('cartpro.category_wise_products',$category->slug)}}"><i class="{{$category->icon ?? null}}"></i> {{$category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null}}</a>
                                                    <ul class="dropdown">
                                                        @foreach ($category->child as $item)
                                                            <li><a href="{{route('cartpro.category_wise_products',$item->slug)}}"><i class="{{$item->icon ?? null}}"></i>{{$item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @else
                                                <li><a href="{{route('cartpro.category_wise_products',$category->slug)}}"><i class="{{$category->icon ?? null}}"></i>{{$category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null}}</a></li>
                                            @endif
                                        @empty
                                        @endforelse
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-9 col-md-8">
                        <div class="main-header-inner">
                            <div id="main-menu" class="main-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        <li class="active"><a href="{{route('cartpro.home')}}">{{__('file.Home')}}</a></li>
                                        <li><a href="{{route('cartpro.home')}}">{{__('file.Shop')}}</a></li>
                                        <li><a href="{{route('cartpro.brands')}}">{{__('file.Brands')}}</a></li>
                                        {{-- <li><a href="{{route('page.about_us')}}">{{__('file.About Us')}}</a></li>
                                        <li><a href="{{route('page.terms_and_conditions')}}">{{__('file.Term of Service')}}</a></li>
                                        <li><a href="{{route('page.faq')}}">{{__('file.FAQ')}}</a></li> --}}

                                        @if ($menu!=NULL)
                                            @forelse ($menu->items as $menu_item)
                                                @if ($menu_item->child->isNotEmpty())
                                                    <li class="has-dropdown"><a href="{{$menu_item->link}}">{{$menu_item->label}}</a>

                                                        <ul class="dropdown">
                                                            @foreach($menu_item->child as $child)
                                                                <!--Extra-->
                                                                @if ($child->child->isNotEmpty())
                                                                    <li class="has-dropdown"><a href="{{$child->link}}">{{$child->label}}</a>
                                                                        <ul class="dropdown">
                                                                            @foreach($child->child as $sub_child)
                                                                                <li><a href="{{$sub_child->link}}">{{$sub_child->label}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @else
                                                                    <li><a href="{{$child->link}}">{{$child->label}}</a></li>
                                                                @endif
                                                                <!--Extra End-->
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @else
                                                    @if ($menu_item->locale==$locale)
                                                        @if(strpos($menu_item->link, 'https://') !== false)
                                                            <li><a href="{{$menu_item->link}}">{{$menu_item->label}}</a></li>
                                                        @else
                                                            <li><a href="{{route('page.Show',$menu_item->link)}}">{{$menu_item->label}}</a></li>
                                                        @endif
                                                            {{-- <li><a href="{{$menu_item->link}}">{{$menu_item->label}}</a></li> --}}
                                                    @endif
                                                    {{-- <li><a href="{{$menu_item->link}}">{{$menu_item->label}}</a></li> --}}
                                                @endif
                                            @empty
                                            @endforelse
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mobile collapse" id="mobile-search">
            <div class="container">
                <div id="header-search" class="d-lg-none">
                    <form class="header-search" class="d-lg-none">
                        <input class="" type="text" placeholder="Search products, categories, sku..." name="search" autofocus>
                        <button class="btn btn-search" type="submit"><i class="ti-search"></i></button>
                    </form>
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

                        <div class="cart_list">
                            @forelse ($cart_contents as $item)
                                <div id="{{$item->rowId}}" class="shp__single__product">
                                    <div class="shp__pro__thumb">
                                        <a href="#">
                                            <img src="{{asset('public/'.$item->options->image ?? null)}}">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="{{url('product/'.$item->options->product_slug.'/'. $item->options->category_id)}}">{{$item->name}}</a></h2>
                                        <span>{{$item->qty}}</span> x <span class="shp__price">
                                            @if(env('CURRENCY_FORMAT')=='suffix')
                                                {{$item->price}} {{env('DEFAULT_CURRENCY_SYMBOL')}}
                                            @else
                                                {{env('DEFAULT_CURRENCY_SYMBOL')}} {{$item->price}}
                                            @endif
                                        </span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="#" class="remove_cart" data-id="{{$item->rowId}}" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>

                </div>
                <!-- IF EMPTY CART -->
                {{-- <div class="empty-cart">
                    <img src="{{asset('public/frontend/images/empty-cart.png')}}">
                    <h5>Your cart is empty</h5>
                </div> --}}
                <!-- IF EMPTY CART -->
            </div>
            <div class="shopping__cart__footer">
                <div class="shoping__total">
                    <span class="subtotal">Subtotal:</span>
                    <span class="total__price">
                        @if(env('CURRENCY_FORMAT')=='suffix')
                            <span class="total_price">{{$cart_total}}</span> {{env('DEFAULT_CURRENCY_SYMBOL')}}
                        @else
                            {{env('DEFAULT_CURRENCY_SYMBOL')}} <span class="total_price">{{$cart_total}}</span>
                        @endif
                    </span>
                </div>
                <div class="shopping__btn">
                    <a class="button style3" href="{{route('cart.view_details')}}">View Cart</a>
                    <form action="{{route('cart.checkout')}}" method="post">
                        @csrf
                        <button type="submit" class="button style1">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Offset Wrapper ends -->
    <!-- Header Area  ends -->
