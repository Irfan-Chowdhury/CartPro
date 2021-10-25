<div class="card">
    <h3 class="card-header p-3"><b>Local Pickup</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="localPickupSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1"  name="pickup_status" class="form-check-input" <?php if(isset($setting_local_pickup->pickup_status)): ?> <?php echo e($setting_local_pickup->pickup_status=="1" ? 'checked':''); ?> <?php endif; ?> >
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Local Pickup</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Label <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="label" class="form-control" <?php if(isset($setting_local_pickup->pickup_status)): ?> value="<?php echo e($setting_local_pickup->pickup_status); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Cost <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="number" min="0" name="cost" class="form-control" <?php if(isset($setting_local_pickup->cost)): ?> value="<?php echo e($setting_local_pickup->cost); ?>" <?php endif; ?>>
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


<?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/setting/shipping_method/local_pickup.blade.php ENDPATH**/ ?>