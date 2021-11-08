<?php $__env->startSection('admin_content'); ?>


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    

        <h4 class="mb-3 ml-4">Coupon Report</h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th class="wd-15p">Coupon Name</th>
                                <th class="wd-15p">Coupon Code</th>
                                <th class="wd-15p">Orders</th>
                                <th class="wd-15p">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Anniversary</td>
                                <td>HAPPY2020</td>
                                <td>7</td>
                                <td>$50.00</td>
                            </tr>
                            <tr>
                                <td>Percent Discount</td>
                                <td>10PERCENT</td>
                                <td>18</td>
                                <td>$60.00</td>
                            </tr>
                            <tr>
                                <td>Boishaki Offer</td>
                                <td>Boishaki2021</td>
                                <td>38</td>
                                <td>$30.00</td>
                            </tr>
                            <tr>
                                <td>Winter Offer</td>
                                <td>winter2021</td>
                                <td>33</td>
                                <td>$60.00</td>
                            </tr>
                            <tr>
                                <td>Summer Offer</td>
                                <td>summer2021</td>
                                <td>31</td>
                                <td>$40.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="<?php echo e(route('admin.reports.coupon')); ?>" method="get">

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="<?php echo e(route('admin.reports.coupon')); ?>">Coupon Report</option>
                                        <option value="<?php echo e(route('admin.reports.customer_orders')); ?>">Customer Order Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_stock_report')); ?>">Product Stock report</option>
                                        <option value="<?php echo e(route('admin.reports.product_view_report')); ?>">Product View Report</option>
                                        <option value="<?php echo e(route('admin.reports.sales_report')); ?>">Sales Report</option>
                                        <option value="<?php echo e(route('admin.reports.search_report')); ?>">Search Report</option>
                                        <option value="<?php echo e(route('admin.reports.shipping_report')); ?>">Shpping Report</option>
                                        <option value="<?php echo e(route('admin.reports.tax_report')); ?>">Tax Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_purchase_report')); ?>">Product Purchase Report</option>




                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Start Date</label>
                                    <input type="date" class="form-control datepicker" id="exampleInputEmail1" aria-describedby="emailHelp"  name="start_date">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">End Date</label>
                                    <input type="date" class="form-control datepicker" id="exampleInputEmail1" aria-describedby="emailHelp"  name="end_date">
                                </div>


                                <div class="form-group mt-4">
                                    <h5 class="mt-4 card-subtitle mb-2 text-muted">Order Status</h5>
                                    <select name="report_type" class="form-control" >
                                        <option value="">-- Select --</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Pending">Processing</option>
                                        <option value="Pending">Cancaled</option>
                                        <option value="Pending">Refund</option>
                                        <option value="Pending">Deliver</option>
                                        <option value="Pending">Pending Payment</option>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/index.blade.php ENDPATH**/ ?>