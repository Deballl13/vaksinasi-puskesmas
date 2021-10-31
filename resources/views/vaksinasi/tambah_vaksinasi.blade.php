@extends('layouts.app')

@section('title', "Tambah Data Vaksinasi | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi') }}"><i class="fas fa-syringe mr-2"></i>Vaksinasi</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<form class="ms-2" action="{{ route('pendaftaran.store.daftar') }}" method="POST" id="daftar" onsubmit="return validateDaftar()">
@csrf
    <div class="row">
        <div class="col-md-8 col-sm-10 mb-5">
            <div class="card">
                <div class="card-body">
                    <div class="nama mt-3 mb-4">
                        <label for="nama_pasien">Nama<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="nama_pasien" type="text" name="nama_pasien" aria-label="default input example">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan nama!</p>
                    </div>
                    <div class="tgl_lahir mb-4">
                        <label for="tgl_lahir" class="form-label">Tanggal lahir<sup class="text-danger">*</sup></label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan tanggal lahir!</p>
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
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan jenis kelamin!</p>
                    </div>
                    <div class="nik mb-4">
                        <label for="nik">NIK<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="nik" type="text" maxlength="16" name="nik" aria-label="default input example" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan nik!</p>
                    </div>
                    <div class="no_hp mb-4">
                        <label for="no_hp">No. Hp<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="no_hp" type="text" name="no_hp" aria-label="default input example" maxlength="12" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan nomor hp!</p>
                    </div>
                    <div class="email mb-4">
                        <label for="email">Email<sup class="text-danger">*</sup></label>
                        <input class="form-control" id="email" type="text" name="email" aria-label="default input example">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan email!</p>
                    </div>
                    <div class="alamat">
                        <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                        <textarea name="alamat" class="form-control mb-3" id="alamat" rows="4" style="resize: none;"></textarea>
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan alamat!</p>
                    </div>
                    <div class="vaksin_ke mb-4">
                        <label for="vaksin_ke">Vaksin ke<sup class="text-danger">*</sup></label>
                        <select name="vaksin_ke" class="form-select form-control" aria-label="Default select example" id="vaksin_ke">
                            <option value="">--Vaksin Ke--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan vaksin ke!</p>
                    </div>
                    <div class="tgl_vaksin mb-4">
                        <label for="tgl_vaksin" class="form-label">Tanggal vaksinasi<sup class="text-danger">*</sup></label>
                        <input type="date" name="tgl_vaksin" id="tgl_vaksin" class="form-control">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan tanggal vaksin!</p>
                    </div>
                    <div class="riwayat mb-4">
                        <label for="riwayat_penyakit">Riwayat penyakit</label>
                        <div>
                            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" id="exampleFormControlTextarea1" rows="4" style="resize: none;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 mb-auto">
            <button type="submit" id="submit" class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script src="{{ asset('js/validateInputForm.js') }}"></script>
@endsection