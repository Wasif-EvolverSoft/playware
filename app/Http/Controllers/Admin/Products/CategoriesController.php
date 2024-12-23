<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function getCategoriesPage()
    {
        $ParentCategories = Categories::all();

        $categories = Categories::root()->get();




        return view('admin.pages.products.categories.categories', [
            'title' => 'Categories',
            'parent' => $ParentCategories,
            'categories' => $categories

        ]);
    }

    public function createCategory(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate([
            'categoryName' => 'required|String',
            'CategorySlug' => 'nullable|String|unique:categories,slug',
            'ParentCategory' => 'nullable|String',
            'CategoryDescription' => 'nullable|String',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ], [
            'CategorySlug.unique' => 'Please Enter Unique Slug, This Already Exists, Enter Something Meaningfull for E.g Apple-Accesscories'
        ]);

        $category = new Categories;
        $category->name = $validate['categoryName'];
        if ($request->has('CategorySlug')) {
            $category->slug = Str::slug($validate['CategorySlug'], '-');
        } else {
            $category->slug = $validate['categoryName'];
        }
        if ($request->input('ParentCategory')) {
            $category->parent_id = $validate['ParentCategory'];
        }
        if ($request->input('CategoryDescription')) {
            $category->description = $validate['CategoryDescription'];
        }

        if ($request->has('image')) {
            $folderPath = 'Category/';

            // Create the folder if it doesn't exist
            if (!file_exists(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0777, true);
            }

            $image = $request->file('image');
            $name = time() . $validate['categoryName'] . '_' . 'Category' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($folderPath), $name);

            $category->image = $name;
        }

        $category->status = 1;

        $category->save();

        return back()->with('success', $request->input('categoryName') . ' Created Successfully');
    }


    public function deleteCategory($id)
    {
        Categories::find($id)->delete();

        return back()->with(['success' => 'Category deleted successfully']);
    }


    public function editCategoriesPage($id)
    {
        $category = Categories::where('id', $id)->first();
        $categories = Categories::all();
        $brands = Brands::all();
        return view('admin.pages.products.categories.EditCategories', [
            'title' => $category->name . ' ' . 'Category',
            'category' => $category,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function addBrand(Request $request)
    {
        $BrandCategory = [
            'brand_id' => $request->input('brand'),
            'category_id' => $request->input('categoryId'),
        ];

        DB::table('brand_category')->insert($BrandCategory);
        return back()->withSuccess('Category Added Succesfully');
    }


    public function deleteBrand($categoryId, $brandId)
    {
        DB::table('brand_category')->where('category_id', $categoryId)->where('brand_id', $brandId)->delete();
        return back()->withSuccess('Category deleted Succesfully');
    }

    public function updateBrand(Request $request)
    {

        $validate = $request->validate([
            'name' => 'nullable|string',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|mime:png,jpg,jpeg'
        ]);

        $brand = Brands::where('id', $request->brandId)->first();
        if ($request->input('name')) {
            $brand->name = $validate['name'];
        }
        if ($request->input('slug')) {
            $brand->BrandSlug = $validate['slug'];
        }
        if ($request->input('description')) {
            $brand->BrandDescription = $validate['description'];
        }
        if ($request->input('image')) {
            $folderPath = 'BrandImage/';

            // Create the folder if it doesn't exist
            if (!file_exists(public_path($folderPath))) {
                mkdir(public_path($folderPath), 0777, true);
            }

            $image = $request->file('image');
            $name = time() . $validate['categoryName'] . '_' . 'Category' . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($folderPath), $name);

            $brand->image = $name;
        }
        $brand->save();

        return back()->withSuccess('Brand Updated Successfully');
    }

    public function updateCategory(Request $request)
    {
        // dd($request->all());
        $category = Categories::where('id', $request->categoryID)->first();

        if ($request->input('name')) {
            $category->name = $request->input('name');
        }

        if ($request->input('slug')) {
            $category->slug = $request->input('slug');
        }

        if ($request->input('Description')) {
            $category->description = $request->input('Description');
        }

        if ($request->input('ParentCategory')) {
            $category->description = $request->input('ParentCategory');
        }

        $category->save();

        return back()->withSuccess('Category Updated Successfully');

    }
}
