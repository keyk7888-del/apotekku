@extends('layouts.app')
@section('title', 'Edit Kategori')

@section('content')
<div class="container-fluid py-4"
     style="background: linear-gradient(135deg, #cfe9ff, #f8f9fa); min-height: 100vh;">
    <div class="row justify-content-center">

        <!-- Judul -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-edit me-2"></i> Edit Kategori
            </h4>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 glass-card">
                <div class="card-body p-4">
                    <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Kategori -->
                        <div class="form-group mb-3">
                            <label for="nama" class="fw-semibold text-secondary">Nama Kategori</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $categories->nama) }}" 
                                   placeholder="Masukkan nama kategori">
                            @error('nama')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="form-group mb-3">
                            <label for="deskripsi" class="fw-semibold text-secondary">Deskripsi</label>
                            <textarea class="form-control rounded-3 @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3"
                                      placeholder="Tuliskan deskripsi kategori">{{ old('deskripsi', $categories->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Foto -->
                        <div class="form-group mb-4">
                            <label for="foto" class="fw-semibold text-secondary">Foto</label>
                            <input type="file" 
                                   class="form-control rounded-3 @error('foto') is-invalid @enderror" 
                                   id="foto" 
                                   name="foto">
                            @if($categories->foto)
                                <div class="mt-3 text-center">
                                    <img src="{{ asset('storage/images/' . $categories->foto) }}" 
                                         alt="Foto {{ $categories->nama }}" width="150" 
                                         style="border-radius:8px; box-shadow:0 3px 8px rgba(0,0,0,0.15);">
                                    <p class="text-muted small mt-2">Foto saat ini</p>
                                </div>
                            @endif
                            @error('foto')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('category.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
                                Batal
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CSS Transparan --}}
<style>
.glass-card {
    background: rgba(255, 255, 255, 0.35);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.4);
    transition: all 0.3s ease;
}

.glass-card:hover {
    background: rgba(255, 255, 255, 0.45);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

label {
    font-weight: 500;
}

.form-control, .form-select {
    border: 1px solid rgba(0, 0, 0, 0.1);
}

.btn-primary {
    background-color: #0d6efd;
    border: none;
}

.btn-primary:hover {
    background-color: #0b5ed7;
}
</style>
@endsection
