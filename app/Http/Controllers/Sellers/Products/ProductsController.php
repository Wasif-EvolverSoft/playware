<?php

namespace App\Http\Controllers\Sellers\Products;

use App\Http\Controllers\Controller;
use App\Models\AdditionalPcPartsData;
use App\Models\additionalProducts;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\OtherSingleProducts;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Models\StorageData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    private $fullNameUnderscored;

    public function __construct()
    {
        if (Auth::check()) {
            $this->fullNameUnderscored = str_replace(' ', '_', $this->fullNameUnderscored);
        }
    }
    public function getAllProducts()
    {
        $userId = Auth::user()->id;
        $Products = Products::where('user_id', $userId)->get();
        return view('seller.pages.products.allProducts', [
            'title' => 'All Products',
            'Products' => $Products
        ]);
    }

    public function addNewProduct()
    {
        $categories = Categories::root()->get();
        $brands = Brands::get();
        return view('seller.pages.products.addNewProduct', [
            'title' => 'Add New Product',
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function UploadNewProducts(Request $request)
    {
        $validate = $request->validate([
            'productTitle' => 'required|string',
            'category' => 'required|string',
            'brand' => 'nullable|string',
            'warranty' => 'required|string',
            'year_of_making' => 'required|string',
            'amount_in_stock' => 'required|string',
            'current_price' => 'required|string',
            'sale_price' => 'nullable|string',
            'AboutThisitem' => 'required|string',
            'productDescription' => 'required|string',
            'mainImage' => 'required|mimes:png,jpg,jpeg,webp',
            'firstImage' => 'required|mimes:png,jpg,jpeg,webp',
            'secondImage' => 'required|mimes:png,jpg,jpeg,webp',
            'thirdImage' => 'required|mimes:png,jpg,jpeg,webp',
            'fourthImage' => 'nullable|mimes:png,jpg,jpeg,webp',
            'fifthImage' => 'nullable|mimes:png,jpg,jpeg,webp',
        ], [
            'productTitle.required' => 'The product title is required.',
            'productTitle.string' => 'The product title must be a string.',
            'category.required' => 'The category is required.',
            'category.string' => 'The category must be a string.',
            'brand.required' => 'The brand is required.',
            'brand.string' => 'The brand must be a string.',
            'warranty.required' => 'The warranty is required.',
            'warranty.string' => 'The warranty must be a string.',
            'year_of_making.required' => 'The year of making is required.',
            'year_of_making.string' => 'The year of making must be a string.',
            'amount_in_stock.required' => 'The amount in stock is required.',
            'amount_in_stock.string' => 'The amount in stock must be a string.',
            'current_price.required' => 'The current price is required.',
            'current_price.string' => 'The current price must be a string.',
            'sale_price.required' => 'The sale price is required.',
            'sale_price.string' => 'The sale price must be a string.',
            'AboutThisitem.required' => 'The About This Item field is required.',
            'AboutThisitem.string' => 'The About This Item field must be a string.',
            'productDescription.required' => 'The product description is required.',
            'productDescription.string' => 'The product description must be a string.',
            'mainImage.required' => 'The main image is required.',
            'mainImage.mimes' => 'The main image must be a file of type: png, jpg, jpeg, webp.',
            'firstImage.required' => 'The first image is required.',
            'firstImage.mimes' => 'The first image must be a file of type: png, jpg, jpeg, webp.',
            'secondImage.required' => 'The second image is required.',
            'secondImage.mimes' => 'The second image must be a file of type: png, jpg, jpeg, webp.',
            'thirdImage.required' => 'The third image is required.',
            'thirdImage.mimes' => 'The third image must be a file of type: png, jpg, jpeg, webp.',
            'fourthImage.mimes' => 'The fourth image must be a file of type: png, jpg, jpeg, webp.',
            'fifthImage.mimes' => 'The fifth image must be a file of type: png, jpg, jpeg, webp.',
        ]);

        $folderPath = 'user_folders/Product_Images/' . Auth::user()->id . '_' . $this->fullNameUnderscored;

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

        if ($request->file('fourthImage')) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->file('fifthImage')) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }

        $product = new Products;
        $product->slug = $this->fullNameUnderscored . "-" . strtolower(trim(preg_replace('/[\/\\s]+/', '-', $validate['productTitle'])));
        $product->ProductType = $request->input('ProductType');
        $product->user_id = Auth::user()->id;
        $product->productTitle = $validate['productTitle'];

        if ($request->input('brand')) {
            $product->brandName = $validate['brand'];
        } else {
            $product->brandName = 63;
        }

        $product->repaired = 0;


        $product->yearOfProduct = $validate['year_of_making'];
        $product->warranty = $validate['warranty'];

        if ($request->input('productDescription')) {
            $product->productDescription = $validate['productDescription'];
        }

        if ($request->input('AboutThisitem')) {
            $product->AboutThisitem = $validate['AboutThisitem'];
        }

        $product->productCategory = $validate['category'];
        $product->productQuantity = $validate['amount_in_stock'];
        $product->originalPrice = $validate['current_price'];

        if ($request->input('sale_price')) {
            $product->SellPrice = $validate['sale_price'];
        }

        $product->mainImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $mainImageName;
        $product->firstImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $firstImageName;
        $product->secondImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $secondImageName;
        $product->thirdImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $thirdImageName;

        if ($request->file('fourthImage')) {
            $product->fourthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $product->fifthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fifthImageName;
        }

        if (Auth::user()->approved != 0) {
            $product->approved = 1;
        } else {
            $product->approved = 0;
        }

        $product->save();


        if ($request->input('productCategory') == '5') {
            $ram = new OtherSingleProducts;
            $ram->productId = $product->id;
            $ram->Type = $validate['ramGeneration'];
            $ram->RRCS = $validate['ramClockSpeed'];
            $ram->size = $validate['ramSize'];
            $ram->save();
        } elseif ($request->input('productCategory') == '6') {
            $storage = new OtherSingleProducts;
            $storage->productId = $product->id;
            $storage->Type = $validate['storageType'];
            $storage->size = $validate['storageSize'];
            $storage->save();
        } elseif ($request->input('productCategory') == '11') {
            $monitor = new OtherSingleProducts;
            $monitor->productId = $product->id;
            $monitor->Type = $validate['monitorPanelType'];
            $monitor->RRCS = $validate['monitorRefreshRate'];
            $monitor->size = $validate['monitorSize'];
            $monitor->modelNo = $validate['monitorModelNo'];
            $monitor->save();
        }

        return response()->json(['success' => true, 'message' => 'Product Uploaded Successfully']);


        //  return redirect(route('seller.allProducts'))->with(['success' => 'Product Uploaded Successfully']);

    }
    public function UploadUsedProducts(Request $request)
    {
        $validate = $request->validate([
            'productTitle' => 'required|string',
            'category' => 'required|string',
            'brand' => 'nullable|string',
            'warranty' => 'required|string',
            'year_of_making' => 'required|string',
            'amount_in_stock' => 'required|string',
            'current_price' => 'required|string',
            'sale_price' => 'nullable|string',
            'isRepairedOrOpened' => 'nullable|string',
            'reason' => $request->input('isRepairedOrOpened') == "on" ? 'required|string' : 'nullable|string',
            'AboutThisitem' => 'required|string',
            'productDescription' => 'required|string',
            'mainImage' => 'required|mimes:png,jpg,jpeg,webp',
            'firstImage' => 'required|mimes:png,jpg,jpeg,webp',
            'secondImage' => 'required|mimes:png,jpg,jpeg,webp',
            'thirdImage' => 'required|mimes:png,jpg,jpeg,webp',
            'fourthImage' => 'nullable|mimes:png,jpg,jpeg,webp',
            'fifthImage' => 'nullable|mimes:png,jpg,jpeg,webp',
        ], [
            'productTitle.required' => 'The product title is required.',
            'productTitle.string' => 'The product title must be a string.',
            'category.required' => 'The category is required.',
            'category.string' => 'The category must be a string.',
            'brand.required' => 'The brand is required.',
            'brand.string' => 'The brand must be a string.',
            'warranty.required' => 'The warranty is required.',
            'warranty.string' => 'The warranty must be a string.',
            'year_of_making.required' => 'The year of making is required.',
            'year_of_making.string' => 'The year of making must be a string.',
            'amount_in_stock.required' => 'The amount in stock is required.',
            'amount_in_stock.string' => 'The amount in stock must be a string.',
            'current_price.required' => 'The current price is required.',
            'current_price.string' => 'The current price must be a string.',
            'sale_price.required' => 'The sale price is required.',
            'sale_price.string' => 'The sale price must be a string.',
            'isRepairedOrOpened.string' => 'The value for "Is Repaired or Opened" must be a string.',
            'reason.required' => 'The reason is required when the item is marked as repaired or opened.',
            'reason.string' => 'The reason must be a string.',
            'AboutThisitem.required' => 'The About This Item field is required.',
            'AboutThisitem.string' => 'The About This Item field must be a string.',
            'productDescription.required' => 'The product description is required.',
            'productDescription.string' => 'The product description must be a string.',
            'mainImage.required' => 'The main image is required.',
            'mainImage.mimes' => 'The main image must be a file of type: png, jpg, jpeg, webp.',
            'firstImage.required' => 'The first image is required.',
            'firstImage.mimes' => 'The first image must be a file of type: png, jpg, jpeg, webp.',
            'secondImage.required' => 'The second image is required.',
            'secondImage.mimes' => 'The second image must be a file of type: png, jpg, jpeg, webp.',
            'thirdImage.required' => 'The third image is required.',
            'thirdImage.mimes' => 'The third image must be a file of type: png, jpg, jpeg, webp.',
            'fourthImage.mimes' => 'The fourth image must be a file of type: png, jpg, jpeg, webp.',
            'fifthImage.mimes' => 'The fifth image must be a file of type: png, jpg, jpeg, webp.',
        ]);

        $folderPath = 'user_folders/Product_Images/' . Auth::user()->id . '_' . $this->fullNameUnderscored;


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

        if ($request->file('fourthImage')) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->file('fifthImage')) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }

        $product = new Products;
        $product->slug = $this->fullNameUnderscored . "-" . strtolower(trim(preg_replace('/[\/\\s]+/', '-', $validate['productTitle'])));
        $product->ProductType = $request->input('ProductType');
        $product->user_id = Auth::user()->id;
        $product->productTitle = $validate['productTitle'];

        if ($request->input('brand')) {
            $product->brandName = $validate['brand'];
        } else {
            $product->brandName = 63;
        }

        if ($request->input('isRepairedOrOpened')) {
            $product->repaired = $validate['isRepairedOrOpened'] == "on" ? 1 : 0;
            if ($validate['isRepairedOrOpened'] == "on") {
                $product->explainAboutRepairing = $validate['reason'];
            }
        } else {
            $product->repaired = 0;
        }


        $product->yearOfProduct = $validate['year_of_making'];
        $product->warranty = $validate['warranty'];

        if ($request->input('productDescription')) {
            $product->productDescription = $validate['productDescription'];
        }

        if ($request->input('AboutThisitem')) {
            $product->AboutThisitem = $validate['AboutThisitem'];
        }

        $product->productCategory = $validate['category'];
        $product->productQuantity = $validate['amount_in_stock'];
        $product->originalPrice = $validate['current_price'];

        if ($request->input('sale_price')) {
            $product->SellPrice = $validate['sale_price'];
        }

        $product->mainImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $mainImageName;
        $product->firstImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $firstImageName;
        $product->secondImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $secondImageName;
        $product->thirdImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $thirdImageName;

        if ($request->file('fourthImage')) {
            $product->fourthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $product->fifthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fifthImageName;
        }

        if (Auth::user()->approved != 0) {
            $product->approved = 1;
        } else {
            $product->approved = 0;
        }
        $product->save();


        if ($request->input('productCategory') == '5') {
            $ram = new OtherSingleProducts;
            $ram->productId = $product->id;
            $ram->Type = $validate['ramGeneration'];
            $ram->RRCS = $validate['ramClockSpeed'];
            $ram->size = $validate['ramSize'];
            $ram->save();
        } elseif ($request->input('productCategory') == '6') {
            $storage = new OtherSingleProducts;
            $storage->productId = $product->id;
            $storage->Type = $validate['storageType'];
            $storage->size = $validate['storageSize'];
            $storage->save();
        } elseif ($request->input('productCategory') == '11') {
            $monitor = new OtherSingleProducts;
            $monitor->productId = $product->id;
            $monitor->Type = $validate['monitorPanelType'];
            $monitor->RRCS = $validate['monitorRefreshRate'];
            $monitor->size = $validate['monitorSize'];
            $monitor->modelNo = $validate['monitorModelNo'];
            $monitor->save();
        }
        return response()->json(['success' => true, 'message' => 'Product Uploaded Successfully']);
        //return redirect(route('seller.allProducts'))->with(['success' => 'Product Uploaded Successfully']);
    }

    public function uploadCompletePc(Request $request)
    {

        $validate = $request->validate([
            'productTitle' => 'required|string',
            'productDescription' => 'required|string',
            'warranty' => 'required|string',
            'year_of_making' => 'required|string',
            'amount_in_stock' => 'required|string',
            'current_price' => 'required|string',
            'sale_price' => 'nullable|string',
            'isRepairedOrOpened' => 'nullable|string',
            'reason' => $request->input('isRepairedOrOpened') == 'on' ? 'required|string' : 'nullable|string',
            'processorName' => 'required|string',
            'processorBrand' => 'required|string',
            'processorUsedOrNew' => 'required|string',
            'graphicCardName' => 'required|string',
            'graphicCardBrand' => 'required|string',
            'graphicCardMemory' => 'required|string',
            'graphicCardUsedOrNew' => 'required|string',
            'motherboardName' => 'required|string',
            'motherboardBrand' => 'required|string',
            'motherboardUsedOrNew' => 'required|string',
            'ramName' => 'required|string',
            'ramBrand' => 'required|string',
            'ramMemory' => 'required|string',
            'ramUsedOrNew' => 'required|string',
            'ramQuantity' => 'required|string',
            'psuName' => 'required|string',
            'psuBrand' => 'required|string',
            'psuWatts' => 'required|string',
            'psuUsedOrNew' => 'required|string',
            'caseName' => 'required|string',
            'caseBrand' => 'required|string',
            'caseUsedOrNew' => 'required|string',
            'coolerName' => 'required|string',
            'coolerBrand' => 'required|string',
            'coolerUsedOrNew' => 'required|string',
            'storageData' => 'required|json',
            'additionalPartsData' => 'required|json',
            'additionProductData' => 'required|json',
        ]);


        $storageData = json_decode($request->input('storageData'), true);
        $additionalPartsData = json_decode($request->input('additionalPartsData'), true);
        $additionProductData = json_decode($request->input('additionProductData'), true);

        $storageDataValidator = Validator::make($storageData, [
            '*.name' => 'required|string',
            '*.brand' => 'required|string',
            '*.type' => 'required|string',
            '*.memory' => 'required|string',
            '*.usedOrNew' => 'required|string',
        ]);

        if ($storageDataValidator->fails()) {
            return back()->withErrors($storageDataValidator)->withInput();
        }

        $additionalPartsDataValidator = Validator::make($additionalPartsData, [
            '*.name' => 'required|string',
            '*.userOrnew' => 'required|string',
        ]);

        if ($additionalPartsDataValidator->fails()) {
            return back()->withErrors($storageDataValidator)->withInput();
        }

        $additionProductDataValidator = Validator::make($additionProductData, [
            '*.name' => 'required|string',
            '*.brand' => 'required|string',
            '*.category' => 'required|string',
            '*.usedOrNew' => 'required|string',
        ]);

        if ($additionProductDataValidator->fails()) {
            return back()->withErrors($additionProductDataValidator)->withInput();
        }

        $folderPath = 'user_folders/Product_Images/' . Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored);

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

        if ($request->file('fourthImage')) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->file('fifthImage')) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }

        $product = new Products;
        $product->slug = $this->fullNameUnderscored . "-" . strtolower(trim(preg_replace('/[\/\\s]+/', '-', $validate['productTitle'])));
        $product->ProductType = $request->input('ProductType');
        $product->user_id = Auth::user()->id;
        $product->productTitle = $validate['productTitle'];


        if ($request->input('brand')) {
            $product->brandName = $validate['brand'];
        } else {
            $product->brandName = 63;
        }

        if ($request->input('isRepairedOrOpened')) {
            $product->repaired = $validate['isRepairedOrOpened'] == "on" ? 1 : 0;
            if ($validate['isRepairedOrOpened'] == "on") {
                $product->explainAboutRepairing = $validate['reason'];
            }
        } else {
            $product->repaired = 0;
        }

        $product->productQuantity = $validate['amount_in_stock'];
        $product->yearOfProduct = $validate['year_of_making'];
        $product->warranty = $validate['warranty'];
        $product->productCategory = 39;

        if ($request->input('productDescription')) {
            $product->productDescription = $validate['productDescription'];
        }

        $product->mainImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $mainImageName;
        $product->firstImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $firstImageName;
        $product->secondImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $secondImageName;
        $product->thirdImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $thirdImageName;

        if ($request->file('fourthImage')) {
            $product->fourthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $product->fifthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fifthImageName;
        }

        if (Auth::user()->approved != 0) {
            $product->approved = 1;
        } else {
            $product->approved = 0;
        }
        $product->save();

        $ProductVariation = new ProductVariations;
        $ProductVariation->productId = $product->id;
        $ProductVariation->ProcessorName = $validate['processorName'];
        $ProductVariation->ProcessorBrand = $validate['processorBrand'];
        $ProductVariation->ProcessorUsedOrNew = $validate['processorUsedOrNew'];
        $ProductVariation->GraphicCardName = $validate['graphicCardName'];
        $ProductVariation->GraphicCardBrand = $validate['graphicCardBrand'];
        $ProductVariation->GraphicCardMemory = $validate['graphicCardMemory'];
        $ProductVariation->GraphicCardUsedOrNew = $validate['graphicCardUsedOrNew'];
        $ProductVariation->MotherBoardName = $validate['motherboardName'];
        $ProductVariation->MotherBoardBrand = $validate['motherboardBrand'];
        $ProductVariation->MotherBoardUsedOrNew = $validate['motherboardUsedOrNew'];
        $ProductVariation->RamName = $validate['ramName'];
        $ProductVariation->RamBrand = $validate['ramBrand'];
        $ProductVariation->RamMemory = $validate['ramMemory'];
        $ProductVariation->ramUsedOrNew = $validate['ramUsedOrNew'];
        $ProductVariation->RamQuantity = $validate['ramQuantity'];
        $ProductVariation->PSUName = $validate['psuName'];
        $ProductVariation->PSUBrand = $validate['psuBrand'];
        $ProductVariation->PSUWatts = $validate['psuWatts'];
        $ProductVariation->PSUUsedOrNew = $validate['psuUsedOrNew'];
        $ProductVariation->CaseName = $validate['caseName'];
        $ProductVariation->CaseBrand = $validate['caseBrand'];
        $ProductVariation->CaseUsedOrNew = $validate['caseUsedOrNew'];
        $ProductVariation->CoolerName = $validate['coolerName'];
        $ProductVariation->CoolerBrand = $validate['coolerBrand'];
        $ProductVariation->coolerUsedOrNew = $validate['coolerUsedOrNew'];
        $ProductVariation->save();


        foreach ($storageData as $storageItem) {
            $Storage = new StorageData;
            $Storage->productId = $product->id;
            $Storage->name = $storageItem['name'];
            $Storage->brandID = $storageItem['brand'];
            $Storage->type = $storageItem['type'];
            $Storage->Memory = $storageItem['memory'];
            $Storage->usedOrNew = $storageItem['usedOrNew'];
            $Storage->save();
        }

        foreach ($additionalPartsData as $pcparts) {
            $additionparts = new AdditionalPcPartsData;
            $additionparts->productId = $product->id;
            $additionparts->name = $pcparts['name'];
            $additionparts->userOrnew = $pcparts['userOrnew'];
            $additionparts->save();
        }

        foreach ($additionProductData as $additionProduct) {
            $additionsProduct = new additionalProducts;
            $additionsProduct->productId = $product->id;
            $additionsProduct->name = $additionProduct['name'];
            $additionsProduct->brandId = $additionProduct['brand'];
            $additionsProduct->CategoryID = $additionProduct['category'];
            $additionsProduct->UsedOrNew = $additionProduct['usedOrNew'];
            $additionsProduct->save();
        }


        return redirect(route('seller.allProducts'))->with(['success' => 'Product Uploaded Successfully']);
    }
    public function uploadLaptop(Request $request)
    {

        $validate = $request->validate([
            'productTitle' => 'required|string',
            'productDescription' => 'required|string',
            'warranty' => 'required|string',
            'year_of_making' => 'required|string',
            'amount_in_stock' => 'required|string',
            'current_price' => 'required|string',
            'sale_price' => 'nullable|string',
            'isRepairedOrOpened' => 'nullable|string',
            'reason' => $request->input('isRepairedOrOpened') == 'on' ? 'required|string' : 'nullable|string',
            'processorName' => 'required|string',
            'processorBrand' => 'required|string',
            'processorUsedOrNew' => 'required|string',
            'graphicCardName' => 'required|string',
            'graphicCardBrand' => 'required|string',
            'graphicCardMemory' => 'required|string',
            'graphicCardUsedOrNew' => 'required|string',
            'motherboardName' => 'required|string',
            'motherboardBrand' => 'required|string',
            'motherboardUsedOrNew' => 'required|string',
            'ramName' => 'required|string',
            'ramBrand' => 'required|string',
            'ramMemory' => 'required|string',
            'ramUsedOrNew' => 'required|string',
            'ramQuantity' => 'required|string',
            'psuName' => 'required|string',
            'psuBrand' => 'required|string',
            'psuWatts' => 'required|string',
            'psuUsedOrNew' => 'required|string',
            'caseName' => 'required|string',
            'caseBrand' => 'required|string',
            'caseUsedOrNew' => 'required|string',
            'coolerName' => 'required|string',
            'coolerBrand' => 'required|string',
            'coolerUsedOrNew' => 'required|string',
            'storageData' => 'required|json',
        ]);


        $storageData = json_decode($request->input('storageData'), true);


        $storageDataValidator = Validator::make($storageData, [
            '*.name' => 'required|string',
            '*.brand' => 'required|string',
            '*.type' => 'required|string',
            '*.memory' => 'required|string',
            '*.usedOrNew' => 'required|string',
        ]);

        if ($storageDataValidator->fails()) {
            return back()->withErrors($storageDataValidator)->withInput();
        }


        $folderPath = 'user_folders/Product_Images/' . Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored);

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

        if ($request->file('fourthImage')) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->file('fifthImage')) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }

        $product = new Products;
        $product->slug = $this->fullNameUnderscored . "-" . strtolower(trim(preg_replace('/[\/\\s]+/', '-', $validate['productTitle'])));
        $product->ProductType = $request->input('ProductType');
        $product->user_id = Auth::user()->id;
        $product->productTitle = $validate['productTitle'];


        if ($request->input('brand')) {
            $product->brandName = $validate['brand'];
        } else {
            $product->brandName = 63;
        }

        if ($request->input('isRepairedOrOpened')) {
            $product->repaired = $validate['isRepairedOrOpened'] == "on" ? 1 : 0;
            if ($validate['isRepairedOrOpened'] == "on") {
                $product->explainAboutRepairing = $validate['reason'];
            }
        } else {
            $product->repaired = 0;
        }

        $product->productQuantity = $validate['amount_in_stock'];
        $product->yearOfProduct = $validate['year_of_making'];
        $product->warranty = $validate['warranty'];
        $product->productCategory = 40;

        if ($request->input('productDescription')) {
            $product->productDescription = $validate['productDescription'];
        }

        $product->mainImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $mainImageName;
        $product->firstImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $firstImageName;
        $product->secondImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $secondImageName;
        $product->thirdImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $thirdImageName;

        if ($request->file('fourthImage')) {
            $product->fourthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $product->fifthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fifthImageName;
        }

        if (Auth::user()->approved != 0) {
            $product->approved = 1;
        } else {
            $product->approved = 0;
        }
        $product->save();

        $ProductVariation = new ProductVariations;
        $ProductVariation->productId = $product->id;
        $ProductVariation->ProcessorName = $validate['processorName'];
        $ProductVariation->ProcessorBrand = $validate['processorBrand'];
        $ProductVariation->ProcessorUsedOrNew = $validate['processorUsedOrNew'];
        $ProductVariation->GraphicCardName = $validate['graphicCardName'];
        $ProductVariation->GraphicCardBrand = $validate['graphicCardBrand'];
        $ProductVariation->GraphicCardMemory = $validate['graphicCardMemory'];
        $ProductVariation->GraphicCardUsedOrNew = $validate['graphicCardUsedOrNew'];
        $ProductVariation->MotherBoardName = $validate['motherboardName'];
        $ProductVariation->MotherBoardBrand = $validate['motherboardBrand'];
        $ProductVariation->MotherBoardUsedOrNew = $validate['motherboardUsedOrNew'];
        $ProductVariation->RamName = $validate['ramName'];
        $ProductVariation->RamBrand = $validate['ramBrand'];
        $ProductVariation->RamMemory = $validate['ramMemory'];
        $ProductVariation->ramUsedOrNew = $validate['ramUsedOrNew'];
        $ProductVariation->RamQuantity = $validate['ramQuantity'];
        $ProductVariation->PSUName = $validate['psuName'];
        $ProductVariation->PSUBrand = $validate['psuBrand'];
        $ProductVariation->PSUWatts = $validate['psuWatts'];
        $ProductVariation->PSUUsedOrNew = $validate['psuUsedOrNew'];
        $ProductVariation->CaseName = $validate['caseName'];
        $ProductVariation->CaseBrand = $validate['caseBrand'];
        $ProductVariation->CaseUsedOrNew = $validate['caseUsedOrNew'];
        $ProductVariation->CoolerName = $validate['coolerName'];
        $ProductVariation->CoolerBrand = $validate['coolerBrand'];
        $ProductVariation->coolerUsedOrNew = $validate['coolerUsedOrNew'];
        $ProductVariation->save();


        foreach ($storageData as $storageItem) {
            $Storage = new StorageData;
            $Storage->productId = $product->id;
            $Storage->name = $storageItem['name'];
            $Storage->brandID = $storageItem['brand'];
            $Storage->type = $storageItem['type'];
            $Storage->Memory = $storageItem['memory'];
            $Storage->usedOrNew = $storageItem['usedOrNew'];
            $Storage->save();
        }

        return redirect(route('seller.allProducts'))->with(['success' => 'Product Uploaded Successfully']);
    }
    public function uploadProduct(Request $request)
    {

        dd($request->all());

        $validate = $request->validate([
            'ProductType' => 'required',
            'productTitle' => 'required|string',
            'category' => ($request->ProductType == '4' || $request->ProductType == '5') ? 'nullable|string' : 'required|string',
            'brand' => ($request->input('thisBrandDoesNotHaveProduct') == 'on' || $request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'nullable|string' : 'required|string',
            'yearOfProduct' => 'required|string',
            'warranty' => 'required|string',
            'reason' => 'nullable|string',
            'repaired' => ($request->input('ProductType') == '1' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'laptopUsedOrNew' => $request->input('ProductType') == '5' ? 'required|string' : 'nullable|string',
            'explainAboutRepairing' => $request->input('repaired') == '1' ? 'required|string' : 'nullable|string',
            'productQuantity' => 'required|integer',
            'productSku' => 'required|string',
            'originalPrice' => 'required|integer',
            'sellPrice' => 'nullable|integer',
            'AboutThisitem' => ($request->input('ProductType') == '1' || $request->input('ProductType') == '2') ? 'required|string' : 'nullable|string',
            'productDescription' => 'required|string',
            'mainImage' => 'required|mimes:png,jpg,jpeg,webp|max:2050',
            'firstImage' => 'required|mimes:png,jpg,jpeg,webp|max:2050',
            'secondImage' => 'required|mimes:png,jpg,jpeg,webp|max:2050',
            'thirdImage' => 'required|mimes:png,jpg,jpeg,webp|max:2050',
            'fourthImage' => 'nullable|mimes:png,jpg,jpeg,webp|max:2050',
            'fifthImage' => 'nullable|mimes:png,jpg,jpeg,webp|max:2050',
            'processorName' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'processorBrand' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'processorUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'graphicCardName' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'graphicCardBrand' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'graphicCardMemory' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'graphicCardUsedOrNew0' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'motherboardName' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'motherboardBrand' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'motherboardUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'ramName' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'ramBrand' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'ramMemory' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'ramUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'ramQuantity' => ($request->input('ProductType') == '4' || $request->input('ProductType') == '5') ? 'required|string' : 'nullable|string',
            'psuName' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'psuBrand' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'psuWatts' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'psuUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'caseName' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'caseBrand' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'caseUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'coolerName' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'coolerBrand' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'coolerUsedOrNew' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'storageData' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'laptopStorage' => $request->input('ProductType') == '5' ? 'required|string' : 'nullable|string',
            'additionalPartsData' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'additionProductData' => $request->input('ProductType') == '4' ? 'required|string' : 'nullable|string',
            'ramGeneration' => $request->input('productCategory') == '5' ? 'required|string' : 'nullable|string',
            'ramClockSpeed' => $request->input('productCategory') == '5' ? 'required|string' : 'nullable|string',
            'ramSize' => $request->input('productCategory') == '5' ? 'required|string' : 'nullable|string',
            'storageType' => $request->input('productCategory') == '6' ? 'required|string' : 'nullable|string',
            'storageSize' => $request->input('productCategory') == '6' ? 'required|string' : 'nullable|string',
            'monitorPanelType' => $request->input('productCategory') == '11' ? 'required|string' : 'nullable|string',
            'monitorRefreshRate' => $request->input('productCategory') == '11' ? 'required|string' : 'nullable|string',
            'monitorSize' => $request->input('productCategory') == '11' ? 'required|string' : 'nullable|string',
            'monitorModelNo' => $request->input('productCategory') == '11' ? 'required|string' : 'nullable|string',
        ], [
            'mainImage.required' => 'Image Is Required',
            'firstImage.required' => 'Image Is Required',
            'secondImage.required' => 'Image Is Required',
            'thirdImage.required' => 'Image Is Required',
            'brandName.required' => 'Please Enter Brand Name Or Tick mark this box',
        ]);


        $folderPath = 'user_folders/Product_Images/' . Auth::user()->id . '_' . $this->fullNameUnderscored;
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

        if ($request->file('fourthImage')) {
            $fourthImage = $request->file('fourthImage');
            $fourthImageName = time() . '_' . 'fourth_image' . '.' . $fourthImage->getClientOriginalExtension();
            $fourthImage->move(public_path($folderPath), $fourthImageName);
        }
        if ($request->file('fifthImage')) {
            $fifthImage = $request->file('fifthImage');
            $fifthImageName = time() . '_' . 'fifth_image' . '.' . $fifthImage->getClientOriginalExtension();
            $fifthImage->move(public_path($folderPath), $fifthImageName);
        }

        $product = new Products;
        $product->ProductType = $validate['ProductType'];
        $product->user_id = Auth::user()->id;
        $product->productTitle = $validate['productTitle'];

        if ($request->input('brandName')) {
            $product->brandName = $validate['brandName'];
        } else {
            $product->brandName = 1;
        }

        if ($request->input('reason')) {
            $product->reason = $validate['reason'];
        }

        if ($request->input('repaired')) {
            $product->repaired = $validate['repaired'];
            if ($validate['repaired'] == 1) {
                $product->explainAboutRepairing = $validate['explainAboutRepairing'];
            }
        } else {
            $product->repaired = 0;
        }

        $product->yearOfProduct = $validate['yearOfProduct'];
        $product->warranty = $validate['warranty'];

        if ($request->input('productCategory')) {
            $product->productCategory = $validate['productCategory'];
        } elseif ($request->input('ProductType') == '4') {
            $product->productCategory = 39;
        } elseif ($request->input('ProductType') == '5') {
            $product->productCategory = 40;
        }

        $product->productQuantity = $validate['productQuantity'];
        $product->productSku = $validate['productSku'];
        $product->originalPrice = $validate['originalPrice'];
        if ($request->input('sellPrice')) {
            $product->SellPrice = $validate['sellPrice'];
        }

        if ($request->input('productDescription')) {
            $product->productDescription = $validate['productDescription'];
        }

        if ($request->input('AboutThisitem')) {
            $product->AboutThisitem = $validate['AboutThisitem'];
        }

        $product->mainImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $mainImageName;
        $product->firstImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $firstImageName;
        $product->secondImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $secondImageName;
        $product->thirdImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $thirdImageName;
        if ($request->file('fourthImage')) {
            $product->fourthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fourthImageName;
        }
        if ($request->file('fifthImage')) {
            $product->fifthImage = Auth::user()->id . '_' . str_replace(' ', '_', $this->fullNameUnderscored) . '/' . $fifthImageName;
        }
        if (Auth::user()->approved != 0) {
            $product->approved = 1;
        } else {
            $product->approved = 0;
        }
        $product->save();

        if ($request->ProductType == '4' || $request->ProductType == '5') {
            $ProductVariation = new ProductVariations;
            $ProductVariation->productId = $product->id;
            $ProductVariation->ProcessorName = $validate['processorName'];
            $ProductVariation->ProcessorBrand = $validate['processorBrand'];
            if ($request->input('processorUsedOrNew')) {
                $ProductVariation->ProcessorUsedOrNew = $validate['processorUsedOrNew'];
            }
            $ProductVariation->GraphicCardName = $validate['graphicCardName'];
            $ProductVariation->GraphicCardBrand = $validate['graphicCardBrand'];
            $ProductVariation->GraphicCardMemory = $validate['graphicCardMemory'];
            if ($request->input('graphicCardUsedOrNew0')) {
                $ProductVariation->GraphicCardUsedOrNew = $validate['graphicCardUsedOrNew0'];
            }
            if ($request->input('motherboardName')) {
                $ProductVariation->MotherBoardName = $validate['motherboardName'];
            }
            if ($request->input('motherboardBrand')) {
                $ProductVariation->MotherBoardBrand = $validate['motherboardBrand'];
            }
            if ($request->input('motherboardUsedOrNew')) {
                $ProductVariation->MotherBoardUsedOrNew = $validate['motherboardUsedOrNew'];
            }
            $ProductVariation->RamName = $validate['ramName'];
            $ProductVariation->RamBrand = $validate['ramBrand'];
            $ProductVariation->RamMemory = $validate['ramMemory'];
            if ($request->input('ramUsedOrNew')) {
                $ProductVariation->ramUsedOrNew = $validate['ramUsedOrNew'];
            }
            $ProductVariation->RamQuantity = $validate['ramQuantity'];
            if ($request->ProductType == '4') {
                $ProductVariation->PSUName = $validate['psuName'];
                $ProductVariation->PSUBrand = $validate['psuBrand'];
                $ProductVariation->PSUWatts = $validate['psuWatts'];
                $ProductVariation->PSUUsedOrNew = $validate['psuUsedOrNew'];
                $ProductVariation->CaseName = $validate['caseName'];
                $ProductVariation->CaseBrand = $validate['caseBrand'];
                $ProductVariation->CaseUsedOrNew = $validate['caseUsedOrNew'];
                $ProductVariation->CoolerName = $validate['coolerName'];
                $ProductVariation->CoolerBrand = $validate['coolerBrand'];
                $ProductVariation->coolerUsedOrNew = $validate['coolerUsedOrNew'];
            }
            $ProductVariation->save();


            if ($request->input('ProductType') == '4') {
                $storageData = json_decode($validate['storageData']);
                foreach ($storageData as $storageItem) {
                    $Storage = new StorageData;
                    $Storage->productId = $product->id;
                    $Storage->name = $storageItem->name;
                    $Storage->brandID = $storageItem->brand;
                    $Storage->type = $storageItem->type;
                    $Storage->Memory = $storageItem->memory;
                    $Storage->usedOrNew = $storageItem->usedOrNew;
                    $Storage->save();
                }
            }

            if ($request->input('ProductType') == '5') {
                $laptopStorage = json_decode($validate['laptopStorage']);
                foreach ($laptopStorage as $laptop) {
                    $Storage = new StorageData;
                    $Storage->productId = $product->id;
                    $Storage->name = $laptop->name;
                    $Storage->brandID = $laptop->brand;
                    $Storage->type = $laptop->type;
                    $Storage->Memory = $laptop->memory;
                    $Storage->save();
                }
            }

            if ($request->input('ProductType') == '4') {
                $additionalPartsData = json_decode($validate['additionalPartsData']);
                foreach ($additionalPartsData as $pcparts) {
                    $additionparts = new AdditionalPcPartsData;
                    $additionparts->productId = $product->id;
                    $additionparts->name = $pcparts->name;
                    $additionparts->userOrnew = $pcparts->userOrnew;
                    $additionparts->save();
                }
            }

            if ($request->input('ProductType') == '4') {
                $additionalProducts = json_decode($validate['additionProductData']);
                foreach ($additionalProducts as $additionProduct) {
                    $additionsProduct = new additionalProducts;
                    $additionsProduct->productId = $product->id;
                    $additionsProduct->name = $additionProduct->name;
                    $additionsProduct->brandId = $additionProduct->brand;
                    $additionsProduct->CategoryID = $additionProduct->category;
                    $additionsProduct->UsedOrNew = $additionProduct->usedOrNew;
                    $additionsProduct->save();
                }
            }
        }


        if ($request->input('productCategory') == '5') {
            $ram = new OtherSingleProducts;
            $ram->productId = $product->id;
            $ram->Type = $validate['ramGeneration'];
            $ram->RRCS = $validate['ramClockSpeed'];
            $ram->size = $validate['ramSize'];
            $ram->save();
        } elseif ($request->input('productCategory') == '6') {
            $storage = new OtherSingleProducts;
            $storage->productId = $product->id;
            $storage->Type = $validate['storageType'];
            $storage->size = $validate['storageSize'];
            $storage->save();
        } elseif ($request->input('productCategory') == '11') {
            $monitor = new OtherSingleProducts;
            $monitor->productId = $product->id;
            $monitor->Type = $validate['monitorPanelType'];
            $monitor->RRCS = $validate['monitorRefreshRate'];
            $monitor->size = $validate['monitorSize'];
            $monitor->modelNo = $validate['monitorModelNo'];
            $monitor->save();
        }



        return redirect(route('seller.allProducts'))->with(['success' => 'Product Uploaded Successfully']);
    }


    public function getBrandsByCategory(Request $request)
    {
        $categories = Categories::where('id', $request->categoryID)->first();
        return response()->json($categories->brands);
    }



    // Edit Products

    public function getEditProductsPage($id)
    {

        $Product = Products::where('id', $id)->with([
            'completePc.processorBrand',
            'completePc.GraphicCardBrand',
            'completePc.MotherBoardBrand',
            'completePc.RamBrand',
            'completePc.PSUBrand',
            'completePc.CaseBrand',
            'completePc.CoolerBrand',
        ])->first();

        $categories = Categories::root()->get();
        $brands = Brands::get();

        return view('seller.pages.products.editProducts', [
            'title' => 'Edit ' . $Product->productTitle,
            'product' => $Product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function getTypes()
    {
        return view('seller.pages.products.types.parent', [
            'title' => 'Select Product Type'
        ]);
    }

    public function getNewProduct()
    {
        $categories = Categories::root()->get();
        $brands = Brands::get();
        return view('seller.pages.products.types.new', [
            'title' => 'New Product',
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function getUsedProduct()
    {
        $categories = Categories::root()->get();
        $brands = Brands::get();
        return view('seller.pages.products.types.used', [
            'title' => 'Used Product',
            'categories' => $categories,
            'brands' => $brands
        ]);
    }



    public function getCompletePc()
    {

        $categories = Categories::root()->get();
        $brands = Brands::get();
        $storageBrands = Categories::where('id', 6)->first();
        $processorBrands = Categories::where('id', 2)->first();
        $graphidCardBrands = Categories::where('id', 4)->first();
        $motherBoardBrands = Categories::where('id', 3)->first();
        $ramBrands = Categories::where('id', 5)->first();
        $psuBrands = Categories::where('id', 8)->first();
        $caseBrands = Categories::where('id', 12)->first();
        $coolerBrands = Categories::where('id', 7)->first();
        return view('seller.pages.products.types.completePc', [
            'title' => 'Complete PC',
            'brands' => $storageBrands->brands,
            'allBrands' => $brands,
            'categories' => $categories,
            'processorBrands' => $processorBrands->brands,
            'graphidCardBrands' => $graphidCardBrands->brands,
            'motherBoardBrands' => $motherBoardBrands->brands,
            'ramBrands' => $ramBrands->brands,
            'psuBrands' => $psuBrands->brands,
            'caseBrands' => $caseBrands->brands,
            'coolerBrands' => $coolerBrands->brands
        ]);
    }

    public function getLaptop()
    {
        $categories = Categories::root()->get();
        $brands = Brands::get();
        $storageBrands = Categories::where('id', 6)->first();
        $processorBrands = Categories::where('id', 2)->first();
        $graphidCardBrands = Categories::where('id', 4)->first();
        $motherBoardBrands = Categories::where('id', 3)->first();
        $ramBrands = Categories::where('id', 5)->first();
        $psuBrands = Categories::where('id', 8)->first();
        $caseBrands = Categories::where('id', 12)->first();
        $coolerBrands = Categories::where('id', 7)->first();
        return view('seller.pages.products.types.laptop', [
            'title' => 'Laptop',
            'brands' => $storageBrands->brands,
            'allBrands' => $brands,
            'categories' => $categories,
            'processorBrands' => $processorBrands->brands,
            'graphidCardBrands' => $graphidCardBrands->brands,
            'motherBoardBrands' => $motherBoardBrands->brands,
            'ramBrands' => $ramBrands->brands,
            'psuBrands' => $psuBrands->brands,
            'caseBrands' => $caseBrands->brands,
            'coolerBrands' => $coolerBrands->brands,
        ]);
    }
}
