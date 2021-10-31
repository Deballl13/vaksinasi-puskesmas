<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Vaksinasi | Puskesmas X Koto II</title>

    <!-- tab icon -->
    <link rel="shortcut icon" href="{{ asset('logoPuskesmas.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: #F0F8FF;">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-sm-10 mb-5">
                <div class="card px-2">
                    <div class="card-body">
                        <div class="row border-bottom border-2 border-secondary pb-3">
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
                            <div class="col-sm-12 mb-3">
                                <form class="ms-2" action="{{ route('user.daftar') }}" method="POST">
                                    @csrf
                                    <h4 class="mt-5">Silahkan isi biodata</h4>
                                    <div class="nama mt-3 mb-4">
                                        <label for="nama_pasien">Nama<sup class="text-danger">*</sup></label>
                                        <input class="form-control" id="nama_pasien" type="text" name="nama_pasien" aria-label="default input example">
                                    </div>
                                    <div class="tgl_lahir mb-4">
                                        <label for="tgl_lahir" class="form-label">Tanggal lahir<sup class="text-danger">*</sup></label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                                    </div>
                                    <div class="jenis_kelamin mb-4">
                                        <label>Jenis Kelamin<sup class="text-danger">*</sup></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="flexRadioDefault2">
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="nik mb-4">
                                        <label for="nik">NIK<sup class="text-danger">*</sup></label>
                                        <input class="form-control" id="nik" type="text" name="nik" maxlength="16" aria-label="default input example">
                                    </div>
                                    <div class="no_hp mb-4">
                                        <label for="no_hp">No. Hp<sup class="text-danger">*</sup></label>
                                        <input class="form-control" id="no_hp" type="text" name="no_hp" aria-label="default input example">
                                    </div>
                                    <div class="email mb-4">
                                        <label for="email">Email<sup class="text-danger">*</sup></label>
                                        <input class="form-control" id="email" type="text" name="email" aria-label="default input example">
                                    </div>
                                    <div class="alamat">
                                        <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                                        <div class="mb-3">
                                            <textarea name="alamat" class="form-control" id="alamat" rows="4" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="vaksin_ke mb-4">
                                        <label for="vaksin_ke">Vaksin ke<sup class="text-danger">*</sup></label>
                                        <select name="vaksin_ke" class="form-select form-control" aria-label="Default select example" id="vaksin_ke">
                                            <option hidden>Vaksin ke</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="tgl_vaksin mb-4">
                                        <label for="tgl_vaksin" class="form-label">Tanggal vaksinasi<sup class="text-danger">*</sup></label>
                                        <input type="date" name="tgl_vaksin" id="tgl_vaksin" class="form-control">
                                    </div>
                                    <div class="riwayat mb-4">
                                        <label for="riwayat_penyakit">Riwayat penyakit</label>
                                        <div>
                                            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" id="exampleFormControlTextarea1" rows="4" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2">
                                            <button class="btn btn-primary px-3">Daftar</button>
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


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>