<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

    <title>@yield('title')</title>

    <!-- tab icon -->
    <link rel="shortcut icon" href="{{ asset('logoPuskesmas.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="{{ asset('icon/css/all.css') }}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- data tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- my style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body style="background-color: #F0F8FF;">
    <div id="app">

        <!-- navbar-side -->
        <nav class="navbar-side bg-dark" id="navbar-side">
            <div class="text-center mt-3">
                <a href="{{ route('home') }}"><img src="{{ asset('img/navbar-brand.png') }}" alt="logo puskesmas" class="logo"></a>
            </div>
            <div class="menu-list mt-3 pt-3">
                <div class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link nav-link {{ request()->is('home') ? 'text-primary' : '' }}"><i class="fas fa-home icon"></i>Dashboard</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('pendaftaran') }}" class="menu-link nav-link {{ request()->is('pendaftaran') || request()->is('pendaftaran/d/*') ? 'text-primary' : '' }}"><i class="fas fa-users icon"></i>Pendaftaran</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('vaksinasi') }}" class="menu-link nav-link {{ request()->is('vaksinasi') ? 'text-primary' : '' }} {{ request()->is('vaksinasi/t') ? 'text-primary' : '' }} {{ request()->is('vaksinasi/d/*') ? 'text-primary' : '' }} {{ request()->is('vaksinasi/e/*') ? 'text-primary' : '' }}"><i class="fas fa-syringe icon"></i>Data Vaksinasi</a>
                </div>
                <div class="menu-item">
                    <a href="{{ route('vaksin') }}" class="menu-link nav-link {{ request()->is('vaksin') ? 'text-primary' : '' }} {{ request()->is('vaksin/t') ? 'text-primary' : '' }} {{ request()->is('vaksin/d') ? 'text-primary' : '' }}"><i class="fas fa-briefcase-medical icon"></i>Vaksin</a>
                </div>
            </div>
            <div class="logout mt-3 text-center">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary px-5">Logout</button>
                </form>
            </div>
        </nav>

        <!-- navbar-top -->
        <nav class="navbar navbar-top fixed-top navbar-light bg-white py-3" id="navbar-top">
            <div class="container-fluid px-4">

                <!-- burger icon toggle -->
                <div class="position-relative">
                    <input type="checkbox" name="sidebar-toggle" id="sidebar-toggle" class="position-absolute start-0">
                    <span><i class="fas fa-bars burger-icon"></i></span>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <span>Hello, i'm {{ Auth::user()->name }}</span>
                </ul>
            </div>
        </nav>

        <main class="content mb-5" id="content">
            <div class="container-fluid">
                @yield('bread_crumb')
                @yield('content')
            </div>
        </main>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- data tables -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js" defer></script>

    <!-- icon -->
    <script src="{{ asset('icon/js/all.js') }}"></script>


    @yield('script')

    <!-- my script -->
    <script src="{{ asset('js/navbar.js') }}"></script>

</body>
</html>
