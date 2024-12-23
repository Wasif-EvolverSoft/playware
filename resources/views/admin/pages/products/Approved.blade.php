@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Approved Products</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">All Products</a></li>
                                <li class="breadcrumb-item active">Approved Products</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Approved Products</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Uploader</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Date Created</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($Products as $product)
                                        <tr>
                                            <td><img src='{{ asset('user_folders/Product_Images/') . '/' . $product->mainImage }}'
                                                    style='width: 100px;'></td>
                                            <td style="vertical-align: middle">{{ $product->productTitle }}</td>
                                            <td style="vertical-align: middle">{{ $product->brandName }}</td>
                                            <td style="vertical-align: middle">{{ $product->created_at }}</td>
                                            <td style="vertical-align: middle">{{ $product->productQuantity }}</td>
                                            <td style="vertical-align: middle"><button class="btn btn-primary">Edit</button>
                                            <td style="vertical-align: middle"><button class="btn btn-primary">View</button>
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
