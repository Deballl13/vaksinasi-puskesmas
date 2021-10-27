@extends('layouts.app')

@section('title', "Detail Vaksin | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item"><a href="{{ route('vaksin') }}"><i class="fas fa-briefcase-medical mr-2"></i>Vaksin</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-10 col-sm-8">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('vaksin.tambahd') }}" class="btn btn-success px-3">Tambah Stok</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Kode Vaksin</th>
                            <th>Supplier</th>
                            <th>Nama Vaksin</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_vaksin as $dv)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dv->id_vaksin}}</td>
                            <td>{{$dv->sumber_vaksin}}</td>
                            <td>{{$dv->nama_vaksin}}</td>
                            <td>{{$dv->jumlah}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-2 col-sm-4 mb-auto">
        <a href="{{ route('vaksin') }}">
            <button class="btn btn-primary">Kembali</button>
        </a>
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