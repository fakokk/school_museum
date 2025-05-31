<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Showpiece;

use Illuminate\Support\Facades\Storage; // Добавьте этот импорт 

use Illuminate\Auth\AuthenticationException;


//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class SearchController extends Controller
{
    public function index(Request $request) 
    {
         $query = $request->input('query');
         $showpieces = Showpiece::where('title', 'LIKE', "%{$query}%")->get();
         return view('search', compact('showpieces'));
     }



    
}