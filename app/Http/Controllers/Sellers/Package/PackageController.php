<?php

namespace App\Http\Controllers\Sellers\Package;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\PackageDetails;
use App\Models\packageProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    public function getAllPackages()
    {

        $sellerId = Auth::user()->id;
        $AllPackages = PackageDetails::where('user_id', $sellerId)->get();
        return view('seller.pages.products.allPackages', [
            'title' => 'All Packages',
            'packages' => $AllPackages
        ]);
    }
    public function getNewPackage()
    {

        $categories = Categories::root()->get();
        $brands = Brands::all();
        return view('seller.pages.products.addNewPackage', [
            'title' => 'Create Package',
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function uploadPackage(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'productTitle' => 'required|string',
            'PackageQuantity' => 'required|integer',
            'originalPrice' => 'required|integer',
            'sellPrice' => 'required|integer',
            'packageDescription' => 'required|string',
            'packageProductData' => 'required|string',
            'mainImage' => 'required|mimes:png,jpg|max:2050',
            'firstImage' => 'required|mimes:png,jpg|max:2050',
            'secondImage' => 'required|mimes:png,jpg|max:2050',
            'thirdImage' => 'required|mimes:png,jpg|max:2050',
            'fourthImage' => 'nullable|mimes:png,jpg|max:2050',
            'fifthImage' => 'nullable|mimes:png,jpg|max:2050',

        ]);

        $packageData = json_decode($request->input('packageProductData'), true);


        $packageDataValidator = Validator::make($packageData, [
            '*.name' => 'required|string',
            '*.brand' => 'nullable|string',
            '*.category' => 'required|string',
            '*.usedornew' => 'required|string',
        ]);

        if ($packageDataValidator->fails()) {
            return back()->withErrors($packageDataValidator)->withInput();
        }

        $folderPath = 'user_folders/Package_images/' . Auth::user()->id . '_' . Auth::user()->fullName;
        if (!file_exists(public_path($folderPath))) {
            mkdir(public_path($folderPath), 0777, true);
        }

        $mainImage = $request->file('mainImage');
        $mainImageName = time() . '_' . 'front_image' . '.' . $mainImage->getClientOriginalExtension();
        $mainImage->move(public_path($folderPath), $mainImageName);

        $firstImage = $request->file('firstImage');
        $firstImageName = time() . '_' . 'first_image' . '.' . $firstImage->getClientOriginalExtension();
        $firstImage->move(public_path($folderPath), $firstImageName);

        $secondImage = $request->file('secondImage');
        $secondImageName = time() . '_' . 'second_image' . '.' . $secondImage->getClientOriginalExtension();
        $secondImage->move(public_path($folderPath), $secondImageName);

        $thirdImage = $request->file('thirdImage');
        $thirdImageName = time() . '_' . 'third_image' . '.' . $thirdImage->getClientOriginalExtension();
        $thirdImage->move(public_path($folderPath), $thirdImageName);

        if ($request->fourthImage) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->fifthImage) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }


        $PackageDetails = new PackageDetails;
        $PackageDetails->user_id = Auth::user()->id;
        $PackageDetails->title = $validate['productTitle'];
        $PackageDetails->quantity = $validate['PackageQuantity'];
        $PackageDetails->originalPrice = $validate['originalPrice'];
        $PackageDetails->description = $validate['packageDescription'];
        if ($request->input('SellPrice')) {
            $PackageDetails->SellPrice = $validate['sellPrice'];
        }
        $PackageDetails->mainImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $mainImageName;
        $PackageDetails->firstImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $firstImageName;
        $PackageDetails->secondImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $secondImageName;
        $PackageDetails->thirdImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $thirdImageName;
        if ($request->file('fourthImage')) {
            $PackageDetails->fourthImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $PackageDetails->fifthImage = Auth::user()->id . '_' . Auth::user()->fullName . '/' . $fifthImageName;
        }
        if (Auth::user()->approved != 0) {
            $PackageDetails->approved = true;
        } else {
            $PackageDetails->approved = false;
        }
        $PackageDetails->save();


        $PackageProducts = json_decode($validate['packageProductData']);

        foreach ($PackageProducts as $PackageProduct) {
            $pp = new packageProducts;
            $pp->packageID = $PackageDetails->id;
            $pp->title = $PackageProduct->name;
            $pp->BrandID = $PackageProduct->brand;
            $pp->CategoryID = $PackageProduct->category;
            $pp->usedOrNew = $PackageProduct->usedornew;
            $pp->save();
        }


        return redirect(route('seller.allPackages'))->with(['success' => 'Product Uploaded Successfully']);
    }
}
