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

    // Метод для обновления профиля
    public function updateaccount(UpdateRequest $request)
    {
        $user = auth()->user(); // Получаем текущего авторизованного пользователя

        // Обновляем данные пользователя
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        // Обновление пароля, если он был введен
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Обновление изображения пользователя, если оно было загружено
        if ($request->hasFile('user_image')) {
            // Удаляем старое изображение, если оно существует
            if ($user->user_image) {
                File::delete(public_path($user->user_image));
            }

            // Сохраняем новое изображение
            $path = $request->file('user_image')->store('user_images', 'public');
            $user->user_image = $path;
        }

        $user->save(); // Сохраняем изменения в базе данных

        return redirect()->route('personal')->with('success', 'Данные профиля успешно обновлены.');
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
