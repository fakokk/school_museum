<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Импортируем SoftDeletes

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;

    protected $fillable = [
        'title',
        'content',
        'preview_image',
        'category_id',
        'post_tags'
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

    // public function likedUsers(){
    //     return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    // }

    public function commentS(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }

    public function likes()
    {
        return $this->hasMany(PostUserLike::class);
    }
}
