@extends('layouts.app')

@section('title', "Detail Pendaftaran | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('pendaftaran') }}"><i class="fas fa-users mr-2"></i>Pendaftaran</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10">
        <div class="card pt-3">
            <div class="card-body">
                <div id="nama">
                    <h5>Nama</h5>
                    <p>{{$detail->nama_pasien}}</p>
                </div>
                <div id="nik">
                    <h5>Nik</h5>
                    <p>{{$detail->nik}}</p>
                </div>
                <div id="tgl_lahir">
                    <h5>Tanggal lahir</h5>
                    <p>{{date("d-m-Y", strtotime($detail->tgl_lahir))}}</p>
                </div>
                <div id="jenis_kelamin">
                    <h5>Jenis Kelamin</h5>
                    <p>
                        @if($detail->jenis_kelamin === 'L')
                            Laki-laki
                        @elseif($detail->jenis_kelamin === 'P')
                            Perempuan
                        @endif
                    </p>
                </div>
                <div id="no_hp">
                    <h5>No. Hp</h5>
                    <p>{{$detail->no_hp}}</p>
                </div>
                <div id="email">
                    <h5>Email</h5>
                    <p>{{ ($detail->email !== NULL) ? $detail->email : '-' }}</p>
                </div>
                <div id="alamat">
                    <h5>Alamat</h5>
                    <p>{{$detail->alamat}}</p>
                </div>
                <div id="riwayat">
                    <h5>Riwayat Penyakit</h5>
                    <p>{{ ($detail->riwayat_penyakit !== NULL) ? $detail->riwayat_penyakit : '-'}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-2 mb-auto">
        <button class="btn btn-success">Setuju</button>
        <button class="btn btn-danger">Tolak</button>
    </div>
</div>
@endsection
