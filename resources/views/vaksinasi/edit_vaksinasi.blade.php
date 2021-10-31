@extends('layouts.app')

@section('title', "Edit Data Vaksinasi | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi') }}"><i class="fas fa-syringe mr-2"></i>Vaksinasi</a></li>
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi.detail', ['nik' => $detail->nik]) }}">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10 mb-5">
        <form action="{{ route('vaksinasi.update.pasien', ['nik' => $detail->nik]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="nama mt-3 mb-4">
                        <label for="nama_pasien">Nama<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="nama_pasien" type="text" name="nama_pasien" value="{{ $detail->nama_pasien }}" aria-label="default input example">
                    </div>
                    <div class="tgl_lahir mb-4">
                        <label for="tgl_lahir" class="form-label">Tanggal lahir<sup class="text-danger">*</sup></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $detail->tgl_lahir }}" class="form-control">
                    </div>
                    <div class="jenis_kelamin mb-4">
                        <label>Jenis Kelamin<sup class="text-danger">*</sup></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="flexRadioDefault1" 
                                @if($detail->jenis_kelamin === 'L') checked @endif>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="flexRadioDefault2"
                                @if($detail->jenis_kelamin === 'P') checked @endif>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="nik mb-4">
                        <label for="nik">NIK<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="nik" type="text" maxlength="16" name="nik" value="{{ $detail->nik }}" aria-label="default input example">
                    </div>
                    <div class="no_hp mb-4">
                        <label for="no_hp">No. Hp<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="no_hp" type="text" name="no_hp" value="{{ $detail->no_hp }}" aria-label="default input example">
                    </div>
                    <div class="email mb-4">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="text" name="email" value="{{ $detail->email }}" aria-label="default input example">
                    </div>
                    <div class="alamat">
                        <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                        <div class="mb-3">
                            <textarea name="alamat" class="form-control" id="alamat" rows="4" style="resize: none;">{{ $detail->alamat }}</textarea>
                        </div>
                    </div>
                     <div class="riwayat mb-4">
                        <label for="riwayat_penyakit">Riwayat penyakit<sup class="text-danger">*</sup></label>
                        <div>
                            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" id="exampleFormControlTextarea1" rows="4" style="resize: none;">{{ $detail->riwayat_penyakit }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-md-3 col-sm-4 mb-auto">
        <button class="btn btn-primary">Simpan</button>
    </div>
    </form>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection