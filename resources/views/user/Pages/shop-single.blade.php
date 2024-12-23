@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11">

        <!-- BREADCRUMBS -->
        <section class="bg-gray-100 px-4">
            <div class="container mx-auto py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#"
                        class="text-skin-secondary">Shop</a>
                    / <a href="#" class="text-skin-secondary">{{ $product->category->name }}</a> /
                    <span>{{ $product->productTitle }}</span>
                </p>
            </div>
        </section>

        <section class="px-4">

            <div class="container mx-auto pb-12">

                <!-- PRODUCT NAME HEADER  -->
                <div class="grid grid-cols-1 lg:grid-cols-2 border-b py-4">
                    <div>
                        <h2 class="text-skin-primary text-2xl font-bold mb-3">{{ $product->productTitle }}</h2>

                        <ul class="flex text-sm text-gray-600">
                            <li class="pl-0 px-4 border-r">Brand: <a href=""
                                    class="text-skin-secondary">{{ $product->brand->name }}</a>
                            </li>
                            <li class="px-4 border-r"><a href="">1 Review</a></li>
                            <li class="px-4">SKU: {{ $product->productSku }}</li>
                        </ul>

                    </div>

                </div>

                <!-- PRODUCT INFO AND IMAGES -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 py-4">

                    <div id="page">
                        <div class="sm:px-6">
                            <div class="column small-11 small-centered">
                                <div class="product-slider">
                                    <div class="main-slider slider-for">
                                        @if ($product->mainImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->mainImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->firstImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->firstImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->secondImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->secondImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->thirdImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->thirdImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->fourthImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->fourthImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->fifthImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->fifthImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                    </div>
                                    <div class="main-slider slider-nav" style="margin-top:40px;">
                                        @if ($product->mainImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->mainImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->firstImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->firstImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->secondImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->secondImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->thirdImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->thirdImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->fourthImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->fourthImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif

                                        @if ($product->fifthImage)
                                            <img src="{{ asset('user_folders/Product_Images/' . $product->fifthImage) }}"
                                                alt="Product" class="h-50 w-72 object-cover rounded-t-xl" />
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col gap-1">
                        <div class="flex flex-col gap-2 pb-6 border-b">
                            <div class="flex items-center gap-2">
                                <h2 class="text-2xl font-bold text-skin-odd">Rs.{{ $product->SellPrice }}</h2> <del
                                    class="text-sm">Rs.{{ $product->originalPrice }}</del>
                            </div>
                            <div>
                                <p class="text-sm">Status: <span class="text-skin-unique font-bold">In Stock</span></p>
                            </div>
                        </div>
                        <div class="px-4 py-6 border-b">
                            <ul class="flex flex-col gap-2 list-disc text-sm text-gray-600">
                                @php
                                    // Decode the JSON data
                                    $specifications = json_decode($product->AboutThisitem, true);
                                @endphp
                                @if (!empty($specifications) && is_array($specifications))
                                    @foreach ($specifications as $spec)
                                        <li>{{ $spec }}</li>
                                    @endforeach
                                @endif
                            </ul>

                            </ul>
                        </div>
                        <div class="py-6 border-b flex flex-col sm:flex-row items-start sm:items-end gap-4 sm:gap-6">
                            {{-- <div class="">
                                <span class="text-gray-600 text-sm">Quantity:</span>
                                <div class="flex rounded-md border gap-4 items-center text-base p-1 w-max">
                                    <button class="px-2" id="dq">-</button>
                                    <div id="quantity_display">1</div>
                                    <button class="px-2" id="iq">+</button>
                                </div>
                            </div> --}}

                            <div class="flex gap-6 items-center">

                                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="quantity" id="quantity"> --}}
                                    <button type="submit" class="btn-1 px-12">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                        <div class="py-6 flex flex-col gap-1">
                            <p class="text-sm">Category: <a href="#"
                                    class="text-skin-secondary transition-all duration-300 hover:text-skin-primary">{{ $product->category->name }}</a>
                            </p>
                        </div>
                    </div>

                </div>

        </section>

        <section class="px-4">
            <div class="container mx-auto pb-12">
                <div class="tabs flex gap-5">
                    <button class="tab-btn active" data-target="productDescription">Product Description</button>
                    <button class="tab-btn" data-target="productSpec">Product Specification</button>
                    <button class="tab-btn" data-target="productReviews">Product Reviews</button>
                </div>

                <div class="container p-4 tab-content active" id="productDescription">
                    <p class="text-gray-600 p-1">{{ $product->productDescription }}</p>
                </div>

                <div class="container p-4 tab-content" id="productSpec">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Component Names</th>
                                    <th scope="col" class="px-6 py-3">Specifications</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <!-- Example data -->
                                        CPU
                                    </th>
                                    <td class="px-6 py-4">4.9GHZ Core Clock Speed</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
