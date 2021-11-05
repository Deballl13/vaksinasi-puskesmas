<?php

namespace App\Models;

use App\Casts\IntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksinasi extends Model
{
    use HasFactory;
    protected $table = "vaksinasi";
    protected $fillable = ["nik", "id_vaksin", "tanggal_vaksin", "vaksin_ke", "status"];
    protected $casts = [
        'nik' => IntegerCast::class,
        'id_vaksin' => IntegerCast::class,
        'vaksin_ke' => IntegerCast::class,
        'status' => IntegerCast::class,
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }

    public function vaksin(){
        return $this->belongsTo(Vaksin::class);
    }
}
