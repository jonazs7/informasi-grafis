<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id_pengguna' => '3', 'goal' => 'Increase muscle size', 'tgl_mulai' => '2023-03-02', 'tgl_selesai' => '2023-05-02', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Selesai'],

            ['id_pengguna' => '4', 'goal' => 'Lose body fat', 'tgl_mulai' => '2023-01-23', 'tgl_selesai' => '2023-04-23', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Selesai'],

            ['id_pengguna' => '5', 'goal' => 'Rehabilitate an injury', 'tgl_mulai' => '2023-01-09', 'tgl_selesai' => '2023-02-10', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Selesai'],

            ['id_pengguna' => '6', 'goal' => 'Lose body fat', 'tgl_mulai' => '2023-05-13', 'tgl_selesai' => '2023-06-13', 'sesi_latihan' => '12',
            'jenis_latihan' => NULL, 'status' => 'Proses'],
        ];

        DB::table('jadwal')->insert($data);
    }
}
