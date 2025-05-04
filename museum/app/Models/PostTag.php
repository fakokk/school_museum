<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $table = 'post_tags';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;
}
