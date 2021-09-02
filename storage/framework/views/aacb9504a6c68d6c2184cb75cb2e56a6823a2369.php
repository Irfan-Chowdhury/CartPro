
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
    
<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="#" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="<?php echo e(asset('public/general/css/plugins.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/general/css/bootstrap-select.min.css')); ?>" rel="stylesheet" />
    <!-- style CSS -->
    <link href="<?php echo e(asset('public/general/css/cartPro-style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/general/css/payment-fonts.css')); ?>" rel="stylesheet" />
    <!-- Document Title -->
    <title>CartPro - ecommerce HTML Template</title>
</head>

<body>
    <!--Header Area starts-->
    <header>
        <div id="header-top" class="header-top d-none d-lg-flex d-xl-flex">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="language-switcher">
                            <ul>
                                <li class="has-dropdown"><a href="#">English</a>
                                    <ul class="dropdown">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Arabic</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="currency-switcher">
                            <ul>
                                <li class="has-dropdown"><a href="#">USD</a>
                                    <ul class="dropdown">
                                        <li><a href="#">GBP</a></li>
                                        <li><a href="#">Euro</a></li>
                                        <li><a href="#">Yen</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        Welcome to CartPro
                    </div>
                    <div class="col-md-6 text-right">
                        <ul class="header-top-social menu">
                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                            <li><a href="#"><i class="ti-youtube"></i></a></li>
                        </ul>
                        <ul class="header-top-menu menu">
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
                    <div class="col-lg-3 col-6">
                        <div class="mobile-menu-icon d-lg-none"><i class="ti-menu"></i></div>
                        <div class="logo">
                            <a href="#">
                                <img src="<?php echo e(asset('public/general/images/logo-black.png')); ?>" alt="Brand logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column">
                        <form class="header-search">
                            <input class="" type="text" placeholder="Search products, categories, sku..." name="search">
                            <select name="category">
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
                    <div class="col-lg-3 col-6">
                        <ul class="offset-menu-wrapper">
                            <li><a href="">Login</a></li>
                            <!-- FOLLOWING CODE APPEARS ONCE USER IS LOGGED IN -->
                            <!-- <li class="user-menu">
                                <i class="ti-user"></i>
                                <ul class="user-dropdown-menu">
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop-checkout.html">Checkout</a></li>
                                    <li><a href="shop-cart.html">Shopcart</a></li>
                                    <li><a href="login.html">Logout</a></li>
                                </ul>
                            </li> -->
                            <li class="cart__menu">
                                <i class="ti-bag"></i>
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
                    <div class="col-md-3 d-none d-lg-flex d-xl-flex">
                        <div class="category-list">
                            <ul>
                                <li class="has-dropdown"><a href="#"><i class="ti-menu"></i> Shop By Department</a>
                                    <ul class="dropdown">
                                        <li class="has-dropdown"><a href="electronics">Electronics</a>
                                            <ul class="dropdown">
                                                <li><a href="about.html">About us</a></li>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404</a></li>
                                            </ul>
                                        </li>
                                        <li class="has-dropdown"><a href="laptops">Laptops</a>
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
                                                    <a href="shop-fullwidth.html"><img src="<?php echo e(asset('public/general/images/others/menu-banner.jpg')); ?>')}}" alt="..."></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="mobiles">Mobiles</a></li>
                                        <li><a href="fashion">Fashion</a></li>
                                        <li><a href="watches">Watches</a></li>
                                        <li><a href="backpacks">Backpacks</a></li>
                                        <li><a href="desktops">Desktops</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="main-header-inner">
                            <div id="main-menu" class="main-menu">
                                <nav id="mobile-nav">
                                    <ul>
                                        <li class="active"><a href="index.html">Home</a></li>
                                        <li class="has-dropdown"><a href="#">Shop</a>
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
                                                    <a href="shop-fullwidth.html"><img src="<?php echo e(asset('public/general/images/others/menu-banner.jpg')); ?>" alt="..."></a>
                                                </li>
                                            </ul>
                                        </li>
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
        <div class="header-mobile">
            <div class="container">
                <div id="header-search" class="d-lg-none">
                    <form class="header-search" class="d-lg-none">
                        <input class="" type="text" placeholder="Search products, categories, sku..." name="search">
                        <select name="category">
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
                                <img src="<?php echo e(asset('public/general/images/promo/cart-1-300x350.jpg')); ?>" alt="product images">
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
                                <img src="<?php echo e(asset('public/general/images/promo/cart-2-300x350.jpg')); ?>" alt="product images">
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
                <ul class="shoping__total">
                    <li class="subtotal">Subtotal:</li>
                    <li class="total__price">$130.00</li>
                </ul>
                <ul class="shopping__btn">
                    <li><a href="shop-cart.html">View Cart</a></li>
                    <li class="shp__checkout"><a href="shop-checkout.html">Checkout</a></li>
                </ul>
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
                        <div id="hero-slider" class="carousel slide banner-tab-slider" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active single-carousel-item" style="background-image: url('<?php echo e(asset('public/general/images/header/header-61-900x530.jpg')); ?>')">
                                    <div class="carousel-content middle-v t-right">
                                        <h3>Bruno Magli<br>Shoes</h3>
                                        <a href="#" class="link-hov style1">Discover More</a>
                                    </div>
                                </div>
                                <div class="carousel-item single-carousel-item" style="background-image: url('<?php echo e(asset('public/general/images/header/header-55-900x530.jpg')); ?>')">
                                    <div class="carousel-content middle-v t-right">
                                        <h3>Fendi<br>Cotton Tshirt</h3>
                                        <a href="#" class="link-hov style1">Discover More</a>
                                    </div>
                                </div>
                                <div class="carousel-item single-carousel-item" style="background-image: url('<?php echo e(asset('public/general/images/header/header-52-900x530.jpg')); ?>')">
                                    <div class="carousel-content middle-v t-right">
                                        <h3>Full Sleeve <br>Cotton Sweater</h3>
                                        <a href="#" class="link-hov style1">Discover More</a>
                                    </div>
                                </div>
                            </div>
                            <a class="banner-carousel-prev" href="#hero-slider" role="button" data-slide="prev">
                                <span aria-hidden="true"><i class="ti-angle-left"></i></span>
                            </a>
                            <a class="banner-carousel-next" href="#hero-slider" role="button" data-slide="next">
                                <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="cat-img style3 mar-bot-30">
                            <img src="<?php echo e(asset('public/general/images/category/cat-20-560x320.jpg')); ?>" alt="...">
                            <div class="middle-v t-right style2">
                                <h3>Women</h3>
                                <a href="shop-fullwidth.html" class="link-hov style1">Explore</a>
                            </div>
                        </div>
                        <div class="cat-img style3">
                            <img src="<?php echo e(asset('public/general/images/category/cat-6-560x320.jpg')); ?>" alt="...">
                            <div class="middle-v t-left">
                                <h3>Men</h3>
                                <a href="shop-fullwidth.html" class="link-hov style1">Explore</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Home Banner Area ends-->
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
    <!--Product area starts-->
    <section class="product-tab-section tab-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title style1 mar-bot-30">
                        <h2>New Arrivals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-slider-wrapper v1 swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-11.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style3">
                                            <p>Sold</p>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Stylish check shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style4">
                                    <div class="single-product-item v1">
                                        <img class="product-img" src="<?php echo e(asset('public/general/images/products/product-13.jpg')); ?>" alt="...">
                                        <img class="product-img-hover" src="<?php echo e(asset('public/general/images/products/product-14.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style5">
                                            <p>-30%</p>
                                        </div>
                                        <div class="sidebar-content-wrap v2 sidebar-single-active text-center">
                                            <div class="daily-deals-wrap v2">
                                                <!-- countdown start -->
                                                <div class="countdown-deals text-center" data-countdown="2019/5/01"></div>
                                                <!-- countdown end -->
                                            </div>
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Stretch Tshirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style3">
                                    <div class="single-product-item">
                                        <div class="product-item-img">
                                            <img src="<?php echo e(asset('public/general/images/products/product-12.jpg')); ?>" alt="...">
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Stretch Tshirt
                                            </a>
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
                                            <div class="product-price"><span class="price">$499</span></div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="size-checkbox">
                                                    <form action="#">
                                                        <ul class="size-opt">
                                                            <li><span>S</span></li>
                                                            <li class="selected"><span>M</span></li>
                                                            <li><span>L</span></li>
                                                            <li><span>XL</span></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-8.gif')); ?>" alt="...">
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Cotton shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style3">
                                    <div class="single-product-item">
                                        <div class="product-item-img">
                                            <img src="<?php echo e(asset('public/general/images/products/product-5.jpg')); ?>" alt="...">
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Pleated skirt
                                            </a>
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
                                            <div class="product-price"><span class="price">$499</span></div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="size-checkbox">
                                                    <form action="#">
                                                        <ul class="size-opt">
                                                            <li><span>S</span></li>
                                                            <li class="selected"><span>M</span></li>
                                                            <li><span>L</span></li>
                                                            <li><span>XL</span></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style4">
                                    <div class="single-product-item v1">
                                        <img class="product-img" src="<?php echo e(asset('public/general/images/products/product-9.jpg')); ?>" alt="...">
                                        <img class="product-img-hover" src="<?php echo e(asset('public/general/images/products/product-10.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style1">
                                            <p>Hot</p>
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Stretch Tshirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style3">
                                    <div class="single-product-item">
                                        <div class="product-item-img">
                                            <img src="<?php echo e(asset('public/general/images/products/product-17.jpg')); ?>" alt="...">
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Stretch Tshirt
                                            </a>
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
                                            <div class="product-price"><span class="price">$499</span></div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="size-checkbox">
                                                    <form action="#">
                                                        <ul class="size-opt">
                                                            <li><span>S</span></li>
                                                            <li class="selected"><span>M</span></li>
                                                            <li><span>L</span></li>
                                                            <li><span>XL</span></li>
                                                        </ul>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-11.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style3">
                                            <p>Sold</p>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#">
                                                <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Stylish check shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-4.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style3">
                                            <p>Sold</p>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#">
                                                <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Stylish check shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-8.gif')); ?>" alt="...">
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Cotton shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <img src="<?php echo e(asset('public/general/images/products/product-15.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style3">
                                            <p>Sold</p>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#">
                                                <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Stylish check shirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style4">
                                    <div class="single-product-item v1">
                                        <img class="product-img" src="<?php echo e(asset('public/general/images/products/product-9.jpg')); ?>" alt="...">
                                        <img class="product-img-hover" src="<?php echo e(asset('public/general/images/products/product-10.jpg')); ?>" alt="...">
                                        <div class="product-promo-text style1">
                                            <p>Hot</p>
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="compare.html">
                                                <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                            </a>
                                            <a class="button style1 sm">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="#">
                                                Slim Stretch Tshirt
                                            </a>
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
                                                <span class="old-price">$499</span>
                                            </div>
                                        </div>
                                        <div class="product-details--hover">
                                            <div class="product-list-options">
                                                <div class="product-color">
                                                    <span class="bg-green selected"></span>
                                                    <span class="bg-antique"></span>
                                                    <span class="bg-amber"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="product-navigation">
                    <div class="product-button-next v1"><i class="ti-angle-right"></i></div>
                    <div class="product-button-prev v1"><i class="ti-angle-left"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!--product area ends-->
    <!--Product area starts-->
    <section class="product-tab-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title style1 mar-bot-30">
                        <h2>Trending</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style2">
                        <div class="single-product-item">
                            <a href="product-details-v1.html">
                                <img src="<?php echo e(asset('public/general/images/products/product-4.jpg')); ?>" alt="...">
                            </a>
                            <div class="product-promo-text style1">
                                <p>New</p>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Stylish check shirt
                                </a>
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
                                    <span class="old-price">$499</span>
                                </div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="product-color">
                                        <span class="bg-green selected"></span>
                                        <span class="bg-antique"></span>
                                        <span class="bg-amber"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style1">
                        <div class="single-product-item">
                            <div class="product-item-img">
                                <a href="product-details-v1.html">
                                    <img src="<?php echo e(asset('public/general/images/products/product-12.jpg')); ?>" alt="...">
                                </a>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Slim Stretch Tshirt
                                </a>
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
                                <div class="product-price"><span class="price">$499</span></div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul class="size-opt">
                                                <li><span>S</span></li>
                                                <li class="selected"><span>M</span></li>
                                                <li><span>L</span></li>
                                                <li><span>XL</span></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style2">
                        <div class="single-product-item">
                            <a href="product-details-v1.html">
                                <img src="<?php echo e(asset('public/general/images/products/product-4.jpg')); ?>" alt="...">
                            </a>
                            <div class="product-promo-text style2">
                                <p>Hot</p>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Stylish check shirt
                                </a>
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
                                    <span class="old-price">$499</span>
                                </div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="product-color">
                                        <span class="bg-green selected"></span>
                                        <span class="bg-antique"></span>
                                        <span class="bg-amber"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style1">
                        <div class="single-product-item">
                            <div class="product-item-img">
                                <a href="product-details-v1.html">
                                    <img src="<?php echo e(asset('public/general/images/products/product-12.jpg')); ?>" alt="...">
                                </a>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Slim Stretch Tshirt
                                </a>
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
                                <div class="product-price"><span class="price">$499</span></div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul class="size-opt">
                                                <li><span>S</span></li>
                                                <li class="selected"><span>M</span></li>
                                                <li><span>L</span></li>
                                                <li><span>XL</span></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style2">
                        <div class="single-product-item">
                            <a href="product-details-v1.html">
                                <img src="<?php echo e(asset('public/general/images/products/product-4.jpg')); ?>" alt="...">
                            </a>
                            <div class="product-promo-text style3">
                                <p>Sold</p>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Stylish check shirt
                                </a>
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
                                    <span class="old-price">$499</span>
                                </div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="product-color">
                                        <span class="bg-green selected"></span>
                                        <span class="bg-antique"></span>
                                        <span class="bg-amber"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style1">
                        <div class="single-product-item">
                            <div class="product-item-img">
                                <a href="product-details-v1.html">
                                    <img src="<?php echo e(asset('public/general/images/products/product-12.jpg')); ?>" alt="...">
                                </a>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Slim Stretch Tshirt
                                </a>
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
                                <div class="product-price"><span class="price">$499</span></div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul class="size-opt">
                                                <li><span>S</span></li>
                                                <li class="selected"><span>M</span></li>
                                                <li><span>L</span></li>
                                                <li><span>XL</span></li>
                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style2">
                        <div class="single-product-item">
                            <a href="product-details-v1.html">
                                <img src="<?php echo e(asset('public/general/images/products/product-4.jpg')); ?>" alt="...">
                            </a>
                            <div class="product-promo-text style3">
                                <p>Sold</p>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Stylish check shirt
                                </a>
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
                                    <span class="old-price">$499</span>
                                </div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="product-color">
                                        <span class="bg-green selected"></span>
                                        <span class="bg-antique"></span>
                                        <span class="bg-amber"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mar-bot-30">
                    <div class="single-product-wrapper style1">
                        <div class="single-product-item">
                            <div class="product-item-img">
                                <a href="product-details-v1.html">
                                    <img src="<?php echo e(asset('public/general/images/products/product-12.jpg')); ?>" alt="...">
                                </a>
                            </div>
                            <div class="product-overlay">
                                <a href="#" data-toggle="modal" data-target="#exampleModal">
                                    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                </a>
                                <a href="#">
                                    <span class="ti-control-shuffle" data-toggle="tooltip" data-placement="right" title="Add to compare"></span>
                                </a>
                                <a class="button style1 sm">Add to cart</a>
                            </div>
                        </div>
                        <div class="product-details">
                            <div class="product-details--1st">
                                <a class="product-name" href="product-details-v1.html">
                                    Slim Stretch Tshirt
                                </a>
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
                                <div class="product-price"><span class="price">$499</span></div>
                            </div>
                            <div class="product-details--hover">
                                <div class="product-list-options">
                                    <div class="size-checkbox">
                                        <form action="#">
                                            <ul class="size-opt">
                                                <li><span>S</span></li>
                                                <li class="selected"><span>M</span></li>
                                                <li><span>L</span></li>
                                                <li><span>XL</span></li>
                                            </ul>
                                        </form>
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
    <section class="brand-tab-section tab-bg no-pad-bot no-pad-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-slider-wrapper swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/1.png')); ?>" alt="...">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/2.png')); ?>" alt="...">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/3.png')); ?>" alt="...">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/4.png')); ?>" alt="...">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/5.png')); ?>" alt="...">
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="brand-wrapper">
                                    <img src="<?php echo e(asset('public/general/images/brands/6.png')); ?>" alt="...">
                                </div>
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
    <!--Scroll to top starts-->
    <a href="#" id="scrolltotop"><i class="ti-arrow-up"></i></a>
    <!--Scroll to top ends-->
    <!-- Footer section Starts-->
    <div class="footer-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="footer-logo">
                        <a href="#"><img src="<?php echo e(asset('public/general/images/logo-black.png')); ?>" alt="..."></a>
                    </div>
                    <div class="footer-text">
                        <h5 class="text-grey">Need help? Call us:</h5>
                        <h4>(+800) 1234 5678 90</h4>
                    </div>
                    <a class="button style1"><i class="ti-headphone-alt"></i> Live Chat</a>
                    <ul class="footer-social mar-top-20 pad-left-15">
                        <li><a href="#"><i class="ti-facebook"></i></a></li>
                        <li><a href="#"><i class="ti-twitter"></i></a></li>
                        <li><a href="#"><i class="ti-instagram"></i></a></li>
                        <li><a href="#"><i class="ti-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-9 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Categories</h3>
                                <ul class="footer-menu style2">
                                    <li><a class="link-hov style3" href="">Electronics</a></li>
                                    <li><a class="link-hov style3" href="">Laptops</a></li>
                                    <li><a class="link-hov style3" href="">Mobiles</a></li>
                                    <li><a class="link-hov style3" href="">Fashion</a></li>
                                    <li><a class="link-hov style3" href="">Watches</a></li>
                                    <li><a class="link-hov style3" href="">Backpacks</a></li>
                                    <li><a class="link-hov style3" href="">Desktops</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Useful Links</h3>
                                <ul class="footer-menu style2">
                                    <li><a class="link-hov style3" href="#">Help & Contact us</a></li>
                                    <li><a class="link-hov style3" href="#">Returns & Refunds</a></li>
                                    <li><a class="link-hov style3" href="#">Online Stores</a></li>
                                    <li><a class="link-hov style3" href="#">Terms & Condition</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Company</h3>
                                <ul class="footer-menu style2">
                                    <li><a class="link-hov style3" href="about.html">About us</a></li>
                                    <li><a class="link-hov style3" href="contact.html">Contact</a></li>
                                    <li><a class="link-hov style3" href="#">Career</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="footer-widget style1">
                                <h3>Profile</h3>
                                <ul class="footer-menu style2">
                                    <li><a class="link-hov style3" href="">My account</a></li>
                                    <li><a class="link-hov style3" href="#">Checkout</a></li>
                                    <li><a class="link-hov style3" href="#">Order tracking</a></li>
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
                        <span data-toggle="tooltip" data-placement="top" data-original-title="Stripe"><i class="pw pw-stripe"></i></span>
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
    <div class="modal fade CartPro-quickshop" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                    </button>
                    <div class="row">
                        <div class="col-md-6">
                            <div id="carousel-one" class="carousel slide modal-carousel" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" style="background-image: url('/public/general/images/promo/modal-1.jpg')">
                                    </div>
                                    <div class="carousel-item" style="background-image: url('public/general/images/promo/modal-2.jpg')">
                                    </div>
                                    <div class="carousel-item" style="background-image: url('public/general/images/promo/modal-1.jpg')">
                                    </div>
                                </div>
                                <a class="banner-carousel-prev" href="#carousel-one" role="button" data-slide="prev">
                                    <span aria-hidden="true"><i class="ion-ios-arrow-thin-left"></i></span>
                                </a>
                                <a class="banner-carousel-next" href="#carousel-one" role="button" data-slide="next">
                                    <span aria-hidden="true"><i class="ion-ios-arrow-thin-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3 class="item-name">Man's slim Suit</h3>
                            <div class="item-review">
                                <ul class="no-pad-left">
                                    <li><i class="ion-ios-star"></i></li>
                                    <li><i class="ion-ios-star"></i></li>
                                    <li><i class="ion-ios-star"></i></li>
                                    <li><i class="ion-ios-star"></i></li>
                                    <li><i class="ion-android-star-half"></i></li>
                                </ul>
                                <span>04 Review(s)</span>
                            </div>
                            <div class="item-price">$125.30</div>
                            <div class="item-short-description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum eros idoni rutrum fermentum. Proin nec felis dui. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.</p>
                            </div>
                            <div class="item-variant">
                                <span>Color</span>
                                <div class="d-inline product-color">
                                    <span class="bg-green selected"></span>
                                    <span class="bg-antique"></span>
                                    <span class="bg-amber"></span>
                                </div>
                            </div>
                            <div class="item-variant">
                                <span>Size</span>
                                <ul class="d-inline size-opt">
                                    <li><span>S</span></li>
                                    <li class="selected"><span>M</span></li>
                                    <li><span>L</span></li>
                                    <li><span>XL</span></li>
                                </ul>
                            </div>
                            <div class="item-options">
                                <form class="mar-bot-20">
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
                                    <button class="button style1 mar-tb-0"><i class="ti-shopping-cart"></i> Add to cart</button>
                                </form>
                                <a class="btn btn-link btn-sm"><i class="ti-heart"></i> Add to wishlist</a> <a class="btn btn-link btn-sm"><i class="ti-control-shuffle"></i> Add to compare</a>
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
    <script src="<?php echo e(asset('js/plugin.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap-select.min.js')); ?>"></script>
    <!-- Main js -->
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>

</html><?php /**PATH C:\xampp\htdocs\cartpro_related\2_cartpro_lang\resources\views/general/layouts/master.blade.php ENDPATH**/ ?>