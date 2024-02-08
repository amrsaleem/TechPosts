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
            @else
                <p class="author">Author: {{ $post->user->name }}</p>
            @endcan
                <p class="likes">Likes: {{ $post->likes }}</p>
        </div>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="post-image">
        @endif

        <div class="post-body">
            {!! nl2br(e($post->body)) !!}
        </div>


    </div>

    <div class="comment-form-container">
        <h3>What Do you think?</h3>

        @auth
        <form action="{{route('comments.store', $post->id)}}" method="post" class="comment-form__form">
            @csrf
            <input type="text" id="commnet" name="content" class="comment-form__input" placeholder="Write your comment!!" required>
            <button type="submit" class="comment-form__submit">Comment</button>
        </form>
        @else
            <div>
                <p>Sign in to comment</p>
            </div>
        @endauth

    </div>


    <div class="comments-section">
            @if($post->comments->isEmpty())
                <p>No comments yet.</p>
            @else
                <ul class="comments-section__list">
                    @foreach($post->comments as $comment)
                        <li class="comment">
                                <div class="comment__details">
                                    <strong class="comment__user">{{ $comment->user->name }}:</strong>
                                    <p class="comment__text">{{ $comment->content }}</p>
                                </div>
                                @can('delete',$comment)
                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="comment__delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="comment__delete-btn">
                                            <img src="{{ asset('icons/close.png') }}"alt="Delete">
                                        </button>
                                    </form>
                                @endcan

                        </li>
                    @endforeach
                </ul>
            @endif
    </div>

@endsection