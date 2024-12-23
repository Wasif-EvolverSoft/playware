@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add New Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item ">All Products</li>
                                <li class="breadcrumb-item active">Add New Product</li>
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
                                    <select name="ProductType" class="form-control" id="ProductType">
                                        <option value="0" selected>Select Your Product Type</option>
                                        <option value="1" {{ old('ProductType') == '1' ? 'selected' : '' }}>Sell A Used
                                            Product</option>
                                        <option value="2" {{ old('ProductType') == '2' ? 'selected' : '' }}>Sell a New
                                            Product</option>
                                        <option value="4" {{ old('ProductType') == '4' ? 'selected' : '' }}>Complete
                                            PCs</option>
                                        <option value="5" {{ old('ProductType') == '5' ? 'selected' : '' }}>Laptops
                                        </option>
                                    </select>

                                    @error('ProductType')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productTitle">Product Title</label>
                                    <input type="text" value="{{ old('productTitle') }}" id="productTitle"
                                        name="productTitle" class="form-control"
                                        placeholder="Brand + Product Type + Color + Material Eg. Adidas T20 Shoes red leather">
                                    @error('productTitle')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>




                        <div class="row" id="productTypeData">
                            <div id="productCategoryDiv" class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productCategory">Product Category</label>
                                    <select name="productCategory" class="form-control" id="productCategory">
                                        <option value="" selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <x-categories-select :category="$category" :oldValue="old('productCategory')" />
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
                                                {{ old('brandName') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="custom-control mt-2 custom-checkbox checkbox-primary">
                                        <input type="checkbox" name="thisBrandDoesNotHaveProduct"
                                            class="custom-control-input"
                                            {{ old('thisBrandDoesNotHaveProduct') == 'on' ? 'checked' : '' }}
                                            id="checkbox-signin">
                                        <label class="custom-control-label" for="checkbox-signin">This Product Does Not Have
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

                                    </select>

                                    @error('yearOfProduct')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>


                        </div>

                        <div class="row" id="productReasonAndWarrantyDiv">
                            <div class="col-md col-sm-12" id="warrantyDiv">
                                <div class="form-group">
                                    <label for="warranty">Check warranty</label>
                                    <select name="warranty" id="warranty" class="form-control">
                                        <option value="" selected>Please Select Warranty</option>

                                    </select>
                                    @error('warranty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12" id="reasonForSellingDiv">
                                <div class="form-group">
                                    <label for="reason">Reason for Selling (Optional)</label>
                                    <input type="text" class="form-control" name="reason" id="reasonForSelling">
                                </div>
                            </div>

                            <div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>

                            <div class="col-md col-sm-12 d-none" id="laptopUsedOrNotDiv"></div>

                        </div>

                        <div id="explainRepairingDiv" class="d-none">

                        </div>

                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productQuantity">Product Quantity</label>
                                    <input type="number" id="productQuantity" value="{{ old('productQuantity') }}"
                                        name="productQuantity" class="form-control" placeholder="Eg. 50">
                                    @error('productQuantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productSku">Product SKU</label>
                                    <input type="text" id="productSku" value="{{ old('productSku') }}"
                                        name="productSku" class="form-control"
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
                                        placeholder="Eg. 1500" value="{{ old('originalPrice') }}">
                                    @error('originalPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="sellPrice">Sale Price (Leave Empty If Not On Sale)</label>
                                    <input type="number" id="sellPrice" name="sellPrice" class="form-control"
                                        placeholder="Eg. 1200" value="{{ old('sellPrice') }}">
                                    @error('sellPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="completePCparts" class="d-none mt-5"></div>

                        <div id="additionalPCparts" class="row d-none mt-5"></div>

                        <div id="additionalProducts" class="row d-none mt-5"></div>


                        <div id="additionalRequirements" class="d-none mt-5"></div>



                        <div class="form-group" id="aboutThisItemContainer">
                            <label for="AboutThisItem">About this item</label>

                            @if (old('AboutThisitem'))
                                @php
                                    $AboutThisItem = json_decode(old('AboutThisitem'));
                                @endphp

                                @foreach ($AboutThisItem as $data)
                                    @if ($data != null)
                                        <input type="text" id="AboutThisItem" class="form-control mb-2 AboutThisItem"
                                            placeholder="About This Item" value="{{ $data }}">
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



                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            @error('productDescription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea name="productDescription" value="{{ old('productDescription') }}" id="productDescription"
                                class="form-control" style="height: 400px;"
                                placeholder="Enter Your Product Description, For A+ Content Just Paste HTML Content Here.">{{ old('productDescription') }}</textarea>
                            <p>You Can Use This Editor For Your <a href="#">A+ Content.</a></p>
                        </div>



                        <div class="row">
                            <div class="col-md col-sm-6">
                                <label for="mainImage"
                                    class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="mainImage" id="mainImage">
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
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
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
                                    <img src="{{ asset('assets/images/media/default.webp') }}" alt="Error"
                                        class="img-fluid">
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
@section('additionScript')
    <script>
        let images = document.querySelectorAll('.custom-file-input');
        images.forEach(input => {
            input.onchange = function() {
                let container = input.parentElement.parentElement;
                let img = container.querySelector('img');
                let label = container.querySelector('label');
                if (label) {
                    // label.style.display = 'none';
                }
                img.src = window.URL.createObjectURL(input.files[0]);
            };
        });






        let isMoreThanSeven = 1; // You forgot to declare this variable with `let`

        function isMoreThanSevenFunc() {
            let AboutThisItem = document.querySelectorAll('.AboutThisItem');

            if (AboutThisItem.length >= 7) { // Changed the condition to `>=` to include 7 items
                addMoreBtn.style.display = 'none'; // Hides the button
            }
        }


        function addMoreAbout() {
            if (isMoreThanSeven < 7) {
                let input = document.createElement('input');
                input.classList.add('form-control', 'AboutThisItem', 'mt-2');
                input.placeholder = 'About This Item';
                let addMoreBtn = document.querySelector('#addMoreBtn');
                let Container = document.querySelector('#aboutThisItemContainer');
                Container.insertBefore(input, addMoreBtn);
                isMoreThanSeven += 1;
                isMoreThanSevenFunc(); // Corrected function call
            }

        }
        // Initial check when the page loads
        isMoreThanSevenFunc();


        var uploadProductForm = document.querySelector('form[action="{{ route('auth.uploadProduct') }}"]');
        uploadProductForm.addEventListener('submit', function(e) {
            let ProductType = $('#ProductType').val();
            if (ProductType == 1 || ProductType == 2) {
                e.preventDefault();

                let AboutThisItem = document.querySelectorAll('.AboutThisItem');
                let aboutThisItemhidden = document.querySelector('#aboutThisItemhidden');
                let AboutThisItemValues = [];

                AboutThisItem.forEach(e => {
                    AboutThisItemValues.push(e.value);
                });

                let itemPointsJSON = JSON.stringify(AboutThisItemValues);
                aboutThisItemhidden.value = itemPointsJSON;

                this.submit();
            }
        });





        let brandNameInput = document.getElementById('brandName');
        let noBrandCheckbox = document.getElementById('checkbox-signin');

        noBrandCheckbox.addEventListener('change', function() {
            if (noBrandCheckbox.checked) {
                brandNameInput.readOnly = true;
            } else {
                brandNameInput.readOnly = false;
            }
        });

        let countStorage = 2
        let countAdditionalPCParts = 2
        let countLaptopStorage = 2
        let countAdditionalProducts = 2


        $(document).ready(function() {
            $('#VariationCheckBox').on('change', function() {
                if ($(this).prop('checked') == true) {
                    var getVariations = `
              <div class='container-fluid row'>
              <div class="col-2">
                          <div class="form-group">
                              <label for="ColorVariation">Enter Color</label>
                              <input type="text" id="ColorVariation" name="ColorVariation0" class="form-control"
                                  placeholder="Eg. Red, Blue, Green">
                          </div>

                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="SizeVariation">Enter Size</label>
                              <input type="text" id="SizeVariation" name="SizeVariation0" class="form-control"
                                  placeholder="Eg. Small, Medium, Large">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="MaterialVariation">Material</label>
                              <input type="text" id="MaterialVariation" name="MaterialVariation0" class="form-control"
                                  placeholder="Eg. Plastic, Silicone, Metal">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Style">Style</label>
                              <input type="text" id="Style" name="Style0" class="form-control"
                                  placeholder="Eg. Red, Blue, Green">
                          </div>
                      </div>
                      <div class="col-1 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Quanatity">Quanatity</label>
                              <input type="text" id="Quanatity" name="Quanatity0" class="form-control"
                                  placeholder="Eg. 10, 20, 30">
                          </div>
                      </div>
                      <div class="col-1 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Price">Price</label>
                              <input type="text" id="Price" name="Price0" class="form-control"
                                  placeholder="Eg. 10, 20, 30">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                                      <label>Choose Image</label>
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name='variationImage0' id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                  </div>
                      </div>
                  </div>
                      `
                    $('#getVariations').html(getVariations);
                    $('#getVariations').append(
                        `<div class='container-fluid mb-4 mt-0' id='addVaritionbtn'><span id='addVarition' class='btn btn-primary'>Add More</span></div>`
                    )
                } else {
                    $('#getVariations').html('');
                }
            });
            var count = 1;
            $(document).on('click', '#addVarition', function() {
                var getVariations = `
              <div class='container-fluid row'>
              <div class="col-2">
                          <div class="form-group">
                              <label for="ColorVariation">Enter Color</label>
                              <input type="text" id="ColorVariation" name="ColorVariation${count}" class="form-control"
                                  placeholder="Eg. Red, Blue, Green">
                          </div>

                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="SizeVariation">Enter Size</label>
                              <input type="text" id="SizeVariation" name="SizeVariation${count}" class="form-control"
                                  placeholder="Eg. Small, Medium, Large">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="MaterialVariation">Material</label>
                              <input type="text" id="MaterialVariation" name="MaterialVariation${count}" class="form-control"
                                  placeholder="Eg. Plastic, Silicone, Metal">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Style">Style</label>
                              <input type="text" id="Style" name="Style${count}" class="form-control"
                                  placeholder="Eg. Red, Blue, Green">
                          </div>
                      </div>
                      <div class="col-1 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Quanatity">Quanatity</label>
                              <input type="text" id="Quanatity" name="Quanatity${count}" class="form-control"
                                  placeholder="Eg. 10, 20, 30">
                          </div>
                      </div>
                      <div class="col-1 d-flex flex-column justify-content-end">
                          <div class="form-group">
                              <label for="Price">Price</label>
                              <input type="text" id="Price" name="Price${count}" class="form-control"
                                  placeholder="Eg. 10, 20, 30">
                          </div>
                      </div>
                      <div class="col-2 d-flex flex-column justify-content-end">
                          <div class="form-group">
                                      <label>Choose Image</label>
                                      <div class="custom-file">
                                          <input type="file" class="custom-file-input" name='variationImage${count}' id="customFile">
                                          <label class="custom-file-label" for="customFile">Choose file</label>
                                      </div>
                                  </div>
                      </div>
                  </div>
                      `
                $('#addVaritionbtn').before(getVariations);
                count++;
            })

            $('#ProductType').change(function() {
                var usedProducts = `
                  <option value='1 Week'>1 Week</option>
                  <option value='1 Month'>1 Month</option>
                  <option value='3 Months'>3 Months</option>
              `;
                var newProduct = `
                  <option value='6 Months'>6 Months</option>
                  <option value='1 Year'>1 Year</option>
                  <option value='2 Years'>2 Years</option>
                  <option value='3 Years'>3 Years</option>
              `;
                var laptop = `
                  <option value='1 Week'>1 Week</option>
                  <option value='1 Month'>1 Month</option>
                  <option value='3 Months'>3 Months</option>
                  <option value='6 Months'>6 Months</option>
                  <option value='1 Year'> 1 Year</option>
              `;

                var productTypeData = ``;

                let yearOfProduct = document.getElementById('yearOfProduct')

                let years;
                let currentYear = new Date().getFullYear()
                let yearValue = 1

                for (let index = 2010; index <= currentYear; index++) {
                    years += `<option value='${yearValue}'>${index}</option>`;
                    yearValue++;
                }

                $('#repairedProductDiv').addClass('d-none')
                $('#repairedProductDiv').empty();
                $('#explainRepairingDiv').addClass('d-none');
                $('#explainRepairingDiv').empty();




                if (this.value == '1') {

                    countStorage = 2;
                    countLaptopStorage = 2;
                    countAdditionalPCParts = 2;
                    countAdditionalProducts = 2;

                    let brandNameDiv = document.getElementById('brandNameDiv')
                    let productCategoryDiv = document.getElementById('productCategoryDiv')

                    if (!brandNameDiv && !productCategoryDiv) {
                        $('#productTypeData').empty()
                        $('#productTypeData').append(`
                      <div id="productCategoryDiv" class="col-md col-sm-12">
                          <div class="form-group">
                              <label for="productCategory">Product Category</label>
                              <select name="productCategory" class="form-control" id="productCategory">
                                  <option value="" selected>Select Category</option>
                                  @foreach ($categories as $category)
                                      <x-categories-select :category="$category" />
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
                                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                              </select>

                              <div class="custom-control mt-2 custom-checkbox checkbox-primary">
                                  <input type="checkbox" name="thisBrandDoesNotHaveProduct"
                                      class="custom-control-input"
                                      {{ old('thisBrandDoesNotHaveProduct') == 'on' ? 'checked' : '' }}
                                      id="checkbox-signin">
                                  <label class="custom-control-label" for="checkbox-signin">This Product Does Not Have
                                      Brand
                                      Name.</label>
                                  @error('brandName')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                      </div>

                      <div class="col-md col-sm-12" id="selectProductYear">
                          <div class="form-group">
                              <label for="yearOfProduct">Year-Make of Product</label>

                              <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                  <option value="0" selected>Select Year/Make of Your Product</option>

                              </select>
                          </div>



                      </div>`)

                        $('#productReasonAndWarrantyDiv').empty();
                        $('#productReasonAndWarrantyDiv').append(`<div class="col-md col-sm-12" id="warrantyDiv">
                          <div class="form-group">
                              <label for="warranty">Check warranty</label>
                              <select name="warranty" id="warranty" class="form-control">
                                  <option value="" selected>Please Select Warranty</option>

                              </select>
                              @error('warranty')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="reasonForSellingDiv">
                          <div class="form-group">
                              <label for="reason">Reason for Selling (Optional)</label>
                              <input type="text" class="form-control" name="reason" id="reasonForSelling">
                          </div>
                      </div>
                      <div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>
              `);

                    }


                    $('#warranty').empty();
                    $('#warranty').html(
                        '<option value="" selected>Please Select Warranty</option>');
                    $('#warranty').append(usedProducts);

                    $('#yearOfProduct').empty();
                    $('#yearOfProduct').html(
                        '<option value="" selected>Please Select Year/Make of Product</option>');
                    $('#yearOfProduct').append(years);

                    $('#repairedProductDiv').removeClass('d-none');
                    $('#repairedProductDiv').empty();
                    $('#repairedProductDiv').html(
                        `<div class="form-group">
                              <label for="repaired">Is Product Repaired/Opened?</label>
                              <select name="repaired" id="repaired" class="form-control">
                                  <option value="">Please Select</option>
                                  <option value="1">Yes</option>
                                  <option value="2">No</option>
                              </select>
                              @error('repaired')
                                  <span class='text-danger'>{{ $message }}</span>
                              @enderror
                          </div>`
                    );


                    $('#productCategory').change(function() {

                        if (this.value == "11") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorPanelType">Panel Type</label>
                                          <select id="monitorPanelType" name="monitorPanelType" class="form-control" required>
                                              <option value="0">Please Select Panel Type</option>
                                              <option value="1">IPS</option>
                                              <option value="2">VA</option>
                                              <option value="3">TN</option>
                                              <option value="4">Simple LCD</option>
                                              <option value="5">Simple LED</option>
                                              <option value="6">OLED</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorRefreshRate">Refresh Rate</label>
                                          <select id="monitorRefreshRate" name="monitorRefreshRate" class="form-control" required>
                                              <option value="0">Please Select Refresh Rate</option>
                                              <option value="1">60Hz</option>
                                              <option value="2">75Hz</option>
                                              <option value="3">100Hz</option>
                                              <option value="4">120Hz</option>
                                              <option value="5">144Hz</option>
                                              <option value="6">165Hz</option>
                                              <option value="7">180Hz</option>
                                              <option value="8">240Hz</option>
                                              <option value="9">360Hz</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorSize">Size</label>
                                          <input type="text" id="monitorSize" name="monitorSize" required
                                              class="form-control" placeholder="Eg. 22 inches">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorModelNo">Model No. (optional)</label>
                                          <input type="text" id="monitorModelNo" name="monitorModelNo"
                                              class="form-control" placeholder="Eg. XL2546K">
                                      </div>
                                  </div>
                              </div>`);

                        } else if (this.value == "5") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramGeneration">RAM Generation</label>
                                          <h2>Hello {{ old('ramGeneration') }}</h2>
                                          <select id="ramGeneration"  name="ramGeneration" class="form-control" required>
                                              <option value="0" @if (old('ramGeneration') == 0) Selected @endif>Please Select RAM Generation</option>
                                              <option value="1" @if (old('ramGeneration') == 1) Selected @endif>DDR2</option>
                                              <option value="2" @if (old('ramGeneration') == 2) Selected @endif>DDR3</option>
                                              <option value="3" @if (old('ramGeneration') == 3) Selected @endif>DDR4</option>
                                              <option value="4" @if (old('ramGeneration') == 4) Selected @endif>DDR5</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramClockSpeed">Clock Speed</label>
                                          <input type="text" value="{{ old('ramClockSpeed') }}" id="ramClockSpeed" name="ramClockSpeed" required
                                              class="form-control" placeholder="Eg. 3200 MHz">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramSize">RAM Size</label>
                                          <input type="text" value="{{ old('ramSize') }}" id="ramSize" name="ramSize" required
                                              class="form-control" placeholder="Eg. 8GB">
                                      </div>
                                  </div>
                              </div>`);

                        } else if (this.value == "6") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageType">Storage Type</label>
                                          <select id="storageType" value="{{ old('storageType') }}" name="storageType" class="form-control" required>
                                              <option value="0">Please Select Storage Type</option>
                                              <option value="1">HDD</option>
                                              <option value="2">SSD</option>
                                              <option value="3">NVMe</option>
                                              <option value="4">M.2</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageSize">Storage Size</label>
                                          <input type="text" id="storageSize" value="{{ old('storageSize') }}" name="storageSize" required
                                              class="form-control" placeholder="Eg. 500GB">
                                      </div>
                                  </div>`);

                        } else {

                            $('#additionalRequirements').addClass('d-none');
                            $('#additionalRequirements').empty();
                        }
                    })


                    $('#repaired').change(function() {

                        if (this.value == "1") {
                            $('#explainRepairingDiv').removeClass('d-none');
                            $('#explainRepairingDiv').html(
                                `<div class="form-group">
                              <label for="explainAboutRepairing">Explain Why Is The Product Repaired/Opened?</label>
                              <textarea class="form-control" rows="4" name="explainAboutRepairing" id="explainAboutRepairing" placeholder="Because of dust..." required></textarea>
                      </div>`
                            );

                        } else {
                            $('#explainRepairingDiv').addClass('d-none');
                            $('#explainRepairingDiv').empty();
                        }

                    });

                    $('#completePCparts').addClass('d-none')
                    $("#completePCparts").empty()

                    $('#additionalPCparts').addClass('d-none');
                    $('#additionalPCparts').empty();

                    $('#additionalProducts').addClass('d-none');
                    $('#additionalProducts').empty();


                    $('#aboutThisItemContainer').empty();
                    $('#aboutThisItemContainer').append(`
              <label for="AboutThisItem">About this item</label>
                      <input type="text" id="AboutThisItem" class="form-control AboutThisItem"
                          placeholder="About This Item">
                      <button type="button" onclick="addMoreAbout()" class="btn btn-primary mt-2" id="addMoreBtn">Add More</button>
                      <input type="hidden" id="aboutThisItemhidden" name="AboutThisitem">
                      @error('AboutThisitem')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (old('AboutThisitem'))
                          @php
                              $AboutThisItem = json_decode(old('AboutThisitem'));
                              //
                          @endphp

                          @foreach ($AboutThisItem as $data)
                              <input type="text" id="AboutThisItem" class="form-control mt-2 AboutThisItem"
                                  placeholder="About This Item" value="{{ $data }}">
                          @endforeach
                      @endif
              `);

                }

                if (this.value == '2') {

                    countLaptopStorage = 2;
                    countStorage = 2;
                    countAdditionalPCParts = 2;
                    countAdditionalProducts = 2;

                    let brandNameDiv = document.getElementById('brandNameDiv')
                    let productCategoryDiv = document.getElementById('productCategoryDiv')

                    if (!brandNameDiv && !productCategoryDiv) {
                        $('#productTypeData').empty()
                        $('#productTypeData').append(`
                      <div id="productCategoryDiv" class="col-md col-sm-12">
                          <div class="form-group">
                              <label for="productCategory">Product Category</label>
                              <select name="productCategory" class="form-control" id="productCategory">
                                  <option value="" selected>Select Category</option>
                                  @foreach ($categories as $category)
                                      <x-categories-select :category="$category" />
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
                                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach
                              </select>

                              <div class="custom-control mt-2 custom-checkbox checkbox-primary">
                                  <input type="checkbox" name="thisBrandDoesNotHaveProduct"
                                      class="custom-control-input"
                                      {{ old('thisBrandDoesNotHaveProduct') == 'on' ? 'checked' : '' }}
                                      id="checkbox-signin">
                                  <label class="custom-control-label" for="checkbox-signin">This Product Does Not Have
                                      Brand
                                      Name.</label>
                                  @error('brandName')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                          </div>
                      </div>

                      <div class="col-md col-sm-12" id="selectProductYear">
                          <div class="form-group">
                              <label for="yearOfProduct">Year-Make of Product</label>

                              <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                  <option value="0" selected>Select Year/Make of Your Product</option>

                              </select>
                          </div>



                      </div>`)

                        $('#productReasonAndWarrantyDiv').empty();
                        $('#productReasonAndWarrantyDiv').append(`<div class="col-md col-sm-12" id="warrantyDiv">
                          <div class="form-group">
                              <label for="warranty">Check warranty</label>
                              <select name="warranty" id="warranty" class="form-control">
                                  <option value="" selected>Please Select Warranty</option>

                              </select>
                              @error('warranty')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="reasonForSellingDiv">
                          <div class="form-group">
                              <label for="reason">Reason for Selling (Optional)</label>
                              <input type="text" class="form-control" name="reason" id="reasonForSelling">
                          </div>
                      </div>
                      <div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>
              `);
                    }
                    $('#warranty').empty();
                    $('#warranty').html(
                        '<option value="" selected>Please Select Warranty</option>');
                    $('#warranty').append(newProduct);

                    $('#yearOfProduct').empty();
                    $('#yearOfProduct').html(
                        '<option value="" selected>Please Select Year/Make of Product</option>');
                    $('#yearOfProduct').append(years);


                    $('#repairedProductDiv').addClass('d-none')
                    $('#repairedProductDiv').empty();

                    $('#explainRepairingDiv').addClass('d-none');
                    $('#explainRepairingDiv').empty();

                    $('#completePCparts').addClass('d-none')
                    $("#completePCparts").empty()

                    $('#additionalPCparts').addClass('d-none');
                    $('#additionalPCparts').empty();

                    $('#additionalProducts').addClass('d-none');
                    $('#additionalProducts').empty();



                    $('#productCategory').change(function() {
                        if (this.value == "11") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorPanelType">Panel Type</label>
                                          <select id="monitorPanelType" name="monitorPanelType" class="form-control" required>
                                              <option value="0">Please Select Panel Type</option>
                                              <option value="1">IPS</option>
                                              <option value="2">VA</option>
                                              <option value="3">TN</option>
                                              <option value="4">Simple LCD</option>
                                              <option value="5">Simple LED</option>
                                              <option value="6">OLED</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorRefreshRate">Refresh Rate</label>
                                          <select id="monitorRefreshRate" name="monitorRefreshRate" class="form-control" required>
                                              <option value="0">Please Select Refresh Rate</option>
                                              <option value="1">60Hz</option>
                                              <option value="2">75Hz</option>
                                              <option value="3">100Hz</option>
                                              <option value="4">120Hz</option>
                                              <option value="5">144Hz</option>
                                              <option value="6">165Hz</option>
                                              <option value="6">180Hz</option>
                                              <option value="6">240Hz</option>
                                              <option value="6">360Hz</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorSize">Size</label>
                                          <input type="text" id="monitorSize" name="monitorSize" required
                                              class="form-control" placeholder="Eg. 22 inches">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorModelNo">Model No. (optional)</label>
                                          <input type="text" id="monitorModelNo" name="monitorModelNo"
                                              class="form-control" placeholder="Eg. XL2546K">
                                      </div>
                                  </div>
                              </div>`);

                        } else if (this.value == "5") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramGeneration">RAM Generation</label>
                                          <select id="ramGeneration" name="ramGeneration" class="form-control" required>
                                              <option value="0">Please Select RAM Generation</option>
                                              <option value="1">DDR2</option>
                                              <option value="2">DDR3</option>
                                              <option value="3">DDR4</option>
                                              <option value="4">DDR5</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramClockSpeed">Clock Speed</label>
                                          <input type="text" id="ramClockSpeed" name="ramClockSpeed" required
                                              class="form-control" placeholder="Eg. 3200 MHz">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramSize">RAM Size</label>
                                          <input type="text" id="ramSize" name="ramSize" required
                                              class="form-control" placeholder="Eg. 8GB">
                                      </div>
                                  </div>
                              </div>`);

                        } else if (this.value == "6") {
                            $('#additionalRequirements').removeClass('d-none');
                            $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageType">Storage Type</label>
                                          <select id="storageType" name="storageType" class="form-control" required>
                                              <option value="0">Please Select Storage Type</option>
                                              <option value="1">HDD</option>
                                              <option value="2">SSD</option>
                                              <option value="3">NVMe</option>
                                              <option value="4">M.2</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageSize">Storage Size</label>
                                          <input type="text" id="storageSize" name="storageSize" required
                                              class="form-control" placeholder="Eg. 500GB">
                                      </div>
                                  </div>`);

                        } else {

                            $('#additionalRequirements').addClass('d-none');
                            $('#additionalRequirements').empty();
                        }
                    })



                    $('#aboutThisItemContainer').empty();
                    $('#aboutThisItemContainer').append(`
              <label for="AboutThisItem">About this item</label>
                      <input type="text" id="AboutThisItem" class="form-control AboutThisItem"
                          placeholder="About This Item">
                      <button type="button" onclick="addMoreAbout()" class="btn btn-primary mt-2" id="addMoreBtn">Add More</button>
                      <input type="hidden" id="aboutThisItemhidden" name="AboutThisitem">
                      @error('AboutThisitem')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                      @if (old('AboutThisitem'))
                          @php
                              $AboutThisItem = json_decode(old('AboutThisitem'));
                              //
                          @endphp

                          @foreach ($AboutThisItem as $data)
                              <input type="text" id="AboutThisItem" class="form-control mt-2 AboutThisItem"
                                  placeholder="About This Item" value="{{ $data }}">
                          @endforeach
                      @endif
              `);


                }

                if (this.value == '4') {

                    countLaptopStorage = 2

                    let productReasonAndWarrantyDiv = document.getElementById('productReasonAndWarrantyDiv')
                    productReasonAndWarrantyDiv.innerHTML =
                        `<div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>`


                    document.getElementById("productTypeData").innerHTML = `
              <div class="col-md col-sm-12" id="warrantyDiv">
                          <div class="form-group">
                              <label for="warranty">Check warranty</label>
                              <select name="warranty" id="warranty" class="form-control">
                                  <option value="" selected>Please Select Warranty</option>

                              </select>
                              @error('warranty')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="reasonForSellingDiv">
                          <div class="form-group">
                              <label for="reason">Reason for Selling (Optional)</label>
                              <input type="text" class="form-control" name="reason" id="reasonForSelling">
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="selectProductYear">
                          <div class="form-group">
                              <label for="yearOfProduct">Year-Make of Product</label>

                              <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                  <option value="0" selected>Select Year/Make of Your Product</option>

                              </select>
                          </div>
                      </div>
                      `



                    appendPCParts(); // FUNCTION TO SHOW ALL PC PARTS ON SCREEN
                    addMoreStorageInPcParts(); //FOR ADD MORE STORAGE BUTTON IN PC PARTS


                    appendAdditionalPcParts(); // FUNCTION TO SHOW ADDITIONAL PC PARTS SECTION ON SCREEN
                    addMoreAdditionalPcParts(); //FOR ADD MORE ADDITIONAL PC PARTS BUTTON


                    appendAdditionalProducts(); // FUNCTION TO SHOW ADDITIONAL PRODUCTS SECTION ON SCREEN
                    addMoreAdditionalProducts(); //FOR ADD MORE ADDITIONAL PRODCUTS BUTTON







                    $('#manufacturerAndCountryOfOriginDiv').empty();
                    $('#getVariations').empty();
                    $('#aboutThisItemContainer').empty();

                    $('#warranty').empty();
                    $('#warranty').html(
                        '<option value="" selected>Please Select Warranty</option>');
                    $('#warranty').append(newProduct);

                    $('#yearOfProduct').empty();
                    $('#yearOfProduct').html(
                        '<option value="" selected>Please Select Year/Make of Product</option>'
                    );
                    $('#yearOfProduct').append(years);


                    $('#additionalRequirements').addClass('d-none');
                    $('#additionalRequirements').empty();


                }

                if (this.value == '5') {

                    console.log('selected');

                    countStorage = 2
                    countAdditionalPCParts = 2;
                    countAdditionalProducts = 2;

                    let productReasonAndWarrantyDiv = document.getElementById('productReasonAndWarrantyDiv')
                    productReasonAndWarrantyDiv.innerHTML =
                        `<div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>
                  <div class="col-md col-sm-12 d-none" id="laptopUsedOrNotDiv"></div>`

                    $('#laptopUsedOrNotDiv').removeClass('d-none');
                    $('#laptopUsedOrNotDiv').empty();
                    $('#laptopUsedOrNotDiv').append(`
                                      <div class="form-group">
                                          <label for="laptopUsedOrNew">Used Or New?</label>
                                          <select id="laptopUsedOrNew" name="laptopUsedOrNew"
                                              class="form-control">
                                              <option value="0">Please Select</option>
                                              <option value="1">Used</option>
                                              <option value="2">New</option>
                                          </select>
                                      </div>
                                  `);

                    document.getElementById("productTypeData").innerHTML = `
              <div class="col-md col-sm-12" id="warrantyDiv">
                          <div class="form-group">
                              <label for="warranty">Check warranty</label>
                              <select name="warranty" id="warranty" class="form-control">
                                  <option value="" selected>Please Select Warranty</option>

                              </select>
                              @error('warranty')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="reasonForSellingDiv">
                          <div class="form-group">
                              <label for="reason">Reason for Selling (Optional)</label>
                              <input type="text" class="form-control" name="reason" id="reasonForSelling">
                          </div>
                      </div>
                      <div class="col-md col-sm-12" id="selectProductYear">
                          <div class="form-group">
                              <label for="yearOfProduct">Year-Make of Product</label>

                              <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                                  <option value="0" selected>Select Year/Make of Your Product</option>

                              </select>
                          </div>
                      </div>`




                    appendLaptopParts(); // FUNCTION TO SHOW ALL LAPTOP PARTS ON SCREEN
                    addMoreStorageInLaptop(); // FOR ADDING MORE STORAGE IN LAPTOP PARTS BUTTON

                    $('#warranty').empty();
                    $('#warranty').html(
                        '<option value="" selected>Please Select Warranty</option>');
                    $('#warranty').append(laptop);

                    $('#yearOfProduct').empty();
                    $('#yearOfProduct').html(
                        '<option value="" selected>Please Select Year/Make of Product</option>');
                    $('#yearOfProduct').append(years);

                    $('#repairedProductDiv').removeClass('d-none');
                    $('#repairedProductDiv').empty();
                    $('#repairedProductDiv').html(
                        `<div class="form-group">
                              <label for="repaired">Is Product Repaired/Opened?</label>
                              <select name="repaired" id="repaired" class="form-control">
                                  <option value="">Please Select</option>
                                  <option value="1">Yes</option>
                                  <option value="2">No</option>
                              </select>
                              @error('repaired')
                                  <span class='text-danger'>{{ $message }}</span>
                              @enderror
                          </div>`
                    );


                    $('#repaired').change(function() {

                        if (this.value == "1") {
                            $('#explainRepairingDiv').removeClass('d-none');
                            $('#explainRepairingDiv').html(
                                `<div class="form-group">
                                <label for="explainAboutRepairing">Explain Why Is The Product Repaired/Opened?</label>
                                <textarea class="form-control" rows="4" name="explainAboutRepairing" id="explainAboutRepairing" placeholder="Because of dust..." required></textarea>
                        </div>`
                            );

                        } else {
                            $('#explainRepairingDiv').addClass('d-none');
                            $('#explainRepairingDiv').empty();
                        }

                    });



                    $('#additionalPCparts').addClass('d-none');
                    $('#additionalPCparts').empty();
                    $('#additionalProducts').addClass('d-none');
                    $('#additionalProducts').empty();

                    $('#aboutThisItemContainer').empty();


                    $('#additionalRequirements').addClass('d-none');
                    $('#additionalRequirements').empty();



                }
            });

        })



        // FOR APPENDING PC PARTS
        function appendPCParts() {

            const completePCParts = document.getElementById('completePCparts');
            completePCParts.classList.remove('d-none')

            completePCParts.innerHTML = `<h2>PC Parts:</h2>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Processor:</h4>
                                </div>
                                <div class="col-12">
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="processorName">Enter Name</label>
                                                <input type="text" id="processorName" name="processorName"
                                                    class="form-control" placeholder="Eg. Core i7 10th Gen">
                                                @error('processorName')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="processorBrand">Brand</label>
                                                <select id="processorBrand" name="processorBrand" class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('processorBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('processorBrand')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="processorUsedOrNew">Used Or New?</label>
                                                <select id="processorUsedOrNew" name="processorUsedOrNew"
                                                    class="form-control">
                                                    <option value="0" {{ old('processorUsedOrNew') == '0' ? 'selected' : '' }}>Please Select</option>
                                                    <option value="1" {{ old('processorUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('processorUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('processorUsedOrNew')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardName">Enter Name</label>
                                                <input type="text" id="graphicCardName" name="graphicCardName"
                                                    class="form-control" placeholder="Eg. Gigabyte GTX 1050" value="{{ old('graphicCardName') }}">
                                                @error('graphicCardName')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardBrand">Brand</label>
                                                <select id="graphicCardBrand" name="graphicCardBrand"
                                                    class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('graphicCardBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('graphicCardBrand')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardMemory">Memory</label>
                                                <select id="graphicCardMemory" name="graphicCardMemory"
                                                    class="form-control">
                                                    <option value="0" selected>Please Select Memory</option>
                                                    <option value="1" {{ old('graphicCardMemory') == '1' ? 'selected' : '' }}>1 GB</option>
                                                    <option value="2" {{ old('graphicCardMemory') == '2' ? 'selected' : '' }}>2 GB</option>
                                                    <option value="3" {{ old('graphicCardMemory') == '3' ? 'selected' : '' }}>3 GB</option>
                                                    <option value="4" {{ old('graphicCardMemory') == '4' ? 'selected' : '' }}>4 GB</option>
                                                    <option value="6" {{ old('graphicCardMemory') == '6' ? 'selected' : '' }}>6 GB</option>
                                                    <option value="7" {{ old('graphicCardMemory') == '7' ? 'selected' : '' }}>8 GB</option>
                                                    <option value="8" {{ old('graphicCardMemory') == '8' ? 'selected' : '' }}>12 GB</option>
                                                    <option value="9" {{ old('graphicCardMemory') == '9' ? 'selected' : '' }}>24 GB</option>
                                                </select>
                                                @error('graphicCardMemory')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardUsedOrNew">Used Or New?</label>
                                                <select id="graphicCardUsedOrNew" name="graphicCardUsedOrNew0"
                                                    class="form-control">
                                                    <option value="0" selected>Please Select</option>
                                                    <option value="1" {{ old('graphicCardUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('graphicCardUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('graphicCardUsedOrNew')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardName">Enter Name</label>
                                                <input type="text" id="motherboardName" name="motherboardName"
                                                    class="form-control" placeholder="Eg. MSI B450 TOMAHAWK MAX ATX AM4 " value="{{ old('motherboardName') }}">
                                                    @error('motherboardName')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardBrand">Brand</label>
                                                <select id="motherboardBrand" name="motherboardBrand"
                                                    class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('motherboardBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                                @error('motherboardBrand')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror


                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardUsedOrNew">Used Or New?</label>
                                                <select id="motherboardUsedOrNew" name="motherboardUsedOrNew"
                                                    class="form-control">
                                                    <option value="0">Please Select</option>
                                                    <option value="1" {{ old('motherboardUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('motherboardUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('motherboardUsedOrNew')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramName">Enter Name</label>
                                                <input type="text" id="ramName" name="ramName" class="form-control"
                                                    placeholder="Eg. GSkill 16GB DDR4 " value="{{ old('ramName') }}">
                                                    @error('ramName')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramBrand">Brand</label>
                                                <select id="ramBrand" name="ramBrand" class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('ramBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                    @error('ramBrand')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramMemory">Memory</label>
                                                <select id="ramMemory" name="ramMemory" class="form-control">
                                                    <option value="0">Please Select Memory</option>
                                                    <option value="1" {{ old('ramMemory') == '1' ? 'selected' : '' }}>1 GB</option>
                                                    <option value="2" {{ old('ramMemory') == '2' ? 'selected' : '' }}>2 GB</option>
                                                    <option value="3" {{ old('ramMemory') == '3' ? 'selected' : '' }}>4 GB</option>
                                                    <option value="4" {{ old('ramMemory') == '4' ? 'selected' : '' }}>8 GB</option>
                                                    <option value="5" {{ old('ramMemory') == '5' ? 'selected' : '' }}>16 GB</option>
                                                    <option value="6" {{ old('ramMemory') == '6' ? 'selected' : '' }}>32 GB</option>
                                                    <option value="7" {{ old('ramMemory') == '7' ? 'selected' : '' }}>64 GB</option>
                                                </select>
                                                @error('ramMemory')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramUsedOrNew">Used Or New?</label>
                                                <select id="ramUsedOrNew" name="ramUsedOrNew" class="form-control">
                                                    <option value="0">Please Select</option>
                                                    <option value="1" {{ old('ramUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('ramUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('ramUsedOrNew')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramQuantity">Quantity</label>
                                                <input type="number" id="ramQuantity" name="ramQuantity"
                                                    class="form-control" placeholder="Eg. 2" value="{{ old('ramQuantity') }}">
                                                    @error('ramQuantity')
                                                    <span class='text-danger'>{{ $message }}</span>
                                                @enderror
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
                                    <div id="row1" class='row'>
                                        <div class="col-12">
                                         <h5>storage 1</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageName1">Enter Name</label>
                                                <input type="text" data-id="1" id="storageName1" name="storageName1"
                                                    class="form-control storageName"
                                                    placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageBrand1">Brand</label>
                                                <select id="storageBrand1" data-id="1" name="storageBrand1" class="form-control storageBrand">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageType1">Type</label>
                                                <select id="storageType1" data-id="1" name="storageType1" class="form-control storageType">
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
                                                <label for="storageMemory1">Memory</label>
                                                <select id="storageMemory1" data-id="1" name="storageMemory1" class="form-control storageMemory">
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
                                                <label for="storageUsedOrNew1">Used Or New?</label>
                                                <select id="storageUsedOrNew1" data-id="1" name="storageUsedOrNew1"
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
                                    <button type="button" class="btn btn-primary" id="addMoreStorageBtn">Add More Storage</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>PSU:</h4>
                                </div>
                                <div class="col-12">
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="psuName">Enter Name</label>
                                                <input type="text" id="psuName" name="psuName" class="form-control"
                                                    placeholder="Eg. Corsair CX550 550Watt 80+ Bronze " value="{{ old('psuName') }}">
                                                @error('psuName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="psuBrand">Brand</label>
                                                <select id="psuBrand" name="psuBrand" class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('psuBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('psuBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>

                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="psuWatts">Watts</label>
                                                <select id="psuWatts" name="psuWatts" class="form-control">
                                                    <option value="0">Please Select Watts</option>
                                                    <option value="1" {{ old('psuWatts') == '1' ? 'selected' : '' }} >300 Watts</option>
                                                    <option value="2" {{ old('psuWatts') == '2' ? 'selected' : '' }} >400 Watts</option>
                                                    <option value="3" {{ old('psuWatts') == '3' ? 'selected' : '' }} >450 Watts</option>
                                                    <option value="4" {{ old('psuWatts') == '4' ? 'selected' : '' }} >500 Watts</option>
                                                    <option value="5" {{ old('psuWatts') == '5' ? 'selected' : '' }} >550 Watts</option>
                                                    <option value="6" {{ old('psuWatts') == '6' ? 'selected' : '' }} >600 Watts</option>
                                                    <option value="7" {{ old('psuWatts') == '7' ? 'selected' : '' }} >650 Watts</option>
                                                    <option value="8" {{ old('psuWatts') == '8' ? 'selected' : '' }} >700 Watts</option>
                                                    <option value="9" {{ old('psuWatts') == '9' ? 'selected' : '' }} >750 Watts</option>
                                                    <option value="10" {{ old('psuWatts') == '10' ? 'selected' : '' }} >800 Watts</option>
                                                    <option value="11" {{ old('psuWatts') == '11' ? 'selected' : '' }} >850 Watts</option>
                                                    <option value="12" {{ old('psuWatts') == '12' ? 'selected' : '' }} >900 Watts</option>
                                                    <option value="13" {{ old('psuWatts') == '13' ? 'selected' : '' }} >1000 Watts</option>
                                                    <option value="14" {{ old('psuWatts') == '14' ? 'selected' : '' }} >1200 Watts</option>
                                                    <option value="15" {{ old('psuWatts') == '15' ? 'selected' : '' }} >1500 Watts</option>
                                                </select>
                                                @error('psuWatts')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="psuUsedOrNew">Used Or New?</label>
                                                <select id="psuUsedOrNew" name="psuUsedOrNew" class="form-control">
                                                    <option value="0">Please Select</option>
                                                    <option value="1" {{ old('psuUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('psuUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('psuUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="caseName">Enter Name</label>
                                                <input type="text" id="caseName" name="caseName"
                                                    class="form-control" placeholder="Eg. NZXT H9 Flow Dual-Chamber Mid-Tower Airflow Case" value="{{ old('caseName') }}">
                                                    @error('caseName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="caseBrand">Brand</label>
                                                <select id="caseBrand" name="caseBrand"
                                                    class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('caseBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('caseBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="caseUsedOrNew">Used Or New?</label>
                                                <select id="caseUsedOrNew" name="caseUsedOrNew"
                                                    class="form-control">
                                                    <option value="0">Please Select</option>
                                                    <option value="1" {{ old('caseUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('caseUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('caseUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="coolerName">Enter Name</label>
                                                <input type="text" id="coolerName" name="coolerName"
                                                    class="form-control" placeholder="Eg. XPG VENTO 120 ARGB FAN Case Fan" value="{{ old('coolerName') }}">
                                                    @error('coolerName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="coolerBrand">Brand</label>
                                                <select id="coolerBrand" name="coolerBrand"
                                                    class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ old('coolerBrand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('coolerBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="coolerUsedOrNew">Used Or New?</label>
                                                <select id="coolerUsedOrNew" name="coolerUsedOrNew"
                                                    class="form-control">
                                                    <option value="0">Please Select</option>
                                                    <option value="1" {{ old('coolerUsedOrNew') == '1' ? 'selected' : '' }}>Used</option>
                                                    <option value="2" {{ old('coolerUsedOrNew') == '2' ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('coolerUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`


        }

        // FOR ADDING MORE STORAGE IN PC PARTS
        function addMoreStorageInPcParts() {

            document.getElementById('addMoreStorageBtn').addEventListener('click', function() {




                let newDiv = document.createElement('div');
                newDiv.id = `row${countStorage}`;
                newDiv.className = 'row';
                newDiv.innerHTML = `
                                        <div class="col-12">
                                         <h5>storage ${countStorage}</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageName${countStorage}">Enter Name</label>
                                                <input type="text" id="storageName${countStorage}" data-id="${countStorage}" name="storageName${countStorage}"
                                                    class="form-control storageName"
                                                    placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageBrand${countStorage}">Brand</label>
                                                <select id="storageBrand${countStorage}" data-id="${countStorage}" name="storageBrand${countStorage}" class="form-control storageBrand">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="storageType${countStorage}">Type</label>
                                                <select id="storageType${countStorage}" data-id="${countStorage}" name="storageType${countStorage}" class="form-control storageType">
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
                                                <label for="storageMemory${countStorage}">Memory</label>
                                                <select id="storageMemory${countStorage}" data-id="${countStorage}" name="storageMemory${countStorage}" class="form-control storageMemory">
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
                                        <div class="col-sm-12 col-md w-100 d-flex align-items-center" style="gap:20px;">
                                            <div class="form-group w-100">
                                                <label for="storageUsedOrNew${countStorage}">Used Or New?</label>
                                                <select id="storageUsedOrNew${countStorage}" data-id="${countStorage}" name="storageUsedOrNew${countStorage}"
                                                    class="form-control storageUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                            <button type="button" class="btn btn-danger" style="margin-top:13px;" id="removeStorage${countStorage}" onclick="removeStorage(${countStorage})">Remove</button>
                                        </div>
                                    </div>`

                document.getElementById('storageSpecsDiv').appendChild(newDiv)



                getStorageBrands(countStorage);
                countStorage++

            })



        }


        // Get Complete PC Storage Brands.
        function getStorageBrands(id) {
            var brandNameSelectBox = $(`#storageBrand${id}`);
            let categoryID = 6;
            $.ajax({
                url: "{{ route('seller.getBrandsByCategory') }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    categoryID: categoryID
                },
                success: function(res) {
                    brandNameSelectBox.empty(); // Clear the dropdown first
                    brandNameSelectBox.append(
                        '<option value="" selected>Select Brand</option>');
                    if (res.length > 0) {
                        res.forEach(function(brand) {
                            brandNameSelectBox.append('<option value="' + brand.id +
                                '">' + brand.name + '</option>');
                        });
                    } else {
                        brandNameSelectBox.append(
                            '<option value="">No brands available</option>');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }


        // FOR APPENDING ADDITIONAL PC PARTS
        function appendAdditionalPcParts() {


            const additionalPCparts = document.getElementById('additionalPCparts');

            additionalPCparts.classList.remove('d-none')

            additionalPCparts.innerHTML = `<div class="col-12">
                                <h2>Additional PC Parts:</h2>
                            </div>
                            <input type="hidden" id="additionalPartsData" name="additionalPartsData">
                            <div id="additionalPCpartsSpecs" class="col-12">
                                <div id="additionalPCpartsrow1" class='row'>
                                    <div class="col-12">
                                        <h5>Additional Part 1</h5>
                                    </div>
                                    <div class="col-sm-12 col-md">
                                        <div class="form-group">
                                            <label for="additionalPCpartName1">Enter Name</label>
                                            <input type="text" id="additionalPCpartName1" name="additionalPCpartName1"
                                                class="form-control additionalPCPartName"
                                                placeholder="Eg. Case Fans">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md">
                                        <div class="form-group">
                                            <label for="additionalPCpartUsedOrNew1">Used Or New?</label>
                                            <select id="additionalPCpartUsedOrNew1" name="additionalPCpartUsedOrNew1" class="form-control additionalPCpartUsedOrNew">
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
                                <button type="button" class="btn btn-primary" id="addMoreadditionalPCpartBtn">Add More
                                    Parts</button>
                            </div>`


        }

        // FOR ADDING MORE ADDITIONAL PC PARTS
        function addMoreAdditionalPcParts() {


            document.getElementById('addMoreadditionalPCpartBtn').addEventListener('click', function() {


                if (countAdditionalPCParts <= 5) {


                    let newDiv = document.createElement('div');
                    newDiv.id = `additionalPCpartsrow${countAdditionalPCParts}`;
                    newDiv.className = 'row';
                    newDiv.innerHTML = `
                                            <div class="col-12">
                                                <h5>Additional Part ${countAdditionalPCParts}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                <label for="additionalPCpartName${countAdditionalPCParts}">Enter Name</label>
                                                <input type="text" id="additionalPCpartName${countAdditionalPCParts}" name="additionalPCpartName${countAdditionalPCParts}"
                                                    class="form-control additionalPCPartName"
                                                    placeholder="Eg. Case Fans">
                                                </div>
                                            </div>
                                            <div class="col-sm-9 col-lg w-100 d-flex align-items-center" style="gap:20px;">
                                                <div class="form-group w-100">
                                                <label for="additionalPCpartUsedOrNew${countAdditionalPCParts}">Used Or New?</label>
                                                <select id="additionalPCpartUsedOrNew${countAdditionalPCParts}" name="additionalPCpartUsedOrNew${countAdditionalPCParts}" class="form-control additionalPCpartUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                                </div>
                                                <button type="button" class="btn btn-danger" style="margin-top:13px;" id="removeAdditionalPCpart${countAdditionalPCParts}" onclick="removeAdditionalPCpart(${countAdditionalPCParts})">Remove</button>
                                            </div>`

                    document.getElementById('additionalPCpartsSpecs').appendChild(newDiv)

                    if (countAdditionalPCParts == 5) {
                        const button = document.getElementById('addMoreadditionalPCpartBtn');
                        button.setAttribute('disabled', true);
                    }

                    countAdditionalPCParts++


                }

            })



        }

        // FOR APPENDING ADDITIONAL PRODUCTS
        function appendAdditionalProducts() {


            const additionalProducts = document.getElementById('additionalProducts');
            additionalProducts.classList.remove('d-none');

            additionalProducts.innerHTML = `<div class="col-12">
                     <h2>Additional Products:</h2>
                 </div>
                 <input type="hidden" id="additionProductData" name="additionProductData">
                 <div id="additionalProductsSpecs" class="col-12">
                     <div id="additionalProductrow1" class='row'>
                         <div class="col-12">
                             <h5>Additional Product 1</h5>
                         </div>
                         <div class="col-sm-12 col-md">
                             <div class="form-group">
                                 <label for="additionalProductName1">Enter Name</label>
                                 <input type="text" data-id="1" id="additionalProductName1" name="additionalProductName1"
                                     class="form-control additionalProductName"
                                     placeholder="Product Title">
                             </div>
                         </div>
                         <div class="col-sm-12 col-md">
                             <div class="form-group">
                                 <label for="additionalProductCategory1">Product Category</label>
                                 <select id="additionalProductCategory1" data-id="1" name="additionalProductCategory1" class="form-control additionalProductCategory">
                                     <option value="0">Please Select</option>
                                     @foreach ($categories as $category)
                                         <x-categories-select :category="$category" />
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-12 col-md">
                             <div class="form-group">
                                 <label for="additionalProductBrand1">Product Brand</label>
                                 <select id="additionalProductBrand1" data-id="1" name="additionalProductBrand1" class="form-control additionalProductBrand">
                                     <option value="0">Please Select</option>
                                     @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="col-sm-12 col-md">
                             <div class="form-group">
                                 <label for="additionalProductUsedOrNew1">Used Or New?</label>
                                 <select id="additionalProductUsedOrNew1" data-id="1" name="additionalProductUsedOrNew1" class="form-control additionalProductUsedOrNew">
                                     <option value="0">Please Select</option>
                                     <option value="1">Used</option>
                                     <option value="2">New</option>
                                 </select>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-sm-12 col-md mb-3">
                     <button type="button" class="btn btn-primary" id="addMoreadditionalProductsBtn">Add More
                         Products</button>
                 </div>`


        }

        // FOR ADDING ADDITIONAL PRODUCTS
        function addMoreAdditionalProducts() {


            document.getElementById('addMoreadditionalProductsBtn').addEventListener('click', function() {
                let newDiv = document.createElement('div');
                newDiv.id = `additionalProductrow${countAdditionalProducts}`;
                newDiv.className = 'row';
                newDiv.innerHTML = `<div class="col-12">
                                <h5>Additional Product ${countAdditionalProducts}</h5>
                            </div>
                            <div class="col-sm-12 col-md">
                                <div class="form-group">
                                    <label for="additionalProductName${countAdditionalProducts}">Enter Name</label>
                                    <input type="text" data-id="${countAdditionalProducts}" id="additionalProductName${countAdditionalProducts}" name="additionalProductName${countAdditionalProducts}"
                                        class="form-control additionalProductName"
                                        placeholder="Product Title">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md">
                                <div class="form-group">
                                    <label for="additionalProductCategory${countAdditionalProducts}">Product Category</label>
                                    <select data-id="${countAdditionalProducts}" id="additionalProductCategory${countAdditionalProducts}" name="additionalProductCategory${countAdditionalProducts}" class="form-control additionalProductCategory">
                                        <option value="0">Please Select</option>
                                        @foreach ($categories as $category)
                                            <x-categories-select :category="$category" />
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                             <div class="col-sm-12 col-md">
                             <div class="form-group">
                                 <label for="additionalProductBrand${countAdditionalProducts}">Product Brand</label>
                                 <select id="additionalProductBrand${countAdditionalProducts}" data-id="${countAdditionalProducts}" name="additionalProductBrand${countAdditionalProducts}" class="form-control additionalProductBrand">
                                     <option value="0">Please Select</option>
                                     @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                 </select>
                             </div>
                         </div>
                            <div class="col-sm-12 col-md w-100 d-flex align-items-center" style="gap:20px;">
                                <div class="form-group w-100">
                                    <label for="additionalProductUsedOrNew${countAdditionalProducts}">Used Or New?</label>
                                    <select data-id="${countAdditionalProducts}" id="additionalProductUsedOrNew${countAdditionalProducts}" name="additionalProductUsedOrNew${countAdditionalProducts}" class="form-control additionalProductUsedOrNew">
                                        <option value="0">Please Select</option>
                                        <option value="1">Used</option>
                                        <option value="2">New</option>
                                    </select>
                                </div>
                                <button type="button" class="btn btn-danger" style="margin-top:13px;" id="removeAdditionalProduct${countAdditionalProducts}" onclick="removeAdditionalProduct(${countAdditionalProducts})">Remove</button>
                            </div>`


                document.getElementById('additionalProductsSpecs').appendChild(newDiv)

                countAdditionalProducts++

            })





        }

        // FOR APPENDING LAPTOP PARTS
        function appendLaptopParts() {
            const completePCParts = document.getElementById('completePCparts');
            completePCParts.classList.remove('d-none')

            completePCParts.innerHTML = `<h2>Laptop Parts:</h2>
                            <div class="row">
                                <div class="col-12">
                                    <h4>Processor:</h4>
                                </div>
                                <div class="col-12">
                                    <div class='row'>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="processorName">Enter Name</label>
                                                <input type="text" id="processorName" name="processorName"
                                                    class="form-control" placeholder="Eg. Core i7 10th Gen">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="processorBrand">Brand</label>
                                                <select id="processorBrand" name="processorBrand" class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
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
                                    <div class='row'>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="graphicCardName">Enter Name</label>
                                                <input type="text" id="graphicCardName" name="graphicCardName"
                                                    class="form-control" placeholder="Eg. Gigabyte GTX 1050">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="graphicCardBrand">Brand</label>
                                                <select id="graphicCardBrand" name="graphicCardBrand"
                                                    class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="graphicCardMemory">Memory</label>
                                                <select id="graphicCardMemory" name="graphicCardMemory"
                                                    class="form-control">
                                                    <option value="0">Please Select Memory</option>
                                                    <option value="1">1 GB</option>
                                                    <option value="2">2 GB</option>
                                                    <option value="2">3 GB</option>
                                                    <option value="2">4 GB</option>
                                                    <option value="2">6 GB</option>
                                                    <option value="2">8 GB</option>
                                                    <option value="2">12 GB</option>
                                                    <option value="2">24 GB</option>
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
                                    <div class='row'>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramName">Enter Name</label>
                                                <input type="text" id="ramName" name="ramName" class="form-control"
                                                    placeholder="Eg. Kingston 8GB DDR4 ">
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramBrand">Brand</label>
                                                <select id="ramBrand" name="ramBrand" class="form-control">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramMemory">Memory</label>
                                                <select id="ramMemory" name="ramMemory" class="form-control">
                                                    <option value="0">Please Select Memory</option>
                                                    <option value="1">1 GB</option>
                                                    <option value="2">2 GB</option>
                                                    <option value="2">4 GB</option>
                                                    <option value="2">8 GB</option>
                                                    <option value="2">16 GB</option>
                                                    <option value="2">32 GB</option>
                                                    <option value="2">64 GB</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramQuantity">Quantity</label>
                                                <input type="number" id="ramQuantity" name="ramQuantity"
                                                    class="form-control" placeholder="Eg. 2">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h4>Storage:</h4>
                                </div>
                                <input type="hidden" id="laptopStorage" name="laptopStorage">
                                <div id="storageSpecsDiv" class="col-12">
                                    <div id="additionalLaptopStoragerow1" class='row'>
                                        <div class="col-12">
                                         <h5>storage 1</h5>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageName1">Enter Name</label>
                                                <input type="text" data-id="1" id="storageName1" name="storageName1"
                                                    class="form-control storageName"
                                                    placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageBrand1">Brand</label>
                                                <select id="storageBrand1" data-id="1" name="storageBrand1" class="form-control storageBrand">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageType1">Type</label>
                                                <select id="storageType1" data-id="1" name="storageType1" class="form-control storageType">
                                                    <option value="0">Please Select Type</option>
                                                    <option value="1">HDD</option>
                                                    <option value="2">SSD</option>
                                                    <option value="3">NVMe</option>
                                                    <option value="4">M.2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageMemory1">Memory</label>
                                                <select id="storageMemory1" data-id="1" name="storageMemory1" class="form-control storageMemory">
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
                                    </div>
                                </div>

                                <div class="col-12 mb-3">
                                    <button type="button" class="btn btn-primary" id="addMoreStorageBtn">Add More Storage</button>
                                </div>
                            </div>`



        }


        // FOR ADDING MORE STORAGE IN LAPTOP PARTS
        function addMoreStorageInLaptop() {


            document.getElementById('addMoreStorageBtn').addEventListener('click', function() {

                let newDiv = document.createElement('div');
                newDiv.id = `additionalLaptopStoragerow${countLaptopStorage}`;
                newDiv.className = 'row';
                newDiv.innerHTML = `  <div class="col-12">
                                         <h5>storage ${countLaptopStorage}</h5>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageName${countLaptopStorage}">Enter Name</label>
                                                <input type="text" id="storageName${countLaptopStorage}" data-id="${countLaptopStorage}" name="storageName${countLaptopStorage}"
                                                    class="form-control storageName"
                                                    placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageBrand${countLaptopStorage}">Brand</label>
                                                <select id="storageBrand${countLaptopStorage}" data-id="${countLaptopStorage}" name="storageBrand${countLaptopStorage}" class="form-control storageBrand">
                                                    <option value="0">Please Select Brand</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="storageType${countLaptopStorage}">Type</label>
                                                <select id="storageType${countLaptopStorage}" data-id="${countLaptopStorage}" name="storageType${countLaptopStorage}" class="form-control storageType">
                                                    <option value="0">Please Select Type</option>
                                                    <option value="1">HDD</option>
                                                    <option value="2">SSD</option>
                                                    <option value="3">NVMe</option>
                                                    <option value="4">M.2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12 w-100 d-flex align-items-center" style="gap:20px;">
                                            <div class="form-group w-100">
                                                <label for="storageMemory${countLaptopStorage}">Memory</label>
                                                <select id="storageMemory${countLaptopStorage}" data-id="${countLaptopStorage}" name="storageMemory${countLaptopStorage}" class="form-control storageMemory">
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
                                            <button type="button" class="btn btn-danger" style="margin-top: 13px" id="removeLaptopStorage${countLaptopStorage}" onclick="removeLaptopStorage(${countLaptopStorage})">Remove</button>
                                        </div>`


                document.getElementById('storageSpecsDiv').appendChild(newDiv)
                getStorageBrands(countLaptopStorage);
                countLaptopStorage++
            })


        }

        // FOR REMOVING STORAGE FROM PC PARTS
        const removeStorage = (id) => {


            if (countStorage > 1) {
                countStorage--
            }



            let productRow = document.getElementById(`row${id}`)

            if (productRow.parentNode.id == 'storageSpecsDiv') {

                productRow.parentNode.removeChild(productRow)

                let allRows = Array.from(document.getElementById('storageSpecsDiv').children);

                console.log(allRows);

                let allLabels = []

                allRows.forEach((e, i) => {


                    e.id = `row${i + 1}`;

                    let heading = e.querySelector('.col-12 h5').innerText = `storage ${i+1}`;
                    let label = e.querySelectorAll('.col-md .form-group label');
                    let input = e.querySelector('.col-md .form-group input');
                    let select = e.querySelectorAll('.col-md .form-group select');
                    let button = e.querySelector('.align-items-center button');

                    if (i > 0) {

                        button.id = `removeStorage${i+1}`;
                        button.setAttribute('onclick', `removeStorage(${i+1})`)
                    }


                    input.id = `storageName${i+1}`
                    input.name = `storageName${i+1}`
                    input.setAttribute('data-id', i + 1)

                    allLabels = Array.from(label);
                    allSelects = Array.from(select);


                    allSelects[0].id = `storageBrand${i+1}`
                    allSelects[0].name = `storageBrand${i+1}`
                    allSelects[0].setAttribute('data-id', i + 1)

                    allSelects[1].id = `storageType${i+1}`
                    allSelects[1].name = `storageType${i+1}`
                    allSelects[1].setAttribute('data-id', i + 1)

                    allSelects[2].id = `storageMemory${i+1}`
                    allSelects[2].name = `storageMemory${i+1}`
                    allSelects[2].setAttribute('data-id', i + 1)

                    allSelects[3].id = `storageUsedOrNew${i+1}`
                    allSelects[3].name = `storageUsedOrNew${i+1}`
                    allSelects[3].setAttribute('data-id', i + 1)

                    allLabels.forEach((labelElement, labelIndex) => {

                        let forAttr = labelElement.getAttribute('for');


                        if (labelIndex == 0) {
                            labelElement.setAttribute('for', `storageName${i+1}`);
                        }
                        if (labelIndex == 1) {
                            labelElement.setAttribute('for', `storageBrand${i+1}`);
                        }
                        if (labelIndex == 2) {
                            labelElement.setAttribute('for', `storageType${i+1}`);
                        }
                        if (labelIndex == 3) {
                            labelElement.setAttribute('for', `storageMemory${i+1}`);
                        }
                        if (labelIndex == 4) {
                            labelElement.setAttribute('for', `storageUsedOrNew${i+1}`);
                        }

                    })
                })



            }


        }

        // FOR REMOVING ADDITIONAL PC PARTS
        const removeAdditionalPCpart = (id) => {


            if (countAdditionalPCParts == 6) {
                const button = document.getElementById('addMoreadditionalPCpartBtn');
                button.removeAttribute('disabled', false);
            }

            if (countAdditionalPCParts > 1) {
                countAdditionalPCParts--
            }



            let productRow = document.getElementById(`additionalPCpartsrow${id}`)


            if (productRow.parentNode.id == 'additionalPCpartsSpecs') {

                productRow.parentNode.removeChild(productRow)

                let allRows = Array.from(document.getElementById('additionalPCpartsSpecs').children);


                allRows.forEach((e, i) => {
                    e.id = `additionalPCpartsrow${i + 1}`;

                    let heading = e.querySelector('.col-12 h5').innerText = `Additional Part ${i+1}`;
                    let label = e.querySelectorAll('.col-md .form-group label');
                    let input = e.querySelector('.col-md .form-group input');
                    let select = e.querySelectorAll('.col-md .form-group select');
                    let button = e.querySelector('.align-items-center button');

                    if (i > 0) {
                        button.id = `removeAdditionalPCpart${i+1}`;
                        button.setAttribute('onclick', `removeAdditionalPCpart(${i+1})`)
                    }


                    input.id = `additionalPCpartName${i+1}`
                    input.name = `additionalPCpartName${i+1}`

                    allLabels = Array.from(label);
                    allSelects = Array.from(select);


                    allSelects[0].id = `additionalPCpartUsedOrNew${i+1}`
                    allSelects[0].name = `additionalPCpartUsedOrNew${i+1}`



                    allLabels.forEach((labelElement, labelIndex) => {

                        let forAttr = labelElement.getAttribute('for');


                        if (labelIndex == 0) {
                            labelElement.setAttribute('for', `additionalPCpartName${i+1}`);
                        }
                        if (labelIndex == 1) {
                            labelElement.setAttribute('for', `additionalPCpartUsedOrNew${i+1}`);
                        }

                    })
                })



            }


        }

        // FOR REMOVING LAPTOP STORAGE
        const removeLaptopStorage = (id) => {
            if (countLaptopStorage > 1) {
                countLaptopStorage--
            }

            let productRow = document.getElementById(`additionalLaptopStoragerow${id}`)

            if (productRow.parentNode.id == 'storageSpecsDiv') {

                productRow.parentNode.removeChild(productRow)

                let allRows = Array.from(document.getElementById('storageSpecsDiv').children);


                allRows.forEach((e, i) => {
                    e.id = `additionalLaptopStoragerow${i + 1}`;

                    let heading = e.querySelector('.col-12 h5').innerText = `storage ${i+1}`;

                    let allLabels = Array.from(e.querySelectorAll('.col-sm-12 .form-group label'));
                    let allSelects = Array.from(e.querySelectorAll('.col-sm-12 .form-group select'));

                    let button = e.querySelector('.col-sm-12 button');

                    if (i > 0) {
                        button.id = `removeLaptopStorage${i+1}`;
                        button.setAttribute('onclick', `removeLaptopStorage(${i+1})`)
                    }



                    let input = e.querySelector('.col-sm-12 .form-group input');
                    input.id = `storageName${i+1}`
                    input.name = `storageName${i+1}`
                    input.setAttribute('data-id', i + 1)

                    allLabels.forEach((label, labelIndex) => {


                        if (labelIndex == 0) {
                            label.setAttribute('for', `storageName${i+1}`);
                            allSelects[labelIndex].id = `storageBrand${i+1}`
                            allSelects[labelIndex].name = `storageBrand${i+1}`
                            allSelects[labelIndex].setAttribute('data-id', i + 1)
                        }
                        if (labelIndex == 1) {
                            label.setAttribute('for', `storageBrand${i+1}`);
                            allSelects[labelIndex].id = `storageType${i+1}`
                            allSelects[labelIndex].name = `storageType${i+1}`
                            allSelects[labelIndex].setAttribute('data-id', i + 1)
                        }
                        if (labelIndex == 2) {
                            label.setAttribute('for', `storageType${i+1}`);
                            allSelects[labelIndex].id = `storageMemory${i+1}`
                            allSelects[labelIndex].name = `storageMemory${i+1}`
                            allSelects[labelIndex].setAttribute('data-id', i + 1)
                        }
                        if (labelIndex == 3) {
                            label.setAttribute('for', `storageMemory${i+1}`);
                        }
                    })



                })


            }
        }

        // FOR REMOVING ADDITIONAL PRODUCT
        const removeAdditionalProduct = (id) => {
            if (countAdditionalProducts > 1) {
                countAdditionalProducts--
            }


            let productRow = document.getElementById(`additionalProductrow${id}`)


            if (productRow.parentNode.id == 'additionalProductsSpecs') {

                productRow.parentNode.removeChild(productRow)

                let allRows = Array.from(document.getElementById('additionalProductsSpecs').children);


                allRows.forEach((e, i) => {
                    e.id = `additionalProductrow${i + 1}`;

                    let heading = e.querySelector('.col-12 h5').innerText = `Additional Product ${i+1}`;
                    let label = e.querySelectorAll('.col-md .form-group label');
                    let input = e.querySelector('.col-md .form-group input');
                    let select = e.querySelectorAll('.col-md .form-group select');
                    let button = e.querySelector('.align-items-center button');

                    if (i > 0) {
                        button.id = `removeAdditionalProduct${i+1}`;
                        button.setAttribute('onclick', `removeAdditionalProduct(${i+1})`)
                    }


                    input.id = `additionalProductName${i+1}`
                    input.name = `additionalProductName${i+1}`
                    input.setAttribute('data-id', i + 1)


                    allLabels = Array.from(label);
                    allSelects = Array.from(select);


                    allSelects[0].id = `additionalProductCategory${i+1}`
                    allSelects[0].name = `additionalProductCategory${i+1}`
                    allSelects[0].setAttribute('data-id', i + 1)

                    allSelects[1].id = `additionalProductBrand${i+1}`
                    allSelects[1].name = `additionalProductBrand${i+1}`
                    allSelects[1].setAttribute('data-id', i + 1)

                    allSelects[2].id = `additionalProductUsedOrNew${i+1}`
                    allSelects[2].name = `additionalProductUsedOrNew${i+1}`
                    allSelects[2].setAttribute('data-id', i + 1)



                    allLabels.forEach((labelElement, labelIndex) => {

                        let forAttr = labelElement.getAttribute('for');


                        if (labelIndex == 0) {
                            labelElement.setAttribute('for', `additionalProductName${i+1}`);
                        }
                        if (labelIndex == 1) {
                            labelElement.setAttribute('for', `additionalProductCategory${i+1}`);
                        }
                        if (labelIndex == 2) {
                            labelElement.setAttribute('for', `additionalProductBrand${i+1}`);
                        }
                        if (labelIndex == 3) {
                            labelElement.setAttribute('for', `additionalProductUsedOrNew${i+1}`);
                        }

                    })
                })



            }


        }



        $(document).ready(function() {
            if ({{ old('ProductType') == '1' || old('ProductType') == '5' ? 'true' : 'false' }}) {
                $('#repairedProductDiv').removeClass('d-none');
                $('#repairedProductDiv').empty();
                $('#repairedProductDiv').html(
                    `<div class="form-group">
                                    <label for="repaired">Is Product Repaired/Opened?</label>
                                    <select name="repaired" id="repaired" class="form-control">
                                        <option value="">Please Select</option>
                                        <option value="1" {{ old('repaired') == '1' ? 'selected' : null }}>Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    @error('repaired')
                                        <span class='text-danger'>{{ $message }}</span>
                                    @enderror
                                </div>`

                )
                if ({{ old('repaired') == '1' ? 'true' : 'false' }}) {
                    $('#explainRepairingDiv').removeClass('d-none');
                    $('#explainRepairingDiv').html(
                        `<div class="form-group">
                                    <label for="explainAboutRepairing">Explain Why Is The Product Repaired/Opened?</label>
                                    @error('repaired')
                                        <span class='text-danger'>Please Enter the Reason</span>
                                    @enderror

                                    <textarea class="form-control" rows="4" name="explainAboutRepairing" id="explainAboutRepairing" placeholder="Because of dust..." required>{{ old('repaired') }}</textarea>
                            </div>
                            `

                    );
                }

                var usedProducts = `
                <option value='1 Week' {{ old('warranty') == '1 Week' ? 'selected' : '' }}>1 Week</option>
                <option value='1 Month' {{ old('warranty') == '1 Month' ? 'selected' : '' }}>1 Month</option>
                <option value='3 Months' {{ old('warranty') == '3 Months' ? 'selected' : '' }}>3 Months</option>
                    `;
                $('#warranty').append(usedProducts);

            } else if ({{ old('ProductType') == '4' ? 'true' : 'false' }}) {


                countLaptopStorage = 2

                let productReasonAndWarrantyDiv = document.getElementById('productReasonAndWarrantyDiv')
                productReasonAndWarrantyDiv.innerHTML =
                    `<div class="col-md col-sm-12 d-none" id="repairedProductDiv"></div>`


                document.getElementById("productTypeData").innerHTML = `
<div class="col-md col-sm-12" id="warrantyDiv">
            <div class="form-group">
                <label for="warranty">Check warranty</label>
                <select name="warranty" id="warranty" class="form-control">
                    <option value="" selected>Please Select Warranty</option>

                </select>
                @error('warranty')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md col-sm-12" id="reasonForSellingDiv">
            <div class="form-group">
                <label for="reason">Reason for Selling (Optional)</label>
                <input type="text" class="form-control" name="reason" id="reasonForSelling">
            </div>
        </div>
        <div class="col-md col-sm-12" id="selectProductYear">
            <div class="form-group">
                <label for="yearOfProduct">Year-Make of Product</label>

                <select name="yearOfProduct" class="form-control" id="yearOfProduct">
                    <option value="0" selected>Select Year/Make of Your Product</option>

                </select>
            </div>
        </div>
        `



                appendPCParts(); // FUNCTION TO SHOW ALL PC PARTS ON SCREEN
                addMoreStorageInPcParts(); //FOR ADD MORE STORAGE BUTTON IN PC PARTS


                appendAdditionalPcParts(); // FUNCTION TO SHOW ADDITIONAL PC PARTS SECTION ON SCREEN
                addMoreAdditionalPcParts(); //FOR ADD MORE ADDITIONAL PC PARTS BUTTON


                appendAdditionalProducts(); // FUNCTION TO SHOW ADDITIONAL PRODUCTS SECTION ON SCREEN
                addMoreAdditionalProducts(); //FOR ADD MORE ADDITIONAL PRODCUTS BUTTON



                var newProduct = `
                  <option value='6 Months'>6 Months</option>
                  <option value='1 Year'>1 Year</option>
                  <option value='2 Years'>2 Years</option>
                  <option value='3 Years'>3 Years</option>
              `;



                // $('#manufacturerAndCountryOfOriginDiv').empty();
                // $('#getVariations').empty();
                $('#aboutThisItemContainer').empty();

                $('#warranty').empty();
                $('#warranty').html(
                    '<option value="" selected>Please Select Warranty</option>');
                $('#warranty').append(newProduct);

                $('#yearOfProduct').empty();
                $('#yearOfProduct').html(
                    '<option value="" selected>Please Select Year/Make of Product</option>'
                );
                $('#yearOfProduct').append(years);


                $('#additionalRequirements').addClass('d-none');
                $('#additionalRequirements').empty();


            }




            function gatherStorageData() {
                const storageData = [];
                // Get all storage rows
                const rows = document.querySelectorAll('#storageSpecsDiv .row');

                document.querySelectorAll('#storageSpecsDiv .row').forEach((row, index) => {
                    const storageName = row.querySelector('.storageName').value;
                    const storageBrand = row.querySelector('.storageBrand').value;
                    const storageType = row.querySelector('.storageType').value;
                    const storageMemory = row.querySelector('.storageMemory').value;
                    const storageUsedOrNew = row.querySelector('.storageUsedOrNew').value;

                    // Collect data into an object
                    const storageItem = {
                        name: storageName,
                        brand: storageBrand,
                        type: storageType,
                        memory: storageMemory,
                        usedOrNew: storageUsedOrNew
                    };

                    // Add the object to the array
                    storageData.push(storageItem);
                });

                // Set the hidden input field value
                document.getElementById('storageData').value = JSON.stringify(storageData);
            }
            uploadProductForm.addEventListener('submit', gatherStorageData);


            function gatherAdditionalPartData() {
                const AdditionPartsData = [];
                const rows = document.querySelectorAll('#additionalPCpartsSpecs .row');

                document.querySelectorAll('#additionalPCpartsSpecs .row').forEach((row, index) => {
                    const AdditionalPartName = row.querySelector('.additionalPCPartName').value;
                    const AdditionalPartUserOrnew = row.querySelector('.additionalPCpartUsedOrNew').value;

                    const AdditionalItem = {
                        name: AdditionalPartName,
                        userOrnew: AdditionalPartUserOrnew
                    }

                    AdditionPartsData.push(AdditionalItem);
                })

                document.getElementById('additionalPartsData').value = JSON.stringify(AdditionPartsData);
            }
            uploadProductForm.addEventListener('submit', gatherAdditionalPartData);

            function gatherAdditionalProductsData() {
                const AdditionalProductsData = [];
                const rows = document.querySelectorAll('#additionalProducts .row');

                document.querySelectorAll('#additionalProducts .row').forEach((row, index) => {
                    const AdditionalProductName = row.querySelector('.additionalProductName').value;
                    const AdditionalProductBrand = row.querySelector('.additionalProductBrand').value;
                    const AdditionalProductCategory = row.querySelector('.additionalProductCategory').value;
                    const AdditionalProductUsedOrNew = row.querySelector('.additionalProductUsedOrNew')
                        .value;

                    const AdditionalProduct = {
                        name: AdditionalProductName,
                        brand: AdditionalProductBrand,
                        category: AdditionalProductCategory,
                        usedOrNew: AdditionalProductUsedOrNew
                    };

                    AdditionalProductsData.push(AdditionalProduct);
                });

                document.getElementById('additionProductData').value = JSON.stringify(AdditionalProductsData);
            }
            uploadProductForm.addEventListener('submit', gatherAdditionalProductsData);

            function gatherLaptopStorage() {
                const LaptopStorageData = [];

                const rows = document.querySelectorAll('#storageSpecsDiv .row');

                rows.forEach((row, index) => {
                    const LaptopStorageName = row.querySelector('.storageName').value;
                    const LaptopStorageBrand = row.querySelector('.storageBrand').value;
                    const LaptopStorageType = row.querySelector('.storageType').value;
                    const LaptopstorageMemory = row.querySelector('.storageMemory').value;

                    const LaptopStorage = {
                        name: LaptopStorageName,
                        brand: LaptopStorageBrand,
                        type: LaptopStorageType,
                        memory: LaptopstorageMemory
                    };

                    LaptopStorageData.push(LaptopStorage);
                });

                document.getElementById('laptopStorage').value = JSON.stringify(LaptopStorageData);
            }
            uploadProductForm.addEventListener('submit', gatherLaptopStorage);



            // Get Brand By Categories
            $('#productCategory').on('change', function() {
                let categoryID = $(this).val();
                $.ajax({
                    url: "{{ route('seller.getBrandsByCategory') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        categoryID: categoryID
                    },
                    success: function(res) {
                        $("#brandName").empty(); // Clear the dropdown first
                        $('#brandName').append('<option selected>Select Brand</option>');
                        if (res.length > 0) {
                            res.forEach(function(brand) {

                                $('#brandName').append('<option value="' + brand.id +
                                    '">' + brand.name + '</option>');
                            });
                        } else {
                            $('#brandName').append(
                                '<option value="">No brands available</option>');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            })




            $('#ProductType').on('change', function() {
                if ($(this).val() == '4' || $(this).val() == '5') {
                    let Processor = 2;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: Processor
                        },
                        success: function(res) {
                            $("#processorBrand").empty(); // Clear the dropdown first
                            $('#processorBrand').append(
                                '<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#processorBrand').append('<option value="' +
                                        brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#processorBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })

                    let GraphicCard = 4;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: GraphicCard
                        },
                        success: function(res) {
                            $("#graphicCardBrand").empty(); // Clear the dropdown first
                            $('#graphicCardBrand').append(
                                '<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#graphicCardBrand').append('<option value="' +
                                        brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#graphicCardBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    let Motherboard = 3;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: Motherboard
                        },
                        success: function(res) {
                            $("#motherboardBrand").empty(); // Clear the dropdown first
                            $('#motherboardBrand').append(
                                '<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#motherboardBrand').append('<option value="' +
                                        brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#motherboardBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    let ram = 5;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: ram
                        },
                        success: function(res) {
                            $("#ramBrand").empty(); // Clear the dropdown first
                            $('#ramBrand').append('<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#ramBrand').append('<option value="' + brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#ramBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    let PSU = 8;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: PSU
                        },
                        success: function(res) {
                            $("#psuBrand").empty(); // Clear the dropdown first
                            $('#psuBrand').append('<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#psuBrand').append('<option value="' + brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#psuBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    let cases = 12;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: cases
                        },
                        success: function(res) {
                            $("#caseBrand").empty(); // Clear the dropdown first
                            $('#caseBrand').append('<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#caseBrand').append('<option value="' + brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#caseBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                    let cooler = 7;
                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: cooler
                        },
                        success: function(res) {
                            $("#coolerBrand").empty(); // Clear the dropdown first
                            $('#coolerBrand').append('<option selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {

                                    $('#coolerBrand').append('<option value="' + brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                $('#coolerBrand').append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    })
                }
            })





            @if (old('productCategory'))
                if ({{ old('productCategory') == '11' ? 'true' : 'false' }}) {
                    $('#additionalRequirements').removeClass('d-none');
                    $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorPanelType">Panel Type</label>
                                          <select id="monitorPanelType" name="monitorPanelType" class="form-control" required>
                                              <option value="0">Please Select Panel Type</option>
                                              <option value="1">IPS</option>
                                              <option value="2">VA</option>
                                              <option value="3">TN</option>
                                              <option value="4">Simple LCD</option>
                                              <option value="5">Simple LED</option>
                                              <option value="6">OLED</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorRefreshRate">Refresh Rate</label>
                                          <select id="monitorRefreshRate" name="monitorRefreshRate" class="form-control" required>
                                              <option value="0">Please Select Refresh Rate</option>
                                              <option value="1">60Hz</option>
                                              <option value="2">75Hz</option>
                                              <option value="3">100Hz</option>
                                              <option value="4">120Hz</option>
                                              <option value="5">144Hz</option>
                                              <option value="6">165Hz</option>
                                              <option value="7">180Hz</option>
                                              <option value="8">240Hz</option>
                                              <option value="9">360Hz</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorSize">Size</label>
                                          <input type="text" id="monitorSize" name="monitorSize" required
                                              class="form-control" placeholder="Eg. 22 inches">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="monitorModelNo">Model No. (optional)</label>
                                          <input type="text" id="monitorModelNo" name="monitorModelNo"
                                              class="form-control" placeholder="Eg. XL2546K">
                                      </div>
                                  </div>
                              </div>`);

                } else if ({{ old('productCategory') == '5' ? 'true' : 'false' }}) {
                    $('#additionalRequirements').removeClass('d-none');
                    $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramGeneration">RAM Generation</label>
                                          <select id="ramGeneration" name="ramGeneration" class="form-control" required>
                                              <option value="0">Please Select RAM Generation</option>
                                              <option value="1">DDR2</option>
                                              <option value="2">DDR3</option>
                                              <option value="3">DDR4</option>
                                              <option value="4">DDR5</option>
                                          </select>

                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramClockSpeed">Clock Speed</label>
                                          <input type="text" value="{{ old('ramClockSpeed') }}" id="ramClockSpeed" name="ramClockSpeed" required
                                              class="form-control" placeholder="Eg. 3200 MHz">
                                      </div>
                                  </div>

                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="ramSize">RAM Size</label>
                                          <input type="text" id="ramSize" name="ramSize" required
                                              class="form-control" placeholder="Eg. 8GB">
                                      </div>
                                  </div>
                              </div>`);

                } else if ({{ old('productCategory') == '6' ? 'true' : 'false' }}) {
                    $('#additionalRequirements').removeClass('d-none');
                    $('#additionalRequirements').html(`<h2>Additional Requirements:</h2>
                      <div class='row'>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageType">Storage Type</label>
                                          <select id="storageType" name="storageType" class="form-control" required>
                                              <option value="0">Please Select Storage Type</option>
                                              <option value="1">HDD</option>
                                              <option value="2">SSD</option>
                                              <option value="3">NVMe</option>
                                              <option value="4">M.2</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md col-sm-12">
                                      <div class="form-group">
                                          <label for="storageSize">Storage Size</label>
                                          <input type="text" id="storageSize" name="storageSize" required
                                              class="form-control" placeholder="Eg. 500GB">
                                      </div>
                                  </div>`);

                } else {

                    $('#additionalRequirements').addClass('d-none');
                    $('#additionalRequirements').empty();
                }
            @endif
        })


        $(document).ready(function() {
            $(document).on('change', '.additionalProductCategory', function() {
                let categoryID = $(this).val();
                let dataID = $(this).data('id');
                let brandNameSelectBox = $('#additionalProductBrand' + dataID);

                $.ajax({
                    url: "{{ route('seller.getBrandsByCategory') }}",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        categoryID: categoryID
                    },
                    success: function(res) {
                        brandNameSelectBox.empty(); // Clear the dropdown first
                        brandNameSelectBox.append(
                            '<option value="" selected>Select Brand</option>');
                        if (res.length > 0) {
                            res.forEach(function(brand) {
                                brandNameSelectBox.append('<option value="' + brand.id +
                                    '">' + brand.name + '</option>');
                            });
                        } else {
                            brandNameSelectBox.append(
                                '<option value="">No brands available</option>');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });


            $(document).on('change', '#ProductType', function() {

                if (this.value == 4 || this.value == 5) {
                    let categoryID = 6;
                    let brandNameSelectBox = $('#storageBrand1');

                    $.ajax({
                        url: "{{ route('seller.getBrandsByCategory') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            categoryID: categoryID
                        },
                        success: function(res) {
                            brandNameSelectBox.empty(); // Clear the dropdown first
                            brandNameSelectBox.append(
                                '<option value="" selected>Select Brand</option>');
                            if (res.length > 0) {
                                res.forEach(function(brand) {
                                    brandNameSelectBox.append('<option value="' + brand
                                        .id +
                                        '">' + brand.name + '</option>');
                                });
                            } else {
                                brandNameSelectBox.append(
                                    '<option value="">No brands available</option>');
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });


                } else {
                    return;
                }
            });
        });
    </script>
@endsection
