<?php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}

if (Session::has('currency_symbol')){
    $CHANGE_CURRENCY_SYMBOL = Session::get('currency_symbol');
}else{
    $CHANGE_CURRENCY_SYMBOL = env('DEFAULT_CURRENCY_SYMBOL');
    Session::put('currency_symbol',$CHANGE_CURRENCY_SYMBOL);
}
?>



<?php $__env->startSection('meta_info'); ?>
    <meta product="og:site_name" content="CartPro">
    <meta product="og:title" content="<?php echo e($product->basic->meta_title ?? null); ?>">
    <meta product="og:description" content="<?php echo e($product->basic->meta_description ?? null); ?>">
    <meta product="og:url" content="<?php echo e(url('product/'.$product->basic->slug.'/'. $category->id)); ?>">
    <meta product="og:type" content="Product">

    <?php if($product->imageCollection->baseImage): ?>
        <meta product="og:image" content="<?php echo e(asset($product->imageCollection->baseImage->image)); ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php
    $product_name = $product->basic->name;
?>
<?php $__env->startSection('title',$product_name); ?>


<?php $__env->startSection('frontend_content'); ?>

    <!--Product details section starts-->
    <section class="product-details-section">
        <div class="container">
            <div class="breadcrumb-section">
                <ul>
                    <li><a href="<?php echo e(route('cartpro.home')); ?>"><?php echo app('translator')->get('file.Home'); ?></a></li>
                    <li class="active"><a href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><?php echo e($category->name); ?></a> </li>
                    <li><?php echo e($product->basic->name); ?></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-6 mar-bot-30">
                    <div class="slider-wrapper">
                        <div class="slider-nav">
                             <?php if($product->imageCollection->baseImage): ?>
                                <div class="slider-nav__item">
                                    <?php if(isset($product->imageCollection->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($product->imageCollection->baseImage->image))): ?>
                                        <img src="<?php echo e(asset($product->imageCollection->baseImage->image)); ?>">
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $product->imageCollection->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-nav__item">
                                    <?php if(isset($value->image_small) && Illuminate\Support\Facades\File::exists(public_path($value->image_small))): ?>
                                        <img src="<?php echo e(asset($value->image_small)); ?>">
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/221.6x221.6/e5e8ec/e5e8ec&text=CartPro">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                        <div class="slider-for">
                            <?php if($product->imageCollection->baseImage): ?>
                                <div class="slider-for__item ex1">
                                    <?php if(isset($product->imageCollection->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($product->imageCollection->baseImage->image))): ?>
                                        <img class="lazy" data-src="<?php echo e(asset($product->imageCollection->baseImage->image)); ?>">
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/518x518/e5e8ec/e5e8ec&text=CartPro">
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $product->imageCollection->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="slider-for__item ex1">
                                    <?php if(isset($value->image) && Illuminate\Support\Facades\File::exists(public_path($value->image))): ?>
                                        <img class="lazy" data-src="<?php echo e(asset($value->image)); ?>">
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/518x518/e5e8ec/e5e8ec&text=CartPro">
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="mb-3" id="productAddToCartSingle" action="<?php echo e(route('product.add_to_cart')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="product_id" value="<?php echo e($product->basic->id); ?>">
                        <input type="hidden" name="product_slug" value="<?php echo e($product->basic->slug); ?>">
                        <input type="hidden" name="category_id" value="<?php echo e($category->id); ?>">
                        <input type="hidden" name="value_ids" class="value_ids" id="value_ids">
                        <input type="hidden" name="value_names" class="value_names" id="value_names">
                        <input type="hidden" name="attribute_names" class="attribute_names" id="attribute_names">

                        


                        <div class="item-details">
                            <a class="item-category" href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><?php echo e($category->name); ?></a>
                            <h3 class="item-name"><?php echo e($product->basic->name); ?></h3>
                            <div class="d-flex justify-content-between">
                                <?php if(isset($product->brand->name)): ?>
                                    <div class="item-brand"><?php echo app('translator')->get('file.Brand'); ?>: <a href=""><?php echo e($product->brand->name); ?></a></div>
                                <?php endif; ?>
                                <div class="item-review">
                                    <ul class="p-0 m-0">
                                        <?php
                                            for ($i=1; $i <=5 ; $i++){
                                                if ($i<= round($product->basic->avg_rating)){  ?>
                                                    <li><i class="las la-star"></i></li>
                                        <?php
                                                }else { ?>
                                                    <li><i class="lar la-star"></i></li>
                                        <?php        }
                                            }
                                        ?>
                                    </ul>
                                    <span>( <?php echo app('translator')->get('file.Reviews'); ?>: <?php echo e(count($reviews)); ?> )</span>
                                </div>
                                <?php if($product->basic->sku): ?>
                                    <div class="item-sku"><?php echo app('translator')->get('file.SKU'); ?> : <?php echo e($product->basic->sku); ?></div>
                                <?php endif; ?>
                            </div>
                            <hr>

                            <?php if($product->basic->special_price!=NULL && $product->basic->special_price>0 && $product->basic->special_price < $product->basic->price): ?>
                                <div class="item-price">
                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                        <?php echo e(number_format((float)$product->basic->special_price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$product->basic->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                    <?php endif; ?>
                                </div>
                                <div class="old-price">
                                    <del>
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <?php echo e(number_format((float)$product->basic->price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php else: ?>
                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$product->basic->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                        <?php endif; ?>
                                    </del>
                                </div>
                            <?php else: ?>
                                <div class="item-price">
                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                        <?php echo e(number_format((float)$product->basic->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$product->basic->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>


                            <?php if(isset($product->basic->short_description)): ?>
                                <hr>
                                <div class="item-short-description">
                                    <p><?php echo e(strip_tags($product->basic->short_description)); ?></p>
                                </div>
                            <?php endif; ?>

                            <hr>
                            <?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="item-variant">
                                    <span><?php echo e($item->name); ?>:</span>
                                    <ul class="product-variant size-opt p-0 mt-1">
                                        <?php $__empty_2 = true; $__currentLoopData = $item->attributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <li class="attribute_value"
                                                    data-attribute_name="<?php echo e($value->name); ?>"
                                                    id="valueId_<?php echo e($value->id); ?>"
                                                    data-value_id="<?php echo e($value->id); ?>"
                                                    data-value_name="<?php echo e($value->name); ?>">
                                                    <span><?php echo e($value->name); ?></span>
                                            </li>
                                                <input type="hidden" name="value_id[]" value="<?php echo e($value->id); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>

                            <div class="item-options">
                                    <div class="input-qty">
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-left-minus">
                                                <span class="ti-minus"></span>
                                            </button>
                                        </span>
                                        <?php if(isset($flash_sale_product)): ?> <!--New Added-->
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="<?php echo e($flash_sale_product->qty); ?>">
                                        <?php elseif(($product->basic->manage_stock==1 && $product->basic->qty==0) || ($product->basic->in_stock==0)): ?>
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="0">
                                        <?php else: ?>
                                            <input type="number" name="qty" class="input-number" value="1" min="1" max="<?php echo e($product->basic->qty); ?>">
                                        <?php endif; ?>
                                        <span class="input-group-btn">
                                            <button type="button" class="quantity-right-plus">
                                                <span class="ti-plus"></span>
                                            </button>
                                        </span>
                                    </div>

                                    <?php if(($product->basic->manage_stock==1 && $product->basic->qty==0) || ($product->basic->in_stock==0)): ?>
                                        <button disabled data-bs-toggle="tooltip" data-bs-placement="top" title="Out of Stock" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to cart'); ?></span></span></button>
                                    <?php else: ?>
                                        <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to cart'); ?></span></span></button>
                                    <?php endif; ?>
                                        <a><div class="button button-icon style4 sm <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($product->basic->id); ?>" data-product_slug="<?php echo e($product->basic->slug); ?>" data-category_id="<?php echo e($category->id ?? null); ?>" data-qty="1"><span><i class="ti-heart"></i> <span><?php echo app('translator')->get('file.Add to wishlist'); ?></span></span></div></a>
                            </div>
                            <hr>
                            <div class="item-share mt-3" id="social-links"><span><?php echo app('translator')->get('file.Share'); ?></span>
                                <ul class="footer-social d-inline pad-left-15">
                                    <li><a href="<?php echo e($socialShareLinks->facebook); ?>"><i class="ti-facebook"></i></a></li>
                                    <li><a href="<?php echo e($socialShareLinks->twitter); ?>"><i class="ti-twitter"></i></a></li>
                                    <li><a href="<?php echo e($socialShareLinks->linkedin); ?>"><i class="ti-linkedin"></i></a></li>
                                    <li><a href="<?php echo e($socialShareLinks->reddit); ?>"><i class="ti-reddit"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--Product details section ends-->

    <!--content wrapper section starts-->
    <section class="content-wrapper-section pt-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12 tabs style2">
                    <ul class="nav nav-tabs mar-top-30 product-details-tab justify-content-center" id="lionTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-selected="true"><?php echo app('translator')->get('file.Description'); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="graphic-design-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-selected="false"><?php echo app('translator')->get('file.Reviews'); ?> <span class="text-grey"> (<?php echo e(count($reviews)); ?>)</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content product-description" id="lionTabContent">
            <div class="container">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    <div class="desc-intro">
                        <?php echo htmlspecialchars_decode($product->basic->description); ?>

                    </div>
                </div>
                <div class="tab-pane fade" id="comments" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="h5"> <?php echo e(count($reviews)); ?> <?php echo app('translator')->get('file.Reviews'); ?></h3>
                            <div class="item-reviews">

                                <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="row mar-tb-30 mt-3">
                                        <div class="col-md-2">
                                            <div class="reviewer-img">
                                                <?php if($item->image==null): ?>
                                                    <img class="lazy" data-src="<?php echo e(asset('public/images/user_default_image.jpg')); ?>">
                                                <?php else: ?>
                                                    <img class="lazy" data-src="<?php echo e(asset($item->image)); ?>">
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <ul class="product-rating">
                                                <?php
                                                    for ($i=1; $i <=5 ; $i++){
                                                        if ($i<=$item->rating){  ?>
                                                            <li><i class="las la-star"></i></li>
                                                <?php
                                                        }else { ?>
                                                            <li><i class="lar la-star"></i></li>
                                                <?php        }
                                                    }
                                                ?>
                                            </ul>
                                            <h5 class="reviewer-text"><?php echo e($item->name); ?>- <span> <?php echo e($item->created_at); ?></span></h5>
                                            <p><?php echo e($item->comment); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="comment-respond">
                                <h3 class="h5"><?php echo app('translator')->get('file.Write your Review'); ?></h3>
                                <span><?php echo app('translator')->get('file.Your email address will not be published. Required fields are marked with'); ?> *</span>

                                <form action="<?php echo e(route('review.store')); ?>" method="post" class="row contact-form mar-top-20">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->basic->id); ?>">
                                    <input type="hidden" name="rating" id="rating" value="0">

                                    <div class="col-sm-12">
                                        <label ></label>
                                        <ul class="product-rating">
                                            <li><i class="lar la-star" id="star_1"></i></li>
                                            <li><i class="lar la-star" id="star_2"></i></li>
                                            <li><i class="lar la-star" id="star_3"></i></li>
                                            <li><i class="lar la-star" id="star_4"></i></li>
                                            <li><i class="lar la-star" id="star_5"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 text-area">
                                        <textarea id="comment" required <?php if(!$userAndProductExists): ?> readonly <?php endif; ?> class="form-control" placeholder="Your Review....*" name="comment" required></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <input id="author" required <?php if(!$userAndProductExists): ?> readonly <?php endif; ?> class="form-control" placeholder="Name*" name="author" type="text" required <?php if(auth()->guard()->check()): ?> value="<?php echo e(auth()->user()->first_name.' '.auth()->user()->last_name); ?>" <?php endif; ?> >
                                    </div>
                                    <div class="col-md-6">
                                        <input id="subject" required <?php if(!$userAndProductExists): ?> readonly <?php endif; ?> class="form-control" placeholder="Email*" name="email" type="email" <?php if(auth()->guard()->check()): ?> value="<?php echo e(auth()->user()->email); ?>" <?php endif; ?> required>
                                    </div>

                                    <?php if(!$userAndProductExists): ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </symbol>
                                        </svg>
                                        <div class="m-3 alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <?php if(Auth::check()): ?>
                                                <?php echo e(__('file.You have to buy this product first')); ?>

                                            <?php else: ?>
                                                <div>
                                                    <?php echo e(__('file.Please login first and buy this product')); ?>

                                                </div>
                                            <?php endif; ?>


                                        </div>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($item->userId==Auth::user()->id): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                                                    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                                    </symbol>
                                                </svg>
                                                <div class="m-3 alert alert-danger d-flex align-items-center" role="alert">
                                                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                                    <div>
                                                        <?php echo e(__('file.You can review one time')); ?>

                                                    </div>
                                                </div>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>

                                    <div class="col-sm-12 mar-top-20 mt-3">
                                        <button class="button style1" <?php if(!$userAndProductExists): ?>
                                                                        disabled title="Please login first"
                                                                      <?php else: ?>
                                                                        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <?php if($item->userId==Auth::user()->id): ?>
                                                                                disabled title=""
                                                                                <?php break; ?>
                                                                            <?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                      <?php endif; ?>
                                                name="submit" type="submit" id="submit"><?php echo app('translator')->get('file.Submit'); ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Realated Product area starts-->
    <section class="product-tab-section mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title style1 mar-bot-30">
                        <h3><?php echo app('translator')->get('file.Related Products'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-slider-wrapper v1 swiper-container">
                        <div class="swiper-wrapper">
                            <?php $__empty_1 = true; $__currentLoopData = $categoryWiseProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->isActive==1): ?>
                                    <div class="swiper-slide">
                                        <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="product_id" value="<?php echo e($item->productId); ?>">
                                            <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                            <input type="hidden" name="category_id" value="<?php echo e($category->id); ?>">
                                            <input type="hidden" name="qty" value="1">

                                            <div class="single-product-wrapper">
                                                <div class="single-product-item">
                                                    <a href="<?php echo e(url('product/'.$item->slug.'/'. $category->id)); ?>">
                                                        <?php if(isset($item->image)): ?>
                                                            <img class="lazy" data-src="<?php echo e(asset($item->image)); ?>">
                                                        <?php else: ?>
                                                            <img src="https://dummyimage.com/221x221/e5e8ec/e5e8ec&text=CartPro">
                                                        <?php endif; ?>
                                                    </a>



                                                    <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                                        <div class="product-promo-text style1">
                                                            <span>Stock Out</span>
                                                        </div>
                                                    <?php endif; ?>

                                                    <div class="product-overlay">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#id_<?php echo e($item->productId); ?>"> <span class="ti-zoom-in" data-bs-toggle="tooltip" data-bs-placement="top" title="quick view"></span></a>
                                                    </div>

                                                </div>
                                                <div class="product-details">
                                                    <a class="product-category" href="<?php echo e(route('cartpro.category_wise_products',$category->slug)); ?>"><?php echo e($category->name); ?></a>
                                                    <a class="product-name" href="<?php echo e(url('product/'.$item->slug.'/'. $category->id)); ?>">
                                                        <?php echo e($item->name); ?>

                                                    </a>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="rating-summary">
                                                                <div class="rating-result" title="60%">
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
                                                                </div>
                                                            </div>
                                                            <div class="product-price">
                                                                <?php if($item->specialPrice>0): ?>
                                                                    <span class="promo-price">
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <?php echo e(number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        <?php else: ?>
                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                        <?php endif; ?>
                                                                    </span>
                                                                    <span class="old-price">
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        <?php else: ?>
                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                                        <?php endif; ?>
                                                                    </span>
                                                                <?php else: ?>
                                                                    <span class="price">
                                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                                            <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                        <?php else: ?>
                                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="product-navigation">
                    <div class="product-button-next v1"><i class="ti-angle-right"></i></div>
                    <div class="product-button-prev v1"><i class="ti-angle-left"></i></div>
                </div>
            </div>
        </div>
    </section>

    
    <!--Related product area ends-->

    <?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('publlic/js/share.js')); ?>"></script>

    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(".quantity-left-minus").on("click",function(e){
                $(".quantity-right-plus").prop("disabled",false);
            });
            $(".quantity-right-plus").on("click",function(e){
                var inputNumber = $('.input-number').val();
                var maxNumber = $('.input-number').attr('max');
                if (maxNumber==0) {
                    console.log(Number(maxNumber));
                }else{
                    if ((Number(inputNumber)+1) > Number(maxNumber)) {
                        $('.input-number').val(Number(maxNumber)-1);
                        $(this).prop("disabled",true);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Available product is : '+ maxNumber,
                        });
                    }
                }
            });


            $("#productAddToCartSingle").on("submit",function(e){
                e.preventDefault();
                let qty = $("input[name=qty]").val();
                if (qty) {
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
                        title: 'Successfully added on your cart'
                    });
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
                            $('.attribute_value').removeClass('text-primary')
                                                    .removeClass('selected')
                                                    .addClass('deselect');

                            if (data.type=='success') {
                                let amountConvertToCurrency = parseFloat(data.cart_total) * <?php echo e($CHANGE_CURRENCY_RATE); ?>

                                let moneySymbol = "<?php echo ($CHANGE_CURRENCY_SYMBOL!=NULL ? $CHANGE_CURRENCY_SYMBOL : env('DEFAULT_CURRENCY_SYMBOL')) ?>";

                                $('.cart_count').text(data.cart_count);
                                $('.cart_total').text(amountConvertToCurrency.toFixed(2));
                                $('.total_price').text(amountConvertToCurrency.toFixed(2));

                                var html = '';
                                var cart_content = data.cart_content;
                                $.each(cart_content, function( key, value ) {
                                    let singleProductCurrency = parseFloat(value.price) * <?php echo e($CHANGE_CURRENCY_RATE); ?>;

                                    // For Attribute
                                    if (value.options.attributes) {
                                        var data = value.options.attributes;
                                        var attributes = [];
                                        for (var i = 0; i < data.name.length; i++) {
                                            attributes.push({
                                                name: data.name[i],
                                                value: data.value[i]
                                            });
                                        }
                                    }
                                    var image = "<?php echo e(url('/')); ?>/"+'public'+value.options.image;
                                    html += '<div id="'+value.rowId+'" class="shp__single__product"><div class="shp__pro__thumb"><a href="#">'+
                                                '<img src="'+image+'">'+
                                                '</a></div><div class="shp__pro__details"><h2>'+
                                                '<a href="#">'+value.name+'</a></h2>';
                                    // For Attribute
                                    if (value.options.attributes) {
                                        for (var i = 0; i < attributes.length; i++) {
                                        var attribute = attributes[i];
                                            html += "<div class='row'><span>" + attribute.name + " :" + attribute.value + "</span></div>";
                                        }
                                    }
                                    html += '<span>'+value.qty+'</span> x <span class="shp__price">'+ moneySymbol +' '+singleProductCurrency.toFixed(2)+'</span>'+
                                            '</div><div class="remove__btn"><a href="#" class="remove_cart" data-id="'+value.rowId+'" title="Remove this item"><i class="las la-times"></i></a></div></div>';
                                });
                                $('.cart_list').html(html);

                                if (data.wishlist_id>0) {
                                    $('#wishlist_'+data.wishlist_id).remove();
                                }
                            }
                            else if(data.type=='quantity_limit'){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Available product is : '+data.product_quantity
                                });
                            }
                        }
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please insert a number.'
                    });
                }
            });

            $('#star_1').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(1);

                $('#star_2').removeClass('las la-star').addClass('lar la-star');
                $('#star_3').removeClass('las la-star').addClass('lar la-star');
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_2').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(2);
                $('#star_3').removeClass('las la-star').addClass('lar la-star');
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_3').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(3);
                $('#star_4').removeClass('las la-star').addClass('lar la-star');
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_4').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#star_4').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(4);
                $('#star_5').removeClass('las la-star').addClass('lar la-star');
            })
            $('#star_5').on('click',function(){
                $('#star_1').removeClass('lar la-star').addClass('las la-star');
                $('#star_2').removeClass('lar la-star').addClass('las la-star');
                $('#star_3').removeClass('lar la-star').addClass('las la-star');
                $('#star_4').removeClass('lar la-star').addClass('las la-star');
                $('#star_5').removeClass('lar la-star').addClass('las la-star');
                $('#rating').val(5);
            })

            // $('.attribute_value_productTab1').on("click",function(e){
            //     e.preventDefault();
            //     $(this).addClass('selected');
            //     var selectedVal = $(this).data('value_id');
            //     values.push(selectedVal);
            //     $('.value_ids_products').val(values);
            // });

        })(jQuery);
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/frontend/pages/product_details.blade.php ENDPATH**/ ?>