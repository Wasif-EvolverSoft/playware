@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11" id="success">

        <!-- BREADCRUMBS -->
        <section class="bg-gray-100">
            <div class="container mx-auto px-4 py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="">Contact Us</a>
                </p>
            </div>
        </section>
        <section class="py-20 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-extrabold text-center">Support</h1>
        </section>

        <section class="bg-skin-fill-unique px-24 max-xl:px-8 max-lg:px-0 max-lg:py-10 py-10">
            <form action="{{ route('user.support.post') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-8">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="floating-label-div">
                            <select name="inquiry_type" class="input-form peer" id="">
                                <option value="General Enquiry">General Enquiry</option>
                                <option value="Order Enquiry">Order Enquiry</option>
                            </select>
                            <label htmlFor="inquiry_type" class="floating-label">Inquiry Type</label>
                        </div>
                        <input type="hidden">
                        <div class="floating-label-div">
                            <select name="order_id" class="input-form peer" id="">
                                <option value="ORder">1</option>
                            </select>
                            <label htmlFor="order_id" class="floating-label">Select Order</label>
                        </div>
                    </div>
                    <input type="hidden" value="1" name="userId" name="userId">

                    <div class="floating-label-div">
                        <textarea rows="3" name="message" id="message" class="input-form peer" placeholder=""></textarea>
                        <label htmlFor="message" class="floating-label">Message</label>
                    </div>

                    <button type="submit"
                        class="rounded-md p-2  font-bold transition-all duration-300 bg-skin-inverted text-skin-primary hover:text-skin-inverted hover:bg-skin-primary">Submit</button>
                </div>
            </form>
        </section>


    </main>
@endsection
