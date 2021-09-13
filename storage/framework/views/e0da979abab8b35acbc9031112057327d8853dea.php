<div class="card">
    <h4 class="card-header"><b>General</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="generalSubmit">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Welcome Text</b></label>
                        <div class="col-sm-8">
                            <!-- setting[0] => DB_ROW_ID-1: storefront_welcome_text -->
                            <input type="text" name="storefront_welcome_text" id="storefront_welcome_text" class="form-control" id="inputEmail3" placeholder="Type Text"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[0]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
                        </div>
                    </div>

                    <!-- setting[1] => DB_ROW_ID-2: storefront_theme_color -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Theme Color</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_theme_color" id="storefront_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Color')); ?>'>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($colors[$key]['color_name']); ?>" <?php echo e($colors[$key]['color_name'] == $setting[1]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($colors[$key]['color_name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[2] => DB_ROW_ID-3: storefront_mail_theme_color -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Mail Theme Color</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_mail_theme_color" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Color')); ?>'>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($colors[$key]['color_name']); ?>" <?php echo e($colors[$key]['color_name'] == $setting[2]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($colors[$key]['color_name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Slider</b> <span class="text-danger"><i>(Incomplete)</i></span></label>
                        <div class="col-sm-8">
                            <select name="slider_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Slider')); ?>'>
                                
                            </select>
                        </div>
                    </div>

                    <!-- setting[4] => DB_ROW_ID-5: storefront_terms_and_condition_page -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Terms & Condition</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_terms_and_condition_page" id="storefront_terms_and_condition_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Terms & Condition')); ?>'>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->pageTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[4]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[4]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[5] => DB_ROW_ID-6: storefront_privacy_policy_page -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Privacy Policy Page</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_privacy_policy_page" id="storefront_privacy_policy_page" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->pageTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[5]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[5]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->page_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[6] => DB_ROW_ID-7: storefront_address -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Address</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_address" id="storefront_address" class="form-control" placeholder="Type Address"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[6]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
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
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/general_setting/general.blade.php ENDPATH**/ ?>