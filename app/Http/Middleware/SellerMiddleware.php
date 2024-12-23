<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SellerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->accountType == 'User') {
            return redirect(route('indexPage'));
        } elseif (auth()->check() || auth()->user()->accountType == null) {
            return $next($request);
        }elseif(auth()->check() || auth()->user()->accountType == 'Admin'){
            return redirect(route('admin.dashboard'));
        }

        return $next($request);

    }
}
