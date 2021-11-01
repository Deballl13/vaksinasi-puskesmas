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

<body>
    <div class="container">
        <br>
        <div class="row border-bottom border-2 border-secondary pb-3">
            <div class="col-md-10 mt-3">
                <h2>PUSKESMAS X KOTO II</h2>
                <h5>Paninjauan, Sepuluh Koto, Kab. Tanah Datar, Sumatera Barat 27114</h5>
            </div>
            <div class="col-md-2">
                <div class="row justify-content-center">
                    <img src="{{ asset('img/logo.png') }}" alt="logo puskesmas" style="width:60%">
                </div>
            </div>
        </div>
        <br>
        <h5 class="text-center mb-3"><strong>Laporan Vaksinasi</strong></h5>
        <table id="example" class="table" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nik</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Nama Vaksin</th>
                    <th>Vaksin ke-</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vaksinasi as $v)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$v->nik}}</td>
                    <td>{{$v->nama_pasien}}</td>
                    <td>
                        @if($v->jenis_kelamin === 'L')
                        Laki-laki
                        @elseif($v->jenis_kelamin === 'P')
                        Perempuan
                        @endif
                    </td>
                    <td>{{$v->email}}</td>
                    <td>{{$v->nama_vaksin}}</td>
                    <td>{{$v->vaksin_ke}}</td>
                    <td>{{date("d-m-Y", strtotime($v->tgl_vaksin))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>