<?php
    $languages = App\Models\Language::orderBy('language_name','ASC')->get();
    $currency_codes = App\Models\CurrencyRate::select('currency_code')->get();
    $storefront_images = App\Models\StorefrontImage::select('title','type','image')->get();
    $empty_image = 'public/images/empty.jpg';
    $favicon_logo_path = $empty_image;
    $header_logo_path  = $empty_image;
    foreach ($storefront_images as $key => $item) {
        if ($item->title=='favicon_logo'){
            $favicon_logo_path = 'public'.$item->image;
        }
        elseif ($item->title=='header_logo') {
            $header_logo_path  = 'public'.$item->image;
        }
    }
    //Appereance-->Storefront --> Setting
    $settings = App\Models\Setting::with(['storeFrontImage','settingTranslation','settingTranslationDefaultEnglish'])->get();
    $categories = App\Models\Category::with(['catTranslation','parentCategory','categoryTranslationDefaultEnglish','child'])
            ->where('parent_id',NULL)
            ->where('is_active',1)
            ->orderBy('is_active','DESC')
            ->orderBy('id','DESC')
            ->get();

    foreach ($settings as $key => $value) {
        if ($value->key=='storefront_primary_menu' && $value->plain_value!=NULL) {
            $menu = Harimayco\Menu\Models\Menus::with('items')
            ->where('is_active',1)
            ->where('id',$value->plain_value)
            ->first();
            break;
        }
        else {
            $menu = [];
        }
    }

    if (\Route::current()->getName() == 'cartpro.product_details'){
        // $product_tabs_one_titles = [];
        // $product_tab_one_section_1 = [];
        // $product_tab_one_section_2 = [];
        // $product_tab_one_section_3 = [];
        // $product_tab_one_section_4 = [];

        // foreach ($settings as $key => $setting)
        // {
        //     if ($setting->key=='storefront_product_tabs_1_section_tab_1_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_1 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                                         ->where('category_id',$setting->plain_value)->get();
        //             if (empty($product_tab_one_section_1)) { //if category_products matched but the category_id doesn't exists in category_product table
        //                 $product_tab_one_section_1 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_2_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_2 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                                         ->where('category_id',$setting->plain_value)->get();
        //                 if (empty($product_tab_one_section_2)){
        //                     $product_tab_one_section_2 = [];
        //                 }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_3_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_3 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                                         ->where('category_id',$setting->plain_value)->get();
        //                 if (empty($product_tab_one_section_3)) {
        //                     $product_tab_one_section_3 = [];
        //                 }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }

        //     if ($setting->key=='storefront_product_tabs_1_section_tab_4_category_id' && $setting->plain_value!=NULL) {
        //         if ($settings[$key-1]->plain_value=='category_products') {
        //             $product_tab_one_section_4 = CategoryProduct::with('product','productTranslation','productTranslationDefaultEnglish','productBaseImage','additionalImage','category','categoryTranslation','categoryTranslationDefaultEnglish')
        //                                                         ->where('category_id',$setting->plain_value)->get();
        //             if (empty($product_tab_one_section_4)) {
        //                 $product_tab_one_section_4 = [];
        //             }
        //         }
        //         $product_tabs_one_titles[] = $settings[($key-2)]->key;
        //     }
        // }
    }
    //Product_Tab_One


    $cart_count = \Gloudemans\Shoppingcart\Facades\Cart::count();
?>


<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Metas -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="LionCoders" />
    <!-- Links -->
    <link rel="icon" type="image/png" href="<?php echo e(asset($favicon_logo_path)); ?>" />
    <!-- google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
    <!-- Plugins CSS -->
    <link href="<?php echo e(asset('public/frontend/css/plugins.css')); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontend/css/line-awesome.min.css')); ?>">
    <link href="<?php echo e(asset('public/frontend/css/bootstrap-select.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- style CSS -->
    <link href="<?php echo e(asset('public/frontend/css/cartPro-style.css')); ?>" rel="stylesheet" />
    <!-- <link href="css/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link href="<?php echo e(asset('public/frontend/css/payment-fonts.css')); ?>" rel="stylesheet" />
    <!-- Document Title -->
    <title>CartPro - ecommerce HTML Template</title>
</head>

