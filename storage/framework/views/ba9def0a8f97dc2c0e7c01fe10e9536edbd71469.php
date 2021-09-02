<!-- Sidebar-->
<nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <ul id="side-main-menu" class="side-menu list-unstyled">
          <li><a href="<?php echo e(url('/admin/dashboard')); ?>"> <i class="dripicons-meter"></i><span><?php echo e(__('file.Dashboard')); ?></span></a></li>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product')): ?>
            <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cube"></i><span><?php echo e(__('file.Products')); ?></span></a>
                <ul id="product" class="collapse list-unstyled ">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category')): ?>
                    <li id="category-menu"><a href="<?php echo e(route('admin.category')); ?>"><?php echo e(__('file.Category')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand')): ?>
                    <li id="brand-list-menu"><a href="<?php echo e(route('admin.brand')); ?>"><?php echo e(__('file.Brand')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attribute_set')): ?>
                    <li id="brand-list-menu"><a href="<?php echo e(route('admin.attribute_set.index')); ?>"><?php echo e(__('file.Attribute-Set')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attribute')): ?>
                    <li id="brand-list-menu"><a href="<?php echo e(route('admin.attribute.index')); ?>"><?php echo e(__('file.Attributes')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tag')): ?>
                    <li id="brand-list-menu"><a href="<?php echo e(route('admin.tag.index')); ?>"><?php echo e(__('file.Tags')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('catalog')): ?>
                    <li id="brand-list-menu"><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo e(__('file.Catalog')); ?></a></li>
                <?php endif; ?>
                </ul>
            </li>
          <?php endif; ?>

          <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-dollar"></i><span><?php echo e(__('Sales')); ?></span></a>
            <ul id="sale" class="collapse list-unstyled">
              <li id="sale-list-menu"><a href="#"><?php echo e(__('Orders')); ?></a></li>
              <li id="sale-list-menu"><a href="#"><?php echo e(__('Transactions')); ?></a></li>
            </ul>
          </li>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('flash_sale')): ?>
            <li><a href="<?php echo e(route('admin.flash_sale.index')); ?>"><i class="fa fa-bolt"></i><span><?php echo e(__('Flash Sales')); ?></span></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon')): ?>
            <li><a href="<?php echo e(route('admin.coupon.index')); ?>"><i class="fa fa-tags"></i><span><?php echo e(__('Coupons')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page')): ?>
            <li><a href="<?php echo e(route('admin.page.index')); ?>"><i class="fa fa-file-text"></i><span><?php echo e(trans('Pages')); ?></span></a></li>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu')): ?>
            <li><a href="<?php echo e(route('admin.menu')); ?>"><i class="dripicons-list"></i><span><?php echo e(trans('Menus')); ?></span></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_and_roles')): ?>
            <li><a href="#user" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-user-circle"></i><span><?php echo e(__('Users and Roles')); ?></span></a>
                <ul id="user" class="collapse list-unstyled">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
                    <li id="navigation-menu"><a href="<?php echo e(route('admin.user')); ?>"><?php echo e(__('Users')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role')): ?>
                    <li id="navigation-menu"><a href="<?php echo e(route('admin.role.index')); ?>"><?php echo e(__('Roles')); ?></a></li>
                <?php endif; ?>
                </ul>
            </li>
          <?php endif; ?>

            <li><a href="#localization" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-globe"></i><span><?php echo e(__('Localization')); ?></span></a>
                <ul id="localization" class="collapse list-unstyled">
                    <li><a href="<?php echo e(route('admin.tax.index')); ?>"><?php echo e(__('Taxes')); ?></a></li>
                    <li><a href="<?php echo e(route('languages.index')); ?>"><?php echo e(__('Translations')); ?></a></li>
                    <li><a href="<?php echo e(route('admin.currency_rate.index')); ?>"><?php echo e(__('Currency Rates')); ?></a></li>
                </ul>
            </li>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance')): ?>
            <li><a href="#menu" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-paint-brush"></i><span><?php echo e(trans('Appearance')); ?></span></a>
                <ul id="menu" class="collapse list-unstyled">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store_front')): ?>
                        <li id="navigation-menu"><a href="<?php echo e(route('admin.storefront')); ?>"><?php echo e(__('Store Front')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider')): ?>
            <li><a href="<?php echo e(route('admin.slider')); ?>"><i class="fa fa-picture-o"></i><span><?php echo e(__('Slider')); ?></span></a></li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-setting')): ?>
            <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-cogs"></i><span><?php echo e(__('Site Settings')); ?></span></a>
                <ul id="setting" class="collapse list-unstyled">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                        <li id="navigation-menu"><a href="<?php echo e(route('admin.setting.index')); ?>"><?php echo e(__('Setting')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('locale')): ?>
                        <li id="navigation-menu"><a href="<?php echo e(route('admin.setting.language')); ?>"><?php echo e(trans('file.Language')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
          <?php endif; ?>

        </ul>
      </div>
    </div>
  </nav>
<!-- Sidebar-->
<?php /**PATH C:\xampp\htdocs\cartpro_google_analytics\resources\views/admin/includes/sidebar.blade.php ENDPATH**/ ?>