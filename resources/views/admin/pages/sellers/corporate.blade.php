@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Corporate Sellers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sellers</a></li>
                                <li class="breadcrumb-item active">Corporate Sellers</li>
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
                            <h4 class="card-title">Corporate Sellers</h4>
                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Seller Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Account Type</th>
                                        <th>Registeration Date</th>
                                        <th></th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($allUsers as $user)
                                        @if ($user->accountType == 'Admin')
                                            @continue
                                        @endif
                                        <tr>
                                            <th style="vertical-align: middle">{{ $loop->index + 1 }}</th>
                                            <td style="vertical-align: middle">{{ $user->id }}</td>
                                            <td style="vertical-align: middle">{{ $user->fullName }}</td>
                                            <td style="vertical-align: middle">{{ $user->Email }}</td>
                                            <td style="vertical-align: middle">{{ $user->number }}</td>
                                            <td style="vertical-align: middle">{{ $user->accountType }}</td>
                                            <td style="vertical-align: middle">{{ $user->created_at->format('d/m/Y') }}</td>
                                            <td><button class="btn btn-primary">View Details</button></td>
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
        <div style="padding-left: 1%">
            {{ $allUsers->links() }}
        </div>
    </div>
@endsection
