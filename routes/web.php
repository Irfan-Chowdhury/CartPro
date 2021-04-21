<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//frontend routes
// Route::get('/', 'frontend\FrontController@index');

Route::get('/', function () {
    return view('general.layouts.master');
});

Route::get('collections/{slug}','frontend\ProductCategoryController@SubcategoryView');
Route::get('products/{slug}/{sku}','frontend\ProductCategoryController@productdetailsview');

Route::get('/about', 'frontend\FrontController@about');
Route::get('/contact', 'frontend\FrontController@contact');
Route::post('/send-email', 'frontend\FrontController@contactMail');
Route::get('/faq', 'frontend\FrontController@faq');
Route::get('/terms-and-conditions', 'frontend\FrontController@tnc');

Route::get('/page/{slug}', 'frontend\FrontController@pageShowBySlug')->name('page.slug');


//search
Route::get('search/{product}', 'frontend\FrontController@search')->name('live.search');
Route::post('search-product/', 'frontend\FrontController@searchProduct')->name('products.search');

//wishlists
Route::get('addwishlist/{id}','frontend\wishlistController@AddWishlist');
Route::get('wishlist','frontend\wishlistController@index')->name('wishlist');
Route::get('delete/wishlist/{id}','frontend\wishlistController@delete');

//cart
Route::get('cart', 'frontend\CartController@index')->name('cart');
Route::post('add-to-cart', 'frontend\CartController@addToCart')->name('addToCart');
Route::post('update-cart', 'frontend\CartController@updateCart')->name('updateCart');
Route::post('remove-from-cart', 'frontend\CartController@removeFromCart')->name('removeFromCart');

//checkout route
Route::get('checkout', 'frontend\CheckoutController@index')->name('checkout');
Route::post('/place-order', 'frontend\OrderController@create')->name('order.create');
// apply coupon
Route::post('/apply-coupon', 'frontend\CheckoutController@applyCoupon')->name('applyCoupon');

//payment
// Route::get('payment/page/','frontend\CartController@PymentPage')->name('payment.step');
// Route::post('user/payment/process/','frontend\PaymentController@payment')->name('payment.process');
// Route::post('user/stripe/charge/','frontend\PaymentController@STripeCharge')->name('stripe.charge');

Route::get('paypal/success/','frontend\PaymentController@paypalSuccess')->name('paypal.success');


Auth::routes();

Route::get('/home', 'frontend\CustomerController@index')->name('home');
Route::get('/orders', 'frontend\CustomerController@orders');
Route::get('/wishlist', 'frontend\CustomerController@wishlist');
Route::get('/address', 'frontend\CustomerController@address');
Route::post('/address/create', 'frontend\CustomerController@addressUpdate');
Route::get('/account-details', 'frontend\CustomerController@accountDetails');

