<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataFisikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id_pengguna' => '1', 'tgl' => '2023-01-03', 'tinggi' => '163', 'berat' => '55',
            'neck' => '35', 'waist' => '70', 'hip' => '50', 'bisep' => '50', 'dada' => '50',
            'pantat' => '50', 'paha_bwh' => '50', 'betis' => '50', 'body_mass' => '0',
            'body_fat' => '0']
        ];

        DB::table('data_fisik')->insert($data);
    }
}
