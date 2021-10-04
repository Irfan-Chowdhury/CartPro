<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Slider Banners')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="sliderBannerSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- Banner 1 -->
                    <!-- DB_ROW_ID-42-44:  => setting[41-43] -->
                    <h5 class="text-bold"><?php echo e(__('Banner 1')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='slider_banner_1'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontSliderBannerImage_1" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_1" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_1" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_slider_banner_1_image" class="form-control" onchange="showImage(this,'storefrontSliderBannerImage_1')">
                        </div>

                        <div class="col-md-6">
                            
                            <label class="col-form-label"><b><?php echo e(__('file.Title')); ?></b></label>
                            <input type="text" name="storefront_slider_banner_1_title" placeholder="Type the Title" class="form-control"
                                <?php $__empty_1 = true; $__currentLoopData = $setting[124]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->locale==$locale): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php elseif($item->locale=='en'): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?> >
                            <br>

                            <label class="col-form-label"><b><?php echo e(__('Call to Action URL')); ?></b></label>
                            <input type="text" name="storefront_slider_banner_1_call_to_action_url" placeholder="Type the URL" class="form-control"
                                value="<?php echo e($setting[42]->plain_value); ?>">
                            <br><br>

                            <input type="checkbox" class="m-1" <?php if($setting[43]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_slider_banner_1_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        </div>
                    </div>

                    <br><br><br>

                    <!-- Banner 2 -->
                    <!-- DB_ROW_ID-45-47:  => setting[44-46] -->
                    <h5 class="text-bold"><?php echo e(__('Banner 2')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='slider_banner_2'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontSliderBannerImage_2" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_2" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_2" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_slider_banner_2_image" class="form-control" onchange="showImage(this,'storefrontSliderBannerImage_2')">
                        </div>

                        <div class="col-md-6">
                            
                            <label class="col-form-label"><b><?php echo e(__('file.Title')); ?></b></label>
                            <input type="text" name="storefront_slider_banner_2_title" placeholder="Type the Title" class="form-control"
                                <?php $__empty_1 = true; $__currentLoopData = $setting[125]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->locale==$locale): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php elseif($item->locale=='en'): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?> >
                            <br>
                            <input type="text" name="storefront_slider_banner_2_call_to_action_url" placeholder="Type the URL" class="form-control"
                                value="<?php echo e($setting[45]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[46]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_slider_banner_2_open_in_new_window">
                            <label for="inputEmail3" class="ml-2 p-0 col-form-label"><b><?php echo e(__('Open in new window')); ?></b></label>
                        </div>
                    </div>
                    <br><br><br>

                    <!-- Banner 3 -->
                    <!-- DB_ROW_ID-45-47:  => setting[44-46] -->
                    <h5 class="text-bold"><?php echo e(__('Banner 3')); ?></h5><br>
                    <div class="row">
                        <div class="col-md-6">
                            <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->title=='slider_banner_3'): ?>
                                    <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="storefrontSliderBannerImage_3" height="100px" width="100px">
                                    <?php break; ?>
                                <?php elseif($key == ($total_storefront_images-1)): ?>
                                    <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_3" height="100px" width="100px">
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="storefrontSliderBannerImage_3" height="100px" width="100px">
                            <?php endif; ?>
                            <br><br>
                            <input type="file" name="storefront_slider_banner_3_image" class="form-control" onchange="showImage(this,'storefrontSliderBannerImage_3')">
                        </div>

                        <div class="col-md-6">
                            
                            <label class="col-form-label"><b><?php echo e(__('file.Title')); ?></b></label>
                            <input type="text" name="storefront_slider_banner_3_title" placeholder="Type the Title" class="form-control"
                                <?php $__empty_1 = true; $__currentLoopData = $setting[127]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->locale==$locale): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php elseif($item->locale=='en'): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?> >
                            <br>
                            <input type="text" name="storefront_slider_banner_3_call_to_action_url" placeholder="Type the URL" class="form-control"
                                value="<?php echo e($setting[128]->plain_value); ?>">
                            <br><br>
                            <input type="checkbox" class="m-1" <?php if($setting[129]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_slider_banner_3_open_in_new_window">
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
</div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/home_page_section/slider_banner.blade.php ENDPATH**/ ?>