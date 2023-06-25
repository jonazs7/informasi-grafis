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
            'alamat' => 'Jl. Tritunggal No.4',
            'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-02-13 00:05:11', 'updated_at' => '2023-05-13 00:05:11'],

            ['id' => '2', 'name' => 'Mas Odie', 'email' => 'odie@gmail.com', 
            'password' => '$2y$10$yFaYvLUuf9y4RgVngfXrQe.DNAU/IhYk4.bd5eOMp56g1P.AYen5i', 'level' => 'Trainer',
            'created_at' => '2023-01-15 00:05:35', 'updated_at' => '2023-05-13 00:05:35'],

            ['id' => '3', 'name' => 'Indra', 'email' => 'indra@gmail.com', 
            'password' => '$2y$10$.GmsU68hr8rngfW01N.2puEHhcmpDJ/E9byoL/XOdmLFVItfHchK.', 'level' => 'Member',
            'gender' => 'Pria', 'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-03-01 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '4', 'name' => 'Atika', 'email' => 'atika@gmail.com', 
            'password' => '$2y$10$AUkhdhUm6tDDZRllBs6mRu0JXILsSQWhZ4OZHEThXuckubYMMmSQe', 'level' => 'Member',
            'gender' => 'Wanita', 'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-01-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '5', 'name' => 'Bapak Sarjito', 'email' => 'sarjito@gmail.com', 
            'password' => '$2y$10$loHGaQh1OW4U/wiSdeOi7emKrJi/GQyqoThqqVQVdATenHYE5209K', 'level' => 'Member',
            'gender' => 'Pria', 'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-01-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '6', 'name' => 'Zella', 'email' => 'zella@gmail.com', 
            'password' => '$2y$10$rooZHo9qTLyFbdSnQS/6keOrrWzDohpL/rMF4ayBPLiwzCLYXTTCS', 'level' => 'Member',
            'tlpn' => '0823-2908-5565', 
            'alamat' => 'Gedong Kuning', 'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-02-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],

            ['id' => '7', 'name' => 'Afindra Kafedz', 'email' => 'afindra@gmail.com', 
            'password' => '$2y$10$CrvQUBOro3NAQzRCp8OlHeTR5TsAXmMxSZI7myybo9e6tUZscxaue', 'level' => 'Member',
            'gender' => 'Pria', 'kidal' => 'Tidak', 'lama_pnglmn' => '< 3 bulan',
            'created_at' => '2023-02-13 08:47:22', 'updated_at' => '2023-05-13 08:47:22'],
        ];
        //DB::table('pengguna')->insert($data);
        foreach ($data as $item){
            Pengguna::create($item);
        }
    }
}
