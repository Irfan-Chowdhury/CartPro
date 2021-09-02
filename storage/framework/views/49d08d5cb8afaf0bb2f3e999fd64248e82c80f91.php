<?php $__env->startSection('content'); ?>
    <!--Breadcrumb Area start-->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="page-title">My Account</h1>
                    <ul>
                        <li><a href="home.html">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Breadcrumb Area ends-->
    <!--My account Dashboard starts-->
    <section class="my-account-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="user-sidebar-menu">
                        <?php echo $__env->make('customer.customer-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="col-md-9 tabs style1">
                    <div class="row">
                        <div class="col-md-12 mar-top-30">
                            <div class="user-dashboard-tab__content tab-content">
                                <div class="tab-pane fade show active mar-top-30" id="dashboard" role="tabpanel">
                                    <h5>Hello <strong><?php echo e(auth()->user()->name); ?></strong></h5>
                                    <p>From your account dashboard you can easily check &amp; view your <a href="<?php echo e(url('orders')); ?>">recent orders</a>, manage your <a href="<?php echo e(url('address')); ?>">shipping and billing addresses</a> and <a href="<?php echo e(url('account-details')); ?>">edit your password and account details</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--My account Dashboard ends-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro\resources\views/customer/home.blade.php ENDPATH**/ ?>