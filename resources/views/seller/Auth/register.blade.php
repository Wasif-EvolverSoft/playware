<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Seller Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary">


    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="{{ route('indexPage') }}">
                                                    <span><img src="{{ asset('assets/images/logo/logo.svg') }}"
                                                            alt="" height="26"></span>
                                                </a>
                                            </div>

                                            <form method="POST" action="{{ route('auth.register') }}"
                                                enctype="multipart/form-data" class="p-2">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="username">Full Name</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('username') }}" name="username" id="username"
                                                        required="" placeholder="Ahmed Bashir">
                                                    @error('username')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="FatherName">Father Name</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('FatherName') }}" name="FatherName"
                                                        id="FatherName" required="" placeholder="Bashir Ahmed">
                                                    @error('FatherName')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" type="email"
                                                        value="{{ old('EmailAddress') }}" name="EmailAddress"
                                                        id="emailaddress" required="" placeholder="john@deo.com">
                                                    @error('EmailAddress')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="DateOfBirth">Date Of birth (According to your
                                                        CNIC)</label>
                                                    <input class="form-control" type="date" name="DateOfBirth"
                                                        id="DateOfBirth" required placeholder="DD/MM/YYYY"
                                                        value="{{ old('DateOfBirth') }}" max="31/12/2999"
                                                        data-date-format="DD MMMM YYYY" />
                                                    @error('DateOfBirth')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="Address">Address</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('Address') }}" name="Address" id="Address"
                                                        required=""
                                                        placeholder="123 Main Street, Karachi, Pakistan 12345">
                                                    @error('Address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="CNIC">CNIC</label>
                                                    <input class="form-control" type="text"
                                                        value="{{ old('CNIC') }}" name="CNIC" id="CNIC"
                                                        required="" placeholder="XXXXX-1234567-X">
                                                    @error('CNIC')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="phoneNUmber">Phone Number</label>
                                                    <input class="form-control" type="tel"
                                                        value="{{ old('phoneNumber') }}" name="phoneNumber"
                                                        id="phoneNUmber" required="" placeholder="+92 123 456789">
                                                    @error('phoneNumber')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password"
                                                        value="{{ old('password') }}" name="password" required=""
                                                        id="password" placeholder="Enter your password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="ConfirmPassword">Confirm Password</label>
                                                    <input class="form-control" type="password"
                                                        value="{{ old('password_confirmation') }}" required=""
                                                        id="ConfirmPassword" name="password_confirmation"
                                                        placeholder="Enter your ConfirmPassword">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" name="confirmTermsAndConditions"
                                                            class="custom-control-input" id="checkbox-signin">
                                                        <label class="custom-control-label" for="checkbox-signin">I
                                                            accept <a href="/seller/terms-and-conditions">Terms and
                                                                Conditions</a></label>
                                                        @error('confirmTermsAndConditions')
                                                            <div class="text-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Sign Up
                                                        Free </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->

                                    <div class="row mt-4">
                                        <div class="col-sm-12 text-center">
                                            <p class="text-white mb-0">Already have an account? <a
                                                    href="{{ route('seller.login') }}" class="text-dark ml-1"><b>Sign
                                                        In</b></a></p>
                                        </div>
                                    </div>

                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <style>
        input[type="date"]::-webkit-datetime-edit,
        input[type="date"]::-webkit-inner-spin-button,
        input[type="date"]::-webkit-clear-button {
            color: #fff;
            position: relative;
        }

        input[type="date"]::-webkit-datetime-edit-year-field {
            position: absolute !important;
            border-left: 1px solid #8c8c8c;
            padding: 2px;
            color: #000;
            left: 56px;
        }

        input[type="date"]::-webkit-datetime-edit-month-field {
            position: absolute !important;
            border-left: 1px solid #8c8c8c;
            padding: 2px;
            color: #000;
            left: 26px;
        }


        input[type="date"]::-webkit-datetime-edit-day-field {
            position: absolute !important;
            color: #000;
            padding: 2px;
            left: 4px;

        }
    </style>

</body>

</html>
