<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
    <div class="max-w-xl mx-auto my-32 sm:px-6 lg:px-8 ">
        <div class="overflow-hidden shadow-md">
            <!-- card header -->
            <div class="px-6 py-4 bg-green-400 text-white border-b border-gray-200 font-bold uppercase">
                Verifikasi Email Anda
            </div>

            <!-- card body -->
            <div class="p-6 bg-white border-b border-gray-200">
                @if (session('resent'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-white" role="alert">
                        {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                    </div>
                @endif
                Sebelum melanjutkan, periksa email Anda untuk tautan verifikasi. <br>
                Jika Anda tidak menerima email,<br>
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-blue-600 hover:text-blue-400">{{ __('klik di sini untuk meminta yang lain') }}</button>.
                </form>
            </div>
        </div>
    </div>

</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
