@extends('layouts.app')

@section('title', 'Create a New Post')

@section('content')
    <div class="post-form">
        <h2 class="post-form__title">Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" class="post-form__form">
            @csrf

            <label for="title" class="post-form__label">Title:</label>
            <input type="text" id="title" name="title" class="post-form__input" required>

            <label for="body" class="post-form__label">Body:</label>
            <textarea id="body" name="body" rows="15" class="post-form__textarea" required></textarea>

            <label for="image" class="post-form__label">Image (optional):</label>
            <input type="file" id="image" name="image" class="post-form__file">

            <button type="submit" class="post-form__submit">Create Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="post-form__back-link">Back to Posts</a>
    </div>

@endsection