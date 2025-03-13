<?php $__env->startSection('meta_info'); ?>

    <meta product="og:site_name" <?php if(isset($settingHomePageSeo->meta_site_name)): ?> content="<?php echo e($settingHomePageSeo->meta_site_name); ?>" <?php endif; ?> >
    <meta product="og:title"  <?php if(isset($settingHomePageSeo->meta_title)): ?> content="<?php echo e($settingHomePageSeo->meta_title); ?>" <?php endif; ?> >
    <meta product="og:description" <?php if(isset($settingHomePageSeo->meta_description)): ?> content="<?php echo e($settingHomePageSeo->meta_description); ?>" <?php endif; ?> >
    <meta product="og:url" <?php if(isset($settingHomePageSeo->meta_url)): ?> content="<?php echo e($settingHomePageSeo->meta_url); ?>" <?php endif; ?> >
    <meta product="og:type" <?php if(isset($settingHomePageSeo->meta_type)): ?> content="<?php echo e($settingHomePageSeo->meta_type); ?>" <?php endif; ?> >
    <?php if(isset($settingHomePageSeo->meta_image)): ?>
        <meta product="og:image" content="<?php echo e(asset($settingHomePageSeo->meta_image)); ?>">
    <?php endif; ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('frontend_content'); ?>


<!--Home Banner starts -->
<div class="banner-area v3">
    <div class="container">
        <div class="single-banner-item style2">
            <div class="row">
                <?php if($store_front_slider_format == 'full_width'): ?>
                    <div class="col-md-12">
                        <div class="banner-slider">
                            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <?php if($item->slider_image!==null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image))): ?>
                                            <div class="img-fill" style="background-image: url(<?php echo e(url($item->slider_image_full_width)); ?>); background-size: cover; background-position: center;">
                                        <?php else: ?>
                                            <div class="img-fill" style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                                        <?php endif; ?>
                                            <div class="<?php if($item->text_alignment=='right'): ?> info right <?php else: ?> info <?php endif; ?>" >
                                                <div>
                                                    <h3 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_title); ?></h3>
                                                    <h5 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_subtitle); ?></h5>
                                                </div>
                                                <?php if($item->type=='category'): ?>
                                                    <a class="button style1 md" href="<?php echo e(route('cartpro.category_wise_products',$item->slider_slug)); ?>">Read More</a>
                                                <?php elseif($item->type=='url'): ?>
                                                    <a class="button style1 md" href="<?php echo e($item->url); ?>">Read More</a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="row">
                            <?php $__currentLoopData = $slider_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-4">
                                        <a href="<?php echo e($slider_banners[$key]['action_url']); ?>" target="<?php echo e($slider_banners[$key]['new_window']==1 ? '__blank' : ''); ?>">
                                        <?php if($slider_banners[$key]['image']!==null && Illuminate\Support\Facades\File::exists(public_path($slider_banners[$key]['image']))): ?>
                                            <div class="slider-banner" style="background-image:url(<?php echo e(asset($slider_banners[$key]['image'])); ?>);background-size:cover;background-position: center;">
                                        <?php else: ?>
                                            <div class="slider-banner" style="background-image:url('https://dummyimage.com/75.1526x75.1526/e5e8ec/e5e8ec&text=Slider-Banner');background-size:cover;background-position: center;">
                                        <?php endif; ?>
                                        <h4 class="text-dark"><?php echo e($slider_banners[$key]['title']); ?></h4>
                                    </div></a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    
                    <div class="col-md-8">
                        <div class="banner-slider">
                            <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="item">
                                        <?php if($item->slider_image!==null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image))): ?>
                                            <div class="img-fill" style="background-image: url(<?php echo e(url($item->slider_image)); ?>); background-size: cover; background-position: center;">
                                        <?php else: ?>
                                            <div class="img-fill" style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                                        <?php endif; ?>
                                            <div class="<?php if($item->text_alignment=='right'): ?> info right <?php else: ?> info <?php endif; ?>" >
                                                <div>
                                                    <h3 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_title); ?></h3>
                                                    <h5 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_subtitle); ?></h5>

                                                    <?php if($item->type=='category'): ?>
                                                        <a class="button style1 md" href="<?php echo e(route('cartpro.category_wise_products',$item->slider_slug)); ?>">Read More</a>
                                                    <?php elseif($item->type=='url'): ?>
                                                        <a class="button style1 md" href="<?php echo e($item->url); ?>">Read More</a>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="item">
                                    <div class="img-fill" style="background-image: url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider'); background-size: cover; background-position: center;">
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <?php if(empty(!$slider_banners)): ?>
                            <?php $__currentLoopData = $slider_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($slider_banners[$key]['image']!==null && Illuminate\Support\Facades\File::exists(public_path($slider_banners[$key]['image']))): ?>
                                    <a href="<?php echo e($slider_banners[$key]['action_url']); ?>" target="<?php echo e($slider_banners[$key]['new_window']==1 ? '__blank' : ''); ?>">
                                        <div class="slider-banner" style="background-image:url(<?php echo e(asset($slider_banners[$key]['image'])); ?>);background-size:cover;background-position: center;">
                                            <h4 class="text-dark"><?php echo e($slider_banners[$key]['title']); ?></h4>
                                        </div>
                                    </a>
                                <?php else: ?>
                                    <div class="slider-banner" style="background-image:url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider-Banner');background-size:cover;background-position: center;"></div>
                                <?php endif; ?>
                                    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Top Category Section -->
