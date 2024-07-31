<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authorisation\AuthorisationRequest;
use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorisationController extends Controller
{
    public function show(Workspace $workspace): View
    {
        return view('admin.authorisation.show', [
            'workspace' => $workspace,
        ]);
    }

    public function update(AuthorisationRequest $request, Workspace $workspace): RedirectResponse
    {
        $workspace->update([
            'can_access_image' => $request->get('can_access_image'),
            'can_access_comment' => $request->get('can_access_comment'),
        ]);

        return redirect()->back()->with('success', 'Les modules ont bien été mis à jour.');
    }
}
