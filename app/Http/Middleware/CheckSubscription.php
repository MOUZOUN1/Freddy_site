<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifier si l'utilisateur est connecté
        if (!auth()->check()) {
            return redirect()->route('login')
                           ->with('error', 'Veuillez vous connecter pour accéder à ce contenu.');
        }

        // Vérifier si l'utilisateur a un abonnement actif
        if (!auth()->user()->hasActiveSubscription()) {
            return redirect()->route('subscription.plans')
                           ->with('warning', 'Vous devez souscrire à un abonnement pour accéder à ce contenu premium.');
        }

        return $next($request);
    }
}