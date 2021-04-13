@extends('layouts.template')

@section('content')

<div class="bg-green-600 p-4 shadow text-xl text-white">
    <h3 class="font-bold pl-2">Daftar</h3>
</div>

<div class="w-11/12 mx-auto">
    <!-- Top Navigation -->
    <div class="flex justify-around pb-3 text-center overflow-x-scroll md:overflow-hidden">
        <div class="mt-3 mx-3 md:mx-auto">
            <button class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
        </div>
        <div class="mt-3 mx-3 md:mx-auto">
            <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
        </div>
        <div class="mt-3 mx-3 md:mx-auto">
            <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
            <div class="mt-1 border-b-4 border-green-600"></div>
        </div>
    </div>
    <!-- /Top Navigation -->
</div>

<div class="w-11/12 mx-auto px-4 bg-white">
        @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-3 mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="flex items-center py-6">
            <div>
                Pilih :
            </div>
            <select id="mahasiswa" class="w-3/4 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border ml-3">
                <option value="">-- Mahasiwa baru/aktif --</option>
                <option value="baru">Calon mahasiwa baru</option>
                <option value="aktif">Mahasiwa aktif</option>
            </select>
        </div>

        <!-- Step Content -->
        <div class="py-6">
            <div id="baru" class="hidden">
                <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="baru" value="baru">
                    <div class="mb-3">
                        <label class="font-bold text-sm mb-1 text-gray-700 block">NISN</label>
                        <input type="number"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('nisn') border-red-500 @enderror"
                            name="nisn"
                            required>
                            @error('nisn')
                                <p class="text-sm italic text-red-500">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label class="font-bold text-sm mb-1 text-gray-700 block">Asal Sekolah</label>
                        <input type="text"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('asal_sekolah') border-red-500 @enderror"
                            name="asal_sekolah"
                           required>
                            @error('asal_sekolah')
                                <p class="text-sm italic text-red-500">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="font-bold text-sm mb-1 text-gray-700 block">Lulus Tahun</label>
                        <select name="lulus_tahun"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('asal_sekolah') border-red-500 @enderror" required>
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
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('perting_id') border-red-500 @enderror" required>
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
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('fakultas_id') border-red-500 @enderror" required>
                            <option>-- Pilih Fakultas --</option>
                        </select>
                        @error('fakultas_id')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jurusan_id" class="font-bold text-sm mb-1 text-gray-700 block">Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('jurusan_id') border-red-500 @enderror" required>
                            <option>-- Pilih Jurusan --</option>
                        </select>
                        @error('jurusan_id')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3 hidden"  id="ptn">
                        <label for="foto" class="font-bold text-sm mb-1 text-gray-700 block">Tanda Kelulusan SNMPTN/SBMPTN</label>
                        <input type="file"
                        class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm"
                        name="foto_ptn">
                        @error('foto_ptn')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="font-bold text-sm mb-1 text-gray-700 block">Foto Ijazah/Skhun/UTBK</label>
                        <input type="file"
                        class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm"
                        name="foto_ijazah" required>
                        @error('foto_ijazah')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>

            <div id="aktif" class="hidden">
                <form action="{{ route('peserta.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="aktif" value="aktif">
                    <div class="mb-3">
                        <label class="font-bold text-sm mb-1 text-gray-700 block">Asal Sekolah</label>
                        <input type="text"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('asal_sekolah') border-red-500 @enderror"
                            name="asal_sekolah"
                            required>
                            @error('asal_sekolah')
                                <p class="text-sm italic text-red-500">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="font-bold text-sm mb-1 text-gray-700 block">Lulus Tahun</label>
                        <select name="lulus_tahun"
                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('lulus_tahun') border-red-500 @enderror" required>
                            @for($i= date('Y'); "2007" <= $i; $i--)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('lulus_tahun')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="perting_id" class="font-bold text-sm mb-1 text-gray-700 block">Perguruan Tinggi</label>
                        <select name="perting_id" id="perting_id2"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('perting_id') border-red-500 @enderror" required>
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
                        <select name="fakultas_id" id="fakultas_id2"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('fakultas_id') border-red-500 @enderror" required>
                            <option>-- Pilih Fakultas --</option>
                        </select>
                        @error('fakultas_id')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jurusan_id" class="font-bold text-sm mb-1 text-gray-700 block">Jurusan</label>
                        <select name="jurusan_id" id="jurusan_id2"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-sm border @error('jurusan_id') border-red-500 @enderror" required>
                            <option>-- Pilih Jurusan --</option>
                        </select>
                        @error('jurusan_id')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div id="ptn"></div>
                    {{-- <div class="mb-3">
                        <label for="semester" class="font-bold text-sm mb-1 text-gray-700 block">Semester saat ini</label>
                        <input type="text"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm border @error('semester') border-red-500 @enderror"
                            name="semester">
                        @error('semester')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ipk" class="font-bold text-sm mb-1 text-gray-700 block">IPK
                            <span class="text-red-500 text-xs">*sesuai bukti Transkrip Nilai (minimal IPK 3,50)</span>
                        </label>
                        <input type="number"
                            class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm border @error('ipk') border-red-500 @enderror"
                            name="ipk">
                        @error('ipk')
                            <p class="text-sm italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <div class="mb-3">
                        <label for="foto" class="font-bold text-sm mb-1 text-gray-700 block">Foto Ijazah/Skhun/UTBK</label>
                        <input type="file"
                        class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-sm"
                        name="foto_ijazah" required>
                        @error('foto_ijazah')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- / Step Content -->
</div>
<!-- / Step Content -->
@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#mahasiswa').on('change', function(e) {
            var mahasiswa = e.target.value;
            if (mahasiswa == 'baru') {
                $('#baru').removeClass('hidden');
                $('#aktif').addClass('hidden');
            }else if(mahasiswa == 'aktif'){
                $('#aktif').removeClass('hidden');
                $('#baru').addClass('hidden');
            }else{
                $('#aktif').addClass('hidden');
                $('#baru').addClass('hidden');
            }
        });

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
                    $('#fakultas_id').append(`<option>-- Pilih Fakultas --</option>`);
                    $.each(data.fakultas, function(index, element){
                        $('#fakultas_id').append(`
                            <option value="`+element.id+`">`+element.name+`</option>
                        `);
                    });
                    if (data.perting.status_pt === 'ptn') {
                        $('#ptn').removeClass('hidden');
                    }else{
                        $('#ptn').addClass('hidden');
                    }
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
                    $('#jurusan_id').empty();
                    $.each(data.jurusan, function(index, element){
                        $('#jurusan_id').append(`
                            <option value="`+element.id+`">`+element.name+`</option>
                        `);
                    });
                }
            });
        });

        //mahasiswa aktif
        $('#perting_id2').on('change', function(e){
            var perting_id = e.target.value;
            $.ajax({
                url : "{{ route('ajax.perting') }}",
                type : "POST",
                data : {
                    "_token": "{{ csrf_token() }}",
                    perting_id: perting_id
                },
                success : function(data){
                    $('#fakultas_id2').empty();
                    $('#fakultas_id2').append(`<option>-- Pilih Fakultas --</option>`);
                    $.each(data.fakultas, function(index, element){
                        $('#fakultas_id2').append(`
                            <option value="`+element.id+`">`+element.name+`</option>
                        `);
                    });
                }
            });
        });

        $('#fakultas_id2').on('change', function(e){
            var fakultas_id = e.target.value;
            $.ajax({
                url : "{{ route('ajax.fakultas') }}",
                type : "POST",
                data : {
                    "_token": "{{ csrf_token() }}",
                    fakultas_id: fakultas_id
                },
                success : function(data){
                    $('#jurusan_id2').empty();
                    $.each(data.jurusan, function(index, element){
                        $('#jurusan_id2').append(`
                            <option value="`+element.id+`">`+element.name+`</option>
                        `);
                    });
                }
            });
        });

    });
</script>
@endsection
