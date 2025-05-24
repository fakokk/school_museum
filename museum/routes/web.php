<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CreateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShowpieceController;
use App\Http\Controllers\Personal\PersonalController;

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
    Route::get('/',  [IndexController::class, 'welcome']);
    Route::get('/welcome', [IndexController::class, 'welcome'])->name('welcome');

    Route::get('/excursions', [IndexController::class, 'excursions'])->name('excursions');

    Route::get('/login', [IndexController::class, 'welcome'])->name('login');
    Route::get('/register', [IndexController::class, 'welcome'])->name('register');

    Route::group(['namespace' => 'Post'], function(){
        Route::get('/{post}', [IndexController::class, 'show'])->name('posts.show'); //просмотр конкретного поста
    
    });

    Route::group(['namespace' => 'Comments'], function(){
        // Route::get('/{comments}', [IndexController::class, 'show_comments'])->name('posts.comments'); //просмотр комментариев поста
    
    });
    
});


// мартруты зарегистрированного пользователя
Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => ['auth'] ], function(){
    
    Route::get('/', [PersonalController::class, 'personal'])->name('personal');

    Route::group(['namespace' => 'Main'], function(){

        // Route::get('/editaccount', [PersonalController::class, 'editaccount'])->name('editaccount');
        Route::get('/edit', [PersonalController::class, 'editaccount'])->name('personal.edit');
        Route::post('/update', [PersonalController::class, 'updateaccount'])->name('personal.update');


        Route::group(['namespace' => 'Liked', 'prefix' => 'likes'], function(){
            Route::get('/', [PersonalController::class, 'likes'])->name('personal.likes');
            Route::delete('/{post}', [PersonalController::class, 'delete'])->name('personal.likes.delete');
            });

        Route::group(['namespace' => 'Comments', 'prefix' => 'comments'], function(){
            Route::get('/comments', [PersonalController::class, 'comments'])->name('personal.comments');//комментарии данного пользователя
        //     // Route::get('/{post}', [PersonalController::class, 'store_comment'])->name('personal.comments.store');
        //     // Route::get('/{comments}', [PersonalController::class, 'edit_comment'])->name('personal.comments.edit');
        //     // Route::patch('/{comments}', [PersonalController::class, 'update_comment'])->name('personal.comments.update');
        //     // Route::delete('/{comments}', [PersonalController::class, 'delete_comment'])->name('personal.comments.delete');
        });

    });

});

// мартруты администратора
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified'] ], function(){

    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    Route::group(['namespace' => 'Category', 'prefix' => 'category'], function(){
        Route::get('/', [CategoryController::class, 'category'])->name('admin.category.index');
        Route::post('/', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/', [CategoryController::class, 'get_category'])->name('admin.category.index');//
        Route::patch('/{category}', [CategoryController::class, 'update'])->name('admin.category.update');//
        Route::delete('/{category}', [CategoryController::class, 'delete'])->name('admin.category.delete');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tag'], function(){
        Route::get('/', [TagController::class, 'tag'])->name('admin.tag.index');
        Route::get('/create', [TagController::class, 'create_tag'])->name('admin.tag.create');
        Route::post('/', [TagController::class, 'store'])->name('admin.tag.store');
        Route::get('/', [TagController::class, 'get_tag'])->name('admin.tag.index');//
        Route::patch('/{tag}', [TagController::class, 'update_tag'])->name('admin.tag.update');//
        Route::delete('/{tag}', [TagController::class, 'delete_tag'])->name('admin.tag.delete');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'post'], function(){
        Route::get('/', [PostController::class, 'post'])->name('admin.post.index');
        Route::get('/create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('/', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/', [PostController::class, 'get_post'])->name('admin.post.index');
        Route::get('/{post}', [PostController::class, 'delete'])->name('admin.post.show');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.post.edit');//кривое отображение формы редактирования
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.post.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('admin.post.delete');
        
    });

    Route::group(['namespace' => 'Showpiece', 'prefix' => 'showpiece'], function(){
        Route::get('/', [ShowpieceController::class, 'post'])->name('admin.showpiece.index');
        Route::get('/create', [ShowpieceController::class, 'create'])->name('admin.showpiece.create');
        Route::post('/', [ShowpieceController::class, 'store'])->name('admin.showpiece.store');
        // Route::get('/', [ShowpieceController::class, 'get_showpiece'])->name('admin.showpiece.index');
        //Route::get('/{showpiece}', [ShowpieceController::class, 'delete'])->name('admin.showpiece.show');
        //Route::get('/{showpiece}/edit', [ShowpieceController::class, 'edit'])->name('admin.showpiece.edit');
        //Route::patch('/{showpiece}', [ShowpieceController::class, 'update'])->name('admin.showpiece.update');//
        //Route::delete('/{showpiece}', [ShowpieceController::class, 'delete'])->name('admin.showpiece.delete');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'user'], function(){
        Route::get('/', [UserController::class, 'post'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/', [UserController::class, 'get_user'])->name('admin.user.index');
        Route::get('/{user}', [UserController::class, 'delete'])->name('admin.user.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::patch('/{user}', [UserController::class, 'update'])->name('admin.user.update');//
        Route::delete('/{user}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
