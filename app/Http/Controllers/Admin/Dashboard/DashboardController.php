<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Review_replies;
use App\Models\Reviews;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  
  
    public function getAdminDashboard()
    {

        $TotalUsers = User::where('accountType', 'User')->count();
        $VerifiedSellers = User::whereNot('accountType', 'User')->where('approved', 1)->count();
        $TotalProducts = Products::where('approved', 1)->count();

        $CustomerGrowth = User::where('accountType', 'User')->select('id', 'created_at')->get()->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('d M');
        });

        $customerGrowthMonth = [];
        $customerCount = [];

        foreach ($CustomerGrowth as $date => $userCount) {
            $customerGrowthMonth[] = $date;
            $customerCount[] = $userCount->count();
        }





        return view('admin.pages.dashboard', [
            'title' => 'Dashboard',
            'TotalUsers' => $TotalUsers,
            'VerifiedSellers' => $VerifiedSellers,
            'TotalProducts' => $TotalProducts,
            'customerGrowthMonth' => $customerGrowthMonth,
            'customerCount' => $customerCount
        ]);
    }

    public function getLoginPage()
    {
        return view('admin.pages.Login');
    }
 
}
