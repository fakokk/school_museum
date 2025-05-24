<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showpiece extends Model
{
    use HasFactory;
           // Для того чтобы можно было изменять данные в таблице
       protected $guarded = []; // Используйте $guarded для указания полей, которые нельзя массово заполнять

       protected $fillable = ['title', 'content', 'category_id']; // Убедитесь, что это соответствует вашим полям миграции

       // Определите отношения с другими моделями
       public function category()
       {
           return $this->belongsTo(Category::class);
       }

       public function photos()
       {
           return $this->hasMany(Photo::class);
       }
}
