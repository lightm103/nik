@if ($niks->count() > 0)
    <h2>Hasil Pencarian</h2>
    <ul>
        @foreach ($niks as $nik)
            <li>{{ $nik->no_nik }} - {{ $nik->nama_ktp }}</li>
            <!-- Tambahkan elemen HTML atau data lain yang ingin Anda tampilkan -->
        @endforeach
    </ul>
    {{ $niks->links() }} <!-- Menampilkan navigasi halaman jika menggunakan paginasi -->
@else
    <p>Tidak ada hasil yang ditemukan.</p>
@endif
