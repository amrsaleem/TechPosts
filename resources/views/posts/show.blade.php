@extends('layouts.app')

@section('title')
{{ $post->title }}
@endsection

@section('content')
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <div class="post-container__status">
        @can('update', $post)
            <p><a href="{{ route('posts.edit', $post) }}" class="post-container__edit-link">Edit your post</a></p>
            <p class="likes">Likes: {{ $post->likes }}</p>
        @else
            <p class="author">Author: {{ $post->user->name }}</p>
            <p class="likes">Likes: {{ $post->likes }}</p>
        @endcan
        </div>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
        @endif

        <div class="post-body">
            {!! nl2br(e($post->body)) !!}
        </div>

        {{-- <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a> --}}



    </div>
@endsection