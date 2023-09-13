@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Detail Data NIK</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="nomorNIK" class="form-label">No. NIK</label>
                    <input type="text" class="form-control" value="{{ $nik->no_nik }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="namaKTP" class="form-label">Nama KTP</label>
                    <input type="text" class="form-control" value="{{ $nik->nama_ktp }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" rows="3" readonly>{{ $nik->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="kecamatan" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control" value="{{ $nik->kecamatan }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="desa" class="form-label">Desa</label>
                    <input type="text" class="form-control" value="{{ $nik->desa }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nomorTPS" class="form-label">Nomer TPS</label>
                    <input type="text" class="form-control" value="{{ $nik->no_tps }}" readonly>
                </div>
                <a href="{{ route('nik.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
