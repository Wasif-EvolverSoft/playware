@extends('user.Layout.Layout')

@section('mainContent')

<main class="mt-11">


    <!-- BREADCRUMBS -->
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-4">
            <p class="text-sm">
                <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="">FAQs</a>
            </p>
        </div>
    </section>

    <section class="py-20 flex flex-col justify-center items-center">
        <h1 class="text-4xl font-extrabold text-center">Frequenlty Asked Questions</h1>
    </section>


    <section class="py-12 max-w-screen-lg mx-auto px-4 flex flex-col gap-8">

        <div>
            <h3 class="text-2xl font-bold text-skin-secondary mb-6">SHIPPING:</h3>
            <div id="accordions">

            </div>
        </div>

        
        <div>
            <h3 class="text-2xl font-bold text-skin-secondary mb-6">Payment:</h3>
            <div id="accordions2">

            </div>
        </div>

    </section>
</main>

@endsection