<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
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

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get(
        '/',
        IndexController::class,
    )->name('main.index');
    Route::get('/posts/create',  CreateController::class)->name('post.create');
    Route::post('/posts/create',  StoreController::class)->name('post.store');

    Route::get('/{post}',  ShowController::class)->name('post.show');
    Route::get('/{post}/edit', EditController::class)->name('post.edit');
    Route::patch('/{post}',  UpdateController::class)->name('post.update');
    Route::delete('/{post}',  DestroyController::class)->name('post.delete');
});






Route::get('/category',  [CategoryController::class, 'index']);


Route::get('/test', function () {
    return 'test';
});
