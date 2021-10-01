<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksinasi extends Model
{
    use HasFactory;
    protected $table = "vaksinasi";
    protected $fillable = ["nik", "kode_jenis_vaksin", "tanggal_vaksin", "vaksin_ke", "status"];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }

    public function vaksin(){
        return $this->belongsTo(Vaksin::class);
    }
}
