<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Comment::create([
            'content'=> $request->input('content'),
            'post_id'=> $post_id,
            'user_id'=>auth()->user()->id,
        ]);

    return redirect()->route('posts.show', $post_id)->with('success', 'Comment added successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);
        $this->authorize('delete',$comment);
        $comment->delete();

        return redirect()->route('posts.show', $comment->post_id)->with('success', 'Comment deleted successfully.');
    }
}
