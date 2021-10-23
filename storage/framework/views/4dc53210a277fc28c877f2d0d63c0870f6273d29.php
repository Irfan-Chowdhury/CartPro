<?php $__env->startSection('frontend_content'); ?>

<!--Home Banner starts -->
<div class="banner-area v3">
    <div class="container">
        <div class="single-banner-item style2">
            <div class="row">
                <div class="col-md-8">
                    <div class="banner-slider">
                        <!-- Item -->
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->sliderTranslation->isNotEmpty()): ?>
                                <div class="item">
                                    <div class="img-fill" style="background-image: url(<?php echo e(url('public/'.$item->slider_image)); ?>); background-size: cover; background-position: center;">
                                        <div class="info">
                                            <div>
                                                <h3><?php echo e($item->sliderTranslation[0]->slider_title); ?></h3>
                                                <h5><?php echo e($item->sliderTranslation[0]->slider_subtitle); ?></h5>
                                                <a class="button style1 md" href="">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php $__currentLoopData = $slider_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slider-banner">
                            <div>
                                <img src="<?php echo e(asset('public/'.$slider_banners[$key]['image'])); ?>" alt="...">
                            </div>
                            <div>
                                <h4><?php echo e($slider_banners[$key]['title']); ?></h4>
                                <a href="<?php echo e($slider_banners[$key]['action_url']); ?>" class="link-hov style1">Shop Now</a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <a href="#" class="button style4 mb-2 d-none d-md-block">All categories</a>
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


                    <?php $__empty_1 = true; $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    
                        <div class="swiper-slide">
                            <a href="">
                                <div class="category-container">
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>">
                                    <div class="category-name">
                                        <?php echo e($item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?>

                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!--Product area starts-->
<?php if($settings[81]->plain_value==1): ?>
    <section class="product-tab-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="nav nav-tabs product-details-tab" id="lionTab" role="tablist">

                        <?php $i=0; ?>
                        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($setting->key =='storefront_product_tabs_1_section_tab_1_title'|| $setting->key =='storefront_product_tabs_1_section_tab_2_title' || $setting->key =='storefront_product_tabs_1_section_tab_3_title' || $setting->key =='storefront_product_tabs_1_section_tab_4_title'): ?>
                                <li class="nav-item">
                                    <a <?php if($i==0): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?> id="all-tab" data-bs-toggle="tab" href="#<?php echo e($setting->key); ?>" role="tab" aria-selected="true"><?php echo e($setting->settingTranslation->value ?? $setting->settingTranslationDefaultEnglish->value ?? null); ?></a>
                                </li>
                                <?php $i++ ; ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
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

                        <!-- Product_Tab_1-Section_1 -->
                        <div class="tab-pane fade show active" id="<?php echo e($product_tabs_one_titles[0] ?? null); ?>" role="tabpanel" aria-labelledby="all-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="swiper-slide">
                                                <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                    <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                    <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                    <input type="hidden" name="qty" value="1">

                                                    <div class="single-product-wrapper">
                                                        <div class="single-product-item">
                                                            <?php if(isset($item->productBaseImage->image)): ?>
                                                                <img src="<?php echo e(asset('public/'.$item->productBaseImage->image)); ?>">
                                                            <?php else: ?>
                                                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>">
                                                            <?php endif; ?>

                                                            <div class="product-promo-text style1">
                                                                <span>Sold</span>
                                                            </div>
                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->product->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a>
                                                                    <span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                                </a>
                                                                <a href="compare.html">
                                                                    <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            <a class="product-category" href="<?php echo e(route('cartpro.category_wise_products',$item->category->slug)); ?>"><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL); ?></a>
                                                            <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

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
                                                                        <?php if($item->product->special_price>0): ?>
                                                                            <span class="promo-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <span class="old-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <span class="price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                                <?php else: ?>
                                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_2 -->
                        <div class="tab-pane fade" id="<?php echo e($product_tabs_one_titles[1] ?? null); ?>" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="swiper-slide">
                                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <?php if(isset($item->productBaseImage->image)): ?>
                                                            <img src="<?php echo e(asset('public/'.$item->productBaseImage->image)); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>">
                                                        <?php endif; ?>

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->product->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            
                                                            </a>
                                                            <a>
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                            <a href="compare.html">
                                                                <span class="ti-control-shuffle" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to compare"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-category" href="<?php echo e(route('cartpro.category_wise_products',$item->category->slug)); ?>"><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL); ?></a>
                                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                            <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL); ?>

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
                                                                    <?php if($item->product->special_price>0): ?>
                                                                        <span class="promo-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_3 -->
                        <div class="tab-pane fade" id="<?php echo e($product_tabs_one_titles[2] ?? null); ?>" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="swiper-slide">
                                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <?php if(isset($item->productBaseImage->image)): ?>
                                                            <img src="<?php echo e(asset('public/'.$item->productBaseImage->image)); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>">
                                                        <?php endif; ?>

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->product->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
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
                                                        <a class="product-category" href="<?php echo e(route('cartpro.category_wise_products',$item->category->slug)); ?>"><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL); ?></a>
                                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                            <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL); ?>

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
                                                                    <?php if($item->product->special_price>0): ?>
                                                                        <span class="promo-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <a class="button style2 sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Product_Tab_1-Section_4 -->
                        <div class="tab-pane fade" id="<?php echo e($product_tabs_one_titles[3] ?? null); ?>" role="tabpanel" aria-labelledby="graphic-design-tab">
                            <div class="product-slider-wrapper swiper-container">
                                <div class="swiper-wrapper">
                                    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="swiper-slide">
                                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <?php if(isset($item->productBaseImage->image)): ?>
                                                            <img src="<?php echo e(asset('public/'.$item->productBaseImage->image)); ?>">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>">
                                                        <?php endif; ?>

                                                        <div class="product-promo-text style1">
                                                            <span>Sold</span>
                                                        </div>
                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->product->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
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
                                                        <a class="product-category" href="<?php echo e(route('cartpro.category_wise_products',$item->category->slug)); ?>"><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL); ?></a>
                                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                            <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL); ?>

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
                                                                    <?php if($item->product->special_price>0): ?>
                                                                        <span class="promo-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php else: ?>
                                                                        <span class="price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                            <?php else: ?>
                                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </section>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

