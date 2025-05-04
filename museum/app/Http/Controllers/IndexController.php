<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;

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
        return view('excursions'); // Возвращает представление spa.blade.php
    }

    public function auth()
    {
        return view('auth'); // Возвращает представление spa.blade.php
    }

    public function create()
    {
        return view('admin.main.create'); // Возвращает представление spa.blade.php
    }
    public function admin()
    {
        //return view('create'); // Возвращает представление spa.blade.php
        return view('admin.main.index');
    }
    
}