<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {

            if ( Auth::user()->role == 1 ){
                return redirect()->intended(RouteServiceProvider::ADMIN.'?verified=1');
            }
            
            else if ( Auth::user()->role == 2 ){
                return redirect()->intended(RouteServiceProvider::EDITOR.'?verified=1');
            }

            else if ( Auth::user()->role == 3 ){
                return redirect()->intended(RouteServiceProvider::VISITOR.'?verified=1');
            }

            return redirect()->intended(RouteServiceProvider::VISITOR.'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }


        if ( Auth::user()->role == 1 ){
            return redirect()->intended(RouteServiceProvider::ADMIN.'?verified=1');
        }
        
        else if ( Auth::user()->role == 2 ){
            return redirect()->intended(RouteServiceProvider::EDITOR.'?verified=1');
        }

        else if ( Auth::user()->role == 3 ){
            return redirect()->intended(RouteServiceProvider::VISITOR.'?verified=1');
        }
    }
}
