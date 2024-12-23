@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">All Support Tickets</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">All Support Tickets</li>
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
                            <h4 class="card-title">Support Tickets</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Ticket Number</th>
                                        <th>Customer</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>PW-000000001</td>
                                        <td>Ahmed</td>
                                        <td>General Inquiry</td>
                                        <td>Pending</td>
                                        <td><a href="{{ route('admin.ticket.detail') }}" class="btn btn-primary">View
                                                Details</a></td>
                                    </tr>

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
