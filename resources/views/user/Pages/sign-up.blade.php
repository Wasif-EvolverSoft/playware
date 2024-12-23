@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11">

        <section class="bg-gray-100 px-4">
            <div class="container mx-auto py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#" class="text-skin-secondary">Sign
                        Up</a>
                    /
                    <span>Sign Up</span>
                </p>
            </div>
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="px-4 flex justify-center items-center py-20">
            <h1 class="text-6xl font-bold">Sign Up</h1>
        </section>
        <section class="px-4" style="padding: 20px;">
            <form class="" action="{{ route('user.signup') }}" method="POST">
                @csrf
                <div class="flex flex-col sm:flex-row justify-between gap-3">
                    <span class="w-full sm:w-1/2">
                        <label for="firstname" class="block text-xs font-semibold text-gray-600 uppercase">Firstname</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Ali"
                            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                            required value="{{ old('firstname') }}" />
                        <small style="color:red;">
                            @error('firstname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </small>
                    </span>
                    <span class="w-full sm:w-1/2">
                        <label for="lastname" class="block text-xs font-semibold text-gray-600 uppercase">Lastname</label>
                        <input id="lastname" value="{{ old('lastname') }}" type="text" name="lastname"
                            placeholder="Amir"
                            class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                            required />
                        <small style="color:red;">
                            @error('lastname')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </small>
                    </span>
                </div>
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                    placeholder="exampl@gmail.com"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required />
                <small style="color:red;">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </small>
                <label for="number" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Number</label>
                <input id="number" value="{{ old('number') }}" type="number" name="number"
                    placeholder="+92 123 4231499"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required />
                <small style="color:red;">
                    @error('number')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </small>
                <label for="Password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                <input id="Password" value="{{ old('password') }}" type="Password" name="password" placeholder="*********"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required />
                <small style="color:red;">
                    @error('Password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </small>
                <label for="dob" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Date Of
                    Birth</label>
                <input id="dob" type="date" name="dob"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required value="{{ old('dob') }}" />
                <small style="color:red;">
                    @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </small>
                <button type="submit"
                    class="w-full py-3 mt-6 font-medium tracking-widest text-skin-inverted uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-700 transition-all duration-300 hover:shadow-none rounded-md">
                    Sign Up
                </button>
            </form>
        </section>

    </main>
@endsection
