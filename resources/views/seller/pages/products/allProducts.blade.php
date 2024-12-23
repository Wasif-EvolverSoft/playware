@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">All Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">All Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive">
                            <h4 class="card-title ">All Products</h4>
                            <table id="basic-datatable" class="table table-centered table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand Name</th>
                                        <th>Type</th>
                                        <th>Available</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($Products as $product)
                                        <tr>
                                            <td><img src='{{ asset('user_folders/Product_Images/') . '/' . $product->mainImage }}'
                                                    style='width: 100px;'></td>
                                            <td style="vertical-align: middle">{{ $product->productTitle }}</td>
                                            <td style="vertical-align: middle">{{ $product->category->name }}</td>
                                            <td style="vertical-align: middle">{{ $product->brand->name }}</td>
                                            <td style="vertical-align: middle">
                                                {{ $product->ProductType == 1 ? 'Used Product' : 'New Product' }}</td>
                                            <td style="vertical-align: middle">{{ $product->productQuantity }}</td>
                                            <td style="vertical-align: middle">{{ $product->created_at }}</td>
                                            <td style="vertical-align: middle">
                                                {{ $product->approved == 1 ? 'Approved' : 'Un-Approved' }}</td>
                                            <td style="vertical-align: middle"><a class='btn btn-primary'
                                                    href="{{ route('seller.editProducts', ['id' => $product->id, 'title' => Str::kebab($product->productTitle)]) }}">
                                                    Edit Product
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->




        </div> <!-- container-fluid -->
    </div>
@endsection
