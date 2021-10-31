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
<form action="{{ route('vaksin.store.jenis') }}" method="POST" id="form_tambah_jenis">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div>
                        <label>Nama Vaksin</label>
                        <input class="form-control" type="text" name="nama_vaksin" aria-label="default input example">
                        <p class="invalid-feedback" style="font-size: 14px;">Masukkan nama vaksin!</p>
                    </div>
                    <button type="button" id="btnSubmit" class="btn btn-primary float-end mr-4 mt-3">Tambah</button>
                </div>
            </div>
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

<script>
    const form = document.getElementById("form_tambah_jenis")
    const btnSubmit = document.getElementById("btnSubmit");
    const invalid_feedback = document.getElementsByClassName("invalid-feedback")[0];
    
    btnSubmit.onclick = ()=>{
        if(form[1].value.trim() === ""){
            form[1].classList.add("border-danger");
            invalid_feedback.style.display = "block";
        }
        else{
            form[1].classList.remove("border-danger");
            invalid_feedback.style.display = "none";
            form.submit();
        }
    }
</script>
@endsection