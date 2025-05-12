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
class TagController extends Controller
{
    public function category()
    {
        //переход на страницы тегов
        return view('admin.main.tags');
    }
    //добавление нового тега
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        //если такой категории еще не существует
        Tag::firstOrCreate($data);

        return redirect()->route('admin.tag.index');
    }
    //вывод тегов
    public function get_tag()
    {
        $tags = Tag::all();
        return view('admin.main.tags', compact('tags'));
    }
    //изменение тега
    public function update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validate();
        $tag->update($data);

        return view('admin.main.tags', compact('tag'));
    }
    //удаление тега
    public function delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }


}