@extends('layouts/template')

@section('content')

    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                <a href="{{ route('users.index') }}" class="hover:text-gray-200">User</a>
                 /
                <a href="{{ route('users.edit', $user->id) }}" class="hover:text-gray-200">Edit</a>
            </h3>
        </div>
    </div>

    <div class="flex items-center bg-green-50">
        <div class="container mx-auto">
            <div class="max-w-md mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class=" text-xl font-semibold text-gray-700 dark:text-gray-200">Form Edit User</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('users.update', $user->id ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Nama</label>
                            <input type="text"
                            name="name"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-600"
                            value="{{ $user->name }}" disabled/>
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block mb-2 text-sm text-gray-600 font-bold">Email</label>
                            <input type="email"
                            name="email"
                            class="w-full px-3 py-1 text-gray-600 border border-gray-300 rounded-md text-sm"
                            value="{{ $user->email }}" disabled/>
                            @error('email')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="role" class="block mb-2 text-sm text-gray-600 font-bold">Role</label>
                            <select name="roles"
                            class="w-full px-3 py-1 text-gray-600 text-sm border rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 @error('roles') border-red-500 @enderror">
                            @foreach($roles as $role)
                                @foreach($userRole as $r)
                                    @if($role == $r)
                                        <option value="{{ $role }}" selected>{{ $role }}</option>
                                    @else
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                            </select>
                            @error('roles')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-1 flex justify-between">
                            <a href="{{ route('users.index') }}" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</a>
                            <input type="submit" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none" value="Edit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
