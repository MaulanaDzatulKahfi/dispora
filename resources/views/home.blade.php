@extends('layouts.template')

@section('content')
    <div class="bg-green-600 p-4 shadow text-xl text-white">
        <h3 class="font-bold pl-2">Dashboard</h3>
    </div>
    @foreach($role as $r)
        @if($r === 'Admin')
            <div class="flex flex-wrap">

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                                <h3 class="font-bold text-3xl">{{ count($user) }} <span class="text-green-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                    <!--Metric Card-->
                    <div class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                        <div class="flex flex-row items-center">
                            <div class="flex-shrink pr-4">
                                <div class="rounded-full p-5 bg-green-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                            </div>
                            <div class="flex-1 text-right md:text-center">
                                <h5 class="font-bold uppercase text-gray-600">Total Users</h5>
                                <h3 class="font-bold text-3xl">{{ count($user) }} <span class="text-green-500"><i class="fas fa-exchange-alt"></i></span></h3>
                            </div>
                        </div>
                    </div>
                    <!--/Metric Card-->
                </div>

                <div class="w-full xl:w-1/3 p-6">
                    <!--Graph Card-->
                    <div class="bg-white border-transparent rounded-lg shadow-xl">
                        <div class="bg-gradient-to-b from-gray-300 to-gray-100 uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                            <h5 class="font-bold uppercase text-gray-600">Graph</h5>
                        </div>
                        <div class="p-5">
                            <canvas id="chart" class="chart" width="undefined" height="undefined"></canvas>
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

            </div>
        @endif

        @if($r === 'Peserta')
            <div class="flex flex-col-reverse sm:flex-row justify-between items-center p-6">
                <div class="sm:w-2/5 flex flex-col items-center sm:items-start text-center sm:text-left">
                    <h1 class="uppercase text-6xl text-green-600 font-bold leading-none tracking-wide mb-2">Beasiswa</h1>
                    <h2 class="uppercase text-4xl text-yellow-400 text-secondary tracking-widest mb-6">Pancakarsa</h2>
                    <p class="text-gray-600 leading-relaxed mb-12">Program beasiswa pendidikan pada jenjang S1 untuk Perguruan Tinggi Negeri/Swasta yang telah menjalin kerjasama dengan Pemerintah Daerah Kabupaten Bogor.</p>
                    <h3 class="py-2">Pilih Jalur :</h3>
                    <div class="flex">
                        <div class="bg-green-600 hover:bg-green-700 py-3 px-2 text-lg font-bold text-white w-40 sm:w-56 flex rounded-2xl mr-3 leading-none">
                            <svg class="w-40 m-3" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><circle cx="256" cy="85" r="85"></circle><path d="m318.459 181.515c-17.997 11.687-39.448 18.485-62.459 18.485s-44.462-6.798-62.459-18.485c-19.895 7.603-38.341 18.82-54.38 33.216l116.839 43.815 116.839-43.815c-16.039-14.396-34.485-25.614-54.38-33.216z"></path><path d="m436 310h-10c-8.284 0-15 6.716-15 15v40c0 8.284 6.716 15 15 15h10c19.33 0 35-15.67 35-35 0-19.33-15.67-35-35-35z"></path><path d="m87.456 234.276c-4.044 2.803-6.456 7.409-6.456 12.329v33.395h5c24.813 0 45 20.187 45 45v40c0 24.813-20.187 45-45 45h-5v31.605c0 6.253 3.879 11.85 9.733 14.045l150.267 56.35v-227.04l-139.733-52.4c-4.607-1.729-9.768-1.088-13.811 1.716z"></path><path d="m381 365v-40c0-24.813 20.187-45 45-45h5v-33.395c0-4.92-2.412-9.526-6.456-12.329-4.044-2.804-9.206-3.445-13.811-1.716l-139.733 52.4v227.04l150.267-56.35c5.854-2.195 9.733-7.792 9.733-14.045v-31.605h-5c-24.813 0-45-20.187-45-45z"></path><path d="m101 365v-40c0-8.284-6.716-15-15-15h-10c-19.33 0-35 15.67-35 35 0 19.33 15.67 35 35 35h10c8.284 0 15-6.716 15-15z"></path></g></svg>
                            <a href="#" class="my-auto">Jalur Prestasi Akademik</a>
                        </div>
                        <div class="bg-yellow-400 hover:bg-yellow-600 py-3 px-2 text-lg font-bold text-white w-40 sm:w-56 flex rounded-2xl leading-none">
                            <svg class="w-40 m-3" enable-background="new 0 0 512 512"viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g><path d="m376 482h-15v-32h-210v32h-15c-8.291 0-15 6.709-15 15s6.709 15 15 15h240c8.291 0 15-6.709 15-15s-6.709-15-15-15z"></path><path d="m258.124 120.308-2.124-4.248-2.036 4.072c-3.696 7.61-11.179 8.206-11.279 8.306l-4.717.703 3.237 3.193c3.552 3.383 5.302 8.485 4.395 13.477l-.747 4.526 4.233-2.197c4.249-2.211 9.443-2.281 13.828 0l4.233 2.197-.776-4.702c-.806-4.819.791-9.727 4.263-13.14l3.398-3.354-4.717-.703c-4.834-.733-9.008-3.765-11.191-8.13z"></path><path d="m497 30h-76.319c.125-4.988.319-9.924.319-15 0-8.291-6.709-15-15-15h-300c-8.291 0-15 6.709-15 15 0 5.076.194 10.014.319 15h-76.319c-8.291 0-15 6.709-15 15v37.998c0 83.741 67.07 151.765 149.735 156.165 17.239 23.712 37.767 41.316 61.002 51.315-3.408 68.445-39.723 115.851-51.471 129.521h193.444c-11.744-13.575-48.052-60.699-51.46-129.521 23.242-9.996 43.779-27.599 61.02-51.315 82.66-4.402 149.73-72.425 149.73-156.165v-37.998c0-8.291-6.709-15-15-15zm-467 52.998v-22.998h62.813c4.475 57.149 17.477 107.252 37.35 146.708-56.646-12.755-100.163-63.265-100.163-123.71zm286.469 46.45-19.233 18.94 4.424 26.631c.938 5.61-1.377 11.265-5.977 14.59-4.614 3.351-10.679 3.798-15.732 1.187l-23.951-12.437-23.95 12.437c-5.068 2.578-11.133 2.153-15.732-1.187-4.6-3.325-6.914-8.979-5.977-14.59l4.424-26.631-19.233-18.94c-4.127-4.065-5.454-10.064-3.735-15.322 1.758-5.391 6.416-9.346 12.041-10.195l26.689-4.014 12.056-24.126c5.068-10.166 21.768-10.166 26.836 0l12.056 24.126 26.689 4.014c5.625.85 10.283 4.805 12.041 10.195 1.757 5.405.307 11.338-3.736 15.322zm165.531-46.45c0 60.443-43.517 110.953-100.161 123.708 19.871-39.456 32.875-89.555 37.348-146.706h62.813z"></path></g></svg>
                            <a href="#" class="my-auto">Jalur Prestasi Non Akademik</a>
                        </div >
                    </div>
                </div>
                <div class="mb-16 sm:mb-0 sm:mt-0 sm:w-3/5 sm:pl-12">
                    <svg class="w-full h-64 sm:h-auto" height="490" viewBox="0 0 64 64" width="628.5" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m13 36h38v26h-38z" fill="#F59E0B"></path><path d="m15 36h36v24h-36z" fill="#FBBF24"></path><path d="m32 62-15-3v-27l10.169 2.712a6.507 6.507 0 0 1 4.831 6.288 6.507 6.507 0 0 1 4.831-6.288l10.169-2.712v27z" fill="#b4b5b9"></path><path d="m47 32v27l-15 3v-21a6.507 6.507 0 0 1 4.83-6.29z" fill="#dcdddf"></path><path d="m31 53h2v9h-2z" fill="#F59E0B"></path><path d="m38 22v23l-6 11-6-11v-23" fill="#fcc533"></path><path d="m30 24h4v21h-4z" fill="#5a5b5d"></path><path d="m43 11v13l-1.257.419a30.811 30.811 0 0 1 -9.743 1.581 30.811 30.811 0 0 1 -9.743-1.581l-1.257-.419v-13" fill="#047857"></path><path d="m53 9-21 7-21-7 21-7z" fill="#059669"></path><path d="m15.5 7.5 19.5 6.5 16.5-5.5-19.5-6.5z" fill="#059669"></path><path d="m21 14.333v9.667l1.257.419a30.811 30.811 0 0 0 9.743 1.581 30.811 30.811 0 0 0 9.743-1.581l1.257-.419v-9.667l-11 3.667z" fill="#059669"></path><path d="m32 56 6-11h-12z" fill="#fee2d6"></path><path d="m32 56 1.636-3h-3.272z" fill="#5a5b5d"></path></svg>
                </div>
            </div>
        @endif

    @endforeach
