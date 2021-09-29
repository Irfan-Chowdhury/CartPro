<div class="card">
    <h4 class="card-header p-3"><b>General</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                
                <form id="generalSubmit" method="POST">
                    <?php echo csrf_field(); ?>


                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Supported Countries <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="supported_countries[]" id="supportedCountries" class="form-control selectpicker" multiple="multiple" data-live-search="true" title='<?php echo e(__('Select Conutry')); ?>'>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($country->country_name); ?>"
                                            <?php if(empty(!$selected_countries)): ?>
                                                <?php $__empty_1 = true; $__currentLoopData = $selected_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php if($country->country_name == $value): ?>
                                                        selected
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            <?php endif; ?>> <?php echo e($country->country_name); ?>

                                        </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Default Country <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="default_country" id="defaultCountry" class="form-control selectpicker" data-live-search="true" title='<?php echo e(__('Select Conutry')); ?>'>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_name); ?>" <?php if(empty(!$setting_general)): ?>  <?php echo e(($country->country_name == $setting_general->default_country) ? "selected" : ''); ?> <?php endif; ?>><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Default Timezone <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="default_timezone" id="defaultTimezone" class="form-control selectpicker" title='<?php echo e(__('Select Timezone')); ?>'>
                                <?php $__currentLoopData = $zones_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($zone['zone']); ?>" <?php if(empty(!$setting_general)): ?> <?php echo e(($zone['zone'] == $setting_general->default_timezone) ? "selected" : ''); ?> <?php endif; ?>><?php echo e($zone['diff_from_GMT'] . ' - ' . $zone['zone']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Customer Role <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="customer_role" id="customerRole" class="form-control" title='<?php echo e(__('Select Role')); ?>'>
                                <option value="customer" <?php if(empty(!$setting_general)): ?> <?php echo e($setting_general->customer_role=="customer" ? "selected" : ''); ?> <?php endif; ?>>Customer</option>
                                <option value="admin" <?php if(empty(!$setting_general)): ?> <?php echo e($setting_general->customer_role=="admin" ? "selected" : ''); ?> <?php endif; ?>>Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label ml-2"><b>Number Format Type</b> <br><i>(Ex: 1.00, 1.000, 1.0000)</i> </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="number_format_type"  id="number_format_type" value="2" <?php if($setting_general->number_format_type!=NULL && $setting_general->number_format_type=="2"): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="number_format_type">
                                2
                            </label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="number_format_type" id="number_format_type" value="3" <?php if($setting_general->number_format_type!=NULL && $setting_general->number_format_type=="3"): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                3
                            </label>
                        </div>
                        <div class="form-check ml-3">
                            <input class="form-check-input" type="radio" name="number_format_type" id="number_format_type" value="4" <?php if($setting_general->number_format_type!=NULL && $setting_general->number_format_type=="4"): ?> checked <?php endif; ?>>
                            <label class="form-check-label" for="exampleRadios1">
                                4
                            </label>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Reviews & Ratings</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" <?php if(empty(!$setting_general)): ?> <?php echo e($setting_general->reviews_and_ratings =="1" ? "checked" : ''); ?> <?php endif; ?> name="reviews_and_ratings" id="reviewsAndRatings" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Allow customers to give reviews & ratings</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Auto Approve Reviews</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" <?php if(empty(!$setting_general)): ?> <?php echo e($setting_general->auto_approve_reviews =="1" ? "checked" : ''); ?> <?php endif; ?> name="auto_approve_reviews" id="autoApproveReviews" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Customer reviews will be approved automatically</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Cookie Bar</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" <?php if(empty(!$setting_general)): ?> <?php echo e($setting_general->cookie_bar =="1" ? "checked" : ''); ?> <?php endif; ?> name="cookie_bar" id="cookieBar" class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Show cookie bar in your website</label>
                            </div>
                        </div>
                    </div>

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
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/general_setting/general.blade.php ENDPATH**/ ?>