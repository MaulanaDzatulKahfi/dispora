@extends('layouts.template')

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">Perguruan Tinggi</h3>
        </div>
        <div class="text-gray-200">
            <a href="{{ route('perting.index') }}" class="hover:text-blue-300">perguruan tinggi</a> / <a href="{{ route('perting.create') }}" class="hover:text-blue-300">tambah</a>
        </div>
    </div>

    <div class="flex items-center bg-gray-50">
        <div class="container mx-auto">
            <div class="max-w-xl mx-auto mt-10 bg-white p-5 rounded-md shadow-sm">
                <div class="text-center">
                    <h1 class=" text-xl font-semibold text-gray-700 dark:text-gray-200">Form Tambah Perguruan Tinggi</h1>
                </div>
                <div class="m-7">
                    <form action="{{ route('perting.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">NPSN</label>
                            <input type="number"
                            name="npsn"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ old('npsn') }}" placeholder="Nomor Pokok Sekolah Nasional" required/>
                            @error('npsn')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="name" class="block mb-2 text-sm text-gray-600 text-sm font-bold">Perguruan Tinggi</label>
                            <input type="text"
                            name="name"
                            class="w-full px-3 py-1 border border-gray-300 rounded-md text-gray-600 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                            value="{{ old('name') }}" placeholder="Perguruan Tinggi" required/>
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

{{-- @extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection --}}
