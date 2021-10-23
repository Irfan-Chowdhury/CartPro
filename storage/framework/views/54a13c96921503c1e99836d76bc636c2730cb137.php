<h4 class="mt-3 text-bold"><?php echo e(__('Tab - 2')); ?></h4><br>
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><b>Title</b></label>
    <div class="col-sm-8">
        <!-- DB_ROW_ID-110:  => setting[109] -->
        <input type="text" name="storefront_product_tabs_2_section_tab_2_title" class="form-control" placeholder="Type Title"
        <?php $__empty_1 = true; $__currentLoopData = $setting[109]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
    <label class="col-sm-4 col-form-label"><b>Type</b></label>
    <!-- DB_ROW_ID-111:  => setting[110] -->
    <div class="col-sm-8">
        <select name="storefront_product_tabs_2_section_tab_2_product_type" id="storefrontProductTabs_2_SectionTab_2_ProductType" class="form-control" data-live-search="true" data-live-search-style="begins">
            <option value="">-- Select Type --</option>
            <option value="<?php echo e(__('category_products')); ?>" <?php echo e($setting[110]->plain_value == 'category_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Category Products')); ?></option>
            <option value="<?php echo e(__('custom_products')); ?>" <?php echo e($setting[110]->plain_value == 'custom_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Custom Products')); ?></option>
            <option value="<?php echo e(__('latest_products')); ?>" <?php echo e($setting[110]->plain_value == 'latest_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Latest Products')); ?></option>
            <option value="<?php echo e(__('recently_viewed_products')); ?>" <?php echo e($setting[110]->plain_value == 'recently_viewed_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Recently Viewed Products')); ?></option>
        </select>
    </div>
</div>
<?php if((!empty($setting[110]->plain_value)) && ($setting[110]->plain_value == 'category_products')): ?>
    <div class="form-group row" id="tabTwoCategoryFeild_2">
        <label class="col-sm-4 col-form-label"><b>Category</b></label>
        <div class="col-sm-8">
            <!-- DB_ROW_ID-112:  => setting[112] -->
            <select name="storefront_product_tabs_2_section_tab_2_category_id" id="storefrontProductTabs_2_SectionTab_2_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($value->local==$locale): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($setting[111]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                        <?php elseif($value->local=='en'): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($setting[111]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value=""><?php echo e(__('NULL')); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
<?php else: ?>
    <div class="form-group row" id="tabTwoCategoryFeild_2">
        <label class="col-sm-4 col-form-label"><b>Category</b></label>
        <div class="col-sm-8">
            <!-- DB_ROW_ID-112:  => setting[111] -->
            <select name="storefront_product_tabs_2_section_tab_2_category_id" id="storefrontProductTabs_2_SectionTab_2_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($value->local==$locale): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($setting[111]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                        <?php elseif($value->local=='en'): ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($setting[111]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($value->category_name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <option value=""><?php echo e(__('NULL')); ?></option>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
<?php endif; ?>

<div class="form-group row" id="tabTwoProductTabsField_2">
    <?php if((!empty($setting[110]->plain_value)) && ($setting[110]->plain_value == 'custom_products')): ?>
        <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>
        <!-- DB_ROW_ID-113:  => setting[112] -->
        <div class="col-sm-8">
            <input type="text" name="storefront_product_tabs_2_section_tab_2_products" value="<?php echo e($setting[112]->plain_value); ?>" class="form-control">
        </div>
    <?php elseif((!empty($setting[110]->plain_value)) && (($setting[110]->plain_value == 'latest_products') || ($setting[110]->plain_value == 'recently_viewed_products'))): ?>
        <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>
        <!-- DB_ROW_ID-114:  => setting[13] -->
        <div class="col-sm-8">
            <input type="text" name="storefront_product_tabs_2_section_tab_2_products_limit" value="<?php echo e($setting[113]->plain_value); ?>" class="form-control">
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\laragon\www\cartpro\resources\views/admin/pages/storefront/home_page_section/product_tabs_two/tab2.blade.php ENDPATH**/ ?>