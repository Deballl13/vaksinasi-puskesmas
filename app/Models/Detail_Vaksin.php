<?php

namespace App\Models;

use App\Casts\IntegerCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Vaksin extends Model
{
    use HasFactory;
    protected $table = "detail_vaksin";
    protected $fillable = ["id_vaksin", "sumber_vaksin", "jumlah", "tanggal"];
    protected $casts = [
        'id_vaksin' => IntegerCast::class,
        'jumlah' => IntegerCast::class,
    ];

    public function vaksinasi(){
        return $this->belongsTo(Vaksinasi::class);
    }
}
