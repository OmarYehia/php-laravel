<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $post = Post::find($request->post_id);

        $comment = new Comment;
        $comment->body = $request->comment;
        $comment->commentor_name = $request->user_name;
    
        $post->comment()->save($comment);

        return back();
    }
}
