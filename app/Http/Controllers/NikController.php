<?php

namespace App\Http\Controllers;

use App\Models\Nik;
use App\Exports\NikExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NikController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $niks = Nik::query();

        if (!empty($query)) {
            $niks->where('no_nik', 'like', '%' . $query . '%')
                ->orWhere('nama_ktp', 'like', '%' . $query . '%')
                ->orWhere('alamat', 'like', '%' . $query . '%')
                ->orWhere('kecamatan', 'like', '%' . $query . '%')
                ->orWhere('desa', 'like', '%' . $query . '%')
                ->orWhere('no_tps', 'like', '%' . $query . '%');
        }

        $niks = $niks->get();

        return view('pages.nik.index', compact('niks'));
    }

    public function show($id)
    {
        // Mengambil data Nik berdasarkan ID
        $nik = Nik::findOrFail($id);

        // Mengirim data Nik ke tampilan show.blade.php
        return view('pages.nik.show', compact('nik'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $result = Nik::where('no_nik', 'like', "%$query%")
            ->orWhere('nama_ktp', 'like', "%$query%")
            ->orWhere('desa', 'like', "%$query%")
            ->orWhere('no_tps', 'like', "%$query%")
            ->get();

        if ($result->isEmpty()) {
            return response()->json(['message' => 'Tidak ada hasil yang ditemukan'], 404);
        }

        return response()->json(['results' => $result]);
    }

    public function edit($id)
    {
        $nik = Nik::findOrFail($id);
        return view('pages.nik.edit', compact('nik'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'no_nik' => 'required',
            'nama_ktp' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'no_tps' => 'required',
        ]);

        $nik = Nik::findOrFail($id);

        $nik->update([
            'no_nik' => $request->input('no_nik'),
            'nama_ktp' => $request->input('nama_ktp'),
            'alamat' => $request->input('alamat'),
            'kecamatan' => $request->input('kecamatan'),
            'desa' => $request->input('desa'),
            'no_tps' => $request->input('no_tps'),
        ]);

        return redirect()->route('nik.index')
            ->with('success', 'Data NIK berhasil diperbarui.');
    }
    public function export()
    {
        return Excel::download(new NikExport, 'nik_data.xlsx');
    }
}
