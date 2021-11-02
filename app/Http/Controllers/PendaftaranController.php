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
                            ->where('vaksinasi.status', 0)
                            ->orWhere('vaksinasi.status', 1)
                            ->first();

        $vaksin = Vaksin::where('stok', ">", "0")->get();
        
        return view("pendaftaran.detail", compact('detail', 'vaksin'));
    }

    public function daftar(){
        return view('pendaftaran_user.pendaftaran_user');
    }

    public function store_daftar(Request $request){
        // cek data vaksinasi 
        $cek_vaksinasi = Vaksinasi::where('nik', $request->nik)
                                    ->where('vaksin_ke', $request->vaksin_ke)
                                    ->orWhere('vaksin_ke', '>', $request->vaksin_ke)
                                    ->get();

        // cek status pendaftaran sebelumnya
        $cek_pendaftaran = Vaksinasi::where('nik', $request->nik)
                                      ->where('status', 0)
                                      ->orWhere('status', 1)
                                      ->get();
                                      
        // jika data vaksinasi tidak ada dan vaksinasi sebelumnya sudah selesai
        if($cek_vaksinasi !== null && $cek_pendaftaran === null){
            // jika data pasien belum terdaftar
            if(!Pasien::find($request->nik)){
                $pasien = new Pasien();
                $pasien->nik = htmlspecialchars(trim($request->nik));
                $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
                $pasien->tgl_lahir = htmlspecialchars($request->tgl_lahir);
                $pasien->jenis_kelamin = htmlspecialchars($request->jenis_kelamin);
                $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
                $pasien->email = $pasien->email = isset($request->email) ? htmlspecialchars(trim($request->email)) : NULL;
                $pasien->alamat = htmlspecialchars(trim($request->alamat));
                $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
                $pasien->save();
            }
            // jika data belum ada
            else{
                $pasien = Pasien::find($request->nik);
                $pasien->no_hp = htmlspecialchars(trim($request->no_hp));
                $pasien->email = htmlspecialchars(trim($request->email));
                $pasien->alamat = htmlspecialchars(trim($request->alamat));
                $pasien->riwayat_penyakit = isset($request->riwayat_penyakit) ? htmlspecialchars(trim($request->riwayat_penyakit)) : NULL;
                $pasien->save();
            }

            // tambah data vaksinasi
            $vaksinasi = new Vaksinasi();
            $vaksinasi->nik = htmlspecialchars(trim($request->nik));
            $vaksinasi->tgl_vaksin = htmlspecialchars($request->tgl_vaksin);
            $vaksinasi->vaksin_ke = htmlspecialchars($request->vaksin_ke);
            $vaksinasi->status = 0;
            $vaksinasi->save();

            return redirect('/pendaftaran/d/'.$request->nik)->with('success', 'Data berhasil ditambah');
        }        

        if($cek_vaksinasi === null){
            return redirect('/pendaftaran')->with('failed', 'vaksinasi sudah terdaftar/selesai');
        }
        else if($cek_pendaftaran !== null){
            return redirect('/pendaftaran')->with('failed', 'vaksinasi sebelumnya belum selesai');
        }
    }

    public function update_status(Request $request, $nik){
        $vaksinasi = Vaksinasi::where('nik', $nik)
                                ->where('vaksinasi.status', 0)
                                ->orWhere('vaksinasi.status', 1)
                                ->first();
                                
        $pasien = Pasien::find($nik);

        switch (intval($request->inputStatus)) {
            case 1:
                // jika disetujui
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin(intval($request->inputStatus), $pasien));
                $vaksinasi->status = htmlspecialchars($request->inputStatus);
                $vaksinasi->save();
                break;
            
            case 2:
                // jika selesai
                $vaksinasi->id_vaksin = htmlspecialchars($request->id_vaksin);
                $vaksinasi->status = htmlspecialchars($request->inputStatus);
                $vaksinasi->save();

                $vaksin = Vaksin::find($request->id_vaksin);
                $vaksin->stok = $vaksin->stok-1;
                $vaksin->save();
                break;
            
            case 3:
                // jika tolak
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin(intval($request->inputStatus), $pasien));
                $vaksinasi->delete();
                break;
            
            default:
                // jika batal
                $vaksinasi->delete();
                break;
        }

        return redirect('pendaftaran');
    }
}
