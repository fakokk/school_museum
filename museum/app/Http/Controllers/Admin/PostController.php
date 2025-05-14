<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Post\PostRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;



//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class PostController extends Controller
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
    // //добавление нового поста
    public function store(PostRequest $request)
    {
        $data = $request->validated();
 
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);
 
        // добавление тегов и категорий к постам
        $categoryId = $data['category_id'];
        $post->category_id = $categoryId; // Assign the category ID
        $post->save(); // Save the post with the assigned category
        $post->tags()->attach($tagIds);

        $previewImage = $data['preview_image'];
        Storage::put('/images', $previewImage);
        
        // Create or retrieve the post instance
        $post = Post::firstOrCreate($data);
 
        return redirect()->route('admin.post.index');
    }
    //вывод категорий
    public function get_post()
    {
        $posts = Post::all();
        return view('admin.main.posts', compact('posts'));
    }


    //изменение поста
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.main.editpost', compact('post', 'categories', 'tags'));
    }

    //изменение категории
    public function update(UpdateRequest $request, Post $posts)
    {
        $data = $request->validate();
        $posts->update($data);

        // return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена!');
        return view('admin.main.posts', compact('post'));
    }

    //удаление категории
    public function delete(Post $posts)
    {
        $posts->delete();
        return redirect()->route('admin.post.index');
    }



}