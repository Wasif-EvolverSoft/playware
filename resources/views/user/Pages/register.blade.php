@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11">


        <div class="grid min-h-screen place-items-center py-12">
            <div class="w-11/12 p-4 sm:p-12 bg-white sm:w-8/12 md:w-1/2 lg:w-5/12 border shadow-lg rounded-md">
                <h1 class="text-xl font-semibold">Register as Buyer!</h1>
                <form class="mt-6" enctype="multipart/form-data">
                    <div class="block sm:flex justify-between gap-3">
                        <span class="w-full sm:w-1/2">
                            <label for="firstname"
                                class="block text-xs font-semibold text-gray-600 uppercase">Firstname</label>
                            <input id="firstname" type="text" name="firstname" placeholder="Ali"
                                class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                required />
                        </span>
                        <span class="w-full sm:w-1/2">
                            <label for="lastname"
                                class="block text-xs font-semibold text-gray-600 uppercase">Lastname</label>
                            <input id="lastname" type="text" name="lastname" placeholder="Amir"
                                class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                                required />
                        </span>
                    </div>
                    <label for="username" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Username</label>
                    <input id="username" type="text" name="username" placeholder="Ali123"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />
                    <label for="number" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Number</label>
                    <input id="number" type="number" name="number" placeholder="+92 123 4231499"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />
                    <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                    <input id="email" type="email" name="email" placeholder="exampl@gmail.com"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />
                    <label for="dob" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Date Of
                        Birth</label>
                    <input id="dob" type="date" name="dob"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />

                    <label for="password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                    <input id="password" type="password" name="password" placeholder="********"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />
                    <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Confirm
                        password</label>
                    <input id="password-confirm" type="password" name="password-confirm" placeholder="********"
                        class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                        required />
                    <button type="submit"
                        class="w-full py-3 mt-6 font-medium tracking-widest text-skin-inverted uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-700 transition-all duration-300 hover:shadow-none rounded-md">
                        Sign up
                    </button>
                    <a href="{{ route('login-user') }}">
                        <p class="flex justify-between mt-4 text-xs text-gray-500 cursor-pointer hover:text-skin-primary">
                            Already registered? Login here.</p>
                    </a>

                </form>
            </div>
        </div>

    </main>
@endsection
