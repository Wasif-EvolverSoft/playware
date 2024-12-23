@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">New Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item ">Products</li>
                                <li class="breadcrumb-item ">Type</li>
                                <li class="breadcrumb-item active">New Product</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form id="uploadProductForm" action="{{ route('auth.UploadNewProduct') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ProductType" value="2">
                        <div class="row">
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
                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="category" class="form-label">Category</label>
                                    <select name="category" id="category" class="form-control form-select">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="brand" class="form-label">Brand</label>
                                    <select name="brand" id="brand" class="form-control form-select">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="warranty" class="form-label">Warranty</label>
                                    <select name="warranty" id="warranty" class="form-control form-select">
                                        <option value="">Select Warranty</option>
                                        <option value="6 Month" {{ old('warranty') == '6 Month' ? 'selected' : '' }}>6
                                            Month</option>
                                        <option value="1 Year" {{ old('warranty') == '1 Year' ? 'selected' : '' }}>1 Year
                                        </option>
                                        <option value="2 Year" {{ old('warranty') == '2 Year' ? 'selected' : '' }}>2 Year
                                        </option>
                                        <option value="3 Year" {{ old('warranty') == '3 Year' ? 'selected' : '' }}>3 Year
                                        </option>

                                    </select>
                                    @error('warranty')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="year_of_making" class="form-label">Year Of Making</label>
                                    <select name="year_of_making" id="year_of_making" class="form-control form-select">
                                        <option value="">Year Of Making</option>
                                        @for ($i = 2010; $i <= 2024; $i++)
                                            <option value="{{ $i }}"
                                                {{ old('year_of_making') == $i ? 'selected' : '' }}>{{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    @error('year_of_making')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="row">
                            <div class="col-md col-sm-12">
                                 <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="isRepairedOrOpened" name="isRepairedOrOpened" {{ old('isRepairedOrOpened') ? 'checked' : '' }}>
                                <label class="form-check-label" for="isRepairedOrOpened">Is Repaired or Opened?</label>
                            </div>
                                </div>
                            </div>
                            <div class="row" id="reasonContainer" style="display: {{ old('isRepairedOrOpened') ? 'flex' : 'none' }};">
                                <div class="col-md col-sm-12">
                                    <div class="form-group">
                                        <label for="reason" class="form-label">Reason</label>
                                        <input type="text" name="reason" id="reason" placeholder="Reason" class="form-control" value="{{ old('reason') }}">
                                         @error('reason')
                                            <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                            </div>


                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="amount_in_stock" class="form-label">Amount In Stock</label>
                                    <input type="number" name="amount_in_stock" id="amount_in_stock" placeholder="1 to 20"
                                        class="form-control" value="{{ old('amount_in_stock') }}">
                                    @error('amount_in_stock')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="current_price" class="form-label">Price</label>
                                    <input type="number" name="current_price" id="current_price" placeholder="100 to 1500"
                                        class="form-control" value="{{ old('current_price') }}">
                                    @error('current_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="sale_price" class="form-label">Discounted Price</label>
                                    <input type="number" name="sale_price" id="sale_price" placeholder="50 to 1450"
                                        class="form-control" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

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

                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productDescription">Product Description</label>
                                    @error('productDescription')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <textarea name="productDescription" value="{{ old('productDescription') }}" id="productDescription"
                                        class="form-control" style="height: 400px;" placeholder="Enter Your Product Description">{{ old('productDescription') }}</textarea>
                                </div>
                            </div>
                        </div>

                       <div class="row">
                            @php
                                $imageFields = ['mainImage', 'firstImage', 'secondImage', 'thirdImage', 'fourthImage', 'fifthImage'];
                            @endphp
                            @foreach ($imageFields as $field)
                                <div class="col-md col-sm-6">
                                    <label for="{{ $field }}"
                                        class="container p-0 bg-white rounded flex-column d-flex align-items-center justify-content-center">
                                        <img src="{{ asset('assets/images/media/default.webp') }}" alt="Product Image"
                                            class="img-fluid" id="{{ $field }}Preview">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="{{ $field }}"
                                                id="{{ $field }}">
                                            <label class="custom-file-label" for="{{ $field }}">Choose file</label>
                                        </div>
                                        @error($field)
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div id="formMessage"></div>
                        <button class="btn btn-primary mt-3 w-100" id="uploadProductButton">Upload Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('additionScript')
    <script>
          // Image Preview and Local Storage Logic
        const imageFields = ['mainImage', 'firstImage', 'secondImage', 'thirdImage', 'fourthImage', 'fifthImage'];

        imageFields.forEach(field => {
            const input = document.getElementById(field);
            const preview = document.getElementById(field + 'Preview');

            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        localStorage.setItem(field, e.target.result);
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });

            const storedImage = localStorage.getItem(field);
            if (storedImage) {
                preview.src = storedImage;
            }
        });

    let isMoreThanSeven = 1;

        function isMoreThanSevenFunc() {
            let AboutThisItem = document.querySelectorAll('.AboutThisItem');

            if (AboutThisItem.length >= 7) {
                addMoreBtn.style.display = 'none';
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


        $('#category').on('change', function() {
            $('#furthurRequirements').remove(); // Remove Any Further Requirements if Exists;

            if ($(this).val() === '5') { // RAM
                let RAM = `
            <div id="furthurRequirements">
                <hr/>
                    <h2>Ram Details</h2>
                    <div class="row">
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="ramGeneration">RAM Generation</label>
                                <select id="ramGeneration" name="ramGeneration" class="form-control" required="">
                                    <option value="0">Please Select RAM Generation</option>
                                    <option value="DDR2">DDR2</option>
                                    <option value="DDR3">DDR3</option>
                                    <option value="DDR4">DDR4</option>
                                    <option value="DDR5">DDR5</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="ramClockSpeed">Clock Speed</label>
                                <input type="text" id="ramClockSpeed" name="ramClockSpeed" required="" class="form-control" placeholder="Eg. 3200 MHz">
                            </div>
                        </div>

                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="ramSize">RAM Size</label>
                                <input type="text" id="ramSize" name="ramSize" required="" class="form-control" placeholder="Eg. 8GB">
                            </div>
                        </div>
                    </div>
                <hr/>
            </div>
            `
                $('#aboutThisItemContainer').before(RAM);

            } else if ($(this).val() === '6') { // Storage
                let Storage = `
            <div id="furthurRequirements">
                <hr/>
                    <h2>Storage Details</h2>
                    <div class="row">
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="storageType">Storage Type</label>
                                <select id="storageType" value="" name="storageType" class="form-control" required="">
                                    <option value="">Please Select Storage Type</option>
                                    <option value="HDD">HDD</option>
                                    <option value="SSD">SSD</option>
                                    <option value="NVMe">NVMe</option>
                                    <option value="M.2">M.2</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="storageSize">Storage Size</label>
                                <input type="text" id="storageSize" value="" name="storageSize" required="" class="form-control" placeholder="Eg. 500GB">
                            </div>
                        </div>
                    </div>
                <hr/>
            </div>
            `
                $('#aboutThisItemContainer').before(Storage);
            } else if ($(this).val() === '11') { // Monitor
                let Monitors = `
            <div id="furthurRequirements">
                <hr/>
                    <h2>Monitor Details</h2>
                    <div class="row">
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="monitorPanelType">Panel Type</label>
                                <select id="monitorPanelType" name="monitorPanelType" class="form-control" required="">
                                    <option value="0">Please Select Panel Type</option>
                                    <option value="IPS">IPS</option>
                                    <option value="VA">VA</option>
                                    <option value="TN">TN</option>
                                    <option value="Simple LCD">Simple LCD</option>
                                    <option value="Simple LED">Simple LED</option>
                                    <option value="OLED">OLED</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="monitorRefreshRate">Refresh Rate</label>
                                <select id="monitorRefreshRate" name="monitorRefreshRate" class="form-control" required="">
                                    <option value="0">Please Select Refresh Rate</option>
                                    <option value="60Hz">60Hz</option>
                                    <option value="75Hz">75Hz</option>
                                    <option value="100Hz">100Hz</option>
                                    <option value="120Hz">120Hz</option>
                                    <option value="144Hz">144Hz</option>
                                    <option value="165Hz">165Hz</option>
                                    <option value="180Hz">180Hz</option>
                                    <option value="240Hz">240Hz</option>
                                    <option value="360Hz">360Hz</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="monitorSize">Size</label>
                                <input type="text" id="monitorSize" name="monitorSize" required="" class="form-control" placeholder="Eg. 22 inches">
                            </div>
                        </div>

                        <div class="col-md col-sm-12">
                            <div class="form-group">
                                <label for="monitorModelNo">Model No. (optional)</label>
                                <input type="text" id="monitorModelNo" name="monitorModelNo" class="form-control" placeholder="Eg. XL2546K">
                            </div>
                        </div>
                    </div>
                <hr/>
            </div>
            `

                $('#aboutThisItemContainer').before(Monitors);
            }
        })


        $('#category').on('change', function() {
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
                    $("#brand").empty(); // Clear the dropdown first
                    $('#brand').append('<option selected>Select Brand</option>');
                    if (res.length > 0) {
                        res.forEach(function(brand) {

                            $('#brand').append('<option value="' + brand.id +
                                '">' + brand.name + '</option>');
                        });
                    } else {
                        $('#brand').append(
                            '<option value="">No brands available</option>');
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
        });


        var uploadProductForm = document.getElementById('uploadProductForm');
        var uploadProductButton = document.getElementById('uploadProductButton');
        var formMessage = document.getElementById('formMessage');
         const isRepairedOrOpenedCheckbox = document.getElementById('isRepairedOrOpened');
        const reasonContainer = document.getElementById('reasonContainer');


        isRepairedOrOpenedCheckbox.addEventListener('change', function() {
            if (this.checked) {
                reasonContainer.style.display = 'flex';
            } else {
                reasonContainer.style.display = 'none';
            }
        });


        uploadProductForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Remove all previous errors
            uploadProductForm.querySelectorAll('.text-danger').forEach(el => el.remove());

            let AboutThisItem = document.querySelectorAll('.AboutThisItem');
            let aboutThisItemhidden = document.querySelector('#aboutThisItemhidden');
            let AboutThisItemValues = [];

            AboutThisItem.forEach(e => {
                AboutThisItemValues.push(e.value);
            });

            let itemPointsJSON = JSON.stringify(AboutThisItemValues);
            aboutThisItemhidden.value = itemPointsJSON;

            uploadProductButton.disabled = true;
            formMessage.textContent = 'Uploading Product...';
            formMessage.style.color = 'black';

            const formData = new FormData(uploadProductForm);

            fetch(uploadProductForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData,
                }).then(response => response.json())
                .then(data => {
                    formMessage.textContent = data.message;
                    if (data.success) {
                        formMessage.style.color = 'green';
                         uploadProductForm.reset();
                         localStorage.clear(); // remove Images form local Storage
                        window.location.href = "{{ route('seller.allProducts') }}"; // Redirect

                    } else {
                        formMessage.style.color = 'red';
                        let errors = data.errors;

                        if (errors) {
                            for (let key in errors) {
                                let field = uploadProductForm.querySelector(`[name="${key}"]`);
                                if (field) {
                                    let errorDiv = document.createElement('span');
                                    errorDiv.classList.add('text-danger');
                                    errorDiv.textContent = errors[key];
                                    field.parentNode.insertBefore(errorDiv, field
                                    .nextSibling); // Insert error after field
                                }
                            }
                        }

                    }
                    uploadProductButton.disabled = false;
                })
                .catch(error => {
                    formMessage.textContent = 'An error occurred. Please try again.';
                    formMessage.style.color = "red";
                    uploadProductButton.disabled = false;
                })
        })
    </script>
@endsection