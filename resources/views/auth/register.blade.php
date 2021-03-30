<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased font-sans">
    {{-- <div class="bg-green-500 text-white">
        <div x-data="{ open: false }"  class="flex flex-col lg:flex-row">
          <div class="flex justify-between items-center px-4 py-4 lg:py-0 border-b lg:border-b-0">
            <div>
              <a href="#" class="block">
                <p class="font-medium tracking-widest">DISPORA</p>
                <p class="text-xs">Pancakarsa</p>
              </a>
            </div>
            <div>
              <button @click="open = !open" class="focus:outline-none block lg:hidden">
                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path :class="{ 'hidden': open === false }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    <path :class="{ 'hidden': open === true }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                </svg>
              </button>
            </div>
          </div>

          <div :class="{ 'hidden' : open === false }" class="lg:flex flex-col lg:flex-row justify-between w-full py-4 lg:py-0">
            <div class="flex flex-col lg:flex-row">
              <a href="#" class="block px-4 py-2 lg:py-5 hover:text-gray-100">Beranda</a>
              <a href="#" class="block px-4 py-2 lg:py-5 hover:text-gray-100">Tentang Kami</a>
              <a href="#" class="block px-4 py-2 lg:py-5 hover:text-gray-100">FAQ</a>
            </div>
            <div class="flex flex-col lg:flex-row">
              <a href="/register" class="block px-4 py-2 lg:py-5 hover:text-gray-100">Daftar</a>
              <a href="/login" class="block px-4 py-2 lg:py-5 hover:text-gray-100">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Selamat Datang</h1>
                    <p class="text-gray-400 dark:text-gray-400">Di Beasiswa Pancakarsa</p>
                </div>
                <div class="m-7">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Nama</label>
                            <input type="text" name="name" id="name" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Email</label>
                            <input type="email" name="email" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="pasword" class="text-sm text-gray-600 dark:text-gray-400">Password</label>
                            <input type="password" name="password" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" required autocomplete="new-password"/>
                            @error('password')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="konfirmasi_password" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" required autocomplete="new-password">
                            @error('password_confirmation')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="checkbox" name="syarat" value="syarat"><label class="text-xs"> Dengan ini saya menyatakan bahwa saya mendaftarkan diri pada program Beasiswa Pancakarsa dan bahwa semua informasi yang saya sampaikan dan lampirkan adalah benar.</label>
                        @error('syarat')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                        <div class="mb-6">
                            <input type="submit" class="mt-3 w-full px-3 py-4 text-white bg-green-500 rounded-md focus:bg-green-600 focus:outline-none" value="Daftar">
                        </div>
                    </form>
                </div>
                <div class="text-right mt-10">
                    <a href="{{ url('/login') }}">Sudah punya Akun? <span class="text-blue-500 hover:text-blue-700 mr-3">Login</span></a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('../js/app.js') }}"></script>
</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