/*
|--------------------------------------------------------------------------
| Admin Section
|--------------------------------------------------------------------------
*/
// Route::get('/admin', 'Admin\LoginController@showLoginForm')->name('admin');
Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm')->name('admin');
Route::get('/admin/home','AdminController@index');
Route::get('/admin/register','Admin\RegisterController@showRegisterForm')->name('admin.register');
Route::post('/admin/createuser','Admin\RegisterController@create')->name('create.user');
Route::post('/admin/login','Admin\LoginController@login')->name('admin.login');
Route::get('/admin/dashboard','AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/logout','AdminController@Logout')->name('admin.logout');



Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
    //--Category--
    Route::group(['prefix' => '/categories'], function () {
        Route::get('/','CategoryController@index')->name('admin.category');
        Route::post('/store','CategoryController@store')->name('admin.category.store');
        // Route::get('/{id}/edit','CategoryController@categoryEdit')->name('admin.category_edit'); //Remove Later
        // Route::get('/edit/{id}','CategoryController@edit')->name('admin.category.edit');
        Route::get('/edit','CategoryController@edit')->name('admin.category.edit');
        Route::post('updateCategory','CategoryController@categoryUpdate')->name('category_list.update'); //Remove Later
        // Route::post('update/{id}','CategoryController@update')->name('admin.category.update'); //Remove Later
        Route::post('update','CategoryController@update')->name('admin.category.update');
        Route::get('/{id}/delete','CategoryController@destroy')->name('category_list.destroy'); //Remove Later
        Route::get('/delete/{id}','CategoryController@delete')->name('admin.category.delete');
        Route::post('/massdelete','CategoryController@delete_by_selection')->name('bulk_delete_categories');
        Route::get('/{id}/{status}','CategoryController@status')->name('category.status');
        Route::get('/active','CategoryController@active')->name('admin.category.active');
        Route::get('/inactive','CategoryController@inactive')->name('admin.category.inactive');
    });

    //brand
    Route::get('/brand','BrandController@index')->name('admin.brand');
    Route::post('/store','BrandController@store')->name('admin.brand.store');
    Route::get('/brand/{id}','BrandController@brandEdit')->name('admin.brand.edit');
    Route::post('/update/{id}','BrandController@brandUpdate')->name('brand.update');
    Route::get('/brands/{id}','BrandController@delete')->name('admin.brand.delete');
    Route::get('/active','BrandController@active')->name('admin.brand.active');
    Route::get('/inactive','BrandController@inactive')->name('admin.brand.inactive');

    //Attribute Set
    Route::group(['prefix' => 'attribute-sets'], function () {
        Route::get('/','AttributeSetController@index')->name('admin.attribute_set.index');
        Route::post('/store','AttributeSetController@store')->name('admin.attribute_set.store');
        Route::get('/edit/{id}','AttributeSetController@edit')->name('admin.attribute_set.edit');
        Route::post('/update/{id}','AttributeSetController@update')->name('admin.attribute_set.update');
        Route::get('/active','AttributeSetController@active')->name('admin.attribute_set.active');
        Route::get('/inactive','AttributeSetController@inactive')->name('admin.attribute_set.inactive');
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

        //Attribute's Values
        Route::get('/get_attribute_values','AttributeController@getAttributeValues')->name('admin.attribute.get_attribute_values');
    });

    //Attributes
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/','TagController@index')->name('admin.tag.index');
        Route::post('/store','TagController@store')->name('admin.tag.store');
        Route::get('/edit','TagController@edit')->name('admin.tag.edit');
        Route::post('/update','TagController@update')->name('admin.tag.update');
        Route::get('/active','TagController@active')->name('admin.tag.active');
        Route::get('/inactive','TagController@inactive')->name('admin.tag.inactive');
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
    });

    //Flash Sale
    Route::group(['prefix' => 'flash-sales'], function () {
        Route::get('/','FlashSaleController@index')->name('admin.flash_sale.index');
        Route::get('/create','FlashSaleController@create')->name('admin.flash_sale.create');
        Route::post('/store','FlashSaleController@store')->name('admin.flash_sale.store');
        Route::get('/edit/{id}','FlashSaleController@edit')->name('admin.flash_sale.edit');
        Route::post('/update/{id}','FlashSaleController@update')->name('admin.flash_sale.update');
        // Route::post('/update','FlashSaleController@update')->name('admin.flash_sale.update');
        Route::get('/active','FlashSaleController@active')->name('admin.flash_sale.active');
        Route::get('/inactive','FlashSaleController@inactive')->name('admin.flash_sale.inactive');
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
    });



    //--Menus--
    Route::group(['prefix' => 'menus'], function () {

        Route::get('/','MenuController@index')->name('admin.menu');
        Route::post('/store','MenuController@store')->name('admin.menu.store');
        Route::get('/edit','MenuController@edit')->name('admin.menu.edit');
        Route::post('/update','MenuController@update')->name('admin.menu.update');
        Route::get('/active','MenuController@active')->name('admin.menu.active');
        Route::get('/inactive','MenuController@inactive')->name('admin.menu.inactive');
        Route::get('/delete/{menuId}','MenuController@delete')->name('admin.menu.delete');


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
        Route::get('/items/delete/{id}','MenuItemController@delete')->name('admin.menu.menu_item.delete');
    });

    Route::group(['prefix' => 'storefront'], function () {
        Route::get('/','StoreFrontController@index')->name('admin.storefront');
        Route::post('/general/store','StoreFrontController@generalStore')->name('admin.storefront.general.store');
        Route::post('/menu/store','StoreFrontController@menuStore')->name('admin.storefront.menu.store');
    });

    // Route::get('/menus/{menuId}/items','MenuItemController@index')->name('admin.menu.menu_item');
    // Route::get('/menus/items/data-fetch-by-type','MenuItemController@dataFetchByType')->name('admin.menu.menu_item.data-fetch-by-type');
    // Route::post('/menus/items/store','MenuItemController@store')->name('admin.menu.menu_item.store');


    //--Menus--
    Route::group(['prefix' => 'slider'], function () {
        Route::get('/','SliderController@index')->name('admin.slider');
        Route::get('/data-fetch-by-type','SliderController@dataFetchByType')->name('admin.slider.data-fetch-by-type');
        Route::post('/store','SliderController@store')->name('admin.slider.store');
        Route::get('/edit','SliderController@edit')->name('admin.slider.edit');
        Route::post('/update','SliderController@update')->name('admin.slider.update');
        // Route::get('/delete/{id}','SliderController@delete')->name('admin.slider.delete');
        Route::get('/delete','SliderController@delete')->name('admin.slider.delete');
    });

    Route::group(['prefix' => 'setting'], function () {

        Route::group(['prefix' => 'language'], function () {
            Route::get('/','LanguageController@index')->name('admin.setting.language');
            Route::post('/store','LanguageController@store')->name('admin.setting.language.store');
            Route::get('/delete/{id}','LanguageController@delete')->name('admin.setting.language.delete');
            Route::get('/defaultChange/{id}','LanguageController@defaultChange')->name('admin.setting.language.defaultChange');
        });
    });

});




