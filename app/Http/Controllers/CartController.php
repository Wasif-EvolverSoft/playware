<?php

namespace App\Http\Controllers;

use App\Models\payment_details;
use App\Models\Products;
use App\Models\Shipping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id)
    {

        $product = Products::findorFail($id);


        $cart = session()->get('cart', []);


        $productPrice = $product->sellPrice == null ? $product->originalPrice : $product->sellPrice;


        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            $cart[$id]['total'] = $cart[$id]['quantity'] * $cart[$id]['price'];
        } else {

            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->productTitle,
                'quantity' => 1,
                'price' => $productPrice,
                'total' => $productPrice,
                'vendor_id' => $product->user_id,
                'image' => $product->mainImage
            ];
        }

        // Store the updated cart back into the session
        session()->put('cart', $cart);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function removeFromCart($id)
    {
        // Get the cart from session
        $cart = session()->get('cart', []);

        // Remove the specific product from the cart
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart); // Update the sessions
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function clearCart()
    {
        // Remove the 'cart' key from the session
        session()->forget('cart');

        // Optionally, you can add a success message and redirect the user
        return redirect()->back()->with('success', 'Cart has been cleared!');
    }

    public function getCartPage()
    {
        $subTotal = 0;
        $shipping = Shipping::get();
        if (session(key: 'cart')) {
            foreach (session('cart') as $id => $details) {
                $subTotal += $details['total'];
            }
        }
        // dd(session('cart'));
        return view('user.Pages.cart', compact('subTotal', 'shipping'));
    }
    public function getCheckoutPage()
    {
        $user = Auth::check() ? Auth::user() : null;
        $cart = session('cart', []);
    
        // Fetch the admin user and their payment details
        $admin = User::where('accountType', 'Admin')->first();
        $adminPaymentDetails = payment_details::where('user_id', $admin->id)->first();
    
        // Group cart items by seller
        $groupedCart = [];
        foreach ($cart as $item) {
            $sellerId = $item['vendor_id'];
            $seller = User::find($sellerId);
    
            // Initialize the payment details variable
            $paymentDetails = null;
            $isVerified = false;
    
            if ($seller) {
                $isVerified = $seller->approved;
    
                // Fetch payment details for verified sellers
                if ($isVerified) {
                    $paymentDetails = payment_details::where('user_id', $sellerId)->first();
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
    
        return view('user.pages.checkout', compact('user', 'groupedCart', 'admin'));
    }
    

    
    public function updateCartQuantity(Request $req)
    {
        $cart = session('cart');
        foreach ($cart as &$session) {
            if ($session['id'] == $req->id) {
                $session['quantity'] = (int)$req->quantity;
                $session['total'] = (int)$req->quantity * $session['price'];
            }
        }
        session(['cart' => $cart]);
        return response()->json($cart[$req->id]);
    }
}
