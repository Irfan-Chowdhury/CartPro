<div class="card">
    <h3 class="card-header p-3"><b>Store</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="storeSubmit" method="POST" action="<?php echo e(route('admin.setting.store.store_or_update')); ?>">

                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Store Name <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_name" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_name); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Store Tagline</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_tagline" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_tagline); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Email <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_email" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_email); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Phone <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_phone" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_phone); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Address 1 </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_address_1" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_address_1); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Address 2 </b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_address_2" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_address_2); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store City</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_city" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_city); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Country</b></label>
                        <div class="col-sm-8">
                            <select name="store_country" class="form-control selectpicker" data-live-search="true" title='<?php echo e(__('Select Conutry')); ?>'>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($country->country_name); ?>" <?php if(empty(!$setting_store)): ?>  <?php echo e(($country->country_name == $setting_store->store_country) ? "selected" : ''); ?> <?php endif; ?>><?php echo e($country->country_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Store Zip</b></label>
                        <div class="col-sm-8">
                            <input type="text" name="store_zip" <?php if(empty(!$setting_store)): ?> value="<?php echo e($setting_store->store_zip); ?>" <?php endif; ?> class="form-control">
                        </div>
                    </div>
                    <br>

                    <h3 class="text-bold">Privacy Settings</h3><br>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Hide Store Phone</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="hide_store_phone" <?php if(empty(!$setting_store)): ?> <?php echo e($setting_store->hide_store_phone =="1" ? "checked" : ''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Hide store phone from the storefront</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Hide Store Email</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="hide_store_email" <?php if(empty(!$setting_store)): ?> <?php echo e($setting_store->hide_store_email =="1" ? "checked" : ''); ?> <?php endif; ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Hide store email from the storefront</label>
                            </div>
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





<?php /**PATH D:\laragon\www\cartpro\resources\views/admin/pages/setting/general_setting/store.blade.php ENDPATH**/ ?>