<style>#productReviews {
    background-color: #f9f9fb;
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    padding: 30px;
    margin-top: 20px;
}

.section-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 25px;
    border-bottom: 2px solid #007bff;
    padding-bottom: 10px;
}

/* Review Styles */
.review {
    background-color: #ffffff;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    font-size: 18px;
    font-weight: bold;
}

.rating {
    color: #ffb400;
    font-size: 16px;
}

.review-text {
    font-size: 16px;
    color: #555;
    margin-bottom: 15px;
    line-height: 1.6;
}

/* Reply Styles */
.replies {
    margin-top: 15px;
    border-top: 1px solid #e0e0e0;
    padding-top: 10px;
}

.reply {
    background-color: #f0f4f8;
    padding: 10px;
    border-radius: 8px;
    margin-top: 10px;
    font-size: 14px;
    color: #444;
}

/* Form Styles */
.reply-form,
.review-form {
    background-color: #f7f7f9;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    margin-top: 20px;
}

textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 15px;
    resize: vertical;
    font-size: 14px;
    transition: border-color 0.3s;
}

textarea:focus {
    border-color: #007bff;
    outline: none;
}

select {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    transition: border-color 0.3s;
}

select:focus {
    border-color: #007bff;
    outline: none;
}

/* Button Styles */
.btn-submit {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s;
}

.btn-submit:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
}

.btn-submit:active {
    background-color: #004494;
}</style>
                 <div class="container p-4 tab-content" id="productReviews">
                    <section id="reviews">
                        <h3 class="section-title">Customer Reviews</h3>
                        @foreach ($product->reviews->where('approved', true) as $review)
                        <div class="review">
                            <div class="review-header">
                                <strong>{{ $review->user->fullName }}</strong>
                                <span class="rating">Rating: {{ $review->rating }} ★</span>
                            </div>
                            <p class="review-text">{{ $review->review }}</p>
                            <div class="replies">
                                @foreach ($review->replies->where('approved', true) as $reply)
                                <div class="reply">
                                    <strong>{{ $reply->user->fullName }}</strong>: {{ $reply->reply }}
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        @auth
                        <form class="review-form" action="{{ route('review.store', $product->id) }}" method="POST">
                            @csrf
                            <label for="rating">Rating:</label>
                            <select name="rating" required>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }} Star</option>
                                @endfor
                            </select>
                            <textarea name="review" placeholder="Write your review..." rows="4" required></textarea>
                            <button type="submit" class="btn-submit">Submit Review</button>
                        </form>
                        @endauth
                    </section>
                </div>
            
            
                
            </div>
        </section>

<!-- Suggested Products Section -->
<section class="px-4">
    <div class="container mx-auto pb-12">
        <h3 class="text-lg font-bold mb-6">Suggested Products</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($suggestedProducts as $suggestedProduct)         
               <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
                <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
                    <a href="{{ route('shop-single', $product->id) }}">
                        <img src="{{ asset('user_folders/Product_Images/' . $suggestedProduct->mainImage) }}" 
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
</section>


    </main>
@endsection

@section('singleScript')
    <style>
        .slider-for img {
            height: 500px;
            object-fit: contain;
        }

        .slider-nav img {
            height: 100px;
            object-fit: contain;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .tab-btn.active {
            background-color: rgb(1, 61, 196);
            padding: 10px 20px;
            border-radius: 10px;
            color: white;
            transition: 0.5s;
            /* Optional styling for the active tab */
        }
    </style>
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });




        // Select all tab buttons and tab content sections
        const tabButtons = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');

        // Add event listener to each button
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove 'active' class from all buttons and all content sections
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add 'active' class to the clicked button and its corresponding content
                button.classList.add('active');
                const target = document.getElementById(button.getAttribute('data-target'));
                target.classList.add('active');
            });
        });




        // $(document).ready(function() {
        //     let quantityDisplay = $('#quantity_display');
        //     let quantity = $('#quantity').val() || 1; // Initialize quantity from the display

        //     // Use 'iq' and 'dq' selectors correctly
        //     let iq = $('#iq');
        //     let dq = $('#dq'); // Corrected the selector to '.dq'

        //     // Update the display function
        //     function updateDisplay() {
        //         quantityDisplay.text(quantity); // Update the displayed quantity
        //     }

        //     // Increment quantity
        //     iq.on('click', function() {
        //         quantity += 1; // Correctly increment the quantity
        //         updateDisplay(); // Update the display
        //     });

        //     // Decrement quantity
        //     dq.on('click', function() {
        //         if (quantity !== 1) {
        //             quantity -= 1;
        //         } // Correctly decrement the quantity
        //         updateDisplay(); // Update the display
        //     });

        //     updateDisplay(); // Initial display update
        // });
    </script>
@endsection
