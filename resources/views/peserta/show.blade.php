@extends('layouts.template')

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Berkas</h3>
    </div>

    <div x-data="app()" x-cloak>

        <div x-show.transition="step != 'complete'">
            <div class="w-11/12 mx-auto">
                <!-- Top Navigation -->
                <div class="flex justify-around pb-3 text-center">
                    <div class="mt-3">
                        <button @click="step = 1" class="font-bold text-gray-700 leading-tight focus:outline-none">Data diri</button>
                    </div>
                    <div class="mt-3">
                        <button @click="step = 2" class="font-bold text-gray-700 leading-tight focus:outline-none">Kartu Keluarga</button>
                    </div>
                    <div class="mt-3">
                        <button @click="step = 3" class="font-bold text-gray-700 leading-tight focus:outline-none">Perguruan Tinggi Yang Diminati</button>
                    </div>
                </div>
                    <div class="border-b-4 border-green-600" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
                <!-- /Top Navigation -->
            </div>

            <div class="w-11/12 mx-auto px-4 bg-white">

                <!-- Step Content -->
                <div class="py-6">

                    <div x-show.transition.in="step === 1">
                        {{-- <div class="body"> --}}
                            <div class="main bg-white border-2 border-green-600 rounded-lg">
                                <div class="border-b-2 border-green-600 bg-green-600">
                                    <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">DATA DIRI</h1>
                                </div>
                                <div class="p-6 text-gray-700">
                                    <table>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">NIK</td>
                                            <td class="w-60 pl-6">{{ $peserta->datadiri->nik }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Nama</td>
                                            <td class="pl-6">{{ $peserta->datadiri->nama }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Tempat, tanggal lahir</td>
                                            <td class="pl-6">{{ $peserta->datadiri->tempat. ', ' .$peserta->datadiri->tgl_lahir }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Jenis kelamin</td>
                                            <td class="pl-6">{{ $peserta->datadiri->jk }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Alamat</td>
                                            <td class="pl-6">{{ $peserta->datadiri->alamat }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Kecamatan</td>
                                            <td class="pl-6">{{ $peserta->datadiri->kecamatan }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Agama</td>
                                            <td class="pl-6">{{ $peserta->datadiri->agama }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Status perkawinan</td>
                                            <td class="pl-6">{{ $peserta->datadiri->status_perkawinan }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Pekerjaan</td>
                                            <td class="pl-6">{{ $peserta->datadiri->pekerjaan }}</td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Foto KTP</td>
                                            <td class="pl-6">
                                                <img class="w-40 h-32" src="{{ asset(Storage::url($peserta->datadiri->foto_ktp))" alt="KTP">
                                            </td>
                                        </tr>
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="h-9 bg-gray-200 pl-3">Foto akta kelahiran</td>
                                            <td class="pl-6">
                                                <img class="w-40 h-32" src="{{ asset(Storage::url($peserta->datadiri->foto_kk)) }}" alt="KTP">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        {{-- </div> --}}
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
        function app() {
            return {
                step: 1,
            }
        }
    </script>
@endsection


