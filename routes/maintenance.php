<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;


Route::get('/maintenance-mode', function() {
    return view('maintenance');
});

Route::get('/optimize-clear', function() {
    Artisan::call('optimize:clear');
    return redirect()->back();
});

Route::get('/db-seed', function() {
    Artisan::call('db:seed --class=NameSeeder');
    return 'DB Seeding Successfully';
});

Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'Successfully Migrated';
});

Route::get('/maintainance-down', function() {
    Artisan::call('down');
    return redirect()->back();
});

Route::get('/maintainance-up', function() {
    Artisan::call('up');
    return redirect()->back();
});


Route::get('/documentation',function(){
    return File::get(public_path() . '/documentation/index.html');
});


Route::get('/storage-link', function() {
    Artisan::call('storage:link');
    return redirect()->back();
});
Route::get('/cache-clear', function() {
    Artisan::call('cache:clear');
    return redirect()->back();
});
Route::get('/config-clear', function() {
    Artisan::call('config:clear');
    return redirect()->back();
});
Route::get('/route-clear', function() {
    Artisan::call('route:clear');
    return redirect()->back();
});
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return redirect()->back();
});



Route::get('/config-cache', function() {
    Artisan::call('config:cache');
    return redirect()->back();
});
Route::get('/route-cache', function() {
    Artisan::call('route:cache');
    return redirect()->back();
});
Route::get('/view-cache', function() {
    Artisan::call('view:cache');
    return redirect()->back();
});
