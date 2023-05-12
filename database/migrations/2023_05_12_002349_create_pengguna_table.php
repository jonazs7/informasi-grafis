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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_pengguna')->autoIncrement();
            $table->string('username', 20);
            $table->string('password', 30);
            $table->string('level', 10);
            $table->string('nama_user', 50);
            $table->date('tgl_lahir');
            $table->string('gender', 6);
            $table->string('tlpn', 18);
            $table->string('alamat', 150);
            $table->string('kidal', 5);
            $table->string('lama_pnglmn', 15);
            $table->string('goal', 30);
            $table->string('foto', 30);
            $table->string('path', 50);
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
        Schema::dropIfExists('pengguna');
    }
};
