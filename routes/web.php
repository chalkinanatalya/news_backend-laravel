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

Route::get('/news', function () {
    return view('welcome');
});

Route::get('/news/{name}', static function (string $name): string {
    return "Hello, {$name}, glad to see you!";
});

Route::get('/news/{info}', static function (): string {
    return "Site with lots of news";
});

Route::get('/news/{id}', static function (int $id): string {
    return "Piece of news num {$id}";
});
