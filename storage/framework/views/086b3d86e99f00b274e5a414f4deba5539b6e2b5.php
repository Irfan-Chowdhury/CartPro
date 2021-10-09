<?php $__env->startSection('frontend_content'); ?>

    <!--Product details section starts-->
    <section class="product-details-section">
        <div class="container">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li><a href="home.html">Shop</a></li>
                    <li><a href="home.html">Women</a></li>
                    <li class="active">White Striped top</li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-6 mar-bot-30">
                    <div class="slider-wrapper">
                        <div class="slider-nav">


                            <?php $__empty_1 = true; $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-nav__item">
                                    <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                        <div class="slider-for">
                            <?php $__empty_1 = true; $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-for__item ex1">
                                    <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item-details">
                                <a class="item-category" href="<?php echo e($category->slug); ?>"><?php echo e($category->catTranslation->category_name ?? $category->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                                <h3 class="item-name"><?php echo e($product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? NULL); ?></h3>
                                <div class="d-flex justify-content-between">
                                    <div class="item-brand">Brand: <a href=""><?php echo e($product->brandTranslation->brand_name ?? $product->brandTranslationEnglish->brand_name ?? null); ?></a></div>
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
                                <?php if($product->special_price!=NULL && $product->special_price>0 && $product->special_price<$product->price): ?>
                                    <div class="item-price">
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                        <?php endif; ?>
                                    </div>
                                    <div class="old-price">
                                        <del>
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                            <?php else: ?>
                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                            <?php endif; ?>
                                        </del>
                                    </div>
                                <?php else: ?>
                                    <div class="item-price">
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <hr>
                                <div class="item-short-description">
                                    <p><?php echo e(strip_tags($product->productTranslation->short_description ?? $product->productTranslationDefaultEnglish->short_description ?? NULL)); ?></p>
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
                                
                                <?php $__empty_1 = true; $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="item-variant">
                                        <span><?php echo e($item); ?>:</span>
                                        <ul class="product-variant size-opt p-0 mt-1">
                                            <?php $__empty_2 = true; $__currentLoopData = $product->productAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <?php if($value->attribute_id == $key): ?>
                                                    <li><span><?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?></span></li>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>

                                <div class="item-options">
                                    <form class="mb-3" id="productAddToCartSingle" action="<?php echo e(route('product.add_to_cart')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="product_slug" value="<?php echo e($product->slug); ?>">
                                        <input type="hidden" name="category_id" value="<?php echo e($category->id ?? null); ?>">

                                        <div class="input-qty">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-left-minus">
                                                    <span class="ti-minus"></span>
                                                </button>
                                            </span>
                                            <input type="number" name="qty" class="input-number" value="<?php echo e($product_cart_qty ?? 1); ?>" min="1">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus">
                                                    <span class="ti-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
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
    </section>
    <!--Product details section ends-->
    <!--content wrapper section starts-->
    <section class="content-wrapper-section no-pad-top no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tabs style2">
                    <ul class="nav nav-tabs mar-top-30 product-details-tab" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_one" data-bs-toggle="tab" href="#size" role="tab" aria-selected="false">Size Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="branding-tab_two" data-bs-toggle="tab" href="#shipping" role="tab" aria-selected="false">Shipping</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="graphic-design-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-selected="false">Reviews <span class="text-grey"> (3)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content product-description" id="lionTabContent">
            <div class="container">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="desc-intro">
                        <?php echo $product->productTranslation->description ?? $product->productTranslationDefaultEnglish->description ?? null; ?>

                    </div>
                </div>
                <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="graphic-design-tab">
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Size</th>
                                    <th class="cart-product-name">Bust</th>
                                    <th class="plantmore-product-price">Waist</th>
                                    <th class="plantmore-product-quantity">Hips</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">XL</a></td>
                                    <td class="plantmore-product-name"><a href="#">41-42</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">33-35</span></td>
                                    <td class="plantmore-product-quantity">
                                        43-45
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="shipping" role="tabpanel">
                    <p class="mar-bot-30">*Estimated Shipping times throughout North America </p>
                    <div class="table-content table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Shipping Type</th>
                                    <th class="cart-product-name">Cost</th>
                                    <th class="plantmore-product-price">Estimated Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                                <tr>
                                    <td class="plantmore-product-thumbnail"><a href="#">Standard Ground</a></td>
                                    <td class="plantmore-product-name"><a href="#">Free</a>
                                    </td>
                                    <td class="plantmore-product-price"><span class="amount">Product will delivery in 3-5 business days</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <p class="mar-top-30">Exclude all mexico and International orders.Please see contact page for International policies.</p>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="h5">3 reviews for White Striped top</h3>
                            <div class="item-reviews">
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_1.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_2.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                                <div class="row mar-tb-30">
                                    <div class="col-md-2">
                                        <div class="reviewer-img">
                                            <img src="images/clients/client_3.jpg" alt="...">
                                        </div>
                                    </div>
                                    <div class="col-md-10">
                                        <ul class="product-rating">
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star"></i></li>
                                            <li><i class="ion-android-star-half"></i></li>
                                        </ul>
                                        <h5 class="reviewer-text">Jhon Conor- <span> Dec 25th,2018</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae ipsum perspiciatis, impedit laboriosam commodi in excepturi porro aut tempore facilis.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="comment-respond">
                                <h3 class="h5">Write your Review</h3>
                                <span>Your email address will not be published. Required fields are marked with *</span>

                                <form action="#" method="post" class="row contact-form mar-top-20">
                                    <div class="col-sm-12">
                                        <label >Your Rating</label>
                                        <ul class="product-rating">
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                            <li><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 text-area">
                                        <textarea id="comment" class="form-control" placeholder="Your Review....*" name="comment" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="author" class="form-control" placeholder="Name*" name="author" type="text" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="subject" class="form-control" placeholder="Email*" name="email" type="email" required>
                                    </div>

                                    <div class="col-sm-12 mar-top-20">
                                        <button class="button style1" name="submit" type="submit" id="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="container text-center mar-top-20">
        <div class="item-categories"><span>Categories:</span> <a href="#">Men</a>, <a href="#">Jacket</a> ,<a href="#">Leather</a></div>
        <div class="item-tags"><span>Tags:</span> <a href="#">Men’s Clothing</a>, <a href="#">Clothing</a>, <a href="#">Fashion</a></div>
    </div>
    <!--content wrapper ends-->
    <!--Product area starts-->
    <section class="product-tab-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title style1 mar-bot-30">
                        <h3>Related Products</h3>
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
                                        <img src="images/products/product-11.jpg" alt="...">
                                        <div class="product-promo-text style3">
                                            <p>Sold</p>
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <img class="product-img" src="images/products/product-13.jpg" alt="...">
                                        <img class="product-img-hover" src="images/products/product-14.jpg" alt="...">
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
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                            <img src="images/products/product-12.jpg" alt="...">
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <img src="images/products/product-8.gif" alt="...">
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                            <img src="images/products/product-5.jpg" alt="...">
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <img class="product-img" src="images/products/product-9.jpg" alt="...">
                                        <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                        <div class="product-promo-text style1">
                                            <p>Hot</p>
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                            <img src="images/products/product-17.jpg" alt="...">
                                        </div>
                                        <div class="product-overlay">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <img src="images/products/product-11.jpg" alt="...">
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
                                        <img src="images/products/product-4.jpg" alt="...">
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
                                        <img src="images/products/product-8.gif" alt="...">
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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
                                        <img src="images/products/product-15.jpg" alt="...">
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
                                        <img class="product-img" src="images/products/product-9.jpg" alt="...">
                                        <img class="product-img-hover" src="images/products/product-10.jpg" alt="...">
                                        <div class="product-promo-text style1">
                                            <p>Hot</p>
                                        </div>
                                        <div class="product-overlay style1">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal">    <span class="ti-zoom-in" data-toggle="tooltip" data-placement="right" title="quick view"></span>
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

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/frontend/pages/product_details.blade.php ENDPATH**/ ?>