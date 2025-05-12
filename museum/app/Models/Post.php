<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;

    protected $fillable = [
        'title', // Добавьте другие поля, если необходимо
        'content', // Например, если у вас есть поле content
        // 'other_field', // Другие поля
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
        // return $this->belongsToMany(Tag::class);     
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
