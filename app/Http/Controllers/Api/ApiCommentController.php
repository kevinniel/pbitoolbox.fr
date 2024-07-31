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
        $key = $request->get('key');
        $lastId = Comment::orderBy('id', 'desc')->first() ? Comment::orderBy('id', 'desc')->first()->id : 0;

        $comment = Comment::where('key', $key)->first();

        if ($comment !== null) {
            $comment->update([
                'key' => $key,
                'content' => $request->get('content'),
            ]);

            return response()->json(['message' => 'Comment updated'], 200);
        }

        Comment::create([
            'key' => $key,
            'comments_id' => 'comments_' . $lastId + 1,
            'content' => $request->get('content'),
            'workspace_id' => $workspace->id,
        ]);

        return response()->json(['message' => 'Comment created'], 201);
    }

    public function show(string $key): JsonResponse
    {
        $comment = Comment::where('key', $key)->first();

        if ($comment === null) {
            return response()->json(['message' => 'Comment not found'], 404);
        }

        return response()->json($comment, 200);
    }
}
