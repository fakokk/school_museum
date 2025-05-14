<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Post\PostRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;



//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class PostController extends BaseController
{
    public function post()
    {
        //переход на страницы c постами
        return view('admin.main.posts');
    }
    public function create()
    {
        //показ страницы создания поста
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.create', compact('categories', 'tags'));
    }
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
    
        return redirect()->route('admin.post.index');
    }
    //вывод категорий
    public function get_post()
    {
        $posts = Post::all();
        return view('admin.main.posts', compact('posts'));
    }

    //редактирование поста
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.main.editpost', compact('post', 'categories', 'tags'));
    }

    //изменение поста
    public function update(UpdateRequest $request, $id)
    {
        // Находим пост по ID
        $post = Post::findOrFail($id);
        
        // Получаем валидированные данные из запроса
        $data = $request->validated();

        // Обновляем пост с помощью сервиса
        $post = $this->service->update($data, $post);

        return redirect()->route('admin.post.index');
        // return view('admin.main.posts', compact('post'));
    }

    //удаление категории
    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index');
    }

}