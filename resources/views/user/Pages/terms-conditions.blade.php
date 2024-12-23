@extends('user.Layout.Layout')

@section('mainContent')
<main class="mt-11">
    <!-- Breadcrumbs -->
    <section class="bg-gray-100">
        <div class="container mx-auto px-4 py-4">
            <p class="text-sm text-gray-600">
                <a href="#" class="text-blue-600">Home</a> / <span>Terms & Conditions</span>
            </p>
        </div>
    </section>

    <!-- Page Heading -->
    <section class="py-20 flex flex-col justify-center items-center">
        <h1 class="text-5xl font-extrabold text-center text-gray-800">Terms & Conditions</h1>
    </section>

    <!-- Accordion Section -->
    <section class="py-12 max-w-screen-lg mx-auto px-4">
        @foreach ($terms as $heading => $questions)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-blue-600 mb-6">{{ $heading }}</h2>
            <div class="space-y-6">
                @foreach ($questions as $question)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                    <!-- Accordion Button -->
                    <button type="button"
                        class="w-full text-left py-4 px-6 bg-gray-100 hover:bg-gray-200 focus:outline-none font-semibold flex justify-between items-center transition-all"
                        onclick="toggleAccordion(this)">
                        <span class="text-lg">{{ $question->question }}</span>
                        <svg class="w-6 h-6 transform transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <!-- Accordion Content -->
                    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-500 ease-in-out bg-white px-6">
                        <p class="py-4 text-gray-700">{{ $question->answer }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </section>
</main>
@endsection

@section('singleScript')
<script>
    function toggleAccordion(button) {
        const content = button.nextElementSibling;
        const icon = button.querySelector('svg');

        if (content.style.maxHeight) {
            // Close the accordion
            content.style.maxHeight = null;
            icon.classList.remove('rotate-180');
        } else {
            // Open the accordion smoothly
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.classList.add('rotate-180');
        }
    }
</script>
@endsection
