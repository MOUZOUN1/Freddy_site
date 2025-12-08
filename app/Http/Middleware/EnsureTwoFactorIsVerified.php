<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureTwoFactorIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
  public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->two_factor_code !== null &&
            !$request->is('two-factor') &&
            !$request->is('logout')) {
            return redirect()->route('verify.code');
        }

        return $next($request);
    }
}





