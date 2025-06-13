<?php

// app/Http/Controllers/CommentReplyController.php
namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
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
    public function destroy(CommentReply $reply)
    {
        $reply->delete();

        return back()->with('success', 'Ответ удалён');
    }
}