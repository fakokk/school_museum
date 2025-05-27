<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showpiece extends Model
{
    use HasFactory;
        protected $table = 'showpiece'; // Ensure this matches your migration
           // Для того чтобы можно было изменять данные в таблице
       protected $guarded = []; // Используйте $guarded для указания полей, которые нельзя массово заполнять

       protected $fillable = ['title', 'content', 'category_id']; // Убедитесь, что это соответствует вашим полям миграции

       // Определите отношения с другими моделями
       public function category()
       {
           return $this->belongsTo(Category::class);
       }

    // Relationship with photos
    public function photos()
    {
        return $this->hasMany(ShowpiecePhoto::class);
    }

    // Relationship with tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'showpiece_tags', 'showpiece_id', 'tag_id');
    }

       protected static function boot()
        {
            parent::boot();

            static::deleting(function ($showpiece) {
                foreach ($showpiece->photos as $photo) {
                    Storage::disk('public')->delete($photo->photo_path);
                }
            });
        }

}
