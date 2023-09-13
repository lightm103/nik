@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">Data Kendaraan Dinas</h1>
                <button type="button" class="btn btn-success float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="ti ti-md ti-square-plus me-1 fs-4"></i>Tambah Data
                </button>
                <a href="{{ route('nik.export') }}" class="btn btn-success float-end me-3">
                    <i class="ti ti-md ti-download me-1 fs-4"></i>Unduh Data Excel
                </a>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <form action="{{ route('nik.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari data..." name="query"
                                value="{{ request('query') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary ms-3" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class="card-title mb-3">Data Kendaraan Dinas</h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Nama KTP</th>
                                <th>TPS</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($niks as $nik)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $nik->no_nik }}</td>
                                    <td>{{ $nik->nama_ktp }}</td>
                                    <td>{{ $nik->no_tps }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a class="btn btn-primary" href="{{ route('nik.edit', $nik->id) }}">
                                                <i class="ti ti-edit fs-5"></i>Edit
                                            </a>
                                            <a class="btn btn-secondary" href="{{ route('nik.show', $nik->id) }}">
                                                <i class="ti ti-eye fs-5"></i>Show
                                            </a>
                                            <form action="{{ route('nik.destroy', $nik->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-html="true" title="Hapus User">
                                                    <i class="ti ti-trash fs-5"></i>Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kendaraan Dinas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nik.store') }}" method="POST" id="tambahdata" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="nomorNIK" class="form-label">No. NIK</label>
                                <input type="text" class="form-control" name="no_nik" id="nomorNIK"
                                    placeholder="Masukkan No. NIK">
                            </div>
                            <div class="mb-3">
                                <label for="namaKTP" class="form-label">Nama KTP</label>
                                <input type="text" class="form-control" name="nama_ktp" id="namaKTP"
                                    placeholder="Masukkan Nama KTP">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                                    placeholder="Masukkan Kecamatan">
                            </div>
                            <div class="mb-3">
                                <label for="desa" class="form-label">Desa</label>
                                <input type="text" class="form-control" name="desa" id="desa"
                                    placeholder="Masukkan Desa">
                            </div>
                            <div class="mb-3">
                                <label for="nomorTPS" class="form-label">Nomer TPS</label>
                                <input type="text" class="form-control" name="no_tps" id="nomorTPS"
                                    placeholder="Masukkan Nomer TPS">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="tambahdata" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
