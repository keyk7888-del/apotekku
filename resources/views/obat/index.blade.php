@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #e3f2fd, #f8f9fa);">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-primary">
                    <i class="fas fa-pills me-2"></i> Data Obat
                </h3>
                <a href="{{ route('obat.create') }}" class="btn btn-primary rounded-pill shadow-sm px-4">
                    <i class="fas fa-plus me-2"></i> Tambah Obat
                </a>
            </div>

            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-4 bg-white bg-opacity-75 backdrop-blur">
                <div class="card-body">

                    <!-- 🔍 Pencarian -->
                    <div class="mb-3 d-flex justify-content-end">
                        <input type="text" id="searchInput" class="form-control w-50 shadow-sm rounded-pill" placeholder="🔍 Cari Obat...">
                    </div>

                    <!-- Tabel -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle text-center mb-0" id="obatTable">
                            <thead class="table-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Kategori</th>
                                    <th>Supplier</th>
                                    <th>Kedaluwarsa</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obat as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_obat }}</td>
                                    <td>{{ $item->category->nama ?? '-' }}</td>
                                    <td>{{ $item->supplier->nama ?? '-' }}</td>
                                    <td>{{ $item->kedaluwarsa }}</td>
                                    <td>
                                        @if($item->foto)
                                            <img src="{{ asset('storage/images/' . $item->foto) }}" 
                                                 alt="obat" 
                                                 width="60" 
                                                 class="rounded-3 shadow-sm border border-light">
                                        @else
                                            <span class="text-muted fst-italic">Tidak Ada Foto</span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Detail -->
                                        <a href="{{ route('obat.show', $item->id) }}" 
                                           class="btn btn-sm rounded-circle bg-light shadow-sm me-2" 
                                           title="Detail">
                                            <i class="fas fa-eye text-primary"></i>
                                        </a>
                                        <!-- Edit -->
                                        <a href="{{ route('obat.edit', $item->id) }}" 
                                           class="btn btn-sm rounded-circle bg-light shadow-sm me-2" 
                                           title="Edit">
                                            <i class="fas fa-edit text-success"></i>
                                        </a>
                                        <!-- Hapus -->
                                        <a href="javascript:;" 
                                           onclick="actionDelete('{{ route('obat.destroy', $item->id) }}')" 
                                           class="btn btn-sm rounded-circle bg-light shadow-sm" 
                                           title="Hapus">
                                            <i class="fas fa-trash text-danger"></i>
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

<!-- Form Hapus -->
<form id="form-delete" action="" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>
@endsection

@push('scripts')
<script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<script type="text/javascript">
    // 🔍 Pencarian
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#obatTable tbody tr");
        rows.forEach(function(row) {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });

    // ❌ Konfirmasi hapus data
    function actionDelete(url){
        Swal.fire({
            title: "Apakah Kamu Yakin?",
            text: "Data yang dihapus tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal",
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
        }).then((result)=>{
            if (result.isConfirmed) {
                $('#form-delete').attr('action', url);
                $('#form-delete').submit();
            }
        });
    }

    // ✅ Notifikasi Berhasil
    @if(Session::has('success'))
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ Session::get('success') }}',
        showConfirmButton: false,
        timer: 1000
    });
    @endif
</script>
@endpush
