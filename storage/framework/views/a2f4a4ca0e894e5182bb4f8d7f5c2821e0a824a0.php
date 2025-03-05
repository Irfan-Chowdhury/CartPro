<div class="tab-pane fade show" aria-labelledby="product-price" role="tabpanel" id="price">
    <div class="card">
        <h4 class="card-header"><b><?php echo app('translator')->get('file.Price'); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Price')); ?> <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="price" id="price" class="form-control" id="inputEmail3" <?php if(env('FORMAT_NUMBER')): ?> value="<?php echo e(number_format((float)$product->price, env('FORMAT_NUMBER'), '.', '')); ?>" <?php endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Special Price')); ?></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="special_price" id="specialPrice" class="form-control" id="inputEmail3" <?php if(env('FORMAT_NUMBER')): ?> value="<?php echo e(number_format((float)$product->special_price, env('FORMAT_NUMBER'), '.', '')); ?>" <?php endif; ?> >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Special Price Type')); ?></b></label>
                        <div class="col-sm-8">
                            <select name="special_price_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('file.Select Price Type')); ?>'>
                                <option value="Fixed" <?php if($product->special_price_type=='Fixed'): ?> selected <?php endif; ?>><?php echo e(__('Fixed')); ?></option>
                                <option value="Parcent" <?php if($product->special_price_type=='Parcent'): ?> selected <?php endif; ?>><?php echo e(__('Parcent')); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Special Price Start')); ?></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="special_price_start" value="<?php echo e($product->special_price_start); ?>" id="specialPriceStart" class="form-control datepicker">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Special Price End')); ?></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="special_price_end" value="<?php echo e($product->special_price_end); ?>" id="specialPriceEnd" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/price.blade.php ENDPATH**/ ?>