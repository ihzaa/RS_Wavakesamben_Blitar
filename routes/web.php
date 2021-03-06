<?php

use App\Http\Controllers\User\HeaderController;
use App\Http\Controllers\User\HeaderFooterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear-cache', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    echo 'ok';
});

Route::get('generate', function () {
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo 'ok';
});

Route::get('getUserHeaderAndFooter', [HeaderFooterController::class, 'getAllData'])->name('getHeaderAndFooterData');
