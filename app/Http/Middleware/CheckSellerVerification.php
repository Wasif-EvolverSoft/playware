<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSellerVerification
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Check if the user is a seller and is not verified
        if ($user && $user->accountType === 'Seller' && !$user->is_verified) {
            return redirect()->route('seller.dashboard')->with('show_verification_popup', true);
        }

        return $next($request);
    }
}
