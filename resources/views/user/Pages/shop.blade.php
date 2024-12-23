@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11">


        <section class="px-4">

            <div class="container mx-auto py-12">
                <div class="grid grid-cols-6 sm:border rounded-xl overflow-hidden">

                    <div class="p-6 bg-skin-fill lg:flex flex-col gap-8 max-lg:hidden">
                        <form method="GET" action="{{ route('shop') }}">
                            <div class="flex flex-col gap-3">
                                <!-- Price Filter -->
                                <h3 class="filter-heading">Price</h3>
                                <input class="product-form-inp" placeholder="Lowest" type="number" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                                <input class="product-form-inp" placeholder="Highest" type="number" name="max_price" id="max_price" value="{{ request('max_price', 500) }}">
                            </div>
                        <br>
                            <!-- Category Filter -->
                            <div class="flex flex-col gap-3">
                                <h3 class="filter-heading">Category</h3>
                                <select name="category_id" class="product-form-inp" id="category_id">
                                    <option value="">All Categories</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" 
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        
                            <div class="flex gap-2">
                                <button type="submit"
                                    class="mt-3 rounded-md w-full py-1 text-sm border border-blue-700 font-bold bg-white text-skin-primary hover:border-blue-700 hover:bg-skin-secondary hover:text-skin-inverted transition-all duration-300">
                                    Filter
                                </button>
                                
                                <!-- Reset Filters Button -->
                                <a href="{{ route('shop') }}" 
                                    class="mt-3 rounded-md w-full py-1 text-sm border border-gray-700 font-bold bg-white text-gray-500 hover:border-gray-700 hover:bg-gray-100 hover:text-skin-primary transition-all duration-300 text-center">
                                    Reset Filters
                                </a>
                            </div>
                        </form>
                        <div class="flex flex-col gap-3">
                            <h3 class="filter-heading">Color</h3>

                            <ul class="flex flex-col gap-2">
                                <li class="color-li group"><span class="color-circle bg-white"></span><span
                                        class="color-text">White</span></li>
                                <li class="color-li group"><span class="color-circle bg-black"></span><span
                                        class="color-text">Black</span></li>
                                <li class="color-li group"><span class="color-circle bg-green-600"></span><span
                                        class="color-text">Green</span></li>
                                <li class="color-li group"><span class="color-circle bg-red-600"></span><span
                                        class="color-text">Red</span></li>
                                <li class="color-li group"><span class="color-circle bg-yellow-400"></span><span
                                        class="color-text">Yellow</span></li>
                            </ul>

                        </div>
                        <div class="flex flex-col gap-3">
                            <h3 class="filter-heading">Size</h3>

                            <ul class="flex flex-col gap-2">
                                <li class=""><label class="flex items-center color-li group" for="big"><input
                                            class="filter-checkbox" type="checkbox" name="big" id="big"><span
                                            class="color-text">Big</span></label></li>
                                <li class=""><label class="flex items-center color-li group" for="medium"><input
                                            class="filter-checkbox" type="checkbox" name="medium" id="medium"><span
                                            class="color-text">Medium</span></label></li>
                                <li class=""><label class="flex items-center color-li group" for="small"><input
                                            class="filter-checkbox" type="checkbox" name="small" id="small"><span
                                            class="color-text">Small</span></label></li>
                            </ul>

                        </div>


                        <div class="flex flex-col gap-3">
                            <h3 class="filter-heading">Tags</h3>

                            <ul class="flex flex-wrap gap-2 w-full">
                                <li class=""><label class="tags-check-label group" for="smartphone"><input
                                            class="tags-checkbox" type="checkbox" name="smartphone" id="smartphone"><span
                                            class="tags-text">Smartphone</span></label></li>
                                <li class=""><label class="tags-check-label group" for="laptop"><input
                                            class="tags-checkbox" type="checkbox" name="laptop" id="laptop"><span
                                            class="tags-text">Laptop</span></label></li>
                                <li class=""><label class="tags-check-label group" for="tv"><input
                                            class="tags-checkbox" type="checkbox" name="tv" id="tv"><span
                                            class="tags-text">TV</span></label>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="lg:col-span-5 max-lg:col-span-6 bg-skin-fill">


                        <div
                            class=" p-0 py-4 sm:p-4 border-b sm:border-b-0  sm:border-l flex items-end justify-between gap-4">

                            <div class="flex-1 flex flex-col md:flex-row gap-2 sm:gap-0 justify-between md:items-center">

                                <p class="text-xs sm:text-sm text-skin-primary">Showing 1–15 of 47 results</p>

                                <select
                                    class="text-xs sm:text-sm w-max border rounded-md py-1 focus:ring-0 focus:outline-none"
                                    name="" id="">
                                    <option value="default">Default Sorting</option>
                                    <option value="popular">Sort By Popularity</option>
                                    <option value="latest">Sort By Latest</option>
                                    <option value="low-to-high">Sort By Price: Low To High</option>
                                    <option value="high-to-low">Sort By Price: High To Low</option>
                                </select>
                            </div>

                            <button
                                class="lg:hidden rounded-md w-max py-1 px-4 sm:px-8 text-sm border border-blue-700 font-bold bg-white text-skin-primary  hover:bg-skin-secondary hover:text-skin-inverted duration-300"
                                type="button" data-drawer-target="drawer-right-example"
                                data-drawer-show="drawer-right-example" data-drawer-placement="right"
                                aria-controls="drawer-right-example">
                                < Filter</button>

                        </div>

                        <div id="shopProducts"
                            class="py-4 sm:p-4 grid place-items-center grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-6 gap-4 sm:border sm:border-b-0 sm:border-r-0">


                            @foreach ($products as $product)
                                <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
                                    <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
                                        <a href="{{ route('shop-single', $product->id) }}">
                                            <img src="user_folders/Product_Images/{{ $product->mainImage }}"
                                                alt="product1" class="object-contain origin-center aspect-square">
                                        </a>
                                        <div
                                            class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

                                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" id="addToCart" class="product-card-icons">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 512 512" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="32"
                                                            d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                                                        </path>
                                                        <path fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="32"
                                                            d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-center gap-2 sm:gap-4">
                                        <div class="flex items-center">
                                            <h4 class="text-skin-unique font-bold text-sm sm:text-lg mr-2">
                                                Rs.{{ $product->SellPrice }}</p>
                                            </h4>
                                            <del class="text-gray-400 text-xs sm:text-base mr-2">Rs.{{ $product->originalPrice }}
                                                </p></del>
                                        </div>

                                        <a href="{{ route('shop-single', $product->id) }}"
                                            class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">
                                            {{ $product->productTitle }}</a>

                                        <p class="text-xs sm:text-sm">Rating: 4.5</p>

                                        <div class="flex flex-col min-[350px]:flex-row gap-2 justify-between">
                                            <span class="text-xs">By: <a href="/vendor"
                                                    class="text-skin-unique">{{ $product->users->fullName }}</a></span>
                                            @if ($product->users->approved == 1)
                                                <p class="text-xs text-skin-secondary flex items-center gap-1">
                                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                        viewBox="0 0 512 512" height="1em" width="1em"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L369 209z">
                                                        </path>
                                                    </svg>
                                                    Verified
                                                </p>
                                            @else
                                                <p class="text-xs text-skin-secondary flex items-center gap-1">
                                                    <i class="bi bi-x-circle"></i>
                                                    Un-verified
                                                </p>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>


                    </div>


                </div>
            </div>


        </section>











    </main>

    <style>
        .product_image {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }
    </style>
@endsection
