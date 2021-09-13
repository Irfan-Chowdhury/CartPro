<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Product Page')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="productPageSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- Product Page Banner -->
                    <!-- DB_ROW_ID-39:  => setting[38] -->
                   <h5><?php echo e(__('Product Page Banner')); ?></h5><br>
                   <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->title=='product_page_banner'): ?>
                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontProductPageImage" height="100px" width="100px">
                            <?php break; ?>
                        <?php elseif($key == ($total_storefront_images-1)): ?>
                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontProductPageImage" height="100px" width="100px">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontProductPageImage" height="100px" width="100px">
                    <?php endif; ?>
                   <br><br>
                   <input type="file" name="storefront_product_page_image" class="form-control" onchange="showImage(this,'storefrontProductPageImage')">
                   <br><br>


                   <!-- Call to Action URL -->
                   <!-- DB_ROW_ID-40:  => setting[39] -->
                   <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="text" name="storefront_call_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="<?php echo e($setting[39]->plain_value); ?>">
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Open in new window -->
                    <!-- DB_ROW_ID-41:  => setting[40] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="checkbox" <?php if($setting[40]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_open_new_window"  class="form-check-input">
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
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/general_setting/product_page.blade.php ENDPATH**/ ?>