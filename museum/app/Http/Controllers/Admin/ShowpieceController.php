<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Showpiece\ShowpieceRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;

use App\Models\Showpiece;
use App\Models\ShowpiecePhoto;
use App\Models\ShowpieceTag;
use App\Models\Category;
use App\Models\Tag;

class ShowpieceController extends BaseController
{
    public function post()
    {
        //переход на страницы c постами
        return view('admin.main.showpiece');
    }
    public function create()
    {
        //показ страницы создания экспоната
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.create_showpiece', compact('categories', 'tags'));
    }
        //вывод категорий
    public function get_showpiece()
    {
        $showpieces = Showpiece::all();
        return view('admin.main.showpiece', compact('showpieces'));
    }

    public function new_showpiece(ShowpieceRequest $request)
    {
        $data = $request->validated();

        // Создание экспоната
        $showpiece = Showpiece::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
        ]);

        // Обработка загруженных изображений
        if (isset($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                // Сохраняем изображение и получаем путь
                $imagePath = Storage::disk('public')->put('images', $photo);

                // Сохраняем путь к изображению в таблице showpiece_photos
                $showpiece->photos()->create([
                    'url' => $imagePath
                ]);
            }
        }

        // Присоединяем теги к экспонату
        $tagIds = $data['tag_ids'] ?? []; // Безопасное получение ID тегов
        $showpiece->tags()->attach($tagIds); // Присоединяем теги к экспонату

        return redirect()->route('admin.showpiece.index')->with('success', 'Showpiece created successfully!');
    }

    public function edit(Showpiece $showpiece)
    {
        $showpiece = Showpiece::findOrFail($showpiece->id);

        $categories = Category::all();
        $tags = Tag::all();


        return view('admin.main.edit_showpiece', compact('showpiece', 'categories', 'tags'));
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


}