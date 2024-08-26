<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                if ( Auth::user()->role == 1 ){
                    $notification = array(
                        'message'       => 'Successfully Logged In',
                        'alert-type'    => 'success',
                    );
                    return redirect(RouteServiceProvider::ADMIN)->with($notification);
                }

                else if ( Auth::user()->role == 2 ){
                    $notification = array(
                        'message'       => 'Successfully Logged In',
                        'alert-type'    => 'success',
                    );
                    return redirect(RouteServiceProvider::EDITOR)->with($notification);
                }

                else if ( Auth::user()->role == 3 ){
                    $notification = array(
                        'message'       => 'Successfully Logged In',
                        'alert-type'    => 'success',
                    );
                    return redirect(RouteServiceProvider::VISITOR)->with($notification);
                }
            }
        }

        return $next($request);
    }
}
