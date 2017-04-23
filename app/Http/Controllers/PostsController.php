<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Foundation\Http\Requests\PostRequest;

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

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit')->with('post', $post);
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/')->with('flash_message', 'Post Deleted!');
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $this->validate($request,[
            'title' => 'required|min:3',
            'body'  => 'required'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/')->with('flash_message', 'Post Added!');
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'title' => 'required|min:3',
            'body'  => 'required'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('/')->with('flash_message', 'Post Updated!');
    }
}
