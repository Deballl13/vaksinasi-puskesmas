@extends('layouts.app')

@section('title', "Tambah Data Vaksin | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksin') }}"><i class="fas fa-briefcase-medical mr-2"></i>Vaksin</a></li>
        <li class="breadcrumb-item"><a href="{{ route('vaksin.detail') }}">Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Stok</li>
    </ol>
</nav>
@endsection

@section('content')
<form action="{{ route('vaksin.store_stok') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8 col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="no_hp">
                        <label>Nama Vaksin</label>
                        <select class="form-select form-control-sm mb-3" aria-label="Default select example" name="id_vaksin">
                            <option selected>--Pilih Vaksin--</option>
                            @foreach($vaksin as $v)
                            <option value="{{$v->id}}">{{$v->nama_vaksin}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="nik">
                        <label>Supplier</label>
                        <input class="form-control form-control-sm mb-3" type="text" name="sumber_vaksin" aria-label="default input example">
                    </div>
                    <div class="email">
                        <label>Jumlah</label>
                        <input class="form-control form-control-sm mb-3" type="number" name="jumlah" aria-label="default input example">
                    </div>
                    <div class="tanggal">
                        <label>Tanggal</label>
                        <input class="form-control form-control-sm mb-3" type="date" name="tanggal" aria-label="default input example">
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