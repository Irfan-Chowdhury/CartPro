<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Product Page')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="footerSubmit" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                   <!-- Product Page Banner -->
                   <h5><?php echo e(__('Product Page Banner')); ?></h5><br>
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


                   <!-- Call to Action URL -->
                   <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="text" name="storefront_call_action_url" placeholder="Type Copyright Text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Open in new window -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="checkbox" name="storefront_section_status" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Enable')); ?></label>
                              </div>
                        </div>
                    </div>
                    <br>





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
<?php /**PATH C:\laragon\www\Running_File\cartpro\resources\views/admin/pages/storefront/general_setting/product_page.blade.php ENDPATH**/ ?>