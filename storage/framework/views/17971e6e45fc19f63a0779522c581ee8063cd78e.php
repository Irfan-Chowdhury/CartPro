<div class="card">
    <h3 class="card-header p-3"><b>Strip</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="stripSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="status" <?php if(isset($setting_strip->status)): ?> <?php echo e($setting_strip->status=="1" ? 'checked':''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Strip</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" <?php if(isset($setting_strip->label)): ?> value="<?php echo e($setting_strip->label); ?>" <?php endif; ?>>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Description <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <textarea name="description" cols="30" rows="10" class="form-control"><?php if(isset($setting_strip->description)): ?> <?php echo e($setting_strip->description); ?> <?php endif; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Publishable Key<span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="publishable_key" <?php if(isset($setting_strip->publishable_key)): ?> <?php echo e($setting_strip->publishable_key=="1" ? 'checked':''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Free Shipping</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Secret<span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="secret_key" class="form-control" <?php if(isset($setting_strip->secret_key)): ?> value="<?php echo e($setting_strip->secret_key); ?>" <?php endif; ?>>
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


<?php /**PATH C:\xampp\htdocs\cartpro_related\3_cartpro_menu\resources\views/admin/pages/setting/payment_method/strip.blade.php ENDPATH**/ ?>