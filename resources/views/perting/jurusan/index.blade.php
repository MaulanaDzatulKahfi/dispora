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
        <h3 class="font-bold pl-2">{{ $perting->name }}</h3>
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
                <a href="{{ route('perting.create') }}" class="bg-green-600 text-white p-2 rounded-md hover:bg-green-700">tambah</a>
            </div>
            <table id="dataTable" class="stripe hover text-gray-700 text-center" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">No</th>
                        <th data-priority="2">Nama</th>
                        <th data-priority="3">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        @foreach ($jurusan as $key => $j)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $j->name }}</td>
                                <td class="flex justify-center">
                                {{-- @can('perting-edit') --}}
                                    <a class="bg-blue-500 text-white rounded-full w-16 h-6 text-sm focus:outline-none hover:bg-blue-700" href="{{ route('roles.edit',$j->id) }}">edit</a>
                                {{-- @endcan --}}
                                {{-- @can('perting-delete') --}}
                                    <form action="{{ route('roles.destroy', $j->id) }}" method="POST">
                                        @csrf
                                        {{-- @method('DELETE') --}}
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



{{-- @section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success m-b-20" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
                <a href="{{ route('products.archive') }}">Archive</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->name }}</td>
	        <td>{{ $product->detail }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection --}}
