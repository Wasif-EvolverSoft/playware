<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Login - Playware</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

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
                                                <a href="index.html">
                                                    <span><img src="{{ asset('assets/images/logo.svg') }}"
                                                            alt="" height="26"></span>
                                                </a>
                                            </div>
                                            <form action="{{route('login.admin')}}" method="POST" class="p-2">
                                                @csrf
                                                @if(Session::has('error'))
                                                <div class="alert alert-warning">{{ Session::get('error') }}</div>
                                                @endif
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" name="email" type="email"
                                                        id="emailaddress" required="" placeholder="john@deo.com">
                                                    @error('email')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" name="password" type="password"
                                                        required="" id="password" placeholder="Enter your password">
                                                </div>

                                                <div class="form-group mb-4 pb-3">
                                                    <div class="custom-control custom-checkbox checkbox-primary">
                                                        <input type="checkbox" class="custom-control-input"
                                                            id="checkbox-signin">
                                                        <label class="custom-control-label"
                                                            for="checkbox-signin">Remember me</label>
                                                    </div>
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button class="btn btn-primary btn-block" type="submit"> Sign In
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
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

</body>

</html>
