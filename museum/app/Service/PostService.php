<?php
namespace App\Service;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Support\Facades\DB; // Добавьте этот импорт
use Illuminate\Support\Facades\Storage; // Добавьте этот импорт

class PostService
{
    public function store($data)
    {
        try {
            
            if (isset($data['preview_image']))
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            
            // $data['preview_image'] = Storage::disk('public')->put('images', $data['preview_image']);

            $post = Post::firstOrCreate($data);
            // Обработка тегов
            $tagIds = $data['tag_ids'] ?? []; // Безопасное получение тегов
            unset($data['tag_ids']);

            // добавление тегов кпостам
            $categoryId = $data['category_id'];
            $post->category_id = $categoryId; // Assign the category ID
            $post->save(); // Save the post with the assigned category
            $post->tags()->attach($tagIds);

        } catch (Exception $exception) {
            abort(404);
        }
    }


    public function update($data, $post)
    {
        try {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            //обработка изображения
            if (isset($data['preview_image']))
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            $post->fill($data);// Обновляем только те поля, которые были переданы
            $post->save(); // Сохраняем изменения

            // $postid = $post->id;
            // $post->id = $postid;

            if (!empty($tagIds)) {
                $post->tags()->sync($tagIds);
            }else {
            // Если тегов нет, можно удалить все привязанные теги
            $post->tags()->detach();
        }
        } catch (Exception $exception){
            abort(500);
        } 

        return $post;
    }

}