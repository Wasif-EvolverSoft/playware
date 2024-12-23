@extends('admin.layout.layout')
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
                        <div class="card-body">
                            <h4 class="card-title">All Products</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th># of Products</th>
                                        <th>Date Created</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($packages as $package)
                                        <tr>
                                            <td><img src='{{ asset('user_folders/Package_images/') . '/' . $package->mainImage }}'
                                                    style='width: 100px;'></td>
                                            <td style="vertical-align: middle">{{ $package->title }}</td>
                                            <td style="vertical-align: middle">{{ $package->quantity }}</td>
                                            <td style="vertical-align: middle">
                                                ${{ $package->SellPrice ?? $package->originalPrice }}</td>
                                            <td style="vertical-align: middle">{{ $package->packageProducts->count() }}
                                                Products</td>
                                            <td style="vertical-align: middle">{{ $package->created_at }}</td>
                                            <td style="vertical-align: middle">
                                                {{ $package->approved == true ? 'Approved' : 'Un-Approved' }}</td>
                                            <td style="vertical-align: middle"><button type="button"
                                                    class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                                                    data-target=".view-details{{ $loop->index }}">View
                                                    Details</button></td>
                                        </tr>


                                        <div class="modal fade view-details{{ $loop->index }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">Package:
                                                            {{ $package->title }}</h5>
                                                        <button type="button" class="close waves-effect waves-light"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row mb-3">
                                                            <div class="col-md col-sm-12">
                                                                <label for="RegularPrice">Regular Price</label>
                                                                <input type="text" class="form-control" readonly
                                                                    value="{{ $package->originalPrice }}">
                                                            </div>
                                                            @if ($package->SellPrice)
                                                                <div class="col-md col-sm-12">
                                                                    <label for="SalesPrice">Sales Price</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $package->SellPrice }}">
                                                                </div>
                                                            @endif
                                                            <div class="col-md col-sm-12">
                                                                <label for="Quantity">Quantity</label>
                                                                <input type="text" class="form-control" readonly
                                                                    value="{{ $package->quantity }}">
                                                            </div>
                                                            <div class="col-12 mt-2">
                                                                <label for="Description">Description</label>
                                                                <textarea class="textarea form-control" readonly>{{ $package->description }}</textarea>
                                                            </div>
                                                            <div class="col-md mt-3 col-sm-12">
                                                                <img src="{{ asset('user_folders/Package_images/' . '/' . $package->mainImage) }}"
                                                                    class="img-fluid rounded" alt="">
                                                            </div>
                                                            <div class="col-md mt-3 col-sm-12">
                                                                <img src="{{ asset('user_folders/Package_images/' . '/' . $package->firstImage) }}"
                                                                    class="img-fluid rounded" alt="">
                                                            </div>
                                                            <div class="col-md mt-3 col-sm-12">
                                                                <img src="{{ asset('user_folders/Package_images/' . '/' . $package->secondImage) }}"
                                                                    class="img-fluid rounded" alt="">
                                                            </div>
                                                            <div class="col-md mt-3 col-sm-12">
                                                                <img src="{{ asset('user_folders/Package_images/' . '/' . $package->thirdImage) }}"
                                                                    class="img-fluid rounded" alt="">
                                                            </div>
                                                            @if ($package->fourthImage)
                                                                <div class="col-md mt-3 col-sm-12">
                                                                    <img src="{{ asset('user_folders/Package_images/' . '/' . $package->fourthImage) }}"
                                                                        class="img-fluid rounded" alt="">
                                                                </div>
                                                            @endif
                                                            @if ($package->fifthImage)
                                                                <div class="col-md mt-3 col-sm-12">
                                                                    <img src="{{ asset('user_folders/Package_images/' . '/' . $package->fifthImage) }}"
                                                                        class="img-fluid rounded" alt="">
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <h3>Products In This Package</h3>
                                                        <div class="row">
                                                            <div
                                                                class="col-md col-sm-12 border bg-secondary text-white border-white p-1 px-2 muted">
                                                                Name
                                                            </div>
                                                            <div
                                                                class="col-md col-sm-12 border bg-secondary text-white border-white p-1 px-2 muted">
                                                                Category
                                                            </div>
                                                            <div
                                                                class="col-md col-sm-12 border bg-secondary text-white border-white p-1 px-2 muted">
                                                                Used Or New?
                                                            </div>
                                                        </div>
                                                        @foreach ($package->packageProducts as $product)
                                                            <div class="row">
                                                                <div class="col-md col-sm-12 border p-1 px-2 muted">
                                                                    {{ $product->title }}
                                                                </div>
                                                                <div class="col-md col-sm-12 border p-1 px-2 muted">
                                                                    {{ $product->category->name }}
                                                                </div>
                                                                <div class="col-md col-sm-12 border p-1 px-2 muted">
                                                                    {{ $product->usedOrNew == 1 ? 'Used' : 'New' }}
                                                                </div>
                                                            </div>
                                                        @endforeach



                                                    </div>
                                                    <div class="p-2">
                                                        <form
                                                        action="{{ route('admin.approvePackages', ['packageId' => $package->id]) }}"
                                                        style="display: inline;" method="POST">
                                                        @csrf
                                                        <button class="btn btn-success mt-3"
                                                            type="submit">Approve</button>
                                                    </form>
                                                    <form  action="{{ route('admin.rejectPackages', ['packageId' => $package->id]) }}"
                                                        style="display: inline;" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger mt-3"
                                                            type="submit">Reject</button>
                                                    </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
