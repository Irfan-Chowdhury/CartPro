<?php $__env->startSection('meta_info'); ?>
    <meta product="og:site_name"
        <?php if(isset($settingHomePageSeo->meta_site_name)): ?> content="<?php echo e($settingHomePageSeo->meta_site_name); ?>" <?php endif; ?>>
    <meta product="og:title" <?php if(isset($settingHomePageSeo->meta_title)): ?> content="<?php echo e($settingHomePageSeo->meta_title); ?>" <?php endif; ?>>
    <meta product="og:description"
        <?php if(isset($settingHomePageSeo->meta_description)): ?> content="<?php echo e($settingHomePageSeo->meta_description); ?>" <?php endif; ?>>
    <meta product="og:url" <?php if(isset($settingHomePageSeo->meta_url)): ?> content="<?php echo e($settingHomePageSeo->meta_url); ?>" <?php endif; ?>>
    <meta product="og:type" <?php if(isset($settingHomePageSeo->meta_type)): ?> content="<?php echo e($settingHomePageSeo->meta_type); ?>" <?php endif; ?>>
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
                    <?php if($homeData->settings->storeFrontSliderFormat == 'full_width'): ?>
                        <div class="col-md-12">
                            <div class="banner-slider">
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <?php if($item->slider_image !== null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image))): ?>
                                            <div class="img-fill"
                                                style="background-image: url(<?php echo e(url($item->slider_image_full_width)); ?>); background-size: cover; background-position: center;">
                                            <?php else: ?>
                                                <div class="img-fill"
                                                    style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                                        <?php endif; ?>
                                        <div class="<?php if($item->text_alignment == 'right'): ?> info right <?php else: ?> info <?php endif; ?>">
                                            <div>
                                                <h3 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> ">
                                                    <?php echo e($item->slider_title); ?></h3>
                                                <h5 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> ">
                                                    <?php echo e($item->slider_subtitle); ?></h5>
                                            </div>
                                            <?php if($item->type == 'category'): ?>
                                                <a class="button style1 md"
                                                    href="<?php echo e(route('cartpro.category_wise_products', $item->slider_slug)); ?>">Read
                                                    More</a>
                                            <?php elseif($item->type == 'url'): ?>
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
                    <?php $__currentLoopData = $sliderBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <a href="<?php echo e($item->action_url); ?>" target="<?php echo e($item->new_window == 1 ? '__blank' : ''); ?>">
                                <?php if($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($$item->image))): ?>
                                    <div class="slider-banner"
                                        style="background-image:url(<?php echo e(asset($item->image)); ?>);background-size:cover;background-position: center;">
                                    <?php else: ?>
                                        <div class="slider-banner"
                                            style="background-image:url('https://dummyimage.com/75.1526x75.1526/e5e8ec/e5e8ec&text=Slider-Banner');background-size:cover;background-position: center;">
                                <?php endif; ?>
                                <h4 class="text-dark"><?php echo e($item->title); ?></h4>
                        </div></a>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php else: ?>
        <!-- Half Width -->
        <div class="col-md-8">
            <div class="banner-slider">
                <?php $__empty_1 = true; $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="item">
                        <?php if($item->slider_image !== null && Illuminate\Support\Facades\File::exists(public_path($item->slider_image))): ?>
                            <div class="img-fill"
                                style="background-image: url(<?php echo e(url($item->slider_image)); ?>); background-size: cover; background-position: center;">
                        <?php else: ?>
                            <div class="img-fill"
                                style="background-image: url('https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Slider'); background-size: cover; background-position: center;">
                        <?php endif; ?>
                                <div class="<?php if($item->text_alignment == 'right'): ?> info right <?php else: ?> info <?php endif; ?>">
                                    <div>
                                        <h3 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_title); ?></h3>
                                        <h5 style="color: <?php echo e($item->text_color ?? '#ffffff'); ?> "><?php echo e($item->slider_subtitle); ?></h5>

                                        <?php if($item->type == 'category'): ?>
                                            <a class="button style1 md"
                                                href="<?php echo e(route('cartpro.category_wise_products', $item->slider_slug)); ?>">Read
                                                More</a>
                                        <?php elseif($item->type == 'url'): ?>
                                            <a class="button style1 md" href="<?php echo e($item->url); ?>">Read More</a>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="item">
                <div class="img-fill"
                    style="background-image: url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider'); background-size: cover; background-position: center;">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-md-4">
        <?php $__currentLoopData = $sliderBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($item->image))): ?>
                <a href="<?php echo e($item->action_url); ?>" target="<?php echo e($item->new_window == 1 ? '__blank' : ''); ?>">
                    <div class="slider-banner"
                        style="background-image:url(<?php echo e(asset($item->image)); ?>);background-size:cover;background-position: center;">
                        <h4 class="text-dark"><?php echo e($item->title); ?></h4>
                    </div>
                </a>
            <?php else: ?>
                <div class="slider-banner"
                    style="background-image:url('https://dummyimage.com/600x400/e5e8ec/000000&text=Slider-Banner');background-size:cover;background-position: center;">
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


    <!-- Top Category Section -->
    <?php if($homeData->settings->isTopCategorySectionEnabled): ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo e(url('category')); ?>/<?php echo e($item->slug); ?>">
                                            <div class="category-container">
                                                <?php if($item->image !== null && Illuminate\Support\Facades\File::exists(public_path($item->image))): ?>
                                                    <img class="lazy" data-src="<?php echo e(asset($item->image)); ?>">
                                                <?php else: ?>
                                                    <img class="lazy"
                                                        data-src="https://dummyimage.com/100x100/e5e8ec/e5e8ec&text=Top-Category"
                                                        alt="...">
                                                <?php endif; ?>

                                                <div class="category-name">
                                                    <?php echo e($item->name ?? null); ?>

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
    <?php if($threeColumnBanner->isThreeColumnBannerFullEnabled): ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $threeColumnBanner->banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-4">
                            <a href="<?php echo e($item->actionUrl); ?>" target="<?php echo e($item->isNewWindow ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($item->image)); ?>" alt=""></a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>




    <!--Product area starts-->
    <?php if($productDetailsTab->isSectionEnabled): ?>
        <section class="product-tab-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="nav nav-tabs product-details-tab" id="lionTab" role="tablist">
                            <?php $__currentLoopData = $productDetailsTab->productTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a <?php if($key==0): ?> class="nav-link active" <?php else: ?> class="nav-link" <?php endif; ?> data-bs-toggle="tab" href="#<?php echo e($item->key); ?>" role="tab" aria-selected="true"><?php echo e($item->title); ?></a>
                                </li>
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
                            <?php $__currentLoopData = $productDetailsTab->productTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productTab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $category = $productTab->categoryWithProducts; ?>

                                <div class="tab-pane fade <?php echo e($key === 0 ? 'show active' : ''); ?>" id="<?php echo e($productTab->key); ?>" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="product-slider-wrapper swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->isActive==1): ?>
                                                    <div class="swiper-slide">
                                                        <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="product_id" value="<?php echo e($item->productId); ?>">
                                                            <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                                            <input type="hidden" name="category_id" value="<?php echo e($category->categoryId); ?>">
                                                            <input type="hidden" name="qty" value="1">

                                                            <div class="single-product-wrapper">
                                                                <div class="single-product-item">
                                                                    <?php if(isset($item->image)): ?>
                                                                        <a href="<?php echo e(url('product/'.$item->slug.'/'. $category->categoryId)); ?>"><img class="swiper-lazy" data-src="<?php echo e(asset($item->mediumImage)); ?>"></a>
                                                                    <?php else: ?>
                                                                        <a href="<?php echo e(url('product/'.$item->slug.'/'. $category->categoryId)); ?>"><img class="swiper-lazy" data-src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro"></a>
                                                                    <?php endif; ?>

                                                                    <!-- product-promo-text -->
                                                                    <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->manageStock, 'qty'=>$item->qty, 'in_stock'=>$item->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->newTo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    <div class="product-overlay">
                                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->productId); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                                        <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->productId); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($category->categoryId); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-details">
                                                                    <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $category->categoryId)); ?>">
                                                                        <?php echo e($item->name); ?>

                                                                    </a>

                                                                    <div class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <ul class="product-rating">
                                                                                <?php
                                                                                    for ($i=1; $i <=5 ; $i++){
                                                                                        if ($i<= round($item->avgRating)){  ?>
                                                                                            <li><i class="las la-star"></i></li>
                                                                                <?php
                                                                                        }else { ?>
                                                                                            <li><i class="lar la-star"></i></li>
                                                                                <?php        }
                                                                                    }
                                                                                ?>
                                                                            </ul>
                                                                            <div class="product-price">
                                                                                <?php if($item->specialPrice!=NULL && $item->specialPrice> 0 && $item->specialPrice < $item->price): ?>
                                                                                    <span class="promo-price">
                                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                            <?php echo e(number_format((float)$item->specialPrice * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                        <?php endif; ?>
                                                                                    </span>
                                                                                    <span class="old-price">
                                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                            <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                        <?php endif; ?>
                                                                                    </span>
                                                                                <?php else: ?>
                                                                                    <span class="price">
                                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                                            <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                                        <?php else: ?>
                                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                                        <?php endif; ?>
                                                                                    </span>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
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
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <!--QuickShop Modal--->
    <?php $__currentLoopData = $productDetailsTab->productTabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productTab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $category = $productTab->categoryWithProducts; ?>
        <?php $__currentLoopData = $category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <!-- Quick Shop Modal starts -->
            <div class="modal fade quickshop" id="id_<?php echo e($item->productId); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($item->productId); ?>" aria-hidden="true">
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
                                            <?php $__currentLoopData = $item->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="slider-for__item ex1">
                                                    <img class="lazy" data-src="<?php echo e(asset($value->image)); ?>" alt="..." />
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="slider-nav-modal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($item->productId); ?>">
                                        <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                        <input type="hidden" name="category_id" value="<?php echo e($category->categoryId); ?>">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="value_ids" class="value_ids_products">

                                        <div class="item-details">
                                            <a class="item-category" href=""><?php echo e($category->categoryName); ?></a>
                                            <h3 class="item-name"><?php echo e($item->name); ?></h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="item-brand"><?php echo app('translator')->get('file.Brand'); ?>: <a href=""><?php echo e(isset($item->brand->name) ? $item->brand->name : ''); ?></a></div>
                                                <div class="item-review">
                                                    <ul class="p-0 m-0">
                                                        <?php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  ?>
                                                                    <li><i class="las la-star"></i></li>
                                                        <?php
                                                                }else { ?>
                                                                    <li><i class="lar la-star"></i></li>
                                                        <?php        }
                                                            }
                                                        ?>
                                                    </ul>
                                                    <span>( <?php echo e(round($item->avgRating)); ?> )</span>
                                                </div>
                                                <?php if($item->sku): ?>
                                                    <div class="item-sku"><?php echo app('translator')->get('file.SKU'); ?>: <?php echo e($item->sku ?? null); ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <hr>
                                            <?php if($item->specialPrice !=NULL && $item->specialPrice >0 && $item->specialPrice <$item->price): ?>
                                                <div class="item-price">
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>
                                                    <hr>
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <small class="old-price"><del><?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> </del></small>
                                                    <?php else: ?>
                                                        <small class="old-price"><del><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> </del></small>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="item-price">
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="item-short-description">
                                                <p><?php echo $item->shortDescription; ?></p>
                                            </div>
                                            <hr>
                                            <?php
                                                $attributes = $item->attributes;
                                            ?>
                                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item-variant">
                                                    <span><?php echo e($attribute->name); ?>:</span>
                                                    <ul class="product-variant size-opt p-0 mt-1">
                                                        <?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="attribute_value"
                                                                data-attribute_name="<?php echo e($value->name); ?>"
                                                                id="valueId_<?php echo e($value->attributeValueId); ?>"
                                                                data-value_id="<?php echo e($value->attributeValueId); ?>"
                                                                data-value_name="<?php echo e($value->name); ?>">
                                                                <span><?php echo e($value->name); ?></span>
                                                            </li>
                                                            <input type="hidden" name="value_id[]" value="<?php echo e($value->attributeValueId); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item-options">
                                                <div class="input-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus decrementProductQty-<?php echo e($item->productId); ?>">
                                                            <span class="ti-minus"></span>
                                                        </button>
                                                    </span>
                                                    <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                                        <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->productId); ?>" value="1" min="1" max="0">
                                                    <?php else: ?>
                                                        <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->productId); ?>" value="1" min="1" max="<?php echo e($item->qty); ?>">
                                                    <?php endif; ?>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus incrementProductQty-<?php echo e($item->productId); ?>">
                                                            <span class="ti-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                                    <button disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                                <?php else: ?>
                                                    <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                                <?php endif; ?>
                                                <a><div class="button button-icon style4 sm <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($item->productId); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($category->categoryId ?? null); ?>" data-qty="1"><p><span><i class="ti-heart"></i> </span><?php echo app('translator')->get('file.Add to Wishlist'); ?></p></div></a>
                                            </div>

                                            <hr>
                                            <div class="item-share mt-3" id="social-links"><span><?php echo app('translator')->get('file.Share'); ?></span>
                                                <ul class="footer-social d-inline pad-left-15">
                                                    <li><a href="<?php echo e($socialShare['facebook']); ?>"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['twitter']); ?>"><i class="ti-twitter"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['linkedin']); ?>"><i class="ti-linkedin"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['reddit']); ?>"><i class="ti-reddit"></i></a></li>
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

            <?php $__env->startPush('scripts'); ?>
                <script type="text/javascript">
                    //Quantity Manage in Modal
                    $(".decrementProductQty-<?php echo e($item->productId); ?>").on("click",function(e){
                        $(".decrementProductQty-<?php echo e($item->productId); ?>").prop("disabled",false);
                    });
                    $(".incrementProductQty-<?php echo e($item->productId); ?>").on("click",function(e){
                        var inputNumber = $('.quantity-<?php echo e($item->productId); ?>').val();
                        var maxNumber = $('.quantity-<?php echo e($item->productId); ?>').attr('max');
                        console.log(maxNumber);

                        if (maxNumber==0) {
                            console.log(Number(maxNumber));
                        }else{
                            if ((Number(inputNumber)+1) > Number(maxNumber)) {
                                $('.quantity-<?php echo e($item->productId); ?>').val(Number(maxNumber)-1);
                                $(this).prop("disabled",true);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Available product is : '+ maxNumber,
                                });
                            }
                        }
                    });
                </script>
            <?php $__env->stopPush(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--/ Product area-->



    <!--Two Coloumn Banner --->
    <?php if($twoColumnBanner->isTwoColumnBannerFullEnabled): ?>
        <section>
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $twoColumnBanner->banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6">
                            <a href="<?php echo e($item->actionUrl); ?>" target="<?php echo e($item->isNewWindow ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($item->image)); ?>" alt=""></a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php $__empty_1 = true; $__currentLoopData = $trendProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->isActive && isset($item->category)): ?>
                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($item->productId); ?>">
                                <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                <input type="hidden" name="category_id" value="<?php echo e($item->category->id); ?>">
                                <input type="hidden" name="qty" value="1">

                                <div class="product-grid-item">
                                    <div class="single-product-wrapper">
                                        <div class="single-product-item">
                                            <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $item->category->id)); ?>">
                                            <?php if(isset($item->mediumImage)): ?>
                                                <img class="lazy" data-src="<?php echo e(asset($item->mediumImage)); ?>">
                                            <?php else: ?>
                                                <img class="lazy" data-src="https://dummyimage.com/375x375/e5e8ec/e5e8ec&text=CartPro">
                                            <?php endif; ?>
                                            </a>

                                            <!-- product-promo-text -->
                                            <?php echo $__env->make('frontend.includes.product-promo-text',['manage_stock'=>$item->manageStock, 'qty'=>$item->qty, 'in_stock'=>$item->inStock, 'current_date'=>date('Y-m-d') ,'new_to'=>$item->newTo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <!--/ product-promo-text -->

                                            <div class="product-overlay">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickshopTrend_<?php echo e($item->productId); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                <a><span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->productId); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($item->category->id); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo app('translator')->get('file.Add to wishlist'); ?>"></span></a>
                                            </div>
                                        </div>
                                        <div class="product-details">
                                            <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $item->category->id)); ?>">
                                                <?php echo e($item->name); ?>

                                            </a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <ul class="product-rating">
                                                        <?php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  ?>
                                                                    <li><i class="las la-star"></i></li>
                                                        <?php
                                                                }else { ?>
                                                                    <li><i class="lar la-star"></i></li>
                                                        <?php        }
                                                            }
                                                        ?>
                                                    </ul>
                                                    <div class="product-price">
                                                        <?php if($item->specialPrice!=NULL && $item->specialPrice>0 && $item->specialPrice < $item->price): ?>
                                                            <span class="old-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                <?php else: ?>
                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                            <span class="promo-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                <?php else: ?>
                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice  * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="promo-price">
                                                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                    <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                <?php else: ?>
                                                                    <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                <?php endif; ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
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

    <!--QuickShop Trend Modal--->
    <?php $__currentLoopData = $trendProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->isActive && isset($item->category)): ?>
            <!-- Quick Shop Modal starts -->
            <div class="modal fade quickshop" id="quickshopTrend_<?php echo e($item->productId); ?>" tabindex="-1" role="dialog" aria-labelledby="quickshopTrend_<?php echo e($item->productId); ?>" aria-hidden="true">
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
                                            <?php $__currentLoopData = $item->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="slider-for__item ex1">
                                                    <img class="lazy" data-src="<?php echo e(asset($value->image)); ?>" alt="..." />
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <div class="slider-nav-modal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($item->productId); ?>">
                                        <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                        <input type="hidden" name="category_id" value="<?php echo e($item->category->id); ?>">
                                        <input type="hidden" name="qty" value="1">
                                        <input type="hidden" name="value_ids" class="value_ids_products">

                                        <div class="item-details">
                                            <a class="item-category" href=""><?php echo e($category->categoryName); ?></a>
                                            <h3 class="item-name"><?php echo e($item->name); ?></h3>
                                            <div class="d-flex justify-content-between">
                                                <div class="item-brand"><?php echo app('translator')->get('file.Brand'); ?>: <a href=""><?php echo e(isset($item->brand->name) ? $item->brand->name : ''); ?></a></div>
                                                <div class="item-review">
                                                    <ul class="p-0 m-0">
                                                        <?php
                                                            for ($i=1; $i <=5 ; $i++){
                                                                if ($i<= round($item->avgRating)){  ?>
                                                                    <li><i class="las la-star"></i></li>
                                                        <?php
                                                                }else { ?>
                                                                    <li><i class="lar la-star"></i></li>
                                                        <?php        }
                                                            }
                                                        ?>
                                                    </ul>
                                                    <span>( <?php echo e(round($item->avgRating)); ?> )</span>
                                                </div>
                                                <?php if($item->sku): ?>
                                                    <div class="item-sku"><?php echo app('translator')->get('file.SKU'); ?>: <?php echo e($item->sku ?? null); ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <hr>
                                            <?php if($item->specialPrice !=NULL && $item->specialPrice >0 && $item->specialPrice < $item->price): ?>
                                                <div class="item-price">
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice   * $changeCurrencyRate, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>
                                                    <hr>
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <small class="old-price"><del><?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> </del></small>
                                                    <?php else: ?>
                                                        <small class="old-price"><del><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> </del></small>
                                                    <?php endif; ?>
                                                </div>
                                            <?php else: ?>
                                                <div class="item-price">
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                    <?php else: ?>
                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="item-short-description">
                                                <p><?php echo $item->shortDescription; ?></p>
                                            </div>
                                            <hr>
                                            <?php
                                                $attributes = $item->attributes;
                                            ?>
                                            <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="item-variant">
                                                    <span><?php echo e($attribute->name); ?>:</span>
                                                    <ul class="product-variant size-opt p-0 mt-1">
                                                        <?php $__currentLoopData = $attribute->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li class="attribute_value"
                                                                data-attribute_name="<?php echo e($value->name); ?>"
                                                                id="valueId_<?php echo e($value->attributeValueId); ?>"
                                                                data-value_id="<?php echo e($value->attributeValueId); ?>"
                                                                data-value_name="<?php echo e($value->name); ?>">
                                                                <span><?php echo e($value->name); ?></span>
                                                            </li>
                                                            <input type="hidden" name="value_id[]" value="<?php echo e($value->attributeValueId); ?>">
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item-options">
                                                <div class="input-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-left-minus decrementProductQty-<?php echo e($item->productId); ?>">
                                                            <span class="ti-minus"></span>
                                                        </button>
                                                    </span>
                                                    <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                                        <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->productId); ?>" value="1" min="1" max="0">
                                                    <?php else: ?>
                                                        <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->productId); ?>" value="1" min="1" max="<?php echo e($item->qty); ?>">
                                                    <?php endif; ?>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="quantity-right-plus incrementProductQty-<?php echo e($item->productId); ?>">
                                                            <span class="ti-plus"></span>
                                                        </button>
                                                    </span>
                                                </div>
                                                <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                                    <button disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                                <?php else: ?>
                                                    <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                                <?php endif; ?>
                                                <a><div class="button button-icon style4 sm <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($item->productId); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($item->category->id); ?>" data-qty="1"><p><span><i class="ti-heart"></i> </span><?php echo app('translator')->get('file.Add to Wishlist'); ?></p></div></a>
                                            </div>

                                            <hr>
                                            <div class="item-share mt-3" id="social-links"><span><?php echo app('translator')->get('file.Share'); ?></span>
                                                <ul class="footer-social d-inline pad-left-15">
                                                    <li><a href="<?php echo e($socialShare['facebook']); ?>"><i class="ti-facebook"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['twitter']); ?>"><i class="ti-twitter"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['linkedin']); ?>"><i class="ti-linkedin"></i></a></li>
                                                    <li><a href="<?php echo e($socialShare['reddit']); ?>"><i class="ti-reddit"></i></a></li>
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
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--Quick shop modal ends-->
<!-- Trending ends-->



