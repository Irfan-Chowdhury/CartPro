
<?php $__env->startSection('content'); ?>    
    <!--Home Banner starts -->
    <div class="banner-area v3">
        <div class="container">
            <div class="single-banner-item style2">
                <div class="row">
                    <div class="col-md-12">
                        <div id="hero-slider" class="carousel slide banner-tab-slider" data-interval="false" data-ride="carousel">
                            <div class="carousel-inner">
                                
                                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($key==0): ?>
                                        <div class="carousel-item active single-carousel-item" style="background-image: url('<?php echo e(asset('public'.$item->image)); ?>')"></div>
                                    <?php else: ?>
                                        <div class="carousel-item single-carousel-item" style="background-image: url('<?php echo e(asset('public'.$item->image)); ?>')"></div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <a class="banner-carousel-prev" href="#hero-slider" role="button" data-slide="prev">
                                <span aria-hidden="true"><i class="ti-angle-left"></i></span>
                            </a>
                            <a class="banner-carousel-next" href="#hero-slider" role="button" data-slide="next">
                                <span aria-hidden="true"><i class="ti-angle-right"></i></span>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="cat-img style3 mar-bot-30">
                            <img src="<?php echo e(asset('public/frontend/images/category/cat-20-560x320.jpg')); ?>" alt="...">
                            <div class="middle-v t-right style2">
                                <h3>Women</h3>
                                <a href="shop-fullwidth.html" class="link-hov style1">Explore</a>
                            </div>
                        </div>
                        <div class="cat-img style3">
                            <img src="<?php echo e(asset('public/frontend/images/category/cat-6-560x320.jpg')); ?>" alt="...">
                            <div class="middle-v t-left">
                                <h3>Men</h3>
                                <a href="shop-fullwidth.html" class="link-hov style1">Explore</a>
                            </div>
                        </div>
                    </div> -->
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
                        <span>All over USA!</span>
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
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <div class="single-product-wrapper style2">
                                    <div class="single-product-item">
                                        <?php
                                            $product_image = explode(',',$product->image);
                                            $product_image = $product_image[0];
                                        ?>
                                        <?php if($product_image): ?>
                                        <img src="<?php echo e(asset('public/images/products')); ?>/<?php echo e($product->sku); ?>/medium/<?php echo e($product_image); ?>" alt="<?php echo e($product->product_name); ?>">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('public/images/products')); ?>/elevani.jpg" alt="<?php echo e($product->product_name); ?>">
                                        <?php endif; ?>
                                        <div class="product-overlay">
                                            <a class="view-details" data-id="<?php echo e($product->id); ?>" data-name="<?php echo e($product->product_name); ?>" data-price="<?php echo e($product->price); ?>" data-promotion-price="<?php echo e($product->old_price); ?>" data-details="<?php echo e($product->short_description); ?>" data-qty="<?php echo e($product->qty); ?>" data-image="<?php echo e($product->image); ?>" data-toggle="modal" data-target="#detailsModal"> <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
                                            </a>
                                            <a href="wishlist.html">
                                                <span class="ti-heart" data-toggle="tooltip" data-placement="right" title="Add to wishlist"></span>
                                            </a>
                                            <a href="<?php echo e(url('/products/')); ?>/<?php echo e($product->slug); ?>/<?php echo e($product->sku); ?>" class="button style1 sm">View Details</a>
                                        </div>
                                    </div>
                                    <div class="product-details">
                                        <div class="product-details--1st">
                                            <a class="product-name" href="<?php echo e(url('/products/')); ?>/<?php echo e($product->slug); ?>/<?php echo e($product->sku); ?>">
                                                <?php echo e($product->product_name); ?>

                                            </a>
                                            <!-- <div class="rating-summary">
                                                <div class="rating-result" title="60%">
                                                    <ul class="product-rating">
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                        <li><i class="ion-android-star-half"></i></li>
                                                    </ul>
                                                </div>
                                            </div> -->
                                            <div class="product-price">
                                                <span class="price">$ <?php echo e($product->price); ?></span>
                                                <?php if($product->old_price): ?>
                                                <span class="old-price">$ <?php echo e($product->old_price); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cartpro\resources\views/pages/index.blade.php ENDPATH**/ ?>