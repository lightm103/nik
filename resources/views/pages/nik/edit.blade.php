@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Data NIK</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('nik.update', $nik->id) }}" method="POST" id="editdata" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="mb-3">
                            <label for="nomorNIK" class="form-label">No. NIK</label>
                            <input type="text" class="form-control" name="no_nik" id="nomorNIK"
                                value="{{ $nik->no_nik }}">
                        </div>
                        <div class="mb-3">
                            <label for="namaKTP" class="form-label">Nama KTP</label>
                            <input type="text" class="form-control" name="nama_ktp" id="namaKTP"
                                value="{{ $nik->nama_ktp }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ $nik->alamat }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" class="form-control" name="kecamatan" id="kecamatan"
                                value="{{ $nik->kecamatan }}">
                        </div>
                        <div class="mb-3">
                            <label for="desa" class="form-label">Desa</label>
                            <input type="text" class="form-control" name="desa" id="desa" value="{{ $nik->desa }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomorTPS" class="form-label">Nomer TPS</label>
                            <input type="text" class="form-control" name="no_tps" id="nomorTPS"
                                value="{{ $nik->no_tps }}">
                        </div>
                    </div>
                    <button type="submit" form="editdata" class="btn btn-primary" id="updateButton">Update</button>
                    <!-- Tambahkan tombol Kembali di sini -->
                    <a href="javascript:void(0);" class="btn btn-secondary" id="backButton">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let formChanged = false;

    // Function to show confirmation dialog when leaving the page
    function confirmLeave() {
        if (formChanged) {
            Swal.fire({
                title: 'Anda akan meninggalkan halaman tanpa menyimpan perubahan.',
                text: 'Lanjutkan?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Lanjutkan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.removeEventListener('beforeunload', confirmLeave);
                    window.location.href = '{{ route("nik.index") }}';
                }
            });
        } else {
            // Jika form tidak berubah, langsung arahkan ke halaman indeks
            window.location.href = '{{ route("nik.index") }}';
        }
    }

    // Listen for form changes
    document.getElementById('editdata').addEventListener('input', function() {
        formChanged = true;
    });

    // Attach the confirmation dialog to the Kembali button
    document.getElementById('backButton').addEventListener('click', function() {
        confirmLeave();
    });

    // Attach the confirmation dialog to the window's beforeunload event
    window.addEventListener('beforeunload', confirmLeave);
</script>
@endsection