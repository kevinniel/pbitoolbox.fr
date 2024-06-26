<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;
use App\Models\Comment;
use App\Models\Workspace;
use Illuminate\Http\JsonResponse;

class ApiCommentController extends Controller
{
    public function store(Workspace $workspace, CommentRequest $request): JsonResponse
    {
        $lastId = Comment::orderBy('id', 'desc')->first() ? Comment::orderBy('id', 'desc')->first()->id : 0;

        Comment::create([
            'comments_id' => 'comments_' . $lastId + 1,
            'content' => $request->get('content'),
            'workspace_id' => $workspace->id,
        ]);

        return response()->json(['message' => 'Comment created'], 201);
    }
}
