<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;
    
    protected $fillable = ['title']; // Ensure this matches your migration fields
}
