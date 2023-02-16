<?php

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

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', \App\Http\Controllers\Admin\IndexController::class);
    Route::get('/{id}/close', \App\Http\Controllers\Admin\CloseController::class);
    Route::get('/{id}', \App\Http\Controllers\Admin\ShowController::class);
    Route::put('/{id}', \App\Http\Controllers\Admin\UpdateController::class);
    Route::get('/create', \App\Http\Controllers\Admin\CreateController::class);
    Route::post('/', \App\Http\Controllers\Admin\StoreController::class);
});

Route::get('/', \App\Http\Controllers\Front\IndexController::class);
Route::get('/{id}/close', \App\Http\Controllers\Front\CloseController::class);
Route::get('/{id}', \App\Http\Controllers\Front\ShowController::class);



