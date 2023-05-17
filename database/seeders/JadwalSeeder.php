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
            ['id_pengguna' => '1', 'tgl_mulai' => '2023-05-15', 'tgl_selesai' => '2023-05-20', 'sesi_latihan' => '4',
            'jenis_latihan' => 'Push', 'status' => 'Proses'],

            ['id_pengguna' => '1', 'tgl_mulai' => '2023-03-15', 'tgl_selesai' => '2023-04-15', 'sesi_latihan' => '6',
            'jenis_latihan' => 'Pull', 'status' => 'Selesai'],

            ['id_pengguna' => '3', 'tgl_mulai' => '2023-06-15', 'tgl_selesai' => '2023-06-15', 'sesi_latihan' => '8',
            'jenis_latihan' => 'Bisep', 'status' => 'Selesai'],

            ['id_pengguna' => '4', 'tgl_mulai' => '2023-08-10', 'tgl_selesai' => '2023-09-10', 'sesi_latihan' => '12',
            'jenis_latihan' => 'Trisep', 'status' => 'Proses'],
        ];

        DB::table('jadwal')->insert($data);
    }
}
