<?php $__env->startSection('admin_content'); ?>


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

        <h4 class="mb-3 ml-4">Search Report</h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th class="wd-15p">Keyword</th>
                                <th class="wd-15p">Results</th>
                                <th class="wd-15p">Hits</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Watch</td>
                                <td>20</td>
                                <td>1421</td>
                            </tr>
                            <tr>
                                <td>Apple</td>
                                <td>30</td>
                                <td>1521</td>
                            </tr>
                            <tr>
                                <td>Computer</td>
                                <td>21</td>
                                <td>221</td>
                            </tr>
                            <tr>
                                <td>Laptop</td>
                                <td>30</td>
                                <td>421</td>
                            </tr>
                            <tr>
                                <td>Car</td>
                                <td>10</td>
                                <td>121</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="<?php echo e(route('admin.reports.search_report')); ?>" method="get">

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="<?php echo e(route('admin.reports.search_report')); ?>">Search Report</option>
                                        <option value="<?php echo e(route('admin.reports.coupon')); ?>">Coupon Report</option>
                                        <option value="<?php echo e(route('admin.reports.customer_orders')); ?>">Customer Order Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_stock_report')); ?>">Product Stock report</option>
                                        <option value="<?php echo e(route('admin.reports.product_view_report')); ?>">Product View Report</option>
                                        <option value="<?php echo e(route('admin.reports.sales_report')); ?>">Sales Report</option>

                                    </select>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Keyword</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="key_word">
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/search_report.blade.php ENDPATH**/ ?>