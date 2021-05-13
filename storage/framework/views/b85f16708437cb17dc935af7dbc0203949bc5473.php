<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Newsletter')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="footerSubmit" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                   <!-- Background Image -->
                   <h5><?php echo e(__('Background Image')); ?></h5><br>
                   <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                       <?php if($key==1): ?>
                           <?php if($item->title=='header_logo'): ?>
                               <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="paymentMethodImage" height="100px" width="100px">
                           <?php else: ?>
                               <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="paymentMethodImage" height="100px" width="100px">
                           <?php endif; ?>
                       <?php endif; ?>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                       <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="paymentMethodImage" height="100px" width="100px">
                   <?php endif; ?>
                   <br><br>
                   <input type="file"   name="payment_method_image" class="form-control" onchange="showImage(this,'paymentMethodImage')">
                   <input type="hidden" name="title_payment_method_image" value="payment_method_image">
                   <br><br>





                    <div class="form-group row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\Running_File\cartpro\resources\views/admin/pages/storefront/general_setting/newsletter.blade.php ENDPATH**/ ?>