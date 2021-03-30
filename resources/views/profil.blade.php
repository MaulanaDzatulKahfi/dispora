@extends('layouts.template')

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                Profil
            </h3>
        </div>
    </div>


    <section class="py-10 bg-opacity-50 h-full">
        <div class="mx-auto container w-full md:w-3/4 shadow-md">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white space-y-0">
                <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 max-w-sm mx-auto">Personal Info</h2>
                    <div class="md:w-2/3 max-w-sm mx-auto text-sm ">
                        <table>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">Nama</label></td>
                                <td><label class="text-gray-800">Maulana Dzatul Kahfi Hidayat</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">NIK</label></td>
                                <td><label class="text-gray-800">320101230102XXXX</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">KK</label></td>
                                <td><label class="text-gray-800">320101230102XXXX</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">Agama</label></td>
                                <td><label class="text-gray-800">Islam</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">Alamat</label></td>
                                <td><label class="text-gray-800">Gang Rawasalak Kebon Kembang No. 20</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">Kecamatan</label></td>
                                <td><label class="text-gray-800">Gunung Puyuh</label></td>
                            </tr>
                            <tr>
                                <td class="w-20"><label class="text-gray-400">Jenis Kelamin</label></td>
                                <td><label class="text-gray-800">Laki - laki</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr />
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                <h2 class="md:w-1/3 mx-auto max-w-sm">Akun</h2>
                <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                    <div>
                        <label class="text-sm text-gray-400">Email</label>
                        <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                            <svg
                                fill="none"
                                class="w-6 text-gray-400 mx-auto"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>
                            </div>
                            <input
                            type="email"
                            class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            placeholder="{{ Auth::user()->email }}"
                            disabled
                            />
                        </div>
                    </div>
                    <div>
                        <form action="{{ route('profil.update', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <label class="text-sm text-gray-400">Nama</label>
                            <div class="w-full inline-flex border">
                                <div class="w-1/12 pt-2 bg-gray-100">
                                <svg
                                    fill="none"
                                    class="w-6 text-gray-400 mx-auto"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                </div>
                                <input
                                type="text"
                                name="name"
                                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                                value="{{ Auth::user()->name }}"
                                />
                            </div>
                        </div>
                        <div class="md:w-3/12 float-none md:float-right md:pl-6">
                            <button type="submit" class="text-white w-full mx-auto max-w-sm rounded-md bg-green-600 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
                            Edit
                            </button>
                        </div>
                    </form>
                </div>
                </div>

                <hr />
                <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">
                <h2 class="md:w-4/12 max-w-sm mx-auto">Ganti password</h2>

                <div class="md:w-5/12 w-full md:pl-9 max-w-sm mx-auto space-y-5 md:inline-flex pl-2">
                    <div class="w-full inline-flex border-b">
                    <div class="w-1/12 pt-2">
                        <svg
                        fill="none"
                        class="w-6 text-gray-400 mx-auto"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        />
                        </svg>
                    </div>
                    <input
                        type="password"
                        class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                        value="••••••••••••••"
                        disabled
                    />
                    </div>
                </div>

                <div class="md:w-3/12 text-center md:pl-6">
                    <button class="text-white w-full mx-auto max-w-sm rounded-md bg-green-600 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
                    Edit
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
