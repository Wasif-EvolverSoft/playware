@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11" id="cart">

        <section class="bg-gray-100 px-4">
            <div class="container mx-auto py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#"
                        class="text-skin-secondary">Cart</a>
                    /
                    <span>Cart</span>
                </p>
            </div>
        </section>

        <section class="px-4 flex justify-center items-center py-20">
            <h1 class="text-6xl font-bold">Cart</h1>
        </section>

        <section class="px-4 py-12">
            <div class="container mx-auto">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-y-8 md:gap-y-0 bg-skin-fill rounded-xl">

                    <div class="col-span-2 sm:rounded-md md:pr-4">
                        <div class="relative overflow-x-auto py-4">
                            <table class="w-full text-sm text-left rtl:text-right text-skin-primary">
                                <thead class="text-xs  uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-4 py-3">
                                            <span class="sr-only">Image</span>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Product
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Qty
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Subtotal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id => $details)
                                            <tr class="bg-skin-fill border-b hover:bg-skin-fill-unique duration-300"
                                                id="product-{{ $details['id'] }}">
                                                <td class="p-4 min-w-32 max-w-36">
                                                    <img src='{{ asset('user_folders/Product_Images/' . $details['image']) }}'
                                                        class="cart-img" alt="Apple Watch" />
                                                </td>
                                                <td class="px-6 min-w-44 py-4 font-semibold text-skin-inverted">
                                                    {{ $details['name'] }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center ">
                                                        <div>
                                                            <input type="number" id="first_product"
                                                                class="quantity text-center bg-skin-fill-unique w-14 border border-gray-300  text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 remove-number-arrows"
                                                                value="{{ $details['quantity'] }}"
                                                                data-id='{{ $details['id'] }}' required />
                                                        </div>

                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 font-semibold text-skin-inverted price">
                                                    Rs.{{ $details['total'] }}
                                                </td>
                                                <td class="px-6 py-4">


                                                    <form action="{{ route('cart.remove', $details['id']) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submits"><span
                                                                class="text-red-600 flex items-center justify-center cursor-pointer text-xl font-bold">
                                                                <svg stroke="currentColor" fill="currentColor"
                                                                    stroke-width="0" viewBox="0 0 24 24" height="1em"
                                                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M4 8H20V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V8ZM6 10V20H18V10H6ZM9 12H11V18H9V12ZM13 12H15V18H13V12ZM7 5V3C7 2.44772 7.44772 2 8 2H16C16.5523 2 17 2.44772 17 3V5H22V7H2V5H7ZM9 4V5H15V4H9Z">
                                                                    </path>
                                                                </svg> </span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td>
                                                Your cart is empty.
                                            </td>
                                        </tr>
                                    @endif


                                </tbody>

                            </table>
                        </div>

                        <div class="py-6 flex gap-4 flex-col sm:flex-row justify-between">
                            <a href="{{ route('shop') }}"><button class="btn-1 w-full sm:w-max">Back To Shop</button></a>
                        </div>
                    </div>

                    <div class="border rounded-md p-5">
                        <div class="flex flex-col gap-4 pb-4 mb-4 border-b">
                            <span class="text-2xl font-semibold">Coupon Code</span>
                            <div class="flex gap-2">
                                <input type="text"
                                    class="border rounded-md p-2 bg-gray-100 focus:border-black outline-none"
                                    placeholder="Coupon Code">
                                <button class="btn-1">Apply</button>
                            </div>
                        </div>
                        <div class="flex justify-between items-center pb-4 mb-4 border-b">
                            <span class="text-2xl font-semibold">Subtotal</span> <span class="text-skin-muted font-semibold"
                                id="SubTotal">Rs.{{ $subTotal }}</span>
                        </div>
                        {{-- <div class="pb-4 mb-4 border-b">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-2xl font-semibold">Shipping</span> <span
                                    class="text-skin-muted font-semibold" id="selected-fee"></span>
                            </div>
                            <div class="flex flex-col gap-3">

                                @foreach ($shipping as $ship)
                                    <label for="opt{{ $ship->id }}"
                                        class="flex items-center gap-2 text-sm text-skin-inverted cursor-pointer">
                                        <input class="focus:ring-0 focus:outline-none focus:border-none"
                                            value="{{ $ship->fees }}" type="radio" id="opt{{ $ship->id }}"
                                            name="shipping" />{{ $ship->shippingClass }}
                                    </label>
                                @endforeach
                            </div>

                        </div> --}}
                        <div class="flex justify-between items-center pb-4 mb-4 border-b">
                            <span class="text-2xl font-semibold">Total</span> <span
                                class="text-skin-muted font-semibold text-2xl" id="total">Rs.{{ $subTotal }}</span>

                        </div>

                        <form action="">

                        </form>
                        <a href="{{ route('checkout') }}"> <button class="btn-1 w-full">Proceed to
                                Checkout</button></a>
                    </div>

                </div>

            </div>
        </section>


    </main>


    <style>
        #cart p,
        #cart td,
        #cart label {
            color: black !important;
        }
    </style>


@endsection

@section('singleScript')
    <script>
        $(document).ready(function() {
            // Listen for changes on the radio buttons
            $('input[name="shipping"]').on('change', function() {
                // Get the fees from the selected radio button
                let selectedFees = $(this).val();
                // Update the new div with the selected fees
                $('#selected-fee').text(`Rs.${selectedFees}`);
            });


            $('.quantity').on('change', function() {
                let Quantity = $(this).val();
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('Update.Cart.Quantity') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        quantity: Quantity,
                        id: id
                    },
                    success: function(res) {
                        if (res) {
                            // Update product's total price
                            let product = $('#product-' + res.id);
                            product.find('.price').html('Rs.' + res.total);

                            // Update the overall cart total
                            let total = 0;
                            $('.price').each(function() {
                                let priceText = $(this).text().replace('Rs.', '')
                                    .trim();
                                total += parseInt(priceText);
                            });

                            // Set the new total
                            $("#total").html('Rs.' + total);
                            $("#SubTotal").html('Rs.' + total);
                        }
                    },
                    error: function(err) {
                        alert(
                            'We are facing some errors, please email us at support@playware.com.pk'
                        );
                    }
                });
            });

        });
    </script>
@endsection
