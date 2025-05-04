<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tag';
    //для того чтобы можно было изменять данные в таблице
    protected $quarded = false;
}
