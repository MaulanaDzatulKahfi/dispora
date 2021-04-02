@extends('layouts.template')

@section('header')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">
            <a href="{{ route('perting.index') }}">{{ $perting->name }}</a> / <a href="{{ route('fakultas.index', $perting->id) }}">Fakultas</a>
        </h3>
    </div>

    <!--Container-->
    <div class="container w-full mx-auto px-2 mt-4">
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="flex mb-2">
                <a href="{{ route('fakultas.create', $perting->id) }}" class="bg-green-600 text-white p-2 rounded-md hover:bg-green-700">tambah</a>
            </div>
            <table id="dataTable" class="stripe hover text-gray-700 text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Nama</th>
                        <th data-priority="2">Status</th>
                        <th data-priority="3">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($fakultas as $key => $j)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $j->name }}</td>
                                <td>{{ $j->status }}</td>
                                <td class="flex justify-center">
                                    <a class="bg-yellow-400 text-white rounded-full w-16 h-6 text-sm focus:outline-none hover:bg-yellow-600" href="{{ route('jurusan.index', $j->id) }}">Jurusan</a>
                                {{-- @can('jurusan-edit') --}}
                                    <a class="bg-blue-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none hover:bg-blue-700" href="{{ route('fakultas.edit', $j->id) }}">edit</a>
                                {{-- @endcan
                                @can('jurusan-delete') --}}
                                    <form action="{{ route('fakultas.destroy', $j->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none hover:bg-red-700" onclick="return confirm('Yakin? Data Ini Akan DiHapus?')">
                                            hapus
                                        </button>
                                    </form>
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
