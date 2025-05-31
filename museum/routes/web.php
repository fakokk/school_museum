<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CreateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ComponentsController;
use App\Http\Controllers\Admin\ShowpieceController;
use App\Http\Controllers\Personal\PersonalController;
use App\Http\Controllers\Post\Comment\CommentsController;
use App\Http\Controllers\Post\Likes\LikesController;

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
     Route::get('/showpiece', [IndexController::class, 'showpiece'])->name('showpiece');
     
    Route::get('/showpiece/{id}', [IndexController::class, 'show_piece'])->name('showpiece.show');
    
    Route::get('/filter', [IndexController::class, 'filter']);

    Route::get('/login', [IndexController::class, 'welcome'])->name('login');
    Route::get('/register', [IndexController::class, 'welcome'])->name('register');

    Route::get('/search', [SearchController::class, 'index']);

    // Route::get('{post}/comment', [IndexController::class, 'show_comments'])->name('posts.comment.store'); //просмотр комментариев поста

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
            Route::post('/{post}', [PersonalController::class, 'comment'])->name('personal.comment.store'); //просмотр конкретного поста
    
        });

    });

});



// мартруты администратора
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin'] ], function(){
    
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
    Route::get('/statist', [AdminController::class, 'statist'])->name('statist');    
    Route::get('/comments', [AdminController::class, 'comments'])->name('comments');

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

        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('admin.tag.edit');//кривое отображение формы редактирования
        Route::patch('/{post}', [PostController::class, 'update'])->name('admin.tag.update');
        Route::delete('/{post}', [PostController::class, 'delete'])->name('admin.tag.delete');
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
        
        Route::get('/', [ShowpieceController::class, 'index'])->name('admin.showpiece.index');
        Route::get('/create', [ShowpieceController::class, 'create'])->name('admin.showpiece.create');
        Route::post('/', [ShowpieceController::class, 'new_showpiece'])->name('admin.showpiece.store');
        //Route::get('/{showpiece}', [ShowpieceController::class, 'delete'])->name('admin.showpiece.show');
        Route::get('/{showpiece}/edit', [ShowpieceController::class, 'edit'])->name('admin.showpiece.edit');
        Route::patch('/{showpiece}', [ShowpieceController::class, 'update'])->name('admin.showpiece.update');//
        //Route::delete('/{showpiece}', [ShowpieceController::class, 'delete'])->name('admin.showpiece.delete');
        Route::get('/{id}', [ShowpieceController::class, 'show'])->name('admin.showpiece.show');
        Route::delete('/admin/showpiece/photo/{id}', [ShowpieceController::class, 'destroyPhoto'])->name('admin.showpiece.photo.destroy');

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

    Route::group(['namespace' => 'Components', 'prefix' => 'components'], function(){
        Route::get('/', [ComponentsController::class, 'components'])->name('admin.components.index');
        Route::get('/{components}/edit', [ComponentsController::class, 'edit'])->name('admin.components.edit');
        Route::patch('/{components}', [ComponentsController::class, 'update'])->name('admin.components.update');//
        Route::delete('/{components}', [ComponentsController::class, 'delete'])->name('admin.components.delete');
    });


});

Auth::routes(['verify' => true]);
Route::post('/posts/{post}/like', [LikesController::class, 'likePost'])->name('posts.like.store');


Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function(){
    Route::get('/{post}', [IndexController::class, 'show'])->name('post.show'); //просмотр конкретного поста
    //

});
//этот метод должен находиться здесь. костыль, иначе ломается доступ в личный кабинет


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');