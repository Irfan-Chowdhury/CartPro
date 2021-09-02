<div class="card">
    <h3 class="card-header p-3"><b>Facebook</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="facebookSubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Status</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="status" class="form-check-input" <?php echo e($setting_facebook->status=="1" ? 'checked':''); ?>>
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable Facebook Login</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>App ID <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="app_id" <?php if(isset($setting_facebook->app_id)): ?> value="<?php echo e($setting_facebook->app_id); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>App Secret <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="app_secret" class="form-control" <?php if(isset($setting_facebook->app_secret)): ?> value="<?php echo e($setting_facebook->app_secret); ?>" <?php endif; ?>>
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


<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/social_login/facebook.blade.php ENDPATH**/ ?>