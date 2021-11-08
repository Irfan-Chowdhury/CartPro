<?php $__env->startSection('frontend_content'); ?>
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="#">Home</a></li>
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
                                    
                                        <?php $__empty_1 = true; $__currentLoopData = $category->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="has-sub"><a href="<?php echo e(route('cartpro.category_wise_products',$item->slug)); ?>"><?php echo e($item->catTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?></a> <span class="count">(<?php echo e(count($item->child)); ?>)</span>
                                                <?php if($item->child): ?>
                                                    <?php $__empty_2 = true; $__currentLoopData = $item->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                        <ul>
                                                            <li><a href="<?php echo e(route('cartpro.category_wise_products',$value->slug)); ?>"><?php echo e($value->catTranslation->category_name ?? $value->categoryTranslationDefaultEnglish->category_name ?? null); ?><span class="count">(<?php echo e(count($value->child)); ?>)</span></a></li>
                                                        </ul>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    

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

                                <form id="priceRange" action="<?php echo e(route('cartpro.category.price_range')); ?>" method="get">
                                    <div id="slider-range" class="price-range mar-bot-20"></div>
                                    <div class="d-flex justify-content-center">
                                        <div><input type="text" id="amount" name="amount"></div>
                                        <div><input type="hidden" name="category_slug" value="<?php echo e($category->slug ?? null); ?>"></div>
                                        <div><button type="submit" class="mt-2 btn btn-success"><?php echo e(__('Filter')); ?></button></div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Filter By Size -->
                        
                        <!--sidebar-categories-box end-->
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="page-title h5 uppercase mb-0"><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></h1>
                        <?php if(!isset($products)): ?>
                            <span class="d-none d-md-block"><strong class="theme-color"><?php echo e($category->categoryProduct->count() ?? 0); ?></strong> products found</span>
                        <?php else: ?>
                            <span class="d-none d-md-block"><strong class="theme-color"><?php echo e(count($products)); ?></strong> products found</span>
                        <?php endif; ?>
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
                            Show
                            </button>
                            <input type="hidden" id="categorySlug" value="<?php echo e($category->slug); ?>">
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item active limitCategoryProductShow" data-id="2" href="#" >2</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="3" href="#">3</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="4" href="#">4</a></li>
                                <li><a class="dropdown-item limitCategoryProductShow" data-id="5" href="#">5</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                
                                
                                <li><a class="dropdown-item sortBy" data-condition="latest" data-category_slug="<?php echo e($category->slug); ?>">Latest</a></li>
                                <li><a class="dropdown-item sortBy" data-condition="low_to_high" data-category_slug="<?php echo e($category->slug); ?>">Price: Low to High</a></li>
                                <li><a class="dropdown-item sortBy" data-condition="high_to_low" data-category_slug="<?php echo e($category->slug); ?>">Price: High to Low</a></li>
                            </ul>
                        </div>
                        <!-- shop-item-filter-list end -->
                    </div>


                    <!--Shop product wrapper starts-->
                    <div class="shop-products-wrapper">
                        <div class="product-grid categoryWiseProductField">
                            <?php if(!isset($products)): ?>
                                <?php $__empty_1 = true; $__currentLoopData = $category->categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                            <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                            <input type="hidden" name="category_id" value="<?php echo e($category->id ?? null); ?>">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="product-grid-item">
                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <?php if($item->productBaseImage!=NULL): ?>
                                                            <img src="<?php echo e(asset('public/'.$item->productBaseImage->image)); ?>" alt="...">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset(url('public/images/empty.jpg'))); ?>" alt="...">
                                                        <?php endif; ?>

                                                        <?php if(($item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                            <div class="product-promo-text style1">
                                                                <span>Stock Out</span>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->product->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            </a>
                                                            <a>
                                                                <span class="ti-heart add_to_wishlist" data-product_id="<?php echo e($item->product_id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($category->id  ?? null); ?>" data-qty="1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="<?php echo e(url('product/'.$item->product->slug.'/'. $category->id)); ?>">
                                                            <?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?>

                                                        </a>
                                                        <div class="product-short-description">
                                                            <?php echo $item->productTranslation->description ?? $item->productTranslationDefaultEnglish->description ?? null; ?>

                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->product->avg_rating)){  ?>
                                                                                        <li><i class="ion-android-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="ion-android-star-outline"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price < $item->product->price): ?>
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <span class="promo-price"><?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                            <span class="old-price"><?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                        <?php else: ?>
                                                                            <span class="promo-price"><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> </span>
                                                                            <span class="old-price"> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <span class="price"><?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                        <?php else: ?>
                                                                            <span class="price"><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-options">
                                                        <div class="product-price mt-2">
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
                                                                <span class="price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                            <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i><?php echo e(__('Add to cart')); ?></button>

                                                            
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
                                            <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                            <input type="hidden" name="category_id" value="<?php echo e($category->id ?? null); ?>">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="product-grid-item">
                                                <div class="single-product-wrapper">
                                                    <div class="single-product-item">
                                                        <?php if($item->image!=NULL): ?>
                                                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" alt="...">
                                                        <?php else: ?>
                                                            <img src="<?php echo e(asset(url('public/images/empty.jpg'))); ?>" alt="...">
                                                        <?php endif; ?>

                                                        <?php if(($item->qty==0) || ($item->in_stock==0)): ?>
                                                            <div class="product-promo-text style1">
                                                                <span>Stock Out</span>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="product-overlay">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#<?php echo e($item->slug ?? null); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span>
                                                            </a>
                                                            <a href="wishlist.html">
                                                                <span class="ti-heart" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to wishlist"></span>
                                                            </a>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="product-details">
                                                        <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $category->id)); ?>">
                                                            <?php echo e($item->product_name ?? null); ?>

                                                        </a>
                                                        <div class="product-short-description">
                                                            <?php echo $item->description ?? null; ?>

                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div>
                                                                <div class="rating-summary">
                                                                    <div class="rating-result" title="60%">
                                                                        <ul class="product-rating">
                                                                            <?php
                                                                                for ($i=1; $i <=5 ; $i++){
                                                                                    if ($i<= round($item->avg_rating)){  ?>
                                                                                        <li><i class="ion-android-star"></i></li>
                                                                            <?php
                                                                                    }else { ?>
                                                                                        <li><i class="ion-android-star-outline"></i></li>
                                                                            <?php        }
                                                                                }
                                                                            ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="product-price">
                                                                    <?php if($item->special_price!=NULL && $item->special_price>0 && $item->special_price < $item->price): ?>
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <span class="promo-price"><?php echo e(number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                            <span class="old-price"><?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                        <?php else: ?>
                                                                            <span class="promo-price"><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '')); ?> </span>
                                                                            <span class="old-price"> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <span class="price"><?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?></span>
                                                                        <?php else: ?>
                                                                            <span class="price"><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <button class="button style2 sm" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="las la-cart-plus"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-options">
                                                        <div class="product-price mt-2">
                                                            <?php if($item->special_price!=NULL && $item->special_price>0 && $item->special_price<$item->price): ?>
                                                                <span class="promo-price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                                <span class="old-price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php else: ?>
                                                                <span class="price">
                                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                        <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                                    <?php else: ?>
                                                                        <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                    <?php endif; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                            <button class="button style1 sm d-flex align-items-center justify-content-center mt-3 mb-3" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Add to cart"><i class="las la-cart-plus"></i><?php echo e(__('Add to cart')); ?></button>

                                                            
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page Ends-->



    <!-- Quick Shop Modal starts -->
    <?php $__empty_1 = true; $__currentLoopData = $category->categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="modal fade quickshop" id="<?php echo e($item->product->slug ?? null); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($item->product->slug ?? null); ?>" aria-hidden="true">
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
                                        <?php $__empty_2 = true; $__currentLoopData = $item->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                            <div class="slider-for__item ex1">
                                                <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="slider-nav-modal">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="item-details">
                                    <h3 class="item-name"><?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand">Brand: <a href=""></a></div>
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
                                                <?php
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<= round($item->product->avg_rating)){  ?>
                                                            <li><i class="ion-android-star"></i></li>
                                                <?php
                                                        }else { ?>
                                                            <li><i class="ion-android-star-outline"></i></li>
                                                <?php        }
                                                    }
                                                ?>
                                            </ul>
                                            <span>( 04 )</span>
                                        </div>
                                        <div class="item-sku">SKU: <?php echo e($item->product->sku ?? null); ?></div>
                                    </div>
                                    <hr>
                                    <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                        <div class="item-price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                            <?php else: ?>
                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                            <?php endif; ?>
                                            <hr>
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <small class="old-price"><del><?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> </del></small>
                                            <?php else: ?>
                                                <small class="old-price"><del><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> </del></small>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="item-price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                            <?php else: ?>
                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="item-short-description">
                                        <p><?php echo $item->productTranslation->description ?? $item->productTranslationDefaultEnglish->description ?? null; ?></p>
                                    </div>
                                    <hr>
                                    
                                    <?php
                                    $attribute = [];
                                        if ($item->productAttributeValues!=[]) {
                                            foreach ($item->productAttributeValues as $value) {
                                            $attribute[$value->attribute_id]= $value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null;
                                            }
                                        }
                                    ?>
                                    <?php $__empty_2 = true; $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                        <div class="item-variant">
                                            <span><?php echo e($value); ?>:</span>
                                            <input type="hidden" name="attribute_name[]" class="attribute_name" value="<?php echo e($value); ?>">
                                            <ul class="product-variant size-opt p-0 mt-1">
                                                <?php $__empty_3 = true; $__currentLoopData = $item->productAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_3 = false; ?>
                                                    <?php if($value->attribute_id == $key): ?>
                                                        <li class="attribute_value_productTab1" data-attribute_name="<?php echo e($value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null); ?>" data-value_id="<?php echo e($value->attribute_value_id); ?>" data-value_name="<?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?>"><span><?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?></span></li>
                                                        <input type="hidden" name="value_id[]" value="<?php echo e($value->attribute_value_id); ?>">
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_3): ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                    <?php endif; ?>
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
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
    <!--Quick shop modal ends-->
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

        //Limit Category Product Show
        $(document).on('click','.limitCategoryProductShow',function(event) {
            event.preventDefault();
            var limit_data = $(this).data('id');
            var category_slug = $('#categorySlug').val();
            $.ajax({
                url: "<?php echo e(route('cartpro.limit_category_product_show')); ?>",
                type: "GET",
                data: {limit_data:limit_data, category_slug:category_slug},
                success: function (data) {
                    console.log(data);
                    $('.categoryWiseProductField').html(data);
                }
            })
        });

        $('.sortBy').on('click',function(e){
            e.preventDefault();
            var condition = $(this).data('condition');
            var category_slug = $(this).data('category_slug');
            $.ajax({
                url: "<?php echo e(route('cartpro.category_wise_products_condition')); ?>",
                type: "GET",
                data: {condition:condition, category_slug:category_slug},
                success: function (data) {
                    console.log(data);
                    $('.categoryWiseProductField').empty();
                    $('.categoryWiseProductField').html(data);
                }
            })
        });

        $("#priceRange" ).on('click',function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: "GET",
                url: "<?php echo e(route('cartpro.category.price_range')); ?>",
                data: form.serialize(),
                success: function(data){
                    console.log(data);
                    $('.categoryWiseProductField').empty();
                    $('.categoryWiseProductField').html(data);
                }
            });
        });

        $(document).on('submit','.addToCart',function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo e(route('product.add_to_cart')); ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    if (data.type=='success') {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1000,
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

                        $('.cart_count').text(data.cart_count);
                        $('.cart_total').text(data.cart_total);
                        $('.total_price').text(data.cart_total);

                        var html = '';
                        var cart_content = data.cart_content;
                        $.each( cart_content, function( key, value ) {
                            var image = 'public/'+value.options.image;
                            html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                    '<img src="'+image+'">'+
                                    '</a></div><div class="shp__pro__details"><h2>'+
                                    '<a href="#">'+value.name+'</a></h2>'+
                                    '<span>'+value.qty+'</span> x <span class="shp__price"> $'+value.price+'</span>'+
                                    '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="ion-ios-close-empty"></i></a></div></div>';
                        });
                        $('.cart_list').html(html);

                        if (data.wishlist_id>0) {
                            $('#wishlist_'+data.wishlist_id).remove();
                        }
                    }
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/pages/category_wise_products.blade.php ENDPATH**/ ?>