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
                            ->orWhere('vaksinasi.status', 1)
                            ->get();

        return view("pendaftaran.pendaftaran", compact('pasien'));

    }

    public function detail($nik){

        $pasien = new Pasien();
        $pasien->nik = $nik;

        $detail = Pasien::find($pasien->nik);

        return view("pendaftaran.detail", compact('detail'));

    }

    public function daftar(){

        return view('pendaftaran_user.pendaftaran_user');

    }

    public function user_daftar(Request $request){

        $pasien = new Pasien();

        if(!Pasien::find($request->nik)){
            $pasien->nik = trim($request->nik);
            $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
            $pasien->tgl_lahir = $request->tgl_lahir;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->no_hp = trim($request->no_hp);
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = htmlspecialchars(trim($request->riwayat_penyakit));
            $pasien->save();
        }

        $vaksinasi = new Vaksinasi();
        $vaksinasi->nik = trim($request->nik);
        $vaksinasi->tgl_vaksin = $request->tgl_vaksin;
        $vaksinasi->vaksin_ke = $request->vaksin_ke;
        $vaksinasi->status = 0;
        $vaksinasi->save();

        return redirect()->route('daftar')->with('Pendaftaran berhasil');

    }

    public function store_daftar(Request $request){

        $pasien = new Pasien();

        if(!Pasien::find($request->nik)){
            $pasien->nik = trim($request->nik);
            $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
            $pasien->tgl_lahir = $request->tgl_lahir;
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->no_hp = trim($request->no_hp);
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = htmlspecialchars(trim($request->riwayat_penyakit));
            $pasien->save();
        }

        $vaksinasi = new Vaksinasi();
        $vaksinasi->nik = trim($request->nik);
        $vaksinasi->tgl_vaksin = $request->tgl_vaksin;
        $vaksinasi->vaksin_ke = $request->vaksin_ke;
        $vaksinasi->status = 0;
        $vaksinasi->save();

        return redirect('/pendaftaran/d/'.$vaksinasi->nik)->with('Data berhasil ditambah');

    }
}
