<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Vaksinasi | Puskesmas X Koto II</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: #F0F8FF;">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 mb-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 mt-3">
                                <h2>Selamat Datang JK</h2>
                            </div>
                            <div class="col-md-2">
                                <div class="row justify-content-center">
                                    <img src="{{ asset('img/logo.png') }}" alt="logo puskesmas" width="80px">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mb-5">
                                <form class="ms-2" action="">
                                    <h4>Silahkan isi biodata</h4>
                                    <div class="nama mt-3">
                                        <label>Nama</label>
                                        <input class="form-control form-control-sm mb-3" type="text" name="nama" aria-label="default input example">
                                    </div>
                                    <div class="jenis_kelamin mb-3">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="nik">
                                        <label>NIK</label>
                                        <input class="form-control form-control-sm mb-3" type="text" name="nik" aria-label="default input example">
                                    </div>
                                    <div class="no_hp">
                                        <label>No. Hp</label>
                                        <input class="form-control form-control-sm mb-3" type="text" name="no_hp" aria-label="default input example">
                                    </div>
                                    <div class="email">
                                        <label>Email</label>
                                        <input class="form-control form-control-sm mb-3" type="text" name="email" aria-label="default input example">
                                    </div>
                                    <div class="riwayat">
                                        <label>Riwayat Penyakit</label>
                                        <div class="mb-3">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary mt-3">daftar</button>
                                        </div>
                                    </div>
                                </form>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>