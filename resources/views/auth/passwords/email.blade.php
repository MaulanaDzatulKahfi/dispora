<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lupa Password</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased font-sans bg-gray-100">
    {{-- <div class="container max-w-3xl m-auto flex flex-wrap md:flex-row text-gray-600 my-24">
        <div class="w-1/2 bg-gray-100">
            <div class="text-center py-8">
                <h1 class="font-bold text-xl">Selamat Datang</h1>
                <p>Di Dispora Pancakarsa</p>
            </div>
            <div class="text-center my-16">
                @if (session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-white mb-6" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div>
                        <input type="email" class="w-80 h-12 px-3 py-2 border-2 placeholder-gray-300 border border-gray-300 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 rounded" placeholder="Email Address" name="email" value="{{ old('email') }}" autocomplete="email" required autofocus>
                        @error('email')
                            <span class="text-sm text-red-500 block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <input type="submit" value="Reset Password" class="w-80 h-12 bg-green-500 text-white mt-3 focus:outline-none rounded">
                    </div>
                </form>
            </div>
        </div>
        <div class="w-1/2">
            <img src="../img/beranda1.jpeg" alt="">
        </div>
    </div> --}}

		<!-- Container -->
		<div class="container mx-auto">
			<div class="flex justify-center px-6 my-12">
				<!-- Row -->
				<div class="w-full xl:w-3/4 lg:w-11/12 flex">
					<!-- Col -->
					<div
						class="w-full h-auto bg-gray-400 hidden lg:block lg:w-1/2 bg-cover rounded-l-lg"
						style="background-image: url('../img/beranda1.jpeg')"
					></div>
					<!-- Col -->
					<div class="w-full lg:w-1/2 bg-white p-5 rounded-lg lg:rounded-l-none">
						<div class="px-8 mb-4 text-center">
							<h3 class="pt-4 mb-2 text-2xl">Lupa Password?</h3>
							<p class="mb-4 text-sm text-gray-700">
								Cukup masukkan alamat email Anda di bawah ini dan kami akan mengirimkan link untuk mengatur ulang kata sandi Anda!
							</p>
						</div>
                        @if (session('status'))
                            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-white mb-6" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
						<form method="POST" action="{{ route('password.email') }}" class="px-8 pt-6 pb-8 mb-4 bg-white rounded">
                            @csrf
							<div class="mb-4">
								<label class="block mb-2 text-sm font-bold text-gray-700" for="email">
									Email
								</label>
								<input
									class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
									name="email"
									type="email"
									placeholder="Enter Email Address..."
                                    value="{{ old('email') }}"
								/>
                                @error('email')
                                    <p class="text-xs italic text-red-500">{{ $message }}</p>
                                @enderror
							</div>
							<div class="mb-6 text-center">
								<button
									class="w-full px-4 py-2 font-bold text-white bg-green-500 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline"
									type="submit"
                                    required
                                    autofocus
								>
									Reset Password
								</button>
							</div>
							<hr class="mb-6 border-t" />
							<div class="text-center">
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="{{ url('/register') }}"
								>
									Buat Akun!
								</a>
							</div>
							<div class="text-center">
                                Sudah Punya Akun?
								<a
									class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
									href="{{ url('/login') }}"
								>
									Login!
								</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</body>
</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