<!-- One Coloumn Banner --->
<?php if($oneColumnBanner->isOneColumnBannerEnabled): ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo e($oneColumnBanner->actionUrl); ?>" target="<?php echo e($oneColumnBanner->isNewWindow ? '__blank' : ''); ?>"><img class="lazy" data-src="<?php echo e(asset($oneColumnBanner->image)); ?>" alt=""></a>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<?php $__env->stopSection(); ?>






<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
        //for Product_Tab_1
        $('.attribute_value_productTab1').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_productTab1').val(values);
        });

        //for FlashSale
        $('.attribute_value_flashSale').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_flashSale').val(values);
        });

        //for Trending
        $('.attribute_value_trending').on("click", function(e) {
            e.preventDefault();
            $(this).addClass('selected');

            var selectedVal = $(this).data('value_id');
            values.push(selectedVal);
            $('.value_ids_trending').val(values);
        });


        $('#star_1').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(1);

            $('#star_2').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_2').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(2);
            $('#star_3').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_3').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(3);
            $('#star_4').removeClass('las la-star').addClass('las la-star-outline');
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_4').on('click', function() {
            $('#star_1').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_2').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_3').removeClass('las la-star-outline').addClass('las la-star');
            $('#star_4').removeClass('las la-star-outline').addClass('las la-star');
            $('#rating').val(4);
            $('#star_5').removeClass('las la-star').addClass('las la-star-outline');
        })
        $('#star_5').on('click', function() {
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