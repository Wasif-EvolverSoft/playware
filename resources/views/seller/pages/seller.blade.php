<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap"
            rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
        <link rel="stylesheet" href="{{ asset('style/output.css') }}">
        <title>{{ $title }} | Shop</title>
    </head>
</head>

<body onload="addHeaderAndFooter()">

    <header id="header" class="bg-skin-gray/90 w-full backdrop-blur-sm z-50 fixed top-0 left-0"
        onmouseleave="toggleOutSubcategoryMegaMenu()">

        <!-- GENERATED DYNAMICALLY WITH JAVASCRIPT THROUGH addHeaderAndFooter() Function -->

    </header>


    <main class="mt-11">

        <!-- BREADCRUMBS -->
        <!-- <section class="bg-gray-100">
            <div class="container mx-auto px-4 py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="">Contact Us</a>
                </p>
            </div>
        </section> -->



        <section class="py-20 flex flex-col justify-center items-center">
            <div class="rounded w-40 h-40 overflow-hidden mb-6">
                <img src="./assets/images/Image/pngwing.com.png" alt="" class="w-full h-full">
            </div>
            <h1 class="text-4xl font-extrabold text-center mb-4">Mister Seller 123</h1>
            <h3 class="text-xl font-bold text-center text-purple-950">Verified Shopkeeper</h3>
            <h3 class="text-xl font-bold text-center">Joined at: 20-04-2024</h3>
        </section>


        <section class="container mx-auto py-12 px-4 sm:px-0">
            <h1 class="text-4xl font-bold text-center mb-12">All Products</h1>
            <div id="sellerProductsDiv"
                class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-2 sm:gap-4 place-items-center w-full mx-auto">

                <!-- PRDOCUTS MAPPED FROM sellerPageProducts.js -->

            </div>


        </section>



    </main>

    <footer id="footer" class="flex flex-col items-center bg-skin-gray text-center text-skin-inverted">
        <!-- MAPPED BY SCRIPT HEADER&FOOTER -->
    </footer>

</body>

<script src="{{ asset('scripts/header&footer.js') }}"></script>
<script src="{{ asset('scripts/sellerPageProducts.js') }}"></script>

</html>
