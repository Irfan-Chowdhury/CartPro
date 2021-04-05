<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><span id="general_result"></span></div>
    <div class="container-fluid mb-3">
    </div>
    <h1>Edit</h1>
    <br>

    <form method="post"  class="form-horizontal" action="<?php echo e(route('brand.update',$brand->id)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

            <input type="hidden" name="brand_id" value="<?php echo e($brand->id); ?>">
            <input type="hidden" name="local" value="<?php echo e($local); ?>">


            <div class="col-md-6 form-group">
                <label><?php echo e(__('Brand Name')); ?></label>
                <input type="text" name="brand_name" id="brand_name" required class="form-control" <?php if(isset($brandTranslation->brand_name)): ?> value="<?php echo e($brandTranslation->brand_name); ?>" <?php else: ?> value="" <?php endif; ?>>
            </div>

            <div class="mt-3 col-md-6 form-group">
                <?php if($brand->brand_logo!==null): ?>
                    <img id="item_photo" src="<?php echo e(asset('public/'.$brand->brand_logo)); ?>"  height="100px" width="100px">
                <?php else: ?>
                    <img id="item_photo" src="<?php echo e(asset('public/images/empty.jpg')); ?>"  height="100px" width="100px">
                <?php endif; ?>
                <input type="file" name="brand_logo" id="brandLogo" class="mt-3 form-control" onchange="showImage(this,'item_photo')">
            </div>

            <div class="col-md-4 form-group">
                <label><b><?php echo e(__('Status')); ?></b></label>
                <div class="col-md-8 form-check">
                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive" <?php if($brand->is_active==1): ?> checked value="1" <?php endif; ?>  id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">Active</label>
                </div>
            </div>

            <div class="col form-group" align="center">
                <input type="hidden" name="action" id="action"/>
                <input type="hidden" name="hidden_id" id="hidden_id"/>
                <button type="submit" class="btn btn-success">Update</button>
                
            </div>
    </form>

</section>

<script type="text/javascript">
    function showImage(data, imgId){
        if(data.files && data.files[0]){
            var obj = new FileReader();

            obj.onload = function(d){
                var image = document.getElementById(imgId);
                image.src = d.target.result;
            }
            obj.readAsDataURL(data.files[0]);
        }
    }
    //Image Show Before Upload End
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/brand/edit.blade.php ENDPATH**/ ?>