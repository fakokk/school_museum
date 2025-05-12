<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Category;
use App\Models\Tag;

//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class CategoryController extends Controller
{
    public function category()
    {
        //переход на страницы категорий
        return view('admin.main.categories');
    }
    public function create()
    {
        //показ страницы создания поста
        return view('admin.main.create');
    }
    //добавление новой категории
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        //если такой категории еще не существует
        Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
    }
    //вывод категорий
    public function get_category()
    {
        $categories = Category::all();
        return view('admin.main.categories', compact('categories'));
    }
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $category->update($validatedData);

        return redirect()->route('admin.category.index');
    }

    //удаление категории
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }


}