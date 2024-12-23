<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function getBrandsPage()
    {

        $brands = Brands::orderBy('created_at', 'desc')->simplePaginate(10);

        return view('admin.pages.products.Brands.Brands', [
            'title' => 'brands',
            'brands' => $brands
        ]);
    }

    public function createBrand(Request $request)
    {
        // dd($request->all());

        $Validate = $request->validate([
            'BrandName' => 'required|string|unique:brands,name',
            'BrandSlug' => 'required|string|unique:brands,BrandSlug',
            'BrandDescription' => 'nullable|string',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ], [
            'BrandName.required' => 'Brand Name is required',
            'BrandSlug.required' => 'Brand Slug is required',
            'BrandName.string' => 'Please Do Not Try To Manipulate The Front-end Validation, We Will block Your Account',
            'BrandSlug.string' => 'Please Do Not Try To Manipulate The Front-end Validation, We Will block Your Account',
            'BrandDescription.string' => 'Please Do Not Try To Manipulate The Front-end Validation, We Will block Your Account',
            'Image.mime' => 'Your Image Shoudl Be in PNG, JPG, or in JPPEG Format'
        ]);

        $brand = new Brands;
        $brand->name = $Validate['BrandName'];
        $brand->BrandSlug = Str::slug($Validate['BrandSlug'], '-');
        if ($request->input('BrandDescription')) {
            $brand->BrandDescription = $Validate['BrandDescription'];
        }

        if ($request->input('image')) {
            $folderPath = 'Brand/';

            // Create the folder if it doesn't exist
            if (!file_exists(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0777, true);
            }

            $image = $request->file('image');
            $name = time() . $Validate['BrandName'] . '_' . 'Brand' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($folderPath), $name);

            $brand->image = $name;
        }

        $brand->save();
        return bacK()->with(['success' => $request->input('BrandName') . ' ' . 'Created Successfully']);
    }


    public function deleteBrands($id)
    {
        Brands::find($id)->delete();

        return back()->with(['Delete' => 'Deleted Successfully']);
    }



    public function editBrandsPage($id)
    {   
        $brand = Brands::where('id', $id)->first();
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.pages.products.Brands.EditBrands', [
            'title' => $brand->name,
            'brand' => $brand,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
