<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;



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
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Category::firstOrCreate($data);

        return redirect()->route('admin.category.index');
        // dd($data);
        // return view('admin.main.create');
    }

    public function get_category()
    {
        // return view('create'); // Возвращает представление spa.blade.php
        //return view('admin.main.index');
        $categories = Category::all();
        return view('admin.main.categories', compact('categories'));
        // return view('admin.main.categories', compact('categories')); // Передаем переменную в представление
    }
    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validate();
        $category->update($data);

        // return redirect()->route('admin.category.index')->with('success', 'Категория успешно обновлена!');
        return view('admin.main.categories', compact('category'));
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index');
    }
    

}