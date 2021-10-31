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
<form action="{{ route('vaksin.store.stok') }}" method="POST" id="tambahStok" onsubmit="return validateStok()">
    @csrf
    <div class="row">
        <div class="col-md-8 col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="no_hp mb-3">
                        <label>Nama Vaksin</label>
                        <select class="form-select" aria-label="Default select example" name="id_vaksin">
                            <option value="">--Pilih Vaksin--</option>
                            @foreach($vaksin as $v)
                            <option value="{{$v->id}}">{{$v->nama_vaksin}}</option>
                            @endforeach
                        </select>
                        <p class="invalid-feedback" style="font-size: 14px;">Pilih jenis vaksin!</p>
                    </div>
                    <div class="nik mb-3">
                        <label>Supplier</label>
                        <input class="form-control" type="text" name="sumber_vaksin" aria-label="default input example">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan nama supplier!</p>
                    </div>
                    <div class="email mb-3">
                        <label>Jumlah</label>
                        <input class="form-control" type="text" name="jumlah" aria-label="default input example" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan jumlah vaksin!</p>
                    </div>
                    <div class="tanggal mb-3">
                        <label>Tanggal</label>
                        <input class="form-control" type="date" name="tanggal" aria-label="default input example">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan tanggal!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-4 mb-auto">
            <button type="submit" class="btn btn-primary">Tambah</button>
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

<script src="{{ asset('js/validateInputForm.js') }}"></script>
@endsection