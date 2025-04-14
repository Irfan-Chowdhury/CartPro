<?php
if (Session::has('currency_rate')){
    $CHANGE_CURRENCY_RATE = Session::get('currency_rate');
}else{
    $CHANGE_CURRENCY_RATE = 1;
    Session::put('currency_rate', $CHANGE_CURRENCY_RATE);
}
?>




<?php $__env->startSection('title','Admin | Dashboard'); ?>

<?php $__env->startSection('admin_content'); ?>
<section>
    <div class="container-fluid">

        <!-- Alert Section for version upgrade-->
        <div id="alertSection" class="d-none alert alert-primary alert-dismissible fade show" role="alert">
            <p id="announce" class="d-none"><strong>Announce !!!</strong> A new version <span id="newVersionNo"></span> has been released. Please <i><b><a href="<?php echo e(route('new-release')); ?>">Click here</a></b></i> to check upgrade details.</p>
            <p id="congratulation" class="d-none"><strong>Congratulation !!!</strong> New version <?php echo e(env('VERSION')); ?> upgrated successfully.</p>
            <button type="button" id="closeButtonUpgrade" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Alert Section for Bug update-->
        <div id="alertBugSection" class="d-none alert alert-primary alert-dismissible fade show" style="background-color: rgb(248,215,218)" role="alert">
            <p id="alertBug" class="d-none" style="color: rgb(126,44,52)"><strong>Alert !!!</strong> Minor bug fixed in version <?php echo e(env('VERSION')); ?>. Please <i><b><a href="<?php echo e(route('bug-update-page')); ?>">Click here</a></b></i> to update the system.</p>
            <p id="congratulationBug" class="d-none"><strong>Congratulation !!!</strong> System updated successfully.</p>
            <button type="button" style="color: rgb(126,44,52)" id="closeButtonBugUpdate" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <h3><?php echo app('translator')->get('file.Welcome Admin'); ?> </h3>
            </div>
        </div>
    </div>
