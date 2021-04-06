@extends('layouts.template')

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                <a href="{{ route('perting.index') }}" class="hover:text-gray-200">Perguruan Tinggi</a> / <a href="{{ route('perting.create') }}" class="hover:text-gray-200">Tambah</a>
            </h3>
        </div>
    </div>

    <div class="flex items-center bg-green-50">
        <div class="container mx-auto">
            <div class="max-w-3xl mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center mb-14">
                    <h1 class=" text-2xl font-semibold text-gray-700 dark:text-gray-200 ">Form Tambah Perguruan Tinggi</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('perting.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Kode PT</label>
                                <input type="number"
                                name="kode_pt"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('kode_pt') }}" placeholder="Kode PT" required/>
                                @error('kode_pt')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Nama</label>
                                <input type="text"
                                name="name"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('name') }}" placeholder="Nama" required/>
                                @error('name')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex ">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Status PT</label>
                                <input type="text"
                                name="status_pt"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('status_pt') }}" placeholder="Status PT" required/>
                                @error('status_pt')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Tanggal Berdiri</label>
                                <input type="date"
                                name="tgl_berdiri"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('tgl_berdiri') }}" placeholder="Tanggal Berdiri" required/>
                                @error('tgl_berdiri')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">SK PT</label>
                                <input type="text"
                                name="sk_pt"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('sk_pt') }}" placeholder="SK PT" required/>
                                @error('sk_pt')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Tanggal SK PT</label>
                                <input type="date"
                                name="tgl_sk_pt"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('tgl_sk_pt') }}" placeholder="Tanggal SK PT" required/>
                                @error('tgl_sk_pt')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Alamat</label>
                            <textarea class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" name="alamat" placeholder="Alamat">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Kelurahan</label>
                                <input type="text"
                                name="kelurahan"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('kelurahan') }}" placeholder="kelurahan" required/>
                                @error('kelurahan')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Kecamatan</label>
                                <input type="text"
                                name="kecamatan"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('kecamatan') }}" placeholder="Kecamatan" required/>
                                @error('kecamatan')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Kota/Kabupaten</label>
                                <input type="text"
                                name="kota"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('kota') }}" placeholder="Kota/Kabupaten" required/>
                                @error('kota')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Provinsi</label>
                                <input type="text"
                                name="provinsi"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('provinsi') }}" placeholder="Provinsi" required/>
                                @error('provinsi')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Kode Pos</label>
                                <input type="number"
                                name="kode_pos"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('kode_pos') }}" placeholder="Kode Pos" required/>
                                @error('kode_pos')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Telepon</label>
                                <input type="number"
                                name="tlp"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('tlp') }}" placeholder="Telepon" required/>
                                @error('tlp')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 flex">
                            <div class="w-1/2 mr-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Email</label>
                                <input type="email"
                                name="email"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('email') }}" placeholder="Email" required/>
                                @error('email')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-1/2 ml-3">
                                <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Website</label>
                                <input type="text"
                                name="website"
                                class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                value="{{ old('website') }}" placeholder="Website" required/>
                                @error('website')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-1 mt-9 flex justify-between">
                            <a href="{{ route('perting.index') }}" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</a>
                            <input type="submit" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
