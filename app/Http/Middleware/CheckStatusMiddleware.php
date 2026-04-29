<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckStatusMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();
        if(!Auth::check() || !$user->isActive()){
            return redirect()->route('login')->with('error', 'Your account is not active. Please contact the administrator.');
        }
        return $next($request);
    }
}
