<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\Workspace\WorkspaceRequest;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Request;

class WorkspaceController extends Controller
{
    public function create(): View
    {
        return view('admin.workspace.create');
    }

    public function show(string $slug): View
    {
        $workspace = Workspace::where('slug', $slug)->firstOrFail();

        return view('admin.workspace.show', [
            'workspace' => $workspace,
        ]);
    }

    public function store(WorkspaceRequest $request): RedirectResponse
    {
        $lastId = Workspace::orderBy('id', 'desc')->first() ? Workspace::orderBy('id', 'desc')->first()->id : 0;

        Workspace::create([
            ...$request->validated(),
            'slug' => Str::slug($request->get('name')),
            'workspaces_id' => 'workspaces_' . $lastId + 1,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Le workspace a bien été créé.');
    }

    public function edit(Workspace $workspace): View
    {
        return view('admin.workspace.edit', compact('workspace'));
    }

    public function update(WorkspaceRequest $request, Workspace $workspace): RedirectResponse
    {
        $workspace->update([
            ...$request->validated(),
            'slug' => Str::slug($request->get('name')),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Le workspace a bien été modifié.');
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

    public function destroy(Workspace $workspace): RedirectResponse
    {
        $workspace->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Le workspace a bien été supprimé.');
    }
}
