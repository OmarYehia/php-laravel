<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class PostsController extends Controller
{
    private $allPosts = [
        ["id" => "1", "Title" => "Blog Post1", "User" => ["name" => "Omar Yehia"], "Created_at" => "2021-02-05"],
        ["id" => "2", "Title" => "Blog Post2", "User" => ["name" => "Omar Yehia"], "Created_at" => "2021-02-06"],
        ["id" => "2", "Title" => "Blog Post3", "User" => ["name" => "Omar Yehia"], "Created_at" => "2021-02-07"],
    ];

    public function index() {
        return view('posts.index', [ "posts" => $this->allPosts ]);
    }

    public function show($postID) {
        $post = ["id" => "1", "description" => "This is the first blog post on this website", "title" => "Blog Post1", "user" => ["name" => "Omar Yehia", "email" => "Omar@omar.com"], "created_at" => "2021-02-05"];
        return view('posts.show', ["post" => $post]);
    }

    public function create() {
        return view("posts.create");
    }

    public function store() {
        return redirect()->route("posts.index");
    }

    public function edit($postID) {
        $post = ["id" => "1", "description" => "This is the first blog post on this website", "title" => "Blog Post1", "user" => ["name" => "Omar Yehia", "email" => "Omar@omar.com"], "created_at" => "2021-02-05"];
        return view('posts.edit', [ "post" => $post ]);
        
    }

    public function update($postID) {
        $post = ["id" => "1", "description" => "This is the first blog post on this website", "title" => "Blog Post1", "user" => ["name" => "Omar Yehia", "email" => "Omar@omar.com"], "created_at" => "2021-02-05"];
        return redirect()->route("posts.index");
        
    }

    public function destroy($postID) {
        return redirect()->route("posts.index");
    }
}
