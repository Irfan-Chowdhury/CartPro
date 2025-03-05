<div class="tab-pane fade show" aria-labelledby="product-additional" id="additional" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b><?php echo e(__('file.Additional')); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('file.Short Description')); ?> </b></label>
                        <div class="col-sm-8">
                            <textarea name="short_description" id="short_description" class="form-control" rows="5">
                                 <?php echo e($product->productTranslation->short_description ?? $product->productTranslationEnglish->short_description ?? null); ?>


                            </textarea>
                            <?php $__errorArgs = ['short_description'];
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

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Product New From')); ?></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="new_from" id="newFrom" value="<?php echo e($product->new_from); ?>" class="form-control datepicker">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Product New To')); ?></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="new_to" id="newTo" value="<?php echo e($product->new_to); ?>" class="form-control datepicker">
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/additional.blade.php ENDPATH**/ ?>