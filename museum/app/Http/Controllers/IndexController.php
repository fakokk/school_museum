<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use Illuminate\Auth\AuthenticationException;


//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class IndexController extends Controller
{
    public function welcome()
    {
        return view('welcome'); // Возвращает представление spa.blade.php
    }
    public function excursions()
    {
        $posts = Post::paginate(20);
        return view('excursions', compact('posts')); // Возвращает представление spa.blade.php
    }
        public function login()
    {
        return view('auth.login'); // Возвращает представление spa.blade.php
    }
        public function register()
    {
        return view('auth.register'); // Возвращает представление spa.blade.php
    }
    
}