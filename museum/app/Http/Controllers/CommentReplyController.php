<?php

// app/Http/Controllers/CommentReplyController.php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentReply;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        $reply = new CommentReply([
            'user_id' => auth()->id(),
            'message' => $request->message
        ]);

        $comment->replies()->save($reply);

        return back()->with('success', 'Ответ добавлен!');
    }
        // CommentReplyController.php
    public function destroy($id)
    {
        $reply = CommentReply::findOrFail($id);
        
        // Проверка прав
        if (auth()->id() !== $reply->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Стандартный метод delete()
        $reply->delete();
        
        return back()->with('success', 'Ответ удален!');
    }
}