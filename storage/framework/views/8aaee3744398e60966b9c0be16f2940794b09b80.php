<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid"><h3><?php echo app('translator')->get('Welcome Admin'); ?> </h3></div>
</section>
	<section>
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h1 class="card-title">Total Sales</h1>
                  <div class="d-flex">
                    <div class="p-2"><h2><i class="fa fa-money pull-left"></i></h2></div>
                    <div class="ml-auto p-2">
                        <h2>
                            <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                <?php echo e(number_format($orders->where('order_status','completed')->sum('total'), 2)); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                            <?php else: ?>
                                <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format($orders->where('order_status','completed')->sum('total'), 2)); ?>

                            <?php endif; ?>

                        </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Orders</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                      <div class="ml-auto p-2"><h2><?php echo e(count($orders)); ?></h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Products</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-cubes"></i></h2></div>
                      <div class="ml-auto p-2"><h2><?php echo e(count($products)); ?></h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Register Customers</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-users pull-left"></i></h2></div>
                      <div class="ml-auto p-2"><h2><?php echo e(count($customers)); ?></h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title"><i class="fa fa-shopping-cart"></i> Latest Orders</h1>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Order ID</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <th><?php echo e($item->id); ?></th>
                                    <td><?php echo e($item->billing_first_name.' '.$item->billing_last_name); ?></td>
                                    <td><?php echo e($item->order_status); ?></td>
                                    <td>
                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                            <?php echo e(number_format($item->total,'2')); ?>  <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                        <?php else: ?>
                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format($item->total,'2')); ?>

                                        <?php endif; ?>
                                    </td>
                              </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\cartpro\resources\views/admin/home.blade.php ENDPATH**/ ?>