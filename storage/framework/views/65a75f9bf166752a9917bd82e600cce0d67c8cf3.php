<?php $__env->startSection('admin_content'); ?>

<section>

    <div class="container-fluid mb-3">
        <h4 class="font-weight-bold mt-3"><?php echo e(__('Today Reports')); ?> - <?php echo e(date('d M,Y')); ?></h4>
        <br>
    </div>

    <div class="table-responsive">
    	<table id="datatable1" class="table ">
    	    <thead>
                <tr>
                    <th class="wd-15p text-center">Customer Name</th>
                    <th class="wd-15p text-center">Customer Email</th>
                    <th class="wd-15p text-center">Payment Type</th>
                    <th class="wd-15p text-center">Transection ID</th>
                    <th class="wd-15p text-center">Total Products</th>
                    <th class="wd-15p text-center">Amount</th>
                    <th class="wd-20p text-center">Order Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                        <?php if($row->billing_first_name==NULL && $row->billing_last_name==NULL): ?>
                            <td><?php echo e(Auth::user()->first_name.' '.Auth::user()->last_name); ?></td>
                        <?php else: ?>
                            <td><?php echo e($row->billing_first_name.' '.$row->billing_last_name); ?></td>
                        <?php endif; ?>

                        <?php if($row->billing_first_name==NULL && $row->billing_last_name==NULL): ?>
                            <td><?php echo e(Auth::user()->email); ?></td>
                        <?php else: ?>
                            <td><?php echo e($row->billing_email); ?></td>
                        <?php endif; ?>

                        <td><?php echo e($row->payment_method); ?></td>
                        <td><?php echo e($row->payment_id); ?></td>
                        <td><?php echo e(count($row->orderDetails)); ?></td>
                        <td><?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e($row->total); ?></td>
                        <?php if($row->order_status == 'completed'): ?>
                            <td class="badge badge-warning"><?php echo e(strtoupper($row->order_status)); ?></td>
                        <?php elseif($row->order_status == 'pending'): ?>
                            <td class="badge badge-info"><?php echo e(strtoupper($row->order_status)); ?></td>
                        <?php elseif($row->order_status == 'canceled'): ?>
                            <td class="badge badge-danger"><?php echo e(strtoupper($row->order_status)); ?></span>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
    	</table>
    </div>
</section>

<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        bLengthChange: false,
        searching: false,
        responsive: true
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/today_report.blade.php ENDPATH**/ ?>