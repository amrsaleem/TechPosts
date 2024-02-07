<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'author' => auth()->user()->id,
            'likes' => 0,
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully.');

    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request,Post $post)
    {
        $this->authorize('update', $post);
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $imagePath = $request->file('image')->store('images', 'public');
        }else{
            $imagePath = $post->image;
        }

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('delete', $post);
        $post->delete();
        Storage::disk('public')->delete($post->image);
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

}
