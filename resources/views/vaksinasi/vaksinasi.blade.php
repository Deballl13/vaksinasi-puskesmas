@extends('layouts.app')

@section('title', "Vaksinasi | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-syringe mr-2"></i>Vaksinasi</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('vaksinasi.tambah') }}" class="btn btn-success px-3">Tambah</a>
            <a href="{{ route('vaksinasi.print') }}" class="btn btn-warning px-3" target="_blank">Print</a>
        </div>
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nik</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vaksinasi as $v)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$v->nik}}</td>
                    <td>{{$v->nama_pasien}}</td>
                    <td>
                        @if($v->jenis_kelamin === 'L')
                        Laki-laki
                        @elseif($v->jenis_kelamin === 'P')
                        Perempuan
                        @endif
                    </td>
                    <td>{{$v->email}}</td>
                    <td class="text-center">
                        <form action="{{ route('vaksinasi.delete.pasien') }}" method="post" onsubmit="return confirm('Yakin mau dihapus?')">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('vaksinasi.detail', ['nik' => $v->nik]) }}" class="btn btn-primary">Detail</a>
                            <input type="text" name="nik" id="nik" value="{{ $v->nik }}" class="visually-hidden">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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