   <!-- Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Add Category')); ?></h5> &nbsp;&nbsp;&nbsp;&nbsp; <span id="error_message_edit"></span>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">

                <form method="post" id="updateForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="category_id" id="category_id">
                    <input type="hidden" name="category_translation_id" id="category_translation_id">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Category Name')); ?> *</label>
                            <input type="text" name="category_name" id="category_name_edit" required class="form-control" placeholder="<?php echo e(__('Category Name')); ?>">
                        </div>

                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Description')); ?> *</label>
                            <input type="text" name="description" id="description_edit" required class="form-control" placeholder="<?php echo e(__('Description Name')); ?>">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label><?php echo e(__('Parent Category')); ?> </label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category')); ?>' name="parent_id" id="parent_id_edit">
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item->categoryTranslation->count()>0): ?>
                                        <?php $__currentLoopData = $item->categoryTranslation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($key<1): ?>
                                                <?php if($value->local==$currentActiveLocal): ?>
                                                    <option value="<?php echo e($value->category_id); ?>"><?php echo e($value->category_name); ?></option>
                                                <?php elseif($value->local=='en'): ?>
                                                    <option value="<?php echo e($value->category_id); ?>"><?php echo e($value->category_name); ?></option>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <div class="form-group col-md-6  mb-3">
                            <label><?php echo e(__('Position')); ?> *</label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Position')); ?>' name="description_position" id="description_position_edit" required="">
                                <option value="1"><?php echo e(__('Top')); ?></option>
                                <option value="0"><?php echo e(__('Bottom')); ?></option>
                            </select>
                        </div>

                        <div class="col-md-6 form-group mt-5">
                            <label for="exampleFormControlFile1"><?php echo e(__('Insert Image')); ?></label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>

                        <div class="col-md-6 form-group mt-5">
                            <label for=""><?php echo e(__('Icon')); ?></label>
                            <input type="text" name="category_icon" id="cateogry_icon_edit" class="form-control" placeholder="las la-table">
                        </div>

                        <div>
                            <div class="col-md-3 form-group">
                                    <div class="form-check mt-5">
                                        <input type="checkbox" class="form-check-input " value='1' name="featured" id="featured_edit">
                                        <label class="form-check-label"  for="exampleCheck1"><?php echo e(__('Featured')); ?></label>
                                    </div>
                            </div>
                            <div class="col-md-3 form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="isActive_edit" value="1" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1"><?php echo e(__('Active')); ?></label>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="action_button" id="submitButton" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/category/edit_modal.blade.php ENDPATH**/ ?>