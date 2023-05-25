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
            // ['id_pengguna' => '1', 'goal' => 'Increase muscle size', 'tgl_mulai' => '2023-05-15', 'tgl_selesai' => '2023-05-20', 'sesi_latihan' => '4',
            // 'jenis_latihan' => 'Push', 'status' => 'Proses'],

            // ['id_pengguna' => '1', 'goal' => 'Lose body fat', 'tgl_mulai' => '2023-03-15', 'tgl_selesai' => '2023-04-15', 'sesi_latihan' => '6',
            // 'jenis_latihan' => 'Pull', 'status' => 'Selesai'],

            // ['id_pengguna' => '1', 'goal' => 'Start an work out train', 'tgl_mulai' => '2023-02-10', 'tgl_selesai' => '2023-03-10', 'sesi_latihan' => '10',
            // 'jenis_latihan' => 'Back', 'status' => 'Proses'],

            // ['id_pengguna' => '3', 'goal' => NULL, 'tgl_mulai' => '2023-06-15', 'tgl_selesai' => '2023-06-15', 'sesi_latihan' => '8',
            // 'jenis_latihan' => 'Bicep', 'status' => 'Selesai'],

            // ['id_pengguna' => '4', 'goal' => NULL, 'tgl_mulai' => '2023-08-10', 'tgl_selesai' => '2023-09-10', 'sesi_latihan' => '12',
            // 'jenis_latihan' => 'Tricep', 'status' => 'Proses'],

            ['id_pengguna' => '4', 'goal' => 'Increase muscle size', 'tgl_mulai' => '2023-03-02', 'tgl_selesai' => '2023-05-02', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Proses'],

            ['id_pengguna' => '6', 'goal' => 'Lose Body Fat', 'tgl_mulai' => '2023-01-23', 'tgl_selesai' => '2023-02-23', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Proses'],

            ['id_pengguna' => '7', 'goal' => 'Rehabilitate an injury', 'tgl_mulai' => '2023-01-09', 'tgl_selesai' => '2023-02-10', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Push, Pull', 'status' => 'Proses'],

            ['id_pengguna' => '8', 'goal' => 'Lose Body Fat', 'tgl_mulai' => '2023-05-13', 'tgl_selesai' => '2023-06-13', 'sesi_latihan' => '12',
            'jenis_latihan' => NULL, 'status' => 'Proses'],
        ];

        DB::table('jadwal')->insert($data);
    }
}
