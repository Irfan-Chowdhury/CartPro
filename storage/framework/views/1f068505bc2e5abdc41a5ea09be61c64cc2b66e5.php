<div class="card">
    <h3 class="card-header p-2"><b><?php echo e(__('Top Brands')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="topBrandsSubmit">
                    <?php echo csrf_field(); ?>

                    <!-- DB_ROW_ID-80:  => setting[79] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Section Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" <?php if($setting[79]->plain_value==1): ?> checked <?php endif; ?> value="1" name="storefront_top_brands_section_enabled" class="form-check-input">
                                <label class="form-check-label" for="exampleCheck1">Enable brands section</label>
                            </div>
                        </div>
                    </div>


                    <!-- Top Brands -->
                    <!-- DB_ROW_ID-81:  => setting[80] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Top Brands')); ?></b></label>
                        <div class="col-sm-8">
                            <select name="storefront_top_brands[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Tag')); ?>'>
                               <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php $__currentLoopData = $array_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($array_brands[$key2] == $item->id): ?>
                                                selected
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> > <?php echo e($item->brandTranslation->brand_name ?? $item->brandTranslationEnglish->brand_name ?? null); ?>

                                    </option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                               <?php endif; ?>

                                
                            </select>
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

<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/home_page_section/top_brands.blade.php ENDPATH**/ ?>