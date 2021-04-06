<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $tittle }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    @yield('header')
</head>


<body class="bg-white font-sans leading-normal tracking-normal mt-5 md:mt-12">

    <!--Nav-->
    <nav class="bg-white pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0 shadow-md ">

        <div class="flex items-center justify-between">
            <div class="flex flex-shrink text-gray-800 font-semibold">
                <img src="{{ asset('img/logo.jpg')}}" alt="logo" class="w-10 h-13 pt-1">
                <a href="{{ route('home') }}">
                    <span class="text-sm pl-2 md:text-xl">BEASISWA</span><br>
                    <span class="text-xs pl-2">PANCAKARSA</span>
                </a>
            </div>

            <div class="flex">
                <ul class="list-reset flex flex-1 md:flex-none">
                    <li class="flex-1 md:flex-none md:mr-3">
                        <div class="relative inline-block">
                            <button onclick="toggleDD('myDropdown')" class="drop-button text-gray-600 font-semibold focus:outline-none text-sm lg:text-lg">
                                {{ Auth::user()->name }}
                                <svg class="h-4 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
                            </button>
                            <div id="myDropdown" class="dropdownlist absolute bg-white text-gray-500 right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <a href="{{ route('profil') }}" class="p-2 text-gray-500 text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profil</a>
                                <a href="{{ route('logout') }}" class="p-2 text-gray-500 text-sm no-underline hover:no-underline block"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </nav>


    <div class="flex flex-col md:flex-row">

        {{-- <div class="bg-white h-16 md:h-auto fixed bottom-0 mt-3 md:relative  z-10 w-full md:w-48"> --}}
        <div class="bg-white h-16 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48">

            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col py-0 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <a href="{{ url('/home') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('home')? "border-green-600":"hover:border-green-600" }}">
                            <i class="fas fa-tachometer-alt pr-0 md:pr-3  {{ Request::is('home')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Dashboard</span>
                        </a>
                    </li>
                    @can('peserta-list')
                    <li class="mr-3 flex-1">
                        <a href="{{ route('peserta.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('peserta', 'peserta/*')? "border-green-600":"hover:border-green-600" }}">
                            <i class="fas fa-universal-access pr-0 md:pr-3  {{ Request::is('peserta', 'peserta/*')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Peserta</span>
                        </a>
                    </li>
                    @endcan
                    <li class="mr-3 flex-1">
                        <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white hover:border-green-600">
                            <i class="fas fa-user-graduate  pr-0 md:pr-3"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Beasiswa</span>
                        </a>
                    </li>
                    @can('perting-list')
                        <li class="mr-3 flex-1">
                            <a href="{{ route('perting.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('perting', 'perting/*', 'jurusan', 'jurusan/*', 'fakultas', 'fakultas/*')? "border-green-600":"hover:border-green-600" }}">
                                <i class="fas fa-university pr-0 md:pr-3 {{ Request::is('perting', 'perting/*', 'jurusan', 'jurusan/*', 'fakultas', 'fakultas/*')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Perguruan Tinggi</span>
                            </a>
                        </li>
                    @endcan
                    @can('user-list')
                        <li class="mr-3 flex-1">
                            <a href="{{ route('users.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('users', 'users/*')? "border-green-600":"hover:border-green-600" }}">
                                <i class="fa fa-users pr-0 md:pr-3 {{ Request::is('users', 'users/*')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">User</span>
                            </a>
                        </li>
                    @endcan
                    @can('role-list')
                        <li class="mr-3 flex-1">
                            <a href="{{ route('roles.index') }}" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('roles', 'roles/*')? "border-green-600":"hover:border-green-600" }}">
                                <i class="fas fa-user-tag pr-0 md:pr-3 {{ Request::is('roles', 'roles/*')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Roles</span>
                            </a>
                        </li>
                    @endcan
                    @can('permission-list')
                        <li class="mr-3 flex-1">
                            <a href="{{ route('permission.index') }}"
                            class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-green-600 border-b-2 border-white {{ Request::is('permission', 'permission/*')? "border-green-600":"hover:border-green-600" }}">
                                <i class="fas fa-tasks pr-0 md:pr-3 {{ Request::is('permission', 'permission/*')? "text-green-600":"hover:text-green-600" }}"></i><span class="pb-1 md:pb-0 text-xs md:text-base text-gray-500 block md:inline-block">Permission</span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>

        </div>

        <div class="main-content flex-1 bg-green-50 mt-11 md:mt-2 pb-24 md:pb-5">
            @yield('content')
        </div>
    </div>

    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>
    @yield('script')
</body>
</html>

