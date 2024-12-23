<?php

namespace App\Http\Controllers\Sellers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function getShop()
    {
        return view('seller.pages.seller', [
            'title' => 'Title'
        ]);
    }
}
