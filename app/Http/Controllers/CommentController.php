<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function show(string $slug): View
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        return view('comment.show', [
            'workspace' => $workspace,
            'comments' => $workspace->comments,
        ]);
    }
}
