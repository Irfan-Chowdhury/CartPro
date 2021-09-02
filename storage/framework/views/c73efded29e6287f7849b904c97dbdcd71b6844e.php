<div class="card">
    <h3 class="card-header p-3"><b>Currency</b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="currencySubmit">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Supported Currencies <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <select name="supported_currencies[]" id="supportedCurrencies" class="form-control selectpicker" multiple="multiple" data-live-search="true" title='<?php echo e(__('Select Currency')); ?>'>
                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <option value="<?php echo e($currency->currency_name); ?>"
                                            <?php if(empty(!$selected_currencies)): ?>
                                                <?php $__empty_1 = true; $__currentLoopData = $selected_currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <?php if($currency->currency_name == $value): ?>
                                                        selected
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <?php endif; ?>
                                            <?php endif; ?>> <?php echo e($currency->currency_name); ?>

                                        </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Default Currency <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="default_currency" <?php if(isset($setting_currency->default_currency)): ?> value="<?php echo e($setting_currency->default_currency); ?>" <?php endif; ?>>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Currency Format <span class="text-danger">*</span></b></label>
                        <div class="col-sm-8">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="prefix" name="currency_format" <?php echo e($setting_currency->currency_format=="prefix" ? 'checked':''); ?>>
                                <label class="form-check-label">Prefix</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="suffix" name="currency_format" <?php echo e($setting_currency->currency_format=="suffix" ? 'checked':''); ?>>
                                <label class="form-check-label">Suffix</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label"><b>Exchange Rate Service</b></label>
                        <div class="col-sm-8">
                            <select name="exchange_rate_service" id="exchangeRateService" class="form-control">
                                <option value="">Select Service</option>
                                <option value="fixer" <?php echo e($setting_currency->exchange_rate_service=="fixer" ? 'selected':''); ?>>Fixer</option>
                                <option value="forge" <?php echo e($setting_currency->exchange_rate_service=="forge" ? 'selected':''); ?>>Forge</option>
                                <option value="currency_data_feed" <?php echo e($setting_currency->exchange_rate_service=="currency_data_feed" ? 'selected':''); ?>>Currency Data Feed</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="exchangeRateServiceField">
                        <?php if(isset($setting_currency->fixer_access_key)): ?>
                            <label class="col-sm-4 col-form-label"><b>Fixer Access Key <span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="fixer_access_key" value="<?php echo e($setting_currency->fixer_access_key); ?>">
                            </div>
                        <?php elseif(isset($setting_currency->forge_api_key)): ?>
                            <label class="col-sm-4 col-form-label"><b>Forge API Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="forge_api_key" value="<?php echo e($setting_currency->forge_api_key); ?>">
                            </div>
                        <?php elseif(isset($setting_currency->currency_data_feed_key)): ?>
                            <label class="col-sm-4 col-form-label"><b>Currency Data Feed API Key<span class="text-danger">*</span></b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="currency_data_feed_key" value="<?php echo e($setting_currency->currency_data_feed_key); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Auto Refresh</b></label>
                        <div class="col-sm-8">
                            <div class="form-check mt-1">
                                <input type="checkbox" value="1" name="auto_refresh" <?php echo e($setting_currency->auto_refresh=="1" ? 'checked':''); ?> class="form-check-input">
                                <label class="p-0 form-check-label" for="exampleCheck1">Enable auto-refreshing currency rates</label>
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






<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/general_setting/currency.blade.php ENDPATH**/ ?>