@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Add New Package</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Products</a></li>
                                <li class="breadcrumb-item active">Add New Package</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('auth.uploadPackage') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group">
                            <label for="productTitle">Package Title</label>
                            <input type="text" value="{{ old('productTitle') }}" id="productTitle" name="productTitle"
                                class="form-control" placeholder="Package 1 Flash Deal">
                            @error('productTitle')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>






                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="PackageQuantity">Package Quantity</label>
                                    <input type="number" id="PackageQuantity" name="PackageQuantity" class="form-control"
                                        placeholder="Eg. 100">
                                    @error('PackageQuantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="originalPrice">Original Price</label>
                                    <input type="number" id="originalPrice" name="originalPrice" class="form-control"
                                        placeholder="Eg. 1500">
                                    @error('originalPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="sellPrice">Sale Price (Leave Empty If Not On Sale)</label>
                                    <input type="number" id="sellPrice" name="sellPrice" class="form-control"
                                        placeholder="Eg. 1200">
                                    @error('sellPrice')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div id="packageProductsDiv" class="col-12">

                                @if (old('packageProductData'))
                                    @php
                                        $packageProductData = json_decode(old('packageProductData'), true);
                                    @endphp
                                    @foreach ($packageProductData as $ProductData)
                                        <div id="packageProductrow{{ $loop->index + 1 }}" class='row'>
                                            <input type="hidden" id="packageProductData" name="packageProductData">
                                            <div class="col-12">
                                                <h5>Product {{ $loop->index + 1 }}</h5>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="packageProductName{{ $loop->index + 1 }}">Enter Name</label>
                                                    <input type="text" data-id="{{ $loop->index + 1 }}"
                                                        id="packageProductName{{ $loop->index + 1 }}"
                                                        name="packageProductName{{ $loop->index + 1 }}"
                                                        class="form-control packageProductName" placeholder="Product Title"
                                                        value="{{ $ProductData['name'] }}">
                                                </div>
                                                @if (empty($ProductData['name']))
                                                    <span class="text-danger">This field is required.</span>
                                                @endif
                                            </div>

                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="packageProductCategory{{ $loop->index + 1 }}">Product
                                                        Category</label>
                                                    <select data-id="{{ $loop->index + 1 }}"
                                                        id="packageProductCategory{{ $loop->index + 1 }}"
                                                        name="packageProductCategory{{ $loop->index + 1 }}"
                                                        class="form-control packageProductCategory">
                                                        <option value="0">Please Select</option>
                                                        @foreach ($categories as $category)
                                                            <x-categories-select :category="$category" :oldValue="$ProductData['category']" />
                                                        @endforeach
                                                    </select>
                                                    @if (empty($ProductData['category']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="productBrand{{ $loop->index + 1 }}">Product Brand</label>
                                                    <select data-id="{{ $loop->index + 1 }}"
                                                        id="productBrand{{ $loop->index + 1 }}"
                                                        name="productBrand{{ $loop->index + 1 }}"
                                                        class="form-control packageProductBrandName">
                                                        <option value="0">Please Select</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}" {{ $brand->id == $storage['brand'] ? 'selected' : '' }}> {{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if (empty($ProductData['brand']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md col-sm-12">
                                                <div class="form-group">
                                                    <label for="packageProductUsedOrNew{{ $loop->index + 1 }}">Used Or
                                                        New?</label>
                                                    <select data-id="{{ $loop->index + 1 }}"
                                                        id="packageProductUsedOrNew{{ $loop->index + 1 }}"
                                                        name="packageProductUsedOrNew{{ $loop->index + 1 }}"
                                                        class="form-control packageProductUsedOrNew">
                                                        <option selected value="">Please Select</option>
                                                        <option value="1"
                                                            {{ $ProductData['usedornew'] == 1 ? 'selected' : '' }}>Used
                                                        </option>
                                                        <option value="2"
                                                            {{ $ProductData['usedornew'] == 2 ? 'selected' : '' }}>New
                                                        </option>
                                                    </select>
                                                    @if (empty($ProductData['usedornew']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="packageProductrow1" class='row'>
                                        <input type="hidden" id="packageProductData" name="packageProductData">
                                        <div class="col-12">
                                            <h5>Product 1</h5>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="packageProductName1">Enter Name</label>
                                                <input type="text" data-id="1" id="packageProductName1"
                                                    name="packageProductName1" class="form-control packageProductName"
                                                    placeholder="Product Title">
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="packageProductCategory1">Product Category</label>
                                                <select data-id="1" id="packageProductCategory1"
                                                    name="packageProductCategory1"
                                                    class="form-control packageProductCategory">
                                                    <option value="0">Please Select</option>
                                                    @foreach ($categories as $category)
                                                        <x-categories-select :category="$category" :oldValue="old('productCategory')" />
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="productBrand1">Product Brand</label>
                                                <select data-id="1" id="productBrand1" name="productBrand1"
                                                    class="form-control packageProductBrandName">
                                                    <option value="0">Please Select</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="packageProductUsedOrNew1">Used Or New?</label>
                                                <select data-id="1" id="packageProductUsedOrNew1"
                                                    name="packageProductUsedOrNew1"
                                                    class="form-control packageProductUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>


                            <div class="col-12 mb-4">
                                <button type="button" class="btn btn-primary mt-2" id="addMoreBtn">Add More Products
                                </button>
                            </div>
                            {{-- <div class="col-12 mb-4">
                                <p>Can't find your product? <a href="{{ route('seller.getNewPackage') }}">create product</a>
                                </p>
                            </div> --}}
                        </div>




                        <div class="form-group">
                            <label for="packageDescription">Package Description</label>
                            @error('packageDescription')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <textarea name="packageDescription" value="{{ old('packageDescription') }}" id="packageDescription"
                                class="form-control" style="height: 400px;" placeholder="Enter Your Product Description">{{ old('packageDescription') }}</textarea>

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



        let packageProducts = 2;

        document.getElementById('addMoreBtn').addEventListener('click', function() {
            if (packageProducts <= 15) {
                // Create the row div
                const rowDiv = document.createElement('div');
                rowDiv.id = `packageProductrow${packageProducts}`;
                rowDiv.classList.add('row');

                // Create the inner content for the row div
                rowDiv.innerHTML = `
            <div class="col-12">
                <h5>Product ${packageProducts}</h5>
            </div>
            <div class="col-md col-sm-12">
                <div class="form-group">
                    <label for="packageProductName${packageProducts}">Enter Name</label>
                    <input type="text" data-id="${packageProducts}" id="packageProductName${packageProducts}" name="packageProductName${packageProducts}"
                        class="form-control packageProductName" placeholder="Product Title">
                </div>
            </div>
            <div class="col-md col-sm-12">
                <div class="form-group">
                    <label for="packageProductCategory${packageProducts}">Product Category</label>
                    <select data-id="${packageProducts}" id="packageProductCategory${packageProducts}" name="packageProductCategory${packageProducts}"
                        class="form-control packageProductCategory">
                        <option value="0">Please Select</option>
                        <!-- Replace with your categories -->
                        @foreach ($categories as $category)
                            <x-categories-select :category="$category" :oldValue="old('productCategory')" />
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md col-sm-12">
                <div class="form-group">
                    <label for="productBrand${packageProducts}">Product Brand</label>
                    <select data-id="${packageProducts}" id="productBrand${packageProducts}" name="productBrand${packageProducts}"
                        class="form-control packageProductBrandName">
                        <option value="0">Please Select</option>
                        <!-- Replace with your categories -->
                        @foreach ($categories as $category)
                            <x-categories-select :category="$category" :oldValue="old('productCategory')" />
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md col-sm-12 d-flex">
                <div class="form-group w-100">
                    <label for="packageProductUsedOrNew${packageProducts}">Used Or New?</label>
                    <select data-id="${packageProducts}" id="packageProductUsedOrNew${packageProducts}" name="packageProductUsedOrNew${packageProducts}"
                        class="form-control packageProductUsedOrNew">
                        <option value="0">Please Select</option>
                        <option value="1">Used</option>
                        <option value="2">New</option>
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-danger" id="removeProduct${packageProducts}" onclick="removeProduct(${packageProducts})" style="margin-top: 10px; margin-left: 10px;">X</button>
                </div>
            </div>
        `;

                // Append the row div to the parent div
                document.getElementById('packageProductsDiv').appendChild(rowDiv);

                packageProducts++;
            } else {
                alert('Maximum Product Limit Reached For Package');
            }
        });


        const removeProduct = (id) => {


            let productRow = document.getElementById(`packageProductrow${id}`)
            productRow.parentNode.removeChild(productRow)

            let allRows = Array.from(document.getElementById('packageProductsDiv').children);

            allRows.forEach((e, i) => {
                e.id = `packageProductrow${i + 1}`;

                let heading = e.querySelector('.col-12 h5');
                heading.innerText = `Product ${i+1}`;


                let label = e.querySelectorAll('.col-md .form-group label');
                let input = e.querySelector('.col-md .form-group input');
                let select = e.querySelectorAll('.col-md .form-group select');
                let button = e.querySelector('.align-items-center button');

                if (i > 0) {
                    button.id = `removeProduct${i+1}`;
                    button.setAttribute('onclick', `removeProduct(${i+1})`)
                }


                input.id = `packageProductName${i+1}`
                input.name = `packageProductName${i+1}`
                input.setAttribute('data-id', i + 1)

                allLabels = Array.from(label);
                allSelects = Array.from(select);


                allSelects[0].id = `packageProductCategory${i+1}`
                allSelects[0].name = `packageProductCategory${i+1}`
                allSelects[0].setAttribute('data-id', i + 1)

                allSelects[1].id = `productBrand${i+1}`
                allSelects[1].name = `productBrand${i+1}`
                allSelects[1].setAttribute('data-id', i + 1)

                allSelects[2].id = `packageProductUsedOrNew${i+1}`
                allSelects[2].name = `packageProductUsedOrNew${i+1}`
                allSelects[2].setAttribute('data-id', i + 1)



                allLabels.forEach((labelElement, labelIndex) => {

                    let forAttr = labelElement.getAttribute('for');


                    if (labelIndex == 0) {
                        labelElement.setAttribute('for', `packageProductName${i+1}`);
                    }
                    if (labelIndex == 1) {
                        labelElement.setAttribute('for', `packageProductCategory${i+1}`);
                    }
                    if (labelIndex == 2) {
                        labelElement.setAttribute('for', `productBrand${i+1}`);
                    }
                    if (labelIndex == 3) {
                        labelElement.setAttribute('for', `packageProductUsedOrNew${i+1}`);
                    }

                })
            })





            packageProducts--
        }

        var uploadProductForm = document.querySelector('form[action="{{ route('auth.uploadPackage') }}"]');

        document.addEventListener('DOMContentLoaded', () => {
            function gatherProductPackage() {
                const PackageProductData = []; // Define the array within the function
                const rows = document.querySelectorAll('#packageProductsDiv .row');
                rows.forEach((row, index) => {
                    const PackProductName = row.querySelector('.packageProductName').value;
                    const PackProductCategory = row.querySelector('.packageProductCategory').value;
                    const PackProductUsedOrNew = row.querySelector('.packageProductUsedOrNew').value;
                    const PackProductBrandName = row.querySelector('.packageProductBrandName').value;

                    const PackageProducts = {
                        name: PackProductName,
                        brand: PackProductBrandName,
                        category: PackProductCategory,
                        usedornew: PackProductUsedOrNew,
                    };

                    PackageProductData.push(PackageProducts);
                });
                return PackageProductData; // Return the array
            }

            if (uploadProductForm) {
                uploadProductForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const packageProductData = gatherProductPackage(); // Get the gathered product data
                    document.querySelector('#packageProductData').value = JSON.stringify(
                        packageProductData); // Set the value of the input field
                    this.submit();
                });
            } else {
                console.error("Form not found.");
            }
        });



        $(document).ready(function() {
            let productid = 1;
            $('#packageProductCategory' + productid).on('change', function() {
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
                        $("#productBrand" + productid).empty(); // Clear the dropdown first
                        $("#productBrand" + productid).append(
                            '<option selected>Select Brand</option>');
                        if (res.length > 0) {
                            res.forEach(function(brand) {

                                $("#productBrand" + productid).append(
                                    '<option value="' + brand.id +
                                    '">' + brand.name + '</option>');
                            });
                            productid++;
                        } else {
                            $("#productBrand" + productid).append(
                                '<option value="">No brands available</option>');
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    }
                })
            })


            // TO DYNAMICALLY SET BRANDS OF EACH PRODUCT ACCORDING TO CATEGORY

            $(document).on('change', '.packageProductCategory', function() {
                let categoryID = $(this).val();
                let dataID = $(this).data('id');
                let brandNameSelectBox = $('#productBrand' + dataID);

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
        })
    </script>
@endsection
