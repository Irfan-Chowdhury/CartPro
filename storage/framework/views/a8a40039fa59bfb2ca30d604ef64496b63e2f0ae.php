<!-- Sidebar-->
<nav class="side-navbar">
    <span class="brand-big" id="site_logo_main">
        <?php if(isset($setting_store->admin_logo) && Illuminate\Support\Facades\File::exists(public_path($setting_store->admin_logo))): ?>
            <img src="<?php echo e(asset($setting_store->admin_logo)); ?>" width="150">
            &nbsp; &nbsp;
        <?php else: ?>
        <img src="https://dummyimage.com/150x150/e5e8ec/e5e8ec&text=Dashboard Logo" width="150">
            &nbsp; &nbsp;
        <?php endif; ?>
    </span>
    <!-- Sidebar Navigation Menus-->
    <ul id="side-main-menu" class="side-menu list-unstyled">
        <li class="<?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>"><a href="<?php echo e(url('/admin/dashboard')); ?>"> <i class="dripicons-meter"></i><span><?php echo e(__('file.Dashboard')); ?></span></a></li>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product')): ?>
            <li class="has-dropdown"><a href="#product" aria-expanded=" <?php echo e(Request::is('admin/categories') ||
                                                                        Request::is('admin/brands') ||
                                                                        Request::is('admin/brands/brand/*') ||
                                                                        Request::is('admin/attribute-sets') ||
                                                                        Request::is('admin/attributes') ||
                                                                        Request::is('admin/attributes/create') ||
                                                                        Request::is('admin/attributes/edit/*') ||
                                                                        Request::is('admin/tags') ||
                                                                        Request::is('admin/products') ||
                                                                        Request::is('admin/products/create') ||
                                                                        Request::is('admin/products/edit/*') ||
                                                                        Request::is('admin/review')

                                                                        ? 'true':'false'); ?>" data-toggle="collapse"> <i class="fa fa-cube"></i><span><?php echo e(__('file.Products')); ?></span></a>

                <ul id="product" class="collapse list-unstyled  <?php echo e(Request::is('admin/categories') ||
                                                                Request::is('admin/brands') ||
                                                                Request::is('admin/brands/brand/*') ||
                                                                Request::is('admin/attribute-sets') ||
                                                                Request::is('admin/attributes') ||
                                                                Request::is('admin/attributes/create') ||
                                                                Request::is('admin/attributes/edit/*') ||
                                                                Request::is('admin/tags') ||
                                                                Request::is('admin/products') ||
                                                                Request::is('admin/products/create') ||
                                                                Request::is('admin/products/edit/*') ||
                                                                Request::is('admin/review')
                                                                ? 'show':''); ?>">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category')): ?>
                    <li id="category-menu" class="<?php echo e(Request::is('admin/categories') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.category')); ?>"><?php echo e(__('file.Category')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand')): ?>
                    <li id="brand-list-menu" class="<?php echo e((Request::is('admin/brands') || Request::is('admin/brands/brand/*')) ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.brand')); ?>"><?php echo e(__('file.Brand')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attribute_set')): ?>
                    <li id="brand-list-menu" class="<?php echo e(Request::is('admin/attribute-sets') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.attribute_set.index')); ?>"><?php echo e(__('file.Attribute Set')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attribute')): ?>
                    <li id="brand-list-menu" class="<?php echo e(Request::is('admin/attributes') || Request::is('admin/attributes/create') || Request::is('admin/attributes/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.attribute.index')); ?>"><?php echo e(__('file.Attributes')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tag')): ?>
                    <li id="brand-list-menu" class="<?php echo e(Request::is('admin/tags') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.tag.index')); ?>"><?php echo e(__('file.Tags')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('catalog')): ?>
                    <li id="brand-list-menu" class="<?php echo e(Request::is('admin/products') || Request::is('admin/products/create') || Request::is('admin/products/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.products.index')); ?>"><?php echo e(__('file.Catalog')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('review-view')): ?>
                    <li id="brand-list-menu" class="<?php echo e(Request::is('admin/review') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.review.index')); ?>"><?php echo e(__('file.Reviews')); ?></a></li>
                <?php endif; ?>
            </ul>
        </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sale')): ?>
            <li><a href="#sale" aria-expanded=" <?php echo e(Request::is('admin/order') ||
                                                    Request::is('admin/order/details/*') ||
                                                    Request::is('admin/transaction')
                                                    ? 'true':'false'); ?>" data-toggle="collapse"> <i class="fa fa-dollar"></i><span><?php echo e(__('file.Sales')); ?></span></a>

                <ul id="sale" class="collapse list-unstyled <?php echo e(Request::is('admin/order') ||
                                                        Request::is('admin/order/details/*') ||
                                                        Request::is('admin/transaction')
                                                        ? 'show':''); ?>">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-view')): ?>
                    <li id="sale-list-menu" class="<?php echo e(Request::is('admin/order') || Request::is('admin/order/details') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.order.index')); ?>"><?php echo e(__('file.Orders')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('transaction-view')): ?>
                    <li id="sale-list-menu" class="<?php echo e(Request::is('admin/transaction') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.transaction.index')); ?>"><?php echo e(__('file.Transactions')); ?></a></li>
                <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('flash_sale')): ?>
            <li class="<?php echo e(Request::is('admin/flash-sales') || Request::is('admin/flash-sales/create') || Request::is('admin/flash-sales/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.flash_sale.index')); ?>"><i class="fa fa-bolt"></i><span><?php echo e(__('file.Flash Sales')); ?></span></a></li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupon')): ?>
            <li class="<?php echo e(Request::is('admin/coupons') || Request::is('admin/coupons/create') || Request::is('admin/coupons/edit/*') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.coupon.index')); ?>"><i class="fa fa-tags"></i><span><?php echo e(__('file.Coupons')); ?></span></a></li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq')): ?>
            <li><a href="#faq" aria-expanded="<?php echo e(Request::is('admin/faq/*') ? 'true':'false'); ?>" data-toggle="collapse"> <i class="fa fa-sticky-note"></i><span><?php echo e(trans('file.FAQ Setting')); ?></span></a>
                <ul id="faq" class="collapse list-unstyled <?php echo e(Request::is('admin/faq/*') ? 'show':''); ?>">
                    <li class="<?php echo e(Route::current()->getName()=='admin.faq_type.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.faq_type.index')); ?>"><?php echo e(__('file.Type')); ?></a></li>
                    <li class="<?php echo e(Route::current()->getName()=='admin.faq.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.faq.index')); ?>"><span><?php echo e(__('file.FAQ Set')); ?></span></a></li>
                </ul>
            </li>
        <?php endif; ?>


        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appearance')): ?>
            <li><a href="#menu" aria-expanded=" <?php echo e(Request::is('admin/online-store/*') ? 'true':'false'); ?>"  data-toggle="collapse"> <i class="dripicons-store"></i><span><?php echo e(trans('file.Online Store')); ?></span></a>
                <ul id="menu" class="collapse list-unstyled <?php echo e(Request::is('admin/online-store/*') ? 'show':''); ?>">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('page')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.page.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.page.index')); ?>"><?php echo e(trans('file.Pages')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.menu' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.menu')); ?>"><?php echo e(trans('file.Menus')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('slider')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.slider' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.slider')); ?>"><span><?php echo e(__('file.Slider')); ?></span></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('store_front')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.storefront' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.storefront')); ?>"><?php echo e(__('file.Store Front')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <li><a href="#report" aria-expanded=" <?php echo e(Request::is('admin/reports/*') ? 'true':'false'); ?>" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span><?php echo e(__('file.Reports')); ?></span></a>
            <ul id="report" class="collapse list-unstyled <?php echo e(Request::is('admin/reports/*') ? 'show':''); ?>">
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.coupon' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.coupon')); ?>"><?php echo app('translator')->get('file.Coupon Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.customer_orders' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.customer_orders')); ?>"><?php echo app('translator')->get('file.Customer Order Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.product_stock_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.product_stock_report')); ?>"><?php echo app('translator')->get('file.Product Stock Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.product_view_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.product_view_report')); ?>"><?php echo app('translator')->get('file.Product View Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.sales_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.sales_report')); ?>"><?php echo app('translator')->get('file.Sales Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.search_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.search_report')); ?>"><?php echo app('translator')->get('file.Search Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.shipping_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.shipping_report')); ?>"><?php echo app('translator')->get('file.Shipping Report'); ?></a></li>
                <li class="<?php echo e(Route::current()->getName()=='admin.reports.tax_report' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.reports.tax_report')); ?>"><?php echo app('translator')->get('file.Tax Report'); ?></a></li>
                
            </ul>
        </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_and_roles')): ?>
            <li><a href="#user" aria-expanded="<?php echo e(Request::is('admin/user') || Request::is('admin/roles') ? 'true':'false'); ?>" data-toggle="collapse"> <i class="dripicons-user-group"></i><span><?php echo e(__('file.Users and Roles')); ?></span></a>
                <ul id="user" class="collapse list-unstyled <?php echo e(Request::is('admin/user') || Request::is('admin/roles')? 'show':''); ?>">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user')): ?>
                    <li class="<?php echo e(Route::current()->getName()=='admin.user' ? 'active' : ''); ?>" id="navigation-menu"><a href="<?php echo e(route('admin.user')); ?>"><?php echo e(__('file.Users')); ?></a></li>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role')): ?>
                    <li class="<?php echo e(Route::current()->getName()=='admin.role.index' || Request::is('admin/roles/role-permission/*') ? 'active' : ''); ?>"  id="navigation-menu"><a href="<?php echo e(route('admin.role.index')); ?>"><?php echo e(__('file.Roles')); ?></a></li>
                <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('localization')): ?>
            <li><a href="#localization" aria-expanded="<?php echo e(Request::is('admin/localization/*') || Request::is('languages/*') ? 'true':'false'); ?>" data-toggle="collapse"> <i class="dripicons-web"></i><span><?php echo e(__('file.Localization')); ?></span></a>
                <ul id="localization" class="collapse list-unstyled <?php echo e(Request::is('admin/localization/*') || Request::is('languages/*') ? 'show':''); ?>">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tax')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.tax.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.tax.index')); ?>"><?php echo e(__('file.Taxes')); ?></a></li>
                    <?php endif; ?>
                    <li class="<?php echo e(Request::is('languages/*') || Request::is('languages/*')); ?>"><a href="<?php echo e(route('languages.translations.index',Session::get('currentLocale'))); ?>"><?php echo e(__('file.Translations')); ?></a></li>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency-rate')): ?>
                        <li class="<?php echo e(Route::current()->getName()=='admin.currency_rate.index' ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.currency_rate.index')); ?>"><?php echo e(__('file.Currency Rates')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-setting')): ?>
            <li class="has-dropdown">
                <a href="#setting" aria-expanded="<?php echo e(Request::is('admin/setting/*') ? 'true':'false'); ?>" data-toggle="collapse"> <i class="dripicons-toggles"></i><span><?php echo e(trans('file.Site Settings')); ?></span></a>
                <ul id="setting" class="collapse list-unstyled <?php echo e(Request::is('admin/setting/*')  ? 'show':''); ?>">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('country')): ?>
                        <li id="setting-country" class="<?php echo e(Request::is('admin/setting/countries') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.country.index')); ?>"><?php echo e(__('file.Country')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency')): ?>
                        <li id="setting-currency" class="<?php echo e(Request::is('admin/setting/currencies') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.currency.index')); ?>"><?php echo e(__('file.Currency')); ?></a></li>
                    <?php endif; ?>
                        
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('setting')): ?>
                        <li id="setting-other-setting" class="<?php echo e(Request::is('admin/setting/others') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.setting.index')); ?>"><?php echo e(__('file.Other Setting')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language')): ?>
                        <li id="setting-language" class="<?php echo e(Request::is('admin/setting/language') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.setting.language')); ?>"><?php echo e(__('file.Language')); ?></a></li>
                    <?php endif; ?>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(env('PRODUCT_MODE')==='DEVELOPER'): ?>
            <li class="<?php echo e(Request::is('admin/developer-section/index') ? 'active' : ''); ?>"><a href="<?php echo e(route('admin.developer.section.index')); ?>"><i class="fa fa-cogs"></i><span><?php echo e(__('file.Developer Section')); ?></span></a></li>
        <?php endif; ?>
    </ul>
</nav>
<!-- Sidebar-->
<?php /**PATH /var/www/html/cartpro/cartproshop_v2/resources/views/admin/includes/sidebar.blade.php ENDPATH**/ ?>