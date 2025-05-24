<?php
namespace App\Http\Controllers\Personal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;

class PersonalController extends Controller
{
    public function personal()
    {
        return view('personal.main.index');
    }

    // Лайки пользователя 
    public function likes()
    {
        $posts = auth()->user()->LikedPosts;
        return view('personal.main.likes', compact('posts'));
    }

    public function delete_like(Post $post)
    {
        auth()->user()->LikedPosts()->detach($post->id);
        return redirect()->route('personal.main.comments');
    }

    // Все комментарии, оставленные пользователем
    public function comments() 
    {
        $comments = auth()->user()->comments;
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

    // public function store_comment(Request $request, $postId)
    // {
    //     $request->validate();

    //     $comment = new Comment();
    //     $comment->post_id = $postId;
    //     $comment->user_id = auth()->id();;
    //     $comment->message = $request->message;
    //     $comment->save();

    //     return redirect()->route('posts.show', $postId);
    // }

}
