<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksinasi;
use Illuminate\Support\Str;


class VaksinasiController extends Controller
{
    public function index()
    {
        $vaksinasi = Vaksinasi::join("pasien", "pasien.nik", "=", "vaksinasi.nik")
            ->where('vaksinasi.status', 3)
            ->get();
        return view("vaksinasi.vaksinasi", compact('vaksinasi'));
    }

    public function detail($nik)
    {
        $pasien = new Pasien();
        $pasien->nik = $nik;

        $detail = Pasien::find($pasien->nik);
        return view("vaksinasi.detail_vaksinasi", compact('detail'));
    }

    public function edit()
    {
        return view("vaksinasi.edit_vaksinasi");
    }

    public function tambah()
    {
        return view("vaksinasi.tambah_vaksinasi");
    }

    public function vaksin()
    {
        return view("vaksinasi.vaksin");
    }

    public function detail_vaksin()
    {
        return view("vaksinasi.detail_vaksin");
    }

    public function tambah_vaksin()
    {
        return view("vaksinasi.tambah_vaksin");
    }
}
