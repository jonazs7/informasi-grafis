<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['username' => 'thenmust_23', 'password' => 'thenmust123', 'level' => 'member', 'nama_user' => 'Thenmust bozz',
            'tgl_lahir' => '2022-10-02', 'gender' => 'Pria', 'tlpn' => '0821-2312-1212', 'alamat' => 'banguntapan',
            'kidal' => 'Ya', 'lama_pnglmn' => '< 3 bulan', 'goal' => 'Loss body fat', 'foto' => 'ucok.png', 'path' => '1211231']
        ];

        DB::table('pengguna')->insert($data);
    }
}
