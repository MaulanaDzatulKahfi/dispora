@extends('layouts.template')

@section('content')

    <div x-data="app()" x-cloak>

        <div x-show.transition="step != 'complete'">
            <div class="w-11/12 mx-auto">
                <!-- Top Navigation -->
                <div class="flex justify-around pb-3 text-center">
                    <div class="mt-6">
                        <button @click="step = 1" class="text-lg font-bold text-gray-700 leading-tight focus:outline-none">Perguruan Tinggi Yang Diminati</button>
                    </div>
                </div>
                <div class="border-b-4 border-green-600" :style="'width: '+ parseInt(step / 1 * 100) +'%'"></div>
                <!-- /Top Navigation -->
            </div>

            <div class="w-11/12 mx-auto px-4 bg-white overflow-y-scroll" style="height: 32rem">
                @if (session('berhasil'))
                    <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                        {{ session('berhasil') }}
                    </div>
                @endif
                @if (session('gagal'))
                    <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mt-3" role="alert">
                        {{ session('gagal') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Step Content -->
                <div class="py-6">
                    <div x-show.transition.in="step === 1">
                        <form action="{{ route('peserta.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="font-bold text-sm mb-1 text-gray-700 block">Nama</label>
                                <input type="text"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm border @error('nama') border-red-500 @enderror"
                                    name="nama"
                                    value="{{ $datadiri->nama }}" disabled>
                            </div>

                            <div class="mb-3">
                                <label class="font-bold text-sm mb-1 text-gray-700 block">Asal Sekolah</label>
                                <input type="text"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('asal_sekolah') border-red-500 @enderror"
                                    name="asal_sekolah"
                                    value="{{ old('asal_sekolah') }}" required>
                                    @error('asal_sekolah')
                                        <p class="text-sm italic text-red-500">{{ $message }}</p>
                                    @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="font-bold text-sm mb-1 text-gray-700 block">Lulus Tahun</label>
                                <select name="lulus_tahun"
                                class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('asal_sekolah') border-red-500 @enderror">
                                    @for($i= date('Y'); "2007" <= $i; $i--)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('lulus_tahun')
                                    <p class="text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="perting_id" class="font-bold text-sm mb-1 text-gray-700 block">Perguruan Tinggi Yang Diminati</label>
                                <select name="perting_id" id="perting_id"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('perting_id') border-red-500 @enderror">
                                        <option>-- Pilih Perguruan Tinggi --</option>
                                    @foreach($perting as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                                @error('perting_id')
                                    <p class="text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fakultas_id" class="font-bold text-sm mb-1 text-gray-700 block">Fakultas</label>
                                <select name="fakultas_id" id="fakultas_id"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('fakultas_id') border-red-500 @enderror">
                                </select>
                                @error('fakultas_id')
                                    <p class="text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jurusan_id" class="font-bold text-sm mb-1 text-gray-700 block">Jurusan</label>
                                <select name="jurusan_id" id="jurusan_id"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('jurusan_id') border-red-500 @enderror">
                                </select>
                                @error('jurusan_id')
                                    <p class="text-sm italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 text-right">
                                <button
                                class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                                type="submit">Kirim</button>
                            </div>
                        </form>

                    </div>

                    <div x-show.transition.in="step === 2">

                    </div>

                </div>
                <!-- / Step Content -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {

            $('#perting_id').on('change', function(e){
                var perting_id = e.target.value;
                $.ajax({
                    url : "{{ route('ajax.perting') }}",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        perting_id: perting_id
                    },
                    success : function(data){
                        $('#fakultas_id').empty();
                        $.each(data.fakultas, function(index, element){
                            $('#fakultas_id').append(`
                                <option>-- Pilih Fakultas --</option>
                                <option value="`+element.id+`">`+element.name+`</option>
                            `);
                        });
                    }
                });
            });

            $('#fakultas_id').on('change', function(e){
                var fakultas_id = e.target.value;
                $.ajax({
                    url : "{{ route('ajax.fakultas') }}",
                    type : "POST",
                    data : {
                        "_token": "{{ csrf_token() }}",
                        fakultas_id: fakultas_id
                    },
                    success : function(data){
                        console.log(data.jurusan);
                        $('#jurusan_id').empty();
                        $.each(data.jurusan, function(index, element){
                            $('#jurusan_id').append(`
                                <option>-- Pilih Jurusan --</option>
                                <option value="`+element.id+`">`+element.name+`</option>
                            `);
                        });
                    }
                });
            });

        });
    </script>
    <script>
        function app() {
			return {
				step: 1,
			}
		}
    </script>
@endsection
