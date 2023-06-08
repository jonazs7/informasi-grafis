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
            // ['id_pengguna' => '1', 'tgl' => '2023-01-03', 'tinggi' => '163', 'berat' => '55',
            // 'neck' => '35', 'waist' => '70', 'hip' => '50', 'bisep' => '50', 'dada' => '50',
            // 'pantat' => '50', 'paha_bwh' => '50', 'betis' => '50', 'body_mass' => '0',
            // 'body_fat' => '0'],

            ['id_pengguna' => '3', 'tgl' => '2023-03-17', 'tinggi' => '163', 'berat' => '55.2',
            'neck' => '35', 'waist' => '70', 'hip' => '52', 'bisep' => '27', 'dada' => '84',
            'pantat' => '89', 'paha_bwh' => '37', 'betis' => '32', 'body_mass' => '20.78',
            'body_fat' => '8.44'],

            ['id_pengguna' => '3', 'tgl' => '2023-03-31', 'tinggi' => '163', 'berat' => '58',
            'neck' => '36', 'waist' => '69', 'hip' => '55', 'bisep' => '30', 'dada' => '88.5',
            'pantat' => '91', 'paha_bwh' => '41', 'betis' => '33', 'body_mass' => '21.00',
            'body_fat' => '8.00'],

            ['id_pengguna' => '3', 'tgl' => '2023-04-14', 'tinggi' => '163', 'berat' => '59.85',
            'neck' => '36', 'waist' => '70.5', 'hip' => '53', 'bisep' => '31', 'dada' => '92',
            'pantat' => '89', 'paha_bwh' => '44', 'betis' => '33.4', 'body_mass' => '21.00',
            'body_fat' => '8.00'],

            ['id_pengguna' => '4', 'tgl' => '2023-02-06', 'tinggi' => '148', 'berat' => '61.5',
            'neck' => '34', 'waist' => '90', 'hip' => '59', 'bisep' => '28', 'dada' => '90',
            'pantat' => '105', 'paha_bwh' => '44', 'betis' => '40', 'body_mass' => '28.08',
            'body_fat' => '19.60'],

            ['id_pengguna' => '4', 'tgl' => '2023-02-20', 'tinggi' => '148', 'berat' => '59.5',
            'neck' => '32', 'waist' => '82', 'hip' => '56', 'bisep' => '29', 'dada' => '89',
            'pantat' => '104', 'paha_bwh' => '44', 'betis' => '38', 'body_mass' => '27.16',
            'body_fat' => '14.14'],

            ['id_pengguna' => '4', 'tgl' => '2023-03-03', 'tinggi' => '148', 'berat' => '59.8',
            'neck' => '32', 'waist' => '80.5', 'hip' => '56', 'bisep' => '28.5', 'dada' => '86',
            'pantat' => '104', 'paha_bwh' => '42', 'betis' => '37', 'body_mass' => '27.30',
            'body_fat' => '13.20'],

            ['id_pengguna' => '4', 'tgl' => '2023-03-17', 'tinggi' => '148', 'berat' => '59',
            'neck' => '31', 'waist' => '81', 'hip' => '55', 'bisep' => '26', 'dada' => '83.5',
            'pantat' => '99', 'paha_bwh' => '43.5', 'betis' => '35', 'body_mass' => '26.94',
            'body_fat' => '13.52'],

            ['id_pengguna' => '4', 'tgl' => '2023-04-01', 'tinggi' => '148', 'berat' => '57',
            'neck' => '30.8', 'waist' => '78', 'hip' => '55', 'bisep' => '25.5', 'dada' => '79.5',
            'pantat' => '99', 'paha_bwh' => '41.5', 'betis' => '35', 'body_mass' => '26.02',
            'body_fat' => '11.74'],
        ];

        DB::table('data_fisik')->insert($data);
    }
}
