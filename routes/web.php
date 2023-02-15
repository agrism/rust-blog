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

Route::get('/', \App\Http\Controllers\Front\IndexController::class);
Route::get('/{id}/close', \App\Http\Controllers\Front\CloseController::class);
Route::get('/{id}', \App\Http\Controllers\Front\ShowController::class);



