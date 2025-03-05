    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group">
                        <label for="inputEmail3"><b><?php echo e(__('file.Product Name')); ?> <span class="text-danger">*</span></b></label>
                            <input type="text" name="product_name" id="productName" class="form-control <?php $__errorArgs = ['product_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail3" value="<?php echo e($product->productTranslation->product_name ?? $product->productTranslationEnglish->product_name ?? null); ?>" placeholder="Type Product Name">
                            <input type="hidden" name="product_translation_id" class="form-control" id="inputEmail3" <?php if(isset($product->productTranslation->id)): ?> value="<?php echo e($product->productTranslation->id ?? $product->productTranslation->id); ?>" <?php endif; ?>>
                            <?php $__errorArgs = ['product_name'];
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
                        <label for="inputEmail3"><b><?php echo e(__('file.Description')); ?> <span class="text-danger">*</span></b></label>
                            <textarea name="description" id="description" class="form-control text-editor">
                                <?php echo htmlspecialchars_decode($product->productTranslation->description ?? $product->productTranslationEnglish->description ?? null); ?>

                            </textarea>
                            <?php $__errorArgs = ['description'];
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
                </div>
            </div>

        </div>
    </div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/general.blade.php ENDPATH**/ ?>