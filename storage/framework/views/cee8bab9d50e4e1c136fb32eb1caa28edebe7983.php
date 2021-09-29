<div class="card">
    <h3 class="card-header p-3"><b>Free Shipping</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="freeShippingSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="shipping_status" <?php if(isset($setting_free_shipping->shipping_status)): ?> <?php echo e($setting_free_shipping->shipping_status=="1" ? 'checked':''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Free Shipping</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" <?php if(isset($setting_free_shipping->label)): ?> value="<?php echo e($setting_free_shipping->label); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Minimum Amount</b></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" name="minimum_amount" class="form-control" <?php if(isset($setting_free_shipping->minimum_amount)): ?> value="<?php echo e($setting_free_shipping->minimum_amount); ?>" <?php endif; ?>>
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


<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/shipping_method/free_shipping.blade.php ENDPATH**/ ?>