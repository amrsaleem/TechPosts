@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p class="author">Author: {{ $post->author }}</p>
        <p class="likes">Likes: {{ $post->likes }}</p>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
        @endif

        <div class="post-body">
            {!! nl2br(e($post->body)) !!}
        </div>

        <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a>

        <a href="{{ route('posts.edit', $post) }}" class="Update">Update</a>

    </div>
@endsection