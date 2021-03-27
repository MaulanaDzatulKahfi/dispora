@extends('layouts.template')
@section('content')

    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">User</h3>
        </div>
        <div class="text-gray-200">
            <a href="{{ route('users.index') }}" class="hover:text-blue-300">user</a> / <a href="{{ route('users.show', $user->id) }}" class="hover:text-blue-300">show</a>
        </div>
    </div>

@endsection
