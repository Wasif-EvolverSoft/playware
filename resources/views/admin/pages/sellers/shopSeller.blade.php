@extends('admin.layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Shop Sellers</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sellers</a></li>
                                <li class="breadcrumb-item active">Shop Sellers</li>
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
                            <h4 class="card-title">Shop Sellers</h4>
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
                                            <td><button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-toggle="modal" data-target=".view-details{{ $loop->index }}">View
                                                    Details</button></td>
                                        </tr>

                                        <div class="modal fade view-details{{ $loop->index }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title h4" id="myExtraLargeModalLabel">
                                                            {{ $user->fullName }} Details</h5>
                                                        <button type="button" class="close waves-effect waves-light"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="FullName">Full Name</label>
                                                                    <input type="text" id="FullName" name="FullName"
                                                                        class="form-control" readonly
                                                                        value="{{ $user->fullName }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="Email">Email Address</label>
                                                                    <input type="text" id="Email" name="Email"
                                                                        class="form-control" readonly
                                                                        value="{{ $user->Email }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="Number">Number</label>
                                                                    <input type="text" id="Number" name="Number"
                                                                        class="form-control" readonly
                                                                        value="{{ $user->number }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="AccountType">Account Type</label>
                                                                    <input type="text" id="AccountType"
                                                                        name="AccountType" class="form-control" readonly
                                                                        value="{{ $user->accountType }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="AccountType">CNIC Number</label>
                                                                    <input type="text" id="AccountType"
                                                                        name="AccountType" class="form-control" readonly
                                                                        value="{{ $user->CNIC }}">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label for="Address">Address</label>
                                                                    <input type="text" id="Address" name="Address"
                                                                        class="form-control" readonly
                                                                        value="{{ $user->address }}">
                                                                </div>
                                                            </div>
                                                            @if ($user->accountType == 'Shopkeepr')
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="ShopName">Shop Name</label>
                                                                        <input type="text" id="ShopName" name="ShopName"
                                                                            class="form-control" readonly
                                                                            value="{{ $user->ShopName }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="ShopAddress">Shop Address</label>
                                                                        <input type="text" id="ShopAddress"
                                                                            name="ShopAddress" class="form-control"
                                                                            readonly value="{{ $user->ShopAddress }}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="ShopPicture">Shop Picture</label>
                                                                        <img src="{{ asset('user_folders/verification/') . '/' . $user->ShopPicture }}"
                                                                            class="img-fluid border" alt="">
                                                                    </div>
                                                                </div>


                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="ShopPicture">Shop Picture</label>
                                                                        <img src="{{ asset('user_folders/verification/') . '/' . $user->ShopBusinessCardPicture }}"
                                                                            class="img-fluid border" alt="">
                                                                    </div>
                                                                </div>
                                                            @endIf

                                                            @if ($user->CNICFrontPicture)
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="CNICNFrontPicture">CNIC (Front
                                                                            Picture)</label>
                                                                        <img src="{{ asset('user_folders/verification/') . '/' . $user->CNICFrontPicture }}"
                                                                            class="img-fluid border" alt="">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($user->CNICBackPicture)
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="CNICBackPciture">CNIC (Back
                                                                            Picture)</label>
                                                                        <img src="{{ asset('user_folders/verification/') . '/' . $user->CNICBackPicture }}"
                                                                            class="img-fluid border" alt="">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($user->selfie)
                                                                <div class="col-6">
                                                                    <div class="form-group">
                                                                        <label for="Selfie">Cnic Selfie</label>
                                                                        <img src="{{ asset('user_folders/verification/') . '/' . $user->selfie }}"
                                                                            class="img-fluid border" alt="">
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if ($user->approved <= 0)
                                                                <div class="col-12">
                                                                    <div class="d-flex align-items-center"
                                                                        style="gap: 8px">
                                                                        <form
                                                                            action="{{ route('auth.approveSeller', ['sellerId' => $user->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button
                                                                                class="btn btn-success">Approve</button>
                                                                        </form>
                                                                        <form
                                                                            action="{{ route('auth.rejectSeller', ['sellerId' => $user->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button class="btn btn-warning">Reject</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            @endIf
                                                            @if ($user->approved = 1)
                                                                <div class="col-12">
                                                                    <div class="d-flex align-items-center"
                                                                        style="gap: 8px">

                                                                        <form
                                                                            action="{{ route('auth.rejectSeller', ['sellerId' => $user->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button class="btn btn-warning">Reject</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            @endIf
                                                        </div>
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
        <div style="padding-left: 1%">
            {{ $allUsers->links() }}
        </div>
    </div>
@endsection
