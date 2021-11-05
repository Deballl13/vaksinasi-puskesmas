<?php

namespace App\Mail;

use App\Models\Pasien;
use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifPendaftaranVaksin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $pasien, $vaksinasi)
    {
        $this->nik = $pasien->nik;
        $this->nama = $pasien->nama_pasien;
        $this->jenis_kelamin = $pasien->jenis_kelamin;
        $this->no_hp = $pasien->no_hp;
        $this->alamat = $pasien->alamat;
        $this->status = $status;
        $this->vaksin_ke = $vaksinasi->vaksin_ke;
        $this->tgl_vaksin = date("d-m-Y", strtotime($vaksinasi->tgl_vaksin));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        if($this->status === 1){
            $this->status = 'Silahkan datang ke Puskesmas X Koto II pada jadwal yang telah anda daftarkan';
        }
        else if($this->status === 3){
            $this->status = 'Maaf, anda bisa mendaftar vaksinasi kembali jika anda sudah sembuh';
        }

        if($this->jenis_kelamin === 'L'){
            $this->jenis_kelamin = 'Laki-Laki';
        }
        else{
            $this->jenis_kelamin = 'Perempuan';
        }

        return $this->markdown('emails.pendaftaran')
                    ->subject("Puskesmas X Koto II")
                    ->with([
                        'nama' => $this->nama,
                        'nik' => $this->nik,
                        'jenis_kelamin' => $this->jenis_kelamin,
                        'no_hp' => $this->no_hp,
                        'alamat' => $this->alamat,
                        'status' => $this->status,
                        'vaksin_ke' => $this->vaksin_ke,
                        'tgl_vaksin' => $this->tgl_vaksin
                    ]);
    }
}
