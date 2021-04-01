@extends('layouts.template')

@section('header')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div x-data="{ showModal1: false }" :class="{ 'overflow-y-hidden': showModal1 }">
        <div class="bg-green-600 p-4 shadow text-xl text-white">
            <h3 class="font-bold pl-2">User</h3>
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
                @can('user-archive')
                    <div class="flex mb-2">
                        <a href="{{ route('users.archive') }}" class="bg-yellow-400 text-white p-2 rounded-md hover:bg-yellow-600">Sampah</a>
                    </div>
                @endcan
                <table id="dataTable" class="stripe hover text-gray-700" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">No</th>
                            <th data-priority="2">Nama</th>
                            <th data-priority="3">Email</th>
                            <th data-priority="4">Role</th>
                            <th data-priority="5">Status</th>
                            <th data-priority="6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!--/Card-->
        </div>
        <!--/container-->
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'role', name: 'role'},
                    {
                        data: 'email_verified_at', name: 'email_verified_at',
                        'render': function (data, type, row) {
                            if (row.email_verified_at === null) {
                                return '<button class="bg-red-600 text-white rounded-full px-2 text-sm focus:outline-none">Verify</button>';
                            }else {
                                return '<button class="bg-green-600 text-white rounded-full px-2 text-sm focus:outline-none">Verified</button>';
                            }
                        }
                    },
                    {
                        data: 'action', name: 'action',
                        orderable: true,
                        searchable: true,
                    },
                ]
            }).columns.adjust().responsive.recalc();
        });
    </script>
@endsection
