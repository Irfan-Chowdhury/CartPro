<?php $__env->startSection('admin_content'); ?>


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    

        <h4 class="mb-3 ml-4">Customer Order Report</h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table text-center">
                        <thead>
                            <tr>
                                <th class="wd-15p text-center">Customer Name</th>
                                <th class="wd-15p text-center">Customer Email</th>
                                <th class="wd-15p text-center">Orders</th>
                                <th class="wd-15p text-center">Products</th>
                                <th class="wd-15p text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mehedi Hasan</td>
                                <td>admin@email.com</td>
                                <td>3</td>
                                <td>14</td>
                                <td>$37,833.00</td>
                            </tr>
                            <tr>
                                <td>John Doe</td>
                                <td>john@email.com</td>
                                <td>4</td>
                                <td>54</td>
                                <td>$29,727.20</td>
                            </tr>
                            <tr>
                                <td>Demo Admin/td>
                                <td>admin@email.com</td>
                                <td>1</td>
                                <td>54</td>
                                <td>$23,447.20</td>
                            </tr>
                            <tr>
                                <td>Shafiul ajaz/td>
                                <td>shafiul@email.com</td>
                                <td>3</td>
                                <td>4</td>
                                <td>$21,447.20</td>
                            </tr>
                            <tr>
                                <td>Ajam Khan/td>
                                <td>ajam@email.com</td>
                                <td>53</td>
                                <td>12</td>
                                <td>$11,457.20</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="<?php echo e(route('admin.reports.customer_orders')); ?>" method="get">

                                <?php if(isset($report_type)): ?>
                                    <input type="hidden" name="report_type" value="<?php echo e($report_type); ?>">
                                <?php endif; ?>

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control" onchange="location = this.value;">
                                        <option value="<?php echo e(route('admin.reports.customer_orders')); ?>">Customer Order Report</option>
                                        <option value="<?php echo e(route('admin.reports.coupon')); ?>">Coupon Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_stock_report')); ?>">Product Stock report</option>

                                    </select>
                                </div>



                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Start Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="start_date" >
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">End Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="end_date" >
                                </div>

                                <div class="form-group mt-4">
                                    <h5 class="mt-4 card-subtitle mb-2 text-muted">Order Status</h5>
                                    <select name="report_type" class="form-control" onchange="location = this.value;">
                                        <option value="">-- Select --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="prcessing">Processing</option>
                                        <option value="cancaled">Cancaled</option>
                                        <option value="refund">Refund</option>
                                        <option value="deliver">Deliver</option>
                                        <option value="pending_payment">Pending Payment</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <h5 class="">Customer Name</h5>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control">
                                </div>

                                <div class="form-group mt-4">
                                    <h5 class="">Customer Email</h5>
                                    <input type="text" name="customer_email" id="customer_email" class="form-control">
                                </div>

                                <button type="submit" class="mt-4 btn btn-success">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/customer_orders.blade.php ENDPATH**/ ?>