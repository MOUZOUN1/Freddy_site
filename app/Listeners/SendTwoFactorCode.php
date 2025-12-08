<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;

class SendTwoFactorCode
{
    public function handle(Login $event)
    {
        $user = $event->user;

        // Générer code
        $user->generateTwoFactorCode();

        // Envoyer email
        Mail::raw("Votre code de connexion est : {$user->two_factor_code}", function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Code de confirmation');
        });
    }
}
