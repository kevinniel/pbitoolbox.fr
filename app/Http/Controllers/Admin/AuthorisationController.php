<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\View\View;

class AuthorisationController extends Controller
{
    public function show(Workspace $workspace): View
    {
        return view('admin.authorisation.show', [
            'workspace' => $workspace,
        ]);
    }
}
