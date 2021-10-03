<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Puskesmas X Koto II</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #F0F8FF;">
    <div id="login" class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card py-5">
                    <div class="card-body py-5">
                        <div class="row justify-content-center">
                            <img src="{{ asset('img/logo.png') }}" alt="logo puskesmas">
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="mt-5">
                            @csrf

                            <div class="form-group row justify-content-center">
                                <div class="col-md-8 col-sm-8">
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required placeholder="Masukkan Username">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mt-3">
                                <div class="col-md-8 col-sm-8">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <button type="submit" class="btn btn-dark px-5 mt-2">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>