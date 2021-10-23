<div class="card">
    <h4 class="card-header"><b>Menus</b></h4>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="menuSubmit" action="<?php echo e(route('admin.storefront.menu.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Navbar Text</b></label>
                        <div class="col-sm-8">
                            <!-- setting[7] => DB_ROW_ID-8: storefront_navbar_text -->
                            <input type="text" name="storefront_navbar_text" id="storefront_navbar_text" class="form-control" id="inputEmail3"  placeholder="Type Text"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[7]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
                        </div>
                    </div>

                    <!-- setting[8] => DB_ROW_ID-9: storefront_primary_menu -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Primary Menu</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_primary_menu" id="storefront_primary_menu" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Primary Menu')); ?>'>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[8]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[8]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[9] => DB_ROW_ID-10: storefront_category_menu -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category Menu</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_category_menu" id="storefront_category_menu" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category Menu')); ?>'>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[9]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[9]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[10] => DB_ROW_ID-11: storefront_footer_menu_title_one -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title One</b></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="storefront_footer_menu_title_one" id="storefront_footer_menu_title_one"  placeholder="Type Footer Menu Title"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[10]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
                        </div>
                    </div>

                    <!-- setting[11] => DB_ROW_ID-12: storefront_footer_menu_one -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu One</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_footer_menu_one" id="storefront_footer_menu_one" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[11]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[11]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <!-- setting[12] => DB_ROW_ID-13: storefront_footer_menu_title_two -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title Two</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="storefront_footer_menu_title_two" id="storefront_footer_menu_title_two" class="form-control"  placeholder="Type Footer Menu Title"
                            <?php $__empty_1 = true; $__currentLoopData = $setting[12]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php if($item->locale==$locale): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php elseif($item->locale=='en'): ?>
                                    value="<?php echo e($item->value); ?>" <?php break; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?> >
                        </div>
                    </div>

                    <!-- setting[13] => DB_ROW_ID-14: storefront_footer_menu_two -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Two</b></label>
                        <div class="col-sm-8">
                            <select name="storefront_footer_menu_two" id="storefront_footer_menu_two" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php if($value->locale==$locale): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[13]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php elseif($value->locale=='en'): ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[13]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
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
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/general_setting/menu.blade.php ENDPATH**/ ?>