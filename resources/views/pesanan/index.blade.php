@extends('layouts.app')
@section('title', 'Daftar Pesanan')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-bold text-primary mb-0">🧾 Daftar Pesanan</h3>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body">
            <!-- 🔍 Pencarian -->
            <input type="text" id="searchInput" class="form-control w-25 mb-3" placeholder="🔍 Cari Pesanan...">

            <!-- 🧾 Tabel Pesanan -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm text-center align-middle" id="pesananTable">
                    <thead class="table-primary text-dark">
                        <tr>
                            <th>No</th>
                            <th>Nomor Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Produk</th>
                            <th>Metode Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanan as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nomor_transaksi }}</td>
                            <td>{{ \Carbon\Carbon::parse($row->created_at)->timezone('Asia/Jakarta')->translatedFormat('d-m-Y H:i') }}</td>
                            <td>{{ $row->nama_lengkap }}</td>
                            <td>{{ $row->alamat_lengkap }}</td>
                            <td>{{ $row->produk }}</td>
                            <td>{{ strtoupper($row->metode_pembayaran) }}</td>
                            <td>
                                <a href="{{ route('pesanan.show', $row->id) }}" class="btn btn-sm btn-outline-primary" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger" 
                                    title="Hapus" 
                                    onclick="actionDelete('{{ route('pesanan.destroy', $row->id) }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-muted py-3">Belum ada pesanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- 🔒 Form Hapus -->
<form id="form-delete" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">

<style>
    #pesananTable.table-sm td, 
    #pesananTable.table-sm th {
        padding: 6px 10px !important;
        font-size: 13px;
    }

    #pesananTable .btn {
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 6px;
    }

    #pesananTable thead th {
        vertical-align: middle;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<script>
    // 🔍 Fitur Pencarian Manual
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        document.querySelectorAll("#pesananTable tbody tr").forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(value) ? "" : "none";
        });
    });

    // ⚠️ Konfirmasi Hapus
    function actionDelete(url) {
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                const form = document.getElementById('form-delete');
                form.action = url;
                form.submit();
            }
        });
    }

    // ✅ Notifikasi Berhasil
    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ Session::get('success') }}',
        timer: 1500,
        showConfirmButton: false
    });
    @endif
</script>
@endpush
