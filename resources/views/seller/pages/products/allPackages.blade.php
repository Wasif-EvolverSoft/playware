@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">All Packages</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">All Packges</li>
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
                            <h4 class="card-title">All Packages</h4>
                            <table id="basic-datatable" class="table table-centered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"># of Products</th>
                                        <th scope="col">Date Created</th>
                                        <th scope="col">Status</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($packages as $package)

                                        <tr>
                                            <td  scope="row"><img src='{{ asset('user_folders/Package_images/') . '/' . $package->mainImage }}'
                                                    style='width: 100px;'></td>
                                            <td  scope="row" style="vertical-align: middle">{{ $package->title }}</td>
                                            <td  scope="row" style="vertical-align: middle">{{ $package->quantity }}</td>
                                            <td  scope="row" style="vertical-align: middle">
                                               ${{ $package->SellPrice ?? $package->originalPrice }}</td>
                                            <td  scope="row" style="vertical-align: middle">{{$package->packageProducts->count()}} Products</td>
                                            <td  scope="row" style="vertical-align: middle">{{ $package->created_at }}</td>
                                            <td  scope="row" style="vertical-align: middle">
                                                {{ $package->approved == true ? 'Approved' : 'Un-Approved' }}</td>
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
