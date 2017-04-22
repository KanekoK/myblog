<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostsController extends Controller
{
    //

    public function index() {
        // $posts = Post::orderBy('created_at', 'desc')->get();
        $posts = Post::latest('created_at')->get();
        return view('posts.index')->with('posts', $posts);
    }

    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post', $post);
    }

    public function create() {
        return view('posts.create');
    }
}
