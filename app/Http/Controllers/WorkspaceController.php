<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\View\View;

class WorkspaceController extends Controller
{
    public function show(string $slug): View
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        return view('workspace.show', [
            'workspace' => $workspace,
        ]);
    }
}
