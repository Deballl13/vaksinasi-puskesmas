@extends('layouts.app')

@section('title', "Dashboard | Puskesmas X Koto II")

@section('bread_crumb')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb mb-5">
        <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-home mr-2"></i>Home</li>
    </ol>
</nav>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-3">
        <div class="card text-center" style="background-color: #C8FF90;">
            <div class="card-header">
                <h5>{{ __('Pendaftaran') }}</h5>
            </div>

            <div class="card-body">
                <h5>{{$pasien}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="background-color: #D85AED;">
            <div class="card-header">
                <h5>{{ __('Stok Vaksin') }}</h5>
            </div>

            <div class="card-body">
                <h5>{{$stok}}</h5>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-center" style="background-color: #FFE4E1;">
            <div class="card-header">
                <h5>{{ __('Pasien Vaksinasi') }}</h5>
            </div>

            <div class="card-body">
                <h5>{{$pasien_vaksinasi}}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
