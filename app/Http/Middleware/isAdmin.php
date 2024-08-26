<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Session;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        if ( Auth::user()->role == 1 ){
            return $next($request);
        }

        else {
            $notification = array(
                'message'       => 'Sorry! You do not have the permission',
                'alert-type'    => 'error',
            );
            return redirect()->back()->with($notification);
        }
        
        return redirect()->route('home.page');
        
    }
}
