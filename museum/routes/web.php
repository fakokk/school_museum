<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CreateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
// use App\Http\Controllers\Controller;
// use App\Http\Controllers\Admin\CategoryController;

// use App\Http\Controllers\Admin\AdminController;

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
Route::group(['namespace' => 'Main'], function(){
    Route::get('/', function () {return view('welcome');});
    Route::get('/welcome', [IndexController::class, 'welcome'])->name('welcome');
    Route::get('/excursions', [IndexController::class, 'excursions'])->name('excursions');
    Route::get('/auth', [IndexController::class, 'auth'])->name('auth');
    Route::get('/create', [IndexController::class, 'create'])->name('create');
});

// мартруты адмиристратора
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){


    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function(){
        Route::get('/', [CategoryController::class, 'category'])->name('admin.category.index');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/', [CategoryController::class, 'get_category'])->name('admin.category.index');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');//
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function(){
        Route::get('/', [TagController::class, 'tag'])->name('admin.tag.index');
        Route::get('/create', [TagController::class, 'create_tag'])->name('admin.tag.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/', [TagController::class, 'get_tag'])->name('admin.tag.index');
        Route::patch('/{tag}', [TagController::class, 'update_tag'])->name('admin.tag.update');//
        Route::delete('/{tag}', [TagController::class, 'delete_tag'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function(){
        Route::get('/', [PostController::class, 'post'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/', [PostController::class, 'get_post'])->name('admin.post.index');
        Route::get('/{post}', [PostController::class, 'delete'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');//
        Route::delete('/{post}', [PostController::class, 'delete'])->name('admin.post.delete');

    });


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
