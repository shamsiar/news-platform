<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
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

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
