<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function getAllOrders(){
        $sellers = User::where('accountType', 'Individual')
        ->orWhere('accountType', 'Shopkeeper')
        ->get();

        $orders = Order::with('all_products', 'pay_proof')
            ->get();

        // return response()->json($orders);

        return view('admin.pages.order.all-orders', [
            'title' => 'All Orders',
            'sellers' => $sellers,
            'orders' => $orders
        ]);
    }

    public function getVendorOrders(Request $req)
    {
        // Start building the query
        $query = Order::with('all_products', 'pay_proof');

        // Filter by vendor ID if provided
        if (!empty($req->vendor)) {
            $query->where('seller_id', $req->vendor);
        }

        // Filter by date range if provided
        if (!empty($req->fromDate) && !empty($req->toDate)) {
            $query->whereBetween('created_at', [$req->fromDate, $req->toDate]);
        }

        // Get the filtered results
        $orders = $query->get();

        return response()->json($orders);
    }

}
