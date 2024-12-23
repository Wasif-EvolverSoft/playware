@extends('user.Layout.Layout')
@section('mainContent')
    <style>
        .upload-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 20px 0;
        }

        .upload-label {
            background-color: #013DC4;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
            width: 420px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        .upload-label:hover {
            background-color: #2359d8;
            /* Darker shade on hover */
        }

        .upload-input {
            display: none;
            /* Hide the default file input */
        }

        .upload-input:focus+.upload-label,
        .upload-label:focus {
            outline: 2px solid #ff6348;
            /* Focus outline color */
        }
    </style>

    <main class="mt-11">

        <section class="bg-gray-100 px-4">
            <div class="container mx-auto py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#"
                        class="text-skin-secondary">Dashboard</a>
                    /
                    <span>Account</span>
                </p>
            </div>
        </section>

        <section class="px-4 flex justify-center items-center py-20">
            <h1 class="text-6xl font-bold">Account</h1>
        </section>

        <section class="px-4 py-12">
            <div class="container mx-auto">
                <div class="grid grid-cols-4 account_apge">



                    <div class="text-skin-primary lg:block col-span-1">
                        <ul>
                            <li id="accountBtn"
                                class="border-b-0 border hover:cursor-pointer  text-lg font-bold transition-all duration-300 {{ session('paymentSuccess') ?  'hover:bg-skin-secondary hover:text-skin-inverted' : 'bg-skin-secondary text-skin-inverted' }} ">
                                <span class="block py-4 px-4">Account</span>
                            </li>
                            <li id="orderBtn"
                                class="border-b-0 border hover:cursor-pointer  text-lg font-bold transition-all duration-300 {{ session('paymentSuccess') ? 'bg-skin-secondary text-skin-inverted' : 'hover:bg-skin-secondary hover:text-skin-inverted' }}">
                               <a href="{{ route('user.orders') }}"> <span class="block py-4 px-4">Orders</span></a>
                            </li>

                            <li
                                class="border-b-0 border hover:cursor-pointer  text-lg font-bold transition-all duration-300 hover:bg-skin-secondary hover:text-skin-inverted">
                                <a href="{{ route('logoutUser') }}" class="block py-4 px-4">Logout</a>
                            </li>
                        </ul>
                    </div>

                    <div id="account" class="col-span-2" style="{{ session('paymentSuccess') ? 'display: none' : '' }}">
                        <div class="text-skin-primary col-span-4 lg:col-span-3 px-4">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('userUpdateData') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-col sm:flex-row justify-between gap-3">
                                    <span class="w-full sm:w-1/2">
                                        <label for="firstname"
                                            class="block text-xs font-semibold text-gray-600 uppercase">Full
                                            Name</label>
                                        <input id="firstname" type="text" name="fullName" placeholder="Ali"
                                            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                            required value="{{ $user->fullName }}" />
                                        <small style="color:red;">
                                            @error('fullName')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </small>
                                    </span>
                                </div>
                                <label for="number"
                                    class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Number</label>
                                <input id="number" type="number" name="number" placeholder="+92 123 4231499"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                    required value="{{ $user->number }}" />
                                <small style="color:red;">
                                    @error('number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                                <label for="email"
                                    class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="exampl@gmail.com"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                    required value="{{ $user->Email }}" />
                                <label for="password"
                                    class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>

                                <input id="password" type="password" name="password" placeholder="**********"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md" />
                                <label for="dob" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Date
                                    Of
                                    Birth</label>
                                <input id="dob" type="date" name="dob"
                                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                    required value="{{ $user->dob }}" />
                                <small style="color:red;">
                                    @error('dob')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </small>
                                <button type="submit"
                                    class="w-full py-3 mt-6 font-medium tracking-widest text-skin-inverted uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-700 transition-all duration-300 hover:shadow-none rounded-md">
                                    update
                                </button>
                            </form>

                        </div>
                    </div>

                    {{-- <div id="order" class="col-span-2 px-4" style="{{ session('paymentSuccess') ? 'display: block' : 'display: none' }}">
                        @if (session('paymentSuccess'))
                            <span
                                style="width: 100%; display: block; margin-bottom: 20px; background-color: rgb(58, 192, 58); color: white; padding: 10px; border-radius: 4px;">{{ session('paymentSuccess') }}</span>
                        @endif
                        <div class="relative overflow-x-auto">
                            <table class="w-full text-sm text-left rtl:text-right">
                                <thead class="text-xs uppercase">
                                    <tr>
                                        <th class="px-6 py-3">
                                            Order Id
                                        </th>
                                        <th class="px-6 py-3">
                                            Order Date
                                        </th>
                                        <th class="px-6 py-3">
                                            Status
                                        </th>
                                        <th class="px-6 py-3">
                                            Amount
                                        </th>
                                        <th class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="" style="border: 1px solid black; padding: 10px;">
                                            <th scope="row">
                                                {{ '#' . $order->parent_order_id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $order->all_products->created_at }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $order->status }}
                                            </td>

                                            <td>
                                                {{ 'Rs.' . $order->totalAmountByParentOrder($order->parent_order_id) }}
                                            </td>
                                            <td>
                                                <button class="btn-1 w-full loadOrderDetails"
                                                    style="display:block;margin-bottom:10px;"
                                                    data-order-id="{{ $order->parent_order_id }}">View Order
                                                    Details</button>
                                                @if ($order->paymentType == 'Direct Bank Transfer' && $order->paymentCheck == 'Not Paid')
                                                    <button class="btn-1 w-full payMoneyBtn"
                                                        style="display:block;margin-bottom:10px;"
                                                        data-order_id="{{ $order->parent_order_id }}"
                                                        data-total-amount="{{ $order->totalAmountByParentOrder($order->parent_order_id) }}">Pay
                                                        Amount</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="overlay"></div>
                            <div class="order-details-modal">
                                <div class="close">x</div>
                                <div class="table-container"></div>
                            </div>
                            <div class="pay-amount">
                                <div class="close">x</div>
                                <p>Please Send <span class="amount"></span> To These Details & Upload The Screenshot</p>

                                <form action="{{ route('account.paidPost') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" id="ParentOrderId">
                                    <div class="upload-container">
                                        <label for="uploadPaymentScreenShot" id="uploadPaymentScreenShotCont"
                                            class="upload-label">
                                            <img src="{{ asset('assets/images/downloads.png') }}"
                                                style="width: 40px; height: 40px; filter: invert();" alt="">
                                            <h3>Upload Payment Screenshot</h3>
                                        </label>
                                        <input type="file" id="uploadPaymentScreenShot" name="uploadPaymentScreenShot"
                                            class="upload-input" required />
                                    </div>
                                    <button type="submit" class="btn-1 w-full">Paid</button>
                                </form>
                            </div>
                        </div>

                    </div> --}}
                </div>

            </div>
        </section>


    </main>
@endsection
@section('singleScript')
    <script>
        $(document).ready(function() {
            function toggleElements(showElement, hideElement, addClassElement, removeClassElement, addClasses,
                removeClasses) {
                $(showElement).show();
                $(hideElement).hide();
                $(removeClassElement).removeClass(removeClasses);
                $(addClassElement).addClass(addClasses);
            }

            $('#orderBtn').on('click', function() {
                toggleElements('#order', '#account', '#orderBtn', '#accountBtn',
                    'bg-skin-secondary text-skin-inverted', 'bg-skin-secondary text-skin-inverted');
            });
            $('#accountBtn').on('click', function() {
                toggleElements('#account', '#order', '#accountBtn', '#orderBtn',
                    'bg-skin-secondary text-skin-inverted', 'bg-skin-secondary text-skin-inverted');
            })


            $('#uploadPaymentScreenShot').on('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {

                        const imgElement = $('<img>', {
                            src: e.target.result,
                            alt: 'Uploaded Payment Screenshot',
                            class: 'uploaded-image',
                        });


                        $('#uploadPaymentScreenShotCont').html(imgElement);
                        $('#uploadPaymentScreenShotCont').css('background-color', 'transparent');
                        $('.upload-label').css('height', 'fit-content');
                    };

                    reader.readAsDataURL(file);
                }
            });
        })
    </script>
    <style>
        #order {
            widows: 100vw;
        }

        @media(max-width:767px) {
            .account_apge {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>


    <style>
        .overlay {
            display: none;
            background: black;
            opacity: 0.5;
            width: 100vw;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
        }

        .order-details-modal,
        .pay-amount {
            position: fixed;
            left: 50%;
            top: 50%;
            width: 500px;
            z-index: 2;
            transform: translate(-50%, -50%);
            background: white;
            text-align: left;
            padding: 40px;
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
            display: none;
        }

        .close {
            background: blue;
            display: flex;
            width: 20px;
            height: 20px;
            justify-content: center;
            align-items: center;
            color: white;
            border-radius: 50%;
            position: absolute;
            right: 20px;
            top: 20px;
            cursor: pointer;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('.loadOrderDetails').click(function() {
                let orderId = $(this).data('order-id');

                $.ajax({
                    url: '/get-order-details', // The URL to your Laravel route
                    type: 'GET', // HTTP method
                    data: {
                        order_id: orderId
                    }, // Data sent to the server
                    dataType: 'json', // Expected response format
                    success: function(responseData) {
                        console.log(responseData);
                        // Create the initial table structure
                        let output = `<table border="1">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3">Product Name</th>
                        <th scope="col class="px-6 py-3" >Quantity</th>
                        <th scope="col class="px-6 py-3">Price</th>
                        <th scope="col class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>`;

                        responseData.forEach(item => {
                            if (item.all_products && item.all_products.productTitle) {
                                output += `<tr>
                    <td class="px-6 py-3">${item.all_products.productTitle}</td>
                    <td class="px-6 py-3">${item.quantity}</td>
                    <td class="px-6 py-3">${'Rs.'+item.total_amount}</td>
                    <td class="px-6 py-3"><button class="btn-1 w-full" data-id="${item.id}">Mark As Complete</button></td>
                   </tr>`;
                            }
                        });

                        output += `</tbody></table>`;

                        // Add the output to your desired container (e.g., a div with id `table-container`)
                        $('.table-container').html(output);
                        $('.order-details-modal').fadeIn();
                        $('.overlay').fadeIn();
                    },

                    error: function(xhr, status, error) {
                        console.error('An error occurred:', error);
                    }
                });
            });
            $('.close').click(function() {
                $('.order-details-modal').fadeOut();
                $('.overlay').fadeOut();
                $('.pay-amount').fadeOut();
            });
            $('.overlay').click(function() {
                $('.order-details-modal').fadeOut();
                $('.overlay').fadeOut();
                $('.pay-amount').fadeOut();
            });
            $('.payMoneyBtn').click(function() {
                let amount = $(this).data('total-amount');
                let order_id = $(this).data('order_id');
                $('.pay-amount').fadeIn();
                $('.amount').text("Rs." + amount);
                $('#ParentOrderId').val(order_id);
            });

        });
    </script>
@endsection
