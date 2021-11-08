<?php $__env->startSection('admin_content'); ?>


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    

        <h4 class="mb-3 ml-4"> Sales Report </h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table text-center">
                        <thead>
                            <tr>
                                <th class="wd-15p text-center">Orders</th>
                                <th class="wd-15p text-center">Products</th>
                                <th class="wd-15p text-center">Subtotal</th>
                                <th class="wd-15p text-center">Shipping</th>
                                <th class="wd-15p text-center">Discount</th>
                                <th class="wd-15p text-center">Tax</th>
                                <th class="wd-15p text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>14</td>
                                <td>$12,586.00</td>
                                <td>$25.00</td>
                                <td>$0.00</td>
                                <td>$0.00</td>
                                <td>$12,611.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>54</td>
                                <td>$7,31.80</td>
                                <td>$0.00</td>
                                <td>$0.00</td>
                                <td>$0.00</td>
                                <td>$7,31.80</td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>30</td>
                                <td>$4,31.80</td>
                                <td>$56.00</td>
                                <td>$2.00</td>
                                <td>$6.00</td>
                                <td>$2,331.80</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>87</td>
                                <td>$5,31.80</td>
                                <td>$7.00</td>
                                <td>$1.00</td>
                                <td>$0.00</td>
                                <td>$3,331.80</td>
                            </tr>
                            <tr>
                                <td>54</td>
                                <td>78</td>
                                <td>$21,31.80</td>
                                <td>$3.00</td>
                                <td>$0.00</td>
                                <td>$0.00</td>
                                <td>$4,331.80</td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="<?php echo e(route('admin.reports.sales_report')); ?>" method="get">

                                <?php if(isset($report_type)): ?>
                                    <input type="hidden" name="report_type" value="<?php echo e($report_type); ?>">
                                <?php endif; ?>

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="<?php echo e(route('admin.reports.sales_report')); ?>">Sales Report</option>
                                        <option value="<?php echo e(route('admin.reports.coupon')); ?>">Coupon Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_stock_report')); ?>">Product Stock report</option>
                                        <option value="<?php echo e(route('admin.reports.product_view_report')); ?>">Product View Report</option>
                                        <option value="<?php echo e(route('admin.reports.customer_orders')); ?>">Customer Order Report</option>
                                        <option value="<?php echo e(route('admin.reports.search_report')); ?>">Search Report</option>
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
                                    <select name="report_type" class="form-control">
                                        <option value="">-- Select --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="prcessing">Processing</option>
                                        <option value="cancaled">Cancaled</option>
                                        <option value="refund">Refund</option>
                                        <option value="deliver">Deliver</option>
                                        <option value="pending_payment">Pending Payment</option>
                                    </select>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/sales_report.blade.php ENDPATH**/ ?>