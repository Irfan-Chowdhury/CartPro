<?php $__env->startSection('admin_content'); ?>

<section>
    
    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3">Create Coupon</h4>
        <div id="alert_message" role="alert"></div>
        <br>
    </div>

    <div class="container">
        <form id="submitForm" method="POST">
            <?php echo csrf_field(); ?>

            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-4">
                            <div class="list-group" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" href="#general" id="general-settings-general" data-toggle="list" role="tab" aria-controls="home">General</a>
                                <a class="list-group-item list-group-item-action"  href="#restriction" id="usage_restriction" data-toggle="list" role="tab">Usage Restrictions</a>
                                <a class="list-group-item list-group-item-action"  href="#limits" id="usage_limits" data-toggle="list" role="tab">Usage Limits</a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="tab-content" id="nav-tabContent">

                                <div class="tab-pane fade show active" id="general" aria-labelledby="general-settings-general" role="tabpanel">
                                    <div class="card">
                                        <h4 class="card-header"><b>General</b></h4>
                                        <hr>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Coupon Name')); ?><span class="text-danger">*</span></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="coupon_name" id="coupon_name" class="form-control" placeholder="Type Coupon Name" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('Code')); ?> <span class="text-danger">*</span></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="coupon_code" id="coupon_code" class="form-control" placeholder="Type Coupon Code" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('Discount Type')); ?> <span class="text-danger">*</span> </b></label>
                                                        <div class="col-sm-9">
                                                            <select name="discount_type" class="form-control selectpicker" title='<?php echo e(__('Select Coupon')); ?>'>
                                                                <option value="fixed"><?php echo e(__('Fixed')); ?></option>
                                                                <option value="percent"><?php echo e(__('Percent')); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('Value')); ?> <span class="text-danger">*</span></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" name="value" class="form-control" placeholder="Type Value">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('Free Shipping')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <div class="form-group form-check">
                                                                <input type="checkbox" class="form-check-input" name="free_shipping" value="1" id="isActive">
                                                                <span><?php echo e(__('Allow free shipping')); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b> <?php echo e(trans('Start Date')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="start_date" id="start_date" class="form-control date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b> <?php echo e(trans('End Date')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="text" name="end_date" id="end_date" class="form-control date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Status')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <div class="form-group form-check">
                                                                <input type="checkbox" class="form-check-input" name="is_active" value="1" id="isActive">
                                                                <span><?php echo e(__('Enable the coupon')); ?></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="restriction" aria-labelledby="usage_restriction" role="tabpanel">
                                    <div class="card">
                                        <h4 class="card-header"><b>Usage Restrictions</b></h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Minimum Spend')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" name="minimum_spend" class="form-control" placeholder="Type Minimum Spend" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Maximum Spend')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" name="maximum_spend" class="form-control" placeholder="Type Maximum Spend" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Products')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <select name="product_id[]"  class="form-control selectpicker" multiple data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Product')); ?>'>
                                                                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->productTranslation->product_name ?? $item->productTranslationEnglish->product_name ?? null); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <?php endif; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Categories')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <select name="category_id[]"  class="form-control selectpicker" multiple data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>'>
                                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php $__empty_1 = true; $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                        <?php if($key<1): ?>
                                                                            <?php if($value->local==$locale): ?>
                                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                                                            <?php elseif($value->local=='en'): ?>
                                                                                <option value="<?php echo e($item->id); ?>"><?php echo e($value->category_name); ?></option>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <option value=""><?php echo e(__('NULL')); ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade show" id="limits" aria-labelledby="usage_limits" role="tabpanel">
                                    <div class="card">
                                        <h4 class="card-header"><b>Usage Limits</b></h4>
                                        <hr>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Usage Limit Per Coupon')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" name="usage_limit_per_coupon" class="form-control" placeholder="Type Usage Limit Per Coupon" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-3 col-form-label"><b><?php echo e(trans('file.Usage Limit Per Customer')); ?></b></label>
                                                        <div class="col-sm-9">
                                                            <input type="number" min="0" name="usage_limit_per_customer" class="form-control" placeholder="Type Usage Limit Per Customer" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br><br>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success"><?php echo e(__('Submit')); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</section>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let date = $('.date');
    date.datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true,
        //endDate: new Date()
    });
    //----------Insert Data----------------------

    $('#submitForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: "<?php echo e(route('admin.coupon.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if (data.error) {
                    html = '<div class="alert alert-danger">' + data.error + '</div>';
                    $('#alert_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#submitForm')[0].reset();
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }

            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/coupon/create.blade.php ENDPATH**/ ?>