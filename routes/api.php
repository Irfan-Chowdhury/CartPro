<?php

use App\Http\Controllers\API\ClientAutoUpdateController;
use App\Http\Controllers\API\DemoAutoUpdateController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\FooterController;
use App\Http\Controllers\API\Frontend\CommonController;
use App\Http\Controllers\API\HeaderController;
use App\Http\Controllers\API\HomeController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Fetch data from Demo
Route::get('fetch-data-general', [DemoAutoUpdateController::class, 'fetchDataGeneral'])->name('fetch-data-general');
Route::get('fetch-data-upgrade', [DemoAutoUpdateController::class, 'fetchDataForAutoUpgrade'])->name('data-read');
Route::get('fetch-data-bugs', [DemoAutoUpdateController::class, 'fetchDataForBugs'])->name('fetch-data-bugs');

// Action in Client server
Route::post('bug-update', [ClientAutoUpdateController::class, 'bugUpdate'])->name('bug-update');
Route::post('version-upgrade', [ClientAutoUpdateController::class, 'versionUpgrade'])->name('version-upgrade');


/*
|--------------------------------------------------------------------------
| Frontend React
|--------------------------------------------------------------------------
*/
Route::get('common-data', [CommonController::class, 'index']);
Route::get('header-data', [CommonController::class, 'headerData']);
Route::post('contact', [CommonController::class, 'contact']);


Route::get('storefront-header-data', [HeaderController::class, 'storefrontHeaderData']);
Route::get('storefront-footer-data', [FooterController::class, 'storefrontFooterData']);


Route::get('/home',[HomeController::class,'index']);
Route::get('/faq',[FaqController::class,'faq']);
Route::get('/product/{slug}',[ProductController::class,'productDetails']);


