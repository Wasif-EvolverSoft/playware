@extends('user.Layout.Layout')

@section('mainContent')
    <main class="mt-11">

        <section class="bg-gray-100 px-4">
            <div class="container mx-auto py-4">
                <p class="text-sm">
                    <a href="#" class="text-skin-secondary">Home</a> / <a href="#"
                        class="text-skin-secondary">Login</a>
                    /
                    <span>Login</span>
                </p>
            </div>
        </section>

        <section class="px-4 flex justify-center items-center py-20">
            <h1 class="text-6xl font-bold">Login</h1>
        </section>
        <section class="px-4 py-4">
            <form class="" action="{{ route('auth.login-user')  }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">email</label>
                <input id="email" type="email" name="email" placeholder="Bashir@gmail.com"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required />
                <label for="Password" class="block mt-2 text-xs font-semibold text-gray-600 uppercase">Password</label>
                <input id="Password" type="password" name="password" placeholder="*********"
                    class="block w-full p-3 mt-2 text-gray-700 bg-gray-200 appearance-none focus:outline-none focus:bg-gray-300 focus:shadow-inner rounded-md"
                    required />
                <small>Haven't Got Account? <a href="{{ route('signUp') }}">Sign Up</a> Here</small>
                <button type="submit"
                    class="w-full py-3 mt-6 font-medium tracking-widest text-skin-inverted uppercase bg-blue-600 shadow-lg focus:outline-none hover:bg-blue-700 transition-all duration-300 hover:shadow-none rounded-md">
                    Login
                </button>
            </form>
        </section>

    </main>
@endsection
