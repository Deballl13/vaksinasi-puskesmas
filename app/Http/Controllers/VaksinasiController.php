<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksinasi;
use Illuminate\Support\Str;


class VaksinasiController extends Controller
{
    public function index(){
        $vaksinasi = Vaksinasi::join("pasien", "pasien.nik", "=", "vaksinasi.nik")
            ->where('vaksinasi.status', 2)
            ->orderByDesc('vaksinasi.tgl_vaksin')
            ->get();
        return view("vaksinasi.vaksinasi", compact('vaksinasi'));
    }

    public function detail($nik){
        $pasien = new Pasien();
        $pasien->nik = $nik;

        $detail = Pasien::find($pasien->nik);
        return view("vaksinasi.detail_vaksinasi", compact('detail'));
    }

    public function edit($nik){
        $pasien = new Pasien();
        $pasien->nik = $nik;

        $detail = Pasien::find($pasien->nik);
        return view("vaksinasi.edit_vaksinasi", compact('detail'));
    }

    public function tambah(){
        return view("vaksinasi.tambah_vaksinasi");
    }

    public function vaksin(){
        return view("vaksinasi.vaksin");
    }

    public function detail_vaksin(){
        return view("vaksinasi.detail_vaksin");
    }

    public function tambah_vaksin(){
        return view("vaksinasi.tambah_vaksin");
    }

    public function update_pasien(Request $request){
        $pasien = Pasien::find($request->nik);

        $pasien->nik = trim($request->nik);
        $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->no_hp = trim($request->no_hp);
        $pasien->email = htmlspecialchars(trim($request->email));
        $pasien->alamat = htmlspecialchars(trim($request->alamat));
        $pasien->riwayat_penyakit = htmlspecialchars(trim($request->riwayat_penyakit));
        $pasien->save();

        return redirect()->route('vaksinasi.detail', ['nik' => $pasien->nik])->with('Data berhasil diubah');

    }
}
