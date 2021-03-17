<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel 8 User Roles and Permissions Tutorial') }}</title>
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
              <a href="/" class="block">
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

    <div class="text-blue-400">
        <div class="flex ml-32 md:flex-row flex-col">
            <div class="md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0">
                <div class="pt-10">
                    Selamat Datang, Anak Muda Kabupaten Bogor!
                </div>
                <div class="pt-5">
                    <p class="text-5xl">Beasiswa</p>
                    <p class="text-5xl font-semibold">Pancakarsa</p>
                </div>
                <div class="pt-52">
                    Program beasiswa pendidikan pada jenjang S1 untuk Perguruan Tinggi Negeri/Swasta yang telah menjalin yang telah menjalin kerjasama dengan Pemerintah Kabupaten Bogor
                </div>
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-5/6 sm:block hidden">
                <img class="object-cover object-center rounded" alt="hero" src="img/beranda.jpeg" />
            </div>
        </div>
    </div>

    <script src="../js/app.js"></script>
</body>
</html>
