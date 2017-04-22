@extends('layouts.default')

@section('title')
Blog Posts
@endsection

@section('content')
<h1>Posts</h1>

{{--
<ul>
  @foreach ($posts as $post)
  <li><a href="#">{{ $post->title }}</a></li>
  @endforeach
</ul>
--}}

<ul>
  @forelse ($posts as $post)
  <li><a href="#">{{ $post->title }}</a></li>
  @empty
  <li>No posts yet</li>

  @endforelse
</ul>


@endsection
