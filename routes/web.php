
<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


// Route::get('/', function () {
//     return view('frontend.layouts.master');
// });


Route::get('clear_cache', function () {
    \Artisan::call('optimize:clear');
    dd("Caches cleared successfully!");
});


// Route::get('make_view', function () {
// //     \Artisan::call('make:controller TestController',);
//     \Artisan::call('make:view test',);
//     dd("Created successfully!");
// });



Auth::routes();

/*
|--------------------------------------------------------------------------
| User Section
|--------------------------------------------------------------------------
*/

// $locale = Session::get('currentLocal');

// Route::group(['prefix' => '{locale}/','namespace'=>'Frontend'], function ($locale) {
// Route::group(['namespace'=>'Frontend'], function ($locale) {
//         Route::get('{locale}/','HomeController@index');
//         Route::get('/{product_slug}','HomeController@product_details')->name('cartpro.product');
// });

//Payment Start
Route::get('/payment', function () {
    return view('payment');
});
//Payment End



Route::get('/login', 'Auth\LoginController@showCustomerLoginForm')->name('customer_login_form');
Route::post('/customer/register', 'Frontend\RegisterController@customerRegister')->name('customer.register')->middleware('XssSanitization');
Route::post('/customer/login', 'Auth\LoginController@customerLogin')->name('customer.login')->middleware('XssSanitization');


// Route::group(['namespace'=>'Frontend','middleware'=>'XssSanitization'], function (){
Route::group(['namespace'=>'Frontend'], function (){


        Route::get('/default_lanuage_change/{id}','HomeController@defaultLanguageChange')->name('cartpro.default_language_change');

        Route::get('/','HomeController@index')->name('cartpro.home');
        Route::get('product/{product_slug}/{category_id}','HomeController@product_details')->name('cartpro.product_details');
        Route::get('data_ajax_search','HomeController@dataAjaxSearch')->name('cartpro.data_ajax_search');


        Route::get('/category/{slug}','CategoryProductController@categoryWiseProducts')->name('cartpro.category_wise_products');
        Route::get('limit_category_products_show','CategoryProductController@limitCategoryProductShow')->name('cartpro.limit_category_product_show');
        // Route::get('/category/{slug}/{condition}','CategoryProductController@categoryWiseConditionProducts')->name('cartpro.category_wise_products.condition');
        Route::get('/category_sortby_condition','CategoryProductController@categoryWiseConditionProducts')->name('cartpro.category_wise_products_condition');
        Route::get('/category_price_range/','CategoryProductController@categoryWisePriceRangeProducts')->name('cartpro.category.price_range');

        //Cart
        Route::group(['prefix' => '/cart'], function () {
            Route::post('/add', 'CartController@productAddToCart')->name('product.add_to_cart');
            Route::get('/view-details', 'CartController@cartViewDetails')->name('cart.view_details');
            Route::get('/remove', 'CartController@cartRomveById')->name('cart.remove');
            Route::get('/quantity_change', 'CartController@cartQuantityChange')->name('cart.quantity_change');
            Route::get('/shipping_charge', 'CartController@shippingCharge')->name('cart.shipping_charge');
            Route::post('/checkout', 'CartController@checkout')->name('cart.checkout');
            Route::get('/apply_coupon', 'CartController@applyCoupon')->name('cart.apply_coupon');

            Route::get('/country_wise_tax', 'CartController@countryWiseTax')->name('cart.country_wise_tax');
        });

        Route::post('newslatter/store','HomeController@newslatterStore')->name('cartpro.newslatter_store');

        //payment -Paypal
        Route::get('order-store','OrderController@orderStore')->name('order.store');
        //payment -Stripe
        Route::post('/stripe/payment','OrderController@handlePost')->name('stripe.payment');
        //Cash On Delivery
        Route::post('/order/cash_on_delivery','OrderController@cashOnDeliveryStore')->name('order.cash_on_delivery');

        //Wishlist
        Route::get('/wishlist','WishlistController@index')->name('wishlist.index');
        Route::get('/wishlist/add','WishlistController@addToWishlist')->name('wishlist.add');
        Route::get('/wishlist/remove','WishlistController@removeToWishlist')->name('wishlist.remove');

        Route::prefix('page')->group(function () {
            Route::get('/{page_slug}','PageController@pageShow')->name('page.Show');
        });

        Route::group(['prefix' => '/user_account','middleware'=>'customer_check'], function () {
            Route::get('/','UserAccountController@userAccount')->name('user_account')->middleware('customer_check');
            Route::post('/update','UserAccountController@userProfileUpdate')->name('user_profile_update');
            Route::post('/logout','UserAccountController@userLogout')->name('user_logout');
        });
        Route::post('/review/store','HomeController@reviewStore')->name('review.store');
});








