@extends('layouts.app')

@section('title', "Pendaftaran | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-users mr-2"></i>Pendaftaran</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="card pt-3">
    <div class="card-body">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr class="text-center">
                    <th>No.</th>
                    <th>Nik</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasien as $p)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$p->nik}}</td>
                    <td>{{$p->nama_pasien}}</td>
                    <td>
                        @if($p->jenis_kelamin === 'L')
                            Laki-laki
                        @elseif($p->jenis_kelamin === 'P')
                            Perempuan
                        @endif
                    </td>
                    <td>{{ ($p->email !== NULL) ? $p->email : '-' }}</td>
                    <td>
                        @if($p->status === 0)
                            Belum disetujui
                        @elseif($p->status === 1)
                            Disetujui
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('pendaftaran.detail', ['nik' => $p->nik] ) }}" class="btn btn-primary">Detail</a>
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
        $('#example').DataTable({
            'bFilter': false
        });
    } );
</script>
@endsection