</section>
<section class="pt-0">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-graph-line" style="color:#733686;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                    <?php echo e(number_format($orders->where('order_status','completed')->sum('total'), 2)); ?> <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                <?php else: ?>
                                    <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format($orders->where('order_status','completed')->sum('total'), 2)); ?>

                                <?php endif; ?>
                            </span>
                            <h1 class="card-title" style="color: #733686"> <a href="<?php echo e(route('admin.reports.sales_report')); ?>"> <?php echo app('translator')->get('file.Total Sales'); ?></a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-shopping-bag" style="color:#ff8952;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                <?php if($orders): ?>
                                    <?php echo e($orders->where('order_status','pending')->count()); ?>

                                <?php else: ?>
                                    0
                                <?php endif; ?>
                            </span>
                            <h1 class="card-title" style="color: #ff8952"> <a href="<?php echo e(route('admin.order.index')); ?>"><?php echo app('translator')->get('file.Pending Orders'); ?></a> </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-archive" style="color:#00c689;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                <?php echo e(count($products)); ?>

                            </span>
                            <h1 class="card-title" style="color: #00c689"><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo app('translator')->get('file.Total Products'); ?></a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body d-flex justify-content-center">
                        <div class="icon">
                            <i class="dripicons-user-group" style="color:#297ff9;font-size:30px;margin-right:15px"></i>
                        </div>
                        <div>
                            <span class="mb-2">
                                <?php echo e($total_customers); ?>

                            </span>
                            <h1 class="card-title" style="color: #297ff9"> <a href="<?php echo e(route('admin.user')); ?>"><?php echo app('translator')->get('file.Total Register Customers'); ?></a></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div><h1 class="card-title"><?php echo app('translator')->get('file.Top Brands'); ?></h1></div>
                                    <div><p><a href="<?php echo e(route('admin.brand')); ?>"><?php echo app('translator')->get('file.All Brands'); ?></a></p></div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $top_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($item->brand!=null): ?>
                                                <tr>
                                                    <?php if($item->brand->brand_logo!==null && Illuminate\Support\Facades\File::exists(public_path($item->brand->brand_logo))): ?>
                                                        <td><img src="<?php echo e(asset($item->brand->brand_logo)); ?>" height="50px" width="50px"></td>
                                                    <?php else: ?>
                                                        <td><img src="https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Brand" style="background-size: cover; background-position: center;" height="50px" width="50px"></td>
                                                    <?php endif; ?>
                                                    <td><?php echo e($item->brand->brandTranslation->brand_name ?? $item->brand->brandTranslationEnglish->brand_name ?? null); ?></td>
                                                    <td>
                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                            <?php echo e(number_format($item->total_amount,'2')); ?>  <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format($item->total_amount,'2')); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div><h1 class="card-title"><?php echo app('translator')->get('file.Top Categories'); ?></h1></div>
                                    <div><p><a href="<?php echo e(route('admin.category')); ?>"><?php echo app('translator')->get('file.All Categories'); ?></a></p></div>
                                </div>
                                <table class="table">
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php if($item->category): ?>
                                                <tr>
                                                    <?php if($item->category->image!==null && Illuminate\Support\Facades\File::exists(public_path($item->category->image))): ?>
                                                        <td><img src="<?php echo e(asset($item->category->image)); ?>" height="50px" width="50px"></td>
                                                    <?php else: ?>
                                                        <td><img src="https://dummyimage.com/1269x300/e5e8ec/e5e8ec&text=Category" style="background-size: cover; background-position: center;" height="50px" width="50px"></td>
                                                    <?php endif; ?>
                                                    
                                                    <td><?php echo e($item->category->translation->category_name); ?></td>
                                                     <td>
                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                            <?php echo e(number_format($item->total_amount,'2')); ?>  <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?>

                                                        <?php else: ?>
                                                            <?php echo e(env('DEFAULT_CURRENCY_SYMBOL')); ?> <?php echo e(number_format($item->total_amount,'2')); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 card">
                <div class="p-3 d-flex justify-content-between">
                    <div><h1 class="card-title"><?php echo app('translator')->get('file.Top Products'); ?></h1></div>
                    <div><p><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo app('translator')->get('file.All Products'); ?></a></p></div>
                </div>
                <hr>

                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $top_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if(isset($category_ids[$item->product->id])): ?>
                            <div class="col-md-2">
                                <a href="<?php echo e(url('product/'.$item->product->slug.'/'. $category_ids[$item->product->id]->category_id)); ?>" target="__blank">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?php echo e(asset($item->baseImage->image_medium)); ?>" class="card-img-top">
                                            <span class="card-text mt-3">
                                                <?php if($item->product->special_price!=NULL && $item->product->special_price>0 && $item->product->special_price<$item->product->price): ?>
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->product->special_price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->special_price  * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>

                                                    <br>
                                                    <del>
                                                        <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                            <?php echo e(number_format((float)$item->product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php else: ?>
                                                            <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                        <?php endif; ?>
                                                    </del>
                                                <?php else: ?>
                                                    <?php if(env('CURRENCY_FORMAT')=='suffix'): ?>
                                                        <?php echo e(number_format((float)$item->product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?> <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                    <?php else: ?>
                                                        <?php echo $__env->make('frontend.includes.SHOW_CURRENCY_SYMBOL', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php echo e(number_format((float)$item->product->price * $CHANGE_CURRENCY_RATE, env('FORMAT_NUMBER'), '.', '')); ?>

                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </span>

                                            <?php  $product_name = $item->orderProductTranslation->product_name ?? $item->orderProductTranslationEnglish->product_name  ?>
                                            <p class="card-text mt-2 text-bold"><?php echo e(strlen($product_name) > 25 ? substr($product_name,0,25)."..." : $product_name); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="mb-5"></div>
                    <?php endif; ?>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="act-title">
                            <h5><?php echo app('translator')->get('file.Top Browser'); ?></h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('file.BROWSER'); ?></th>
                                    <th><?php echo app('translator')->get('file.SESSION'); ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                <?php if(isset($browsers)): ?>
                                    <?php $__currentLoopData = $browsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$browser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$i); ?></td>
                                        <td><?php echo e($browser['browser']); ?></td>
                                        <td><?php echo e($browser['sessions']); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="act-title">
                            <h5><?php echo app('translator')->get('file.Top Most Visited Pages'); ?></h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('file.URL'); ?></th>
                                    <th><?php echo app('translator')->get('file.VIEWS'); ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                <?php if(isset($topVisitedPages)): ?>
                                    <?php $__currentLoopData = $topVisitedPages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$topVisitedPage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><a href="<?php echo e($topVisitedPage['url']); ?>"><?php echo e($topVisitedPage['pageTitle']); ?></a></td>
                                            <td><?php echo e($topVisitedPage['pageViews']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="act-title">
                            <h5><?php echo app('translator')->get('file.Top Referrers'); ?></h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('file.URL'); ?></th>
                                    <th><?php echo app('translator')->get('file.VIEWS'); ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                <?php if(isset($topReferrers)): ?>
                                    <?php $__currentLoopData = $topReferrers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topReferrer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><?php echo e($topReferrer['url']); ?></td>
                                            <td><?php echo e($topReferrer['pageViews']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="act-title">
                            <h5><?php echo app('translator')->get('file.Top User Types'); ?></h5>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo app('translator')->get('file.Type'); ?></th>
                                    <th><?php echo app('translator')->get('file.Session'); ?></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                ?>
                                <?php if(isset($topUserTypes)): ?>
                                    <?php $__currentLoopData = $topUserTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toptopUserType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e(++$i); ?></td>
                                            <td><?php echo e($toptopUserType['type']); ?></td>
                                            <td><?php echo e($toptopUserType['sessions']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo app('translator')->get('file.Page View Statistics'); ?></h1>
                        <canvas id="canvas"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div><h1 class="card-title"><i class="fa fa-shopping-cart"></i> <?php echo app('translator')->get('file.Last 10 Pending Orders'); ?></h1></div>
                            <div><p><a href="<?php echo e(route('admin.order.index')); ?>"><?php echo app('translator')->get('file.All Orders'); ?></a></p></div>
                        </div>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col"><?php echo app('translator')->get('file.Order ID'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('file.Customer'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('file.Status'); ?></th>
                                <th scope="col"><?php echo app('translator')->get('file.Total'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $orders->where('order_status','pending')->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
                                    <div class="card text-center">
                                        <div class="card-body">
                                            <h4><i>No order found</i></h4>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
<script>

    var url = "<?php echo e(route('admin.dashboard.chart')); ?>";
    var Months = new Array();
    var Labels = new Array();
    var PageViews = new Array();
    var visitors = new Array();
    (function($){
        "use strict";
        $.get(url, function(response){
            response.forEach(function(data){
                const date = new Date(data.date);  // 2009-11-10
                const d = date.getDate();
                const m = date.getMonth()+1;
                const y = date.getFullYear();
                const y1 = new String(y);
                const month = date.toLocaleString('default', { month: 'long' });
                Months.push(d+'-'+m+'-'+y1[2]+y1[3]);
                Labels.push(data.pageTitle);
                PageViews.push(data.pageViews);
                visitors.push(data.visitors);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels:Months,
                    datasets: [
                        {
                        label: 'Page Views',
                        borderColor: '#2f5ec4',
                        data: PageViews,
                        borderWidth: 1
                        },
                        {
                        label: 'Visitors',
                        borderColor: '#FD777B',
                        backgroundColor: '#FD777B50',
                        data: visitors,
                        borderWidth: 1
                        }

                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
        });
    })(jQuery);
</script>

<script>
    let clientCurrrentVersion = <?php echo json_encode(env("VERSION")); ?>;
    let clientCurrrentBugNo   = <?php echo json_encode(env("BUG_NO")); ?>;
</script>
<script type="text/javascript" src="<?php echo e(asset('public/js/admin/dashboard/notification.js')); ?>"></script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/pages/home.blade.php ENDPATH**/ ?>