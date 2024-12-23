<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title> | Playware - Admin Dashboard</title>
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

    @yield('additionsStyles')

    <style>
        .skeleton {
            position: relative;
        }

        .skeleton::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background: linear-gradient(90deg, #eee, #f9f9f9, #eee);
            background-size: 200%;
            animation: skeleton 1s infinite reverse;
        }

        @keyframes skeleton {
            0% {
                background-position: -100% 0;
            }

            100% {
                background-position: 100% 0;
            }
        }
    </style>


</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">

                <div class="d-flex align-items-left">
                    {{-- <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>

                    <div class="dropdown d-none d-sm-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    </div> --}}
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
                    </div> --}}

                    {{-- <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="" src="{{ asset('assets/images/flags/us.jpg') }}" alt="Header Language"
                                height="16">
                            <span class="d-none d-sm-inline-block ml-1">English</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/spain.jpg') }}" alt="user-image" class="mr-1"
                                    height="12">
                                <span class="align-middle">Spanish</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/germany.jpg') }}" alt="user-image"
                                    class="mr-1" height="12">
                                <span class="align-middle">German</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/italy.jpg') }}" alt="user-image"
                                    class="mr-1" height="12">
                                <span class="align-middle">Italian</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image"
                                    class="mr-1" height="12">
                                <span class="align-middle">Russian</span>
                            </a>
                        </div>
                    </div> --}}

                    {{-- <div class="dropdown d-inline-block">
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
                                                    class="mdi mdi-clock-outline"></i> 2 min ago</p>
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
                                                    class="mdi mdi-clock-outline"></i> 4 hours ago</p>
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
                                                    class="mdi mdi-clock-outline"></i> 1 day ago</p>
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
        <div class="vertical-menu py-5">

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
                            <a href="{{ route('admin.dashboard') }}" class="waves-effect"><i
                                    class='bx bx-home-smile'></i><span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-user"></i><span>Sellers</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.allSellers') }}">All Sellers</a></li>
                                <li><a href="{{ route('admin.UnVerfiedSellers') }}">Un-Verified Sellers</a></li>
                                <li><a href="{{ route('admin.verifiedSellers') }}">Verified Sellers</a></li>
                                <li><a href="{{ route('admin.verifiedSellers') }}">Verified Plus Sellers</a></li>
                            </ul>
                        </li>



                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-user"></i><span>About us</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('abouts.create') }}">Add About us</a></li>
                                <li><a href="{{ route('abouts.index') }}">List-Aboutus</a></li>
                            </ul>
                        </li>



                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-user"></i><span>Contact Us</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('contacts.create') }}">Add Contact Us</a></li>
                                <li><a href="{{ route('contacts.index') }}">List-ContactUs</a></li>
                            </ul>
                        </li>


                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-user"></i><span>Terms & Condition</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('terms_conditions.create') }}">Add Terms & Condition</a></li>
                                <li><a href="{{ route('terms_conditions.index') }}">List-Terms&Condition</a></li>
                           </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bxs-box"></i><span>Products / Packages</span></a>
                            <ul class="sub-menu" aria-expanded="false">

                                <li><a href="javascript: void(0);" class="has-arrow">Products</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('admin.ApprovalRequiredProducts') }}">Approval
                                                Required</a></li>
                                        <li><a href="{{ route('admin.RejectProducts') }}">Rejected</a></li>
                                        <li><a href="{{ route('admin.approvedProducts') }}">Approved</a></li>
                                    </ul>

                                <li><a href="javascript: void(0);" class="has-arrow">Packages</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('admin.ApprovedPackages') }}">Approval
                                                Required</a></li>
                                        <li><a href="{{ route('admin.RejectedPackages') }}">Rejected</a></li>
                                        <li><a href="{{ route('admin.ApprovedPackage') }}">Approved</a></li>
                                    </ul>

                                <li><a href="javascript: void(0);" class="has-arrow">Attributes</a>
                                    <ul class="sub-menu" aria-expanded="true">
                                        <li><a href="{{ route('admin.getCategoriesPage') }}">Categories</a></li>
                                        <li><a href="{{ route('admin.getBrandsPage') }}">Brands</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </li>


                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-badge"></i><span>Badge</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.HomePageEdit') }}">All Badges</a></li>
                                <li><a href="{{ route('admin.HomePageEdit') }}">Manage Seller Badges</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                                    class="bx bx-file"></i><span>Pages</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.HomePageEdit') }}">Home Page</a></li>
                                <li><a href="{{ route('admin.TermsAndConditionsEditor') }}">Terms & Conditions </a>
                                </li>
                                <li><a href="{{ route('admin.privacyPolicy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('admin.RefundPolicy') }}">Refund Policy</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.supportTicket') }}" class="waves-effect"><i
                                    class='bx bx-support'></i><span>Support Ticket</span></a>

                        </li> --}}

                        <li>
                            <a href="{{ route('Admin.Orders') }}" class="waves-effects">
                                <i class="bx bxs-report"></i>
                                <span>Orders</span>
                            </a>
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


    @yield('additionScript')

</body>

</html>
