<?php

use App\Http\Controllers\API\AutoUpdateController;
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
Route::get('fetch-data-general', [AutoUpdateController::class, 'fetchDataGeneral'])->name('fetch-data-general');
Route::get('fetch-data-upgrade', [AutoUpdateController::class, 'fetchDataForAutoUpgrade'])->name('data-read');
Route::get('fetch-data-bugs', [AutoUpdateController::class, 'fetchDataForBugs'])->name('fetch-data-bugs');

// Action in Client server
Route::post('bug-update', [AutoUpdateController::class, 'bugUpdate'])->name('bug-update');
Route::post('version-upgrade', [AutoUpdateController::class, 'versionUpgrade'])->name('version-upgrade');

