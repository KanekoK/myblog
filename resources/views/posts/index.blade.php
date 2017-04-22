@extends('layouts.default')

@section('title')
Blog Posts
@endsection

@section('content')
<h1>
  <a href="{{ url('/posts/create') }}" class="pull-right fs12">Add New</a>
  Posts
</h1>

<ul>
  @forelse ($posts as $post)
  <li>
    <a href="{{ action('PostsController@show', $post->id) }}">{{ $post->title }}</a>
    <a href="{{ action('PostsController@edit', $post->id) }}" class="fs12">[Edit]</a>
  </li>
  @empty
  <li>No posts yet</li>

  @endforelse
</ul>


@endsection
