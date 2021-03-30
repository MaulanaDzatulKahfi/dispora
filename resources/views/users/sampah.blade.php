@extends('layouts.template')

@section('header')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="bg-green-600 p-4 shadow">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                <a href="{{ route('users.index') }}" class="hover:text-gray-300">User</a> / <a href="{{ route('users.archive') }}" class="hover:text-gray-300">Sampah</a>
            </h3>
        </div>
    </div>

    <!--Container-->
    <div class="container w-full mx-auto px-2 mt-4">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white ">
            <div class="flex mb-2">
                <a href="{{ route('users.restoreall') }}" class="bg-green-600 text-white p-2 rounded-md hover:bg-green-700 mr-3" onclick="return confirm('Yakin? Semua Sampah Akan Dipulihkan?')">Pulihkan sampah</a>
                <a href="{{ route('users.permanentall') }}" class="bg-yellow-400 text-white p-2 rounded-md hover:bg-yellow-600" onclick="return confirm('Yakin? Semua Sampah Dihapus Selamanya?')">Kosongkan sampah</a>
            </div>
            <table id="dataTable" class="stripe hover text-gray-700 text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Nama</th>
                        <th data-priority="2">Email</th>
                        <th data-priority="3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="flex justify-center">
                            {{-- @can('user-restore') --}}
                                <a class="bg-blue-500 text-white rounded-full w-20 h-6 text-sm focus:outline-none hover:bg-blue-700" href="{{ route('users.restore',$user->id) }}" onclick="return confirm('Yakin? Data Ini Akan Dipulihkan?')">pulihkan</a>
                            {{-- @endcan
                            @can('user-deleteall') --}}
                                    <a href="{{ route('users.permanent', $user->id) }}" type="submit" class="bg-red-500 text-white rounded-full w-32 h-6 text-sm focus:outline-none hover:bg-red-700" onclick="return confirm('Yakin? User Dihapus Selamanya?')">
                                        hapus selamanya
                                    </a>
                            {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--/Card-->
    </div>
    <!--/container-->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@endsection