//Collection
Route::get('/admin/collections','CollectionController@index')->name('admin.collection');
Route::post('/admin/insertCollection','CollectionController@store')->name('collection_list.store');
Route::post('/admin/updateCollection','CollectionController@update')->name('collection_list.update');
Route::get('/admin/collections/{id}/edit','CollectionController@edit')->name('admin.collection_edit');
Route::get('/admin/collections/{id}/delete','CollectionController@destroy')->name('admin.collection_delete');
Route::get('/admin/collections/{id}/{status}','CollectionController@status')->name('collection.status');


// //product
// Route::get('/admin/product','ProductController@index')->name('admin.product');
// Route::get('/admin/product/create','ProductController@create')->name('admin.product.create');
// Route::post('/admin/insertProduct','ProductController@store')->name('products.store');
// Route::get('/admin/variant-images/{id}/{sku}/{size}/{color}/{price}/{qty}/{product}','ProductController@productVariantImages');
// Route::post('/admin/upload-variant-images/','ProductController@productVariantImagesUpload')->name('admin.variant.images');
// Route::get('/admin/product/edit/{id}','ProductController@edit')->name('admin.product_edit');
// Route::post('/admin/updateProduct','ProductController@update')->name('products.update');
// Route::post('/admin/product-images','ProductController@productImages')->name('admin.product.images');
// Route::get('/admin/product/{id}/delete','ProductController@destroy')->name('productlist.destroy');
// Route::get('/admin/product/{id}/{status}','ProductController@status')->name('product.status');
// Route::post('/admin/product/massdelete','ProductController@delete_by_selection');


//coupon
// Route::get('/admin/coupon','CouponController@index')->name('admin.coupon');
// Route::post('/admin/insertCoupon','CouponController@store')->name('coupon.store');
// Route::post('/admin/updateCoupon','CouponController@update')->name('coupon_list.update');
// Route::get('/admin/coupon/{id}/edit','CouponController@edit')->name('admin.coupon_edit');
// Route::get('/admin/coupon/{id}/delete','CouponController@destroy')->name('couponlist.destroy');
// Route::get('/admin/coupon/{id}/{status}','CouponController@status')->name('coupon.status');
// Route::post('/admin/coupon/massdelete','CouponController@delete_by_selection');


//page
Route::get('/admin_page','Backup\PageController@index')->name('admin.page');
Route::post('/admin_insertPage','Backup\PageController@store')->name('pages.store');
Route::post('/admin_updatePage','Backup\PageController@update')->name('page_list.update');
Route::get('/admin_page/{id}/edit','Backup\PageController@edit')->name('admin.page_edit');
Route::get('/admin_page/{id}/delete','Backup\PageController@destroy')->name('pagelist.destroy');
Route::get('/admin_page/{id}/{status}','Backup\PageController@status')->name('page.status');
Route::post('/admin_page/massdelete','Backup\PageController@delete_by_selection');

//user
Route::get('/admin/user','UserController@index')->name('admin.user');
Route::post('/admin/insertUser','UserController@store')->name('user.store');
Route::post('/admin/updateUser','UserController@update')->name('user_list.update');
Route::get('/admin/user/{id}/edit','UserController@edit')->name('admin.user_edit');
Route::get('/admin/user/{id}/delete','UserController@destroy')->name('userlist.destroy');
Route::get('/admin/user/{id}/{status}','UserController@status')->name('user.status');
Route::post('/admin/user/massdelete','UserController@delete_by_selection');

//customer
Route::get('/admin/customer','CustomerController@index');
Route::get('/admin/Customerform','CustomerController@create');
Route::post('/admin/insertCustomer','CustomerController@store');
Route::get('/admin/getSpecificCustomer/{id}','CustomerController@show');
Route::get('/admin/editCustomer/{id}','CustomerController@edit');
Route::get('/admin/deleteCustomer/{id}','CustomerController@destroy');




Route::get('/admin/parent/load','CategoryController@parentLoad')->name('parent.load');
