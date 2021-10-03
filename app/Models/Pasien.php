<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Casts\NikCasts;

class Pasien extends Model
{
    use HasFactory;
    protected $table = "pasien";
    protected $fillable = ["nik", "nama_pasien", "tgl_lahir", "jenis_kelamin", "no_hp", "email", "alamat", "riwayat_penyakit"];
    protected $casts = [
        'nik' => NikCasts::class,
    ];
    protected $primaryKey = 'nik';

    public function vaksinasi(){
        return $this->hasMany(Vaksinasi::class);
    }
}
