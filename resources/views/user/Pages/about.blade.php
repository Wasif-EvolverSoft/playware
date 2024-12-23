@extends('user.Layout.Layout')

@section('mainContent')

<main class="mt-11">

    <!-- BREADCRUMBS -->
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-4">
            <p class="text-sm">
                <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="">About Us</a>
            </p>
        </div>
    </section>



    <section class="py-20 flex flex-col justify-center items-center">
        <h1 class="text-4xl font-extrabold text-center">About Us</h1>
    </section>


    <section class="container mx-auto px-4 py-12 flex flex-col lg:flex-row gap-8">
        @foreach($abouts as $about)

        <div class="lg:w-7/12">
            <h3 class="text-xl sm:text-2xl font-bold mb-8">{{$about->about_heading}}</h3>
            <h2 class="text-2xl sm:text-3xl md:text-4xl mb-8">
            {{$about->about_heading2}}
            </h2>
            <p>
                {{$about->about_paragraph}}
            </p>
        </div>
        @endforeach
        <div class="lg:w-5/12">
            <img src="./assets/images/banner-images/about-us.jpg" width="500" height="500" alt="about us" class="w-full h-auto">
        </div>
    </section>


</main>

@endsection