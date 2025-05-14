<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

// Контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class AdminController extends Controller
{
    public function admin()
    {
        // return view('create'); // Возвращает представление spa.blade.php
        return view('admin.main.index');
    }
}
