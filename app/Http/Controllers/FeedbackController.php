<?php

namespace App\Http\Controllers;
use App\Models\feedback;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|unique:feedbacks,description',
            'category' => 'required|string|min:8',
            'user_id' => 'required|integer|min:1',
        ]);
        

        $feedback = feedback::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'user_id' => $request->input('user_id'),
        ]);

        return response()->json(['message' => 'feedback added successfully', 'feedback' => $feedback], 201);
    }
    public function get()
    {
        $feedbacks = Feedback::with('user')->get();

        return response()->json(['feedbacks' => $feedbacks], 200);
    }
}
