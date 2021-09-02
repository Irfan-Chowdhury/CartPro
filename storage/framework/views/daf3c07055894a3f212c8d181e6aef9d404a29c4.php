<header class="header">
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-holder d-flex align-items-center justify-content-between">
          <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>
          
          
          <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
               
            <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>             
            <li class="nav-item">
                  <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger"></span>
                  </a>
                  <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">
                      <li class="notifications">
                        <a href="" class="btn btn-link">product exceeds alert quantity</a>
                      </li>
                  </ul>
            </li>

            <?php

                // if (request()->session()->has('currentLocal')) {
                //   //request()->session()->get('currentLocal');
                // }

                 //$defaultLanguage = DB::table('languages')->select('local')->where('local',$currentLocal)->first();

                //$defaultLanguage = DB::table('languages')->select('local')->where('default','=',1)->first();

                 $languages = DB::table('languages')
                            ->select('id','language_name','local')
                            // ->where('default','=',0)
                            ->where('local','!=',Session::get('currentLocal'))
                            ->orderBy('language_name','ASC')
                            ->get();
            ?>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  
                  <?php if(Session::has('currentLocal')): ?>
                  <?php echo e(__(strtoupper(Session::get('currentLocal')))); ?>

                      
                  <?php endif; ?>
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
              <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span><?php echo e(Auth::user()->username); ?></span> <i class="fa fa-angle-down"></i>
              </a>
              <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                  <li> 
                    <a href=""><i class="dripicons-user"></i> <?php echo e(trans('file.profile')); ?></a>
                  </li>
                  
                  <li> 
                    <a href=""><i class="dripicons-gear"></i> <?php echo e(trans('file.settings')); ?></a>
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
      </div>
    </nav>
  </header><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/admin/includes/header.blade.php ENDPATH**/ ?>