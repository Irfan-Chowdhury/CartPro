
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="{{asset('public/frontend/images/favicon.png')}}" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="{{asset('public/frontend/css/plugins.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{asset('public/frontend/css/bootstrap-select.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- style CSS -->
    <link href="{{asset('public/frontend/css/cartPro-style.css')}}" rel="stylesheet" />
    <!-- <link href="css/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link href="{{asset('public/frontend/css/bootstrap-colorpicker.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/payment-fonts.css')}}" rel="stylesheet" />
    <!-- Document Title -->
    <title>CartPro - ecommerce HTML Template</title>
</head>

<body>
    <div id="demo">
        <h6>Colorways</h6>
        <ul id="switcher">
            <li class="color-change" data-color="#0071df" style="background-color:#0071df"></li>
            <li class="color-change" data-color="#f51e46" style="background-color:#f51e46"></li>
            <li class="color-change" data-color="#fa9928" style="background-color:#fa9928"></li>
            <li class="color-change" data-color="#fd6602" style="background-color:#fd6602"></li>
            <li class="color-change" data-color="#59b210" style="background-color:#59b210"></li>
            <li class="color-change" data-color="#ff749f" style="background-color:#ff749f"></li>
            <li class="color-change" data-color="#f8008c" style="background-color:#f8008c"></li>
            <li class="color-change" data-color="#6453f7" style="background-color:#6453f7"></li>
        </ul>
        <h6>Custom color</h6>
        <input type="text" id="color-input" class="form-control" value="#0071df">
        <div class="demo-btn"><i class="las la-cog"></i></div>
    </div>
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
                        <span class="announcement">Welcome to CartPro</span>
                    </div>
                    <div class="header-top-right">
                        <ul>
                            <li class="has-dropdown"><a href="#">English</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Arabic</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">USD</a>
                                <ul class="dropdown">
                                    <li><a href="#">GBP</a></li>
                                    <li><a href="#">Euro</a></li>
                                    <li><a href="#">Yen</a></li>
                                </ul>
                            </li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact Us</a></li>
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
                                <img src="images/logo-black.png" alt="Brand logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                        <form class="header-search">
                            <input class="" type="text" placeholder="Search products, categories, sku..." name="search">
                            <select name="category" class="selectpicker">
                                <option value="" selected="">All Categories</option>
                                <option value="electronics">Electronics</option>
                                <option value="laptops">Laptops</option>
                                <option value="mobiles">Mobiles</option>
                                <option value="fashion">Fashion</option>
                                <option value="watches">Watches</option>
                                <option value="backpacks">Backpacks</option>
                                <option value="desktops">Desktops</option>
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
                            <li>
                                <a href=""><i class="las la-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"></i></a>
                            </li>
                            <!-- FOLLOWING CODE APPEARS ONCE USER IS LOGGED IN -->
                            <!-- <li class="user-menu">
                                <i class="las la-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="My Account"></i>
                                <ul class="user-dropdown-menu">
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop-checkout.html">Checkout</a></li>
                                    <li><a href="shop-cart.html">Shopcart</a></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </li> -->
                            <li class="cart__menu d-none d-lg-inline-block d-xl-inline-block">
                                <i class="ion-android-favorite-outline" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Wishlist"></i>
                                <span class="badge badge-light">2</span>
                            </li>
                            <li class="cart__menu">
                                <i class="las la-shopping-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart"></i>
                                <span class="badge badge-light">3</span>
                                <span class="total">$0.00</span>
                            </li>
                        </ul>
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
                                <li class="has-dropdown"><a class="category-button" href="#"><i class="ti-menu"></i> Shop By Department</a>
                                    <ul class="dropdown">
                                        <li class="has-dropdown"><a href="electronics"><i class="las la-bolt"></i> Electronics</a>
                                            <ul class="dropdown">
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="laptops"><i class="las la-laptop"></i> Laptops</a>
                                            <ul class="megamenu dropdown">
                                                <li class="mega-title"><a>Shop Pages</a>
                                                    <ul>
                                                        <li><a href="shop-left-sidebar-grid.html">shop left sidebar</a></li>
                                                        <li><a href="shop-fullwidth.html">shop Full width</a></li>
                                                        <li><a href="shop-two-column.html">shop Two column</a></li>
                                                        <li><a href="shop-three-column.html">shop Three column</a></li>
                                                        <li><a href="shop-instagram.html">shop instagram</a></li>
                                                        <li><a href="shop-no-gutter.html">shop no gutter</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><a>Product Pages</a>
                                                    <ul>
                                                        <li><a href="product-details-v1.html">product Simple 01</a></li>
                                                        <li><a href="product-details-v2.html">product Simple 02</a></li>
                                                        <li><a href="product-details-v3.html">product Simple 03</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-title"><a>Other pages</a>
                                                    <ul>
                                                        <li><a href="my-account.html">My Account</a></li>
                                                        <li><a href="shop-checkout.html">checkout</a></li>
                                                        <li><a href="shop-cart.html">Shopping cart</a></li>
                                                        <li><a href="compare.html">compare</a></li>
                                                        <li><a href="order-tracking.html">Order tracking</a></li>
                                                        <li><a href="wishlist.html">wishlist</a></li>
                                                        <li><a href="login.html">Login</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-banner">
                                                    <a href="shop-fullwidth.html"><img src="images/others/menu-banner.jpg" alt="..."></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="mobiles"><i class="las la-mobile-alt"></i> Mobiles</a></li>
                                        <li><a href="fashion"><i class="las la-tshirt"></i> Fashion</a></li>
                                        <li><a href="watches"><i class="las la-clock"></i> Watches</a></li>
                                        <li><a href="backpacks"><i class="las la-hiking"></i> Backpacks</a></li>
                                        <li><a href="desktops"><i class="las la-laptop"></i> Desktops</a></li>
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
                                        <li class="active"><a href="index.html">Home</a></li>
                                        <li><a href="shop-left-sidebar.html">Shop</a></li>
                                        <li class="has-dropdown"><a href="#">Pages</a>
                                            <ul class="dropdown">
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="#">Blog</a>
                                            <ul class="dropdown">
                                                <li class="has-dropdown"><a href="#">BLog layout</a>
                                                    <ul class="dropdown">
                                                        <li><a href="blog-two-column.html">Blog two column</a></li>
                                                        <li><a href="blog-three-column.html">Blog three column</a></li>
                                                        <li><a href="blog-left-sidebar.html">Blog left sidebar</a></li>
                                                        <li><a href="blog-without-sidebar.html">Blog without sidebar</a></li>
                                                    </ul>
                                                </li>
                                                <li class="has-dropdown"><a href="#">BLog Single</a>
                                                    <ul class="dropdown">
                                                        <li><a href="single-blog-left-sidebar.html">Single blog left sidebar</a></li>
                                                        <li><a href="single-blog-without-sidebar.html">Single blog without sidebar</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
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
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/promo/cart-1-300x350.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">Samsung Curved Widescreen 4k Ultra HD TV</a></h2>
                            <span>1</span> x <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/promo/cart-1-300x350.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">North Star Blazer</a></h2>
                            <span>1</span> x <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/promo/cart-1-300x350.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">North Star Blazer</a></h2>
                            <span>1</span> x <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/promo/cart-1-300x350.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">North Star Blazer</a></h2>
                            <span>1</span> x <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/promo/cart-1-300x350.jpg" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">North Star Blazer</a></h2>
                            <span>1</span> x <span class="shp__price">$105.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                    <div class="shp__single__product">
                        <div class="shp__pro__thumb">
                            <a href="#">
                                <img src="images/products/redPhone-300x300.png" alt="product images">
                            </a>
                        </div>
                        <div class="shp__pro__details">
                            <h2><a href="product-details.html">Thermoball Full zip jacket</a></h2>
                            <span>1</span> x <span class="shp__price">$25.00</span>
                        </div>
                        <div class="remove__btn">
                            <a href="#" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                        </div>
                    </div>
                </div>
                <!-- IF EMPTY CART -->
                <!-- <div class="empty-cart">
                    <img src="images/empty-cart.png">
                    <h5>Your cart is empty</h5>
                </div> -->
                <!-- IF EMPTY CART -->
            </div>
            <div class="shopping__cart__footer">
                <div class="shoping__total">
                    <span class="subtotal">Subtotal:</span>
                    <span class="total__price">$130.00</span>
                </div>
                <div class="shopping__btn">
                    <a class="button style3" href="shop-cart.html">View Cart</a>
                    <a class="button style1" href="shop-checkout.html">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offset Wrapper ends -->
    <!-- Header Area  ends -->
    <!--Home Banner starts -->
    <div class="banner-area v3">
        <div class="container">
            <div class="single-banner-item style2">
                <div class="row">
                    <div class="col-md-8">
                        <div class="banner-slider">
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill" style="background-image: url('images/slider/slide-1.png'); background-size: cover; background-position: center;">
                                    <!-- <img src="images/slider/slide-1.png" alt=""> -->
                                    <div class="info">
                                        <div>
                                            <h3>Sony Headphone</h3>
                                            <h5>Let the sound come alive!</h5>
                                            <a class="button style1 md" href="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill" style="background-image: url('images/slider/slide-2.png'); background-size: cover; background-position: center;">
                                    <!-- <img src="images/slider/slide-2.png" alt=""> -->
                                    <div class="info">
                                        <div>
                                            <h3>Redmi Ear-buds</h3>
                                            <h5>Crystal clear sound</h5>
                                            <a class="button style1 md" href="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                            <!-- Item -->
                            <div class="item">
                                <div class="img-fill" style="background-image: url('images/slider/slide-3.png'); background-size: cover; background-position: center;">
                                    <!-- <img src="images/slider/slide-3.png" alt=""> -->
                                    <div class="info right">
                                        <div>
                                            <h3>Apple Watch</h3>
                                            <h5>Fashion meets functionality</h5>
                                            <a class="button style1 md" href="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- // Item -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="slider-banner">
                            <div>
                                <img src="images/products/cat-7-300x300.png" alt="...">
                            </div>
                            <div class="">
                                <h4>Save big on Cameras</h4>
                                <a href="shop-fullwidth.html" class="link-hov style1">Shop Now</a>
                            </div>
                        </div>
                        <div class="slider-banner">
                            <div>
                                <img src="images/products/redPhone-300x300.png" alt="...">
                            </div>
                            <div class="">
                                <h4>Save big on Cameras</h4>
                                <a href="shop-fullwidth.html" class="link-hov style1">Shop Now</a>
                            </div>
                        </div>
                        <div class="slider-banner">
                            <div>
                                <img src="images/products/macpro-300x300.png" alt="...">
                            </div>
                            <div class="">
                                <h4>Save big on Cameras</h4>
                                <a href="shop-fullwidth.html" class="link-hov style1">Shop Now</a>
                            </div>
                        </div>
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
                            <h3>Top categories</h3>
                            <a href="" class="button style4 mb-2 d-none d-md-block">All categories</a>
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
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/clothing.jpg">
                                    <div class="category-name">
                                        Fashion
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/electronics.jpg">
                                    <div class="category-name">
                                        Electronics
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/computer.jpg">
                                    <div class="category-name">
                                        Computer
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/smartphones.jpg">
                                    <div class="category-name">
                                        Smartphones
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/entertainment.jpg">
                                    <div class="category-name">
                                        Entertainment
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/furniture.jpg">
                                    <div class="category-name">
                                        Furniture
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/gadgets.jpg">
                                    <div class="category-name">
                                        Gadgets
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/health-beauty.jpg">
                                    <div class="category-name">
                                        Health & Beauty
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/home-kitchen.jpg">
                                    <div class="category-name">
                                        Home & Kitchen
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="images/category/jewllery-watch.jpg">
                                    <div class="category-name">
                                        Jewllery & Watches
                                    </div>
                                </div>
                            </a>
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
                <div class="col-md-12 text-center">
                    <ul class="nav nav-tabs product-details-tab" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#special" role="tab" aria-selected="true">Special Offers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="new-tab" data-bs-toggle="tab" href="#new" role="tab" aria-selected="false">New Arrivals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="best-tab" data-bs-toggle="tab" href="#best" role="tab" aria-selected="false">Best Sellers</a>
                        </li>
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
                        <div class="tab-pane fade show active" id="special" role="tabpanel" aria-labelledby="all-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-item-img" src="images/products/apple-watch.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>-30%</span>
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
                                                            <span class="price">$383</span>
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
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/macpro.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/camera2.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/webcam.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/console.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/iPhone.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                        <div class="tab-pane fade" id="new" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-item-img" src="images/products/apple-watch.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>-30%</span>
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
                                                            <span class="price">$383</span>
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
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/macpro.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/camera2.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/webcam.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/console.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/iPhone.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                        <div class="tab-pane fade" id="best" role="tabpanel">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-item-img" src="images/products/apple-watch.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>-30%</span>
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
                                                            <span class="price">$383</span>
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
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/macpro.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/camera2.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <div class="product-item-img">
                                                    <img src="images/products/webcam.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/widetv.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/console.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/wireless-headphone.png" alt="...">
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item">
                                                <img src="images/products/iPhone.png" alt="...">
                                                <div class="product-promo-text style1">
                                                    <span>Sold</span>
                                                </div>
                                                <div class="product-overlay">
                                                    <a href="#">
                                                        <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                    </a>
                                                    <a href="wishlist.html">
                                                        <span class="ti-heart"></span>
                                                    </a>
                                                    <a href="compare.html">
                                                        <span class="ti-control-shuffle"></span>
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
                                    <div class="swiper-slide">
                                        <div class="single-product-wrapper">
                                            <div class="single-product-item v1">
                                                <img class="product-img" src="images/products/tablet.png" alt="...">
                                                <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                                <div class="product-promo-text style1">
                                                    <p>Hot</p>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                        <img src="images/products/redPhone-300x300.png" alt="...">
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
                                        <img src="images/products/apple-watch-2.jpg" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                                <img src="images/products/redPhone-300x300.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                                <img src="images/products/widetv.png" alt="...">
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
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/1.png" alt="...">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/2.png" alt="...">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/3.png" alt="...">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/4.png" alt="...">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/5.png" alt="...">
                                </a>
                            </div>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="images/brands/6.png" alt="...">
                                </a>
                            </div>
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
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="ti-truck"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>Free Shipping</h5>
                        <span>Orders over $100</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="ti-loop"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>Money returns</h5>
                        <span>Within 30 days</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>100% secure</h5>
                        <span>Online Trading</span>
                    </div>
                </div>
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="ti-headphone-alt"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5>24/7 support</h5>
                        <span>Dedicated Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero Promo Area ends--->
    <div class="newsletter-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="d-flex align-items-center">
                        <div>
                            <i class="ion-ios-paperplane-outline me-3"></i>
                        </div>
                        <div>
                            <h3 class="mb-0">Subscribe to our Newsletter</h3>
                            <p>Get <strong>10%</strong> discount on your next order when you signup!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <form class="newsletter">
                        <input class="" type="text" placeholder="Enter your email" name="newsletter">
                        <button class="button style1 btn-search" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Scroll to top starts-->
    <a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
    <!--Scroll to top ends-->
    <!-- Footer section Starts-->
    <div class="footer-wrapper pt-0">
        <div class="container">
            <hr class="mt-0">
            <div class="row">
                <div class="col-lg-5 col-md-4">
                    <div class="footer-logo">
                        <a href="#"><img src="images/logo-black.png" alt="..."></a>
                    </div>
                    <div class="footer-text">
                        <h5 class="text-grey mb-0">Got Question? Call us:</h5>
                        <h4>(+800) 1234 5678 90</h4>
                    </div>
                    <div class="footer-text">
                        <h6 class="text-grey mb-0">Contact Info</h6>
                        <p>CartPro, Tower 1, Business Park</p>
                    </div>
                    <ul class="footer-social mt-3 p-0">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-8">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Find it fast</h3>
                                <div class="d-flex justify-content-between">
                                    <ul class="footer-menu">
                                        <li><a class="" href="">Waterproof Headphones</a></li>
                                        <li><a class="" href="">Laptops & Computers</a></li>
                                        <li><a class="" href="">Smart Phones & Tablets</a></li>
                                        <li><a class="" href="">Video Games & Consoles</a></li>
                                        <li><a class="" href="">TV & Audio</a></li>
                                        <li><a class="" href="">Cameras & Photography</a></li>
                                        <li><a class="" href="">Gadgets</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Customer care</h3>
                                <ul class="footer-menu">
                                    <li><a class="" href="#">Help & Contact us</a></li>
                                    <li><a class="" href="#">Returns & Refunds</a></li>
                                    <li><a class="" href="#">Online Stores</a></li>
                                    <li><a class="" href="#">Terms & Condition</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Company</h3>
                                <ul class="footer-menu">
                                    <li><a class="" href="about.html">About us</a></li>
                                    <li><a class="" href="contact.html">Contact</a></li>
                                    <li><a class="" href="#">Career</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom">
                <div class="col-md-6">
                    <p>&copy; 2020. All rights reserved</p>
                </div>
                <div class="col-md-6">
                    <div class="footer-payment-options">
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Stripe"><i class="pw pw-stripe"></i></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Paypal"><i class="pw pw-paypal"></i></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Visa"><i class="pw pw-visa"></i></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Mastercard"><i class="pw pw-mastercard"></i></span>
                        <span data-bs-toggle="tooltip" data-bs-placement="top" data-original-title="Amex"><i class="pw pw-american-express"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer section Ends-->
    <!-- Cookie consent Starts-->
    <div class="alert alert-primary alert-dismissible fade show cookie-alert" role="alert">
        <div class="d-flex justify-content-center align-items-center">
            <i class="ion-ios-information"></i>
            <p> We use cookies to ensure you get the best experience on our website. <a href="#" class="alert-link">Accept</a></p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <!-- Cookie consent Ends-->
    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="quickshop" tabindex="-1" role="dialog" aria-labelledby="quickshop" aria-hidden="true">
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
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
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
    <div class="modal fade newsletter-modal" id="newsletter-modal" tabindex="-1" role="dialog" aria-labelledby="newsletter-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background-image: url('images/newsletter/newsletter.jpg');background-size: cover;background-position: bottom;">
                <div class="modal-body">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-lg-7">
                            <h3 class="h2 semi-bold">Get <span class="theme-color">10%</span> discount!</h3>
                            <p class="lead mb-5">Subscribe to our mailing list to receive updates on new arrivals, special offers and our promotions.</p>
                            <form class="newsletter mb-5">
                                <input class="" type="text" placeholder="Enter your email" name="newsletter">
                                <button class="button style1 btn-search" type="submit">Subscribe</button>
                            </form>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="disable-popup">
                                <label class="form-check-label" for="disable-popup">
                                    Got it! Don't show this popup again.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
    <!-- FACEBOOK CHAT PLUGIN STARTS -->
    <!-- Messenger Chat plugin Code -->
    <div id="fb-root"></div>
    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>
    <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "CUSTOMER FACEBOOK PAGE ID GOES HERE");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v11.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- FACEBOOK CHAT PLUGIN ENDS -->
    <!--Plugin js -->
    <script src="{{asset('public/frontend/js/plugin.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap-select.min.js')}}"></script>
    <!-- Main js -->
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#newsletter-modal').modal('toggle');
    });
    </script>
    <script src="{{asset('public/frontend/js/bootstrap-colorpicker.js')}}"></script>
    <script>
    $('.demo-btn').on('click', function(){
        $('#demo').toggleClass('open');
    });
    $(function () {
        $('#color-input').colorpicker({
        });
    });
    </script>
</body>

</html>