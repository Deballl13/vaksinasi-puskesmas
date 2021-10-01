<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaksinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaksinasi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("nik");
            $table->string("kode_jenis_vaksin");
            $table->date("tanggal_vaksin");
            $table->integer("vaksin_ke");
            $table->integer("status");
            $table->timestamps();

            $table->foreign("nik")->references("nik")->on("pasien")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("kode_jenis_vaksin")->references("kode_jenis")->on("vaksin")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vaksinasi');
    }
}
