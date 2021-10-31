<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin extends Model
{
    use HasFactory;
    protected $table = "vaksin";
    protected $fillable = ["nama_vaksin", "stok"];

    public function vaksinasi(){
        return $this->hasMany(Vaksinasi::class);
    }

    public function detail_vaksin(){
        return $this->hasMany(Detail_Vaksin::class);
    }
}
