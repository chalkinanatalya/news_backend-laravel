<?php

use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\SourceController as AdminSourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\LoginController;

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

Route::group(['middleware' => 'auth'], static function () {
    Route::get('/logout', [LoginController::class])->name('account.logout');
    Route::get('/account', AccountController::class)->name('account');

    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is.admin'], static function () {
        Route::get('/', AdminController::class)
        ->name('index');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('sources', AdminSourceController::class);
        Route::resource('users', AdminUserController::class);

});

});

Route::group(['prefix' => ''], static function () {
    Route::get('/news', [NewsController::class, 'index'])
    ->name('news');

    Route::get('/categories', [CategoryController::class, 'index'])
    ->name('categories');

    Route::get('/feedback', [FeedBackController::class, 'index'])
    ->name('feedback');

    Route::get('/order', [OrderController::class, 'index'])
    ->name('order');

    Route::get('/news/{id}/show', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');
});

Route::get('session', function () {
    $sessionName = 'test';
    if(session()->has($sessionName)) {
        //dd(session()->get($sessionName), session()->all());
        session()->forget($sessionName);
    }
    dd(session()->all());
    session()->put($sessionName, 'example');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('collection', function() {
//     $names = ['names' => ['Ann', 'Billy', 'Sam', 'Jhon', 'Andy', 'Feeby', 'Edd', 'Jil', 'Jeck', 'Freddy']];
//     $collection = collect([
//         ['product' => 'Desk', 'price' => 200],
//         ['product' => 'Chair', 'price' => 100],
//         ['product' => 'Bookcase', 'price' => 150],
//         ['product' => 'Door', 'price' => 100],
//     ]);

//     $collect = \collect($names);

//     dd($collection->where('price', 100)->toJson());

//     dd($collect->toJson());


// });
