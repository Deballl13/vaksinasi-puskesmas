<?php

namespace App\Http\Controllers;

use App\Mail\NotifPendaftaranVaksin;
use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Vaksin;
use App\Models\Vaksinasi;
use Illuminate\Support\Facades\Mail;

class PendaftaranController extends Controller
{
    public function index(){
        $pasien = Pasien::join("vaksinasi", "pasien.nik", "=", "vaksinasi.nik")
                            ->where('vaksinasi.status', 0)
                            ->orWhere('vaksinasi.status', 1)
                            ->orderBy('vaksinasi.tgl_vaksin', 'asc')
                            ->get();

        return view("pendaftaran.pendaftaran", compact('pasien'));
    }

    public function detail($nik){
        $detail = Pasien::join('vaksinasi', 'pasien.nik', '=', 'vaksinasi.nik')
                            ->where('pasien.nik', $nik)
                            ->orderBy('vaksinasi.vaksin_ke', 'desc')
                            ->first();

        $vaksin = Vaksin::where('stok', ">", "0")->get();
        
        return view("pendaftaran.detail", compact('detail', 'vaksin'));
    }

    public function daftar(){
        return view('pendaftaran_user.pendaftaran_user');
    }

    public function user_daftar(Request $request){
        if(!Pasien::find($request->nik)){
            $pasien = new Pasien();
            $pasien->nik = htmlspecialchars(trim($request->nik));
            $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
            $pasien->tgl_lahir = htmlspecialchars($request->tgl_lahir);
            $pasien->jenis_kelamin = htmlspecialchars($request->jenis_kelamin);
            $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
            $pasien->save();
        }
        else{
            $pasien = Pasien::find($request->nik);
            $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
            $pasien->save();
        }

        $vaksinasi = new Vaksinasi();
        $vaksinasi->nik = trim($request->nik);
        $vaksinasi->tgl_vaksin = $request->tgl_vaksin;
        $vaksinasi->vaksin_ke = $request->vaksin_ke;
        $vaksinasi->status = 0;
        $vaksinasi->save();

        return redirect()->route('daftar')->with('success', 'Pendaftaran berhasil');
    }

    public function store_daftar(Request $request){
        if(!Pasien::find($request->nik)){
            $pasien = new Pasien();
            $pasien->nik = htmlspecialchars(trim($request->nik));
            $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
            $pasien->tgl_lahir = htmlspecialchars($request->tgl_lahir);
            $pasien->jenis_kelamin = htmlspecialchars($request->jenis_kelamin);
            $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
            $pasien->save();
        }
        else{
            $pasien = Pasien::find($request->nik);
            $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
            $pasien->email = htmlspecialchars(trim($request->email));
            $pasien->alamat = htmlspecialchars(trim($request->alamat));
            $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
            $pasien->save();
        }

        $vaksinasi = new Vaksinasi();
        $vaksinasi->nik = htmlspecialchars(trim($request->nik));
        $vaksinasi->tgl_vaksin = htmlspecialchars($request->tgl_vaksin);
        $vaksinasi->vaksin_ke = htmlspecialchars($request->vaksin_ke);
        $vaksinasi->status = 0;
        $vaksinasi->save();

        return redirect('/pendaftaran/d/'.$request->nik)->with('success', 'Data berhasil ditambah');
    }

    public function update_status(Request $request, $nik){
        $vaksinasi = Vaksinasi::where('nik', $nik)
                                ->orderBy('vaksin_ke', 'desc')
                                ->first();
                                
        $pasien = Pasien::find($nik);

        // jika disetujui atau selesai
        if((int)$request->inputStatus !== 3 && (int)$request->inputStatus !== 4){
            // jika disetujui
            if((int) $request->inputStatus === 1){
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin($request->inputStatus, $pasien));
            }
            // jika selesai
            else if((int) $request->inputStatus === 2){
                $vaksinasi->id_vaksin = htmlspecialchars($request->id_vaksin);
                
                $vaksin = Vaksin::find((int) $request->id_vaksin);
                $vaksin->stok = $vaksin->stok-1;
                $vaksin->save();
            }
            $vaksinasi->status = $request->inputStatus;
            $vaksinasi->save();
        }
        // jika ditolak atau batal
        else{
            // jika ditolak
            if((int) $request->inputStatus === 3){
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin($request->inputStatus, $pasien));
            }
            $vaksinasi->delete();
        }

        return redirect('pendaftaran');
    }
}
