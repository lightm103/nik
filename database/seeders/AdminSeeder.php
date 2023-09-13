<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Admin 1
        DB::table('users')->insert([
            'name' => 'Admin 1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('password123'), // Ganti dengan kata sandi yang Anda inginkan
        ]);

        // Admin 2
        DB::table('users')->insert([
            'name' => 'Admin 2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('password456'), // Ganti dengan kata sandi yang Anda inginkan
        ]);
    }
}

