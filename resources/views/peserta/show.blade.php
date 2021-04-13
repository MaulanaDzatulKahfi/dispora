@extends('layouts.template')

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Berkas</h3>
    </div>

    <div x-data="app()" x-cloak>

        <div x-show.transition="step != 'complete'">
            <div class="w-11/12 mx-auto">
                <!-- Top Navigation -->
                <div class="flex pb-3 text-center overflow-x-scroll md:overflow-hidden">
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 1" class="font-bold text-gray-700 leading-tight focus:outline-none">DataDiri</button>
                        <div x-show.transition.in="step === 1">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 2" class="font-bold text-gray-700 leading-tight focus:outline-none">KartuKeluarga</button>
                        <div x-show.transition.in="step === 2">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 3" class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
                        <div x-show.transition.in="step === 3">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 4" class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
                        <div x-show.transition.in="step === 4">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 5" class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
                        <div x-show.transition.in="step === 5">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                    <div class="mt-3 mx-3 md:mx-auto">
                        <button @click="step = 6" class="font-bold text-gray-700 leading-tight focus:outline-none">DownloadBerkas</button>
                        <div x-show.transition.in="step === 6">
                            <div class="mt-1 border-b-4 border-green-600"></div>
                        </div>
                    </div>
                </div>
                    {{-- <div class="border-b-4 border-green-600" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div> --}}
                <!-- /Top Navigation -->
            </div>

            <div class="w-11/12 mx-auto px-4 bg-white">

                <!-- Step Content -->
                <div class="py-3">

                    <div x-show.transition.in="step === 1">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Data Diri</h1>
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
                                            <img class="w-40 h-32" src="{{ Storage::url($peserta->datadiri->foto_ktp) }}" alt="KTP">
                                        </td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="h-9 bg-gray-200 pl-3">Foto akta kelahiran</td>
                                        <td class="pl-6">
                                            <img class="w-40 h-32" src="{{ Storage::url($peserta->datadiri->foto_akta) }}" alt="KK">
                                        </td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="h-9 bg-gray-200 pl-3">Foto 4 x 6</td>
                                        <td class="pl-6">
                                            <img class="w-40 h-32" src="{{ Storage::url($peserta->datadiri->pas_foto) }}" alt="KK">
                                        </td>
                                    </tr>
                                </table>
                                <div class="mt-10 flex justify-between">
                                    <a href="{{ route('home') }}" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</a>
                                    <button @click="step = 2" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 2">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Kartu Keluarga</h1>
                            </div>
                            <div class="p-6 text-gray-700">
                                <table>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">No Kartu keluarga</td>
                                        <td class="w-60 pl-6">{{ $peserta->kk->no_kk }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="h-9 bg-gray-200 pl-3">Foto KK</td>
                                        <td class="pl-6">
                                            <img class="w-40 h-32" src="{{ Storage::url($peserta->kk->foto_kk) }}" alt="KK">
                                        </td>
                                    </tr>
                                </table>
                                <div class="mt-10 flex justify-between">
                                    <button @click="step = 1" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</button>
                                    <button @click="step = 3" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 3">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Prestasi</h1>
                            </div>
                            <div class="p-6 text-gray-700">
                                <table>
                                    @foreach($prestasi as $p )
                                        @if($p->jenis == 'akademik')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-green-600 pl-3 text-center text-white" colspan="2">
                                                    Semester {{ $p->semester }}
                                                </td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Rangking</td>
                                                <td class="w-60 pl-6">{{ $p->rangking }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Bukti Legalitas</td>
                                                <td class="w-60 pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($p->foto) }}" alt="Prestasi">
                                                </td>
                                            </tr>
                                        @endif
                                        @if($p->jenis == 'mahasiswa_aktif')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-green-600 text-center text-white" colspan="2">Semester {{ $p->semester }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">NIM</td>
                                                <td class="w-60 pl-6">{{ $p->nim }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">IPK</td>
                                                <td class="w-60 pl-6">{{ $p->ipk }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="h-9 bg-gray-200 pl-3">Bukti Legalitas</td>
                                                <td class="pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($p->foto) }}" alt="prestasi">
                                                </td>
                                            </tr>
                                        @endif
                                        @if($p->jenis == 'non_akademik')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-green-600 text-center text-white" colspan="2">Lomba {{ $p->lomba }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Tingkat</td>
                                                <td class="w-60 pl-6">{{ $p->tingkat }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="h-9 bg-gray-200 pl-3">Bukti Legalitas</td>
                                                <td class="pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($p->foto) }}" alt="prestasi">
                                                </td>
                                            </tr>
                                        @endif
                                        @if($p->jenis == 'tahfidz')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-green-600 text-center text-white" colspan="2">Jumlah hafalan {{ $p->hafal }} Juz</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Dari Juz</td>
                                                <td class="w-60 pl-6">{{ $p->juz1 }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Sampai Juz</td>
                                                <td class="w-60 pl-6">{{ $p->juz2 }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="h-9 bg-gray-200 pl-3">Bukti Legalitas</td>
                                                <td class="pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($p->foto) }}" alt="prestasi">
                                                </td>
                                            </tr>
                                        @endif
                                        @if($p->jenis == 'kerelawanan')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-green-600 text-center text-white" colspan="2">Penghargaan {{ $p->lomba }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Lembaga</td>
                                                <td class="w-60 pl-6">{{ $p->lembaga }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="w-44 h-9 bg-gray-200 pl-3">Tingkat</td>
                                                <td class="w-60 pl-6">{{ $p->tingkat }}</td>
                                            </tr>
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="h-9 bg-gray-200 pl-3">Bukti Legalitas</td>
                                                <td class="pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($p->foto) }}" alt="prestasi">
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </table>
                                <div class="mt-10 flex justify-between">
                                    <button @click="step = 2" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</button>
                                    <button @click="step = 4" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 4">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Pertanyaan & Sosial Media</h1>
                            </div>
                            <div class="p-6 text-gray-700">
                                <table>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-green-600 pl-3 text-center text-white" colspan="2">
                                            Pertanyaan
                                        </td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Apa yang membuat kamu bangga menjadi warga Kabupaten Bogor ?</td>
                                        <td class="w-60 pl-6 text-xs">{{ $peserta->pertanyaan->pertanyaan1 }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Apa yang membuat kamu memilih fakultas/jurusan tersebut ?</td>
                                        <td class="w-60 pl-6 text-xs">{{ $peserta->pertanyaan->pertanyaan2 }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Apa yang akan kamu lakukan untuk Kabupaten Bogor setelah lulus sarjana ?</td>
                                        <td class="w-60 pl-6 text-xs">{{ $peserta->pertanyaan->pertanyaan3 }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-green-600 pl-3 text-center text-white" colspan="2">
                                            Sosial Media
                                        </td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Email</td>
                                        <td class="w-60 pl-6">{{ $peserta->pertanyaan->email }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">No HP/WA</td>
                                        <td class="w-60 pl-6">{{ $peserta->pertanyaan->no_hp }}</td>
                                    </tr>
                                    @if($peserta->pertanyaan->facebook)
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Facebook</td>
                                            <td class="w-60 pl-6">{{ $peserta->pertanyaan->facebook }}</td>
                                        </tr>
                                    @endif
                                    @if($peserta->pertanyaan->instagram)
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Instagram</td>
                                            <td class="w-60 pl-6">{{ $peserta->pertanyaan->instagram }}</td>
                                        </tr>
                                    @endif
                                    @if($peserta->pertanyaan->twitter)
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Twitter</td>
                                            <td class="w-60 pl-6">{{ $peserta->pertanyaan->twitter }}</td>
                                        </tr>
                                    @endif
                                    @if($peserta->pertanyaan->youtube)
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Youtube</td>
                                            <td class="w-60 pl-6">{{ $peserta->pertanyaan->youtube }}</td>
                                        </tr>
                                    @endif
                                </table>
                                <div class="mt-10 flex justify-between">
                                    <button @click="step = 3" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</button>
                                    <button @click="step = 5" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 5">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Pendidikan</h1>
                            </div>
                            <div class="p-6 text-gray-700">
                                <table>
                                    @if($peserta->status_mhs == 'baru')
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3">NISN</td>
                                            <td class="w-60 pl-6">{{ $peserta->nisn }}</td>
                                        </tr>
                                    @endif
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Asal sekolah</td>
                                        <td class="w-60 pl-6">{{ $peserta->asal_sekolah }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Lulus tahun</td>
                                        <td class="w-60 pl-6">{{ $peserta->lulus_tahun }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        @if($peserta->status_mhs == 'baru')
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Perguruan tinggi yang diminati</td>
                                        @endif
                                        @if($peserta->status_mhs == 'aktif')
                                            <td class="w-44 h-9 bg-gray-200 pl-3">Perguruan tinggi</td>
                                        @endif
                                        <td class="w-60 pl-6">{{ $peserta->perting->name }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Fakultas</td>
                                        <td class="w-60 pl-6">{{ $peserta->fakultas->name }}</td>
                                    </tr>
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="w-44 h-9 bg-gray-200 pl-3">Jurusan</td>
                                        <td class="w-60 pl-6">{{ $peserta->jurusan->name }}</td>
                                    </tr>
                                    @if($peserta->status_mhs == 'baru')
                                        @if($peserta->perting->status_pt == 'ptn')
                                            <tr class="border-b-2 border-gray-300">
                                                <td class="h-9 bg-gray-200 pl-3">Foto Snmptn/Sbmptn</td>
                                                <td class="pl-6">
                                                    <img class="w-40 h-32" src="{{ Storage::url($peserta->foto_ptn) }}" alt="ijazah">
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    <tr class="border-b-2 border-gray-300">
                                        <td class="h-9 bg-gray-200 pl-3">Foto ijazah/skhun/utbk</td>
                                        <td class="pl-6">
                                            <img class="w-40 h-32" src="{{ Storage::url($peserta->foto) }}" alt="ijazah">
                                        </td>
                                    </tr>
                                </table>
                                <div class="mt-10 flex justify-between">
                                    <button @click="step = 4" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</button>
                                    <button @click="step = 6" class="px-4 py-2 rounded-md text-white bg-green-600 focus:bg-green-800 focus:outline-none">Lanjut</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div x-show.transition.in="step === 6">
                        <div class="main bg-white border-2 border-green-600 rounded-lg">
                            <div class="border-b-2 border-green-600 bg-green-600">
                                <h1 class="p-4 font-bold text-white leading-tight focus:outline-none text-lg text-center">Download Berkas</h1>
                            </div>
                            <div class="p-6 text-gray-700">
                                <table>
                                    {{-- @if($role[0] == 'Peserta') --}}
                                        <tr class="border-b-2 border-gray-300">
                                            <td class="w-44 h-9 bg-gray-200 pl-3 text-sm">Surat Permohonan Beasiswa</td>
                                            <td class="w-60 pl-6">
                                                <a target="_blank" href="{{ route('peserta.suratPermohonan', $peserta->id) }}"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-full">
                                                    Download
                                                </a>
                                            </td>
                                        </tr>
                                    {{-- @endif --}}
                                </table>
                                <div class="mt-10 flex justify-start">
                                    <button @click="step = 5" class="px-4 py-2 rounded-md bg-gray-200 focus:bg-gray-400 focus:outline-none">Kembali</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
                step: 6,
            }
        }
    </script>
@endsection


