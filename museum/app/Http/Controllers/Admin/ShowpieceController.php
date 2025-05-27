<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Showpiece\ShowpieceRequest;
use App\Http\Requests\Admin\Showpiece\ShowpieceUpdate;


use App\Models\Showpiece;
use App\Models\ShowpiecePhoto;
use App\Models\ShowpieceTag;
use App\Models\Category;
use App\Models\Tag;

class ShowpieceController extends BaseController
{
        //вывод категорий
    public function get_showpiece()
    {
        $showpieces = Showpiece::orderBy('created_at', 'asc')->get();
        return view('admin.main.showpiece', compact('showpieces'));
    }

    public function create()
    {
        //показ страницы создания экспоната
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.create_showpiece', compact('categories', 'tags'));
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
    public function update(ShowpieceUpdate $request, $id)
    {
        // Находим пост по ID
        $showpiece = Showpiece::findOrFail($id);
        
        // Получаем валидированные данные из запроса
        $data = $request->validated();


        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            //обработка изображения
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
            $showpiece->fill($data);// Обновляем только те поля, которые были переданы
            $showpiece->save(); // Сохраняем изменения


            if (!empty($tagIds)) {
                $showpiece->tags()->sync($tagIds);
            }else {
            // Если тегов нет, можно удалить все привязанные теги
            $showpiece->tags()->detach();
        }
        } catch (Exception $exception){
            abort(500);
        } 


        return redirect()->route('admin.showpiece.index');
        // return view('admin.main.posts', compact('post'));
    }

    public function destroyPhoto($id)
    {
        $photo = ShowpiecePhoto::findOrFail($id); // Предполагается, что у вас есть модель ShowpiecePhoto
        Storage::disk('public')->delete($photo->url); // Удаляем файл из хранилища
        $photo->delete(); // Удаляем запись из базы данных

        return response()->json(['success' => true]);
    }



}