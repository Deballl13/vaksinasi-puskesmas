@extends('layouts.app')

@section('title', "Vaksin | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-briefcase-medical mr-2"></i>Vaksin</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-10">
        <div class="card">
            <div class="card-body">
                <div class="mb-3">
                    <a href="{{ route('vaksin.detail') }}" class="btn btn-primary px-3">Detail</a>
                    <a href="{{ route('vaksin.tambah') }}" class="btn btn-success px-3">Tambah Jenis Vaksin</a>
                </div>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Nama Vaksin</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vaksin as $v)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$v->nama_vaksin}}</td>
                            <td>{{$v->stok}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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