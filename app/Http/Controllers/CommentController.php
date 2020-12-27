<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use Auth;

class CommentController extends Controller
{

    public function index() {
        return view('blogs.show');
    }

    public function apiIndex(Blog $blog) {
        return response()->json($blog->comments()->with('user')->latest()->get());
    }

    public function apiStore(Request $request, Blog $blog) 
    {
        
        $comment = $blog->comments()->create([
            'body' => $request->body,
            'user_id' => Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();

        return $comment->toJson();
    }

}
