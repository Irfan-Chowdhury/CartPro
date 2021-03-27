<!-- Sidebar-->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <ul id="side-main-menu" class="side-menu list-unstyled">                  
          <li><a href="<?php echo e(url('/admin/dashboard')); ?>"> <i class="dripicons-meter"></i><span><?php echo e(__('file.dashboard')); ?></span></a></li>
          <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span><?php echo e(__('file.product')); ?></span></a>
            <ul id="product" class="collapse list-unstyled ">
              <li id="category-menu"><a href="<?php echo e(route('admin.category')); ?>"><?php echo e(__('file.category')); ?></a></li>
              <li id="category-menu"><a href="<?php echo e(route('admin.collection')); ?>"><?php echo e(__('Collection')); ?></a></li>
              <li id="product-list-menu"><a href="<?php echo e(route('admin.product')); ?>"><?php echo e(__('file.product_list')); ?></a></li>
              <li id="brand-list-menu"><a href="<?php echo e(route('admin.brand')); ?>"><?php echo e(__('brand')); ?></a></li>
              <li id="brand-list-menu"><a href="<?php echo e(route('admin.attribute_set.index')); ?>"><?php echo e(__('Attribute Sets')); ?></a></li>
              <li id="brand-list-menu"><a href="<?php echo e(route('admin.attribute.index')); ?>"><?php echo e(__('Attributes')); ?></a></li>
              <li id="brand-list-menu"><a href="<?php echo e(route('admin.tag.index')); ?>"><?php echo e(__('Tags')); ?></a></li>
              <li id="brand-list-menu"><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo e(__('Catalog')); ?></a></li>
            </ul>
          </li>  
           
          <li><a href="<?php echo e(route('admin.flash_sale.index')); ?>"><i class="fa fa-bolt"></i><span><?php echo e(__('Flash Sales')); ?></span></a></li>
          <li><a href="<?php echo e(route('admin.coupon')); ?>"><i class="dripicons-list"></i><span><?php echo e(__('Coupons')); ?></span></a></li>
          <li><a href="<?php echo e(route('admin.page')); ?>"><i class="dripicons-list"></i><span><?php echo e(trans('Pages')); ?></span></a></li>
          <li><a href="<?php echo e(route('admin.user')); ?>"><i class="fa fa-user-circle"></i><span><?php echo e(trans('Users')); ?></span></a></li>            
          <li><a href="<?php echo e(route('admin.menu')); ?>"><i class="dripicons-list"></i><span><?php echo e(trans('Menus')); ?></span></a></li> 
                    
          

          
          <li><a href="#menu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-paint-brush"></i><span><?php echo e(trans('Appearance')); ?></span></a>
            <ul id="menu" class="collapse list-unstyled">
              <li id="navigation-menu"><a href="<?php echo e(route('admin.storefront')); ?>"><?php echo e(__('Store Front')); ?></a></li>
            </ul>
          </li> 
          
          <li><a href="<?php echo e(route('admin.slider')); ?>"><i class="fa fa-picture-o"></i><span><?php echo e(__('Slider')); ?></span></a></li>

          <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cogs"></i><span><?php echo e(trans('file.Settings')); ?></span></a>
            <ul id="setting" class="collapse list-unstyled">
              <li id="navigation-menu"><a href="<?php echo e(route('admin.setting.language')); ?>"><?php echo e(trans('file.Language')); ?></a></li>
            </ul>
          </li> 

        </ul>
      </div>
    </div>
  </nav>
<!-- Sidebar--><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>