<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class TwoFactorCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user; // ✅ variable publique accessible dans le Blade

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Votre code de vérification')
                    ->markdown('emails.two_factor');
    }
}
