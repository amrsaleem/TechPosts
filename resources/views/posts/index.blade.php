@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="card">
                <a href="/posts/{{$post->id}}">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Card Image 1">
                </a>
                <div class="card-content">
                    <h2><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h2>
                    <p>{{$post->user->name}}.</p>
                </div>
            </div>

        @endforeach




    </div>
    <div class="container">
    {{ $posts->links() }}
    </div>
@endsection

