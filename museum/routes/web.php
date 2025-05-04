<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CreateController;
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
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/', [CategoryController::class, 'get_category'])->name('admin.category.index');
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');//
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');



    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
