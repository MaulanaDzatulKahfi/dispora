@extends('layouts.template')

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Tambah Peserta</h3>
    </div>

    <div class="w-11/12 mx-auto">
        <!-- Top Navigation -->
        <div class="flex justify-around pb-3 text-center">
            <div class="mt-3">
                <button class="font-bold text-gray-700 leading-tight focus:outline-none">Data Diri</button>
            </div>
            <div class="mt-3">
                <button class="font-bold text-gray-700 leading-tight focus:outline-none">Kartu Keluarga</button>
                <div class="mt-1 border-b-4 border-green-600"></div>
            </div>
            <div class="mt-3">
                <button class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
            </div>
            <div class="mt-3">
                <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
            </div>
        </div>
        <!-- /Top Navigation -->
    </div>

    <div class="w-11/12 mx-auto px-4 bg-white">

        <!-- Step Content -->
        <div class="py-3">
            @if (session('berhasil'))
                <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                    {{ session('berhasil') }}
                </div>
            @endif
            @if (session('gagal'))
                <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mt-3" role="alert">
                    {{ session('gagal') }}
                </div>
            @endif

        <div class="p-6">
            <form action="{{ route('datadiri.storekk') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="no_kk" class="font-bold text-xs mb-1 text-gray-700">No KK</label>
                    <input type="number"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 text-xs border @error('no_kk') border-red-500 @enderror" name="no_kk" placeholder="No KK" value="{{ old('no_kk') }}" autofocus required>
                    @error('no_kk')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="foto_kk" class="font-bold text-xs mb-1 text-gray-700 block">Foto KK</label>
                    <input type="file"
                        class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs" name="foto_kk" required>
                    @error('foto_kk')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-5 text-right">
                    <button class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                    type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
<!-- / Step Content -->
@endsection
