<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Showpiece;

use Illuminate\Support\Facades\Storage; // Добавьте этот импорт 

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
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('excursions', compact('posts')); // Возвращает представление spa.blade.php
    }
    
    public function showpiece()
    {
        $showpieces = Showpiece::orderBy('created_at', 'desc')->paginate(20);
        return view('showpiece', compact('showpieces')); // Возвращает представление spa.blade.php
    }

    public function login()
    {
        return view('auth.login'); // Возвращает представление spa.blade.php
    }

    public function register()
    {
        return view('auth.register'); // Возвращает представление spa.blade.php
    }

    public function filter(Request $request)
    {
        $tagId = $request->input('tag_id'); // Получаем ID тега
        $showpieces = Showpiece::whereHas('tags', function($query) use ($tagId) {
            $query->where('id', $tagId); // Фильтруем по ID тега
        })->with('photos')->get();

        return response()->json($showpieces);
    }


    public function show(Post $post)
    {
        if (!$post) {
            abort(404); // если поста не существует
        }

        $categories = Category::all();
        $tags = Tag::all();
        // Получаем комментарии для данного поста
        $comments = Comment::where('post_id', $post->id)->with('user')->get();

        return view('post', compact('post', 'categories', 'tags', 'comments'));
    }


    public function show_piece($id)
    {
        $showpiece = Showpiece::with(['photos', 'category', 'tags'])->findOrFail($id);
        
        // Формируем массив с данными, включая полный URL для фотографий
        $showpieceData = [
            'id' => $showpiece->id,
            'title' => $showpiece->title,
            'content' => $showpiece->content,
            'category' => $showpiece->category,
            'tags' => $showpiece->tags,
            'photos' => $showpiece->photos->map(function($photo) {
                return [
                    'url' => Storage::url($photo->url) // Убедитесь, что здесь возвращается полный URL
                ];
            }),
        ];

        return response()->json($showpieceData);
    }

    
}