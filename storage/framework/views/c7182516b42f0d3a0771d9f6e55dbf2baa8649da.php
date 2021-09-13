<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">

                <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add_User')); ?></h5>
                <button type="button" data-dismiss="modal" id="close" aria-label="Close" class="close"><span
                            aria-hidden="true">×</span></button>
            </div>

            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" action="<?php echo e(route('user_list.update')); ?>" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>
                    <div class="row">

                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('First Name')); ?> *</label>
                            <input type="text" name="first_name" id="first_name" required class="form-control"
                                   placeholder="<?php echo e(__('First Name')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Last Name')); ?> *</label>
                            <input type="text" name="last_name" id="last_name" required class="form-control"
                                   placeholder="<?php echo e(__('Last Name')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Username')); ?> *</label>
                            <input type="text" name="username" id="username" required class="form-control"
                                   placeholder="<?php echo e(__('User Name')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Phone')); ?> *</label>
                            <input type="text" name="phone" id="phone" required class="form-control"
                                   placeholder="<?php echo e(__('phone')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Email')); ?> *</label>
                            <input type="email" name="email" id="email" required class="form-control"
                                   placeholder="<?php echo e(__('email')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Password')); ?> *</label>
                            <input type="password" name="password" id="password" class="form-control"
                                   placeholder="<?php echo e(__('password')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Confirm password')); ?> *</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                   placeholder="<?php echo e(__('Confirm Password')); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(__('Role')); ?> *</label>
                            <select class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" required name="role" id="role">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleFormControlFile1"><?php echo e(__('Image')); ?></label>
                            <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1">
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="isActive" id="default" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1"><?php echo e(__('Active')); ?></label>
                            </div>
                        </div>
                        <div class="container">
                            <div class="form-group" align="center">
                                <input type="hidden" name="action" id="action"/>
                                <input type="hidden" name="hidden_id" id="hidden_id"/>
                                <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                                       value=<?php echo e(trans('file.Add')); ?>>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/user/form_modal.blade.php ENDPATH**/ ?>