   <!-- Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('file.Edit Category')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">

                <div class="container-fluid"><span id="errorMessageEdit"></span></div>

                <form method="post" id="updateForm" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="category_id" id="category_id">
                    <input type="hidden" name="category_translation_id" id="category_translation_id">

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('file.Category Name')); ?> *</label>
                            <input type="text" name="category_name" id="category_name_edit" required class="form-control" placeholder="<?php echo e(__('file.Category Name')); ?>">
                        </div>

                        <div class="form-group col-md-6 ">
                            <label><?php echo e(__('file.Parent Category')); ?> </label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('file.Select Category')); ?>' name="parent_id" id="parent_id_edit">
                                    <option value=""><?php echo e(trans('file.None')); ?></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>


                        <div class="col-md-6 form-group mt-3">
                            <label for="exampleFormControlFile1"><?php echo e(__('file.Insert Image')); ?></label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>

                        <div class="col-md-6 form-group mt-3">
                            <label for=""><?php echo e(__('file.Icon')); ?></label>
                            <input type="text" name="icon" id="cateogry_icon_edit" class="form-control" placeholder="las la-table">
                        </div>

                        <div class="col-md-6 form-group">
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input " value='1' name="top" id="top_edit">
                                <label class="form-check-label"  for="exampleCheck1"><?php echo e(__('file.Show in top categories section')); ?></label>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive_edit" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1"><?php echo e(__('file.Active')); ?></label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" name="action_button" id="updateButton" class="btn btn-primary"><?php echo app('translator')->get('file.Update'); ?></button>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </div>
<?php /**PATH /var/www/html/resources/views/lte/admin/pages/category/edit_modal.blade.php ENDPATH**/ ?>