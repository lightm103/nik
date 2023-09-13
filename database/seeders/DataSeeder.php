<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'nik' => '12345678' . $i,
                'nama_ktp' => 'John Doe ' . $i,
                'alamat' => 'Alamat ' . $i,
                'kecamatan' => 'Kecamatan ' . $i,
                'desa' => 'Desa ' . $i,
                'nomor_tps' => 'TPS ' . $i,
            ];
        }
        Data::insert($data);
        dd($data);
    }
}
