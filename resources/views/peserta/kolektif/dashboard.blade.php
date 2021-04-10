@section('header')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection
<div class="container w-full mx-auto px-2 mt-4">
    @if (session('success'))
        <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        @can('peserta-create')
            <div class="flex mb-2">
                <a href="{{ route('kolektif.createDatadiri') }}" class="bg-green-600 text-white p-2 rounded-md hover:bg-green-700">Tambah</a>
            </div>
        @endcan
        <table id="dataTable" class="stripe hover text-gray-700 text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1">No</th>
                    <th data-priority="2">Nama</th>
                    <th data-priority="2">Perguruan Tinggi</th>
                    <th data-priority="3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesertaKolektif as $key => $pk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pk->datadiri->nama }}</td>
                        <td>{{ $pk->perting->name }}</td>
                        <td class="flex justify-center">
                        <a class="bg-blue-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none hover:bg-blue-700" href="{{ route('peserta.show', $pk->id) }}">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@section('script')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        } );
    </script>
@endsection