<body>
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
                            <?php if($settings[0]->settingTranslation || $settings[0]->settingTranslationDefaultEnglish): ?>
                                <?php echo e($settings[0]->settingTranslation->value ?? $settings[0]->settingTranslationDefaultEnglish->value ?? NULL); ?>

                            <?php endif; ?>
                        </span>
                    </div>
                    <div class="header-top-right">
                        <ul>
                            <li class="has-dropdown"><a href="#">Languages</a>
                                <ul class="dropdown">
                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e($item->local); ?>"><?php echo e($item->language_name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">Currency</a>
                                <ul class="dropdown">
                                    <?php $__currentLoopData = $currency_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="#"><?php echo e($item->currency_code); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <img src="<?php echo e(asset($header_logo_path)); ?>" alt="Brand logo" style="height:60px; width:280px" >
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                        <form class="header-search">
                            <input class="" type="text" placeholder="Search products, categories, sku..." name="search">
                            <select name="category" class="selectpicker">
                                <option value="" selected="">All Categories</option>
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($category->slug); ?>"><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
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
                                <span class="badge badge-light"><?php echo e($cart_count); ?></span>
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

                                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($category->child->isNotEmpty()): ?>
                                                <li class="has-dropdown"><a href="#"><i class=""></i> <?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                                                    <ul class="dropdown">
                                                        <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e($item->slug); ?>"><i class=""></i><?php echo e($item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="<?php echo e($category->slug); ?>"><i class=""></i><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>

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
                                                    <a href="shop-fullwidth.html"><img src="<?php echo e(asset('public/frontend/images/others/menu-banner.jpg')); ?>')}}" alt="..."></a>
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

                                        <?php if($menu!=NULL): ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if($menu_item->child->isNotEmpty()): ?>
                                                    <li class="has-dropdown"><a href="#"><?php echo e($menu_item->label); ?></a>
                                                        <ul class="dropdown">
                                                            <?php $__currentLoopData = $menu_item->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                
                                                                <!--Extra-->
                                                                <?php if($child->child->isNotEmpty()): ?>
                                                                    <li class="has-dropdown"><a href="<?php echo e($child->link); ?>"><?php echo e($child->label); ?></a>
                                                                        <ul class="dropdown">
                                                                            <?php $__currentLoopData = $child->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li><a href="<?php echo e($sub_child->link); ?>"><?php echo e($sub_child->label); ?></a></li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li><a href="<?php echo e($child->link); ?>"><?php echo e($child->label); ?></a></li>
                                                                <?php endif; ?>
                                                                <!--Extra End-->
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                <?php else: ?>
                                                    <li><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <?php endif; ?>
                                        <?php endif; ?>



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

    <div id="success_alert" role="alert"></div>

    <?php echo $__env->yieldContent('frontend_content'); ?>

    <div class="body__overlay"></div>


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
                        <a href="#"><img src="<?php echo e(asset('public/frontend/images/logo-black.png')); ?>" alt="..."></a>
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
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch.png')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-for__item ex1">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-2.jpg')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-for__item ex1">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-3.jpg')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-for__item ex1">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-4.jpg')); ?>" alt="..." />
                                    </div>
                                </div>
                                <div class="slider-nav-modal">
                                    <div class="slider-nav__item">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch.png')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-2.jpg')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-3.jpg')); ?>" alt="..." />
                                    </div>
                                    <div class="slider-nav__item">
                                        <img src="<?php echo e(asset('public/frontend/images/products/apple-watch-4.jpg')); ?>" alt="..." />
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
            <div class="modal-content" style="background-image: url('images/newsletter/newsletter.jpg')}}');background-size: cover;background-position: bottom;">
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
    <script src="<?php echo e(asset('public/frontend/js/plugin.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/frontend/js/bootstrap-select.min.js')); ?>"></script>

    


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <?php if(\Route::current()->getName() == 'cartpro.home'): ?>
       <?php $test = $product_tab_one_section_1[0]->category_id; ?>
       <h1><?php echo e($test); ?> Hellow  World</h1>
    <?php endif; ?>




    <!-- Main js -->
    <script src="<?php echo e(asset('public/frontend/js/main.js')); ?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#newsletter-modal').modal('toggle');

            <?php if(session()->has('type')): ?>
                    const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                    Toast.fire({
                        icon: 'success',
                        title: 'Successfully added on your cart'
                    })
            <?php endif; ?>
        });
    </script>


    <script type="text/javascript">
        // <?php if(\Route::current()->getName() == 'cartpro.home'): ?>
        //     <?php $__currentLoopData = $product_tab_one_section_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        //         <?php $data = $item->product->slug ?>
        //         $("#".<?php echo e($data); ?>).on("submit",function(e){
        //             e.preventDefault();
        //             console.log('ok');
        //         });
        //     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        //     // @array.forEach(element => {

        //     // });
        // <?php endif; ?>

        // $("#addToCart").on("submit",function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: "<?php echo e(route('product.add_to_cart')); ?>",
        //         method: "POST",
        //         data: new FormData(this),
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         dataType: "json",
        //         success: function (data) {
        //             const Toast = Swal.mixin({
        //                 toast: true,
        //                 position: 'top-end',
        //                 showConfirmButton: false,
        //                 timer: 3000,
        //                 timerProgressBar: true,
        //                 didOpen: (toast) => {
        //                     toast.addEventListener('mouseenter', Swal.stopTimer)
        //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
        //                 }
        //             })
        //             Toast.fire({
        //                 icon: 'success',
        //                 title: 'Successfully added on your cart'
        //             })
        //         }
        //     });
        // });
    </script>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>