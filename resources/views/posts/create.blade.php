@extends('layouts.app')

@section('title', 'Create a New Post')

@section('content')
    <div class="post-form-container">
        <h2>Create a New Post</h2>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="body">Body:</label>
            <textarea id="body" name="body" rows="15" required></textarea>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="image">Image (optional):</label>
            <input type="file" id="image" name="image">

            <button type="submit">Create Post</button>
        </form>

        <a href="{{ route('posts.index') }}" class="back-link">Back to Posts</a>
    </div>
@endsection