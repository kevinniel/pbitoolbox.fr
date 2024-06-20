<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use Illuminate\View\View;

class WorkspaceController extends Controller
{
    public function show(Workspace $workspace): View
    {
        return view('workspace.show', [
            'workspace' => $workspace,
        ]);
    }
}
