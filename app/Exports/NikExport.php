<?php

namespace App\Exports;

use App\Models\Nik;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NikExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Nik::all();
    }

    public function headings(): array
    {
        return [
            'No. NIK',
            'Nama KTP',
            'Alamat',
            'Kecamatan',
            'Desa',
            'Nomer TPS',
        ];
    }
}
