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
            //$table->unsignedSmallInteger('id_pengguna')->autoIncrement();
            $table->id();
            $table->string('name', 50)->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 100);
            $table->string('level', 10)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('gender', 6)->nullable();
            $table->string('tlpn', 18)->nullable();
            $table->string('alamat', 150)->nullable();
            $table->string('kidal', 5)->nullable();
            $table->string('lama_pnglmn', 15)->nullable();
            $table->string('goal', 30)->nullable();
            $table->string('foto', 30)->nullable();
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
