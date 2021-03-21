<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(20);
        return view('posts.index', [ "posts" => $allPosts ]);
    }

    public function show($postID)
    {
        $post =  Post::find($postID);
        return view('posts.show', ["post" => $post]);
    }

    public function create()
    {
        $users = User::all();
        return view("posts.create", [ 'users' => $users ]);
    }

    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request->description;
        $post->save();

        return redirect()->route("posts.index");
    }

    public function edit($postID)
    {
        $post =  Post::find($postID);
        $users = User::all();
        return view('posts.edit', [ "post" => $post, 'users' => $users ]);
    }

    public function update($postID, Request $request)
    {
        $post =  Post::find($postID);
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request->description;
        $post->save();
        return redirect()->route("posts.index");
    }

    public function destroy($postID)
    {
        Post::destroy($postID);
        return redirect()->route("posts.index");
    }
}
