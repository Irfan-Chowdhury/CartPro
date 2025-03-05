<div class="tab-pane fade show" aria-labelledby="product-seo" id="seo" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b><?php echo e(__('file.Weight')); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">
                            <b> <?php echo e(__('file.Weight')); ?> </b> <i>[KG]</i> <br>
                        </label>
                        <div class="col-sm-8">
                            <input name="weight" id="weight" class="form-control <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="inputEmail3" placeholder="Type Weight Value (Ex: 10)" value="<?php echo e($product->weight); ?>">
                            <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="weight_base_calculation" <?php if($product->weight_base_calculation): ?> checked <?php endif; ?> value="1">
                                <span><b>I want weight base calculation.</b></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <div class="col-sm-12">
                            <div class="form-group form-check">
                                <i> <mark> Price will be calculated on weight basis. (1 KG= 1000 gm). On the other hand if your product depends on weight basis like hen, fruits, milk etc. then set <b>"1"</b> in weight input field and enable the checkbox because product will calculate 1 KG = 1000 gm basis and the attribute value should be assigned as like <b>"200 gm"</b>, <b>"500 gm"</b>, <b>"1000 gm"</b> etc.</mark> </i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/weight.blade.php ENDPATH**/ ?>