@extends('layouts.app')
@section('title', 'Detail Obat')

@section('content')
<div class="container-fluid py-4" 
     style="background: linear-gradient(135deg, #cfe9ff, #f8f9fa); min-height: 100vh;">
    <div class="row justify-content-center">

        <!-- Judul di Tengah -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-capsules me-2"></i> Detail Obat
            </h4>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 glass-card">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle">
                            <tr>
                                <th width="30%" class="text-secondary">ID</th>
                                <td width="10px">:</td>
                                <td class="fw-semibold text-dark">{{ $obat->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama Obat</th>
                                <td>:</td>
                                <td class="fw-semibold text-dark">{{ $obat->nama_obat }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Kategori</th>
                                <td>:</td>
                                <td>{{ $obat->category->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Supplier</th>
                                <td>:</td>
                                <td>{{ $obat->supplier->nama ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Jenis</th>
                                <td>:</td>
                                <td>{{ $obat->jenis }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Deskripsi</th>
                                <td>:</td>
                                <td>{{ $obat->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Harga</th>
                                <td>:</td>
                                <td class="fw-semibold text-dark">Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Stok Obat</th>
                                <td>:</td>
                                <td>{{ $obat->stok_obat }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Kedaluwarsa</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($obat->kedaluwarsa)->isoFormat('DD MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Foto</th>
                                <td>:</td>
                                <td>
                                    <img src="{{ asset('storage/images/' . $obat->foto) }}" 
                                         alt="{{ $obat->nama_obat }}" width="150"
                                         style="border-radius:10px; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Dibuat pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($obat->created_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Diperbarui pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($obat->updated_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Tombol di kiri bawah -->
                <div class="card-footer d-flex justify-content-start gap-2 rounded-bottom-4 bg-transparent border-0">
                    <a href="{{ route('obat.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-primary rounded-pill shadow-sm">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CSS Transparan --}}
<style>
.glass-card {
    background: rgba(255, 255, 255, 0.35); /* putih transparan */
    backdrop-filter: blur(12px); /* efek kaca */
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.4);
    transition: all 0.3s ease;
}

.glass-card:hover {
    background: rgba(255, 255, 255, 0.45);
    box-shadow: 0 6px 25px rgba(0, 0, 0, 0.15);
}

.table th {
    width: 30%;
    color: #555;
}

.table td {
    color: #333;
}
</style>
@endsection
