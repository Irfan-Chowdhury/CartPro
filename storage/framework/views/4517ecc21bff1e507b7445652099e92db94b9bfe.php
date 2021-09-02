<div class="card">
    <h3 class="card-header p-3"><b>Paytm</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="paytmSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="status" <?php if(isset($setting_paytm->status)): ?> <?php echo e($setting_paytm->status=="1" ? 'checked':''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Paytm</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" <?php if(isset($setting_paytm->label)): ?> value="<?php echo e($setting_paytm->label); ?>" <?php endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Description <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <textarea name="description" cols="30" rows="10" class="form-control"><?php if(isset($setting_paytm->description)): ?> <?php echo e($setting_paytm->description); ?> <?php endif; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Sandbox</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="sandbox" <?php if(isset($setting_paytm->sandbox)): ?> <?php echo e($setting_paytm->sandbox=="1" ? 'checked':''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Free Shipping</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Merchant ID <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="merchant_id" class="form-control" <?php if(isset($setting_paytm->merchant_id)): ?> value="<?php echo e($setting_paytm->merchant_id); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Merchant Key<span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="merchant_key" class="form-control" <?php if(isset($setting_paytm->merchant_key)): ?> value="<?php echo e($setting_paytm->merchant_key); ?>" <?php endif; ?>>
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


<?php /**PATH C:\xampp\htdocs\3_cartpro_menu\resources\views/admin/pages/setting/payment_method/paytm.blade.php ENDPATH**/ ?>