<div class="tab-pane fade show" aria-labelledby="product-attribute" id="attribute" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b><?php echo app('translator')->get('file.Attributes'); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="variants">
                
                <?php $__empty_1 = true; $__currentLoopData = $productAttributeValues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row">
                        <div class="col-5 form-group">
                            <label><?php echo e(__('file.Atrribute')); ?></label>
                            

                            <select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('file.Select Attribute')); ?>'>
                                <?php $__empty_2 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($values[0]->attribute_id == $item->id ? 'selected' : ''); ?> ><?php echo e($item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                <?php endif; ?>
                            </select>
                        </div>


                        <div class="col-5 form-group">
                            <label><?php echo e(__("file.Values")); ?></label>
                            <select name="attribute_value_id[]" multiple="multiple" id="attributeValueId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title="<?php echo app('translator')->get('file.Select Value'); ?>">
                                <?php $__currentLoopData = $attribute_values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attributeValue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($attributeValue->attribute_id == $values[0]->attribute_id): ?>
                                        <option value="<?php echo e($attributeValue->id); ?>"
                                                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($value->attribute_value_id==$attributeValue->id ? 'selected' :''); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            ><?php echo e($attributeValue->attrValueTranslation->value_name ?? $attributeValue->attrValueTranslationEnglish->value_name ?? null); ?>

                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="col-2">
                            <label><?php echo app('translator')->get('file.Delete'); ?></label><br>
                            <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="row">
                        <div class="col-5 form-group">
                            <label><?php echo e(__('file.Atrribute')); ?></label>
                            <select name="attribute_id[]" id="attributeId" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('file.Select Attribute')); ?>'>
                                <?php $__empty_1 = true; $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->attributeTranslation->attribute_name ?? $item->attributeTranslationEnglish->attribute_name ?? null); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="col-6 form-group">
                            <label><?php echo e(__("file.Values")); ?></label>
                            <select name="attribute_value_id[]" multiple id="attributeValueId" class="form-control selectpicker"  data-live-search="true" data-live-search-style="begins" title="<?php echo app('translator')->get('file.Select Value'); ?>">

                            </select>
                        </div>

                        <div class="col-1">
                            <label><?php echo app('translator')->get('file.Delete'); ?></label><br>
                            <span class="btn btn-default btn-sm del-row"><i class="dripicons-trash"></i></span>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <span class="btn btn-link add-more" id="addMore"><i class="dripicons-plus"></i> <?php echo app('translator')->get('file.Add New Attribute'); ?></span>


            <!-- Attribute Wise Inventory -->
            


        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/attribute.blade.php ENDPATH**/ ?>