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
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
                    <div class="mt-1 border-b-4 border-green-600"></div>
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
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pertanyaan&Sosmed</button>
                    <div class="mt-1 border-b-4 border-green-600"></div>
                </div>
                <div class="mt-3 mx-3 md:mx-auto">
                    <button class="font-bold text-gray-700 leading-tight focus:outline-none">Pendidikan</button>
                </div>
            @endif
        </div>
        <!-- /Top Navigation -->
    </div>

    <div class="w-11/12 mx-auto px-4 bg-white">
        <div class="py-3">
            <form action="{{ route('pertanyaan.store') }}" method="POST">
                @csrf
                <!-- pertanyaan -->
                <label class="font-bold text-md mb-1 text-gray-700 block">Pertanyaan</label>
                <label class="text-xs md:text-sm text-gray-700">3 pertanyaan di bawah ini untuk diisi sebagai berikut :</label>
                <ul class="text-xs md:text-sm text-gray-700 ml-6 mb-3 list-decimal">
                    <li>Tulisan tidak melanggar unsur Suku.</li>
                    <li>Agama dan Ras/ SARA  sesuai peraturan dan perundang-undangan yang berlaku.</li>
                    <li>Minimal 50 kata</li>
                </ul>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">1. Apa yang membuat kamu bangga menjadi warga Kabupaten Bogor ?</label>
                    <div class="flex items-center">
                        <textarea class="w-full ml-2 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="pertanyaan1" required>{{ old('pertanyaan1') }}</textarea>
                    </div>
                    @error('pertanyaan1')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">2. Apa yang membuat kamu memilih fakultas/jurusan tersebut ?</label>
                    <div class="flex items-center">
                        <textarea class="w-full ml-2 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="pertanyaan2" required>{{ old('pertanyaan2') }}</textarea>
                    </div>
                    @error('pertanyaan2')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="text-xs md:text-sm text-gray-700">3. Apa yang akan kamu lakukan untuk Kabupaten Bogor setelah lulus sarjana ?</label>
                    <div class="flex items-center">
                        <textarea class="w-full ml-2 md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="pertanyaan3" required>{{ old('pertanyaan3') }}</textarea>
                    </div>
                    @error('pertanyaan3')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- akhir pertanyaan -->
                <!-- sosmed -->
                <label class="font-bold text-md mb-1 text-gray-700 block">Sosial media</label>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">Email (wajib diisi)</label>
                    @if($role[0] == 'Peserta')
                        <div class="flex items-center">
                            <input type="email"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                    @endif
                    @if($role[0] == 'Peserta-kolektif')
                        <div class="flex items-center">
                            <input type="email"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="email" value="{{ old('email') }}" required>
                        </div>
                    @endif
                    @error('email')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">No HP/WA (wajib diisi)</label>
                    <div class="flex items-center">
                        <input type="number"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="no_hp" required>
                    </div>
                    @error('no_hp')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">Facebook (boleh diisi)</label>
                    <div class="flex items-center">
                        <input type="text"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="facebook">
                    </div>
                    @error('facebook')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">Instagram (boleh diisi)</label>
                    <div class="flex items-center">
                        <input type="text"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="instagram">
                    </div>
                    @error('instagram')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">Twitter (boleh diisi)</label>
                    <div class="flex items-center">
                        <input type="text"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="twitter">
                    </div>
                    @error('twitter')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label class="text-xs md:text-sm text-gray-700">Youtube (boleh diisi)</label>
                    <div class="flex items-center">
                        <input type="text"class="w-full md:w-1/4 pl-2 py-1 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium text-xs border" name="youtube">
                    </div>
                    @error('youtube')
                        <p class="text-xs italic text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <!-- akhir sosmed-->
                <div class="mt-5 text-right">
                    <button
                    class="w-32 focus:outline-none border border-transparent py-2 px-4 rounded-lg shadow-sm text-center text-white bg-green-500 hover:bg-green-700 font-medium"
                    type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>

@endsection
