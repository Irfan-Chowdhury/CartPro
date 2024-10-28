<?php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}
?>

    <!-- Quick Shop Modal starts -->
    <div class="modal fade quickshop" id="id_<?php echo e($item->product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($item->product->id); ?>" aria-hidden="true">
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
                                    <?php $__empty_1 = true; $__currentLoopData = $item->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="slider-for__item ex1">
                                            <img class="lazy" data-src="<?php echo e(asset('public/'.$value->image)); ?>" alt="..." />
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
                                <input type="hidden" name="value_ids" class="value_ids_products">

                                <div class="item-details">
                                    <a class="item-category" href=""><?php echo e($item->categoryTranslation->category_name ?? $item->categoryTranslationDefaultEnglish->category_name ?? null); ?></a>
                                    <h3 class="item-name"><?php echo e($item->productTranslation->product_name ?? $item->productTranslationDefaultEnglish->product_name ?? null); ?></h3>
                                    <div class="d-flex justify-content-between">
                                        <div class="item-brand"><?php echo app('translator')->get('file.Brand'); ?>: <a href=""><?php echo e($item->product->brand->brandTranslation->brand_name ?? $item->product->brand->brandTranslationDefaultEnglish->brand_name ?? null); ?></a></div>
                                        <div class="item-review">
                                            <ul class="p-0 m-0">
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
                                            <span>( <?php echo e(round($item->product->avg_rating)); ?> )</span>
                                        </div>
                                        <?php if($item->product->sku): ?>
                                            <div class="item-sku"><?php echo app('translator')->get('file.SKU'); ?>: <?php echo e($item->product->sku ?? null); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <hr>
                                    <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                        <div class="item-price">
                                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                <?php echo e(number_format((float)$item->product->special_price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            <?php else: ?>
                                                <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

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
                                                <button type="button" class="quantity-left-minus decrementProductQty-<?php echo e($item->product->id); ?>">
                                                    <span class="ti-minus"></span>
                                                </button>
                                            </span>
                                            <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                                <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->product->id); ?>" value="1" min="1" max="0">
                                            <?php else: ?>
                                                <input type="number" name="qty" required class="input-number quantity-<?php echo e($item->product->id); ?>" value="1" min="1" max="<?php echo e($item->product->qty); ?>">
                                            <?php endif; ?>
                                            <span class="input-group-btn">
                                                <button type="button" class="quantity-right-plus incrementProductQty-<?php echo e($item->product->id); ?>">
                                                    <span class="ti-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                        <?php if(($item->product->manage_stock==1 && $item->product->qty==0) || ($item->product->in_stock==0)): ?>
                                            <button disabled title="Out of stock" data-bs-toggle="tooltip" data-bs-placement="top" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                        <?php else: ?>
                                            <button type="submit" class="button button-icon style1"><span><i class="las la-shopping-cart"></i> <span><?php echo app('translator')->get('file.Add to Cart'); ?></span></span></button>
                                        <?php endif; ?>
                                        <a><div class="button button-icon style4 sm <?php if(auth()->guard()->check()): ?> add_to_wishlist <?php else: ?> forbidden_wishlist <?php endif; ?>" data-product_id="<?php echo e($item->product->id); ?>" data-product_slug="<?php echo e($item->product->slug); ?>" data-category_id="<?php echo e($item->product->categoryProduct[0]->category_id ?? null); ?>" data-qty="1"><p><span><i class="ti-heart"></i> </span><?php echo app('translator')->get('file.Add to Wishlist'); ?></p></div></a>
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
        $(".decrementProductQty-<?php echo e($item->product->id); ?>").on("click",function(e){
            $(".decrementProductQty-<?php echo e($item->product->id); ?>").prop("disabled",false);
        });
        $(".incrementProductQty-<?php echo e($item->product->id); ?>").on("click",function(e){
            var inputNumber = $('.quantity-<?php echo e($item->product->id); ?>').val();
            var maxNumber = $('.quantity-<?php echo e($item->product->id); ?>').attr('max');
            console.log(maxNumber);

            if (maxNumber==0) {
                console.log(Number(maxNumber));
            }else{
                if ((Number(inputNumber)+1) > Number(maxNumber)) {
                    $('.quantity-<?php echo e($item->product->id); ?>').val(Number(maxNumber)-1);
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

<?php /**PATH /var/www/html/cartproshop/resources/views/frontend/includes/quickshop.blade.php ENDPATH**/ ?>