<?php $__env->startSection('admin_content'); ?>


<section>

    <div class="container-fluid mb-3 ml-3">
        <h2 class="font-weight-bold mt-3">Reports</h2>
        <br>
    </div>

    

        <h4 class="mb-3 ml-4">Products Stock Report </h4>
        <div class="table-responsive ml-3">
            <div class="row">
                <div class="col-md-8">
                    <table id="datatable1" class="table">
                        <thead>
                            <tr>
                                <th class="wd-15p">Product</th>
                                <th class="wd-15p">Qty</th>
                                <th class="wd-15p">Stock Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SAUCE ORIGIN 910-CL Selvedge Jeans Raw Jeans Mens</td>
                                <td>500</td>
                                <td>In Stock</td>
                            </tr>
                            <tr>
                                <td>Europe size Summer Short Sleeve Solid Polo Shirt</td>
                                <td>100</td>
                                <td>In Stock</td>
                            </tr>
                            <tr>
                                <td>TCL 55S425 55 inch 4K Smart LED Roku TV</td>
                                <td>100</td>
                                <td>In Stock</td>
                            </tr>
                            <tr>
                                <td>LG Electronics OLED65E8PUA 65-Inch 4K Ultra HD</td>
                                <td>130</td>
                                <td>In Stock</td>
                            </tr>
                            <tr>
                                <td>HENCHIRY New Men's Winter Jean Jacket</td>
                                <td>132</td>
                                <td>In Stock</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Filter</h4>
                            <form action="<?php echo e(route('admin.reports.product_stock_report')); ?>" method="get">

                                <?php if(isset($report_type)): ?>
                                    <input type="hidden" name="report_type" value="<?php echo e($report_type); ?>">
                                <?php endif; ?>

                                <div class="form-group mt-4">
                                    <h5 class="mt-2 card-subtitle mb-2 text-muted">Report Type</h5>
                                    <select name="report_type" class="form-control selectpicker" data-live-search="true" data-live-search-style="begins" onchange="location = this.value;">
                                        <option value="<?php echo e(route('admin.reports.product_stock_report')); ?>">Product Stock Report</option>
                                        <option value="<?php echo e(route('admin.reports.coupon')); ?>">Coupon Report</option>
                                        <option value="<?php echo e(route('admin.reports.customer_orders')); ?>">Customer Order Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_view_report')); ?>">Product View Report</option>
                                        <option value="<?php echo e(route('admin.reports.sales_report')); ?>">Sales Report</option>
                                        <option value="<?php echo e(route('admin.reports.search_report')); ?>">Search Report</option>
                                        <option value="<?php echo e(route('admin.reports.shipping_report')); ?>">Shpping Report</option>
                                        <option value="<?php echo e(route('admin.reports.tax_report')); ?>">Tax Report</option>
                                        <option value="<?php echo e(route('admin.reports.product_purchase_report')); ?>">Product Purchase Report</option>




                                    </select>
                                </div>



                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Quantity Above</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mt-4">
                                    <label for="exampleInputEmail1">Quantity Bellow</label>
                                    <input type="text" class="form-control">
                                </div>

                                <div class="form-group mt-4">
                                    <h5 class="mt-4 card-subtitle mb-2 text-muted">Stock Availity</h5>
                                    <select name="report_type" class="form-control">
                                        <option value="">-- Please Select --</option>
                                        <option value="in_stock">In Stock</option>
                                        <option value="out_of_stock">Out of Stock</option>
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

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\cartpro\resources\views/admin/pages/report/product_stock_report.blade.php ENDPATH**/ ?>