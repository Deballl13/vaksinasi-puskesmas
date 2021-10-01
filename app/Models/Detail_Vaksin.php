<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Vaksin extends Model
{
    use HasFactory;
    protected $table = "detail_vaksin";
    protected $fillable = ["kode_jenis", "sumber_vaksin", "jumlah", "tanggal"];

    public function vaksinasi(){
        return $this->belongsTo(Vaksinasi::class);
    }
}
