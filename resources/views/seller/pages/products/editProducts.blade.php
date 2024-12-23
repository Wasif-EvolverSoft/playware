@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Edit {{ $product->productTitle }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item ">All Products</li>
                                <li class="breadcrumb-item ">Edit</li>
                                <li class="breadcrumb-item active">{{ $product->productTitle }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    @error('GlobalError')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('auth.uploadProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md col-sm-12" id="selectProducttype">
                                <div class="form-group">
                                    <label for="ProductType">Product Type</label>


                                    @if ($product->ProductType == 1)
                                        <input type="text" class="form-control" readonly name="ProductType"
                                            value="Sell A Used Product">
                                    @elseif($product->ProductType == 2)
                                        <input type="text" class="form-control" readonly name="ProductType"
                                            value="Sell A New Product">
                                    @elseif($product->ProductType == 4)
                                        <input type="text" class="form-control" readonly name="ProductType"
                                            value="Complete PC">
                                    @elseif($product->ProductType == 5)
                                        <input type="text" class="form-control" readonly name="ProductType"
                                            value="Laptops">
                                    @endif

                                    @error('ProductType')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productTitle">Product Title</label>
                                    <input type="text" value="{{ old('productTitle') ?? $product->productTitle }}"
                                        id="productTitle" name="productTitle" class="form-control"
                                        placeholder="Brand + Product Type + Color + Material Eg. Adidas T20 Shoes red leather">
                                    @error('productTitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>




                        @if ($product->ProductType != '4')
                            <div class="row" id="productTypeData">
                                <div id="productCategoryDiv" class="col-md col-sm-12">
                                    <div class="form-group">
                                        <label for="productCategory">Product Category</label>
                                        <select name="productCategory" class="form-control" id="productCategory">
                                            <option value="" selected>Select Category</option>
                                            @foreach ($categories as $category)
                                                <x-categories-select :category="$category" :oldValue="$product->productCategory" />
                                            @endforeach
                                        </select>
                                        @error('productCategory')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>


                                <div id="brandNameDiv" class="col-md col-sm-12">
                                    <div class="form-group">
                                        <label for="brandName">Brand Name</label>
                                        <select name="brandName" class="form-control" id="brandName">
                                            <option value="" selected>Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}"
                                                    {{ $product->brandName == $brand->id ? 'selected' : '' }}>
                                                    {{ $brand->name }}</option>
                                            @endforeach
                                        </select>

                                        <div class="custom-control mt-2 custom-checkbox checkbox-primary">
                                            <input type="checkbox" name="thisBrandDoesNotHaveProduct"
                                                class="custom-control-input"
                                                {{ old('thisBrandDoesNotHaveProduct') == 'on' ? 'checked' : '' }}
                                                id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">This Product Does Not
                                                Have
                                                Brand
                                                Name.</label>
                                            @error('brandName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <div class="col" id="selectProductYear">
                                    <div class="form-group">
                                        <label for="yearOfProduct">Year-Make of Product</label>

                                        <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                            <option value="0" selected>Select Year/Make of Your Product</option>
                                            @if ($product->ProductType == '4')
                                                <option value="1"
                                                    {{ $product->yearOfProduct == 1 ? 'selected' : '' }}>
                                                    2010
                                                </option>
                                                <option value="2"
                                                    {{ $product->yearOfProduct == 2 ? 'selected' : '' }}>
                                                    2011
                                                </option>
                                                <option value="3"
                                                    {{ $product->yearOfProduct == 3 ? 'selected' : '' }}>
                                                    2012
                                                </option>
                                                <option value="4"
                                                    {{ $product->yearOfProduct == 4 ? 'selected' : '' }}>
                                                    2013
                                                </option>
                                                <option value="5"
                                                    {{ $product->yearOfProduct == 5 ? 'selected' : '' }}>
                                                    2014
                                                </option>
                                                <option value="6"
                                                    {{ $product->yearOfProduct == 6 ? 'selected' : '' }}>
                                                    2015
                                                </option>
                                                <option value="7"
                                                    {{ $product->yearOfProduct == 7 ? 'selected' : '' }}>
                                                    2016
                                                </option>
                                                <option value="8"
                                                    {{ $product->yearOfProduct == 8 ? 'selected' : '' }}>
                                                    2017
                                                </option>
                                                <option value="9"
                                                    {{ $product->yearOfProduct == 9 ? 'selected' : '' }}>
                                                    2018
                                                </option>
                                                <option value="10"
                                                    {{ $product->yearOfProduct == 10 ? 'selected' : '' }}>
                                                    2019
                                                </option>
                                                <option value="11"
                                                    {{ $product->yearOfProduct == 11 ? 'selected' : '' }}>
                                                    2020
                                                </option>
                                                <option value="12"
                                                    {{ $product->yearOfProduct == 12 ? 'selected' : '' }}>
                                                    2021
                                                </option>
                                                <option value="13"
                                                    {{ $product->yearOfProduct == 13 ? 'selected' : '' }}>
                                                    2022
                                                </option>
                                                <option value="14"
                                                    {{ $product->yearOfProduct == 14 ? 'selected' : '' }}>
                                                    2023
                                                </option>
                                                <option value="15"
                                                    {{ $product->yearOfProduct == 15 ? 'selected' : '' }}>
                                                    2024
                                                </option>
                                            @elseif ($product->ProductType == '1')
                                                <option value="1"
                                                    {{ $product->yearOfProduct == '1' ? 'selected' : '' }}>
                                                    2010</option>
                                                <option value="2"
                                                    {{ $product->yearOfProduct == '2' ? 'selected' : '' }}>
                                                    2011</option>
                                                <option value="3"
                                                    {{ $product->yearOfProduct == '3' ? 'selected' : '' }}>
                                                    2012</option>
                                                <option value="4"
                                                    {{ $product->yearOfProduct == '4' ? 'selected' : '' }}>
                                                    2013</option>
                                                <option value="5"
                                                    {{ $product->yearOfProduct == '5' ? 'selected' : '' }}>
                                                    2014</option>
                                                <option value="6"
                                                    {{ $product->yearOfProduct == '6' ? 'selected' : '' }}>
                                                    2015</option>
                                                <option value="7"
                                                    {{ $product->yearOfProduct == '7' ? 'selected' : '' }}>
                                                    2016</option>
                                                <option value="8"
                                                    {{ $product->yearOfProduct == '8' ? 'selected' : '' }}>
                                                    2017</option>
                                                <option value="9"
                                                    {{ $product->yearOfProduct == '9' ? 'selected' : '' }}>
                                                    2018</option>
                                                <option value="10"
                                                    {{ $product->yearOfProduct == '10' ? 'selected' : '' }}>2019</option>
                                                <option value="11"
                                                    {{ $product->yearOfProduct == '11' ? 'selected' : '' }}>2020</option>
                                                <option value="12"
                                                    {{ $product->yearOfProduct == '12' ? 'selected' : '' }}>2021</option>
                                                <option value="13"
                                                    {{ $product->yearOfProduct == '13' ? 'selected' : '' }}>2022</option>
                                                <option value="14"
                                                    {{ $product->yearOfProduct == '14' ? 'selected' : '' }}>2023</option>
                                                <option value="15"
                                                    {{ $product->yearOfProduct == '15' ? 'selected' : '' }}>2024</option>
                                            @elseif($product->ProductType == '2')
                                                <option value="1"
                                                    {{ $product->yearOfProduct == '1' ? 'selected' : '' }}>
                                                    2010</option>
                                                <option value="2"
                                                    {{ $product->yearOfProduct == '2' ? 'selected' : '' }}>
                                                    2011</option>
                                                <option value="3"
                                                    {{ $product->yearOfProduct == '3' ? 'selected' : '' }}>
                                                    2012</option>
                                                <option value="4"
                                                    {{ $product->yearOfProduct == '4' ? 'selected' : '' }}>
                                                    2013</option>
                                                <option value="5"
                                                    {{ $product->yearOfProduct == '5' ? 'selected' : '' }}>
                                                    2014</option>
                                                <option value="6"
                                                    {{ $product->yearOfProduct == '6' ? 'selected' : '' }}>
                                                    2015</option>
                                                <option value="7"
                                                    {{ $product->yearOfProduct == '7' ? 'selected' : '' }}>
                                                    2016</option>
                                                <option value="8"
                                                    {{ $product->yearOfProduct == '8' ? 'selected' : '' }}>
                                                    2017</option>
                                                <option value="9"
                                                    {{ $product->yearOfProduct == '9' ? 'selected' : '' }}>
                                                    2018</option>
                                                <option value="10"
                                                    {{ $product->yearOfProduct == '10' ? 'selected' : '' }}>2019</option>
                                                <option value="11"
                                                    {{ $product->yearOfProduct == '11' ? 'selected' : '' }}>2020</option>
                                                <option value="12"
                                                    {{ $product->yearOfProduct == '12' ? 'selected' : '' }}>2021</option>
                                                <option value="13"
                                                    {{ $product->yearOfProduct == '13' ? 'selected' : '' }}>2022</option>
                                                <option value="14"
                                                    {{ $product->yearOfProduct == '14' ? 'selected' : '' }}>2023</option>
                                                <option value="15"
                                                    {{ $product->yearOfProduct == '15' ? 'selected' : '' }}>2024</option>
                                            @endif
                                        </select>

                                        @error('yearOfProduct')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>
                            </div>
                        @endif

                        <div class="row" id="productReasonAndWarrantyDiv">
                            <div class="col-md col-sm-12" id="warrantyDiv">
                                <div class="form-group">
                                    <label for="warranty">Check warranty</label>
                                    <select name="warranty" id="warranty" class="form-control">
                                        <option value="" selected>Please Select Warranty</option>
                                        @if ($product->ProductType == '4')
                                            <option value="6 Months"
                                                {{ $product->warranty == '6 Months' ? 'selected' : '' }}>6 Months
                                            </option>
                                            <option value="1 Year" {{ $product->warranty == '1 Year' ? 'selected' : '' }}>
                                                1 Year</option>
                                            <option value="2 Years"
                                                {{ $product->warranty == '2 Years' ? 'selected' : '' }}>2 Years</option>
                                            <option value="3 Years"
                                                {{ $product->warranty == '3 Years' ? 'selected' : '' }}>3 Years</option>
                                        @elseif($product->ProductType == '1')
                                            <option value="1 Week" {{ $product->warranty == '1 Week' ? 'selected' : '' }}>
                                                1 Week</option>
                                            <option value="1 Month"
                                                {{ $product->warranty == '1 Month' ? 'selected' : '' }}>1 Month</option>
                                            <option value="3 Months"
                                                {{ $product->warranty == '3 Months' ? 'selected' : '' }}>3 Months</option>
                                        @endif
                                    </select>
                                    @error('warranty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12" id="reasonForSellingDiv">
                                <div class="form-group">
                                    <label for="reason">Reason for Selling (Optional)</label>
                                    <input type="text" class="form-control" name="reason" id="reasonForSelling"
                                        value="{{ $product->reason }}">
                                </div>
                            </div>


                            @if ($product->ProductType == '4')
                                <div class="col" id="selectProductYear">
                                    <div class="form-group">
                                        <label for="yearOfProduct">Year-Make of Product</label>
                                        <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                            <option value="0" selected>Select Year/Make of Your Product</option>
                                            <option value="1" {{ $product->yearOfProduct == 1 ? 'selected' : '' }}>
                                                2010
                                            </option>
                                            <option value="2" {{ $product->yearOfProduct == 2 ? 'selected' : '' }}>
                                                2011
                                            </option>
                                            <option value="3" {{ $product->yearOfProduct == 3 ? 'selected' : '' }}>
                                                2012
                                            </option>
                                            <option value="4" {{ $product->yearOfProduct == 4 ? 'selected' : '' }}>
                                                2013
                                            </option>
                                            <option value="5" {{ $product->yearOfProduct == 5 ? 'selected' : '' }}>
                                                2014
                                            </option>
                                            <option value="6" {{ $product->yearOfProduct == 6 ? 'selected' : '' }}>
                                                2015
                                            </option>
                                            <option value="7" {{ $product->yearOfProduct == 7 ? 'selected' : '' }}>
                                                2016
                                            </option>
                                            <option value="8" {{ $product->yearOfProduct == 8 ? 'selected' : '' }}>
                                                2017
                                            </option>
                                            <option value="9" {{ $product->yearOfProduct == 9 ? 'selected' : '' }}>
                                                2018
                                            </option>
                                            <option value="10" {{ $product->yearOfProduct == 10 ? 'selected' : '' }}>
                                                2019
                                            </option>
                                            <option value="11" {{ $product->yearOfProduct == 11 ? 'selected' : '' }}>
                                                2020
                                            </option>
                                            <option value="12" {{ $product->yearOfProduct == 12 ? 'selected' : '' }}>
                                                2021
                                            </option>
                                            <option value="13" {{ $product->yearOfProduct == 13 ? 'selected' : '' }}>
                                                2022
                                            </option>
                                            <option value="14" {{ $product->yearOfProduct == 14 ? 'selected' : '' }}>
                                                2023
                                            </option>
                                            <option value="15" {{ $product->yearOfProduct == 15 ? 'selected' : '' }}>
                                                2024
                                            </option>
                                        </select>

                                        @error('yearOfProduct')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>



                                </div>
                            @endif


                            @if ($product->ProductType == '5' || $product->ProductType == '1')
                                <div class="col-md col-sm-12" id="repairedProductDiv">
                                    <div class="form-group">
                                        <label for="repaired">Is Product Repaired/Opened?</label>
                                        <select name="repaired" id="repaired" class="form-control">
                                            <option value="">Please Select</option>
                                            <option value="1" {{ $product->repaired == 1 ? 'selected' : '' }}>Yes
                                            </option>
                                            <option value="2" {{ $product->repaired == 2 ? 'selected' : '' }}>No
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="col-md col-sm-12 d-none" id="laptopUsedOrNotDiv"></div>
                        </div>

                        {{-- Display This if the repaired is true. --}}
                        @if ($product->repaired == 1)
                            <div id="explainRepairingDiv" class="">
                                <div class="form-group">
                                    <label for="explainAboutRepairing">Explain Why Is The Product
                                        Repaired/Opened?</label>
                                    <textarea class="form-control" rows="4" name="explainAboutRepairing" id="explainAboutRepairing"
                                        placeholder="Because of dust..." required="">{{ $product->explainAboutRepairing }}</textarea>
                                </div>
                            </div>
                        @endif


                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productQuantity">Product Quantity</label>
                                    <input type="number" id="productQuantity"
                                        value="{{ old('productQuantity') ?? $product->productQuantity }}"
                                        name="productQuantity" class="form-control" placeholder="Eg. 50">
                                    @error('productQuantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productSku">Product SKU</label>
                                    <input type="text" id="productSku"
                                        value="{{ old('productSku') ?? $product->productSku }}" name="productSku"
                                        class="form-control"
                                        placeholder="Eg. Seller123, Product123, For Your Convineiece After Order">
                                    @error('productSku')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="originalPrice">Original Price</label>
                                    <input type="number" id="originalPrice" name="originalPrice" class="form-control"
                                        placeholder="Eg. 1500"
                                        value="{{ old('originalPrice') ?? $product->originalPrice }}">
                                    @error('originalPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="sellPrice">Sale Price (Leave Empty If Not On Sale)</label>
                                    <input type="number" id="sellPrice" name="sellPrice" class="form-control"
                                        placeholder="Eg. 1200" value="{{ old('sellPrice') ?? $product->SellPrice }}">
                                    @error('sellPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        @if ($product->ProductType == '4')
                            <div id="completePCparts" class="mt-5">
                                <h2>PC Parts:</h2>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>Processor:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="processorName">Enter Name</label>
                                                    <input type="text" id="processorName" name="processorName"
                                                        class="form-control" placeholder="Eg. Core i7 10th Gen"
                                                        value="{{ $product->completePc[0]->ProcessorName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="processorBrand">Brand</label>
                                                    <select id="processorBrand" name="processorBrand"
                                                        class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="1">Intel</option>
                                                        <option value="2">AMD</option>
                                                        <option value="7">Nvidia</option>
                                                        <option value="60">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="processorUsedOrNew">Used Or New?</label>
                                                    <select id="processorUsedOrNew" name="processorUsedOrNew"
                                                        class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->ProcessorUsedOrNew == 1 ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->ProcessorUsedOrNew == 2 ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>Graphic Card:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="graphicCardName">Enter Name</label>
                                                    <input type="text" id="graphicCardName" name="graphicCardName"
                                                        class="form-control" placeholder="Eg. Gigabyte GTX 1050"
                                                        value=" {{ $product->completePc[0]->GraphicCardName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="graphicCardBrand">Brand</label>
                                                    <select id="graphicCardBrand" name="graphicCardBrand"
                                                        class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="7">Nvidia</option>
                                                        <option value="2">AMD</option>
                                                        <option value="1">Intel</option>
                                                        <option value="60">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="graphicCardMemory">Memory</label>
                                                    <select id="graphicCardMemory" name="graphicCardMemory"
                                                        class="form-control">
                                                        <option value="0" selected="">Please Select Memory
                                                        </option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '1' ? 'selected' : '' }}>
                                                            1 GB</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '2' ? 'selected' : '' }}>
                                                            2 GB</option>
                                                        <option value="3"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '3' ? 'selected' : '' }}>
                                                            3 GB</option>
                                                        <option value="4"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '4' ? 'selected' : '' }}>
                                                            4 GB</option>
                                                        <option value="6"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '6' ? 'selected' : '' }}>
                                                            6 GB</option>
                                                        <option value="7"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '7' ? 'selected' : '' }}>
                                                            8 GB</option>
                                                        <option value="8"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '8' ? 'selected' : '' }}>
                                                            12 GB</option>
                                                        <option value="9"
                                                            {{ $product->completePc[0]->GraphicCardMemory == '9' ? 'selected' : '' }}>
                                                            24 GB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="graphicCardUsedOrNew">Used Or New?</label>
                                                    <select id="graphicCardUsedOrNew" name="graphicCardUsedOrNew0"
                                                        class="form-control">
                                                        <option value="0" selected="">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->GraphicCardMemory == 1 ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->GraphicCardMemory == 2 ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>Motherboard:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="motherboardName">Enter Name</label>
                                                    <input type="text" id="motherboardName" name="motherboardName"
                                                        class="form-control"
                                                        placeholder="Eg. MSI B450 TOMAHAWK MAX ATX AM4 "
                                                        value="{{ $product->completePc[0]->MotherBoardName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="motherboardBrand">Brand</label>
                                                    <select id="motherboardBrand" name="motherboardBrand"
                                                        class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="3">ASUS</option>
                                                        <option value="4">GIGABYTE</option>
                                                        <option value="5">MSI</option>
                                                        <option value="6">EVGA</option>
                                                        <option value="60">Other</option>
                                                    </select>


                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="motherboardUsedOrNew">Used Or New?</label>
                                                    <select id="motherboardUsedOrNew" name="motherboardUsedOrNew"
                                                        class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->MotherBoardUsedOrNew == '1' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->MotherBoardUsedOrNew == '2' ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>RAM:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="ramName">Enter Name</label>
                                                    <input type="text" id="ramName" name="ramName"
                                                        class="form-control" placeholder="Eg. GSkill 16GB DDR4 "
                                                        value="{{ $product->completePc[0]->RamName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="ramBrand">Brand</label>
                                                    <select id="ramBrand" name="ramBrand" class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="8">Corsair</option>
                                                        <option value="9">Crucial</option>
                                                        <option value="10">Adata</option>
                                                        <option value="11">Kingston</option>
                                                        <option value="13">Samsung</option>
                                                        <option value="19">XPG</option>
                                                        <option value="14">OLOY</option>
                                                        <option value="15">Lezar</option>
                                                        <option value="16">PNY</option>
                                                        <option value="17">T-Force</option>
                                                        <option value="18">V-Color</option>
                                                        <option value="19">XPG</option>
                                                        <option value="60">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="ramMemory">Memory</label>
                                                    <select id="ramMemory" name="ramMemory" class="form-control">
                                                        <option value="0">Please Select Memory</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->RamMemory == '1' ? 'selected' : '' }}>
                                                            1 GB</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->RamMemory == '2' ? 'selected' : '' }}>
                                                            2 GB</option>
                                                        <option value="3"
                                                            {{ $product->completePc[0]->RamMemory == '3' ? 'selected' : '' }}>
                                                            4 GB</option>
                                                        <option value="4"
                                                            {{ $product->completePc[0]->RamMemory == '4' ? 'selected' : '' }}>
                                                            8 GB</option>
                                                        <option value="5"
                                                            {{ $product->completePc[0]->RamMemory == '5' ? 'selected' : '' }}>
                                                            16 GB</option>
                                                        <option value="6"
                                                            {{ $product->completePc[0]->RamMemory == '6' ? 'selected' : '' }}>
                                                            32 GB</option>
                                                        <option value="7"
                                                            {{ $product->completePc[0]->RamMemory == '7' ? 'selected' : '' }}>
                                                            64 GB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="ramUsedOrNew">Used Or New?</label>
                                                    <select id="ramUsedOrNew" name="ramUsedOrNew" class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->RamUsedOrNew == '1' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->RamUsedOrNew == '2' ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="ramQuantity">Quantity</label>
                                                    <input type="number" id="ramQuantity" name="ramQuantity"
                                                        class="form-control" placeholder="Eg. 2"
                                                        value="{{ $product->completePc[0]->RamQuantity }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>Storage:</h4>
                                    </div>
                                    <input type="hidden" id="storageData" name="storageData">
                                    <div id="storageSpecsDiv" class="col-12">
                                        @php
                                            $StorageIndex = 1;
                                        @endphp
                                        @foreach ($product->PcLaptopStorage as $item)
                                        @php
                                            $StorageIndex++;
                                        @endphp
                                        <div id="row{{$loop->index + 1}}" class="row">
                                            <div class="col-12">
                                                <h5>storage {{$loop->index + 1}}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageName{{$loop->index + 1}}">Enter Name</label>
                                                    <input type="text" id="storageName{{$loop->index + 1}}" name="storageName{{$loop->index + 1}}"
                                                        class="form-control storageName"
                                                        placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive" value="{{$item->name}}">

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageBrand{{$loop->index + 1}}">Brand</label>
                                                    <select id="storageBrand{{$loop->index + 1}}" name="storageBrand{{$loop->index + 1}}"
                                                        class="form-control storageBrand">
                                                       

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageType{{$loop->index + 1}}">Type</label>
                                                    <select id="storageType{{$loop->index + 1}}" name="storageType{{$loop->index + 1}}"
                                                        class="form-control storageType">
                                                        <option value="0">Please Select Type</option>
                                                        <option value="1" {{$item->type ==  "1" ? 'selected' : ''}}>HDD</option>
                                                        <option value="2" {{$item->type ==  "2" ? 'selected' : ''}}>SSD</option>
                                                        <option value="3" {{$item->type ==  "3" ? 'selected' : ''}}>NVMe</option>
                                                        <option value="4" {{$item->type ==  "4" ? 'selected' : ''}}>M.2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageMemory{{$loop->index + 1}}">Memory</label>
                                                    <select id="storageMemory{{$loop->index + 1}}" name="storageMemory{{$loop->index + 1}}"
                                                        class="form-control storageMemory">
                                                        <option value="0" {{$item->Memory == "0"  ? 'selected' : ''}}>Please Select Memory</option>
                                                        <option value="1" {{$item->Memory == "1"  ? 'selected' : ''}}>120 GB</option>
                                                        <option value="2" {{$item->Memory == "2"  ? 'selected' : ''}}>240 GB</option>
                                                        <option value="3" {{$item->Memory == "3"  ? 'selected' : ''}}>250 GB</option>
                                                        <option value="4" {{$item->Memory == "4"  ? 'selected' : ''}}>256 GB</option>
                                                        <option value="5" {{$item->Memory == "5"  ? 'selected' : ''}}>480 GB</option>
                                                        <option value="6" {{$item->Memory == "6"  ? 'selected' : ''}}>500 GB</option>
                                                        <option value="7" {{$item->Memory == "7"  ? 'selected' : ''}}>512 GB</option>
                                                        <option value="8" {{$item->Memory == "8"  ? 'selected' : ''}}>1 TB</option>
                                                        <option value="9" {{$item->Memory == "9"  ? 'selected' : ''}}>2 TB</option>
                                                        <option value="10" {{$item->Memory == "10"  ? 'selected' : ''}}>4 TB</option>
                                                        <option value="11" {{$item->Memory == "11"  ? 'selected' : ''}}>8 TB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageUsedOrNew{{$loop->index + 1}}">Used Or New?</label>
                                                    <select id="storageUsedOrNew{{$loop->index + 1}}" name="storageUsedOrNew{{$loop->index + 1}}"
                                                        class="form-control storageUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1" {{$item->usedOrNew == "1" ? 'selected' : ''}}>Used</option>
                                                        <option value="2" {{$item->usedOrNew == "2" ? 'selected' : ''}}>New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        <div id="row1" class="row">
                                            <div class="col-12">
                                                <h5>storage {{$StorageIndex}}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageName{{$StorageIndex}}">Enter Name</label>
                                                    <input type="text" id="storageName{{$StorageIndex}}" name="storageName{{$StorageIndex}}"
                                                        class="form-control storageName"
                                                        placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageBrand{{$StorageIndex}}">Brand</label>
                                                    <select id="storageBrand{{$StorageIndex}}" name="storageBrand{{$StorageIndex}}"
                                                        class="form-control storageBrand">
                                                                                                          </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageType{{$StorageIndex}}">Type</label>
                                                    <select id="storageType{{$StorageIndex}}" name="storageType{{$StorageIndex}}"
                                                        class="form-control storageType">
                                                        <option value="0">Please Select Type</option>
                                                        <option value="1">HDD</option>
                                                        <option value="2">SSD</option>
                                                        <option value="3">NVMe</option>
                                                        <option value="4">M.2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageMemory{{$StorageIndex}}">Memory</label>
                                                    <select id="storageMemory{{$StorageIndex}}" name="storageMemory{{$StorageIndex}}"
                                                        class="form-control storageMemory">
                                                        <option value="0">Please Select Memory</option>
                                                        <option value="1">120 GB</option>
                                                        <option value="2">240 GB</option>
                                                        <option value="3">250 GB</option>
                                                        <option value="4">256 GB</option>
                                                        <option value="5">480 GB</option>
                                                        <option value="6">500 GB</option>
                                                        <option value="7">512 GB</option>
                                                        <option value="8">1 TB</option>
                                                        <option value="9">2 TB</option>
                                                        <option value="10">4 TB</option>
                                                        <option value="11">8 TB</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageUsedOrNew{{$StorageIndex}}">Used Or New?</label>
                                                    <select id="storageUsedOrNew{{$StorageIndex}}" name="storageUsedOrNew{{$StorageIndex}}"
                                                        class="form-control storageUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1">Used</option>
                                                        <option value="2">New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md mb-3">
                                        <button type="button" class="btn btn-primary" id="addMoreStorageBtn">Add More
                                            Storage</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>PSU:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="psuName">Enter Name</label>
                                                    <input type="text" id="psuName" name="psuName"
                                                        class="form-control"
                                                        placeholder="Eg. Corsair CX550 550Watt 80+ Bronze "
                                                        value="{{ $product->completePc[0]->PSUName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="psuBrand">Brand</label>
                                                    <select id="psuBrand" name="psuBrand" class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="3">ASUS</option>
                                                        <option value="8">Corsair</option>
                                                        <option value="35">Thermaltake</option>
                                                        <option value="19">XPG</option>
                                                        <option value="4">GIGABYTE</option>
                                                        <option value="24">LianLi</option>
                                                        <option value="5">MSI</option>
                                                        <option value="33">XIGMATEK</option>
                                                        <option value="36">Gamdias</option>
                                                        <option value="25">Darkflash</option>
                                                        <option value="30">Redragon</option>
                                                        <option value="6">EVGA</option>
                                                        <option value="28">NZXT</option>
                                                        <option value="27">Cooler Master</option>
                                                        <option value="60">Other</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="psuWatts">Watts</label>
                                                    <select id="psuWatts" name="psuWatts" class="form-control">
                                                        <option value="0">Please Select Watts</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->PSUWatts == '1' ? 'selected' : '' }}>
                                                            300 Watts</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->PSUWatts == '2' ? 'selected' : '' }}>
                                                            400 Watts</option>
                                                        <option value="3"
                                                            {{ $product->completePc[0]->PSUWatts == '3' ? 'selected' : '' }}>
                                                            450 Watts</option>
                                                        <option value="4"
                                                            {{ $product->completePc[0]->PSUWatts == '4' ? 'selected' : '' }}>
                                                            500 Watts</option>
                                                        <option value="5"
                                                            {{ $product->completePc[0]->PSUWatts == '5' ? 'selected' : '' }}>
                                                            550 Watts</option>
                                                        <option value="6"
                                                            {{ $product->completePc[0]->PSUWatts == '6' ? 'selected' : '' }}>
                                                            600 Watts</option>
                                                        <option value="7"
                                                            {{ $product->completePc[0]->PSUWatts == '7' ? 'selected' : '' }}>
                                                            650 Watts</option>
                                                        <option value="8"
                                                            {{ $product->completePc[0]->PSUWatts == '8' ? 'selected' : '' }}>
                                                            700 Watts</option>
                                                        <option value="9"
                                                            {{ $product->completePc[0]->PSUWatts == '9' ? 'selected' : '' }}>
                                                            750 Watts</option>
                                                        <option value="10"
                                                            {{ $product->completePc[0]->PSUWatts == '10' ? 'selected' : '' }}>
                                                            800 Watts</option>
                                                        <option value="11"
                                                            {{ $product->completePc[0]->PSUWatts == '11' ? 'selected' : '' }}>
                                                            850 Watts</option>
                                                        <option value="12"
                                                            {{ $product->completePc[0]->PSUWatts == '12' ? 'selected' : '' }}>
                                                            900 Watts</option>
                                                        <option value="13"
                                                            {{ $product->completePc[0]->PSUWatts == '13' ? 'selected' : '' }}>
                                                            1000 Watts</option>
                                                        <option value="14"
                                                            {{ $product->completePc[0]->PSUWatts == '14' ? 'selected' : '' }}>
                                                            1200 Watts</option>
                                                        <option value="15"
                                                            {{ $product->completePc[0]->PSUWatts == '15' ? 'selected' : '' }}>
                                                            1500 Watts</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="psuUsedOrNew">Used Or New?</label>
                                                    <select id="psuUsedOrNew" name="psuUsedOrNew" class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->PSUUsedOrNew == '1' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->PSUUsedOrNew == '2' ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>Case:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="caseName">Enter Name</label>
                                                    <input type="text" id="caseName" name="caseName"
                                                        class="form-control"
                                                        placeholder="Eg. NZXT H9 Flow Dual-Chamber Mid-Tower Airflow Case"
                                                        value="{{ $product->completePc[0]->CaseName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="caseBrand">Brand</label>
                                                    <select id="caseBrand" name="caseBrand" class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="8">Corsair</option>
                                                        <option value="3">ASUS</option>
                                                        <option value="24">LianLi</option>
                                                        <option value="25">Darkflash</option>
                                                        <option value="46">GameMax</option>
                                                        <option value="47">1st Player</option>
                                                        <option value="60">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="caseUsedOrNew">Used Or New?</label>
                                                    <select id="caseUsedOrNew" name="caseUsedOrNew" class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->CaseUsedOrNew == '1' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->CaseUsedOrNew == '2' ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <h4>Cooler:</h4>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="coolerName">Enter Name</label>
                                                    <input type="text" id="coolerName" name="coolerName"
                                                        class="form-control"
                                                        placeholder="Eg. XPG VENTO 120 ARGB FAN Case Fan"
                                                        value=" {{ $product->completePc[0]->CoolerName }}">
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="coolerBrand">Brand</label>
                                                    <select id="coolerBrand" name="coolerBrand" class="form-control">
                                                        <option selected="">Select Brand</option>
                                                        <option value="24">LianLi</option>
                                                        <option value="25">Darkflash</option>
                                                        <option value="8">Corsair</option>
                                                        <option value="26">DeepCool</option>
                                                        <option value="27">Cooler Master</option>
                                                        <option value="28">NZXT</option>
                                                        <option value="29">Antec</option>
                                                        <option value="30">Redragon</option>
                                                        <option value="31">Sapphire</option>
                                                        <option value="32">ID-Cooling</option>
                                                        <option value="33">XIGMATEK</option>
                                                        <option value="34">Alseye</option>
                                                        <option value="35">Thermaltake</option>
                                                        <option value="19">XPG</option>
                                                        <option value="60">Other</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="coolerUsedOrNew">Used Or New?</label>
                                                    <select id="coolerUsedOrNew" name="coolerUsedOrNew"
                                                        class="form-control">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product->completePc[0]->CaseUsedOrNew == '1' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="2"
                                                            {{ $product->completePc[0]->CaseUsedOrNew == '2' ? 'selected' : '' }}>
                                                            New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div id="additionalPCparts" class="row mt-5">
                                <div class="col-12">
                                    <h2>Additional PC Parts:</h2>
                                </div>
                                <input type="hidden" id="additionalPartsData" name="additionalPartsData">
                                <div id="additionalPCpartsSpecs" class="col-12">

                                    @php
                                        $AdditionalPartsIndex = 1;
                                    @endphp
                                    @foreach ($product->AdditionalParts as $item)
                                        @php
                                            $AdditionalPartsIndex++;
                                        @endphp
                                        <div id="additionalPCpartsrow1" class="row">
                                            <div class="col-12">
                                                <h5>Additional Part {{ $loop->index + 1 }}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalPCpartName1">Enter Name</label>
                                                    <input type="text" id="additionalPCpartName1"
                                                        name="additionalPCpartName1"
                                                        class="form-control additionalPCPartName"
                                                        placeholder="Eg. Case Fans" value="{{ $item->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalPCpartUsedOrNew1">Used Or New?</label>
                                                    <select id="additionalPCpartUsedOrNew1"
                                                        name="additionalPCpartUsedOrNew1"
                                                        class="form-control additionalPCpartUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $item->userOrnew == '1' ? 'selected' : '' }}>Used</option>
                                                        <option value="2"
                                                            {{ $item->userOrnew == '2' ? 'selected' : '' }}>New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                    <div id="additionalPCpartsrow{{ $AdditionalPartsIndex }}" class="row">
                                        <div class="col-12">
                                            <h5>Additional Part {{ $AdditionalPartsIndex }}</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalPCpartName{{ $AdditionalPartsIndex }}">Enter
                                                    Name</label>
                                                <input type="text"
                                                    id="additionalPCpartName{{ $AdditionalPartsIndex }}"
                                                    name="additionalPCpartName{{ $AdditionalPartsIndex }}"
                                                    class="form-control additionalPCPartName" placeholder="Eg. Case Fans">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalPCpartUsedOrNew{{ $AdditionalPartsIndex }}">Used Or
                                                    New?</label>
                                                <select id="additionalPCpartUsedOrNew{{ $AdditionalPartsIndex }}"
                                                    name="additionalPCpartUsedOrNew{{ $AdditionalPartsIndex }}"
                                                    class="form-control additionalPCpartUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="addMorePcPartsBtnDiv" class="col-12 mb-3">
                                    <p>You can add upto 5 additional parts.</p>
                                    <button type="button" class="btn btn-primary" id="addMoreadditionalPCpartBtn">Add
                                        More
                                        Parts</button>
                                </div>
                            </div>

                            <div id="additionalProducts" class="row mt-5">
                                <div class="col-12">
                                    <h2>Additional Products:</h2>
                                </div>
                                <input type="hidden" id="additionProductData" name="additionProductData">
                                <div id="additionalProductsSpecs" class="col-12">

                                    @php
                                        $AdditionalProductsIndex = 1;
                                    @endphp
                                    @foreach ($product->AdditionalProducts as $item)
                                    @php
                                        $AdditionalProductsIndex++;
                                    @endphp
                                        <div id="additionalProductrow{{$loop->index + 1}}" class="row">
                                            <div class="col-12">
                                                <h5>Additional Product {{ $loop->index + 1 }}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductName{{ $loop->index + 1 }}">Enter
                                                        Name</label>
                                                    <input type="text"
                                                        id="additionalProductName{{ $loop->index + 1 }}"
                                                        name="additionalProductName{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductName"
                                                        placeholder="Product Title" value="{{ $item->name }}">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductCategory{{ $loop->index + 1 }}">Product
                                                        Category</label>
                                                    <select id="additionalProductCategory{{ $loop->index + 1 }}"
                                                        name="additionalProductCategory{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductCategory">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductBrand{{ $loop->index + 1 }}">Product
                                                        Brand</label>
                                                    <select id="additionalProductBrand{{ $loop->index + 1 }}"
                                                        name="additionalProductBrand{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductBrand">
                                                      
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductUsedOrNew{{ $loop->index + 1 }}">Used Or
                                                        New?</label>
                                                    <select id="additionalProductUsedOrNew{{ $loop->index + 1 }}"
                                                        name="additionalProductUsedOrNew{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $item->UsedOrNew == '1' ? 'selected' : '' }}>Used</option>
                                                        <option value="2"
                                                            {{ $item->UsedOrNew == '2' ? 'selected' : '' }}>New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach



                                    <div id="additionalProductrow{{$AdditionalProductsIndex}}" class="row">
                                        <div class="col-12">
                                            <h5>Additional Product {{$AdditionalProductsIndex}}</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductName{{$AdditionalProductsIndex}}">Enter Name</label>
                                                <input type="text" id="additionalProductName{{$AdditionalProductsIndex}}"
                                                    name="additionalProductName{{$AdditionalProductsIndex}}"
                                                    class="form-control additionalProductName"
                                                    placeholder="Product Title">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductCategory{{$AdditionalProductsIndex}}">Product Category</label>
                                                <select id="additionalProductCategory{{$AdditionalProductsIndex}}" name="additionalProductCategory{{$AdditionalProductsIndex}}"
                                                    class="form-control additionalProductCategory">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductBrand{{$AdditionalProductsIndex}}">Product Brand</label>
                                                <select id="additionalProductBrand{{$AdditionalProductsIndex}}" name="additionalProductBrand{{$AdditionalProductsIndex}}"
                                                    class="form-control additionalProductBrand">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductUsedOrNew{{$AdditionalProductsIndex}}">Used Or New?</label>
                                                <select id="additionalProductUsedOrNew{{$AdditionalProductsIndex}}"
                                                    name="additionalProductUsedOrNew{{$AdditionalProductsIndex}}"
                                                    class="form-control additionalProductUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 col-md mb-3">
                                    <button type="button" class="btn btn-primary" id="addMoreadditionalProductsBtn">Add
                                        More
                                        Products</button>
                                </div>
                            </div>
                        @endif
                        @if ($product->productCategory == '5')
                            <div id="additionalRequirements" class="mt-5">
                                <h2>Additional Requirements:</h2>
                                <div class="row">
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="ramGeneration">RAM Generation</label>
                                            <select id="ramGeneration" name="ramGeneration" class="form-control"
                                                required="">
                                                <option value="0" selected="">Please Select RAM Generation
                                                </option>
                                                <option value="1"
                                                    {{ $product->otherSingleProducts[0]->Type == 1 ? 'selected' : '' }}>
                                                    DDR2</option>
                                                <option value="2"
                                                    {{ $product->otherSingleProducts[0]->Type == 2 ? 'selected' : '' }}>
                                                    DDR3</option>
                                                <option value="3"
                                                    {{ $product->otherSingleProducts[0]->Type == 3 ? 'selected' : '' }}>
                                                    DDR4</option>
                                                <option value="4"
                                                    {{ $product->otherSingleProducts[0]->Type == 4 ? 'selected' : '' }}>
                                                    DDR5</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="ramClockSpeed">Clock Speed</label>
                                            <input type="text" id="ramClockSpeed" name="ramClockSpeed" required=""
                                                class="form-control" placeholder="Eg. 3200 MHz"
                                                value="{{ $product->otherSingleProducts[0]->RRCS }}">
                                        </div>
                                    </div>

                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="ramSize">RAM Size</label>
                                            <input type="text" id="ramSize" name="ramSize" required=""
                                                class="form-control" placeholder="Eg. 8GB"
                                                value="{{ $product->otherSingleProducts[0]->size }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($product->productCategory == '6')
                            <div id="additionalRequirements" class="mt-5">
                                <h2>Additional Requirements:</h2>
                                <div class="row">
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="storageType">Storage Type</label>
                                            <select id="storageType" name="storageType" class="form-control"
                                                required="">
                                                <option value="0">Please Select Storage Type</option>
                                                <option value="1"
                                                    {{ $product->otherSingleProducts[0]->Type == '1' ? 'selected' : '' }}>
                                                    HDD</option>
                                                <option value="2"
                                                    {{ $product->otherSingleProducts[0]->Type == '2' ? 'selected' : '' }}>
                                                    SSD</option>
                                                <option value="3"
                                                    {{ $product->otherSingleProducts[0]->Type == '3' ? 'selected' : '' }}>
                                                    NVMe</option>
                                                <option value="4"
                                                    {{ $product->otherSingleProducts[0]->Type == '4' ? 'selected' : '' }}>
                                                    M.2</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="storageSize">Storage Size</label>
                                            <input type="text" id="storageSize" name="storageSize" required=""
                                                class="form-control" placeholder="Eg. 500GB"
                                                value="{{ $product->otherSingleProducts[0]->size }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($product->productCategory == '11')
                            <div id="additionalRequirements" class="mt-5">
                                <h2>Additional Requirements:</h2>
                                <div class="row">
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="monitorPanelType">Panel Type</label>
                                            <select id="monitorPanelType" name="monitorPanelType" class="form-control"
                                                required="">
                                                <option value="0">Please Select Panel Type</option>
                                                <option value="1"
                                                    {{ $product->otherSingleProducts[0]->Type == '1' ? 'selected' : '' }}>
                                                    IPS</option>
                                                <option value="2"
                                                    {{ $product->otherSingleProducts[0]->Type == '2' ? 'selected' : '' }}>
                                                    VA</option>
                                                <option value="3"
                                                    {{ $product->otherSingleProducts[0]->Type == '3' ? 'selected' : '' }}>
                                                    TN</option>
                                                <option value="4"
                                                    {{ $product->otherSingleProducts[0]->Type == '4' ? 'selected' : '' }}>
                                                    Simple LCD</option>
                                                <option value="5"
                                                    {{ $product->otherSingleProducts[0]->Type == '5' ? 'selected' : '' }}>
                                                    Simple LED</option>
                                                <option value="6"
                                                    {{ $product->otherSingleProducts[0]->Type == '6' ? 'selected' : '' }}>
                                                    OLED</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="monitorRefreshRate">Refresh Rate</label>
                                            <select id="monitorRefreshRate" name="monitorRefreshRate"
                                                class="form-control" required="">
                                                <option value="0"
                                                    {{ $product->otherSingleProducts[0]->Type == '0' ? 'selected' : '' }}>
                                                    Please Select Refresh Rate</option>
                                                <option value="1"
                                                    {{ $product->otherSingleProducts[0]->Type == '1' ? 'selected' : '' }}>
                                                    60Hz</option>
                                                <option value="2"
                                                    {{ $product->otherSingleProducts[0]->Type == '2' ? 'selected' : '' }}>
                                                    75Hz</option>
                                                <option value="3"
                                                    {{ $product->otherSingleProducts[0]->Type == '3' ? 'selected' : '' }}>
                                                    100Hz</option>
                                                <option value="4"
                                                    {{ $product->otherSingleProducts[0]->Type == '4' ? 'selected' : '' }}>
                                                    120Hz</option>
                                                <option value="5"
                                                    {{ $product->otherSingleProducts[0]->Type == '5' ? 'selected' : '' }}>
                                                    144Hz</option>
                                                <option value="6"
                                                    {{ $product->otherSingleProducts[0]->Type == '6' ? 'selected' : '' }}>
                                                    165Hz</option>
                                                <option value="7"
                                                    {{ $product->otherSingleProducts[0]->Type == '7' ? 'selected' : '' }}>
                                                    180Hz</option>
                                                <option value="8"
                                                    {{ $product->otherSingleProducts[0]->Type == '8' ? 'selected' : '' }}>
                                                    240Hz</option>
                                                <option value="9"
                                                    {{ $product->otherSingleProducts[0]->Type == '9' ? 'selected' : '' }}>
                                                    360Hz</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="monitorSize">Size</label>
                                            <input type="text" id="monitorSize" name="monitorSize" required=""
                                                class="form-control" placeholder="Eg. 22 inches"
                                                value="{{ $product->otherSingleProducts[0]->size }}">
                                        </div>
                                    </div>

                                    <div class="col-md col-sm-12">
                                        <div class="form-group">
                                            <label for="monitorModelNo">Model No. (optional)</label>
                                            <input type="text" id="monitorModelNo" name="monitorModelNo"
                                                class="form-control" placeholder="Eg. XL2546K"
                                                value="{{ $product->otherSingleProducts[0]->modelNo }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif



                        @if (!$product->ProductType == '4')
                            <div class="form-group" id="aboutThisItemContainer">
                                <label for="AboutThisItem">About this item</label>

                                @if (old('AboutThisitem') || $product->AboutThisitem)
                                    @php
                                        $aboutThisItem =
                                            json_decode(old('AboutThisitem', '[]')) ?:
                                            json_decode($product->AboutThisitem, '[]');
                                    @endphp

                                    @foreach ($aboutThisItem as $data)
                                        @if ($data != null)
                                            <input type="text" id="AboutThisItem"
                                                class="form-control mb-2 AboutThisItem" placeholder="About This Item"
                                                value="{{ $data }}">
                                        @endif
                                    @endforeach
                                @endif
                                <input type="text" id="AboutThisItem" class="form-control AboutThisItem"
                                    placeholder="About This Item">
                                <button type="button" class="btn btn-primary mt-2" id="addMoreBtn"
                                    onclick="addMoreAbout()">Add More</button>
                                <input type="hidden" id="aboutThisItemhidden" name="AboutThisitem">
                                @error('AboutThisitem')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                        @endif



                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            @error('productDescription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea name="productDescription" value="{{ old('productDescription') ?? $product->productDescription }}"
                                id="productDescription" class="form-control" style="height: 400px;"
                                placeholder="Enter Your Product Description, For A+ Content Just Paste HTML Content Here.">{{ old('productDescription') ?? $product->productDescription }}</textarea>
                        </div>



                        <div class="row">
                            <div class="col-md col-sm-6">
                                <label for="mainImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('user_folders/Product_Images/' . $product->mainImage) ?? asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="mainImage"
                                            id="mainImage">
                                        <label class="custom-file-label" for="mainImage">Choose file</label>
                                    </div>
                                    @error('mainImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md col-sm-6">
                                <label for="firstImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ $product->firstImage ? asset('user_folders/Product_Images/' . $product->firstImage) : asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="firstImage"
                                            id="firstImage">
                                        <label class="custom-file-label" for="firstImage">Choose file</label>
                                    </div>
                                    @error('firstImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md col-sm-6">
                                <label for="secondImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ $product->secondImage ? asset('user_folders/Product_Images/' . $product->secondImage) : asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="secondImage"
                                            id="secondImage">
                                        <label class="custom-file-label" for="secondImage">Choose file</label>
                                    </div>
                                    @error('secondImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md col-sm-6">
                                <label for="thirdImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ $product->thirdImage ? asset('user_folders/Product_Images/' . $product->thirdImage) : asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="thirdImage"
                                            id="thirdImage">
                                        <label class="custom-file-label" for="thirdImage">Choose file</label>
                                    </div>
                                    @error('thirdImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md col-sm-6">
                                <label for="fourthImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ $product->fourthImage ? asset('user_folders/Product_Images/' . $product->fourthImage) : asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="fourthImage"
                                            id="fourthImage">
                                        <label class="custom-file-label" for="fourthImage">Choose file</label>
                                    </div>
                                    @error('fourthImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>
                            <div class="col-md col-sm-6">
                                <label for="fifthImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ $product->fifthImage ? asset('user_folders/Product_Images/' . $product->fifthImage) : asset('assets/images/media/default.webp') }}"
                                        alt="Error" class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="fifthImage"
                                            id="fifthImage">
                                        <label class="custom-file-label" for="fifthImage">Choose file</label>
                                    </div>
                                    @error('fifthImage')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </label>
                            </div>

                        </div>

                        <button class="btn btn-primary mt-3 w-100" id="uploadProduct">Upload Product</button>
                    </form>
                </div>
                <!-- end card-body-->
            </div>
            <!-- end row-->




        </div> <!-- container-fluid -->
    </div>
@endsection
