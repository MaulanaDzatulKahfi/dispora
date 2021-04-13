@extends('layouts.template')

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Prestasi</h3>
    </div>

    <div class="w-11/12 mx-auto">
        <!-- Top Navigation -->
        <div class="flex pb-3 text-center overflow-x-scroll md:overflow-hidden">
            @if($role[0] == 'Peserta')
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
                    <div class="mt-1 border-b-4 border-green-600"></div>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
                </div>
            @endif
            @if($role[0] == 'Peserta-kolektif')
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">DataDiri</button>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">KartuKeluarga</button>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Prestasi</button>
                    <div class="mt-1 border-b-4 border-green-600"></div>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
                </div>
            @endif
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
            <select id="jenis" class="w-4/5 px-4 py-2 rounded-lg shadow-sm focus:outline-none focus:shadow-outline focus:ring focus:ring-indigo-100 focus:border-indigo-300 text-gray-600 font-medium mt-1 text-xs md:text-sm border ml-3">
                <option value="">-- Jenis Prestasi --</option>
                <option class="text-xs" value="akademik">Akademik</option>
                <option class="text-xs" value="mahasiswa_aktif">Akademik(Mahasiswa Aktif)</option>
                <option class="text-xs" value="non_akademik">Non Akademik(Olahraga, Kesenian, atau Kepemudaan)</option>
                <option class="text-xs" value="tahfidz">Non Akademik(Tahfidz Qur'an)</option>
                <option class="text-xs" value="kerelawanan">Non Akademik(Kerelawanan)</option>
            </select>
        </div>

        <div class="py-3">
            <div id="akademik" class="hidden">
                {{-- <label class="text-xs italic">*catatan: minimal rangking 3 dari semester 1-6</label> --}}
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="akademik" value="akademik">
                    <div class="">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 1</label>
                        <input type="hidden" name="semester[]" value="1">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 2</label>
                        <input type="hidden" name="semester[]" value="2">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 3</label>
                        <input type="hidden" name="semester[]" value="3">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>
                    <hr>
                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 4</label>
                        <input type="hidden" name="semester[]" value="4">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 5</label>
                        <input type="hidden" name="semester[]" value="5">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>

                    <hr>

                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Semester 6</label>
                        <input type="hidden" name="semester[]" value="6">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Rangking</label>
                        <input type="number"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="rangking[]" required>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Foto rapor</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>

                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>

            <div id="non_akademik" class="hidden">
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="non_akademik" value="non_akademik">
                    <div class="">
                        <label class="font-bold text-sm mb-1 text-gray-700">Juara 1</label>
                        <input type="hidden" name="juara[]" value="1">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Lomba</label>
                        <input type="text"
                            class="w-full ml-12 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lomba[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Tingkat</label>
                        <select class="w-full ml-11 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="tingkat[]" required>
                            <option value="kota">Kota/Kabupaten</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>
                    <div class="mb-2">
                        <a onclick="add_form()"
                        class="bg-blue-500 px-2 py-1 text-white rounded-lg focus:outline-none cursor-pointer">
                            Tambah Form
                        </a>
                    </div>
                    <hr>
                    <div id="form"></div>

                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>

            <div id="mahasiswa_aktif" class="hidden">
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="mahasiswa_aktif" value="mahasiswa_aktif">
                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">NIM</label>
                        <input type="number"
                            class="w-full ml-14 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="nim" required>
                    </div>

                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">IPK</label>
                        <input type="number" step="any"
                            class="w-full ml-16 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border block"
                            name="ipk" required>
                    </div>

                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">semester</label>
                        <input type="number"
                            class="w-full ml-8 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="semester" required>
                    </div>

                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-2 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto" required>
                    </div>
                    <hr>
                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>

            <div id="tahfidz" class="hidden">
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="tahfidz" value="tahfidz">
                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Jumlah hafalan</label>
                        <input type="number"
                            class="w-full ml-3 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="hafal" required>
                    </div>

                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Dari Juz</label>
                        <input type="number"
                            class="w-full ml-12 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="juz1" required>
                    </div>

                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Sampai Juz</label>
                        <input type="number"
                            class="w-full ml-8 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="juz2" required>
                    </div>

                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-5 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto" required>
                    </div>
                    <hr>
                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>

            <div id="kerelawanan" class="hidden">
                <form action="{{ route('prestasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="kerelawanan" value="kerelawanan">
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Penghargaan</label>
                        <input type="text"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lomba[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Lembaga</label>
                        <input type="text"
                            class="w-full ml-9 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lembaga[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Tingkat</label>
                        <select class="w-full ml-11 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="tingkat[]" required>
                            <option value="kota">Kota/Kabupaten</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>
                    <div class="mb-2">
                        <a onclick="add_form_kerelawanan()"
                        class="bg-blue-500 px-2 py-1 text-white rounded-lg focus:outline-none cursor-pointer">
                            Tambah Form
                        </a>
                    </div>
                    <hr>
                    <div id="form_kerelawanan"></div>

                    <div class="mt-5 text-right">
                        <button
                        class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                        type="submit">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        function add_form() {
            $('#form').append(`
                <div id="delete_form">
                    <div class="mt-3">
                        <label class="font-bold text-sm mb-1 text-gray-700">Juara 1</label>
                        <input type="hidden" name="juara[]" value="1">
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Lomba</label>
                        <input type="text"
                            class="w-full ml-12 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lomba[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Tingkat</label>
                        <select class="w-full ml-11 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="tingkat[]" required>
                            <option value="kota">Kota/Kabupaten</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>
                    <div class="mb-2">
                        <a onclick="del_form(this)"
                        class="bg-red-500 px-2 py-1 text-white rounded-lg focus:outline-none cursor-pointer">
                            Hapus Form
                        </a>
                    </div>
                    <hr>
                </div>
            `);
        }
        function del_form(id)
        {
            id.closest('#delete_form').remove();
        }
    </script>
    <script>
        function add_form_kerelawanan() {
            $('#form_kerelawanan').append(`
                <div id="delete_kerelawanan">
                    <div class="mb-2 flex items-center mt-3">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Penghargaan</label>
                        <input type="text"
                            class="w-full ml-4 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lomba[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Lembaga</label>
                        <input type="text"
                            class="w-full ml-9 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border"
                            name="lembaga[]" required>
                    </div>
                    <div class="mb-2 flex items-center">
                        <label class="text-xs mb-1 text-gray-700">Tingkat</label>
                        <select class="w-full ml-11 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="tingkat[]" required>
                            <option value="kota">Kota/Kabupaten</option>
                            <option value="provinsi">Provinsi</option>
                            <option value="nasional">Nasional</option>
                            <option value="internasional">Internasional</option>
                        </select>
                    </div>
                    <div class="mb-3 flex items-center">
                        <label for="nisn" class="text-xs mb-1 text-gray-700">Bukti legalitas</label>
                        <input type="file"
                            class="ml-3 focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs"
                            name="foto[]" required>
                    </div>
                    <div class="mb-2">
                        <a onclick="del_form_kerelawanan(this)"
                        class="bg-red-500 px-2 py-1 text-white rounded-lg focus:outline-none cursor-pointer">
                            Hapus Form
                        </a>
                    </div>
                    <hr>
                </div>
            `);
        }
        function del_form_kerelawanan(id)
        {
            id.closest('#delete_kerelawanan').remove();
        }
    </script>
    <script>
        $('#jenis').on('change', function(e) {
            var jenis = e.target.value;
            if (jenis == 'akademik') {
                $('#akademik').removeClass('hidden');
                $('#non_akademik').addClass('hidden');
                $('#mahasiswa_aktif').addClass('hidden');
                $('#tahfidz').addClass('hidden');
                $('#kerelawanan').addClass('hidden');
            }else if(jenis == 'non_akademik'){
                $('#akademik').addClass('hidden');
                $('#non_akademik').removeClass('hidden');
                $('#mahasiswa_aktif').addClass('hidden');
                $('#tahfidz').addClass('hidden');
                $('#kerelawanan').addClass('hidden');
            }else if(jenis == 'mahasiswa_aktif'){
                $('#akademik').addClass('hidden');
                $('#non_akademik').addClass('hidden');
                $('#mahasiswa_aktif').removeClass('hidden');
                $('#tahfidz').addClass('hidden');
                $('#kerelawanan').addClass('hidden');
            }else if(jenis == 'tahfidz'){
                $('#akademik').addClass('hidden');
                $('#non_akademik').addClass('hidden');
                $('#mahasiswa_aktif').addClass('hidden');
                $('#tahfidz').removeClass('hidden');
                $('#kerelawanan').addClass('hidden');
            }else if(jenis == 'kerelawanan'){
                $('#akademik').addClass('hidden');
                $('#non_akademik').addClass('hidden');
                $('#mahasiswa_aktif').addClass('hidden');
                $('#tahfidz').addClass('hidden');
                $('#kerelawanan').removeClass('hidden');
            }else{
                $('#akademik').addClass('hidden');
                $('#non_akademik').addClass('hidden');
                $('#mahasiswa_aktif').addClass('hidden');
                $('#tahfidz').addClass('hidden');
                $('#kerelawanan').addClass('hidden');
            }
        });
    </script>
@endsection
