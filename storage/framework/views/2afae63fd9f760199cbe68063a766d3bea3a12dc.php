<h4 class="mt-3 text-bold"><?php echo e(__('file.Vertical Products 3')); ?></h4><br>
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><b><?php echo e(__('file.Title')); ?></b></label>
    <div class="col-sm-8">
        <input type="text" name="storefront_vertical_product_3_title" class="form-control" placeholder="Type Title" value="<?php echo e($setting[143]->settingTranslation->value ?? null); ?>" >
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-4 col-form-label"><b>Type</b></label>
    <div class="col-sm-8">
        <select name="storefront_vertical_product_3_type" id="storefrontVerticalProduct_3_Type" class="form-control" data-live-search="true" data-live-search-style="begins">
            <option value="">-- Select Type --</option>
            <option value="<?php echo e(__('category_products')); ?>" <?php echo e($setting[144]->plain_value == 'category_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Category Products')); ?></option>
            <option value="<?php echo e(__('custom_products')); ?>" <?php echo e($setting[144]->plain_value == 'custom_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Custom Products')); ?></option>
            <option value="<?php echo e(__('latest_products')); ?>" <?php echo e($setting[144]->plain_value == 'latest_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Latest Products')); ?></option>
            <option value="<?php echo e(__('recently_viewed_products')); ?>" <?php echo e($setting[144]->plain_value == 'recently_viewed_products' ? 'selected="selected"' : ''); ?>><?php echo e(__('Recently Viewed Products')); ?></option>
        </select>
    </div>
</div>
<?php if((!empty($setting[144]->plain_value)) && ($setting[144]->plain_value == 'category_products')): ?>
    <div class="form-group row" id="verticalCategoryFeild_3">
        <label class="col-sm-4 col-form-label"><b>Category</b></label>
        <div class="col-sm-8">
            <select name="storefront_vertical_product_3_category_id" id="storefrontVerticalProduct_3_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e($setting[145]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($item->catTranslation->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
<?php else: ?>
    <div class="form-group row" id="verticalCategoryFeild_3">
        <label class="col-sm-4 col-form-label"><b>Category</b></label>
        <div class="col-sm-8">
            <select name="storefront_vertical_product_3_category_id" id="storefrontVerticalProduct_3_CategoryId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>" <?php echo e($setting[145]->plain_value == $item->id ? 'selected="selected"' : ''); ?>><?php echo e($item->catTranslation->category_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
<?php endif; ?>

<div class="form-group row" id="verticalProductTabsField_3">
    <?php if((!empty($setting[144]->plain_value)) && ($setting[144]->plain_value == 'custom_products')): ?>
        <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products')); ?></b></label>
        <div class="col-sm-8">
            <input type="text" name="storefront_vertical_product_3_products" value="<?php echo e($setting[146]->plain_value); ?>" class="form-control">
        </div>
    <?php elseif((!empty($setting[144]->plain_value)) && (($setting[144]->plain_value == 'latest_products') || ($setting[144]->plain_value == 'recently_viewed_products'))): ?>
        <label class="col-sm-4 col-form-label"><b> <?php echo e(__('Products Limit')); ?></b></label>
        <div class="col-sm-8">
            <input type="text" name="storefront_vertical_product_3_products_limit" value="<?php echo e($setting[147]->plain_value); ?>" class="form-control">
        </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/home_page_section/flash_sale_vertical_product/tab3.blade.php ENDPATH**/ ?>