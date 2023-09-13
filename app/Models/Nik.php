<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nik extends Model
{
    use HasFactory;

    protected $table = 'niks'; // Sesuaikan dengan nama tabel Anda

    protected $fillable = [
        'no_nik',
        'nama_ktp',
        'alamat',
        'kecamatan',
        'desa',
        'no_tps',
        // Kolom lainnya
    ];
}
