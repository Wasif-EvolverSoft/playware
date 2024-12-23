

if (window.location.pathname == '/') {


    for (let i = 0; i <= 6; i++) {

        document.getElementById('productDiv1').innerHTML += `
    <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
    <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
        <a href="/product-page">
            <img src="assets/images/products/laptop/3.jpg" alt="product1"
                class="object-cover origin-center aspect-square">
        </a>
        <div
            class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            <button id="addToCart" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"
                        d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                    </path>
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                    </path>
                </svg>
            </button>

            <button id="quickView" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 576 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                    </path>
                </svg>
            </button>

            <button id="addToWishlist" class="product-card-icons">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                    </path>
                </svg>
            </button>

        </div>
    </div>
    <div class="flex flex-col justify-center gap-2 sm:gap-4">
        <div class="flex items-center">
            <h4 class="text-skin-unique font-bold text-sm sm:text-lg mr-2">$425.47</h4>
            <del class="text-gray-400 text-xs sm:text-base mr-2">$425.47</del>
        </div>

        <a href="/product-page" class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">Apple MacBook Air Retina
            13.3-Inch
            Laptop </a>

            <p class="text-xs sm:text-sm">Rating: 4.5</p>
            
        <div class="flex flex-col min-[350px]:flex-row gap-2 justify-between">
            <span class="text-xs">By: <a href="/vendor" class="text-skin-unique">User1</a></span>
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
        </div>

    </div>
</div>
    `




        document.getElementById('productDiv2').innerHTML += `
    <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
    <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
        <a href="/product-page">
            <img src="assets/images/products/laptop/3.jpg" alt="product1"
                class="object-cover origin-center aspect-square">
        </a>
        <div
            class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            <button id="addToCart" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"
                        d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                    </path>
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                    </path>
                </svg>
            </button>

            <button id="quickView" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 576 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                    </path>
                </svg>
            </button>

            <button id="addToWishlist" class="product-card-icons">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                    </path>
                </svg>
            </button>

        </div>
        <div class="absolute top-0 right-0 px-3 rounded-md w-max bg-orange-600">
            <span class="text-skin-inverted text-xs font-bold">-12%</span>
        </div>
    </div>
    <div class="flex flex-col gap-2 sm:gap-4">
        <a href="/product-page" class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">Apple MacBook Air Retina
            13.3-Inch
            Laptop </a>

        <p class="text-xs sm:text-sm">Rating: 4.5</p>

        <div class="flex flex-col min-[350px]:flex-row gap-2 justify-between">
        <span class="text-xs">By: <a href="/vendor" class="text-skin-unique">User1</a></span>
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
    </div>

        <div class="flex items-center">
            <h4 class="text-skin-odd text-sm sm:text-base font-bold mr-2">$425.47</h4>
            <del class="text-gray-400 text-xs sm:text-sm mr-2">$425.47</del>
        </div>

    </div>
</div>
    `



        document.getElementById('productDiv3').innerHTML += `
    <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
    <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
        <a href="/product-page">
            <img src="assets/images/products/laptop/3.jpg" alt="product1"
                class="object-cover origin-center aspect-square">
        </a>
        <div
            class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            <button id="addToCart" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"
                        d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                    </path>
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                    </path>
                </svg>
            </button>

            <button id="quickView" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 576 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                    </path>
                </svg>
            </button>

            <button id="addToWishlist" class="product-card-icons">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                    </path>
                </svg>
            </button>

        </div>
        <div class="absolute top-0 right-0 px-3 rounded-md w-max bg-orange-600">
            <span class="text-skin-inverted text-xs font-bold">-12%</span>
        </div>
    </div>
    <div class="flex flex-col gap-2 sm:gap-4">
        <a href="/product-page" class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">Apple MacBook Air Retina
            13.3-Inch
            Laptop </a>

        <p class="text-xs sm:text-sm">Rating: 4.5</p>

        <div class="flex flex-col min-[350px]:flex-row gap-2 justify-between">
        <span class="text-xs">By: <a href="/vendor" class="text-skin-unique">User1</a></span>
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
    </div>

        <div class="flex items-center">
            <h4 class="text-skin-odd text-sm sm:text-base font-bold mr-2">$425.47</h4>
            <del class="text-gray-400 text-xs sm:text-sm mr-2">$425.47</del>
        </div>

    </div>
</div>
    `



        document.getElementById('productDiv4').innerHTML += `
    <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
    <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
        <a href="/product-page">
            <img src="assets/images/products/laptop/3.jpg" alt="product1"
                class="object-cover origin-center aspect-square">
        </a>
        <div
            class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

            <button id="addToCart" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32"
                        d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                    </path>
                    <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="32" d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                    </path>
                </svg>
            </button>

            <button id="quickView" class="product-card-icons">
                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 576 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                    </path>
                </svg>
            </button>

            <button id="addToWishlist" class="product-card-icons">

                <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                    viewBox="0 0 512 512" height="1em" width="1em"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                    </path>
                </svg>
            </button>

        </div>
        <div class="absolute top-0 right-0 px-3 rounded-md w-max bg-orange-600">
            <span class="text-skin-inverted text-xs font-bold">-12%</span>
        </div>
    </div>
    <div class="flex flex-col gap-2 sm:gap-4">
        <a href="/product-page" class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">Apple MacBook Air Retina
            13.3-Inch
            Laptop </a>

        <p class="text-xs sm:text-sm">Rating: 4.5</p>

        <div class="flex flex-col min-[350px]:flex-row gap-2 justify-between">
        <span class="text-xs">By: <a href="/vendor" class="text-skin-unique">User1</a></span>
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
    </div>

        <div class="flex items-center">
            <h4 class="text-skin-odd text-sm sm:text-base font-bold mr-2">$425.47</h4>
            <del class="text-gray-400 text-xs sm:text-sm mr-2">$425.47</del>
        </div>

    </div>
</div>
    `
    }

}



