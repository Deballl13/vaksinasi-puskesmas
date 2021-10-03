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
            $table->id();
            $table->unsignedBigInteger("id_vaksin");
            $table->string("sumber_vaksin");
            $table->integer("jumlah");
            $table->date("tanggal");
            $table->timestamps();

            $table->foreign("id_vaksin")->references("id")->on("vaksin")->onUpdate("cascade")->onDelete("cascade");
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
