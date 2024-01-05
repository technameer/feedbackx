<?php

namespace App\Http\Controllers;
use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
        public function savecomment(Request $request)
        {
            $request->validate([
                'content' => 'required|string|max:255',
                'user_id' => 'required|integer|min:1',
                'feedback_id' => 'required|integer|min:1',
            ]);
        
            $comment = comment::create([
                'content' => $request->input('content'),
                'user_id' => $request->input('user_id'),
                'feedback_id' => $request->input('feedback_id'),
            ]);
        
            return response()->json(['message' => 'Comment added successfully', 'comment' => $comment], 201);
        }
        public function getAllComments()
        {
            $comments = Comment::with('user')->get();
    
            return response()->json(['comments' => $comments], 200);
        }
        
}
