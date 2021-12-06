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
                                    ->orderBy('vaksin_ke', 'desc')
                                    ->first();

        // cek status pendaftaran sebelumnya
        $cek_pendaftaran = Vaksinasi::where('nik', $request->nik)
                                      ->where('status', 0)
                                      ->orWhere('status', 1)
                                      ->first();
                                      
        // jika data vaksinasi tidak ada dan vaksinasi sebelumnya sudah selesai
        if($cek_pendaftaran === null && ($cek_vaksinasi === null || ($cek_vaksinasi->vaksin_ke !== intval($request->vaksin_ke) && $cek_vaksinasi->vaksin_ke < intval($request->vaksin_ke)))){
            // jika data pasien belum terdaftar
            if(!Pasien::find($request->nik)){
                $pasien = new Pasien();
                $pasien->nik = htmlspecialchars(trim($request->nik));
                $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
                $pasien->tgl_lahir = htmlspecialchars(trim($request->tgl_lahir));
                $pasien->jenis_kelamin = htmlspecialchars(trim($request->jenis_kelamin));
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
            $vaksinasi->tgl_vaksin = htmlspecialchars(trim($request->tgl_vaksin));
            $vaksinasi->vaksin_ke = htmlspecialchars(trim($request->vaksin_ke));
            $vaksinasi->status = 0;
            $vaksinasi->save();

            return redirect('/daftar')->with('success', 'Pendaftaran berhasil ditambah');
        }        
        // dd($cek_pendaftaran !== null);
        if($cek_pendaftaran !== null){
            return redirect('/pendaftaran')->with('failed', 'vaksinasi sebelumnya belum selesai');
        }
        else if($cek_vaksinasi->vaksin_ke === intval($request->vaksin_ke) || $cek_vaksinasi->vaksin_ke > intval($request->vaksin_ke)){
            return redirect('/pendaftaran')->with('failed', 'vaksinasi '.$request->vaksin_ke.' anda sudah selesai');
        }
    }

    public function store_user_daftar(Request $request){
        // cek data vaksinasi 
        $cek_vaksinasi = Vaksinasi::where('nik', $request->nik)
                                    ->orderBy('vaksin_ke', 'desc')
                                    ->first();

        // cek status pendaftaran sebelumnya
        $cek_pendaftaran = Vaksinasi::where('nik', $request->nik)
                                      ->where('status', 0)
                                      ->orWhere('status', 1)
                                      ->first();
                                      
        // jika data vaksinasi tidak ada dan vaksinasi sebelumnya sudah selesai
        if($cek_pendaftaran === null && ($cek_vaksinasi === null || ($cek_vaksinasi->vaksin_ke !== intval($request->vaksin_ke) && $cek_vaksinasi->vaksin_ke < intval($request->vaksin_ke)))){
            // jika data pasien belum terdaftar
            if(!Pasien::find($request->nik)){
                $pasien = new Pasien();
                $pasien->nik = htmlspecialchars(trim($request->nik));
                $pasien->nama_pasien = ucwords(htmlspecialchars(trim($request->nama_pasien)));
                $pasien->tgl_lahir = htmlspecialchars(trim($request->tgl_lahir));
                $pasien->jenis_kelamin = htmlspecialchars(trim($request->jenis_kelamin));
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
            $vaksinasi->tgl_vaksin = htmlspecialchars(trim($request->tgl_vaksin));
            $vaksinasi->vaksin_ke = htmlspecialchars(trim($request->vaksin_ke));
            $vaksinasi->status = 0;
            $vaksinasi->save();

            return redirect('/daftar')->with('success', 'Pendaftaran berhasil ditambah');
        }        
        // dd($cek_pendaftaran !== null);
        if($cek_pendaftaran !== null){
            return redirect('/daftar')->with('failed', 'vaksinasi sebelumnya belum selesai');
        }
        else if($cek_vaksinasi->vaksin_ke === intval($request->vaksin_ke) || $cek_vaksinasi->vaksin_ke > intval($request->vaksin_ke)){
            return redirect('/daftar')->with('failed', 'vaksinasi '. $request->vaksin_ke .' anda sudah selesai');
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
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin(intval($request->inputStatus), $pasien, $vaksinasi));
                $vaksinasi->status = htmlspecialchars($request->inputStatus);
                $vaksinasi->save();
                return redirect()->route('pendaftaran.detail', ['nik' => $nik])->with('success', 'vaksinasi berhasil disetujui');
                break;
            
            case 2:
                // jika selesai
                $vaksinasi->id_vaksin = htmlspecialchars($request->id_vaksin);
                $vaksinasi->status = htmlspecialchars($request->inputStatus);
                $vaksinasi->save();

                $vaksin = Vaksin::find($request->id_vaksin);
                $vaksin->stok -= 1;
                $vaksin->save();

                return redirect()->route('pendaftaran')->with('success', 'vaksinasi '.$vaksinasi->vaksin_ke.' telah selesai');
                break;
            
            case 3:
                // jika tolak
                Mail::to($pasien->email)->send(new NotifPendaftaranVaksin(intval($request->inputStatus), $pasien, $vaksinasi));
                $vaksinasi->delete();
                return redirect()->route('pendaftaran')->with('success', 'pendaftaran berhasil dihapus');
                break;
            
            default:
                // jika batal
                $vaksinasi->delete();
                return redirect()->route('pendaftaran')->with('success', 'pendaftaran berhasil dihapus');
                break;
        }
    }
}
