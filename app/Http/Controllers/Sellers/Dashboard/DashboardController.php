<?php

namespace App\Http\Controllers\Sellers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboardPage()
    {
        $user = Auth::user();
        $isVerified = $user->approved == 1;
        $products = Products::with(['brand', 'category', 'users'])
            ->where('user_id', $user->id) // Fetch products belonging to the logged-in seller
            ->where('productQuantity', '!=', 0)
            ->get();

        return view('seller.pages.dashboard', [
            'products' => $products,
            'isVerified' => $isVerified,
            'user' => $user
        ]);
    }
   
    
}
