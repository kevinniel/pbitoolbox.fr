<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function show(string $slug, Request $request): View
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        if (!$workspace->can_access_comment && !auth()->user()->is_admin) {
            abort(404);
        }

        $key = $request->get('key', '');
        $content = $request->get('content', '');

        $count_comments = $workspace->comments()
            ->where('key', 'like', "%{$key}%")
            ->where('content', 'like', "%{$content}%")
            ->count();

        if ($count_comments < 20) {
            $comments = $workspace->comments()
                ->where('key', 'like', "%{$key}%")
                ->where('content', 'like', "%{$content}%")
                ->get();
        } else {
            $comments = $workspace->comments()
                ->where('key', 'like', "%{$key}%")
                ->where('content', 'like', "%{$content}%")
                ->paginate(20);
        }

        return view('comment.show', [
            'workspace' => $workspace,
            'comments' => $comments,
            'count_comments' => $count_comments,
            'request' => $request,
        ]);
    }

    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();

        return redirect()->back()->with('success', 'Le commentaire a bien été supprimé.');
    }
}
