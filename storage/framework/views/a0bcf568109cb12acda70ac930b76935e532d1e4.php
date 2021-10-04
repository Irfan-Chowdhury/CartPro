<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Footer')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="footerSubmit" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <!-- Footer Tag -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Footer Tags')); ?></b></label>
                        
                        <div class="col-sm-8">
                            <div class="form-check">
                                <select name="storefront_footer_tag_id[]" class="form-control selectpicker" multiple="multiple" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Tag')); ?>'>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__empty_1 = true; $__currentLoopData = $item->tagTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($value->local==$locale): ?>
                                                    <option value="<?php echo e($item->id); ?>" 
                                                        <?php $__currentLoopData = $array_footer_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $footerTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($array_footer_tags[$key2] == $item->id): ?> 
                                                                selected 
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                        <?php echo e($value->tag_name); ?>

                                                    </option> 
                                                    <?php break; ?>
                                            <?php elseif($value->locale=='en'): ?>
                                                <option value="<?php echo e($item->id); ?>" 
                                                    <?php $__currentLoopData = $array_footer_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $footerTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($array_footer_tags[$key2] == $item->id): ?> 
                                                            selected 
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                                    <?php echo e($value->tag_name); ?>

                                                </option> 
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Footer Copyright Text -->
                    <!-- DB_ROW_ID-36:  => setting[35] -->
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label"><b><?php echo e(__('Footer Copyright Text')); ?></b></label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input type="text" name="storefront_copyright_text" placeholder="Type Copyright Text" class="form-control" 
                                <?php $__empty_1 = true; $__currentLoopData = $setting[35]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($item->locale==$locale): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php elseif($item->locale=='en'): ?>
                                        value="<?php echo e($item->value); ?>" <?php break; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?> >
                            </div>
                        </div>
                    </div>
                    <br>



                    <!-- Accepted Payment Methods Image -->
                    <h4 class="text-bold"><?php echo e(__('Accepted Payment Methods Image')); ?></h4><br>
                    <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->title=='accepted_payment_method_image'): ?>
                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="paymentMethodImage" height="100px" width="100px">
                            <?php break; ?>
                        <?php elseif($key == ($total_storefront_images-1)): ?>
                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="paymentMethodImage" height="100px" width="100px">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="paymentMethodImage" height="100px" width="100px">
                    <?php endif; ?>
                    <br><br>
                    <input type="file" name="storefront_payment_method_image" class="form-control" onchange="showImage(this,'paymentMethodImage')">
                    <br><br>


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
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/storefront/general_setting/footer.blade.php ENDPATH**/ ?>