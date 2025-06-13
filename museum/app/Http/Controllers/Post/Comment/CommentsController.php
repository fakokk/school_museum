<?php
namespace App\Http\Controllers\Post\Comment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class CommentsController extends Controller
{

    public function comment(Post $post, StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $comment = new Comment([
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        $post->comments()->save($comment);

        return back()->with('success', 'Комментарий добавлен!');
    }
    
    // app/Http/Controllers/CommentController.php
    public function delete(Comment $comment)
    {
        // Проверяем, что пользователь может удалять этот комментарий
        if (auth()->id() !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $comment->delete();
        
        return back()->with('success', 'Комментарий удален!');
    }
  

}
