<!--Create Modal -->
<div class="modal fade" id="createModalForm" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createModalLabel"><b>Add New Language</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" id="submitForm" action="<?php echo e(route('admin.setting.language.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">

                        
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Language Name</b></label>
                            <div class="col-sm-8">
                                <input type="text" name="language_name" id="navbarText" class="form-control <?php $__errorArgs = ['language_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('language_name')); ?>" id="inputEmail3" placeholder="Type Your Language Name" >
                                <?php $__errorArgs = ['language_name'];
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
                            <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Local</b></label>
                            <div class="col-sm-8">
                                <input type="text" name="local" id="navbarText" class="form-control  <?php $__errorArgs = ['local'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('local')); ?>" id="inputEmail3" placeholder="Example: 'en', 'bn', 'fr' etc." >
                                <?php $__errorArgs = ['local'];
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
                            <label class="col-md-4 col-form-label"><b>Status</b></label>
                            <div class="col-md-8 form-check">
                                <input class="form-check-input" type="checkbox" name="default" id="default" value="1" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">Default Language</label>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-2"></div>
                </div>

                    
                
                </div>
                <div class="row mb-5">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <div id="alertMessageBox">
                            <div id="alertMessage" class="text-light"></div>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                        
                        <button type="submit" class="btn btn-primary" id="save-button">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>   
                    </div>
                </div>
            </form>

      </div>
    </div>
  </div><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/pages/setting/language/create.blade.php ENDPATH**/ ?>