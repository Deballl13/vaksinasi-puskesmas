<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $fillable = ["nik", "nama_pasien", "tgl_lahir", "alamat", "email", "riwayat_penyakit", "status"];

    public function vaksinasi(){
        return $this->hasMany(Vaksinasi::class);
    }
}
