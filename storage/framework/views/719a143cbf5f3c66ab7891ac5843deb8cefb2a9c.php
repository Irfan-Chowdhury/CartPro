    <!-- Quick Shop Modal starts -->
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
                                    <?php $__empty_1 = true; $__currentLoopData = $item->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="slider-for__item ex1">
                                            <img src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                </div>
                                <div class="slider-nav-modal">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form action="<?php echo e(route('product.add_to_cart')); ?>" class="addToCart" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="value_ids" class="value_ids_productTab1">

                                <div class="item-details">
                                    <a class="item-category" href=""><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                                    <h3 class="item-name"><?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand">Brand: <a href=""><?php echo e($item->product->brand->brandTranslation->brand_name ?? $item->product->brand->brandTranslationDefaultEnglish->brand_name ?? null); ?></a></div>
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
                                            <span>( <?php echo e(round($item->product->avg_rating)); ?> )</span>
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
                                        <p><?php echo e($item->productTranslation->short_description ?? $item->productTranslationDefaultEnglish->short_description ?? null); ?></p>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="item-variant">
                                            <span><?php echo e($value); ?>:</span>
                                            <input type="hidden" name="attribute_name[]" class="attribute_name" value="<?php echo e($value); ?>">
                                            <ul class="product-variant size-opt p-0 mt-1">
                                                <?php $__empty_2 = true; $__currentLoopData = $item->productAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <?php if($value->attribute_id == $key): ?>
                                                        <li class="attribute_value_productTab1" data-attribute_name="<?php echo e($value->attributeTranslation->attribute_name ?? $value->attributeTranslationEnglish->attribute_name ?? null); ?>" data-value_id="<?php echo e($value->attribute_value_id); ?>" data-value_name="<?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?>"><span><?php echo e($value->attrValueTranslation->value_name ?? $value->attrValueTranslationEnglish->value_name ?? null); ?></span></li>
                                                        <input type="hidden" name="value_id[]" value="<?php echo e($value->attribute_value_id); ?>">
                                                    <?php endif; ?>
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
                                            <input type="number" name="qty" class="input-number" value="1" min="1">
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus">
                                                    <span class="ti-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span>Add to cart</span></span></button>
                                        <a>
                                            <button class="button button-icon style4 sm add_to_wishlist" data-product_id="<?php echo e($item->product->id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->product->categoryProduct[0]->category_id ?? null); ?>" data-qty="1"><span><i class="ti-heart"></i> <span>Add to wishlist</span></span></button>
                                        </a>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
<?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/includes/quickshop.blade.php ENDPATH**/ ?>