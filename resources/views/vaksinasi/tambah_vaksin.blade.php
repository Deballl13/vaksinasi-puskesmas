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
<form action="{{ route('vaksin.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8 col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="nama">
                        <label>Kode Vaksin</label>
                        <input class="form-control mb-3" type="text" name="kode_vaksin" aria-label="default input example">
                    </div>
                    <div class="no_hp">
                        <label>Nama Vaksin</label>
                        <input class="form-control mb-3" type="text" name="nama_vaksin" aria-label="default input example">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 mb-auto">
            <button class="btn btn-primary">Tambah</button>
        </div>
    </div>
</form>
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