<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\JsonResponse;

class ApiCommentController extends Controller
{
    public function store(CommentRequest $request): JsonResponse
    {
        Comment::create([
            'content' => $request->get('content'),
        ]);

        return response()->json(['message' => 'Comment created'], 201);
    }
}
