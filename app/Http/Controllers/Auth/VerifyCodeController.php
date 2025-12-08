<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two_factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|numeric',
        ]);

        $user = Auth::user();

        if ($user && $request->two_factor_code == $user->two_factor_code) {
            $user->resetTwoFactorCode();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['two_factor_code' => 'Le code est invalide.']);
    }
}
