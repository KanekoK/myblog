@extends('layouts.default')

@section('title')
Blog Detail
@endsection

@section('content')
<h1>
    <a href="{{ url('/') }}" class="pull-right fs12">Back</a>
    {{ $post->title }}
</h1>
<p>{!! nl2br(e($post->body)) !!}</p>
@endsection
