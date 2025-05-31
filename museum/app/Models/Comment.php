<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
     protected $fillable = ['message', 'user_id', 'post_id']; // Убедитесь, что все необходимые поля указаны
     //для возможности изменять таблицу
    protected $guarded = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function posts(){
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function getDateAsCarbonAttribute(){
        return Carbon::parse($this->created_at);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}
