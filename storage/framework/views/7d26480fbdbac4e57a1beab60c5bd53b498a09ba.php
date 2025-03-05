<div class="tab-pane fade show" aria-labelledby="product-inventory" id="inventory" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b><?php echo e(__('file.Inventory')); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.SKU')); ?> <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="sku" id="sku" class="form-control <?php $__errorArgs = ['sku'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail3" value="<?php echo e($product->sku); ?>">
                            <?php $__errorArgs = ['sku'];
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
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Inventroy Management')); ?></b></label>
                        <div class="col-sm-8">
                            <select class="form-control selectpicker" name="manage_stock" id="manageStock" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('file.Select Inventory')); ?>'>
                                <option value="0" <?php if($product->manage_stock==0): ?> selected <?php endif; ?>><?php echo e(__("file.Don't Track Inventory")); ?></option>
                                <option value="1" <?php if($product->manage_stock==1): ?> selected <?php endif; ?>><?php echo e(__('file.Track Inventory')); ?></option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row" id="quantityField">
                        <?php if($product->qty): ?>
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Quantity')); ?> &nbsp;<span class="text-danger">*</span> </b></label>
                            <div class="col-sm-8">
                                <input type="number" min="0" name="qty" id="qty" class="form-control" id="inputEmail3" value="<?php echo e($product->qty); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Stock Availibility')); ?></b></label>
                        <div class="col-sm-8">
                            <select name="in_stock" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Stock')); ?>'>
                                <option value="1" <?php if($product->in_stock==1): ?> selected <?php endif; ?>><?php echo e(__("file.In Stock")); ?></option>
                                <option value="0" <?php if($product->in_stock==0): ?> selected <?php endif; ?>><?php echo e(__('file.Out Stock')); ?></option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/inventory.blade.php ENDPATH**/ ?>