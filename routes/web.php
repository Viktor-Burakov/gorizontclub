<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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

Route::get('/',  [PostController::class, 'index'])->name('main.index');
Route::get('/posts/create',  [PostController::class, 'create'])->name('post.create');
Route::post('/posts/create',  [PostController::class, 'store'])->name('post.store');

Route::get('/{post}',  [PostController::class, 'show'])->name('post.show');
Route::get('/{post}/edit',  [PostController::class, 'edit'])->name('post.edit');
Route::patch('/{post}',  [PostController::class, 'update'])->name('post.update');
Route::delete('/{post}',  [PostController::class, 'destroy'])->name('post.delete');





Route::get('/category',  [CategoryController::class, 'index']);


Route::get('/test', function () {
    return 'test';
});
