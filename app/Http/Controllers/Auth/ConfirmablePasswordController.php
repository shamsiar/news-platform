<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        if ( Auth::user()->role == 1 ){
            return redirect()->intended(RouteServiceProvider::ADMIN);
        }
        
        else if ( Auth::user()->role == 2 ){
            return redirect()->intended(RouteServiceProvider::EDITOR);
        }

        else if ( Auth::user()->role == 3 ){
            return redirect()->intended(RouteServiceProvider::VISITOR);
        }

        return redirect()->intended(RouteServiceProvider::VISITOR);
    }
}
