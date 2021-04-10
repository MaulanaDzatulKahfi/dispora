@extends('layouts.template')

@section('header')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Tambah Peserta</h3>
    </div>
    <div>
        <div class="w-11/12 mx-auto">
            <!-- Top Navigation -->
            <div class="flex justify-around pb-3 text-center">
                <div class="mt-3">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Data Diri</button>
                        <div class="mt-1 border-b-4 border-green-600"></div>
                </div>
                <div class="mt-3">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Kartu Keluarga</button>
                </div>
                <div class="mt-3">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
                </div>
                <div class="mt-3">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
                </div>
            </div>
            <!-- /Top Navigation -->
        </div>

        <div class="w-11/12 mx-auto px-4 bg-white">

            <!-- Step Content -->
            <div class="py-3">
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

                <div class="p-6">
                    <form action="{{ route('datadiri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nik" class="font-bold text-xs mb-1 text-gray-700">NIK</label>
                            <input type="number"
                                class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 text-xs border @error('nik') border-red-500 @enderror"
                                name="nik" placeholder="NIK"
                                value="{{ old('nik') }}"
                                autofocus required>
                            @error('nik')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nama" class="font-bold text-xs mb-1 text-gray-700 block">Nama Lengkap</label>
                            <input type="text"
                                class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border @error('nama') border-red-500 @enderror"
                                name="nama"
                                placeholder="Nama Lengkap"
                                value="{{ old('nama') }}" required>
                            @error('nama')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3 flex justify-between">
                            <div class="sm:w-3/5 w-1/2">
                                <label for="tempat" class="font-bold text-xs mb-1 text-gray-700 block">Tempat Lahir</label>
                                <input type="text"
                                    class="w-11/12 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border @error('tempat') border-red-500 @enderror"
                                    name="tempat"
                                    placeholder="Tempat Lahir"
                                    value="{{ old('tempat') }}" required>
                                @error('tempat')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="sm:w-2/5 w-1/2">
                                <label for="tgl_lahir" class="font-bold text-xs mb-1 text-gray-700 block">Tanggal Lahir</label>
                                <input type="text"
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border @error('tgl_lahir') border-red-500 @enderror"
                                    name="tgl_lahir"
                                    id="tgl_lahir"
                                    value="{{ old('tgl_lahir') }}" required>
                                @error('tgl_lahir')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="font-bold text-xs mb-1 text-gray-700 block">Jenis Kelamin</label>
                            <label class="inline-flex items-center mt-1">
                                <input type="radio" class="form-radio h-4 w-4 text-green-600" name="jk" value="Laki-laki"><span class="font-bold text-xs mb-1 ml-2 text-gray-700">Laki - laki</span>
                            </label>
                            <label class="inline-flex items-center mt-1 ml-16">
                                <input type="radio" class="form-radio h-4 w-4 text-green-600" name="jk" value="Perempuan"><span class="font-bold text-xs mb-1 ml-2 text-gray-700">Perempuan</span>
                            </label>
                            @error('jk')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="font-bold text-xs mb-1 text-gray-700 block">Alamat</label>
                            <textarea class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border @error('alamat') border-red-500 @enderror"
                            name="alamat" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kecamatan" class="font-bold text-xs mb-1 text-gray-700 block">Kecamatan</label>
                            <select name="kecamatan" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border">
                                @foreach($kecamatan as $k)
                                    <option value="{{ $k->name }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="agama" class="font-bold text-xs mb-1 text-gray-700 block">Agama</label>
                            <select name="agama" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            @error('agama')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="font-bold text-xs mb-1 text-gray-700 block">Status Perkawinan</label>
                            <select name="status_perkawinan" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border">
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                            @error('status_perkawinan')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pekerjaan" class="font-bold text-xs mb-1 text-gray-700 block">Pekerjaan</label>
                            <input type="text"
                                class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs border @error('pekerjaan') border-red-500 @enderror"
                                name="pekerjaan"
                                placeholder="Pekerjaan"
                                value="{{ old('pekerjaan') }}" required>
                            @error('pekerjaan')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="font-bold text-xs mb-1 text-gray-700 block">Foto KTP/KIA</label>
                            <input type="file"
                            class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs"
                            name="foto_ktp" required>
                            @error('foto_ktp')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="font-bold text-xs mb-1 text-gray-700 block">Foto Akta Kelahiran</label>
                            <input type="file"
                            class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs"
                            name="foto_akta" required>
                            @error('foto_akta')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto" class="font-bold text-xs mb-1 text-gray-700 block">Foto 4x6</label>
                            <input type="file"
                            class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs"
                            name="pas_foto" required>
                            @error('pas_foto')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            <p class="text-xs italic text-red-500">*latar belakang warna merah</p>
                        </div>
                        <div class="mt-5 text-right">
                            <button
                            class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                            type="submit">Kirim</button>
                        </div>
                    </form>
                </div>

                {{--
                <div">
                    <form action="{{ route('peserta.store') }}" method="POST">
                        @csrf
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
                </div> --}}

            </div>
            <!-- / Step Content -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#tgl_lahir').daterangepicker({
                autoUpdateInput: false,
                autoApply: true,
                singleDatePicker: true,
                showDropdowns: true,
                maxDate: "2005-09-01",
                minDate: "1991-09-01",
                locale: {
                    format: 'YYYY-MM-DD'
                },
            });
            $('#tgl_lahir').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
        });
    </script>
@endsection


