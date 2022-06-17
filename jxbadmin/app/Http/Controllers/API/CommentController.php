<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return response()->json([
            'Success' => true,
            'Message' => 'Comment found',
            'data' => $comments
        ], 200);

        return response()->json([
            'Success' => false,
            'Message' => 'Comment not found',
        ], 404);
    }
    public function create(Request $request)
    {
        // Validation data
         $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'message' => 'required'
         ]);
        //  create comment and send to database
         $comment = Comment::create($request->all());

        //  changes word filed name to capitalize
         $comment->name = ucwords($comment->name);

        //  if create success
         return response()->json([
            'Success' => true,
            'Message' => 'Add Comment Successfully',
            'data' => $comment
         ],201);

        //  if create failed
         return response()->json([
            'Success' => false,
            'Message' => 'Add Comment Failed',
         ],404);
    }
}
