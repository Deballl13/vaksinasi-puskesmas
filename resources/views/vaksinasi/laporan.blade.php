@extends('layouts.app')

@section('title', "Laporan | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-clipboard-list mr-2"></i>Laporan</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-5">
        <div class="card">
            <div class="card-body position-relative">
                <span class="me-auto">25 September 2021</span>
                <a href="#" class="btn btn-success position-absolute top-50 start-100 translate-middle mr-5 ml-n5">Print</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-5">
        <div class="card">
            <div class="card-body position-relative">
                <span class="me-auto">30 September 2021</span>
                <a href="#" class="btn btn-success position-absolute top-50 start-100 translate-middle mr-5 ml-n5">Print</a>
            </div>
        </div>
    </div>
</div>
@endsection
