@extends('layouts.app')

@section('title', "Detail Vaksinasi | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi') }}"><i class="fas fa-syringe mr-2"></i>Vaksinasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10 mb-5">
        <div class="card pt-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="nama">
                            <h5>Nama</h5>
                            <p>{{$pasien->nama_pasien}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="nik">
                            <h5>Nik</h5>
                            <p>{{$pasien->nik}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="tgl_lahir">
                            <h5>Tanggal lahir</h5>
                            <p>{{date("d-m-Y", strtotime($pasien->tgl_lahir))}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="jenis_kelamin">
                            <h5>Jenis Kelamin</h5>
                            <p>
                                @if($pasien->jenis_kelamin === 'L')
                                    Laki-laki
                                @elseif($pasien->jenis_kelamin === 'P')
                                    Perempuan
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="no_hp">
                            <h5>No. Hp</h5>
                            <p>{{$pasien->no_hp}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="email">
                            <h5>Email</h5>
                            <p>{{ ($pasien->email !== NULL) ? $pasien->email : '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="alamat">
                            <h5>Alamat</h5>
                            <p>{{$pasien->alamat}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="riwayat">
                            <h5>Riwayat Penyakit</h5>
                            <p>{{ ($pasien->riwayat_penyakit !== NULL) ? $pasien->riwayat_penyakit : '-'}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($vaksinasi as $v)
                    <div class="col-md-6 col-sm-12 mb-3">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$loop->iteration}}" aria-expanded="false" aria-controls="flush-collapse{{$loop->iteration}}">
                                        Vaksinasi {{$v->vaksin_ke}}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$loop->iteration}}" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <p>Jenis Vaksin <span class="ms-4">: {{$v->nama_vaksin}}</span></p>
                                        <p>Tanggal Vaksin : {{ date("d-m-Y", strtotime($v->tgl_vaksin)) }}</p>
                                        <p>Status <span class="ms-5 ps-2">: {{($v->status === 2) ? 'Selesai' : 'Belum Selesai'}}</span></p>
                                        <form action="{{ route('vaksinasi.delete.vaksinasi') }}" method="post" onsubmit="return confirm('Yakin mau dihapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <input type="text" name="id" id="id" value="{{ $v->id }}" class="visually-hidden">
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-2 mb-auto">
        <a href="{{ route('vaksinasi.edit', ['nik' => $pasien->nik]) }}">
            <button class="btn btn-warning">Edit</button>
        </a>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection