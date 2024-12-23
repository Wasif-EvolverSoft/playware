<?php

namespace App\Http\Controllers\Admin\Sellers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SellersController extends Controller
{
    public function getVerifiedSellers()
    {

        $allUsers = User::orderBy('created_at', 'desc')->where('approved', '1')->simplePaginate(10);
        return view('admin.pages.sellers.verified', [
            'title' => 'Verified Sellers',
            'allUsers' => $allUsers
        ]);
    }



    public function getAllSellers()
    {
        $allUsers = User::orderBy('created_at', 'desc')->simplePaginate(10);
        return view('admin.pages.sellers.allSellers', [
            'title' => 'Verified Sellers',
            'allUsers' => $allUsers
        ]);


    }
    public function getUnVerifiedSellers()
    {
        $allUsers = User::orderBy('created_at', 'desc')->where('approved', '0')->simplePaginate(10);
        return view('admin.pages.sellers.Unverified', [
            'title' => 'Un-Verified Sellers',
            'allUsers' => $allUsers
        ]);
    }
    public function getShopSellers()
    {

        $allUsers = User::orderBy('created_at', 'desc')->where('approved', '1')->where('accountType', 'Shopkeepr')->simplePaginate(10);
        return view('admin.pages.sellers.shopSeller', [
            'title' => 'Shop Sellers',
            'allUsers' => $allUsers
        ]);
    }
    public function getCorporateSellers()
    {
        $allUsers = User::orderBy('created_at', 'desc')->where('approved', '0')->where('accountType', 'CorporateSeller')->simplePaginate(10);
        return view('admin.pages.sellers.corporate', [
            'title' => 'Corporate Sellers',
            'allUsers' => $allUsers
        ]);
    }

    public function getSellersDetails()
    {
        return view('admin.pages.sellers.details');
    }

    public function ApproveSeller($sellerId)
    {
        $getUser = User::where('id', $sellerId)->first();
        $getUser->approved = 1;
        $getUser->save();

        return back()->with('success', 'User Approved');

    }
    public function rejectSeller($sellerId)
    {
        $getUser = User::where('id', $sellerId)->first();
        $getUser->approved = $getUser->approved - 1;
        $getUser->save();

        return back()->with('success', 'User Approved');

    }
}
