<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth()->check() && Auth()->user()->accountType) {
            return redirect(route('admin.dashboard'));
        } else if (Auth()->check() && Auth()->user()->accountType !== 'User') {
            return redirect(route('seller.dashboard'));
        } else if (Auth()->check() && Auth()->user()->accountType == 'User') {
            return redirect(route('indexPage'));
        }
        return $next($request);
    }
}