/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/

// Route::get('languages','Admin\LocaleFileController@update')->name('languages.translations.update');


// Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin');
Route::get('/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin');

Route::get('/admin/home','AdminController@index');
Route::get('/admin/register','Admin\RegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin/createuser','Admin\RegisterController@create')->name('create.user');
Route::post('/admin/login','Admin\LoginController@login')->name('admin.login')->middleware('XssSanitization');
Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard')->middleware('admin_check');
Route::get('admin/dashboard/chart','AdminController@chart')->name('admin.dashboard.chart');
Route::get('/admin/logout','AdminController@Logout')->name('admin.logout');
Route::get('/admin/google_analytics','AdminController@googleAnalytics')->name('admin.googleAnalytics');



// Route::group(['prefix' => 'admin','middleware'=>['admin_check','XssSanitization']], function () {
Route::group(['prefix' => 'admin','middleware'=>['admin_check']], function () {
    Route::group(['namespace'=>'Admin'], function () {
        //--Category--
        Route::group(['prefix' => '/categories'], function () {
            Route::get('/','CategoryController@index')->name('admin.category');
            Route::post('/store','CategoryController@store')->name('admin.category.store');
            Route::get('/edit','CategoryController@edit')->name('admin.category.edit');
            Route::post('updateCategory','CategoryController@categoryUpdate')->name('category_list.update'); //Remove Later
            Route::post('update','CategoryController@update')->name('admin.category.update');
            Route::get('/{id}/delete','CategoryController@destroy')->name('category_list.destroy'); //Remove Later
            Route::get('/delete/{id}','CategoryController@delete')->name('admin.category.delete');
            Route::post('/massdelete','CategoryController@delete_by_selection')->name('bulk_delete_categories');
            Route::get('/{id}/{status}','CategoryController@status')->name('category.status');
            Route::get('/active','CategoryController@active')->name('admin.category.active');
            Route::get('/inactive','CategoryController@inactive')->name('admin.category.inactive');
            Route::get('/bulk_action','CategoryController@bulkAction')->name('admin.category.bulk_action');
        });

        //brand
        Route::get('/brand','BrandController@index')->name('admin.brand');
        Route::post('/store','BrandController@store')->name('admin.brand.store');
        Route::get('/brand/{id}','BrandController@brandEdit')->name('admin.brand.edit');
        Route::post('/update/{id}','BrandController@brandUpdate')->name('brand.update');
        Route::get('/brands/{id}','BrandController@delete')->name('admin.brand.delete');
        Route::get('/active','BrandController@active')->name('admin.brand.active');
        Route::get('/inactive','BrandController@inactive')->name('admin.brand.inactive');
        Route::get('/bulk_action','BrandController@bulkAction')->name('admin.brand.bulk_action');

        //Attribute Set
        Route::group(['prefix' => 'attribute-sets'], function () {
            Route::get('/','AttributeSetController@index')->name('admin.attribute_set.index');
            Route::post('/store','AttributeSetController@store')->name('admin.attribute_set.store');
            Route::get('/edit','AttributeSetController@edit')->name('admin.attribute_set.edit');
            Route::post('/update','AttributeSetController@update')->name('admin.attribute_set.update');
            Route::get('/active','AttributeSetController@active')->name('admin.attribute_set.active');
            Route::get('/inactive','AttributeSetController@inactive')->name('admin.attribute_set.inactive');
            Route::get('/bulk_action','AttributeSetController@bulkAction')->name('admin.attribute_set.bulk_action');
        });

        //Attributes
        Route::group(['prefix' => 'attributes'], function () {
            Route::get('/','AttributeController@index')->name('admin.attribute.index');
            Route::get('/create','AttributeController@create')->name('admin.attribute.create');
            Route::post('/store','AttributeController@store')->name('admin.attribute.store');
            Route::get('/edit/{id}','AttributeController@edit')->name('admin.attribute.edit');
            Route::post('/update/{id}','AttributeController@update')->name('admin.attribute.update');
            Route::get('/active','AttributeController@active')->name('admin.attribute.active');
            Route::get('/inactive','AttributeController@inactive')->name('admin.attribute.inactive');
            Route::get('/bulk_action','AttributeController@bulkAction')->name('admin.attribute.bulk_action');

            //Attribute's Values
            Route::get('/get_attribute_values','AttributeController@getAttributeValues')->name('admin.attribute.get_attribute_values');
        });

        //Tags
        Route::group(['prefix' => 'tags'], function () {
            Route::get('/','TagController@index')->name('admin.tag.index');
            Route::post('/store','TagController@store')->name('admin.tag.store');
            Route::get('/edit','TagController@edit')->name('admin.tag.edit');
            Route::post('/update','TagController@update')->name('admin.tag.update');
            Route::get('/active','TagController@active')->name('admin.tag.active');
            Route::get('/inactive','TagController@inactive')->name('admin.tag.inactive');
            Route::get('/bulk_action','TagController@bulkAction')->name('admin.tag.bulk_action');
        });

        //Products
        Route::group(['prefix' => 'products'], function () {
            Route::get('/','ProductController@index')->name('admin.products.index');
            Route::get('/create','ProductController@create')->name('admin.products.create');
            Route::post('/store','ProductController@store')->name('admin.products.store');
            Route::get('/edit/{id}','ProductController@edit')->name('admin.products.edit');
            Route::post('/update/{id}','ProductController@update')->name('admin.products.update');
            Route::get('/active','ProductController@active')->name('admin.products.active');
            Route::get('/inactive','ProductController@inactive')->name('admin.products.inactive');
            Route::get('/bulk_action','ProductController@bulkAction')->name('admin.products.bulk_action');
        });

        Route::prefix('review')->group(function () {
            Route::get('/','ReviewController@index')->name('admin.review.index');
            Route::get('/edit','ReviewController@edit')->name('admin.review.edit');
            Route::post('/update','ReviewController@update')->name('admin.review.update');
        });

        //Sales
        Route::group(['prefix' => 'order'], function () {
            Route::get('/','OrderController@index')->name('admin.order.index');
            Route::get('/details/{id}','OrderController@orderDetails')->name('admin.order.details');
            Route::get('/status','OrderController@orderStatus')->name('admin.order.status');
        });

       Route::get('/transaction','OrderController@transactionIndex')->name('admin.transaction.index');

        //Flash Sale
        Route::group(['prefix' => 'flash-sales'], function () {
            Route::get('/','FlashSaleController@index')->name('admin.flash_sale.index');
            Route::get('/create','FlashSaleController@create')->name('admin.flash_sale.create');
            Route::post('/store','FlashSaleController@store')->name('admin.flash_sale.store');
            Route::get('/edit/{id}','FlashSaleController@edit')->name('admin.flash_sale.edit');
            Route::post('/update/{id}','FlashSaleController@update')->name('admin.flash_sale.update');
            Route::get('/active','FlashSaleController@active')->name('admin.flash_sale.active');
            Route::get('/inactive','FlashSaleController@inactive')->name('admin.flash_sale.inactive');
            Route::get('/bulk_action','FlashSaleController@bulkAction')->name('admin.flash_sale.bulk_action');
        });

        //Coupons
        Route::group(['prefix' => 'coupons'], function () {
            Route::get('/','CouponController@index')->name('admin.coupon.index');
            Route::get('/create','CouponController@create')->name('admin.coupon.create');
            Route::post('/store','CouponController@store')->name('admin.coupon.store');
            Route::get('/edit/{id}','CouponController@edit')->name('admin.coupon.edit');
            Route::post('/update','CouponController@update')->name('admin.coupon.update');
            Route::get('/active','CouponController@active')->name('admin.coupon.active');
            Route::get('/inactive','CouponController@inactive')->name('admin.coupon.inactive');
            Route::get('/bulk_action','CouponController@bulkAction')->name('admin.coupon.bulk_action');

        });

        //Pages
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/','PageController@index')->name('admin.page.index');
            Route::get('/create','PageController@create')->name('admin.page.create');
            Route::post('/store','PageController@store')->name('admin.page.store');
            Route::get('/edit','PageController@edit')->name('admin.page.edit');
            Route::post('/update','PageController@update')->name('admin.page.update');
            Route::get('/active','PageController@active')->name('admin.page.active');
            Route::get('/inactive','PageController@inactive')->name('admin.page.inactive');
            Route::get('/bulk_action','PageController@bulkAction')->name('admin.page.bulk_action');
        });

        //user
        Route::get('/user','UserController@index')->name('admin.user');
        Route::post('/insertUser','UserController@store')->name('user.store');
        Route::post('/updateUser','UserController@update')->name('user_list.update');
        Route::get('/user/{id}/edit','UserController@edit')->name('admin.user_edit');
        Route::get('/user/active','UserController@active')->name('admin.user.active');
        Route::get('/user/inactive','UserController@inactive')->name('admin.user.inactive');
        Route::get('/user/bulk_action','UserController@bulkAction')->name('admin.user.bulk_action');

        Route::group(['prefix' => 'taxes'], function () {
            Route::get('/','TaxController@index')->name('admin.tax.index');
            Route::post('/store','TaxController@store')->name('admin.tax.store');
            Route::get('/edit','TaxController@edit')->name('admin.tax.edit');
            Route::post('/update','TaxController@update')->name('admin.tax.update');
            Route::get('/active','TaxController@active')->name('admin.tax.active');
            Route::get('/inactive','TaxController@inactive')->name('admin.tax.inactive');
            Route::get('/bulk_action','TaxController@bulkAction')->name('admin.tax.bulk_action');
        });

        Route::group(['prefix' => 'currency_rates'], function () {
            Route::get('/','CurrencyRateController@index')->name('admin.currency_rate.index');
            Route::get('/edit','CurrencyRateController@edit')->name('admin.currency_rate.edit');
            Route::post('/update','CurrencyRateController@update')->name('admin.currency_rate.update');
        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('/','RoleController@index')->name('admin.role.index');
            Route::post('/store','RoleController@store')->name('admin.role.store');
            Route::get('/edit','RoleController@edit')->name('admin.role.edit');
            Route::post('/update','RoleController@update')->name('admin.role.update');
            Route::get('/active','RoleController@active')->name('admin.role.active');
            Route::get('/inactive','RoleController@inactive')->name('admin.role.inactive');
            Route::get('/bulk_action','RoleController@bulkAction')->name('admin.role.bulk_action');

            //--Permission--
            Route::get('/role-permission/{id}','PermissionController@rolePermission')->name('admin.rolePermission');
            Route::get('roles/permission_details/{id}', 'PermissionController@permissionDetails')->name('permissionDetails');
            Route::post('roles/permission', 'PermissionController@set_permission')->name('set_permission');
        });



        //--Menus--
        Route::group(['prefix' => 'menu'], function () {

            Route::get('/','MenuController@index')->name('admin.menu');
            Route::post('/store','MenuController@store')->name('admin.menu.store');
            Route::get('/edit-test','MenuController@edit')->name('admin.menu.edit');
            Route::post('/update-test','MenuController@update')->name('admin.menu.update');
            Route::get('/active-test','MenuController@active')->name('admin.menu.active');
            Route::get('/inactive-test','MenuController@inactive')->name('admin.menu.inactive');
            Route::get('test/bulk_action','MenuController@bulkAction')->name('admin.menu.bulk_action');


            Route::group(['prefix' => 'navigation'], function () {
                Route::get('/index','NavigationController@index')->name('admin.menu.navigation');
                Route::get('/data-fetch-by-type','NavigationController@dataFetchByType')->name('admin.menu.navigation.data-fetch-by-type');
                Route::post('/store','NavigationController@store')->name('admin.menu.navigation.store');
                Route::get('/delete','NavigationController@delete')->name('admin.menu.navigation.delete');
                Route::get('/delete/checkbox','NavigationController@deleteCheckbox')->name('admin.menu.navigation.delete.checkbox');
            });

            //--Menus Items--
            Route::get('/{menuId}/items','MenuItemController@index')->name('admin.menu.menu_item');
            Route::get('/items/data-fetch-by-type','MenuItemController@dataFetchByType')->name('admin.menu.menu_item.data-fetch-by-type');
            Route::post('/items/store','MenuItemController@store')->name('admin.menu.menu_item.store');
            Route::get('/edit','MenuItemController@edit')->name('admin.menu.menu_item.edit');
            Route::post('/update','MenuItemController@update')->name('admin.menu.menu_item.update');
            Route::get('/active','MenuItemController@active')->name('admin.menu.menu_item.active');
            Route::get('/inactive','MenuItemController@inactive')->name('admin.menu.menu_item.inactive');
            Route::get('/items/delete/{id}','MenuItemController@delete')->name('admin.menu.menu_item.delete'); //Not Deleted
            Route::get('/bulk_action','MenuItemController@bulkAction')->name('admin.menu.menu_item.bulk_action');

        });

        //Store Front
        Route::group(['prefix' => 'storefront'], function () {
            Route::get('/','StoreFrontController@index')->name('admin.storefront');
            Route::post('/general/store','StoreFrontController@generalStore')->name('admin.storefront.general.store');
            Route::post('/menu/store','StoreFrontController@menuStore')->name('admin.storefront.menu.store');
            Route::post('/social_link/store','StoreFrontController@socialLinkStore')->name('admin.storefront.social_link.store');
            Route::post('/feature/store','StoreFrontController@featureStore')->name('admin.storefront.feature.store');
            Route::post('/logo/store','StoreFrontController@logoStore')->name('admin.storefront.logo.store');
            Route::post('/footer/store','StoreFrontController@footerStore')->name('admin.storefront.footer.store');
            Route::post('/newletter/store','StoreFrontController@newletterStore')->name('admin.storefront.newletter.store');
            Route::post('/product_page/store','StoreFrontController@productPageStore')->name('admin.storefront.product_page.store');
            Route::post('/slider_banners/store','StoreFrontController@sliderBannersStore')->name('admin.storefront.slider_banners.store');
            Route::post('/one_column_banner/store','StoreFrontController@oneColumnBannerStore')->name('admin.storefront.one_column_banner.store');
            Route::post('/two_column_banners/store','StoreFrontController@twoColumnBannersStore')->name('admin.storefront.two_column_banners.store');
            Route::post('/three_column_banners/store','StoreFrontController@threeColumnBannersStore')->name('admin.storefront.three_column_banners.store');
            Route::post('/three_column_full_width_banners/store','StoreFrontController@threeColumnFllWidthBannersStore')->name('admin.storefront.three_column_full_width_banners.store');
            Route::post('/top_brands/store','StoreFrontController@topBrandsStore')->name('admin.storefront.top_brands.store');
            Route::post('/flash_sale_and_vertical_products/store','StoreFrontController@flashSaleAndVerticalProductsStore')->name('admin.storefront.flash_sale_and_vertical_products.store');

            Route::post('/product_tab_one/store','StoreFrontController@productTabsOneStore')->name('admin.storefront.product_tab_one.store');
            Route::post('/product_tab_two/store','StoreFrontController@productTabsTwoStore')->name('admin.storefront.product_tab_two.store');
        });

        //--SLider--
        Route::group(['prefix' => 'slider'], function () {
            Route::get('/','SliderController@index')->name('admin.slider');
            Route::get('/data-fetch-by-type','SliderController@dataFetchByType')->name('admin.slider.data-fetch-by-type');
            Route::post('/store','SliderController@store')->name('admin.slider.store');
            Route::get('/edit','SliderController@edit')->name('admin.slider.edit');
            Route::post('/update','SliderController@update')->name('admin.slider.update');
            Route::get('/active','SliderController@active')->name('admin.slider.active');
            Route::get('/inactive','SliderController@inactive')->name('admin.slider.inactive');
            Route::get('test/bulk_action','SliderController@bulkAction')->name('admin.slider.bulk_action');
        });

        //Color
        Route::prefix('color')->group(function () {
            Route::get('/','ColorController@index')->name('admin.color.index');
            Route::post('/store','ColorController@store')->name('admin.color.store');
            Route::get('/edit','ColorController@edit')->name('admin.color.edit');
            Route::post('/update','ColorController@update')->name('admin.color.update');
            Route::get('/delete','ColorController@delete')->name('admin.color.delete');
        });

        //---- temporaray ---
         //Report
         Route::get('reports/coupon','ReportController@reportCoupon')->name('admin.reports.coupon');
         Route::get('reports/customer_orders','ReportController@reportcustomerOrders')->name('admin.reports.customer_orders');
         Route::get('reports/product_stock_report','ReportController@productStockReport')->name('admin.reports.product_stock_report');
         Route::get('reports/product_view_report','ReportController@productViewReport')->name('admin.reports.product_view_report');
         Route::get('reports/sales_report','ReportController@salesReportReport')->name('admin.reports.sales_report');
         Route::get('reports/search_report','ReportController@searchReport')->name('admin.reports.search_report');
         Route::get('reports/shipping_report','ReportController@shippingReport')->name('admin.reports.shipping_report');
         Route::get('reports/tax_report','ReportController@taxReport')->name('admin.reports.tax_report');
         Route::get('reports/product_purchase_report','ReportController@productPurchaseReport')->name('admin.reports.product_purchase_report');


         Route::get('report/today','ReportController@todayReport')->name('report.today');
         Route::get('report/this_week','ReportController@thisWeekReport')->name('report.this_week');
         Route::get('report/this_month','ReportController@thisYearReport')->name('report.this_year');
         Route::get('report/filter_report','ReportController@filterReport')->name('report.filter_report');
        //---- temporaray ---


        Route::group(['prefix' => 'setting'], function () {

            Route::get('/','SettingController@index')->name('admin.setting.index');
            Route::post('/general/store','SettingController@generalStoreOrUpdate')->name('admin.setting.general.store_or_update');
            Route::post('/store_store','SettingController@storeStoreOrUpdate')->name('admin.setting.store.store_or_update');
            Route::post('/currency/store','SettingController@currencyStoreOrUpdate')->name('admin.setting.currency.store_or_update');
            Route::post('/sms/store','SettingController@smsStoreOrUpdate')->name('admin.setting.sms.store_or_update');
            Route::post('/mail/store','SettingController@mailStoreOrUpdate')->name('admin.setting.mail.store_or_update');
            Route::post('/newsletter/store','SettingController@newsletterStoreOrUpdate')->name('admin.setting.newsletter.store_or_update');
            Route::post('/custom_css_js/store','SettingController@customCssJsStoreOrUpdate')->name('admin.setting.custom_css_js.store_or_update');
            Route::post('/facebook/store','SettingController@facebookStoreOrUpdate')->name('admin.setting.facebook.store_or_update');
            Route::post('/google/store','SettingController@googleStoreOrUpdate')->name('admin.setting.google.store_or_update');
            Route::post('/free_shipping/store','SettingController@freeShippingStoreOrUpdate')->name('admin.setting.free_shipping.store_or_update');
            Route::post('/local_pickup/store','SettingController@localPickupStoreOrUpdate')->name('admin.setting.local_pickup.store_or_update');
            Route::post('/flat_rate/store','SettingController@flatRateStoreOrUpdate')->name('admin.setting.flat_rate.store_or_update');
            Route::post('/paypal/store','SettingController@paypalStoreOrUpdate')->name('admin.setting.paypal.store_or_update');
            Route::post('/strip/store','SettingController@stripStoreOrUpdate')->name('admin.setting.strip.store_or_update');
            Route::post('/paytm/store','SettingController@paytmStoreOrUpdate')->name('admin.setting.paytm.store_or_update');
            Route::post('/cash_on_delivery/store','SettingController@cashonDeliveryStoreOrUpdate')->name('admin.setting.cash_on_delivery.store_or_update');
            Route::post('/bank_transfer/store','SettingController@bankTransferStoreOrUpdate')->name('admin.setting.bank_transfer.store_or_update');
            Route::post('/check_money_order/store','SettingController@cehckMoneyOrderStoreOrUpdate')->name('admin.setting.check_money_order.store_or_update');

            Route::get('/empty_database', 'SettingController@emptyDatabase')->name('empty_database');

            Route::group(['prefix' => 'language'], function () {
                Route::get('/','LanguageController@index')->name('admin.setting.language');
                Route::post('/store','LanguageController@store')->name('admin.setting.language.store');
                Route::get('/delete/{id}','LanguageController@delete')->name('admin.setting.language.delete');
                Route::get('/defaultChange/{id}','LanguageController@defaultChange')->name('admin.setting.language.defaultChange');
            });
        });

        Route::get('languages','LocaleFileController@update')->name('languages.translations.update');
    });

});
// });
