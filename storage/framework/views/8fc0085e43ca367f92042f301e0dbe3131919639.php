<div class="card">
    <h3 class="card-header"><b><?php echo e(__('Logo')); ?></b></h3>
    <hr>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form id="logoSubmit" action="<?php echo e(route('admin.storefront.logo.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <!-- Favicon Logo -->
                    <h5 class="text-bold"><?php echo e(__('Favicon')); ?></h5><br>
                    <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->title=='favicon_logo'): ?>
                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="fevicon" height="100px" width="100px">
                            <?php break; ?>
                        <?php elseif($key == ($total_storefront_images-1)): ?>
                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="fevicon" height="100px" width="100px">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="fevicon" height="100px" width="100px">
                    <?php endif; ?>
                    <br><br>
                    <input type="file"   name="image_favicon_logo" id="faviconLogo" class="form-control" onchange="showImage(this,'fevicon')">
                    <input type="hidden" name="title_favicon_logo" value="favicon_logo">
                    <br><br>



                    <!-- Header Logo -->
                    <h5 class="text-bold"><?php echo e(__('Header Logo')); ?></h5><br>
                    <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->title=='header_logo'): ?>
                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="header_logo" height="100px" width="100px">
                            <?php break; ?>
                        <?php elseif($key == ($total_storefront_images-1)): ?>
                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="header_logo" height="100px" width="100px">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="header_logo" height="100px" width="100px">
                    <?php endif; ?>
                    <br><br>
                    <input type="file"   name="image_header_logo" id="headerLogo" class="form-control" onchange="showImage(this,'header_logo')">
                    <input type="hidden" name="title_header_logo" value="header_logo">
                    <br><br>


                    <!-- Mail Logo -->
                    <h5 class="text-bold"><?php echo e(__('Mail Logo')); ?></h5><br>
                    <?php $__empty_1 = true; $__currentLoopData = $storefront_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($item->title=='mail_logo'): ?>
                            <img src="<?php echo e(asset('public/'.$item->image)); ?>" id="mail_logo" height="100px" width="100px">
                            <?php break; ?>
                        <?php elseif($key == ($total_storefront_images-1)): ?>
                            <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="mail_logo" height="100px" width="100px">
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <img src="<?php echo e(asset('public/images/empty.jpg')); ?>" id="mail_logo" height="100px" width="100px">
                    <?php endif; ?>
                    <br><br>
                    <input type="file"   name="image_mail_logo" id="mail_logo" class="form-control" onchange="showImage(this,'mail_logo')">
                    <input type="hidden" name="title_mail_logo" value="mail_logo">
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
<?php /**PATH D:\laragon\www\cartpro\resources\views/admin/pages/storefront/general_setting/logo.blade.php ENDPATH**/ ?>