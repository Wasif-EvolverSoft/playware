<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Playware A Place Where You Can Purchase All Your Computer Related Accessories" name="description" />
    <meta content="PlayWare" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/theme.min.css') }}" rel="stylesheet" type="text/css" />


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect d-none"
                            id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-plus"></i> Create New
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Application
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                Software
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                EMS System
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                CRM App
                            </a>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center">

                    {{-- <div class="dropdown d-none d-sm-inline-block ml-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-bell"></i>
                            <span class="badge badge-danger badge-pill">3</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-3">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0"> Notifications </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="small"> View All</a>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 230px;">
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="assets/images/users/avatar-2.jpg"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Samuel Coverdale</h6>
                                            <p class="font-size-13 mb-1">You have new follower on Instagram</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 2
                                                min ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <div class="avatar-xs mr-3">
                                            <span class="avatar-title bg-success rounded-circle">
                                                <i class="mdi mdi-cloud-download-outline"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Download Available !</h6>
                                            <p class="font-size-13 mb-1">Latest version of admin is now available.
                                                Please download here.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i> 4
                                                hours ago</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="" class="text-reset notification-item">
                                    <div class="media">
                                        <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                            class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                                        <div class="media-body">
                                            <h6 class="mt-0 mb-1">Victoria Mendis</h6>
                                            <p class="font-size-13 mb-1">Just upgraded to premium account.</p>
                                            <p class="font-size-12 mb-0 text-muted"><i
                                                    class="mdi mdi-clock-outline"></i>
                                                1 day ago</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2 border-top">
                                <a class="btn btn-sm btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="mdi mdi-arrow-down-circle mr-1"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user"
                                src="{{ asset('assets/images/users/avatar-3.jpg') }}" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">{{ Auth::user()->fullName }}</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="{{ route('seller.details') }}">
                                Profile
                            </a>

                            <form action="{{ route('auth.logout') }}" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center justify-content-between"
                                    type="submit">Log Out</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div class="navbar-brand-box">
                    <a href="index.html" class="logo">
                        <img src="{{ asset('assets/images/logo/logo.svg') }}" />
                    </a>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li>
                            {{-- <span class="badge badge-pill badge-primary float-right">7</span> --}}
                            <a href="{{ route('seller.dashboard') }}" class="waves-effect"><i
                                    class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-file"></i><span>Products</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('seller.allProducts') }}">All Products</a></li>
                                <li><a href="{{ route('seller.ProductTypes') }}">Add New Product</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-box"></i><span>Packages</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('seller.allPackages') }}">All Packages</a></li>

                                <li><a href="{{ route('seller.getNewPackage') }}">Add New Package</a></li>

                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.supportTicket') }}" class="waves-effect"><i
                                    class='bx bx-support'></i><span>Support Ticket</span></a>

                        </li>

                        <li>
                            <a href="{{ route('seller.orders') }}" class="waves-effects">
                                <i class="bx bxs-report"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.pendingReviews') }}" class="waves-effects">
                                <i class="bx bxs-report"></i>
                                <span>Pending Reviews</span>
                            </a>
                        </li>
                        <li>
                            @php
                                $verified = Auth::user()->approved == 0 ? true : false;
                            @endphp

                            @if ($verified)
                                <a href="{{ route('auth.verificationForm') }}" class="waves-effect">
                                    <i class="bx bx-badge-check"></i><span>Verification</span>
                                </a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('main-content')
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2024 © TeamDevs.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                Design & Develop by TeamDevs
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @yield('additionScript')

</body>

</html>
