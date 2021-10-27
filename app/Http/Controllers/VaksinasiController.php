<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksinasi;
use App\Models\Vaksin;
use App\Models\Detail_Vaksin;
use Illuminate\Support\Str;


class VaksinasiController extends Controller
{
    public function index()
    {
        $vaksinasi = Vaksinasi::join("pasien", "pasien.nik", "=", "vaksinasi.nik")
            ->where('vaksinasi.status', 2)
            ->orderByDesc('vaksinasi.tgl_vaksin')
            ->distinct()
            ->get();
        return view("vaksinasi.vaksinasi", compact('vaksinasi'));
    }

    public function detail($nik)
    {
        $detail = Pasien::find($nik);
        $vaksinasi = Vaksinasi::where('nik', $nik)->get();
        // dd($vaksinasi);
        return view("vaksinasi.detail_vaksinasi", compact('detail', 'vaksinasi'));
    }

    public function edit($nik)
    {
        $detail = Pasien::find($nik);
        return view("vaksinasi.edit_vaksinasi", compact('detail'));
    }

    public function tambah()
    {
        return view("vaksinasi.tambah_vaksinasi");
    }

    public function vaksin()
    {
        $vaksin = Vaksin::get();
        return view("vaksinasi.vaksin", compact('vaksin'));
    }

    public function detail_vaksin()
    {
        $detail_vaksin = Detail_Vaksin::join("vaksin", "vaksin.id", "=", "detail_vaksin.id_vaksin")
            ->get();
        return view("vaksinasi.detail_vaksin", compact('detail_vaksin'));
    }

    public function tambah_vaksin()
    {
        return view("vaksinasi.tambah_vaksin");
    }

    public function store_vaksin(Request $request)
    {

        $vaksin = new Vaksin();
        $vaksin->id = trim($request->kode_vaksin);
        $vaksin->nama_vaksin = $request->nama_vaksin;
        $vaksin->stok = 0;
        $vaksin->save();

        return view("vaksinasi.tambah_vaksin");
    }

    public function tambah_stok_vaksin()
    {
        $vaksin = Vaksin::get();
        return view("vaksinasi.tambah_stok_vaksin", compact('vaksin'));
    }

    public function store_stok_vaksin(Request $request)
    {

        $detail_vaksin = new Detail_Vaksin();
        $detail_vaksin->id_vaksin = trim($request->id_vaksin);
        $detail_vaksin->sumber_vaksin = $request->sumber_vaksin;
        $detail_vaksin->jumlah = $request->jumlah;
        $detail_vaksin->tanggal = $request->tanggal;
        $detail_vaksin->save();

        $vaksin = Vaksin::get();
        return view("vaksinasi.tambah_stok_vaksin", compact('vaksin'));
    }

    public function update_pasien(Request $request)
    {
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
