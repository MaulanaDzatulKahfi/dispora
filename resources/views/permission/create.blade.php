@extends('layouts.template')

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">Permission</h3>
        </div>
        <div class="text-gray-200">
            <a href="{{ route('permission.index') }}" class="hover:text-blue-300">permission</a> / <a href="{{ route('permission.create') }}" class="hover:text-blue-300">tambah</a>
        </div>
    </div>

    <div class="flex items-center bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-xl mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class=" text-xl font-semibold text-gray-700 dark:text-gray-200">Form Tambah Permission</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('permission.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Nama Permission</label>
                            <input type="text"
                            name="name"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ old('name') }}" placeholder="Nama Permission" required/>
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-1 text-right">
                            <input type="submit" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
