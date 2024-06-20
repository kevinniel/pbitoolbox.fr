<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Emails\LoginEmail;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Random\RandomException;

class LoginController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * @throws RandomException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email', $request->get('email'))->first();

        if ($user) {
            $user->update([
                'token' => bin2hex(random_bytes(32)),
                'token_expired_at' => now()->addMinutes(10)
            ]);

            Mail::to($user->email)->send(new LoginEmail($user->email, $user->name, $user->token));
        }

        return redirect()->route('login')
            ->with('status', 'Un email de connection vous a été envoyé.');
    }

    public function loginWithToken(string $token): RedirectResponse
    {
        $user = User::where('token', $token)->first();

        if ($user && now()->lt($user->token_expired_at)) {
            $user->update([
                'token' => null,
                'token_expired_at' => null
            ]);

            auth()->login($user);

            return redirect()->route('dashboard');
        }

        return redirect()->route('login')
            ->with('status', 'Le lien de connection a expiré.');
    }
}
