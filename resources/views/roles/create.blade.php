@extends('layouts.template')

@section('content')

    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                <a href="{{ route('roles.index') }}" class="hover:text-gray-200">Role</a> / <a href="{{ route('roles.create') }}" class="hover:text-gray-200">Tambah</a>
            </h3>
        </div>
    </div>

    <div class="flex items-center bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-xl mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class=" text-xl font-semibold text-gray-700 dark:text-gray-200">Form Tambah Role</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Nama</label>
                            <input type="text"
                            name="name"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ old('name') }}" placeholder="Nama" required/>
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="permission" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Permission</label>
                            @error('permission')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            @foreach($permission as $p)
                                <div class="ml-6 text-gray-700">
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $p->id }}">
                                        {{ $p->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-10 flex justify-between">
                            <a href="{{ route('roles.index') }}" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</a>
                            <input type="submit" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none" value="Tambah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
