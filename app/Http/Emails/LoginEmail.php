<?php

namespace App\Http\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginEmail extends Mailable
{
    use Queueable, SerializesModels;

    public string $email;

    public string $name;

    public string $token;

    public function __construct(string $email, string $name, string $token)
    {
        $this->email = $email;
        $this->name = $name;
        $this->token = $token;
    }

    public function build(): LoginEmail
    {
        return $this->subject('Email de connexion')
            ->view('emails.login')
            ->with([
                'email' => $this->email,
                'name' => $this->name,
                'token' => $this->token,
            ]);
    }
}
