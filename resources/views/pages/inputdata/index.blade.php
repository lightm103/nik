@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="ti ti-md ti-square-plus me-1 fs-4"></i>Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ route('data.search') }}" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" placeholder="Cari NIK">
                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                    <h4 class="card-title mb-3">Data NIK & TPS</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered text-center">
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama_ktp }}</td>
                                        <td>{{ $item->nomor_tps }}</td>
                                        <td>
                                            <div class="action-btn d-flex align-items-center justify-content-center">
                                                <a class="text-light btn btn-primary mx-1" href="#">
                                                    <i class="ti ti-edit fs-5">Edit</i>
                                                </a>
                                                <a class="text-light btn btn-secondary mx-1" href="#">
                                                    <i class="ti ti-eye fs-5">Show</i>
                                                </a>
                                                <form class="" action="#" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-icon mx-1" type="submit"
                                                        data-bs-toggle="tooltip" data-bs-offset="0,4"
                                                        data-bs-placement="top" data-bs-html="true" title="Hapus User">
                                                        <i class="ti ti-trash fs-5">Delete</i>
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
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kendaraan Dinas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data.store') }}" method="POST" id="tambahdata" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="nomorNIK" class="form-label">No. NIK</label>
                                <input type="text" class="form-control" name="nik" id="nomorNIK"
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
                                <input type="text" class="form-control" name="nomor_tps" id="nomorTPS"
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

    {{-- show modal --}}
    {{-- end show modal --}}


    {{-- ajax --}}
@endsection
