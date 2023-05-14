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
            'kidal' => 'Ya', 'lama_pnglmn' => '< 3 bulan', 'goal' => 'Loss body fat',
            'created_at' => '2023-05-13 00:05:11', 'updated_at' => '2023-05-13 00:05:11'],

            ['id' => '2', 'name' => 'Eko Verianto', 'email' => 'eko@gmail.com', 
            'password' => '$2y$10$jUDs/6Xdh9bOF8KopQQl/.dE0tBfsIBlVMnoER8qnFMu6zXe0B6jK', 'level' => 'Trainer',
            'created_at' => '2023-05-13 00:05:35', 'updated_at' => '2023-05-13 00:05:35'],

            ['id' => '3', 'name' => 'Yosua Nissi', 'email' => 'yosua@gmail.com', 
            'password' => '$2y$10$mmZiexZHMtx8eRl6JPcIeuwvOSvr8PDiw3HSRANRPMkkRGfiek64q', 'level' => 'Member',
            'tgl_lahir' => '2022-02-02', 'gender' => 'Wanita', 'tlpn' => '0832-2222-4444', 
            'alamat' => 'Jalan Pasar Telo',
            'kidal' => 'Ya', 'lama_pnglmn' => '> 3 Bulan', 'goal' => 'Lainnya',
            'created_at' => '2023-05-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],
        ];
        //DB::table('pengguna')->insert($data);
        foreach ($data as $item){
            Pengguna::create($item);
        }
    }
}
