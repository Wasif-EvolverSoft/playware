<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductApprovalRequiredController extends Controller
{
    public function getApprovalRequiredProducts()
    {
        $Products = Products::where('Approved', '0')->with('users')->get();
        // return response()->json($Products);

        return view('admin.pages.products.ApprovalRequired', [
            'title' => 'Waiting for Approval',
            'Products' => $Products

        ]);
    }
}
