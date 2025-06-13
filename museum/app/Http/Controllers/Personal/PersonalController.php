<?php
namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Requests\Post\Comment\StoreRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth; // Добавьте этот use
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PersonalController extends Controller
{
    public function personal()
    {
        $user = Auth::user();
        
        // Получаем лайкнутые посты пользователя
        $likedPosts = $user->likedPosts()->with('category')->get();
        
        // Получаем комментарии пользователя с информацией о посте
        $comments = $user->comments()->with('post')->latest()->get();

        return view('personal.main.index', compact('user', 'likedPosts', 'comments'));
    }

    // Лайки пользователя 
    public function likes()
    {
        $posts = auth()->user()->LikedPosts;
        return view('personal.main.likes', compact('posts'));
    }

    //функция удаления лайка с поста
    public function delete_like(Post $post)
    {
        auth()->user()->LikedPosts()->detach($post->id);
        return redirect()->route('personal.main.comments');
    }

    // Все комментарии, оставленные пользователем
    public function comments()
    {
        $comments = Comment::where('user_id', auth()->id())->with('post')->get();
        return view('personal.main.comments', compact('comments'));
    }


    // Метод для редактирования профиля
    public function editaccount()
    {
        $user = auth()->user(); // Получаем текущего авторизованного пользователя
        return view('personal.main.editaccount', compact('user'));
    }

    public function updateaccount(UpdateRequest $request)
    {
        $user = auth()->user();

        // Обновляем основные данные
        $user->username = $request->validated()['username'];
        $user->email = $request->validated()['email'];
        $user->profile_description = $request->validated()['profile_description'] ?? null;

        // Обновление пароля
        if ($request->filled('current_password') && $request->filled('password')) {
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors(['current_password' => 'Неверный текущий пароль']);
            }
            $user->password = bcrypt($request->validated()['password']);
        }

        // Обновление аватарки
        if ($request->hasFile('user_image')) {
            // Удаляем старое изображение
            if ($user->user_image) {
                Storage::disk('public')->delete($user->user_image);
            }
            
            // Сохраняем новое
            $path = $request->file('user_image')->store('user_images', 'public');
            $user->user_image = $path;
        }

        $user->save();

        return redirect()->route('personal')->with('success', 'Профиль успешно обновлен');
    }

    public function comment(Post $post, StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
            \Log::info('User ID: ' . $data['user_id']);
        \Log::info('Post ID: ' . $data['post_id']);

        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }

}
