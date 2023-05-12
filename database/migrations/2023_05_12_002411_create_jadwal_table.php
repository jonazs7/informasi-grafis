<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_jadwal')->autoIncrement();
            $table->unsignedSmallInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->tinyInteger('sesi_latihan');
            $table->string('jenis_latihan', 25);
            $table->string('status', 10);
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
        Schema::dropIfExists('jadwal');
    }
};
