@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11" id="success">


        <section class="bg-skin-fill-unique px-24 max-xl:px-8 max-lg:px-0 max-lg:py-10 py-10">


            <div class="bg-skin-fill p-8 border rounded-xl">
                <h2 class="text-skin-inverted text-3xl font-bold text-center mb-8">Thank you! Your order has been
                    received.
                </h2>

                <div class="grid grid-cols-1 lg:gap-0 md:grid-cols-2 lg:grid-cols-4">

                    <div class="flex flex-col items-center gap-2 max-lg:border-b md:border-r p-4">
                        <p>Order Number:</p> <span>{{ $order[0]->parent_order_id }}</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 max-lg:border-b lg:border-r p-4">
                        <p>Date:</p> <span>{{ $order[0]->created_at }}</span>
                    </div>


                    <div class="flex flex-col items-center gap-2 max-md:border-b md:border-r p-4">
                        <p>Payment Method:</p> <span>{{ $order[0]->paymentType }}</span>
                    </div>

                    <div class="flex flex-col items-center gap-2 p-4">
                        @php
                            $total = 0;
                            foreach ($order as $item) {
                                $total += $item['total_amount'];
                            }
                        @endphp
                        <p>Total:</p> <span>Rs.{{ $total }}</span>
                    </div>

                </div>



                <div class="flex flex-col items-center mt-14">
                    <div class="!max-w-screen-sm w-full">
                        <h3 class="text-2xl font-semibold mb-6">Order Details</h3>




                        <div>
                            <div class="flex gap-6 justify-between items-center border-b py-4">
                                <p class="uppercase">Product</p>
                                <p class="uppercase">total</p>
                            </div>
                            <div class="border-b flex flex-col gap-5 py-4">


                                @foreach ($order as $singleOrder)
                                    <div class="flex gap-6 justify-between items-center">
                                        <p class="text-sm">
                                            @if ($singleOrder->all_products)
                                                {{-- Check if all_products exists --}}
                                                {{ $singleOrder->all_products->productTitle }}
                                            @endif
                                            × {{ $singleOrder->quantity }}
                                        </p>
                                        <p class="text-skin-inverted text-sm font-bold">Rs.{{ $singleOrder->total_amount }}
                                        </p>
                                    </div>
                                @endforeach



                            </div>
                            <div class="flex gap-6 justify-between items-center border-b py-4">
                                <p class="font-bold text-skin-inverted">Subtotal:</p>
                                <p class="font-bold text-skin-inverted">Rs.{{ $total }}</p>
                            </div>
                            {{-- <div class="flex gap-6 justify-between items-center border-b py-4">
                                <p class="font-bold text-skin-inverted">Shipping:</p>
                                <p class="font-bold text-skin-inverted">$30.00 <span class="text-xs font-normal">via
                                        Flat Rate</span></p>
                            </div> --}}
                            <div class="flex gap-6 justify-between items-center border-b py-4">
                                <p class="font-bold text-xl text-skin-inverted">Total:</p>
                                <p class="font-bold text-xl text-skin-muted">Rs.{{ $total }}</p>
                            </div>
                        </div>


                    </div>
                </div>

            </div>


        </section>


    </main>

    <style>
        #success p,
        #success h2,
        #success td,
        #success label {
            color: black !important;
        }
    </style>
@endsection
