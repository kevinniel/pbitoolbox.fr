<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\Workspace\WorkspaceRequest;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class WorkspaceController extends Controller
{
    public function create(): View
    {
        return view('admin.workspace.create');
    }

    public function store(WorkspaceRequest $request): RedirectResponse
    {
        Workspace::create($request->validated());

        return redirect()->route('admin.dashboard');
    }

    public function edit(Workspace $workspace): View
    {
        return view('admin.workspace.edit', compact('workspace'));
    }

    public function update(WorkspaceRequest $request, Workspace $workspace): RedirectResponse
    {
        $workspace->update($request->validated());

        return redirect()->route('admin.dashboard');
    }

    public function users(Workspace $workspace): View
    {
        return view('admin.workspace.users', ['workspace' => $workspace]);
    }

    public function addUser(UserRequest $request, Workspace $workspace): View
    {
        $userExist = User::where('email', $request->get('email'))->first();

        if ($userExist) {
            if (!$workspace->users()->where('user_id', $userExist->id)->exists()) {
                $workspace->users()->attach($userExist);

                return view('admin.workspace.users', ['workspace' => $workspace]);
            } else {
                return view('admin.workspace.users', ['workspace' => $workspace])
                    ->withErrors(['email' => 'L\'utilisateur existe déjà dans le workspace.']);
            }
        }

        $password_string = '!@#$%*&abcdefghijklmnpqrstuwxyzABCDEFGHJKLMNPQRSTUWXYZ23456789';
        $password = substr(str_shuffle($password_string), 0, 12);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
        ]);

        $workspace->users()->attach($user);

        return view('admin.workspace.users', ['workspace' => $workspace]);
    }

    public function removeUser(Workspace $workspace, Request $request): View
    {
        $user = User::findOrFail($request->get('user_id'));

        $workspace->users()->detach($user);

        return view('admin.workspace.users', ['workspace' => $workspace]);
    }
}
