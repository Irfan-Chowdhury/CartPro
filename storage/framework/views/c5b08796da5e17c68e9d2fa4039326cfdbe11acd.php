<?php $__env->startSection('title','Wishlist'); ?>

<?php $__env->startSection('frontend_content'); ?>

    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">Shop Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->

    <!-- wishlist section start-->
    <section class="wishlist-section">
        <div class="container">
            <div class="row">
                <h1 class="page-title h2 text-center uppercase mt-1 mb-5">Wishlist</h1>
            </div>
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="table-content table-responsive cart-table wishlist">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <div id="wishlistContent">
                                    <?php $__empty_1 = true; $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                        <tr id="wishlist_<?php echo e($item->id); ?>">
                                            <form class="addToCart">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="product_id" value="<?php echo e($item->product_id); ?>">
                                                <input type="hidden" name="product_slug" value="<?php echo e($item->product->slug); ?>">
                                                <input type="hidden" name="category_id" value="<?php echo e($item->category_id ?? null); ?>">
                                                <input type="hidden" name="qty" value="1">
                                                <input type="hidden" name="wishlist_id" value="<?php echo e($item->id); ?>">

                                                <td class="cart-product">
                                                    <div class="item-details">
                                                        <a class="remove_wishlist" data-id="<?php echo e($item->id); ?>"><i class="ti-close"></i></a>
                                                        <img src="<?php echo e(asset('public/'.$item->product->baseImage->image ?? null)); ?>" alt="...">
                                                        <div class="">
                                                            <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $item->category_id)); ?>">
                                                                <h3 class="h6"><?php echo e($item->product->productTranslation->product_name); ?></h3>
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart-product-subtotal">
                                                    <span class="amount">
                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                            <?php if($item->product->special_price>0 && ($item->product->special_price < $item->product->price)): ?>
                                                                <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                            <?php else: ?>
                                                                <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>


                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if($item->product->special_price>0 && ($item->product->special_price < $item->product->price)): ?>
                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                            <?php else: ?>
                                                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format((float)$item->product->price, env('FORMAT_NUMBER'), '.', '')); ?>

                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    </span></td>
                                                <td>
                                                    <button class="button style1 button-icon" type="submit"><?php echo e(__('file.Add to cart')); ?></button>
                                                    
                                            </form>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                </div>

                                <?php endif; ?>

                            </tbody>
                        </table>

                        <a href="shop-fullwidth.html" class="button style3"><i class="ti-arrow-left"></i> Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- wishlist section ends-->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

<script type="text/javascript">
    $(document).on('click','.remove_wishlist',function(event) {
        event.preventDefault();
        var wishlist_id = $(this).data('id');
        // var removeCartItemId = $(this).parent().parent().attr('id');

        $.ajax({
            url: "<?php echo e(route('wishlist.remove')); ?>",
            type: "GET",
            data: {wishlist_id:wishlist_id},
            success: function (data) {
                console.log(data);
                if (data.type=='success') {
                    $('#wishlist_'+wishlist_id).remove();

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
                        title: data.message
                    })
                }
            }
        })
    });
</script>

<?php $__env->stopPush(); ?>



<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/frontend/pages/wishlist.blade.php ENDPATH**/ ?>