<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Routing\Route;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller; // Correctly import the base Controller, обязательный пункт!

use App\Models\Components;

//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class ComponentsController extends Controller
{
    public function components()
    {
        //переход на страницу отображения всех пользовытелей
        return view('admin.main.components');
    }
    //вывод пользователей
    public function get_user()
    {
        $user = User::all();
        return view('admin.main.user', compact('user'));
    }
    //изменение пользователя
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validate();
        $user->update($data);

        return view('admin.main.user', compact('user'));
    }
    //удаление пользователя
    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }
    //бан пользователя


}