<?php endif; ?>


 <!--product area ends-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-12">
                <div class="section-title mb-3">
                    <h3>
                        <?php echo e($storefront_flash_sale_title); ?>

                    </h3>
                </div>
                <div class="deals-slider-wrapper swiper-container">
                    <div class="swiper-wrapper">

                        <?php $__empty_1 = true; $__currentLoopData = $flash_sales->flashSaleProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide">
                                <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($item->product->id); ?>">
                                    <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                    <input type="hidden" name="category_id" value="<?php echo e($item->product->categoryProduct[0]->category_id); ?>">
                                    <input type="hidden" name="qty" value="1">

                                    <div class="single-product-wrapper deals">
                                        <div class="single-product-item">

                                            <?php if($item->product->baseImage): ?>
                                                <img src="<?php echo e(asset('public/'.$item->product->baseImage->image)); ?>" >
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>">
                                            <?php endif; ?>
                                            <div class="product-overlay">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshop"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                </a>
                                                <a href="wishlist.html">
                                                    <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                </a>
                                                
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name text-center" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>">
                                                <?php echo e($item->product->productTranslation->product_name ?? null); ?>

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
                                                        <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                                            <span class="promo-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                            <span class="old-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="promo-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                <?php else: ?>
                                                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                                <div>
                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                </div>
                                            </div>
                                            <div class="daily-deals-wrap">
                                                <!-- countdown start -->
                                                <div class="countdown-deals text-center" data-countdown="<?php echo e($item->end_date); ?>">
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
                                            <?php if($item->product->manage_stock==1): ?>
                                                Available: <?php echo e($item->product->qty); ?>

                                            <?php endif; ?>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
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
                            <h3><?php echo e($storefront_vertical_product_1_title); ?></h3>
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                            <h3><h3><?php echo e($storefront_vertical_product_2_title); ?></h3></h3>
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                                            <img src="<?php echo e(asset('public/frontend/images/products/redPhone-300x300.png')); ?>" alt="...">
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
                            <h3><h3><?php echo e($storefront_vertical_product_3_title); ?></h3></h3>
                            <!-- Add Pagination -->
                            <div class="list-navigation">
                                <div class="list-button-prev"><i class="ti-angle-left"></i></div>
                                <div class="list-button-next"><i class="ti-angle-right"></i></div>
                            </div>
                        </div>
                        <div class="list-slider-wrapper swiper-container">
                            <div class="swiper-wrapper">
                                
                                
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                            <img src="<?php echo e(asset('public/frontend/images/products/widetv.png')); ?>" alt="...">
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
                        <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="#">
                                    <img src="<?php echo e(asset('public/'.$brand->brand_logo)); ?>">
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
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

            <?php if($settings[18]->plain_value==1): ?>
                <!-- Feature 1 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($settings[21]->plain_value ?? null); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($settings[19]->settingTranslation->value ?? $settings[19]->settingTranslationDefaultEnglish->value ?? NULL); ?></h5>
                        <span><?php echo e($settings[20]->settingTranslation->value ?? $settings[19]->settingTranslationDefaultEnglish->value ?? NULL); ?></span>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($settings[24]->plain_value ?? null); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($settings[22]->settingTranslation->value ?? $settings[22]->settingTranslationDefaultEnglish->value ?? NULL); ?></h5>
                        <span><?php echo e($settings[23]->settingTranslation->value ?? $settings[23]->settingTranslationDefaultEnglish->value ?? NULL); ?></span>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($settings[27]->plain_value ?? null); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($settings[25]->settingTranslation->value ?? $settings[22]->settingTranslationDefaultEnglish->value ?? NULL); ?></h5>
                        <span><?php echo e($settings[26]->settingTranslation->value ?? $settings[23]->settingTranslationDefaultEnglish->value ?? NULL); ?></span>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($settings[30]->plain_value ?? null); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($settings[28]->settingTranslation->value ?? $settings[28]->settingTranslationDefaultEnglish->value ?? NULL); ?></h5>
                        <span><?php echo e($settings[29]->settingTranslation->value ?? $settings[29]->settingTranslationDefaultEnglish->value ?? NULL); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">

    $('.add_to_wishlist').on("click",function(e){
        var product_id = $(this).data('product_id');
        var category_id = $(this).data('category_id');
        var product_slug = $(this).data('product_slug');

        console.log(category_id);
        $.ajax({
            url: "<?php echo e(route('wishlist.add')); ?>",
            type: "GET",
            data: {
                product_id:product_id,
                category_id:category_id,
                product_slug:product_slug
            },
            success: function (data) {
                if (data.type=='success') {
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
                        title: data.message,
                    })
                }
                console.log(data);
            }
        })
    });
</script>

<?php $__env->stopPush(); ?>




<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cartpro\resources\views/frontend/pages/home.blade.php ENDPATH**/ ?>