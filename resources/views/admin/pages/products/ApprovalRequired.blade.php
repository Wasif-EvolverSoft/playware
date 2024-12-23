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
                                            <td style="vertical-align: middle">{{ $product->users->fullName }}</td>
                                            <td style="vertical-align: middle">{{ $product->productQuantity }}</td>
                                            <td style="vertical-align: middle">
                                                {{ $product->approved == 0 ? 'Approval Required' : 'Approved' }}</td>
                                            <td style="vertical-align: middle">{{ $product->created_at->format('d/m/y') }}
                                            </td>
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
                                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">
                                                            {{ $product->productTitle }}</h5>
                                                        <button type="button" class="close waves-effect waves-light"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Title</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->productTitle }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Brand Name</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->brandName }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Product Category</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->productCategory }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Product SKU</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->productSku }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Manufacturer</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->Manufacturer }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Country of Origin</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->CountryOfOrigin }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-group">
                                                                    <label for="">Creation date</label>
                                                                    <input type="text" class="form-control" readonly
                                                                        value="{{ $product->created_at->format('d/m/y') }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="">Product Description</label>
                                                                    <textarea readonly class="form-control">{{ str_replace(' ', '', $product->productDescription) }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">Main Image</label>
                                                                <img src="{{ asset('user_folders/product_images/' . $product->mainImage) }}"
                                                                    class="w-100" alt="{{ $product->mainImage }}">
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">First Image</label>
                                                                <img src="{{ asset('user_folders/product_images/' . $product->firstImage) }}"
                                                                    class="w-100" alt="{{ $product->mainImage }}">
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">Second Image</label>
                                                                <img src="{{ asset('user_folders/product_images/' . $product->secondImage) }}"
                                                                    class="w-100" alt="{{ $product->mainImage }}">
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">Third Image</label>
                                                                <img src="{{ asset('user_folders/product_images/' . $product->thirdImage) }}"
                                                                    class="w-100" alt="{{ $product->mainImage }}">
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">Fourth Image</label>
                                                                @if ($product->fourthImage)
                                                                    <img src="{{ asset('user_folders/product_images/' . $product->fourthImage) }}"
                                                                        class="w-100" alt="{{ $product->mainImage }}">
                                                                @else
                                                                    <img src="{{ asset('assets/images/media/default.webp') }}"
                                                                        class="w-100" alt="default">
                                                                @endif
                                                            </div>
                                                            <div class="col-2">
                                                                <label for="">Fifth Image</label>
                                                                @if ($product->fifthImage)
                                                                    <img src="{{ asset('user_folders/product_images/' . $product->fifthImage) }}"
                                                                        class="w-100" alt="{{ $product->mainImage }}">
                                                                @else
                                                                    <img src="{{ asset('assets/images/media/default.webp') }}"
                                                                        class="w-100" alt="default">
                                                                @endif
                                                            </div>

                                                        </div>
                                                        <form
                                                            action="{{ route('admin.approveProducts', ['productId' => $product->id]) }}"
                                                            style="display: inline;" method="POST">
                                                            @csrf
                                                            <button class="btn btn-warning mt-3"
                                                                type="submit">Approved</button>
                                                        </form>
                                                        <form  action="{{ route('admin.rejectProduct', ['productId' => $product->id]) }}"
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
