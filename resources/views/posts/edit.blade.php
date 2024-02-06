@extends('layouts.app')

@section('title', 'Edit The Post')

@section('content')
    <div class="post-form-container">
        <h2>Update The Post</h2>

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>

            <label for="body">Body:</label>
            <textarea id="body" name="body" rows="20"  required>{{ old('body', $post->body) }}</textarea>

            <label for="image">Image (optional):</label>
            <input type="file" id="image" name="image">

            <button class="submit-button" type="submit">Update</button>
        </form>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="delete-button" type="submit">Delete</button>
          </form>

        <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a>

    </div>
@endsection