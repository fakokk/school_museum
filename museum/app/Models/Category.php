<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;
    // Укажите поля, которые можно массово заполнять
    protected $fillable = ['title'];
    
}
