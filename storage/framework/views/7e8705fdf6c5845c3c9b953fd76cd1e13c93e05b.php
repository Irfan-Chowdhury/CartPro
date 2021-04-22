<?php $__env->startSection('admin_content'); ?>

<div class="container-fluid"><span id="alert_message"></span></div>
<div class="container-fluid mb-3">

    <div class="d-flex">
        <div class="p-2">
            <h2 class="font-weight-bold mt-3">Storefront</h2>
        </div>
        <div class="ml-auto p-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Storefront</li>
                </ol>
            </nav>
        </div>
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col-4">
              <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action active" id="general-settings-general" data-toggle="list" href="#general" role="tab" aria-controls="home">General</a>
                <a class="list-group-item list-group-item-action" id="menus-settings-menus" data-toggle="list" href="#menus" role="tab" aria-controls="messages">Menus</a>
                <a class="list-group-item list-group-item-action" id="logo-settings-logo" data-toggle="list" href="#logo" role="tab" aria-controls="profile">Logo</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Footer</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Newsletter</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Features</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Product Page</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Social Links</a>
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">

                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-settings-general">
                        <?php echo $__env->make('admin.pages.storefront.general_setting.general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>

                    <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-settings-logo">
                        <div class="card">
                            <div class="card-body">
                                <p>Cupidatat quis ad sint excepteur laborum in esse qui. Et excepteur consectetur ex nisi eu do cillum ad laborum. Mollit et eu officia dolore sunt Lorem culpa qui commodo velit ex amet id ex. Officia anim incididunt laboris deserunt anim aute dolor incididunt veniam aute dolore do exercitation. Dolor nisi culpa ex ad irure in elit eu dolore. Ad laboris ipsum reprehenderit irure non commodo enim culpa commodo veniam incididunt veniam ad.</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="menus" role="tabpanel" aria-labelledby="menus-settings-menus">
                        <div class="card">
                            <h4 class="card-header"><b>Menus</b></h4>
                            <hr>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <form id="menuSubmit" action="<?php echo e(route('admin.storefront.menu.store')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>

                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Navbar Text</b></label>
                                                <div class="col-sm-8">
                                                    <!-- setting[7] => DB_ROW_ID-8: storefront_navbar_text -->
                                                    <input type="text" name="storefront_navbar_text" id="storefront_navbar_text" class="form-control" id="inputEmail3"  placeholder="Type Text"
                                                    <?php $__empty_1 = true; $__currentLoopData = $setting[7]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($item->locale==$locale): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php elseif($item->locale=='en'): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?> >
                                                </div>
                                            </div>

                                            <!-- setting[8] => DB_ROW_ID-9: storefront_primary_menu -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Primary Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_primary_menu" id="storefront_primary_menu" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Primary Menu')); ?>'>
                                                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[8]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[8]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[9] => DB_ROW_ID-10: storefront_category_menu -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Category Menu</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_category_menu" id="storefront_category_menu" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Category Menu')); ?>'>
                                                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[9]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[9]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                            <option value=""><?php echo e(__('NULL')); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[10] => DB_ROW_ID-11: storefront_footer_menu_title_one -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title One</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="storefront_footer_menu_title_one" id="storefront_footer_menu_title_one"  placeholder="Type Footer Menu Title"
                                                    <?php $__empty_1 = true; $__currentLoopData = $setting[10]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($item->locale==$locale): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php elseif($item->locale=='en'): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?> >
                                                </div>
                                            </div>

                                            <!-- setting[11] => DB_ROW_ID-12: storefront_footer_menu_one -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu One</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_footer_menu_one" id="storefront_footer_menu_one" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[11]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[11]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <option value=""><?php echo e(__('NULL')); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- setting[12] => DB_ROW_ID-13: storefront_footer_menu_title_two -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Title Two</b></label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="storefront_footer_menu_title_two" id="storefront_footer_menu_title_two" class="form-control"  placeholder="Type Footer Menu Title"
                                                    <?php $__empty_1 = true; $__currentLoopData = $setting[12]->settingTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <?php if($item->locale==$locale): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php elseif($item->locale=='en'): ?>
                                                            value="<?php echo e($item->value); ?>" <?php break; ?>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <?php endif; ?> >
                                                </div>
                                            </div>

                                            <!-- setting[13] => DB_ROW_ID-14: storefront_footer_menu_two -->
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-4 col-form-label"><b>Footer Menu Two</b></label>
                                                <div class="col-sm-8">
                                                    <select name="storefront_footer_menu_two" id="storefront_footer_menu_two" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" title='<?php echo e(__('Select Footer Menu')); ?>'>
                                                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__empty_1 = true; $__currentLoopData = $item->menuTranslations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <?php if($value->locale==$locale): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[13]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php elseif($value->locale=='en'): ?>
                                                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $setting[13]->plain_value ? 'selected="selected"' : ''); ?>><?php echo e($value->menu_name); ?></option> <?php break; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <option value=""><?php echo e(__('NULL')); ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
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
                    </div>

                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                        <div class="card">
                            <div class="card-body">
                                <p>Irure enim occaecat labore sit qui aliquip reprehenderit amet velit. Deserunt ullamco ex elit nostrud ut dolore nisi officia magna sit occaecat laboris sunt dolor. Nisi eu minim cillum occaecat aute est cupidatat aliqua labore aute occaecat ea aliquip sunt amet. Aute mollit dolor ut exercitation irure commodo non amet consectetur quis amet culpa. Quis ullamco nisi amet qui aute irure eu. Magna labore dolor quis ex labore id nostrud deserunt dolor eiusmod eu pariatur culpa mollit in irure.</p>
                            </div>
                        </div>
                    </div>

              </div>
            </div>
          </div>
    </div>
</div>


<script type="text/javascript">
    //----------Insert Data----------------------

    //General
    $('#generalSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.general.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#error_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });

    //Menus
    $('#menuSubmit').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo e(route('admin.storefront.menu.store')); ?>",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function (data) {
                console.log(data);
                let html = '';
                if (data.errors) {
                    html = '<div class="alert alert-danger">';
                    for (let count = 0; count < data.errors.length; count++) {
                        html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                    $('#alert_message').fadeIn("slow");
                    $('#error_message').html(html);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
                else if(data.success){
                    $('#alert_message').fadeIn("slow"); //Check in top in this blade
                    $('#alert_message').addClass('alert alert-success').html(data.success);
                    setTimeout(function() {
                        $('#alert_message').fadeOut("slow");
                    }, 3000);
                }
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/storefront/index.blade.php ENDPATH**/ ?>