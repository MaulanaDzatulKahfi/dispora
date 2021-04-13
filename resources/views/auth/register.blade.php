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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased font-sans">
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
                            <label for="konfirmasi_password" class="block mb-2 text-sm text-gray-600">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" required autocomplete="new-password">
                            @error('password_confirmation')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm text-gray-600">Pilih Kategori</label>
                            <select name="kategori" id="kategori"
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="perorangan">Perorangan</option>
                                <option value="kolektif">Kolektif</option>
                            </select>
                            @error('kategori')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- <div class="mb-6 hidden" id="kategori_perting">
                            <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Kategori Perguruan Tinggi</label>
                            <select name="kategori_perting"
                            class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300">
                                <option value="">-- Kategori Perguruan Tinggi --</option>
                                <option value="pts">Perguruan Tinggi Negeri</option>
                                <option value="ptn">Perguruan Tinggi Swasta</option>
                            </select>
                            @error('role')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div> --}}
                        <label class="text-xs">
                            <input type="checkbox" name="syarat" value="syarat">
                            Dengan ini saya menyatakan bahwa saya mendaftarkan diri pada program Beasiswa Pancakarsa dan bahwa semua informasi yang saya sampaikan dan lampirkan adalah benar.
                        </label>
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

    <script>
        // $('#kategori').on('change', function(e) {
        //     var kategori = e.target.value;
        //     if (kategori == 'perorangan') {
        //         $('#kategori_perting').removeClass('hidden');
        //     }else{
        //         $('#kategori_perting').addClass('hidden');
        //     }
        // });
    </script>
    <script src="{{ url('../js/app.js') }}"></script>
</body>
</html>
