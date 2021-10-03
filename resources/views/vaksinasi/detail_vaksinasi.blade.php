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
                <div class="nama">
                    <h5>Nama</h5>
                    <p>Immalatunil Khaira A.</p>
                </div>
                <div class="jenis_kelamin">
                    <h5>Jenis Kelamin</h5>
                    <p>Perempuan</p>
                </div>
                <div class="nik">
                    <h5>NIK</h5>
                    <p>12345667891234567</p>
                </div>
                <div class="no_hp">
                    <h5>No. Hp</h5>
                    <p>081234456789</p>
                </div>
                <div class="email">
                    <h5>Email</h5>
                    <p>imma@gmail.com</p>
                </div>
                <div class="riwayat">
                    <h5>Riwayat Penyakit</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat repudiandae id voluptatibus eius, dolores atque consequatur error ullam soluta. Totam est non rem at corrupti sit saepe sed voluptatum reprehenderit!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-2 mb-auto">
        <a href="{{ route('vaksinasi.edit') }}">
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