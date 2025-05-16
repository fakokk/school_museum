<?php
namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Models\Post;


// Контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class PersonalController extends Controller
{
    public function personal()
    {
    //     $data = [];
    //     $data['usersCount'] = User::all()->count();
    //     $data['postsCount'] = Post::all()->count();

        // return view('create'); // Возвращает представление spa.blade.php
        return view('personal.main.index');
    }


    //лайки пользователя 
    public function likes()
    {
        $posts = auth()->user()->LikedPosts;
        return view('personal.main.likes', compact('posts'));
    }



    public function delete_like(Post $post)
    {
        $posts = auth()->user()->LikedPosts()->detach($post->id);

        return redirect()->route('personal.main.comments');
    }

    // Route::get('/comments', [PersonalController::class, 'comments'])->name('personal.comments');
    // Route::get('/{comments}/edit', [PersonalController::class, 'edit'])->name('personal.likes.edit');
    // Route::patch('/{comments}', [PersonalController::class, 'update'])->name('personal.likes.update');
    // Route::delete('/{comments}', [PersonalController::class, 'delete'])->name('personal.likes.delete');

    // все комментарии, оставленные пользователем
    public function comments() 
    {
        $comments = auth()->user()->comments;
        return view('personal.main.comments', compact('comments'));
    }
    public function edit(Comment $comment) 
    {
        return view('personal.comments.edit', compact('comments'));
    }
    public function update(Comment $comment) 
    {
        return view('personal.comments.edit', compact('comments'));
    }
    public function delete(Comment $comment) 
    {
        $comment->delete();
        return view('personal.comments.edit', compact('comments'));
    }

}
