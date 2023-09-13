<?php

namespace App\Http\Controllers;

use App\Http\Requests\Data as RequestsData;
use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Data::all();
        return view('pages.inputdata.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsData $request)
    {
        $data = $request->validated();
        // dd($data);
        Data::create([
            'nik' => $data['nik'],
            'nama_ktp' => $data['nama_ktp'],
            'alamat' => $data['alamat'],
            'kecamatan' => $data['kecamatan'],
            'desa' => $data['desa'],
            'nomor_tps' => $data['nomor_tps'],
        ]);

        return redirect()->route('data.index')->with('success', 'Data berhasil disimpan');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Data $data)
    {
        //
    }

    public function search(Request $request)
    {

        $search = $request->search;
        dd($search);
        $data = Data::where(function($query) use ($search){
            
            $query->where('nik', 'like', "%$search%")
            ->orWhere('nama_ktp', 'like', "%$search%");
        })
        ->get();
        
        return view('pages.inputdata.index', compact('data','search'));

    }
}
