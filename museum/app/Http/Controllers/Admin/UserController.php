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
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Auth\Events\Registered;

use App\Mail\User\PasswordMail;
use App\Models\User;

//контроллер, который выполняет переход просто по страницам, которые доступны всем пользователям
class UserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id', 'desc')->paginate(10); // Получаем пользователей с пагинацией
        return view('admin.main.user', compact('users'));
    }
    //страница добавления нового пользователя
    public function create()
    {
        $roles = User::getRoles();

        //переход на страницу отображения всех пользовытелей
        return view('admin.main.newuser', compact('roles'));
    }

    //добавление нового пользователя
public function store(StoreRequest $request)
{
    $data = $request->validated();

    // Генерация случайного пароля
    $password = Str::random(10);
    $data['password'] = Hash::make($password); // Используем сгенерированный пароль

    // Отправка письма с паролем
    Mail::to($data['email'])->send(new PasswordMail($password));

    // Создание нового пользователя
    $user = User::firstOrCreate(['email' => $data['email']], $data);

    // Генерация события регистрации
    event(new Registered($user));

    return redirect()->route('admin.user.index');
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
    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.profile', compact('user'));
    }

    public function toggleBan($id)
    {
        $user = User::findOrFail($id);
        $user->is_banned = !$user->is_banned;
        $user->banned_at = $user->is_banned ? now() : null;
        $user->save();

        return back()->with('success', $user->is_banned 
            ? 'Пользователь заблокирован' 
            : 'Пользователь разблокирован');
    }


}