<?php if($top_categories_section_enabled==1): ?>
    <section class="category-tab-section pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title mb-3">
                        <div class="d-flex align-items-center">
                            <h3><?php echo e(__('file.Top Categories')); ?></h3>
                        </div>
                        <!-- Add Pagination -->
                        <div class="category-navigation">
                            <div class="category-button-prev"><i class="ti-angle-left"></i></div>
                            <div class="category-button-next"><i class="ti-angle-right"></i></div>
                        </div>
                    </div>

                    <div class="category-slider-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $categories->where('top',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        
                            <div class="swiper-slide">
                                <a href="<?php echo e(url('category')); ?>/<?php echo e($item->slug); ?>">
                                    <div class="category-container">
                                        <?php if($item->image!==null && Illuminate\Support\Facades\File::exists(public_path($item->image))): ?>
                                            <img class="lazy" data-src="<?php echo e(asset($item->image)); ?>">
                                        <?php else: ?>
                                            <img class="lazy" data-src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=Top-Category" alt="...">
                                        <?php endif; ?>

                                        <div class="category-name">
                                            
                                            <?php echo e($item->category_name ?? null); ?>

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
        </div>
    </section>
<?php endif; ?>

<!--Three Coloumn Banner Full--->
<?php if($three_column_banner_full_enabled==1): ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <a href="<?php echo e($settings_new['storefront_slider_banner_1_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_slider_banner_1_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_full_width_banners_image_1)); ?>" alt=""></a>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo e($settings_new['storefront_slider_banner_2_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_slider_banner_2_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_full_width_banners_image_2)); ?>" alt=""></a>
                </div>
                <div class="col-sm-4">
                    <a href="<?php echo e($settings_new['storefront_slider_banner_3_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_slider_banner_3_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_full_width_banners_image_3)); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


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
                                    <a <?php if($i==0): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?> data-bs-toggle="tab" href="#<?php echo e($setting->key); ?>" role="tab" aria-selected="true"><?php echo htmlspecialchars_decode($setting->settingTranslation->value ?? $setting->settingTranslationDefaultEnglish->value ?? null); ?></a>
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
                                            <?php if($item->product!==NULL && $item->product->is_active==1): ?>
                                                <div class="swiper-slide">
                                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                        <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                        <input type="hidden" name="qty" value="1">

                                                        <div class="single-product-wrapper">
                                                            <div class="single-product-item">
                                                                <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image_medium))): ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image_medium)); ?>"></a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                <?php endif; ?>

                                                                <!-- product-promo-text -->
                                                                    <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                <!--/ product-promo-text -->

                                                                <div class="product-overlay">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->product->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                                    <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                                                </div>

                                                            </div>
                                                            <div class="product-details">
                                                                
                                                                <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                    <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                                </a>

                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <div class="product-price">
                                                                            <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                                                                <span class="promo-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->special_price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                        <?php else: ?>
                                                                            <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
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
                                            <?php if($item->product!==NULL && $item->product->is_active==1): ?>
                                                <div class="swiper-slide">
                                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                        <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                        <input type="hidden" name="qty" value="1">

                                                        <div class="single-product-wrapper">
                                                            <div class="single-product-item">
                                                                <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image_medium))): ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image_medium)); ?>"></a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                <?php endif; ?>

                                                                <!-- product-promo-text -->
                                                                <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                <!--/ product-promo-text -->

                                                                <div class="product-overlay">
                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->product->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                                    <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                                                </div>

                                                            </div>
                                                            <div class="product-details">
                                                                
                                                                <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                    <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                                </a>

                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <div class="product-price">
                                                                            <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                                                                <span class="promo-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->special_price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                        <?php else: ?>
                                                                            <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
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
                                        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
                                            <div class="swiper-slide">
                                                <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                    <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                    <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                    <input type="hidden" name="qty" value="1">

                                                    <div class="single-product-wrapper">
                                                        <div class="single-product-item">
                                                            <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image_medium))): ?>
                                                                <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image_medium)); ?>"></a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                            <?php endif; ?>

                                                            <!-- product-promo-text -->
                                                            <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <!--/ product-promo-text -->

                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->product->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            
                                                            <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL); ?>

                                                            </a>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <ul class="product-rating">
                                                                        <?php
                                                                            for ($i=1; $i <=5 ; $i++){
                                                                                if ($i<= round($item->product->avg_rating)){  ?>
                                                                                    <li><i class="las la-star"></i></li>
                                                                        <?php
                                                                                }else { ?>
                                                                                    <li><i class="lar la-star"></i></li>
                                                                        <?php        }
                                                                            }
                                                                        ?>
                                                                    </ul>
                                                                    <div class="product-price">
                                                                        <?php if($item->product->special_price>0): ?>
                                                                            <span class="promo-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <span class="old-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <span class="price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                    <?php else: ?>
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endif; ?>
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
                                        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
                                            <div class="swiper-slide">
                                                <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                    <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                    <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                    <input type="hidden" name="qty" value="1">

                                                    <div class="single-product-wrapper">
                                                        <div class="single-product-item">
                                                            <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image_medium))): ?>
                                                                <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image_medium)); ?>"></a>
                                                            <?php else: ?>
                                                                <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                            <?php endif; ?>

                                                            <!-- product-promo-text -->
                                                            <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <!--/ product-promo-text -->

                                                            <div class="product-overlay">
                                                                <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->product->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                                </a>
                                                                <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                                            </div>
                                                        </div>
                                                        <div class="product-details">
                                                            
                                                            <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? NULL); ?>

                                                            </a>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <ul class="product-rating">
                                                                        <?php
                                                                            for ($i=1; $i <=5 ; $i++){
                                                                                if ($i<= round($item->product->avg_rating)){  ?>
                                                                                    <li><i class="las la-star"></i></li>
                                                                        <?php
                                                                                }else { ?>
                                                                                    <li><i class="lar la-star"></i></li>
                                                                        <?php        }
                                                                            }
                                                                        ?>
                                                                    </ul>
                                                                    <div class="product-price">
                                                                        <?php if($item->product->special_price>0): ?>
                                                                            <span class="promo-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                            <span class="old-price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php else: ?>
                                                                            <span class="price">
                                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                    <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                <?php else: ?>
                                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                <?php endif; ?>
                                                                            </span>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                        <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                    <?php else: ?>
                                                                        <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                    <?php endif; ?>                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        <?php endif; ?>
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
        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
            <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
            <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
            <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>

    <?php $__empty_1 = true; $__currentLoopData = $product_tab_one_section_4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <?php if($item->product!==NULL && $item->product->is_active==1): ?>
            <?php echo $__env->make('frontend.includes.quickshop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
<?php endif; ?>


<!--Two Coloumn Banner --->
<?php if($two_column_banner_enabled==1): ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <a href="<?php echo e($settings_new['storefront_two_column_banners_1_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_two_column_banners_1_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($two_column_banner_image_1)); ?>" alt=""></a>
                </div>
                <div class="col-sm-6">
                    <a href="<?php echo e($settings_new['storefront_two_column_banners_2_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_two_column_banners_2_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($two_column_banner_image_2)); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<!--Flash Sale And Vertical Products Start-->
<?php if($flash_sale_and_vertical_products_section_enabled): ?>
    <section>
        <div class="container">
            <div class="row">

                
                <div class="col-md-12">
                    <div class="section-title mb-3">
                        <h3>
                            <?php echo e($storefront_flash_sale_title); ?>

                        </h3>
                    </div>
                    <div class="deals-slider-wrapper swiper-container mb-3">
                        <div class="swiper-wrapper">
                            <?php if($flash_sales): ?>
                                <?php $__empty_1 = true; $__currentLoopData = $flash_sales->flashSaleProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->price >0 && $item->product->is_active==1): ?>
                                        <div class="swiper-slide">
                                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($item->product->id); ?>">
                                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                <input type="hidden" name="category_id" value="<?php echo e($item->product->categoryProduct[0]->category_id); ?>">
                                                <input type="hidden" name="flash_sale" value="1">
                                                <input type="hidden" name="flash_sale_price" value="<?php echo e($item->price); ?>">
                                                <input type="hidden" name="qty" value="1">

                                                <div class="single-product-wrapper deals">
                                                    <div class="single-product-item">
                                                        <?php if(isset($item->product->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->product->baseImage->image_medium))): ?>
                                                            <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->product->baseImage->image_medium)); ?>"></a>
                                                        <?php else: ?>
                                                            <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=Best-Deals"></a>
                                                        <?php endif; ?>

                                                        <!-- product-promo-text -->
                                                        <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <!--/ product-promo-text -->

                                                        <div class="product-overlay">
                                                            
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->product->id); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                            <a>
                                                                <span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->product->categoryProduct[0]->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span>
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name text-center" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>">
                                                            <?php echo e($item->product->productTranslation->product_name ?? null); ?>

                                                        </a>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <ul class="product-rating">
                                                                    <?php
                                                                        for ($i=1; $i <=5 ; $i++){
                                                                            if ($i<= round($item->product->avg_rating)){  ?>
                                                                                <li><i class="las la-star"></i></li>
                                                                    <?php
                                                                            }else { ?>
                                                                                <li><i class="lar la-star"></i></li>
                                                                    <?php        }
                                                                        }
                                                                    ?>
                                                                </ul>
                                                                <div class="product-price">
                                                                    <?php if($item->price>0 && $item->price<$item->product->price): ?>
                                                                        <span class="promo-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                            <?php else: ?>
                                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                        <span class="old-price">
                                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                            <?php else: ?>
                                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                            <?php endif; ?>
                                                                        </span>
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
                                                            <div>
                                                                <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                <?php else: ?>
                                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="daily-deals-wrap">
                                                            <!-- countdown start -->
                                                            <div class="countdown-deals text-center" data-countdown="<?php echo e($item->end_date); ?>">
                                                                <div class="cdown day">
                                                                    <span class="time-count">00</span>
                                                                    <p><?php echo app('translator')->get('file.Days'); ?></p>
                                                                </div>
                                                                <div class="cdown hour">
                                                                    <span class="time-count">00</span>
                                                                    <p><?php echo app('translator')->get('file.Hours'); ?></p>
                                                                </div>
                                                                <div class="cdown minutes">
                                                                    <span class="time-count">00</span>
                                                                    <p><?php echo app('translator')->get('file.Mins'); ?></p>
                                                                </div>
                                                                <div class="cdown second">
                                                                    <span class="time-count">00</span>
                                                                    <p><?php echo app('translator')->get('file.Secs'); ?></p>
                                                                </div>
                                                            </div>
                                                            <!-- countdown end -->
                                                        </div>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <?php if($item->qty>=0): ?>
                                                            <?php echo app('translator')->get('file.Available'); ?> <?php echo e($item->qty); ?>

                                                        <?php endif; ?>

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <!-- Add Pagination -->
                        <div class="deals-navigation">
                            <div class="deals-button-next"><i class="ti-angle-right"></i></div>
                            <div class="deals-button-prev"><i class="ti-angle-left"></i></div>
                        </div>
                    </div>
                </div>

                
                <div class="col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="section-title mb-3">
                                <h3><?php echo e($storefront_vertical_product_1_title); ?></h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-1-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-1-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-1 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php $__empty_1 = true; $__currentLoopData = $vertical_product_1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($key<3): ?>
                                                <?php if($item->product->is_active==1): ?>
                                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                        <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                        <input type="hidden" name="qty" value="1">

                                                        <div class="single-product-wrapper list">
                                                            <div class="single-product-item">

                                                                <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image_small))): ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image_small)); ?>"></a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="product-details">
                                                                <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                    <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                                </a>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <div class="product-price">
                                                                            <?php if($item->product->special_price>0): ?>
                                                                                <span class="promo-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                        <?php else: ?>
                                                                            <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="section-title mb-3">
                                <h3><?php echo e($storefront_vertical_product_2_title); ?></h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-2-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-2-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-2 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php $__empty_1 = true; $__currentLoopData = $vertical_product_2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($key<3): ?>
                                                <?php if($item->product->is_active==1): ?>
                                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                        <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                        <input type="hidden" name="qty" value="1">

                                                        <div class="single-product-wrapper list">
                                                            <div class="single-product-item">
                                                                <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image))): ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image)); ?>"></a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                <?php endif; ?>


                                                            </div>
                                                            <div class="product-details">
                                                                <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                    <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                                </a>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <div class="product-price">
                                                                            <?php if($item->product->special_price>0): ?>
                                                                                <span class="promo-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                        <?php else: ?>
                                                                            <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="section-title mb-3">
                                <h3><h3><?php echo e($storefront_vertical_product_3_title); ?></h3></h3>
                                <!-- Add Pagination -->
                                <div class="list-navigation">
                                    <div class="list-button-prev list-slider-3-arrow-prev"><i class="ti-angle-left"></i></div>
                                    <div class="list-button-next list-slider-3-arrow-next"><i class="ti-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="list-slider-wrapper-3 swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <?php $__empty_1 = true; $__currentLoopData = $vertical_product_3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($key<3): ?>
                                                <?php if($item->product->is_active==1): ?>
                                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                        <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                        <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                        <input type="hidden" name="qty" value="1">

                                                        <div class="single-product-wrapper list">
                                                            <div class="single-product-item">
                                                                <?php if(isset($item->productBaseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->productBaseImage->image))): ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->productBaseImage->image)); ?>"></a>
                                                                <?php else: ?>
                                                                    <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="product-details">
                                                                <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                    <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                                </a>
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <div>
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="las la-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="lar la-star"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                        <div class="product-price">
                                                                            <?php if($item->product->special_price>0): ?>
                                                                                <span class="promo-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                                <span class="old-price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="price">
                                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                        <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                    <?php else: ?>
                                                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                    <?php endif; ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                                            <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                                        <?php else: ?>
                                                                            <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php if($flash_sales): ?>
        <?php $__empty_1 = true; $__currentLoopData = $flash_sales->flashSaleProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php echo $__env->make('frontend.includes.quickshop_flash_sale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<!--Flash Sale And Vertical Products End-->

<!--Three Coloumn Banner --->
<?php if($three_column_banner_enabled==1): ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="<?php echo e($settings_new['storefront_three_column_banners_1_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_three_column_banners_1_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_banners_image_1)); ?>" alt=""></a>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo e($settings_new['storefront_three_column_banners_2_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_three_column_banners_2_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_banners_image_2)); ?>" alt=""></a>
            </div>
            <div class="col-sm-4">
                <a href="<?php echo e($settings_new['storefront_three_column_banners_3_call_to_action_url']->plain_value); ?>" target="<?php echo e($settings_new['storefront_three_column_banners_3_open_in_new_window']->plain_value==1 ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($three_column_banners_image_3)); ?>" alt=""></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Trending Start-->
<section class="product-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb-3">
                    <h3><?php echo e(__('file.Trending')); ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="product-grid">
                <?php $__empty_1 = true; $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if($item->product->is_active==1): ?>
                        <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($item->product->id); ?>">
                            <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                            <input type="hidden" name="category_id" value="<?php echo e($item->product->categoryProduct[0]->category_id); ?>">
                            <input type="hidden" name="qty" value="1">

                            <div class="product-grid-item">
                                <div class="single-product-wrapper">
                                    <div class="single-product-item">
                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>">
                                        <?php if(isset($item->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($item->baseImage->image_medium))): ?>
                                            <img class="lazy" data-src="<?php echo e(asset($item->baseImage->image_medium)); ?>">
                                        <?php else: ?>
                                            <img class="lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro">
                                        <?php endif; ?>
                                        </a>

                                        <!-- product-promo-text -->
                                        <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->product->manage_stock, 'qty'=>$item->product->qty, 'in_stock'=>$item->product->in_stock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->product->new_to], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <!--/ product-promo-text -->

                                        <div class="product-overlay">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickshopTrend_<?php echo e($item->product->slug); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                            <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->product->categoryProduct[0]->category_id ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        
                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->product->categoryProduct[0]->category_id)); ?>">
                                            
                                            <?php echo e($item->orderProductTranslation->product_name ?? null); ?>

                                        </a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <ul class="product-rating">
                                                    <?php
                                                        for ($i=1; $i <=5 ; $i++){
                                                            if ($i<= round($item->product->avg_rating)){  ?>
                                                                <li><i class="las la-star"></i></li>
                                                    <?php
                                                            }else { ?>
                                                                <li><i class="lar la-star"></i></li>
                                                    <?php        }
                                                        }
                                                    ?>
                                                </ul>
                                                <div class="product-price">
                                                    <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                                        <span class="old-price">
                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php else: ?>
                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                        <span class="promo-price">
                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php else: ?>
                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="promo-price">
                                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                            <?php else: ?>
                                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                            <?php endif; ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div>
                                                <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-placement="top" title="Disabled"><button class="btn button style2 sm" disabled><i class="las la-cart-plus"></i></button></span>
                                                <?php else: ?>
                                                    <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__empty_1 = true; $__currentLoopData = $orderDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php echo $__env->make('frontend.includes.quickshop_trending', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
<!-- Trending ends-->


<!-- One Coloumn Banner --->
<?php if($oneColumnBannerEnabled==1): ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo e($oneColumnBannerCallToActionURL); ?>" target="<?php echo e($storefrontOneColumnBannerOpenInNewWindow ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($oneColumnBannerImage)); ?>" alt=""></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!--Brands-->
<?php if($storefrontTopBrandsSectionEnabled==1): ?>
<section class="brand-tab-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-slider-wrapper swiper-container">
                    <div class="swiper-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="swiper-slide">
                                <a class="brand-wrapper" href="<?php echo e(route('cartpro.brand.products',$brand->slug)); ?>">
                                    <?php if($brand->brand_logo!==null && Illuminate\Support\Facades\File::exists(public_path($brand->brand_logo))): ?>
                                        <img class="swiper-lazy" data-src="<?php echo e(asset($brand->brand_logo)); ?>" width="150px">
                                    <?php else: ?>
                                        <img class="swiper-lazy" data-src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=Brand-Logo">
                                    <?php endif; ?>
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
<?php endif; ?>
<!--Brands-->


<!--Hero Promo Area starts--->
<div class="hero-promo-area v1">
    <div class="container">
        <div class="row">
            <?php if($storefrontSectionStatus==1): ?>
                <!-- Feature 1 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($storefrontFeature_1_Icon); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($storefrontFeature_1_Title); ?></h5>
                        <span><?php echo e($storefrontFeature_1_Subtitle); ?></span>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($storefrontFeature_2_Icon); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($storefrontFeature_2_Title); ?></h5>
                        <span><?php echo e($storefrontFeature_2_Subtitle); ?></span>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($storefrontFeature_3_Icon); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($storefrontFeature_3_Title); ?></h5>
                        <span><?php echo e($storefrontFeature_3_Subtitle); ?></span>
                    </div>
                </div>
                <!-- Feature 4 -->
                <div class="col-md-3 col-6 single-promo-item style2 text-center">
                    <div class="promo-icon style2">
                        <i class="<?php echo e($storefrontFeature_4_Icon); ?>"></i>
                    </div>
                    <div class="promo-content style2">
                        <h5><?php echo e($storefrontFeature_4_Title); ?></h5>
                        <span><?php echo e($storefrontFeature_4_Subtitle); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">

        //for Product_Tab_1
        $('.attribute_value_productTab1').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_productTab1').val(values);
        });

        //for FlashSale
        $('.attribute_value_flashSale').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_flashSale').val(values);
        });

        //for Trending
        $('.attribute_value_trending').on("click",function(e){
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_trending').val(values);
        });


        $('#star_1').on('click',function(){
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(1);

            $('#star_2').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_2').on('click',function(){
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(2);
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_3').on('click',function(){
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(3);
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_4').on('click',function(){
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_4').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(4);
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_5').on('click',function(){
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_4').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_5').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(5);
        })


    </script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>