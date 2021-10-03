@extends('layouts.app')

@section('title', "Edit Data Vaksinasi | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi') }}"><i class="fas fa-syringe mr-2"></i>Vaksinasi</a></li>
        <li class="breadcrumb-item"><a href="{{ route('vaksinasi.detail') }}">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10 mb-5">
        <form action="">
            <div class="card">
                <div class="card-body">
                    <div class="nama">
                        <label>Nama</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="nama" aria-label="default input example" value="Immalatunil Khaira A.">
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
                            <input class="form-check-input" type="radio" name="jenis_kelamin" value="Perempuan" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="nik">
                        <label>NIK</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="nik" aria-label="default input example" value="12345667891234567">
                    </div>
                    <div class="no_hp">
                        <label>No. Hp</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="no_hp" aria-label="default input example" value="081234456789">
                    </div>
                    <div class="email">
                        <label>Email</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="email" aria-label="default input example" value="imma@gmail.com">
                    </div>
                    <div class="riwayat">
                        <label>Riwayat Penyakit</label>
                        <div class="mb-3">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat repudiandae id voluptatibus eius, dolores atque consequatur error ullam soluta. Totam est non rem at corrupti sit saepe sed voluptatum reprehenderit!</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 col-sm-4 mb-auto">
        <button class="btn btn-primary">Simpan</button>
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