<div class="tab-pane fade show" aria-labelledby="product-images" id="images" role="tabpanel">
    <div class="card">
        <h4 class="card-header"><b><?php echo e(__('file.Images')); ?></b></h4>
        <hr>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Basic Image')); ?> <span class="text-danger">*</span> </b></label>
                        <div class="col-sm-8">
                            <input type="file" name="base_image" id="baseImage" class="form-control <?php $__errorArgs = ['base_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" onchange="showImage(this,'item_photo')">
                            <?php if(($product->baseImage!==null) && ($product->baseImage->type=='base')): ?>
                                <?php if(isset($product->baseImage->image) && Illuminate\Support\Facades\File::exists(public_path($product->baseImage->image))): ?>
                                    <img id="item_photo" src="<?php echo e(asset($product->baseImage->image)); ?>"  height="100px" width="100px">
                                <?php else: ?>
                                    <img src="https://dummyimage.com/150x150/e5e8ec/e5e8ec&text=Product" width="150"> &nbsp; &nbsp;
                                <?php endif; ?>
                            <?php else: ?>
                                <img src="https://dummyimage.com/150x150/e5e8ec/e5e8ec&text=Product" width="150">
                                    &nbsp; &nbsp;
                            <?php endif; ?>
                            <?php $__errorArgs = ['base_image'];
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

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b> <?php echo e(__('file.Additional Images')); ?> </b></label>
                        <div class="col-sm-8">
                            <input type="file" name="additional_images[]" multiple id="multipleImages" class="form-control <?php $__errorArgs = ['additional_images'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <?php if($product->additionalImage!==null): ?>
                                <?php $__currentLoopData = $product->additionalImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(isset($item->image) && Illuminate\Support\Facades\File::exists(public_path($item->image))): ?>
                                        <img src="<?php echo e(asset($item->image)); ?>"  height="100px" width="100px">
                                    <?php else: ?>
                                        <img src="https://dummyimage.com/150x150/e5e8ec/e5e8ec&text=Product" width="150"> &nbsp; &nbsp;
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <img src="https://dummyimage.com/150x150/e5e8ec/e5e8ec&text=Product" width="150"> &nbsp; &nbsp;
                            <?php endif; ?>
                            <?php $__errorArgs = ['additional_images'];
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

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /var/www/html/cartpro/cartproshop_new/resources/views/admin/pages/product/includes/edit/image.blade.php ENDPATH**/ ?>