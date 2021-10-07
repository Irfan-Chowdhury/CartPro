<div class="product-grid">
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
                            <img src="#" alt="...">
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
                        <a class="product-category" href="#"><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? NULL); ?></a>
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
                                        <span class="promo-price">$ <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                        <span class="old-price">$<?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
                                    <?php else: ?>
                                        <span class="price">$<?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?></span>
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
</div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/test.blade.php ENDPATH**/ ?>