@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <div class="container">
        @foreach($posts as $post)
            <div class="card">
                <img src="{{ asset('storage/' . $post->image) }}" alt="Card Image 1">
                <div class="card-content">
                    <h2><a href="/posts/{{$post->id}}"> {{$post->title}}</a></h2>
                    <p>{{$post->author}}.</p>
                </div>
            </div>

        @endforeach

    </div>
@endsection

