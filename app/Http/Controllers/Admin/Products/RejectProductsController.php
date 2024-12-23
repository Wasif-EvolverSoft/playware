<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class RejectProductsController extends Controller
{
    public function getRejectedProducts()
    {
        $Products = Products::where('Approved', '3')->get();
        return view('admin.pages.products.Rejected', [
            'title' => 'Rejected Products',
            'Products' => $Products
        ]);
    }
}
