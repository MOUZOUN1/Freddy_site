<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    public function verify($token)
    {
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'Lien de vérification invalide.']);
        }

        if ($user->email_verified) {
            return redirect()->route('login')->with('info', 'Votre email est déjà vérifié.');
        }

        $user->email_verified = true;
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 
            'Email vérifié avec succès ! Vous pouvez maintenant vous connecter.');
    }
}