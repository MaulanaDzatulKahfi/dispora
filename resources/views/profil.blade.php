@extends('layouts.template')

@section('header')
     <!-- component -->
    <style>
        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .animated.faster {
            -webkit-animation-duration: 500ms;
            animation-duration: 500ms;
        }

        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
        }

        .fadeOut {
            -webkit-animation-name: fadeOut;
            animation-name: fadeOut;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
@endsection

@section('content')
    <div class="flex bg-green-600 p-4 shadow justify-between">
        <div class="text-xl text-white">
            <h3 class="font-bold pl-2">
                Profil
            </h3>
        </div>
    </div>


    <div class="py-10 bg-opacity-50 h-full">
        <div class="mx-auto container w-full shadow-md">
            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mt-3" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white space-y-0">
                @if($role[0] === 'Peserta')
                    <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                        <h2 class="md:w-1/3 max-w-md mx-auto">Personal Info</h2>
                        <div class="md:w-2/3 max-w-md mx-auto text-sm ">
                            <table>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">NIK</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->nik }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">KK</label></td>
                                    <td><label class="text-gray-800">{{ $kk->no_kk }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">Nama</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->nama }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">Agama</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->agama }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">Alamat</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->alamat }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">Kecamatan</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->kecamatan }}</label></td>
                                </tr>
                                <tr>
                                    <td class="w-24"><label class="text-gray-400">Jenis Kelamin</label></td>
                                    <td><label class="text-gray-800">{{ $datadiri->jk }}</label></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr />
                @endif
                @if($role[0] === 'Peserta-kolektif')
                <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                    <h2 class="md:w-1/3 max-w-md mx-auto">Personal Info</h2>
                    <div class="md:w-2/3 max-w-md mx-auto text-sm ">
                        <table>
                            <tr>
                                <td class="w-24"><label class="text-gray-400">NIP</label></td>
                                <td><label class="text-gray-800">{{ $petugas->nip }}</label></td>
                            </tr>
                            <tr>
                                <td class="w-24"><label class="text-gray-400">Nama</label></td>
                                <td><label class="text-gray-800">{{ $petugas->name }}</label></td>
                            </tr>
                            <tr>
                                <td class="w-24"><label class="text-gray-400">Jabatan</label></td>
                                <td><label class="text-gray-800">{{ $petugas->jabatan }}</label></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr />
                @endif

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
                        <form action="{{ route('profil.update') }}" method="POST">
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
                            @error('name')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
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
                    <button
                        class="text-white w-full mx-auto max-w-sm rounded-md bg-green-600 py-2 px-4 inline-flex items-center focus:outline-none md:float-right"
                        onclick="openModal('main-modal')"
                    >
                    Edit Password
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal" class="main-modal fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center animated fadeIn faster" style="background: rgba(0,0,0,.7);">
        <div class="border border-teal-500 shadow-lg modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <!--Title-->
                <div class="flex justify-between items-center pb-3">
                    <p class="text-2xl font-bold text-gray-500">Ganti Password</p>
                    <div class="modal-close cursor-pointer z-50" onclick="modalClose('main-modal')">
                        <svg class="fill-current text-gray-500" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg>
                    </div>
                </div>
                <!--Body-->
                <div class="my-5 mr-5 ml-5 flex justify-center">
                    <form action="{{ route('change.password') }}" method="POST" class="w-full">
                        @csrf
                        <div class="">
                            <div class="mb-5">
                                <label class="text-md text-gray-600">Password saat ini</label>
                                <input type="password"
                                name="password_saat_ini"
                                class="h-2 p-6 w-full border-2 border-gray-300 rounded-md focus:outline-none @error('password_saat_ini') border-red-500 @enderror" required>
                                @error('password_saat_ini')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-md text-gray-600">Password Baru</label>
                                <input type="password"
                                name="password_baru"
                                class="h-2 p-6 w-full border-2 border-gray-300 rounded-md focus:outline-none @error('password_baru') border-red-500 @enderror" required>
                                @error('password_baru')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label class="text-md text-gray-600">Konfirmasi Password Baru</label>
                                <input type="password"
                                name="konfirmasi_password_baru"
                                class="h-2 p-6 w-full border-2 border-gray-300 rounded-md focus:outline-none @error('konfirmasi_password_baru') border-red-500 @enderror" required>
                                @error('konfirmasi_password_baru')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
                <!--Footer-->
                <div class="flex justify-end pt-2 space-x-14">
                    <button
                        class="px-4 bg-gray-200 p-3 rounded text-black hover:bg-gray-300 font-semibold focus:outline-none" onclick="modalClose('main-modal')">Cancel</button>
                    <button type="submit"
                        class="px-4 bg-green-600 p-3 ml-3 rounded-lg text-white hover:bg-teal-400 focus:outline-none">Edit</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @if (count($errors) > 0)
        <script>
            all_modals = ['main-modal']
            all_modals.forEach((modal)=>{
                const modalSelected = document.querySelector('.'+modal);
                modalSelected.classList.remove('fadeOut');
                modalSelected.classList.add('fadeIn');
                modalSelected.style.display = 'flex';
            })
        </script>
    @else
        <script>
            all_modals = ['main-modal']
            all_modals.forEach((modal)=>{
                const modalSelected = document.querySelector('.'+modal);
                modalSelected.classList.remove('fadeIn');
                modalSelected.classList.add('fadeOut');
                modalSelected.style.display = 'none';
            })
        </script>
    @endif

    <script>
        // all_modals = ['main-modal']
        // all_modals.forEach((modal)=>{
        //     const modalSelected = document.querySelector('.'+modal);
        //     modalSelected.classList.remove('fadeIn');
        //     modalSelected.classList.add('fadeOut');
        //     modalSelected.style.display = 'none';
        // })
        const modalClose = (modal) => {
            const modalToClose = document.querySelector('.main-modal');
            modalToClose.classList.remove('fadeIn');
            modalToClose.classList.add('fadeOut');
            setTimeout(() => {
                modalToClose.style.display = 'none';
            }, 500);
        }

        const openModal = (modal) => {
            const modalToOpen = document.querySelector('.main-modal');
            modalToOpen.classList.remove('fadeOut');
            modalToOpen.classList.add('fadeIn');
            modalToOpen.style.display = 'flex';
        }
    </script>
@endsection
