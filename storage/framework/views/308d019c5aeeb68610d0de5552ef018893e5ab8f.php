<select name="category_id" id="category_id" class="col-md-12 form-control">
    <option value=""><?php echo e(__('-- Select Category --')); ?></option>
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
<?php /**PATH D:\laragon\www\cartpro\resources\views/admin/includes/dependancy/dependancy_category.blade.php ENDPATH**/ ?>