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
            $table->unsignedBigInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id')->on('pengguna')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('goal', 30)->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->tinyInteger('sesi_latihan')->nullable();
            $table->string('jenis_latihan', 100)->nullable();
            $table->string('status', 10)->nullable();
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