else if (window.location.pathname == '/shop.html') {


    for (let j = 0; j < 10; j++) {

        document.getElementById('shopProducts').innerHTML += `
    <div class="max-w-60 border rounded-md overflow-hidden p-2 sm:p-4">
                                <div class="group relative flex items-center justify-center max-h-48 overflow-hidden">
                                    <a href="/product-page">
                                        <img src="../assets/Images/products/laptop/3.jpg" alt="product1"
                                            class="object-cover origin-center aspect-square">
                                    </a>
                                    <div
                                        class="bg-white w-full py-2 absolute bottom-0 flex justify-around items-center translate-y-2 invisible opacity-0 transition-all ease-in-out duration-200 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0">

                                        <button id="addToCart" class="product-card-icons">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 512 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="32"
                                                    d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32">
                                                </path>
                                                <path fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="32"
                                                    d="M160 224v16a96 96 0 0 0 96 96h0a96 96 0 0 0 96-96v-16">
                                                </path>
                                            </svg>
                                        </button>

                                        <button id="quickView" class="product-card-icons">
                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 576 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z">
                                                </path>
                                            </svg>
                                        </button>

                                        <button id="addToWishlist" class="product-card-icons">

                                            <svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                                viewBox="0 0 512 512" height="1em" width="1em"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z">
                                                </path>
                                            </svg>
                                        </button>

                                    </div>
                                    <div class="absolute top-0 right-0 px-3 rounded-md w-max bg-orange-600">
                                        <span class="text-skin-inverted text-xs font-bold">-12%</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 sm:gap-4">
                                    <a href="/product-page" class="text-xs sm:text-sm text-skin-gray font-bold line-clamp-2">Apple MacBook
                                        Air
                                        Retina
                                        13.3-Inch
                                        Laptop </a>

                                    <p class="text-xs sm:text-base">Rating: 4.5</p>

                                    <div class="flex items-center">
                                        <h4 class="text-skin-odd text-sm sm:text-base font-bold mr-2">$425.47</h4>
                                        <del class="text-gray-400 text-xs sm:text-sm mr-2">$425.47</del>
                                    </div>

                                </div>
                            </div>
`

    }
}
