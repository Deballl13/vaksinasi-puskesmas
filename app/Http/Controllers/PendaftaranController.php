<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksinasi;
use Illuminate\Support\Str;

class PendaftaranController extends Controller
{
    public function index(){

        $pasien = Pasien::join("vaksinasi", "pasien.nik", "=", "vaksinasi.nik")
                            ->where('vaksinasi.status', 0)
                            ->get();

        return view("pendaftaran.pendaftaran", compact('pasien'));

    }

    public function detail($nik){

        $pasien = new Pasien();
        $pasien->nik = $nik;

        $detail = Pasien::find($pasien->nik);

        return view("pendaftaran.persetujuan", compact('detail'));

    }

    public function daftar(){

        return view('pendaftaran_user.pendaftaran_user');
        
    }

    public function user_daftar(Request $request){

        $pasien = new Pasien();
        $pasien->nik = $request->nik;
        $pasien->nama_pasien = ucwords($request->nama_pasien);
        $pasien->tgl_lahir = $request->tgl_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->no_hp = $request->no_hp;
        $pasien->email = $request->email;
        $pasien->alamat = $request->alamat;
        $pasien->riwayat_penyakit = $request->riwayat_penyakit;
        $pasien->save();

        $vaksinasi = new Vaksinasi();
        $vaksinasi->nik = $request->nik;
        $vaksinasi->tgl_vaksin = $request->tgl_vaksin;
        $vaksinasi->vaksin_ke = $request->vaksin_ke;
        $vaksinasi->status = 0;
        $vaksinasi->save();

        return redirect()->route('daftar')->with('Pendaftaran berhasil');

    }
}
