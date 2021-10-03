<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigInteger("nik")->primary();
            $table->string("nama_pasien");
            $table->date("tgl_lahir");
            $table->string("jenis_kelamin");
            $table->string("no_hp");
            $table->string("email")->nullable();
            $table->text("alamat");
            $table->longText("riwayat_penyakit");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasien');
    }
}
