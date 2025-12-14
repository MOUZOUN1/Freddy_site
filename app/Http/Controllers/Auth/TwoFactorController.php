<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TwoFactorCode;

class TwoFactorController extends Controller
{
    /**
     * Afficher la page de vérification 2FA
     */
    public function show()
    {
        // Si l'utilisateur a déjà vérifié son code 2FA, rediriger vers home
        if (session('two_factor_verified')) {
            return redirect()->route('home');
        }

        // Si l'utilisateur n'est pas connecté, rediriger vers login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        return view('auth.two-factor');
    }

    /**
     * Vérifier le code 2FA
     */
    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|numeric|digits:6',
        ], [
            'code.required' => 'Le code de vérification est requis.',
            'code.numeric' => 'Le code doit contenir uniquement des chiffres.',
            'code.digits' => 'Le code doit contenir exactement 6 chiffres.',
        ]);

        $user = auth()->user();

        // Vérifier si le code est correct et non expiré
        if ($user->verifyTwoFactorCode($request->code)) {
            // Réinitialiser le code 2FA
            $user->resetTwoFactorCode();
            
            // Marquer la session comme vérifiée
            session(['two_factor_verified' => true]);

            return redirect()->route('home')->with('success', 'Connexion réussie ! Bienvenue sur Culture Bénin.');
        }

        return back()->withErrors([
            'code' => 'Le code est invalide ou a expiré. Veuillez réessayer.'
        ])->withInput();
    }

    /**
     * Renvoyer un nouveau code 2FA
     */
    public function resend()
    {
        $user = auth()->user();
        
        // Générer un nouveau code
        $code = $user->generateTwoFactorCode();
        
        // Envoyer l'email avec le nouveau code
        try {
            Mail::to($user->email)->send(new TwoFactorCode($code));
            
            return back()->with('success', 'Un nouveau code de vérification a été envoyé à votre email.');
        } catch (\Exception $e) {
            return back()->with('error', 'Erreur lors de l\'envoi de l\'email. Veuillez réessayer.');
        }
    }
}