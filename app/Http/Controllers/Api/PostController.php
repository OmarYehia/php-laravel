<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(10);
        return PostResource::collection($allPosts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->user_id = $request->user_id;
        $post->description = $request->description;
        $res = $post->save();
        if ($res) {
            return [$post];
        }
    }
}
