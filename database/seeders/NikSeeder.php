<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nik;

class NikSeeder extends Seeder
{
    public function run()
    {
        // Buat 50 data dummy
        for ($i = 1; $i <= 50; $i++) {
            Nik::create([
                'no_nik' => 'NIK' . str_pad($i, 4, '0', STR_PAD_LEFT), // Misalnya, NIK001, NIK002, dst.
                'nama_ktp' => 'Nama KTP ' . $i,
                'alamat' => 'Alamat ' . $i,
                'kecamatan' => 'Kecamatan ' . $i,
                'desa' => 'Desa ' . $i,
                'no_tps' => 'TPS' . str_pad($i, 3, '0', STR_PAD_LEFT), // Misalnya, TPS001, TPS002, dst.
            ]);
        }
    }
}