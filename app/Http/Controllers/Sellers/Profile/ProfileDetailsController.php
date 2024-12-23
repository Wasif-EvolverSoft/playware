<?php

namespace App\Http\Controllers\Sellers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileDetailsController extends Controller
{
    public function getProfileDetailsPage()
    {
        return view('seller.pages.Profile.details', [
            'title' => 'Seller Details',
        ]);
    }
}
