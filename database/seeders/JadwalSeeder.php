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
            ['id_pengguna' => '1', 'tgl_mulai' => '2023-01-03', 'tgl_selesai' => '2023-02-03', 'sesi_latihan' => '8',
            'jenis_latihan' => 'push, pull', 'status' => 'proses']
        ];

        DB::table('jadwal')->insert($data);
    }
}
