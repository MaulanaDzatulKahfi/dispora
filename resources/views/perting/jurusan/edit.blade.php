@extends('layouts.template')

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                <a href="{{ route('perting.index') }}">{{ $jurusan->perting->name }}</a> / <a href="{{ route('fakultas.index', $jurusan->perting->id) }}">{{ $jurusan->fakultas->name }}</a> / <a href="{{ route('jurusan.index', $jurusan->fakultas->id) }}">Jurusan</a>
            </h3>
        </div>
    </div>

    <div class="flex items-center bg-green-50">
        <div class="container mx-auto">
            <div class="max-w-xl mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class=" text-xl font-semibold text-gray-700 dark:text-gray-200">Form Tambah Jurusan</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Nama</label>
                            <input type="name"
                            name="name"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ $jurusan->name }}" placeholder="Nama Jurusan" required/>
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-1 mt-10 flex justify-between">
                            <a href="{{ route('jurusan.index', $jurusan->fakultas->id) }}" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</a>
                            <input type="submit" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
