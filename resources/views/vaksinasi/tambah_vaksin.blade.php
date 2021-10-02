@extends('layouts.app')

@section('title', "Tambah Data Vaksin | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksin') }}"><i class="fas fa-briefcase-medical mr-2"></i>Vaksin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-9 col-sm-8">
        <form action="">
            <div class="card">
                <div class="card-body">
                    <div class="nama">
                        <label>Kode Vaksin</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="nama" aria-label="default input example">
                    </div>
                    <div class="nik">
                        <label>Supplier</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="nik" aria-label="default input example">
                    </div>
                    <div class="no_hp">
                        <label>Nama Vaksin</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="no_hp" aria-label="default input example">
                    </div>
                    <div class="email">
                        <label>Jumlah</label>
                        <input class="form-control form-control-sm mb-3" type="number" name="email" aria-label="default input example">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-3 col-sm-4 mb-auto">
        <button class="btn btn-primary">Tambah</button>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            'bFilter': false,
            'lengthChange': false
        });
    });
</script>
@endsection