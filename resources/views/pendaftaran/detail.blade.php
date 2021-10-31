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
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="nama">
                            <h5>Nama</h5>
                            <p>{{$detail->nama_pasien}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="nik">
                            <h5>Nik</h5>
                            <p>{{$detail->nik}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="tgl_lahir">
                            <h5>Tanggal lahir</h5>
                            <p>{{date("d-m-Y", strtotime($detail->tgl_lahir))}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="no_hp">
                            <h5>No. Hp</h5>
                            <p>{{$detail->no_hp}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="email">
                            <h5>Email</h5>
                            <p>{{ ($detail->email !== NULL) ? $detail->email : '-' }}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="alamat">
                            <h5>Alamat</h5>
                            <p>{{$detail->alamat}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="riwayat">
                            <h5>Riwayat Penyakit</h5>
                            <p>{{ ($detail->riwayat_penyakit !== NULL) ? $detail->riwayat_penyakit : '-'}}</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div id="tgl_vaksin">
                            <h5>Tanggal Vaksin</h5>
                            <p>{{ date("d-m-Y", strtotime($detail->tgl_vaksin)) }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div id="vaksin_ke">
                            <h5>Vaksin Ke</h5>
                            <p>{{ $detail->vaksin_ke }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-2 mb-auto">
        <form action="{{ route('vaksinasi.update.status', ['nik' => $detail->nik]) }}" method="post" id="form_status">
            @csrf
            @method('PUT')

            <input type="text" name="inputStatus" id="inputStatus" class="visually-hidden">
            @if($detail->status === 0)
            <button type="submit" id="btnSetuju" class="btn btn-success">Setuju</button>
            <button type="submit" id="btnTolak" class="btn btn-danger">Tolak</button>
            @elseif($detail->status === 1)
            <button type="button" id="btnSelesai" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Selesai</button>
            <button type="submit" id="btnBatal" class="btn btn-danger">Batal</button>
            @endif
    </div>
</div>


<!-- Modal -->
<<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jenis Vaksin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select mb-3" aria-label="Default select example" name="id_vaksin">
                    <option selected>--Pilih Vaksin--</option>
                    @foreach($vaksin as $v)
                    <option value="{{$v->id}}">{{$v->nama_vaksin}}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Selesai</button>
            </div>
        </div>
    </div>
</div>
</form>
@endsection

@section('script')
<script src="{{ asset('js/validateForm.js') }}"></script>
@endsection
