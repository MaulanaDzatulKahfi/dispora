{{-- @extends('layouts.template')

@section('content') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Diri</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" defer></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .kuning{
            color: #fff500;
        }
    </style>
</head>
<body class="bg-gray-100">
    <nav class="flex bg-green-600 justify-between">
        <div class="text-xs flex py-3 px-7 kuning">
            <div>
                <a href="https://ahlibikin.website/">
                    <span class="fa fa-graduation-cap"></span>
                    Beranda
                </a>
            </div>
            <div class="px-4">
                <a href="https://ahlibikin.website/tentang-kami">
                    <span class="fa fa-briefcase"></span>
                    Tentang Kami
                </a>
            </div>
            <div>
                <a href="https://ahlibikin.website/faq">
                    <span class="fa fa-comments"></span>
                    FAQ
                </a>
            </div>
            <div class="px-4">
                <a href="#">
                    <span class="fa fa-book"></span>
                    Panduan
                </a>
            </div>
        </div>
    </nav>

	<div x-data="app()" x-cloak>

        <div x-show.transition="step != 'complete'">
            <div class="max-w-2xl mx-auto">
                <!-- Top Navigation -->
                <div class="flex justify-around pb-3 text-center">
                    <div class="mt-6">
                        <button @click="step = 1" class="text-lg font-bold text-gray-700 leading-tight focus:outline-none">Data Diri</button>
                    </div>
                    <div class="mt-6">
                        <button @click="step = 2" class="text-lg font-bold text-gray-700 leading-tight focus:outline-none">Kartu Keluarga</button>
                    </div>
                </div>
                <div class="border-b-4 border-green-600" :style="'width: '+ parseInt(step / 2 * 100) +'%'"></div>
                <!-- /Top Navigation -->
            </div>

            <div class="max-w-2xl mx-auto px-4 bg-white overflow-y-scroll" style="height: 32rem">
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
				<div class="py-4">
					<div x-show.transition.in="step === 1">
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
                                <textarea class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs @error('alamat') border-red-500 @enderror"
                                name="alamat" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kecamatan" class="font-bold text-xs mb-1 text-gray-700 block">Kecamatan</label>
                                <select name="kecamatan" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs">
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
                                <select name="agama" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs">
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
                                <select name="status_perkawinan" class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs">
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
                                    class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs @error('pekerjaan') border-red-500 @enderror"
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

					<div x-show.transition.in="step === 2">

						<div class="mb-10">
                            <form action="{{ route('datadiri.storekk') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="no_kk" class="font-bold text-xs mb-1 text-gray-700">No KK</label>
                                    <input type="number"
                                        class="w-full px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 focus:ring-green-600 text-xs @error('no_kk') border-red-500 @enderror" name="no_kk" placeholder="No KK" value="{{ old('no_kk') }}" autofocus required>
                                    @error('no_kk')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="foto_kk" class="font-bold text-xs mb-1 text-gray-700 block">Foto KK</label>
                                    <input type="file"
                                        class="focus:outline-none focus:shadow-outline text-gray-600 font-medium mt-1 text-xs" name="foto_kk" required>
                                    @error('foto_kk')
                                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="my-5 text-right">
                                    <button class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                                    type="submit">Kirim</button>
                                </div>
                            </form>
						</div>

					</div>

				</div>
				<!-- / Step Content -->
			</div>
		</div>
	</div>
	<script>
		function app() {
			return {
				step: 1,
				passwordStrengthText: '',
				togglePassword: false,
				password: '',
				gender: 'Male',
			}
		}

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
</body>
<html>
{{-- @endsection --}}
