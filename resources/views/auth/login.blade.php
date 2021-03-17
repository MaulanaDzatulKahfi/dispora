<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
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

    <div class="container container max-w-3xl m-auto flex flex-wrap md:flex-row text-gray-600 my-24">
        <div class="w-1/2 bg-gray-100">
            <div class="text-center py-8">
                <h1 class="font-bold text-xl">Selamat Datang</h1>
                <p>Di Dispora Pancakarsa</p>
            </div>
            <div class="text-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <input type="email" class="w-80 h-12 border-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" placeholder="Email Address" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                        @error('email')
                            <span class="text-sm text-red-500 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div>
                        <input type="password" class="w-80 h-12 border-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" placeholder="Password" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="text-sm text-red-500 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" value="Login" class="w-80 h-12 bg-green-500 text-white mt-3 focus:outline-none">
                    </div>
                </form>
            </div>
            <div class="text-center">
                <a href="{{ route('password.request') }}">Lupa Password?</a>
            </div>
            <div class="text-right mt-10">
                <a href="/register">Belum Punya Akun? <span class="text-green-500 mr-3">Daftar</span></a>
            </div>
        </div>
        <div class="w-1/2">
            <img class="" src="img/beranda1.jpeg" alt="">
        </div>
    </div>

    <script src="../js/app.js"></script>
</body>
</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
