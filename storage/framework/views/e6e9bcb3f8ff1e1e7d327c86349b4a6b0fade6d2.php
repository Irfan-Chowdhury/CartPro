<header class="container-fluid mb-4">
    <nav class="navbar">
        <div class="navbar-holder d-flex align-items-center justify-content-between">

          <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>

          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

            <li class="nav-item">
                <a class="dropdown-header-name" style="padding-right: 10px" href="<?php echo e(url('/optimize')); ?>" title="Clear all cache with refresh"><i class="fa fa-refresh"></i></a>
            </li>
            <li class="nav-item">
                <a class="dropdown-header-name" style="padding-right: 10px" href="<?php echo e(route('cartpro.home')); ?>" target="_blank" title="View Website"><i class="dripicons-preview"></i></a>
            </li>

            <li class="nav-item">
                <a href="<?php echo e(route('admin.order.index')); ?>">
                    <i class="dripicons-cart"></i>
                    <span class="badge badge-defaultr bg-danger" style="width:25px"><span class="text-light">  <?php if($orders): ?> <?php echo e($orders->where('order_status','pending')->count()); ?> <?php else: ?> 0 <?php endif; ?> </span></span>
                </a>
            </li>

            <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>
            <li class="nav-item">
                <a rel="nofollow" id="notify-btn" href="#" class="nav-link dropdown-item" data-toggle="tooltip" title="<?php echo e(__('Notifications')); ?>">
                    <i class="dripicons-bell"></i>

                    <?php $notifications = DB::table('notifications')->where('deleted_at', null)->get(); ?>

                    <?php if(count($notifications->where('read_at', null))): ?>
                        <span id="notificationCount" class="badge badge-danger">
                            <?php echo e(count($notifications->where('read_at', null))); ?>

                        </span>
                    <?php endif; ?>
                </a>
                <ul class="right-sidebar">
                    <li class="header">
                        <span class="pull-right"><a href="<?php echo e(route('clearAll')); ?>"><?php echo e(__('Clear All')); ?></a></span>
                        <span class="pull-left"><a href="<?php echo e(route('seeAllNotification')); ?>"><?php echo e(__('See All')); ?></a></span>
                    </li>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="unread-notification text-primary" href=<?php echo e(json_decode($notification->data)->link); ?>><?php echo e(json_decode($notification->data)->data); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
            <?php
                 $languages = DB::table('languages')
                            ->select('id','language_name','local')
                            // ->where('default','=',0)
                            ->where('local','!=',Session::get('currentLocale'))
                            ->orderBy('language_name','ASC')
                            ->get();
            ?>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="dripicons-web">
                        <?php if(Session::has('currentLocale')): ?>
                            <?php echo e(__(strtoupper(Session::get('currentLocale')))); ?>

                        <?php endif; ?>
                    </i>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <a class="dropdown-item" href="<?php echo e(route('admin.setting.language.defaultChange',$item->id)); ?>">
                            <?php echo e($item->language_name); ?> (<?php echo e(__(strtoupper($item->local))); ?>)
                      </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/documentation')); ?>" target="_blank" data-toggle="tooltip"
                   title="<?php echo e(__('Documentation')); ?>">
                    <i class="dripicons-information"></i>
                </a>
            </li>


            <li class="nav-item">
                <a rel="nofollow" href="#" data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item">
                    <?php if(auth()->user()->image && Illuminate\Support\Facades\File::exists(public_path(auth()->user()->image))): ?>
                        <img class="profile-photo sm mr-1" src="<?php echo e(asset(auth()->user()->image)); ?>">
                    <?php else: ?>
                        <img class="profile-photo sm mr-1" src="https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Admin">
                    <?php endif; ?>
                    <span> <?php echo e(auth()->user()->username); ?></span>
                </a>

                <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                    <li>
                        <a href="<?php echo e(route('admin.profile')); ?>">
                            <i class="dripicons-user"></i>
                            <?php echo e(trans('file.Profile')); ?>

                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('admin.logout')); ?>"><i class="dripicons-power"></i>
                            <?php echo e(trans('file.logout')); ?>

                        </a>
                    </li>
                </ul>
            </li>
          </ul>
        </div>
    </nav>
  </header>


  <?php $__env->startPush('scripts'); ?>
    <script type="text/javascript">
            (function ($) {
                "use strict";

                $('#notify-btn').on('click', function () {
                    $('#notificationCount').removeClass('badge badge-danger').text('');
                    $.ajax({
                        url: '<?php echo e(route('markAsRead')); ?>',
                        dataType: "json",
                        success: function (result) {
                        },
                    });
                })

            })(jQuery);
    </script>

<?php $__env->stopPush(); ?>
<?php /**PATH /var/www/html/resources/views/admin/includes/header.blade.php ENDPATH**/ ?>