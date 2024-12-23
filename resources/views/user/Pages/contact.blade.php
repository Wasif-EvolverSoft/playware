@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11" style="margin-top: 120px">

        <!-- BREADCRUMBS -->
        <section class="bg-gray-100">
            <div class="container mx-auto px-4 py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="">Contact Us</a>
                </p>
            </div>
        </section>



        <section class="py-20 flex flex-col justify-center items-center">
            <h1 class="text-4xl font-extrabold text-center">Contact Us For Any Questions</h1>
        </section>



        <section class="container mx-auto px-4 py-12 flex flex-col lg:flex-row gap-8">
            @foreach($contacts as $contact)

            <div class="lg:w-6/12 p-4 text-skin-primary bg-skin-inverted rounded-md">
                <h3 class="text-2xl sm:text-4xl font-bold mb-8 text-center">{{$contact->contact_heading}}</h3>
                <h2 class="text-xl sm:text-3xl mb-6 sm:mb-8 text-center flex justify-center items-center gap-2 group">
                    <svg class="text-skin-secondary transition-all duration-300 group-hover:rotate-12 group-hover:scale-110"
                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M391 480c-19.52 0-46.94-7.06-88-30-49.93-28-88.55-53.85-138.21-103.38C116.91 298.77 93.61 267.79 61 208.45c-36.84-67-30.56-102.12-23.54-117.13C45.82 73.38 58.16 62.65 74.11 52a176.3 176.3 0 0 1 28.64-15.2c1-.43 1.93-.84 2.76-1.21 4.95-2.23 12.45-5.6 21.95-2 6.34 2.38 12 7.25 20.86 16 18.17 17.92 43 57.83 52.16 77.43 6.15 13.21 10.22 21.93 10.23 31.71 0 11.45-5.76 20.28-12.75 29.81-1.31 1.79-2.61 3.5-3.87 5.16-7.61 10-9.28 12.89-8.18 18.05 2.23 10.37 18.86 41.24 46.19 68.51s57.31 42.85 67.72 45.07c5.38 1.15 8.33-.59 18.65-8.47 1.48-1.13 3-2.3 4.59-3.47 10.66-7.93 19.08-13.54 30.26-13.54h.06c9.73 0 18.06 4.22 31.86 11.18 18 9.08 59.11 33.59 77.14 51.78 8.77 8.84 13.66 14.48 16.05 20.81 3.6 9.53.21 17-2 22-.37.83-.78 1.74-1.21 2.75a176.49 176.49 0 0 1-15.29 28.58c-10.63 15.9-21.4 28.21-39.38 36.58A67.42 67.42 0 0 1 391 480z">
                        </path>
                    </svg>
                    <a href="tel:+9233322213141">{{$contact->contact_number}}</a>
                </h2>
                <h2 class="text-xl sm:text-3xl mb-6 sm:mb-8 text-center flex justify-center items-center gap-2 group">
                    <svg class="text-skin-secondary transition-all duration-300 group-hover:rotate-12 group-hover:scale-110"
                        stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" height="1em"
                        width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671">
                        </path>
                        <path
                            d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791">
                        </path>
                    </svg>
                    <a href="mailto:store@playware.pk">{{$contact->contact_email}}</a>
                </h2>
                <p>
                    {{$contact->contact_paragraph}}
                </p>
            </div>
            @endforeach
            <div class="lg:w-6/12 bg-skin-secondary/80 p-4 rounded-md text-skin-inverted">
                <h3 class="text-2xl sm:text-4xl font-bold mb-8 text-center">Connect Via Form</h3>

                <form action="">
                    <div class="flex flex-col gap-8">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="floating-label-div">
                                <input type="text" name="clinicName" id="clinicName" class="input-form peer"
                                    placeholder="" required>
                                <label htmlFor="clinicName" class="floating-label">Name *</label>
                            </div>

                            <div class="floating-label-div">
                                <input type="email" name="email" id="email" class="input-form peer" placeholder=""
                                    required>
                                <label htmlFor="email" class="floating-label">Email *</label>
                            </div>
                        </div>


                        <div class="floating-label-div">
                            <input type="text" name="number" id="number" class="input-form peer" placeholder=""
                                required>
                            <label htmlFor="number" class="floating-label">Number *</label>
                        </div>

                        <div class="floating-label-div">
                            <input type="text" name="subject" id="subject" class="input-form peer" placeholder="">
                            <label htmlFor="subject" class="floating-label">Subject (Optional)</label>
                        </div>

                        <div class="floating-label-div">
                            <textarea rows="3" name="message" id="message" class="input-form peer" placeholder=""></textarea>
                            <label htmlFor="message" class="floating-label">Message</label>
                        </div>

                        <button
                            class="rounded-md p-2  font-bold transition-all duration-300 bg-skin-inverted text-skin-primary hover:text-skin-inverted hover:bg-skin-primary">Submit</button>
                    </div>
                </form>

            </div>
        </section>



    </main>
@endsection
