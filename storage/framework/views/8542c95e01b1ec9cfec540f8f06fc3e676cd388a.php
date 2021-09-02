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
                    <div class="ml-auto p-2"><h2>$1,242,134.70</h2></div>
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
                      <div class="ml-auto p-2"><h2>125</h2></div>
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
                      <div class="ml-auto p-2"><h2>125</h2></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Total Customers</h1>
                    <div class="d-flex">
                      <div class="p-2"><h2><i class="fa fa-users pull-left"></i></h2></div>
                      <div class="ml-auto p-2"><h2>162</h2></div>
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
                          <tr>
                            <th>123</th>
                            <td>Mark</td>
                            <td>Pending</td>
                            <td>$13,000.00</td>
                          </tr>
                          <tr>
                            <th>234</th>
                            <td>Jacob</td>
                            <td>Pending</td>
                            <td>$15,000.00</td>
                          </tr>
                          <tr>
                            <th>355</th>
                            <td>Larry</td>
                            <td>Pending</td>
                            <td>$12,000.00</td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
          </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cartpro_related\3_cartpro_menu\resources\views/admin/home.blade.php ENDPATH**/ ?>