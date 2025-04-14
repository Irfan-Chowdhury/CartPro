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


    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="id_<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($item->slug); ?>" aria-hidden="true">
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
                                                <img src="<?php echo e($value->image); ?>" alt="..." />
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
                                <input type="hidden" name="product_id" value="<?php echo e($item->id); ?>">
                                <input type="hidden" name="product_slug" value="<?php echo e($item->slug); ?>">
                                <input type="hidden" name="category_id" value="<?php echo e($item->categoryId); ?>">
                                <input type="hidden" name="qty" value="1">
                                <input type="hidden" name="value_ids" class="value_ids_shop">

                                <div class="item-details">
                                    <h3 class="item-name"><?php echo e($item->name); ?></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand"><?php echo app('translator')->get('file.Brand'); ?>: <a href=""><?php echo e($item->brandName); ?></a></div>
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
                                    <?php if($item->specialPrice!=NULL && $item->specialPrice>0 && $item->specialPrice<$item->price): ?>
                                        <div class="item-price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->specialPrice * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                            <?php endif; ?>
                                            <hr>
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <small class="old-price"><del><?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> </del></small>
                                            <?php else: ?>
                                                <small class="old-price"><del><?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> </del></small>
                                            <?php endif; ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="item-price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="item-short-description">
                                        <p><?php echo e($item->shortDescription); ?></p>
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
                                        <?php if(($item->manageStock==1 && $item->qty==0) || ($item->inStock==0)): ?>
                                            <button class="button button-icon style1" disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                        <?php else: ?>
                                            <button class="button button-icon style1" type="submit" data-bs-toggle="tooltip" data-bs-placement="top"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                        <?php endif; ?>
                                        <div class="button button-icon style4 sm <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($item->id); ?>" data-product_slug="<?php echo e($item->slug); ?>" data-category_id="<?php echo e($item->categoryId); ?>" data-qty="1"><span><i class="ti-heart"></i> <span><?php echo app('translator')->get('file.Add to Wishlist'); ?></span></span></div>
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
            </div>
        </div>
    </div>
    <!--Quick shop modal ends-->
<?php /**PATH /var/www/html/resources/views/frontend/includes/quickshop_shop.blade.php ENDPATH**/ ?>