@endsection

@section('script')
    <script>
        var ctx = document.getElementById('chart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                "01-01-2021", "02-01-2021", "03-01-2021", "04-01-2021", "05-01-2021", "06-01-2021", "07-01-2021",
                "08-01-2021", "09-01-2021", "10-01-2021", "11-01-2021", "12-01-2021", "13-01-2021", "14-01-2021",
                "15-01-2021", "16-01-2021", "17-01-2021", "18-01-2021", "19-01-2021", "20-01-2021", "21-01-2021",
                "22-01-2021", "23-01-2021", "24-01-2021", "25-01-2021", "26-01-2021", "27-01-2021", "28-01-2021",
                "29-01-2021", "30-01-2021", "31-01-2021"
                ],
            datasets: [{
                data: [86,114,106,106,107,111,133],
                label: "Total",
                borderColor: "#3e95cd",
                backgroundColor: "#7bb6dd",
                fill: false,
            }, {
                data: [70,90,44,60,83,90,100],
                label: "Accepted",
                borderColor: "#3cba9f",
                backgroundColor: "#71d1bd",
                fill: false,
            }, {
                data: [10,21,60,44,17,21,17],
                label: "Pending",
                borderColor: "#ffa500",
                backgroundColor:"#ffc04d",
                fill: false,
            }, {
                data: [6,3,2,2,7,0,16],
                label: "Rejected",
                borderColor: "#c45850",
                backgroundColor:"#d78f89",
                fill: false,
            }
            ]
        },
        });
    </script>
@endsection
