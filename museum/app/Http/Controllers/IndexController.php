<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

use Illuminate\Http\Request;
use App\Http\Requests\Post\Comment\StoreRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;

use Illuminate\Auth\AuthenticationException;


//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class IndexController extends Controller
{
    public function welcome()
    {
        return view('welcome'); // Возвращает представление spa.blade.php
    }

    public function excursions()
    {
        $posts = Post::paginate(20);
        return view('excursions', compact('posts')); // Возвращает представление spa.blade.php
    }

    public function login()
    {
        return view('auth.login'); // Возвращает представление spa.blade.php
    }

    public function register()
    {
        return view('auth.register'); // Возвращает представление spa.blade.php
    }

    public function show(Post $post)
    {
       if (!$post) {
           abort(404); // если поста не существует
       }

       $categories = Category::all();
       $tags = Tag::all();

       return view('post', compact('post', 'categories', 'tags'));
    }

    public function comment(Post $post, StoreRequest $request)
{
    $data = $request->validated();

    $data['user_id'] = auth()->user()->id;
    $data['post_id'] = $post->id;
        \Log::info('User ID: ' . $data['user_id']);
    \Log::info('Post ID: ' . $data['post_id']);

    Comment::create($data);

    return redirect()->route('post.show', $post->id);
}
    
}