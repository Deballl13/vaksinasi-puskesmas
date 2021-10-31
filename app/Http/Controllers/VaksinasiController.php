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
        $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
        $pasien->save();

        return redirect()->route('vaksinasi.detail', ['nik' => $pasien->nik])->with('Data berhasil diubah');
    }

    public function delete_pasien(Request $request){
        $pasien = Pasien::find($request->nik);
        $pasien->delete();

        return redirect()->back();
    }

    public function delete_vaksinasi(Request $request, $nik){
        $vaksinasi = Vaksinasi::find($nik);
        $vaksinasi->delete();

        return redirect()->back();
    }
}
