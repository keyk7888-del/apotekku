@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary">
                    <i class="fas fa-truck me-2"></i> Data Supplier
                </h3>
                <a href="{{ route('suppliers.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="fas fa-plus me-2"></i> Tambah Supplier
                </a>
            </div>

            <!-- Card -->
            <div class="card border-0 shadow-lg rounded-4 bg-white bg-opacity-75">
                <div class="card-body">

                    <!-- Search Bar -->
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="text" id="searchInput" 
                               class="form-control w-25 rounded-pill shadow-sm" 
                               placeholder="🔍 Cari Supplier...">
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center" id="supplierTable">
                            <thead class="table-primary">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($suppliers->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-muted py-4">Belum ada data supplier</td>
                                    </tr>
                                @endif
                                @foreach($suppliers as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <!-- Detail -->
                                            <a href="{{ route('suppliers.show', $item->id) }}" 
                                               class="btn btn-sm rounded-circle shadow-sm" title="Detail">
                                                <i class="fas fa-eye text-purple"></i>
                                            </a>
                                            <!-- Edit -->
                                            <a href="{{ route('suppliers.edit', $item->id) }}" 
                                               class="btn btn-sm rounded-circle shadow-sm" title="Edit">
                                                <i class="fas fa-edit text-green"></i>
                                            </a>
                                            <!-- Hapus -->
                                            <a href="javascript:;" 
                                               class="btn btn-sm rounded-circle shadow-sm" title="Hapus" 
                                               onclick="actionDelete('{{ route('suppliers.destroy', $item->id) }}')">
                                                <i class="fas fa-trash text-red"></i>
                                            </a>
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
</div>

<!-- Form Delete -->
<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">
<style>
    .text-purple { color: #7c7db6; } /* ungu untuk detail */
    .text-green { color: #68be96; }  /* hijau untuk edit */
    .text-red { color: #B22222; }    /* merah untuk hapus */

    /* Hover halus untuk baris tabel */
    .table tbody tr:hover {
        background-color: #f1f5fb !important;
        transition: 0.2s ease-in-out;
    }

    /* Efek pada ikon aksi */
    .btn-sm i {
        transition: transform 0.2s ease;
    }

    .btn-sm i:hover {
        transform: scale(1.2);
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
<script>
    // Hapus dengan SweetAlert
    function actionDelete(url){
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Data supplier ini akan dihapus dan tidak dapat dikembalikan!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result)=>{
            if (result.isConfirmed) {
                $('#form-delete').attr('action', url);
                $('#form-delete').submit();
            }
        });
    }

    // 🔍 Pencarian
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#supplierTable tbody tr");
        rows.forEach(function(row) {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });
</script>

@if(Session::has('success'))
<script>
Swal.fire({
    icon: 'success',
    title: 'Berhasil',
    text: '{{ Session::get('success') }}',
    showConfirmButton: false,
    timer: 1200
});
</script>
@endif
@endpush
