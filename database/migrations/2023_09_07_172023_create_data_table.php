<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('nik'); // Kolom No. NIK
            $table->string('nama_ktp'); // Kolom Nama KTP
            $table->text('alamat'); // Kolom Alamat
            $table->string('kecamatan'); // Kolom Kecamatan
            $table->string('desa'); // Kolom Desa
            $table->string('nomor_tps'); // Kolom Nomer TPS
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
