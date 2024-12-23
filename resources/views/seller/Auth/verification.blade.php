@extends('seller.Layout.layout')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            @if (Auth::user()->accountType == 'Individual' || Auth::user()->accountType == 'Shopkeepr')
                <div
                    style="position: absolute; top: 50%; left: 60%; transform: translate(-50%, -50%); display: flex; align-items: center; justify-content: center; flex-direction: column">
                    <div class="spinner-grow avatar-lg text-success m-2" role="status"></div>
                    <h1>Hello, {{ Auth::user()->fullName }}</h1>
                    <p>We are verifying your account, Please bear with us, this process of verification take anywhere from
                        24 to 48 hours.</p>
                    <p>You Can check your account detail you send for <a href="{{ route('seller.details') }}">verification
                            from here</a></p>
                    <p>You Can still upload product with an unverified account!</p>
                    <p>If you need any help, you can contact us</p>
                    <a href="#" class="btn btn-success text-white"> <span class="bx bx-support"></span> Contact
                        Support</a>
                </div>
            @else
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Verification</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Verification</li>
                                </ol>
                            </div>



                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-md col-sm-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Verification Form</h4>
                                <p class="card-subtitle mb-2">Please Provide Your Accurate Detail For Verification, Your
                                    Account
                                    will
                                    get active in 24 to 48 Hours after verification, for more details you can read <a
                                        href="#">Term & Conditions</a></p>
                                <p class="card-subtitle mb-4">If you are looking to create Enterprise/Corporate account
                                    please
                                    <a href="#">contact our support</a>
                                </p>

                                <form action="{{ route('auth.verifySeller') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Select Account Type</label>
                                        <select name="AccountType" id="accountType" class="form-control">
                                            <option value="" selected>Select Account Type</option>
                                            <option value="Individual"
                                                {{ old('AccountType') == 'Individual' ? 'Selected' : '' }}>Individual
                                                Account</option>
                                            <option value="Shopkeepr"
                                                {{ old('AccountType') == 'Shopkeepr' ? 'Selected' : '' }}>Shop Keeper
                                            </option>
                                        </select>
                                        @error('AccountType')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div id="individualSeller"
                                        style="display: {{ old('AccountType') == 'Shopkeepr' || old('AccountType') == 'Individual' ? 'block' : 'none' }};">
                                        <div class="form-group">
                                            <label>Your CNIC (13 Digits Computerised National Identity Card)</label>
                                            <input type="text" maxlength="15" id="cnicNumber" name="cnicNumber"
                                                class="form-control" placeholder="XXXXX-XXXXXX-X"
                                                value='{{ old('cnicNumber') }}'>
                                            @error('cnicNumber')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Picture of You Holding Cnic</label>
                                            <input type="file" name="pouhcnic" class="form-control">
                                            @error('pouhcnic')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>CNIC (Front Picture)</label>
                                            <input type="file" name="CNICFrontPicture" class="form-control">
                                            @error('CNICFrontPicture')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>CNIC (Back Picture)</label>
                                            <input type="file" name="CNICBackPicture" class="form-control">
                                            @error('CNICBackPicture')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="shopSeller"
                                        style="display: {{ old('AccountType') == 'Shopkeepr' ? 'block' : 'none' }};">
                                        <div class="form-group">
                                            <label>Shop Address</label>
                                            <input type="text" name="shopAddress" class="form-control"
                                                placeholder="123 Main Street, Karachi, Pakistan 12345">
                                            @error('shopAddress')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Shop Name</label>
                                            <input type="text" name="shopName" class="form-control"
                                                placeholder="NetSol Technologies">
                                            @error('shopName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Shop Picture</label>
                                            <input type="file" name="shopPicture" class="form-control">
                                            @error('shopPicture')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Business Card Picture</label>
                                            <input type="file" name="businessCardPicture" class="form-control">
                                            @error('businessCardPicture')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Your Full Name</label>
                                        <input type="text" name="FullName" readonly class="form-control"
                                            value="{{ Auth::user()->fullName }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Father Name</label>
                                        <input type="text" name="FatherName" readonly class="form-control"
                                            value="{{ Auth::user()->fatherName }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" name="EmailAddress" readonly class="form-control"
                                            value="{{ Auth::user()->Email }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="PhoneNumber" readonly class="form-control"
                                            value="{{ Auth::user()->number }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Date Of Birth (According To CNIC)</label>
                                        <input type="text" name="PhoneNumber" readonly class="form-control"
                                            value="{{ Auth::user()->dob }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Your Address</label>
                                        <input type="text" name="PhoneNumber" readonly class="form-control"
                                            value="{{ Auth::user()->address }}">
                                    </div>


                                    <div class="mb-3 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Send Details For
                                            Verification
                                        </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body-->
                        </div>
                    </div> <!-- end card-->
                    <div class="col-md col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Instruction</h4>


                                <p class="card-subtitle mb-2">Fill out the registration form with accurate information.</p>
                                <p class="card-subtitle mb-2">Provide necessary documentation as specified (ID, proof of
                                    address,
                                    etc.).</p>
                                <p class="card-subtitle mb-2">Follow any additional steps outlined in the registration
                                    process.
                                </p>
                                <p class="card-subtitle mb-2">Submit the completed registration form and documents through
                                    the
                                    designated method.</p>
                                <p class="card-subtitle mb-4">Await confirmation of registration status, which may include
                                    further
                                    instructions or steps if needed.</p>



                                <h4>CNIC Details</h4>
                                <img src="{{ asset('assets/images/media/Father_Name-removebg-preview.png') }}"
                                    class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div> <!-- container-fluid -->
    </div>
@endsection

@section('additionScript')
    <script>
        $(document).ready(function() {
            $('#accountType').on('change', function() {
                if ($(this).val() == 'Individual') {
                    $('#individualSeller').css('display', 'block');
                    $('#shopSeller').css('display', 'none');
                } else if ($(this).val() == 'Shopkeepr') {
                    $('#individualSeller').css('display', 'block');
                    $('#shopSeller').css('display', 'block');
                } else {
                    $('#individualSeller').css('display', 'none');
                    $('#shopSeller').css('display', 'none');
                }
            });

            $('#cnicNumber').on('input', function() {
                var inputValue = $(this).val();

                inputValue.replace(/-/g, '')
                if (inputValue.length >= 5 && inputValue.length <= 5) {
                    inputValue = inputValue.slice(0, 5) + '-' + inputValue.slice(5);
                }
                if (inputValue.length >= 13 && inputValue.length <= 14) {
                    inputValue = inputValue.slice(0, 13) + '-' + inputValue.slice(13);
                }
                $(this).val(inputValue);
            });
        });
    </script>
@endsection
