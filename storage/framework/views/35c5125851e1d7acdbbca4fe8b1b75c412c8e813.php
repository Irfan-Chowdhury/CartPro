<?php $__empty_1 = true; $__currentLoopData = $cart_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td class="cart-product">
            <div class="item-details">
                <a class="deleteCart" data-id="<?php echo e($item->rowId); ?>"><i class="ti-close"></i></a>
                <img src="<?php echo e(asset('public/'.$item->options->image ?? null)); ?>" alt="...">
                <div class="">
                    <a href="<?php echo e(url('product/'.$item->options->product_slug.'/'. $item->options->category_id)); ?>">
                        <h3 class="h6"><?php echo e($item->name); ?></h3>
                    </a>
                    <div class="input-qty">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-left-minus">
                                <span class="ti-minus"></span>
                            </button>
                        </span>
                        <input type="text" class="input-number" value="<?php echo e($item->qty); ?>">
                        <span class="input-group-btn">
                            <button type="button" class="quantity-right-plus">
                                <span class="ti-plus"></span>
                            </button>
                        </span>
                    </div>
                    X
                    <span class="amount">
                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                            <?php echo e($item->price); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                        <?php else: ?>
                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e($item->price); ?>

                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="cart-amount-mobile">Total:
                <span class="amount">
                    $90.00
                </span>
            </div>
        </td>
        <td class="cart-product-subtotal">
            <span class="amount">
                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                    <?php echo e($item->subtotal); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                <?php else: ?>
                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e($item->subtotal); ?>

                <?php endif; ?>
            </span>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/frontend/pages/test.blade.php ENDPATH**/ ?>