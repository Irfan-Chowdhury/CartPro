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
                            <li class="has-dropdown"><a href="#">Language</a>
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
                                <img src="<?php echo e(asset($header_logo_path)); ?>" alt="Brand logo" style="height:60px; width:280px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                        <form class="header-search">
                            <input class="" type="text" id="searchText" placeholder="Search products, categories, sku..." name="search">
                            <select name="category" class="selectpicker" onchange="location = this.value;">
                                <option value="" selected="">All Categories</option>
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></option>
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

                            <?php if(auth()->guard()->check()): ?>
                                <li>
                                    <a href="<?php echo e(route('user_account')); ?>"><i class="las la-user" data-bs-toggle="tooltip" data-bs-placement="bottom" title="My Account"></i></a>
                                </li>
                            <?php else: ?>
                                <li>
                                    <a href="<?php echo e(route('customer_login_form')); ?>"><i class="las la-user-lock" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Login"></i></a>
                                </li>
                            <?php endif; ?>




                            <?php if(auth()->guard()->check()): ?>
                                <li class="cart__menu d-none d-lg-inline-block d-xl-inline-block">
                                    <a href="<?php echo e(route('wishlist.index')); ?>">
                                        <i class="lar la-heart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Wishlist"></i>
                                    </a>
                                    <span class="badge badge-light wishlist_count"><?php echo e($total_wishlist); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="cart__menu d-none d-lg-inline-block d-xl-inline-block">
                                    <a href="#">
                                        <i class="lar la-heart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Wishlist"></i>
                                    </a>
                                    <span class="badge badge-light">0</span>
                                </li>
                            <?php endif; ?>


                            <li class="cart__menu">
                                <i class="las la-shopping-cart" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cart"></i>
                                <span class="badge badge-light cart_count"><?php echo e($cart_count); ?></span>
                                <span class="total">
                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                        <span class="cart_total"><?php echo e($cart_total); ?></span> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                    <?php else: ?>
                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <span class="cart_total"><?php echo e($cart_total); ?></span>
                                    <?php endif; ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Search Field-->
                <div class="row" id="search_field">
                    
                    <div class="col-12 d-xl-flex middle-column justify-content-center" >
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
                                <li class="has-dropdown"><a class="category-button" href="#"><i class="ti-menu"></i> Shop By Category</a>
                                    <ul class="dropdown">
                                        <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($category->child->isNotEmpty()): ?>
                                                <li class="has-dropdown"><a href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><i class="<?php echo e($category->icon ?? null); ?>"></i> <?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                                                    <ul class="dropdown">
                                                        <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(route('cartpro.category_wise_products',$item->slug)); ?>"><i class="<?php echo e($item->icon ?? null); ?>"></i><?php echo e($item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?></a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="<?php echo e($category->slug); ?>"><i class="<?php echo e($category->icon ?? null); ?>"></i><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a></li>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
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
                                        <li class="active"><a href="<?php echo e(route('cartpro.home')); ?>">Home</a></li>
                                        <?php if($menu!=NULL): ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php if($menu_item->child->isNotEmpty()): ?>
                                                    <li class="has-dropdown"><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a>
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
                            <?php $__empty_1 = true; $__currentLoopData = $cart_contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div id="<?php echo e($item->rowId); ?>" class="shp__single__product">
                                    <div class="shp__pro__thumb">
                                        <a href="#">
                                            <img src="<?php echo e(asset('public/'.$item->options->image ?? null)); ?>">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="<?php echo e(url('product/'.$item->options->product_slug.'/'. $item->options->category_id)); ?>"><?php echo e($item->name); ?></a></h2>
                                        <span><?php echo e($item->qty); ?></span> x <span class="shp__price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e($item->price); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                            <?php else: ?>
                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e($item->price); ?>

                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="#" class="remove_cart" data-id="<?php echo e($item->rowId); ?>" title="Remove this item"><i class="ion-ios-close-empty"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>

                </div>
                <!-- IF EMPTY CART -->
                
                <!-- IF EMPTY CART -->
            </div>
            <div class="shopping__cart__footer">
                <div class="shoping__total">
                    <span class="subtotal">Subtotal:</span>
                    <span class="total__price">
                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                            <span class="total_price"><?php echo e($cart_total); ?></span> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                        <?php else: ?>
                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <span class="total_price"><?php echo e($cart_total); ?></span>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="shopping__btn">
                    <a class="button style3" href="<?php echo e(route('cart.view_details')); ?>">View Cart</a>
                    <a class="button style1" href="">Checkout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offset Wrapper ends -->
    <!-- Header Area  ends -->
<?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/includes/header.blade.php ENDPATH**/ ?>