<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController as AdminController;

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
Route::get('/', function () {
    return view('welcome');
});

//admin routes
Route::group(['prefix' => 'admin'], static function () {
    Route::get('/', AdminController::class)
    ->name('iadmin.ndex');
});

Route::group(['prefix' => ''], static function () {
    Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
});
