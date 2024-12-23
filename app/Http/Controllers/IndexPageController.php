<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Categories;
use App\Models\Contact;
use App\Models\Order;
use App\Models\payment_details;
use App\Models\Products;
use App\Models\Terms_Condition;
use Auth;
use Illuminate\Http\Request;

class IndexPageController extends Controller
{
    public function getIndexPage()
    {
        $recentProducts = Products::where('approved', 1)
        ->with(['brand', 'category', 'users'])
        ->where('productQuantity', '!=', 0)
        ->latest()
        ->take(5)
        ->get();
        $mouse = 'mouse';
        $mouseCat = Products::where('approved', 1)
        ->with(['brand', 'category', 'users'])
        ->whereHas('category', function ($query) use ($mouse) {
            $query->where('name', $mouse);
        })
        ->get();

        $keyboard = 'keyboard';
        $keyboardCat = Products::where('approved', 1)
        ->with(['brand', 'category', 'users'])
        ->whereHas('category', function ($query) use ($keyboard) {
            $query->where('name', $keyboard);
        })
        ->get();

        $graphic = 'Graphics Card';
        $graphicCat = Products::where('approved', 1)
        ->with(['brand', 'category', 'users'])
        ->whereHas('category', function ($query) use ($graphic) {
            $query->where('name', $graphic);
        })
        ->get();
        $category = Categories::all();
        return view('user.Pages.Index', compact('recentProducts', 'mouseCat', 'keyboardCat', 'graphicCat'));
    }

    public function getShopPage(Request $request)
    {
        $categories = Categories::all();

        $query = Products::where('approved', 1)
            ->with(['brand', 'category', 'users'])
            ->where('productQuantity', '!=', 0);
    
        // Filter by price range if specified
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('SellPrice', '>=', $request->min_price);
        }
    
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('SellPrice', '<=', $request->max_price);
        }
       // Filter by category if specified
       if ($request->has('category_id') && is_numeric($request->category_id)) {
        $query->where('productCategory', $request->category_id); // Use 'productCategory' here instead of 'category_id'
    }

        $products = $query->get();
    
        return view('user.Pages.shop', compact('products','categories'));
    }
    
    public function getShopSinglePage(Request $request, $id)
    {
        $product = Products::with(['brand', 'reviews.replies.user'])
            ->where('id', $id)
            ->first();

        if (!$product) {
            abort(404, 'Product not found');
        }

        $suggestedProducts = Products::where('brandName', $product->brandName)
            ->where('id', '!=', $id)
            ->take(6) // Limit the number of suggested products
            ->get();

        return view('user.Pages.shop-single', compact('product', 'suggestedProducts'));
    }
    public function getCartPage()
    {
        return view('user.Pages.cart');
    }

    public function getFaqsPage()
    {
        return view('user.Pages.faqs');
    }

    public function getContactPage()
    {
        $contacts = Contact::all();
        return view('user.Pages.contact',compact('contacts'));
    }

    public function getSuccessPage()
    {
        $success = session()->get('success', '');
        $parentOrderId = session('parentOrderId');
        $order = Order::where('parent_order_id', $parentOrderId)->with('all_products')->get();
        // return response()->json($order);
        // return response()->json($order);
        return view('user.Pages.success', compact('success', 'order'));
    }

    public function getSellerPortfolioPage()
    {
        return view('user.Pages.seller-portfolio');
    }

    public function getRegisterPage()
    {
        return view('user.Pages.register');
    }

    public function getLoginPage(){
        return view ('user.Pages.Login');
    }
    public function get404Page()
    {
        return view('user.Pages.404');
    }

    public function getTermsConditionsPage()
    {
        $terms = Terms_Condition::all()->groupBy('heading');
        return view('user.Pages.terms-conditions',compact('terms'));
    }

    public function getAboutPage()
    {
        $abouts = About::all();
        return view('user.Pages.about', compact('abouts'));
    }


    public function getAccountPage(){
        return view('user.Pages.account');
    }
    public function UserOrders()
    {
        $userId = Auth::id();
    
    
        $orders = Order::where('customer_id', $userId)  // Make sure to filter orders by the current user
                        ->with('customer')  // If needed, load related customer data
                        ->get();
        
        // If the 'payment_details' or 'order_items' are stored as strings, decode them to arrays
        foreach ($orders as $order) {
            if (is_string($order->payment_details)) {
                $order->payment_details = json_decode($order->payment_details, true);
            }
            if (is_string($order->order_items)) {
                $order->order_items = json_decode($order->order_items, true);
            }
        }
        
        // Return the view with the filtered orders
        return view('user.pages.userOrder', compact('orders'));
    }
    
    public function filter(Request $request)
    {
        // Log the incoming request data for debugging
        \Log::info('Filter request received:', $request->all());
    
        $query = Products::query();
    
        // Filter by price range
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('SellPrice', [$request->price_min, $request->price_max]);
        }
    
        // Filter by categories
        if ($request->has('categories')) {
            $categories = $request->categories;
            if (count($categories) > 0) {
                $query->whereIn('category_id', $categories); // assuming products have a category_id column
            }
        }
    
        // Get filtered products
        $products = $query->get();
    
        // Log the products to check the result
        \Log::info('Filtered products:', $products->toArray());
    
        // Return the filtered products view as a partial
        return view('user.pages.shop', compact('products'));
    }
    
    
}
