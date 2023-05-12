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
        Schema::create('data_fisik', function (Blueprint $table) {
            $table->unsignedSmallInteger('id_data_fisik')->autoIncrement();
            $table->unsignedSmallInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tgl');
            $table->float('tinggi', 5, 2);
            $table->float('berat', 5, 2);
            $table->float('neck', 5, 2);
            $table->float('waist', 5, 2);
            $table->float('hip', 5, 2);
            $table->float('bisep', 5, 2);
            $table->float('dada', 5, 2);
            $table->float('pantat', 5, 2);
            $table->float('paha_bwh', 5, 2);
            $table->float('betis', 5, 2);
            $table->float('body_mass', 4, 2);
            $table->float('body_fat', 4, 2);
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
        Schema::dropIfExists('data_fisik');
    }
};
