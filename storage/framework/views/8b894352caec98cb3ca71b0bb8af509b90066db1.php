<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Three Column Full Width Banners')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="threeColumnFullWidthBannersSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- DB_ROW_ID-69:  => setting[68] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" <?php if($setting[68]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_three_column_full_width_banners_enabled" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable three column full width banners section</label>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Background - 1 -->
                    <!-- DB_ROW_ID-70:  => setting[69] -->
                    <h5 class="text-bold"><?php echo e(__('Background')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='three_column_full_width_banners_background_image'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontThreeColumnFullWidthBannersBackgroundImage" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersBackgroundImage" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersBackgroundImage" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_three_column_full_width_banners_background_image" class="form-control" onchange="showImage(this,'storefrontThreeColumnFullWidthBannersBackgroundImage')">
                        </div>
                    </div>


                    <!-- Banners - 1 -->
                    <!-- DB_ROW_ID-71-73:  => setting[70-72] -->
                    <h5 class="mt-3 text-bold"><?php echo e(__('Banners - 1')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='three_column_full_width_banners_image_1'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontThreeColumnFullWidthBannersImage1" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage1" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage1" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_three_column_full_width_banners_image_1" class="form-control" onchange="showImage(this,'storefrontThreeColumnFullWidthBannersImage1')">
                        </div>
                        <div class="col-md-6">
                            <label class="col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                            <input type="text" name="storefront_three_column_full_width_banners_1_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="<?php echo e($setting[71]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[72]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_three_column_full_width_banners_1_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        </div>
                    </div>



                    <!-- Banners - 2 -->
                    <!-- DB_ROW_ID-74-76:  => setting[73-75] -->
                    <h5 class="mt-5 text-bold"><?php echo e(__('Banners - 2')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='three_column_full_width_banners_image_2'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontThreeColumnFullWidthBannersImage2" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage2" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage2" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_three_column_full_width_banners_image_2" class="form-control" onchange="showImage(this,'storefrontThreeColumnFullWidthBannersImage2')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                            <input type="text" name="storefront_three_column_full_width_banners_2_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="<?php echo e($setting[74]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[75]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_three_column_full_width_banners_2_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        </div>
                    </div>



                    <!-- Banners - 3 -->
                    <!-- DB_ROW_ID-77-79:  => setting[76-78] -->
                    <h5 class="mt-5 text-bold"><?php echo e(__('Banners - 3')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='three_column_full_width_banners_image_3'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontThreeColumnFullWidthBannersImage3" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage3" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontThreeColumnFullWidthBannersImage3" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_three_column_full_width_banners_image_3" class="form-control" onchange="showImage(this,'storefrontThreeColumnFullWidthBannersImage3')">
                        </div>

                        <div class="col-md-6">
                            <label class="col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                            <input type="text" name="storefront_three_column_full_width_banners_3_call_to_action_url" placeholder="Type Copyright Text" class="form-control"
                                value="<?php echo e($setting[77]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[78]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_three_column_full_width_banners_3_open_in_new_window">
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
</div><?php /**PATH D:\laragon\www\cartpro\resources\views/admin/pages/storefront/home_page_section/three_column_full_width_banners.blade.php ENDPATH**/ ?>