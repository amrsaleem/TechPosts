@extends('layouts.app')

@section('title', 'Edit The Post')

@section('content')
    <div class="post-form">
        <h2 class="post-form__title">Update The Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" class="post-form__form">
            @csrf
            @method('PUT')

            <label for="title" class="post-form__label">Title:</label>
            <input type="text" id="title" class="post-form__input" name="title" value="{{ old('title', $post->title) }}" required>

            <label for="body" class="post-form__label">Body:</label>
            <textarea id="body" class="post-form__textarea" name="body" rows="20"  required>{{ old('body', $post->body) }}</textarea>

            <label for="image" class="post-form__label">Image (optional):</label>
            <input type="file" accept="image/*" id="image" name="image" class="post-form__file">

            <button class="post-form__submit" type="submit">Update</button>
        </form>

        <form class="delete-form" action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="delete-button post-form__submit" type="submit">Delete</button>
          </form>

        <a href="{{ route('posts.index') }}" class="post-form__back-link">Back to Posts</a>

    </div>
@endsection