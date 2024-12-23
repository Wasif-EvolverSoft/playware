<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function getBrandsPage()
    {
        return view('admin.pages.products.Brands.Brands', [
            'title' => 'Brands',
        ]);
    }
}
