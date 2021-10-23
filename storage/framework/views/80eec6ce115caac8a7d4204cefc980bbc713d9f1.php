<?php $__env->startSection('frontend_content'); ?>

<!--Breadcrumb Area start-->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><a href="home.html">Home</a></li>
                    <li class="active">Shop Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--Breadcrumb Area ends-->



    <!--Shop cart starts-->
    <section class="shop-cart-section pt-0 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if(count($cart_content)>0): ?>
                        <h1 class="page-title h2 text-center uppercase mt-1 mb-5"><?php echo e(__('file.Your Cart')); ?></h1>
                    <?php else: ?>
                        <h1 class="page-title h2 text-center uppercase mt-1 mb-5"><?php echo e(__('file.Your Cart is Currently empty')); ?></h1>
                    <?php endif; ?>

                </div>
                <?php if(count($cart_content)>0): ?>
                    <div class="col-lg-8">
                        <div class="table-content table-responsive cart-table">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cartTable">

                                    <div id="content">
                                        <?php $__empty_1 = true; $__currentLoopData = $cart_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr id="<?php echo e($item->rowId); ?>">
                                                <td class="cart-product">
                                                    <div class="item-details">
                                                        <a class="remove_cart_from_details" data-id="<?php echo e($item->rowId); ?>"><i class="ti-close"></i></a>
                                                        <img src="<?php echo e(asset('public/'.$item->options->image ?? null)); ?>" alt="...">
                                                        <div class="">
                                                            <a href="<?php echo e(url('product/'.$item->options->product_slug.'/'. $item->options->category_id)); ?>">
                                                                <h3 class="h6"><?php echo e($item->name); ?></h3>
                                                            </a>
                                                            <div class="input-qty">
                                                                <form class="quantity_change_submit" data-id="<?php echo e($item->rowId); ?>" method="get">
                                                                    <span class="input-group-btn">
                                                                        <button type="submit" class="quantity-left-minus " data-id="<?php echo e($item->rowId); ?>">
                                                                            <span class="ti-minus"></span>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="input-number <?php echo e($item->rowId); ?>" value="<?php echo e($item->qty); ?>">
                                                                    <span class="input-group-btn">
                                                                        <button type="submit" class="quantity-right-plus quantity_change" data-id="<?php echo e($item->rowId); ?>">
                                                                            <span class="ti-plus"></span>
                                                                        </button>
                                                                    </span>
                                                                </form>
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
                                                    
                                                </td>
                                                <td class="cart-product-subtotal">
                                                    <span class="amount">
                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                            <span class="subtotal_<?php echo e($item->rowId); ?>"><?php echo e($item->subtotal); ?></span> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <span class="subtotal_<?php echo e($item->rowId); ?>"><?php echo e($item->subtotal); ?></span>
                                                        <?php endif; ?>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </div>
                                </tbody>
                            </table>

                            <a href="<?php echo e(route('cartpro.home')); ?>" class="button style3"><i class="ti-arrow-left"></i> Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <form action="<?php echo e(route('cart.checkout')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                            

                            <div class="cart-subtotal">
                                <div class="subtotal">
                                    <div class="label">Subtotal</div>
                                    <div class="price">
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <span class="cartSubtotal"><?php echo e($cart_subtotal); ?></span> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <span class="cartSubtotal"><?php echo e($cart_subtotal); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                
                                <div class="total">
                                    <div class="label"><?php echo e(__('file.Total')); ?></div>
                                    <div class="price">
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <span class="cart_total total_amount"><?php echo e($cart_total); ?></span> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <span class="cart_total total_amount"><?php echo e($cart_total); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button lg style1 d-block text-center">Proceed to Checkout</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </section>
    <!--Shop cart ends-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/pages/cart_details.blade.php ENDPATH**/ ?>