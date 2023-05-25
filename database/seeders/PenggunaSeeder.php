<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Pengguna;


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
            ['id' => '1', 'name' => 'Yonathan Sebastian', 'email' => 'jonas@gmail.com', 
            'password' => '$2y$10$w5h5YJE5U377q3WVukpj/u1UqKTJrz4Mh3fJEDw2aa36t2KbnFSd.', 'level' => 'Member',
            'tgl_lahir' => '2023-01-01', 'gender' => 'Pria', 'tlpn' => '0812-2323-4545', 
            'alamat' => 'Jl. Tritunggal No.4, Salakan, Sorosutan, Kec. Umbulharjo, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55162',
            'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-05-13 00:05:11', 'updated_at' => '2023-05-13 00:05:11'],

            ['id' => '2', 'name' => 'Mas Odie', 'email' => 'odie@gmail.com', 
            'password' => '$2y$10$yFaYvLUuf9y4RgVngfXrQe.DNAU/IhYk4.bd5eOMp56g1P.AYen5i', 'level' => 'Trainer',
            'created_at' => '2023-05-13 00:05:35', 'updated_at' => '2023-05-13 00:05:35'],

            ['id' => '3', 'name' => 'Yosua Nissi', 'email' => 'yosua@gmail.com', 
            'password' => '$2y$10$mmZiexZHMtx8eRl6JPcIeuwvOSvr8PDiw3HSRANRPMkkRGfiek64q', 'level' => 'Member',
            'tgl_lahir' => '2022-02-02', 'gender' => 'Wanita', 'tlpn' => '0832-2222-4444', 
            'alamat' => 'Jalan Pasar Telo',
            'kidal' => 'Ya', 'lama_pnglmn' => '> 3 Bulan', 
            'created_at' => '2023-05-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '4', 'name' => 'Marin', 'email' => 'marin@gmail.com', 
            'password' => '$2y$10$lp.tScq8BtsdND2a/o22teY2d4wWs97kgpB9rcpJQ.sr/E6WUDpQS', 'level' => 'Member',
            'created_at' => '2023-05-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '5', 'name' => 'Okinawa', 'email' => 'oki@gmail.com', 
            'password' => '$2y$10$JaExT9VAmugvdKd4FYNCZ.yO56HCXkV1IPWbudvGkGNrOSCNJHCnO', 'level' => 'Member',
            'created_at' => '2023-05-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],
        ];
        //DB::table('pengguna')->insert($data);
        foreach ($data as $item){
            Pengguna::create($item);
        }
    }
}
