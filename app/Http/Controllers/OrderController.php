<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\order_items;
use App\Models\Payment;
use App\Models\payment_details;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{

    public function createOrder(Request $req)
    {
        // Retrieve cart items from session (or other storage)
        $cartItems = Session::get('cart', []);
    
        // Check if the cart is empty
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty!');
        }
    
        // Prepare the shipping and billing address
        $address = $req->address . ', ' . $req->city . ', ' . $req->zip . ', ' . $req->state;
    
        // Generate a new parent order ID (you can use UUID or incremental ID)
        $lastOrder = Order::orderByRaw('CAST(parent_order_id AS UNSIGNED) DESC')->first();
        $newParentOrderId = $lastOrder ? $lastOrder->parent_order_id + 1 : 1;
    
        // Fetch the admin user and their payment details
        $admin = User::where('accountType', 'Admin')->first();
        $adminPaymentDetails = payment_details::where('user_id', $admin->id)->first(); // Correct usage
    
        // Initialize grouped cart array
        $groupedCart = [];
    
        // Group cart items by seller
        foreach ($cartItems as $item) {
            $sellerId = $item['vendor_id'];
            $seller = User::find($sellerId);
    
            // Initialize the payment details variable
            $paymentDetails = null;
            $isVerified = false;
    
            if ($seller) {
                $isVerified = $seller->approved;
    
                // Fetch payment details for verified sellers
                if ($isVerified) {
                    $paymentDetails = payment_details::where('user_id', $sellerId)->first(); // Correct usage
                }
            }
    
            // If the seller is unverified or doesn't have payment details, use the admin's details
            if (!$isVerified || !$paymentDetails) {
                $paymentDetails = $adminPaymentDetails;
            }
    
            // Initialize seller group if not already set
            if (!isset($groupedCart[$sellerId])) {
                $groupedCart[$sellerId] = [
                    'seller_id' => $sellerId,
                    'seller_name' => $seller ? $seller->fullName : 'Unknown Seller',
                    'is_verified' => $isVerified,
                    'paymentDetails' => $paymentDetails,
                    'items' => [],
                    'total' => 0,
                ];
            }
    
            // Add item to the seller's cart group
            $groupedCart[$sellerId]['items'][] = $item;
            $groupedCart[$sellerId]['total'] += $item['total'];
        }
    
        // Create a new order for each seller group
        $order = new Order();
        $order->parent_order_id = $newParentOrderId;
        $order->customer_id = Auth::id(); // Logged-in user
        $order->full_name = $req->fullName;
        $order->email = $req->email;
        $order->phone_number = $req->number;
        $order->shipping_address = $address;
        $order->billing_address = $address;
        $order->paymentCheck = 'Not Paid'; // Payment status initially set to "Not Paid"
        $order->paymentType = $req->paymentMethod;
        $order->status = 'pending'; // Order status initially set to "pending"
        $order->total_amount = $this->calculateTotalAmount($cartItems); // Calculate the total amount
    
        // Store the grouped cart details as a JSON string
        $order->order_items = json_encode($groupedCart); // Store cart items grouped by seller
    
        // Save payment details for the order
        // For now, we save the payment details of the first seller (you can modify based on your requirements)
        $firstSellerPaymentDetails = $groupedCart[array_key_first($groupedCart)]['paymentDetails'];
        $order->payment_details = json_encode([
            'bank_name' => $firstSellerPaymentDetails->bank_name ?? 'N/A',
            'account_number' => $firstSellerPaymentDetails->account_number ?? 'N/A',
            'account_title' => $firstSellerPaymentDetails->account_title ?? 'N/A',
            'iban' => $firstSellerPaymentDetails->iban ?? 'N/A',
            'swift_code' => $firstSellerPaymentDetails->swift_code ?? 'N/A',
            'branch_address' => $firstSellerPaymentDetails->branch_address ?? 'N/A',
        ]);
    
        // Save the order to the database
        $order->save();
    
        // Clear the cart after placing the order
        Session::forget('cart');
    
        // Flash success message
        session()->flash('success', 'Your order has been placed successfully!');
    
        // Redirect to the order confirmation page
        return redirect()->route('order', ['order' => $order->id]);
    }
    


    // Calculate the total amount for the order items
    private function calculateTotalAmount($cartItems)
    {
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Get payment details (this can be customized as needed)
    private function getPaymentDetails($req)
    {
        // Example: Return bank transfer details if the payment method is "bank_transfer"
        if ($req->paymentMethod == 'bank_transfer') {
            return [
                'bank_name' => $req->bank_name ?? null,
                'account_number' => $req->account_number ?? null,
                'account_title' => $req->account_title ?? null,
                'iban' => $req->iban ?? null,
                'swift_code' => $req->swift_code ?? null,
                'branch_address' => $req->branch_address ?? null,
            ];
        }

        // Return null if payment details are not provided
        return null;
    }    
    

    public function getOrderDetails(Request $req){
        $req->validate([
            'order_id' => 'required',
        ]);
        $order = Order::with('all_products')->where('parent_order_id', $req->order_id)->get();

        return response()->json($order);
    }

    public function postPaid(Request $req)
    {
        $req->validate([
            'order_id' => 'required|string',
            'uploadPaymentScreenShot' => 'required|mimes:png,jpg,jpeg,webp|max:2048',
        ]);
    
        $order_id = $req->order_id;
    
        // Get all orders for the given parent order ID
        $orders = Order::where('parent_order_id', $order_id)->get();
    
        if ($orders->isEmpty()) {
            return response()->json(['message' => 'No orders found for this parent order ID.'], 404);
        }
    
        // Update the payment status for each order in the parent order
        foreach ($orders as $order) {
            $order->paymentCheck = 'Paid';
            $order->status = 'approved'; // Change status to 'approved' once paid
            $order->save();
        }
    
        // Handle payment screenshot upload
        if ($req->hasFile('uploadPaymentScreenShot')) {
            $file = $req->file('uploadPaymentScreenShot');
            $filename = 'payment_screenshot_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('payment_screenshots'), $filename);
    
            // Store payment information in the 'payments' table
            $payment = new Payment();
            $payment->order_id = $orders->first()->parent_order_id;
            $payment->payment_screenshot = $filename;
            $payment->save();
        }
    
        return back()->with(['paymentSuccess' => 'Orders updated successfully to Paid and payment recorded.']);
    }
    public function sellerOrders()
    {
        $sellerId = Auth::id(); // Assuming the seller is logged in as the current user
        
        $orders = Order::with('customer')->get();
        foreach ($orders as $order) {
            if (is_string($order->payment_details)) {
                $order->payment_details = json_decode($order->payment_details, true);
            }
            if (is_string($order->order_items)) {
                $order->order_items = json_decode($order->order_items, true);
            }
            
        }
        return view('seller.orders.index',compact('orders'));
    }
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:pending,sent,delivered,complete',
        ]);
    
        // Update order status
        $order->status = $validated['status'];
        $order->save();
    
        // Return a response, e.g., with the updated order status
        return response()->json([
            'status' => $order->status,
            'message' => 'Order status updated successfully!',
        ]);
    }
}
