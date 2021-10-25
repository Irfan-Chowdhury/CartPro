<div class="card">
    <h3 class="card-header p-3"><b>Flat Rate</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="flatRateSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="flat_status" class="form-check-input" <?php if(isset($setting_flat_rate->flat_status)): ?> <?php echo e($setting_flat_rate->flat_status=="1" ? 'checked':''); ?> <?php endif; ?>>
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Flat Rate</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" <?php if(isset($setting_flat_rate->label)): ?> value="<?php echo e($setting_flat_rate->label); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Cost <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="cost" class="form-control" <?php if(isset($setting_flat_rate->cost)): ?> value="<?php echo e($setting_flat_rate->cost); ?>" <?php endif; ?>>
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


<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/setting/shipping_method/flat_rate.blade.php ENDPATH**/ ?>