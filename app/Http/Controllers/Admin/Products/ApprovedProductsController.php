<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\PackageDetails;
use App\Models\Products;
use Illuminate\Http\Request;

class ApprovedProductsController extends Controller
{

    // All Approve reject Products Related
    public function getApprovedProducts()
    {
        $Products = Products::where('approved', '1')->simplePaginate(10);

        return view('admin.pages.products.Approved', [
            'title' => 'Approved Products',
            'Products' => $Products

        ]);
    }
    public function ApproveProduct($productId)
    {
        $product = Products::find($productId);
        $product->approved = 1;
        $product->save();
        return back()->with('success', 'Product Has Been Approved Successfully');
    }
    public function RejectProduct($productId)
    {
        $product = Products::find($productId);
        $product->approved = 3;
        $product->save();
        return back()->with('success', 'Product Has Been Rejected Successfully');
    }


    // All Packages Related Approve And Reject
    public function getApprovedPackaged()
    {
        $AllPackages = PackageDetails::where('Approved', '0')->get();
        return view('admin.pages.products.packages.ApprovalRequired', [
            'title' => 'Packages Approval Required',
            'packages' => $AllPackages
        ]);
    }

    public function ApprovedPackage($packageId)
    {
        $package = PackageDetails::find($packageId);

        if (!$package) {
            return back()->withErrors(['error' => 'Package not found']);
        }

        $package->Approved = true;
        $package->save();

        return back()->withSuccess('Package Approved Successfully');
    }


    public function RejectPackage($packageId)
    {
        $package = PackageDetails::find($packageId);

        if (!$package) {
            return back()->withErrors(['error' => 'Package not found']);
        }

        $package->Approved = 3;
        $package->save();

        return back()->withSuccess('Package Rejected Successfully');
    }

    public function getRejectedPackaged()
    {
        $AllPackages = PackageDetails::where('Approved', '3')->get();

        return view('admin.pages.products.packages.Rejected', [
            'title' => 'Reject Package',
            'packages' => $AllPackages
        ]);
    }
    public function getApprovedPackagesPage()
    {
        $AllPackages = PackageDetails::where('Approved', '1')->get();

        return view('admin.pages.products.packages.Approved', [
            'title' => 'Reject Package',
            'packages' => $AllPackages
        ]);
    }
}
