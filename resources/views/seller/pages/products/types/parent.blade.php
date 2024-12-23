@extends('seller.Layout.layout')
@section('main-content')
    <style>
        .hover-product-card:hover{
            background-color: #ebebeb;
        }
    </style>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Select Product Type</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item ">Products</li>
                                <li class="breadcrumb-item active">Type</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <a href="{{ route('seller.NewProduct') }}"
                            class="col-6 gap-4 border hover-product-card border-black rounded rounded-2 cursor-pointer d-flex flex-column align-items-center justify-content-center py-4 bg-secondary-subtle">
                            <img src="{{ asset('assets/images/order.png') }}" class="w-25" alt="">
                            <h1 class="text-black mt-3">New Product</h1>
                        </a>
                        <a href="{{ route('seller.UsedProduct') }}"
                            class="col-6 gap-4 border hover-product-card border-black rounded rounded-2 cursor-pointer d-flex flex-column align-items-center justify-content-center py-4 bg-secondary-subtle">
                            <img src="{{ asset('assets/images/box.png') }}" class="w-25" alt="">
                            <h1 class="text-black mt-3">Used Product</h1>
                        </a>
                        <a href="{{ route('seller.CompletedPC') }}"
                            class="col-6 gap-4 border hover-product-card border-black rounded rounded-2 cursor-pointer d-flex flex-column align-items-center justify-content-center py-4 bg-secondary-subtle">
                            <img src="{{ asset('assets/images/computer.png') }}" class="w-25" alt="">
                            <h1 class="text-black mt-3">Complete PC</h1>
                        </a>
                        <a href="{{ route('seller.Laptop') }}"
                            class="col-6 gap-4 border hover-product-card border-black rounded rounded-2 cursor-pointer d-flex flex-column align-items-center justify-content-center py-4 bg-secondary-subtle">
                            <img src="{{ asset('assets/images/laptop.png') }}" class="w-25" alt="">
                            <h1 class="text-black mt-3">Laptop</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
