    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo app('translator')->get('file.Brand'); ?></b></label>
                            <select name="brand_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Brand')); ?>'>
                                <?php $__empty_1 = true; $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($item->id); ?>" <?php if(isset($product->brand_id)): ?> <?php if($item->id==$product->brand_id): ?> selected <?php endif; ?> <?php endif; ?> ><?php echo e($item->brandTranslation->brand_name ?? $item->brandTranslationEnglish->brand_name ?? null); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo app('translator')->get('file.Categories'); ?> <span class="text-danger">*</span></b></label>
                        <select name="category_id[]" id="categoryId" class="form-control selectpicker <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <option value="<?php echo e($item->id); ?>" <?php $__empty_2 = true; $__currentLoopData = $product->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?> <?php echo e($productCategory->id==$item->id ? 'selected':''); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?> <?php endif; ?>> <?php echo e($item->category_name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </select>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo app('translator')->get('file.Tax'); ?> Class <span class="text-danger">*</span></b></label>
                            <select name="tax_id" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__empty_1 = true; $__currentLoopData = $taxes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <option value="<?php echo e($tax->id); ?>" <?php if($tax->id == $product->tax_id): ?> selected <?php endif; ?>><?php echo e($tax->taxTranslation->tax_name ?? $tax->taxTranslationDefaultEnglish->tax_name ?? null); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>
                            </select>

                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo app('translator')->get('file.Tags'); ?></b></label>
                            <select name="tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->tagTranslation->count()>0): ?>
                                        <?php $__currentLoopData = $item->tagTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key<1): ?>
                                                <?php if($value->local==$local): ?>
                                                    <option value="<?php echo e($item->id); ?>"
                                                        <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($producttag->id == $item->id): ?>
                                                                selected
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <?php echo e($value->tag_name); ?>

                                                    </option>
                                                <?php elseif($value->local=='en'): ?>
                                                    <option value="<?php echo e($item->id); ?>"
                                                        <?php $__currentLoopData = $product->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($producttag->id == $item->id): ?>
                                                                selected
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <?php echo e($value->tag_name); ?>

                                                    </option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo app('translator')->get('file.Status'); ?></b></label>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="is_active" <?php if($product->is_active==1): ?> checked <?php endif; ?> value="1" id="isActive">
                                <span><?php echo e(__('Enable the product')); ?></span>
                            </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success btn-block"><?php echo e(__('file.Submit')); ?></button>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/sidebar.blade.php ENDPATH**/ ?>