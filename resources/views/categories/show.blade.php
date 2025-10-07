@extends('layouts.app')
@section('title', 'Detail Kategori')

@section('content')
<div class="container-fluid py-4" 
     style="background: linear-gradient(135deg, #cfe9ff, #f8f9fa); min-height: 100vh;">
    <div class="row justify-content-center">

        <!-- Judul di Tengah -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-tags me-2"></i> Detail Kategori
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
                                <td class="fw-semibold text-dark">{{ $categories->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama Kategori</th>
                                <td>:</td>
                                <td class="fw-semibold text-dark">{{ $categories->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Deskripsi</th>
                                <td>:</td>
                                <td>{{ $categories->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Foto</th>
                                <td>:</td>
                                <td>
                                    @if($categories->foto)
                                        <img src="{{ asset('storage/images/' . $categories->foto) }}" 
                                             alt="{{ $categories->nama }}" width="150"
                                             style="border-radius:10px; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" 
                                             alt="Tidak ada foto" width="150"
                                             style="border-radius:10px; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Dibuat pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($categories->created_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Diperbarui pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($categories->updated_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Tombol di kiri bawah -->
                <div class="card-footer d-flex justify-content-start gap-2 rounded-bottom-4 bg-transparent border-0">
                    <a href="{{ route('category.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                    <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-primary rounded-pill shadow-sm">
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
