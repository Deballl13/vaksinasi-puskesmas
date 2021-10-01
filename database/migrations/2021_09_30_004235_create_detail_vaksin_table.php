<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailVaksinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_vaksin', function (Blueprint $table) {
            $table->id("id_log");
            $table->string("kode_jenis");
            $table->string("sumber_vaksin");
            $table->integer("jumlah");
            $table->date("tanggal");
            $table->timestamps();

            $table->foreign("kode_jenis")->references("kode_jenis")->on("vaksin")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_vaksin');
    }
}
