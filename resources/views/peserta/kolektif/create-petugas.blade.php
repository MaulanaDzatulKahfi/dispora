<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Diri</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .kuning{
            color: #fff500;
        }
    </style>
</head>
<body class="bg-green-50">
    <nav class="flex bg-green-600 justify-between">
        <div class="text-xs flex py-3 px-7 kuning">
            <div>
                <a href="https://ahlibikin.website/">
                    <span class="fa fa-graduation-cap"></span>
                    Beranda
                </a>
            </div>
            <div class="px-4">
                <a href="https://ahlibikin.website/tentang-kami">
                    <span class="fa fa-briefcase"></span>
                    Tentang Kami
                </a>
            </div>
            <div>
                <a href="https://ahlibikin.website/faq">
                    <span class="fa fa-comments"></span>
                    FAQ
                </a>
            </div>
            <div class="px-4">
                <a href="#">
                    <span class="fa fa-book"></span>
                    Panduan
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto">
        <!-- Top Navigation -->
        <div class="flex justify-around pb-3 text-center">
            <div class="mt-6">
                <button class="text-xl font-bold text-gray-700 leading-tight focus:outline-none">Petugas</button>
            </div>
        </div>
        <div class="border-b-4 border-green-600 w-full"></div>
        <!-- /Top Navigation -->
    </div>

    <div class="max-w-2xl mx-auto mt-5">
        <div class="py-4 px-4">
            <form action="{{ route('kolektif.store') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nip" class="font-bold mb-1 text-gray-700">NIP</label>
                    <input type="number"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 border @error('nip') border-red-500 @enderror"
                        name="nip" placeholder="NIP"
                        value="{{ old('nip') }}"
                        autofocus required>
                    @error('nip')
                        <p class= italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="name" class="font-bold mb-1 text-gray-700">Nama</label>
                    <input type="text"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 border @error('name') border-red-500 @enderror"
                        name="name" placeholder="Nama"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <p class= italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="jabatan" class="font-bold mb-1 text-gray-700">Jabatan</label>
                    <input type="text"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 border @error('jabatan') border-red-500 @enderror"
                        name="jabatan" placeholder="Jabatan"
                        value="{{ old('jabatan') }}" required>
                    @error('jabatan')
                        <p class= italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-5 text-right">
                    <button
                    class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                    type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
