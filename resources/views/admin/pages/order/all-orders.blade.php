@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">{{ $title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <form action="#">
                <div class="row">
                    @if (auth()->user()->accountType === 'Admin')
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" class="form-label">Select Vendor</label>
                                <select name="vendors" id="vendor" class="form-control">
                                    <option value="">Select Vendor</option>
                                    @foreach ($sellers as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Date From</label>
                            <input id="fromDate" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="" class="form-label">Date To</label>
                            <input id="toDate" type="date" class="form-control">
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Parent Order Id</th>
                                            <th>Order Date</th>
                                            <th>Products</th>
                                            <th>Vendor Name</th>
                                            <th>Order Price</th>
                                            <th>Order Status</th>
                                            <th>Payment Type</th>
                                            <th colspan="2">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orderDet">
                                        @foreach ($orders as $order)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <th scope="row">{{ $order->parent_order_id }}</th>
                                                <td>{{ $order->created_at->format('d M Y') }}</td>

                                                <td>{{ $order->all_products->productTitle }}</td>
                                                <td>{{ $order->seller_details->fullName }}</td>
                                                <td>Rs. {{ $order->total_amount }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->paymentType }}</td>
                                                <td>
                                                    <a href="#" class="btn btn-primary">View</a>
                                                    @if ($order->paymentCheck == 'Paid' && $order->paymentType == 'Direct Bank Transfer')
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".view-details{{ $loop->index }}">View
                                                            Payment</button>
                                                    @endif
                                                </td>
                                            </tr>

                                            <div class="modal fade view-details{{ $loop->index }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header ">
                                                            <h5 class="modal-title   h4" id="myExtraLargeModalLabel">Payment
                                                                Details For #{{ $order->parent_order_id }}</h5>
                                                            <button type="button" class="close waves-effect waves-light"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>




                        </div>
                        <!-- end card-body-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additionScript')
    <script>
        $(document).ready(function() {
            $('#vendor, #fromDate, #toDate').on('change', function() {
                let vendor = $('#vendor').val();
                let fromDate = $('#fromDate').val();
                let toDate = $('#toDate').val();

                $.ajax({
                    url: '/get-vendor-orders',
                    type: 'GET',
                    data: {
                        vendor: vendor,
                        fromDate: fromDate,
                        toDate: toDate
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        let output = '';

                        response.forEach(item => {
                            if (item.all_products && item.all_products.productTitle) {
                                output += `<tr>
                                    <td class="px-6 py-3">${item.all_products.productTitle}</td>
                                    <td class="px-6 py-3">${item.quantity}</td>
                                    <td class="px-6 py-3">${'Rs.'+item.total_amount}</td>
                                    <td class="px-6 py-3"><button class="btn-1 w-full" data-id="${item.id}">View</button></td>
                                </tr>`;
                            }
                        });
                        // Add the output to your desired container (e.g., a div with id `table-container`)
                        $('.orderDet').html(output);

                    },
                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                    }
                });
            });
        });
    </script>
@endsection
