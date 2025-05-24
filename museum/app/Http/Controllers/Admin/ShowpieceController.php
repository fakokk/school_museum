<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Post\PostRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;

use App\Models\Showpiece;
use App\Models\Category;
use App\Models\Tag;

class ShowpieceController extends BaseController
{
    public function post()
    {
        //переход на страницы c постами
        return view('admin.main.showpiece');
    }
    public function create()
    {
        //показ страницы создания экспоната
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.create_showpiece', compact('categories', 'tags'));
    }
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
    
        return redirect()->route('admin.showpiece.index');
    }

}