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

Route::get('data-read', [AutoUpdateController::class, 'dataRead'])->name('data-read');
Route::post('auto-upload', [AutoUpdateController::class, 'autoUpload'])->name('auto-load');

