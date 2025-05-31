<?php
namespace App\Http\Controllers\Post\Likes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use Illuminate\Support\Facades\File;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\PostUserLike;

class LikesController extends Controller
{


    public function likePost(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);
        return redirect()->route('excursions');
    }


}
