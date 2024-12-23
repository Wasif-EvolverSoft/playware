@extends('seller.Layout.layout')
@section('main-content')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Complete PC</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item ">Products</li>
                                <li class="breadcrumb-item ">Type</li>
                                <li class="breadcrumb-item active">Complete PC</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('auth.UploadCompletePc') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="ProductType" value="4">
                        <div class="row">
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="productTitle">Title</label>
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
                                    <label for="warranty" class="form-label">Warranty</label>
                                    <select name="warranty" id="warranty" class="form-control form-select">
                                        <option value="">Select Warranty</option>
                                        <option value="6 Month"  {{ old('warranty') == '6 Month' ? 'selected' : ''  }}>6 Month</option>
                                        <option value="1 Year"  {{ old('warranty') == '1 Year' ? 'selected' : ''  }}>1 Year</option>
                                        <option value="2 Year"  {{ old('warranty') == '2 Year' ? 'selected' : ''  }}>2 Year</option>
                                        <option value="3 Year"  {{ old('warranty') == '3 Year' ? 'selected' : ''  }}>3 Year</option>
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
                                    <label for="current_price" class="form-label">Current Price</label>
                                    <input type="number" name="current_price" id="current_price" placeholder="100 to 1500"
                                        class="form-control" value="{{ old('current_price') }}">
                                    @error('current_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md col-sm-12">
                                <div class="form-group">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="number" name="sale_price" id="sale_price" placeholder="50 to 1450"
                                        class="form-control" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mb-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="isRepairedOrOpened"
                                            id="isRepairedOrOpened"
                                            {{ old('isRepairedOrOpened') == 'on' ? 'selected' : '' }}
                                            data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        <label class="form-check-label" for="isRepairedOrOpened">
                                            Has Product Used, Or Repaired?
                                        </label>
                                    </div>
                                    <div class="collapse mt-2" id="collapseExample">
                                        <textarea name="reason" style="height: 200px;" id="" class="form-control"
                                            placeholder="Please Enter The Reason">{{ old('reason') }}</textarea>
                                        @error('reason')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

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
                                                    value="{{ old('processorName') }}">
                                                @error('processorName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="processorBrand">Brand</label>
                                                <select id="processorBrand" name="processorBrand" class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($processorBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('processorBrand') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('processorBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror

                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="processorUsedOrNew">Used Or New?</label>
                                                <select id="processorUsedOrNew" name="processorUsedOrNew"
                                                    class="form-control">
                                                    <option selected>Please Select</option>
                                                    <option value="1"
                                                        {{ old('processorUsedOrNew') == 1 ? 'selected' : '' }}>Used
                                                    </option>
                                                    <option value="2"
                                                        {{ old('processorUsedOrNew') == 2 ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('processorUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
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
                                    <div class="row">
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardName">Enter Name</label>
                                                <input type="text" id="graphicCardName" name="graphicCardName"
                                                    class="form-control" placeholder="Eg. Gigabyte GTX 1050"
                                                    value="{{ old('graphicCardName') }}">
                                                @error('graphicCardName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardBrand">Brand</label>
                                                <select id="graphicCardBrand" name="graphicCardBrand"
                                                    class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($graphidCardBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('graphicCardBrand') == $brand->id ? 'selected' : '  ' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('graphicCardBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardMemory">Memory</label>
                                                <select id="graphicCardMemory" name="graphicCardMemory"
                                                    class="form-control">
                                                    <option value="" value="" selected>Please Select Memory
                                                    </option>
                                                    <option value="1"
                                                        {{ old('graphicCardMemory') == 1 ? 'selected' : '' }}>1 GB</option>
                                                    <option value="2"
                                                        {{ old('graphicCardMemory') == 2 ? 'selected' : '' }}>2 GB</option>
                                                    <option value="3"
                                                        {{ old('graphicCardMemory') == 3 ? 'selected' : '' }}>3 GB</option>
                                                    <option value="4"
                                                        {{ old('graphicCardMemory') == 4 ? 'selected' : '' }}>4 GB</option>
                                                    <option value="6"
                                                        {{ old('graphicCardMemory') == 6 ? 'selected' : '' }}>6 GB</option>
                                                    <option value="7"
                                                        {{ old('graphicCardMemory') == 7 ? 'selected' : '' }}>8 GB</option>
                                                    <option value="8"
                                                        {{ old('graphicCardMemory') == 8 ? 'selected' : '' }}>12 GB
                                                    </option>
                                                    <option value="9"
                                                        {{ old('graphicCardMemory') == 9 ? 'selected' : '' }}>24 GB
                                                    </option>
                                                </select>
                                                @error('graphicCardMemory')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="graphicCardUsedOrNew">Used Or New?</label>
                                                <select id="graphicCardUsedOrNew" name="graphicCardUsedOrNew"
                                                    class="form-control">
                                                    <option value="" value="" selected>Please Select</option>
                                                    <option value="1"
                                                        {{ old('graphicCardUsedOrNew') == 1 ? 'selected' : '' }}>Used
                                                    </option>
                                                    <option value="2"
                                                        {{ old('graphicCardUsedOrNew') == 2 ? 'selected' : '' }}>New
                                                    </option>
                                                </select>
                                                @error('graphicCardUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
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
                                    <div class="row">
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardName">Enter Name</label>
                                                <input type="text" id="motherboardName" name="motherboardName"
                                                    class="form-control" placeholder="Eg. MSI B450 TOMAHAWK MAX ATX AM4 "
                                                    value="{{ old('motherboardName') }}">
                                                @error('motherboardName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardBrand">Brand</label>
                                                <select id="motherboardBrand" name="motherboardBrand"
                                                    class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($motherBoardBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('motherboardBrand') == $brand->id ? 'selected' : '  ' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('motherboardBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="motherboardUsedOrNew">Used Or New?</label>
                                                <select id="motherboardUsedOrNew" name="motherboardUsedOrNew"
                                                    class="form-control">
                                                    <option selected>Please Select</option>
                                                    <option value="1"
                                                        {{ old('motherboardUsedOrNew') == 1 ? 'selected' : '' }}>Used
                                                    </option>
                                                    <option value="2"
                                                        {{ old('motherboardUsedOrNew') == 2 ? 'selected' : '' }}>New
                                                    </option>
                                                </select>
                                                @error('motherboardUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
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
                                    <div class="row">
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramName">Enter Name</label>
                                                <input type="text" id="ramName" name="ramName" class="form-control"
                                                    placeholder="Eg. GSkill 16GB DDR4 " value="{{ old('ramName') }}">
                                                @error('ramName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramBrand">Brand</label>
                                                <select id="ramBrand" name="ramBrand" class="form-control">
                                                    <option selected value="">Select Brand</option>
                                                    @foreach ($ramBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('ramBrand') == $brand->id ? 'selected' : '  ' }}>
                                                            {{ $brand->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('ramBrand')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramMemory">Memory</label>
                                                <select id="ramMemory" name="ramMemory" class="form-control">
                                                    <option value="" selected>Please Select Memory</option>
                                                    <option value="1" {{ old('ramMemory') == 1 ? 'selected' : '' }}>1
                                                        GB</option>
                                                    <option value="2" {{ old('ramMemory') == 2 ? 'selected' : '' }}>2
                                                        GB</option>
                                                    <option value="3" {{ old('ramMemory') == 3 ? 'selected' : '' }}>4
                                                        GB</option>
                                                    <option value="4" {{ old('ramMemory') == 4 ? 'selected' : '' }}>8
                                                        GB</option>
                                                    <option value="5" {{ old('ramMemory') == 5 ? 'selected' : '' }}>
                                                        16 GB</option>
                                                    <option value="6" {{ old('ramMemory') == 6 ? 'selected' : '' }}>
                                                        32 GB</option>
                                                    <option value="7" {{ old('ramMemory') == 7 ? 'selected' : '' }}>
                                                        64 GB</option>
                                                </select>
                                                @error('ramMemory')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramUsedOrNew">Used Or New?</label>
                                                <select id="ramUsedOrNew" name="ramUsedOrNew" class="form-control">
                                                    <option value="" selected>Please Select</option>
                                                    <option value="1"
                                                        {{ old('ramUsedOrNew') == 1 ? 'selected' : '' }}>Used</option>
                                                    <option value="2"
                                                        {{ old('ramUsedOrNew') == 2 ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('ramUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="ramQuantity">Quantity</label>
                                                <input type="number" id="ramQuantity" name="ramQuantity"
                                                    class="form-control" placeholder="Eg. 2"
                                                    value="{{ old('ramQuantity') }}">
                                                @error('ramQuantity')
                                                    <span class="text-danger">{{ $message }}</span>
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
                                    @if (old('storageData'))
                                        @php
                                            $StorageData = json_decode(old('storageData'), true);
                                        @endphp

                                        @foreach ($StorageData as $storage)
                                            <div id="row1" class="row">
                                                <div class="col-12">
                                                    <h5>storage {{ $loop->index + 1 }}</h5>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="form-group">
                                                        <label for="storageName{{ $loop->index + 1 }}">Enter Name</label>
                                                        <input type="text" data-id="{{ $loop->index + 1 }}"
                                                            id="storageName{{ $loop->index + 1 }}"
                                                            name="storageName{{ $loop->index + 1 }}"
                                                            class="form-control storageName"
                                                            placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive"
                                                            value="{{ $storage['name'] }}">
                                                        @if (empty($storage['name']))
                                                            <span class="text-danger">This field is required.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="form-group">
                                                        <label for="storageBrand{{ $loop->index + 1 }}">Brand</label>
                                                        <select id="storageBrand{{ $loop->index + 1 }}"
                                                            data-id="{{ $loop->index + 1 }}"
                                                            name="storageBrand{{ $loop->index + 1 }}"
                                                            class="form-control storageBrand">
                                                            <option value="" value="" selected>Select Brand
                                                            </option>
                                                            @foreach ($brands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ $brand->id == $storage['brand'] ? 'selected' : '' }}>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if (empty($storage['brand']))
                                                            <span class="text-danger">This field is required.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="form-group">
                                                        <label for="storageType{{ $loop->index + 1 }}">Type</label>
                                                        <select id="storageType{{ $loop->index + 1 }}"
                                                            data-id="{{ $loop->index + 1 }}"
                                                            name="storageType{{ $loop->index + 1 }}"
                                                            class="form-control storageType">
                                                            <option selected>Please Select Type</option>
                                                            <option value="1"
                                                                {{ $storage['type'] == 1 ? 'selected' : '' }}>HDD</option>
                                                            <option value="2"
                                                                {{ $storage['type'] == 2 ? 'selected' : '' }}>SSD</option>
                                                            <option value="3"
                                                                {{ $storage['type'] == 3 ? 'selected' : '' }}>NVMe</option>
                                                            <option value="4"
                                                                {{ $storage['type'] == 4 ? 'selected' : '' }}>M.2</option>
                                                        </select>
                                                        @if (empty($storage['type']))
                                                            <span class="text-danger">This field is required.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="form-group">
                                                        <label for="storageMemory1">Memory</label>
                                                        <select id="storageMemory1" data-id="1" name="storageMemory1"
                                                            class="form-control storageMemory">
                                                            <option value="0">Please Select Memory</option>
                                                            <option value="1"
                                                                {{ $storage['memory'] == 1 ? 'selected' : '' }}>120 GB
                                                            </option>
                                                            <option value="2"
                                                                {{ $storage['memory'] == 2 ? 'selected' : '' }}>240 GB
                                                            </option>
                                                            <option value="3"
                                                                {{ $storage['memory'] == 3 ? 'selected' : '' }}>250 GB
                                                            </option>
                                                            <option value="4"
                                                                {{ $storage['memory'] == 4 ? 'selected' : '' }}>256 GB
                                                            </option>
                                                            <option value="5"
                                                                {{ $storage['memory'] == 5 ? 'selected' : '' }}>480 GB
                                                            </option>
                                                            <option value="6"
                                                                {{ $storage['memory'] == 6 ? 'selected' : '' }}>500 GB
                                                            </option>
                                                            <option value="7"
                                                                {{ $storage['memory'] == 7 ? 'selected' : '' }}>512 GB
                                                            </option>
                                                            <option value="8"
                                                                {{ $storage['memory'] == 8 ? 'selected' : '' }}>1 TB
                                                            </option>
                                                            <option value="9"
                                                                {{ $storage['memory'] == 9 ? 'selected' : '' }}>2 TB
                                                            </option>
                                                            <option value="10"
                                                                {{ $storage['memory'] == 10 ? 'selected' : '' }}>4 TB
                                                            </option>
                                                            <option value="11"
                                                                {{ $storage['memory'] == 11 ? 'selected' : '' }}>8 TB
                                                            </option>
                                                        </select>
                                                        @if (empty($storage['memory']))
                                                            <span class="text-danger">This field is required.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md">
                                                    <div class="form-group">
                                                        <label for="storageUsedOrNew1">Used Or New?</label>
                                                        <select id="storageUsedOrNew1" data-id="1"
                                                            name="storageUsedOrNew1"
                                                            class="form-control storageUsedOrNew">
                                                            <option value="" selected>Please Select</option>
                                                            <option value="1"
                                                                {{ $storage['usedOrNew'] == 1 ? 'selected' : '' }}>Used
                                                            </option>
                                                            <option value="2"
                                                                {{ $storage['usedOrNew'] == 2 ? 'selected' : '' }}>New
                                                            </option>
                                                        </select>
                                                        @if (empty($storage['usedOrNew']))
                                                            <span class="text-danger">This field is required.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div id="row1" class="row">
                                            <div class="col-12">
                                                <h5>storage 1</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageName1">Enter Name</label>
                                                    <input type="text" data-id="1" id="storageName1"
                                                        name="storageName1" class="form-control storageName"
                                                        placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">

                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageBrand1">Brand</label>
                                                    <select id="storageBrand1" data-id="1" name="storageBrand1"
                                                        class="form-control storageBrand">
                                                        <option value="" selected>Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="storageType1">Type</label>
                                                    <select id="storageType1" data-id="1" name="storageType1"
                                                        class="form-control storageType">
                                                        <option selected value="">Please Select Type</option>
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
                                                    <select id="storageMemory1" data-id="1" name="storageMemory1"
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
                                                    <label for="storageUsedOrNew1">Used Or New?</label>
                                                    <select id="storageUsedOrNew1" data-id="1"
                                                        name="storageUsedOrNew1" class="form-control storageUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1">Used</option>
                                                        <option value="2">New</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                                                <input type="text" id="psuName" name="psuName" class="form-control"
                                                    placeholder="Eg. Corsair CX550 550Watt 80+ Bronze "
                                                    value="{{ old('psuName') }}">
                                                @error('psuName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="psuBrand">Brand</label>
                                                <select id="psuBrand" name="psuBrand" class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($psuBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('psuBrand') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
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
                                                    <option selected value="">Please Select Watts</option>
                                                    <option value="1" {{ old('psuWatts') == 1 ? 'selected' : '' }}>
                                                        300 Watts</option>
                                                    <option value="2" {{ old('psuWatts') == 2 ? 'selected' : '' }}>
                                                        400 Watts</option>
                                                    <option value="3" {{ old('psuWatts') == 3 ? 'selected' : '' }}>
                                                        450 Watts</option>
                                                    <option value="4" {{ old('psuWatts') == 4 ? 'selected' : '' }}>
                                                        500 Watts</option>
                                                    <option value="5" {{ old('psuWatts') == 5 ? 'selected' : '' }}>
                                                        550 Watts</option>
                                                    <option value="6" {{ old('psuWatts') == 6 ? 'selected' : '' }}>
                                                        600 Watts</option>
                                                    <option value="7" {{ old('psuWatts') == 7 ? 'selected' : '' }}>
                                                        650 Watts</option>
                                                    <option value="8" {{ old('psuWatts') == 8 ? 'selected' : '' }}>
                                                        700 Watts</option>
                                                    <option value="9" {{ old('psuWatts') == 9 ? 'selected' : '' }}>
                                                        750 Watts</option>
                                                    <option value="10" {{ old('psuWatts') == 10 ? 'selected' : '' }}>
                                                        800 Watts</option>
                                                    <option value="11" {{ old('psuWatts') == 11 ? 'selected' : '' }}>
                                                        850 Watts</option>
                                                    <option value="12" {{ old('psuWatts') == 12 ? 'selected' : '' }}>
                                                        900 Watts</option>
                                                    <option value="13" {{ old('psuWatts') == 13 ? 'selected' : '' }}>
                                                        1000 Watts</option>
                                                    <option value="14" {{ old('psuWatts') == 14 ? 'selected' : '' }}>
                                                        1200 Watts</option>
                                                    <option value="15" {{ old('psuWatts') == 15 ? 'selected' : '' }}>
                                                        1500 Watts</option>
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
                                                    <option selected value="">Please Select</option>
                                                    <option value="1"
                                                        {{ old('psuUsedOrNew') == 1 ? 'selected' : '' }}>Used</option>
                                                    <option value="2"
                                                        {{ old('psuUsedOrNew') == 2 ? 'selected' : '' }}>New</option>
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
                                    <div class="row">
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="caseName">Enter Name</label>
                                                <input type="text" id="caseName" name="caseName"
                                                    class="form-control"
                                                    placeholder="Eg. NZXT H9 Flow Dual-Chamber Mid-Tower Airflow Case"
                                                    value="{{ old('caseName') }}">
                                                @error('caseName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="caseBrand">Brand</label>
                                                <select id="caseBrand" name="caseBrand" class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($caseBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('caseBrand') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
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
                                                <select id="caseUsedOrNew" name="caseUsedOrNew" class="form-control">
                                                    <option selected value="">Please Select</option>
                                                    <option value="1"
                                                        {{ old('caseUsedOrNew') == 1 ? 'selected' : '' }}>Used</option>
                                                    <option value="2"
                                                        {{ old('caseUsedOrNew') == 2 ? 'selected' : '' }}>New</option>
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
                                    <div class="row">
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="coolerName">Enter Name</label>
                                                <input type="text" id="coolerName" name="coolerName"
                                                    class="form-control" placeholder="Eg. XPG VENTO 120 ARGB FAN Case Fan"
                                                    value="{{ old('coolerName') }}">
                                                @error('coolerName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md col-sm-12">
                                            <div class="form-group">
                                                <label for="coolerBrand">Brand</label>
                                                <select id="coolerBrand" name="coolerBrand" class="form-control">
                                                    <option value="" selected>Select Brand</option>
                                                    @foreach ($coolerBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ old('coolerBrand') == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->name }}</option>
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
                                                <select id="coolerUsedOrNew" name="coolerUsedOrNew" class="form-control">
                                                    <option selected value="">Please Select</option>
                                                    <option value="1"
                                                        {{ old('coolerUsedOrNew') == 1 ? 'selected' : '' }}>Used</option>
                                                    <option value="2"
                                                        {{ old('coolerUsedOrNew') == 2 ? 'selected' : '' }}>New</option>
                                                </select>
                                                @error('coolerUsedOrNew')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
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

                            @if (old('additionalPartsData'))
                                @php
                                    $additionalPartsData = json_decode(old('additionalPartsData'), true);
                                @endphp

                                @foreach ($additionalPartsData as $additionalPart)
                                    <div id="additionalPCpartsSpecs" class="col-12">
                                        <div id="additionalPCpartsrow1" class="row">
                                            <div class="col-12">
                                                <h5>Additional Part {{ $loop->index + 1 }}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalPCpartName{{ $loop->index + 1 }}">Enter
                                                        Name</label>
                                                    <input type="text"
                                                        id="additionalPCpartName{{ $loop->index + 1 }}"
                                                        name="additionalPCpartName{{ $loop->index + 1 }}"
                                                        value="{{ $additionalPart['name'] }}"
                                                        class="form-control additionalPCPartName"
                                                        placeholder="Eg. Case Fans">
                                                    @if (empty($additionalPart['name']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalPCpartUsedOrNew{{ $loop->index + 1 }}">Used Or
                                                        New?</label>
                                                    <select id="additionalPCpartUsedOrNew{{ $loop->index + 1 }}"
                                                        name="additionalPCpartUsedOrNew{{ $loop->index + 1 }}"
                                                        class="form-control additionalPCpartUsedOrNew">
                                                        <option selected value="">Please Select</option>
                                                        <option value="1"
                                                            {{ $additionalPart['userOrnew'] == 1 ? 'selected' : '' }}>Used
                                                        </option>
                                                        <option value="2"
                                                            {{ $additionalPart['userOrnew'] == 2 ? 'selected' : '' }}>New
                                                        </option>
                                                    </select>
                                                    @if (empty($additionalPart['userOrnew']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div id="additionalPCpartsSpecs" class="col-12">
                                    <div id="additionalPCpartsrow1" class="row">
                                        <div class="col-12">
                                            <h5>Additional Part 1</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalPCpartName1">Enter Name</label>
                                                <input type="text" id="additionalPCpartName1"
                                                    name="additionalPCpartName1" class="form-control additionalPCPartName"
                                                    placeholder="Eg. Case Fans">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalPCpartUsedOrNew1">Used Or New?</label>
                                                <select id="additionalPCpartUsedOrNew1" name="additionalPCpartUsedOrNew1"
                                                    class="form-control additionalPCpartUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div id="addMorePcPartsBtnDiv" class="col-12 mb-3">
                                <p>You can add upto 5 additional parts.</p>
                                <button type="button" class="btn btn-primary" id="addMoreadditionalPCpartBtn">Add More
                                    Parts</button>
                            </div>
                        </div>

                        <div id="additionalProducts" class="row mt-5">
                            <div class="col-12">
                                <h2>Additional Products:</h2>
                            </div>
                            <input type="hidden" id="additionProductData" name="additionProductData">
                            <div id="additionalProductsSpecs" class="col-12">
                                @if (old('additionProductData'))
                                    @php
                                        $additionProductData = json_decode(old('additionProductData'), true);
                                    @endphp

                                    @foreach ($additionProductData as $product)
                                        <div id="additionalProductrow{{ $loop->index + 1 }}" class="row">
                                            <div class="col-12">
                                                <h5>Additional Product {{ $loop->index + 1 }}</h5>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductName{{ $loop->index + 1 }}">Enter
                                                        Name</label>
                                                    <input type="text" data-id="{{ $loop->index + 1 }}"
                                                        id="additionalProductName{{ $loop->index + 1 }}"
                                                        name="additionalProductName{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductName"
                                                        placeholder="Product Title" value="{{ $product['name'] }}">
                                                    @if (empty($product['name']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductCategory{{ $loop->index + 1 }}">Product
                                                        Category</label>
                                                    <select id="additionalProductCategory{{ $loop->index + 1 }}"
                                                        data-id="{{ $loop->index + 1 }}"
                                                        name="additionalProductCategory{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductCategory">
                                                        <option value="0">Please Select</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ $product['category'] == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if (empty($product['category']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductBrand{{ $loop->index + 1 }}">Product
                                                        Brand</label>
                                                    <select id="additionalProductBrand{{ $loop->index + 1 }}"
                                                        data-id="{{ $loop->index + 1 }}"
                                                        name="additionalProductBrand{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductBrand">
                                                        <option value="0">Please Select</option>
                                                        @foreach ($allBrands as $brand)
                                                            <option value="{{ $brand->id }}"
                                                                {{ $product['brand'] == $brand->id ? 'selected' : '' }}>
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if (empty($product['brand']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md">
                                                <div class="form-group">
                                                    <label for="additionalProductUsedOrNew{{ $loop->index + 1 }}">Used Or
                                                        New?</label>
                                                    <select id="additionalProductUsedOrNew{{ $loop->index + 1 }}"
                                                        data-id="{{ $loop->index + 1 }}"
                                                        name="additionalProductUsedOrNew{{ $loop->index + 1 }}"
                                                        class="form-control additionalProductUsedOrNew">
                                                        <option value="0">Please Select</option>
                                                        <option value="1"
                                                            {{ $product['usedOrNew'] == 1 ? 'selected' : '' }}>Used
                                                        </option>
                                                        <option value="2"
                                                            {{ $product['usedOrNew'] == 2 ? 'selected' : '' }}>New
                                                        </option>
                                                    </select>
                                                    @if (empty($product['usedOrNew']))
                                                        <span class="text-danger">This field is required.</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div id="additionalProductrow1" class="row">
                                        <div class="col-12">
                                            <h5>Additional Product 1</h5>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductName1">Enter Name</label>
                                                <input type="text" data-id="1" id="additionalProductName1"
                                                    name="additionalProductName1"
                                                    class="form-control additionalProductName"
                                                    placeholder="Product Title">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductCategory1">Product Category</label>
                                                <select id="additionalProductCategory1" data-id="1"
                                                    name="additionalProductCategory1"
                                                    class="form-control additionalProductCategory">
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
                                                <select id="additionalProductBrand1" data-id="1"
                                                    name="additionalProductBrand1"
                                                    class="form-control additionalProductBrand">
                                                    <option value="0">Please Select</option>
                                                    @foreach ($allBrands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md">
                                            <div class="form-group">
                                                <label for="additionalProductUsedOrNew1">Used Or New?</label>
                                                <select id="additionalProductUsedOrNew1" data-id="1"
                                                    name="additionalProductUsedOrNew1"
                                                    class="form-control additionalProductUsedOrNew">
                                                    <option value="0">Please Select</option>
                                                    <option value="1">Used</option>
                                                    <option value="2">New</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col-sm-12 col-md mb-3">
                                <button type="button" class="btn btn-primary" id="addMoreadditionalProductsBtn">Add More
                                    Products</button>
                            </div>
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
            </div>
        </div>
    </div>
@endsection
@section('additionScript')
    <script>
        $(document).ready(function() {



            let Storage = $('#storageSpecsDiv > div').length;
            $('#addMoreStorageBtn').on('click', function() {
                Storage++;
                let StorageDiv = `
                <div id="row1" class="row">
                    <div class="col-12">
                        <h5>storage ${Storage}</h5>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="storageName${Storage}">Enter Name</label>
                            <input type="text" data-id="${Storage}" id="storageName${Storage}" name="storageName${Storage}" class="form-control storageName" placeholder="Eg. Seagate BarraCuda ST1000DM010 1TB SATA Hard Drive">

                        </div>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="storageBrand${Storage}">Brand</label>
                            <select id="storageBrand${Storage}" data-id="${Storage}" name="storageBrand${Storage}" class="form-control storageBrand">
                                <option value="" value="" selected>Select Brand</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="storageType${Storage}">Type</label>
                            <select id="storageType${Storage}" data-id="${Storage}" name="storageType1" class="form-control storageType">
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
                            <label for="storageMemory${Storage}">Memory</label>
                            <select id="storageMemory${Storage}" data-id="${Storage}" name="storageMemory${Storage}" class="form-control storageMemory">
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
                            <label for="storageUsedOrNew${Storage}">Used Or New?</label>
                            <select id="storageUsedOrNew${Storage}" data-id="${Storage}" name="storageUsedOrNew${Storage}" class="form-control storageUsedOrNew">
                                <option value="0">Please Select</option>
                                <option value="1">Used</option>
                                <option value="2">New</option>
                            </select>
                        </div>
                    </div>
                </div>
            `
                $('#storageSpecsDiv').append(StorageDiv);
            });


            let AdditionalProductCount = $('#additionalProductsSpecs > div').length;
            $('#addMoreadditionalProductsBtn').on('click', function() {
                AdditionalProductCount++;

                let AdditionalProduct = `
                <div id="additionalProductrow${AdditionalProductCount}" class="row">
                    <div class="col-12">
                        <h5>Additional Product ${AdditionalProductCount}</h5>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="additionalProductName${AdditionalProductCount}">Enter Name</label>
                            <input type="text" data-id="${AdditionalProductCount}" id="additionalProductName${AdditionalProductCount}" name="additionalProductName${AdditionalProductCount}" class="form-control additionalProductName" placeholder="Product Title">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="additionalProductCategory${AdditionalProductCount}">Product Category</label>
                            <select id="additionalProductCategory${AdditionalProductCount}" data-id="${AdditionalProductCount}" name="additionalProductCategory${AdditionalProductCount}" class="form-control additionalProductCategory">
                                <option value="0">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="additionalProductBrand${AdditionalProductCount}">Product Brand</label>
                            <select id="additionalProductBrand${AdditionalProductCount}" data-id="${AdditionalProductCount}" name="additionalProductBrand${AdditionalProductCount}" class="form-control additionalProductBrand">
                                <option value="0">Please Select</option>
                                @foreach ($allBrands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md">
                        <div class="form-group">
                            <label for="additionalProductUsedOrNew${AdditionalProductCount}">Used Or New?</label>
                            <select id="additionalProductUsedOrNew${AdditionalProductCount}" data-id="${AdditionalProductCount}" name="additionalProductUsedOrNew${AdditionalProductCount}" class="form-control additionalProductUsedOrNew">
                                <option value="0">Please Select</option>
                                <option value="1">Used</option>
                                <option value="2">New</option>
                            </select>
                        </div>
                    </div>
                </div>
            `
                $('#additionalProductsSpecs').append(AdditionalProduct);

            });

            let AdditionalPcParts = $('#additionalPCpartsSpecs > div').length;
            $('#addMoreadditionalPCpartBtn').on('click', function() {
                AdditionalPcParts++;
                if (AdditionalPcParts <= 5) {
                    let html = `<div id="additionalPCpartsrow${AdditionalPcParts}" class="row">
                                <div class="col-12">
                                    <h5>Additional Part ${AdditionalPcParts}</h5>
                                </div>
                                <div class="col-sm-12 col-md">
                                    <div class="form-group">
                                        <label for="additionalPCpartName${AdditionalPcParts}">Enter Name</label>
                                        <input type="text" id="additionalPCpartName${AdditionalPcParts}" name="additionalPCpartName${AdditionalPcParts}" class="form-control additionalPCPartName" placeholder="Eg. Case Fans">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md">
                                    <div class="form-group">
                                        <label for="additionalPCpartUsedOrNew${AdditionalPcParts}">Used Or New?</label>
                                        <select id="additionalPCpartUsedOrNew${AdditionalPcParts}" name="additionalPCpartUsedOrNew${AdditionalPcParts}" class="form-control additionalPCpartUsedOrNew">
                                            <option value="0">Please Select</option>
                                            <option value="1">Used</option>
                                            <option value="2">New</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            `
                    $('#additionalPCpartsSpecs').append(html)
                }
            });

            var uploadProductForm = document.querySelector('form[action="{{ route('auth.UploadCompletePc') }}"]');

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
            })
        })
    </script>
@endsection
