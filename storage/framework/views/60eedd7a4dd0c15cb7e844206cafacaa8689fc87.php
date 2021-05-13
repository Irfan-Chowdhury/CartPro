<ul class="">
    <li>
        <a class="nav-link <?php echo e((request()->is('home')) ? 'active' : ''); ?>" href="<?php echo e(url('home')); ?>">Dashboard</a>
    </li>
    <li>
        <a class="nav-link <?php echo e((request()->is('orders')) ? 'active' : ''); ?>" href="<?php echo e(url('orders')); ?>">Orders</a>
    </li>
    <!-- <li>
        <a class="nav-link <?php echo e((request()->is('wishlist')) ? 'active' : ''); ?>" href="<?php echo e(url('wishlist')); ?>">Wishlist</a>
    </li> -->
    <li>
        <a class="nav-link <?php echo e((request()->is('address')) ? 'active' : ''); ?>" href="<?php echo e(url('address')); ?>">Address</a>
    </li>
    <li>
        <a class="nav-link <?php echo e((request()->is('account-details')) ? 'active' : ''); ?>" href="<?php echo e(url('account-details')); ?>">Account Details</a>
    </li>
    <li>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button class="btn btn-link" type="submit"><i class="dripicons-exit"></i> <?php echo e(trans('file.logout')); ?></button>
        </form>
    </li>
</ul><?php /**PATH D:\laragon\www\cartpro\resources\views/customer/customer-menu.blade.php ENDPATH**/ ?>