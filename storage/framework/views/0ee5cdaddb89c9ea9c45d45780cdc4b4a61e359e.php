<?php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}
?>

    <!--Header Area starts-->
    <header>
        <?php if(!Cookie::has('top_banner') && env('TOPBAR_BANNER_ENABLED')): ?>
            <div id="top_banner" class="text-center" style="background-color:#e5e8ec">
                <img src="<?php echo e(asset($topbar_logo_path)); ?>" alt="">
                <a class="button sm" id="bannerSlideUp"><i class="las la-times"></i></a>
            </div>
        <?php endif; ?>

            <div id="header-top" class="header-top">
                <div class="container">
                    <div class="d-lg-flex d-xl-flex justify-content-between">
                        <div class="header-top-left d-none d-lg-flex d-xl-flex">
                            <ul class="header-top-social menu">
                                <?php if(isset($storefront_facebook_link)): ?>
                                <li><a href="<?php echo e($storefront_facebook_link); ?>"><i class="ti-facebook"></i></a></li>
                                <?php endif; ?>
                                <?php if(isset($storefront_twitter_link)): ?>
                                <li><a href="<?php echo e($storefront_twitter_link); ?>"><i class="ti-instagram"></i></a></li>
                                <?php endif; ?>
                                <?php if(isset($storefront_instagram_link)): ?>
                                <li><a href="<?php echo e($storefront_instagram_link); ?>"><i class="ti-twitter"></i></a></li>
                                <?php endif; ?>
                                <?php if(isset($storefront_youtube_link)): ?>
                                <li><a href="<?php echo e($storefront_youtube_link); ?>"><i class="ti-youtube"></i></a></li>
                                <?php endif; ?>
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
                                <li><a href="<?php echo e(route('cartpro.order_tracking')); ?>"><?php echo e('Order Tracking'); ?></a></li>
                                <li class="has-dropdown"><a href="#"><i class="las la-language"></i>&nbsp; <?php echo e($languages[$locale]->language_name); ?></a>
                                    <ul class="dropdown p-0">
                                        <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e(route('cartpro.default_language_change',$item->id)); ?>" <?php echo e($item->local==Session::get('currentLocal') ? 'selected': ''); ?>><?php echo e($item->language_name); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                                <li class="has-dropdown"><a href="#"><i class="las la-money-bill"></i>&nbsp; <?php if(Session::has('currency_code')): ?> <?php echo e(Session::get('currency_code')); ?> <?php else: ?> <?php echo e(env('DEFAULT_CURRENCY_CODE')); ?> <?php endif; ?></a>
                                    <ul class="dropdown p-0">
                                        <?php $__currentLoopData = $currency_codes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a href="<?php echo e(route('cartpro.currency_change',$item->currency_code)); ?>" <?php echo e($item->currency_code==Session::get('currency_code') ? 'selected': ''); ?>><?php echo e($item->currency_code); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
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
                                <a href="<?php echo e(route('cartpro.home')); ?>">
                                    <img src="<?php echo e($header_logo_path); ?>" alt="Brand logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-flex d-xl-flex middle-column justify-content-center">
                            <form id="KeyWordHit" class="header-search" action="<?php echo e(route('cartpro.search_product')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="text" list="browsers" id="searchText" placeholder="Search Products" name="search">
                                <button type="submit" class="btn btn-search"><i class="ti-search"></i></button>
                                <!-- Search Field-->
                                <div class="row" id="search_field">
                                    <ul id="result">
                                    </ul>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3 col-5">
                            <ul class="offset-menu-wrapper p-0">
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
                                    <li class="wishlist__menu d-none d-lg-inline-block d-xl-inline-block">
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
                                            <span class="cart_total"><?php echo e(number_format((float)$cart_total * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <span class="cart_total"><?php echo e(number_format((float)$cart_total * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php
            $categories = \App\Models\Category::with(['catTranslation','parentCategory.catTranslation','categoryTranslationDefaultEnglish','child.catTranslation'])
                        ->where('is_active',1)
                        ->orderBy('is_active','DESC')
                        ->orderBy('id','ASC')
                        ->get();

            $category_product_count = [];
            foreach ($categories as $category) {
                $product_count = 0;
                if ($category->categoryProduct) {
                    foreach ($category->categoryProduct as $item) {
                        if ($item->product) {
                            $product_count++;
                        }
                    }
                }
                $category_product_count[$category->id] = $product_count;
            }

        ?>

        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-4 d-none d-lg-flex d-xl-flex">
                        <div class="category-list">
                            <ul class="pl-0">
                                <li class="has-dropdown"><a class="category-button" href="#"><i class="ti-menu"></i><?php echo e(__('file.Shop By Category')); ?></a>
                                    <ul id="cat_menu" class="dropdown p-0">
                                        <?php $__empty_1 = true; $__currentLoopData = $categories->where('parent_id',NULL); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($category->child->isNotEmpty()): ?>
                                                <li class="has-dropdown"><a href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><i class="<?php echo e($category->icon ?? null); ?>"></i> <?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?> (<?php echo e($category_product_count[$category->id]); ?>)</a>
                                                    <ul class="dropdown">
                                                        <?php $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><a href="<?php echo e(route('cartpro.category_wise_products',$item->slug)); ?>"><i class="<?php echo e($item->icon ?? null); ?>"></i><?php echo e($item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?> (<?php echo e($category_product_count[$item->id]); ?>) </a></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><i class="<?php echo e($category->icon ?? null); ?>"></i><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?> (<?php echo e($category_product_count[$category->id]); ?>)</a></li>
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

                                    <ul class="nav nav-tabs" id="menu_tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" data-toggle="tab" href="#mobile_menu" role="tab" aria-controls="mobile_menu" aria-selected="true">Menu</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" data-toggle="tab" href="#mobile_cat" role="tab" aria-controls="mobile_cat" aria-selected="false">Categories</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="menu_tab_content">
                                        <div class="tab-pane fade show active" id="mobile_menu" role="tabpanel" aria-labelledby="menu-tab">
                                            <ul class="pl-0">
                                                <?php
                                                    $str = url()->current();
                                                    $data = explode("/",$str);
                                                    $last_word = $data[count($data)-1];
                                                ?>

                                                <li class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"><a href="<?php echo e(route('cartpro.home')); ?>"><?php echo e(__('file.Home')); ?></a></li>

                                                <li class="<?php echo e(Request::is('all-categories') ? 'active' : ''); ?>"><a href="<?php echo e(route('cartpro.all_categorgies')); ?>"><?php echo e(__('file.All Categories')); ?></a></li>

                                                <?php if($storefront_shop_page_enabled): ?>
                                                    <li class="<?php echo e(Request::is('shop') ? 'active' : ''); ?>"><a href="<?php echo e(route('cartpro.shop')); ?>"><?php echo e(__('file.Shop')); ?></a></li>
                                                <?php endif; ?>

                                                <?php if($storefront_brand_page_enabled): ?>
                                                    <li class="<?php echo e(Request::is('brands') ? 'active' : ''); ?>"><a href="<?php echo e(route('cartpro.brands')); ?>"><?php echo e(__('file.Brands')); ?></a></li>
                                                <?php endif; ?>


                                                <?php if($menu!=NULL): ?>
                                                    <?php $__empty_1 = true; $__currentLoopData = $menu->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($menu_item->child->isNotEmpty()): ?>
                                                                <?php if(strpos($menu_item->link, 'http://') !== false || strpos($menu_item->link, 'https://') !== false): ?>
                                                                    <li class="has-dropdown"><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a>
                                                                <?php else: ?>
                                                                    <li class="has-dropdown"><a href="<?php echo e(route('page.Show',$menu_item->link)); ?>"><?php echo e($menu_item->label); ?></a></li>
                                                                <?php endif; ?>
                                                                    <ul class="dropdown">
                                                                        <?php $__currentLoopData = $menu_item->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <!--Extra-->
                                                                            <?php if($child->child->isNotEmpty()): ?>
                                                                                <?php if($child->locale==$locale): ?>
                                                                                    <?php if(strpos($child->link, 'http://') !== false || strpos($child->link, 'https://') !== false): ?>
                                                                                        <li class="has-dropdown"><a href="<?php echo e($child->link); ?>"><?php echo e($child->label); ?></a>
                                                                                    <?php else: ?>
                                                                                        <li class="has-dropdown"><a href="<?php echo e(route('page.Show',$child->link)); ?>"><?php echo e($child->label); ?></a></li>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                                        <ul class="dropdown">
                                                                                            <?php $__currentLoopData = $child->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if($sub_child->locale==$locale): ?>
                                                                                                    <?php if(strpos($menu_item->link, 'http://') !== false || strpos($sub_child->link, 'https://') !== false): ?>
                                                                                                        <li><a href="<?php echo e($sub_child->link); ?>"><?php echo e($sub_child->label); ?></a></li>
                                                                                                    <?php else: ?>
                                                                                                        <li><a href="<?php echo e(route('page.Show',$sub_child->link)); ?>"><?php echo e($sub_child->label); ?></a></li>
                                                                                                    <?php endif; ?>
                                                                                                <?php endif; ?>
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
                                                            <?php if($menu_item->locale==$locale): ?>
                                                                <?php if(strpos($menu_item->link, 'https://') !== false): ?>
                                                                    <li><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a></li>
                                                                <?php else: ?>
                                                                    <li class="<?php echo e($last_word==$menu_item->link ? 'active' : ''); ?>"><a href="<?php echo e(route('page.Show',$menu_item->link)); ?>"><?php echo e($menu_item->label); ?></a></li>
                                                                <?php endif; ?>
                                                                    <!-- <li><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a></li> -->
                                                            <?php endif; ?>
                                                            <!-- <li><a href="<?php echo e($menu_item->link); ?>"><?php echo e($menu_item->label); ?></a></li> -->
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <li class="deal-menu-item"><a href="<?php echo e(route('cartpro.daily_deals')); ?>"><i class="las la-tag d-none d-md-inline-block"></i> <?php echo app('translator')->get('file.Daily Deals'); ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="tab-pane fade" id="mobile_cat" role="tabpanel" aria-labelledby="category-tab">

                                        </div>
                                    </div>
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
                    <i class="las la-times"></i>
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

                                        <?php
                                            if($item->options->attributes){
                                                $data = $item->options->attributes;
                                                $attributes = array();
                                                for($i=0; $i< count($data['name']); $i++){
                                                    $attributes[] = [
                                                            'name' => $data['name'][$i],
                                                            'value' => $data['value'][$i]
                                                        ];
                                                }
                                            }
                                        ?>
                                        <?php if($item->options->attributes): ?>
                                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row"><span><?php echo e($attribute['name']); ?> :<?php echo e($attribute['value']); ?></span></div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                        <span class="my_cart_specific_qty_<?php echo e($item->rowId); ?>"><?php echo e($item->qty); ?></span> x <span class="shp__price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <span><?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <span><?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="#" class="remove_cart" data-id="<?php echo e($item->rowId); ?>" title="Remove this item"><i class="las la-times"></i></a>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="empty-cart">
                                <img src="<?php echo e(asset('public/frontend/images/empty-cart.png')); ?>">
                                <h5><?php echo app('translator')->get('file.Your cart is empty'); ?></h5>
                            </div>
                            <?php endif; ?>
                        </div>

                </div>
            </div>
            <div class="shopping__cart__footer">
                <div class="shoping__total">
                    <span class="subtotal"><?php echo app('translator')->get('file.Subtotal'); ?></span>
                    <span class="total__price">
                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                            <span><?php echo e(number_format((float)$cart_total * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php else: ?>
                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <span class="total_price"><?php echo e(number_format((float)$cart_total * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?></span>
                        <?php endif; ?>
                    </span>
                </div>
                <div class="shopping__btn">
                    <a class="button style3" href="<?php echo e(route('cart.view_details')); ?>"><?php echo e(__('file.View Cart')); ?></a>
                    <a class="button style1" href="<?php echo e(route('cart.checkout')); ?>"><?php echo app('translator')->get('file.Checkout'); ?></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Offset Wrapper ends -->
    <!-- Header Area  ends -->

<?php $__env->startPush('scripts'); ?>
    <script>
        $('#top_banner').on("click",function(e){
            console.log(1);
            $.get({
                url: "<?php echo e(route('cartpro.set_cookie')); ?>",
                type: "GET",
                data: {cookie_type:'top_banner'},
                success: function (data) {
                    console.log(data);
                    if (data=='disable') {
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
                            title: 'Banner disabled successfully'
                        })
                    }
                }
            })
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/cartproshop/resources/views/frontend/includes/header.blade.php ENDPATH**/ ?>