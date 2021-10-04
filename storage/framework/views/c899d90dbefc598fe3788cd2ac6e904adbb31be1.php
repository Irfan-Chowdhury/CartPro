<div class="card">
    <h3 class="card-header"><b><?php echo e(__('One Column Banner')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="oneColumnBannerSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- DB_ROW_ID-48:  => setting[47] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" <?php if($setting[47]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_one_column_banner_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable one column banner section</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Banner -->
                    <!-- DB_ROW_ID-49-51:  => setting[48-50] -->
                    <h5 class="text-bold"><?php echo e(__('Banner')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='one_column_banner_image'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontOneColumnBannerImage" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontOneColumnBannerImage" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontOneColumnBannerImage" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_one_column_banner_image" class="form-control" onchange="showImage(this,'storefrontOneColumnBannerImage')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                            <input type="text" name="storefront_one_column_banner_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="<?php echo e($setting[49]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[50]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_one_column_banner_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        </div>
                    </div>


                    <div class="form-group row mt-5">
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
</div><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/home_page_section/one_column_banner.blade.php ENDPATH**/ ?>