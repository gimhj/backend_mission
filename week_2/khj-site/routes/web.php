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

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
Route::resource('articles', \App\Http\Controllers\ArticleController::class);

Route::middleware('auth')->group(function () {
    // Like
    Route::name('likes.')->group(function () {
        Route::post('/', [\App\Http\Controllers\LikeController::class, 'store'])->name('like');
        Route::delete('/{like}', [\App\Http\Controllers\LikeController::class, 'destroy'])->name('unlike');
    });
});

Auth::routes();
