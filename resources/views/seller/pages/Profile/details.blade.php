@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Profile</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Seller</a></li>
                                <li class="breadcrumb-item active">Details</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card p-4">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/media/default.webp') }}"
                                style="width: 100%; margin: 0px; border-radius: 5%; object-fit: cover; "
                                alt="{{ Auth::user()->fullName }}">

                            <h2 class="mt-3 fs-3">{{ Auth::user()->fullName }}</h2>
                            <p> <i class="bx bx-map"></i> {{ Auth::user()->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Shop Details</h2>
                            <form action="#">
                                <div class="form-group">
                                    <label for="ShopName">Shop Name</label>
                                    <input type="text" id="ShopName" name="ShopName" class="form-control"
                                        placeholder="Enter your text" value="{{ Auth::user()->ShopName }}">
                                </div>
                                <div class="form-group">
                                    <label for="ShopAddress">Shop Address</label>
                                    <input type="text" id="ShopAddress" name="ShopAddress" class="form-control"
                                        placeholder="Enter your text" value="{{ Auth::user()->ShopAddress }}">
                                </div>

                                <hr>
                                <h2 class="card-title">Personal Details</h2>

                                <div class="form-group">
                                    <label for="FullName">Full Name</label>
                                    <input type="text" id="FullName" name="FullName" class="form-control"
                                        placeholder="Enter your text" value="{{ Auth::user()->fullName }}">
                                </div>
                                <div class="form-group">
                                    <label for="EmailAddress">Email</label>
                                    <input type="text" id="EmailAddress" name="EmailAddress" class="form-control"
                                        placeholder="Enter your text" readonly value="{{ Auth::user()->Email }}">
                                </div>
                                <div class="form-group">
                                    <label for="PhoneNumber">Email</label>
                                    <input type="text" id="PhoneNumber" name="PhoneNumber" class="form-control"
                                        placeholder="Enter your text" readonly value="{{ Auth::user()->number }}">
                                </div>
                                <div class="form-group">
                                    <label for="AccountType">Account Type</label>
                                    <input type="text" id="AccountType" name="AccountType" class="form-control"
                                        placeholder="Enter your text" readonly value="{{ Auth::user()->accountType }}">
                                </div>
                                <div class="form-group">
                                    <label for="CNIC">CNIC (Computerized National Identity Card)</label>
                                    <input type="text" id="CNIC" name="CNIC" class="form-control"
                                        placeholder="Enter your text" readonly value="{{ Auth::user()->CNIC }}">
                                </div>
                                <div class="form-group">
                                    <label for="Dob">Date Of Birth</label>
                                    <input type="text" id="Dob" name="Dob" class="form-control"
                                        placeholder="Enter your text" readonly value="{{ Auth::user()->dob }}">
                                </div>
                                <button class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
