@extends('layouts.app')
@section('title', 'Edit Supplier')

@section('content')
<div class="container-fluid py-4"
     style="background: linear-gradient(135deg, #cfe9ff, #f8f9fa); min-height: 100vh;">
    <div class="row justify-content-center">

        <!-- Judul -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-edit me-2"></i> Edit Supplier
            </h4>
        </div>

        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-4 glass-card">
                <div class="card-body p-4">
                    <form action="{{ route('suppliers.update', $suppliers->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Supplier -->
                        <div class="form-group mb-3">
                            <label for="nama" class="fw-semibold text-secondary">Nama Supplier</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama', $suppliers->nama) }}" 
                                   placeholder="Masukkan nama supplier">
                            @error('nama')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat" class="fw-semibold text-secondary">Alamat</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('alamat') is-invalid @enderror" 
                                   id="alamat" 
                                   name="alamat" 
                                   value="{{ old('alamat', $suppliers->alamat) }}" 
                                   placeholder="Masukkan alamat supplier">
                            @error('alamat')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div class="form-group mb-3">
                            <label for="no_telp" class="fw-semibold text-secondary">No. Telepon</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('no_telp') is-invalid @enderror" 
                                   id="no_telp" 
                                   name="no_telp" 
                                   value="{{ old('no_telp', $suppliers->no_telp) }}" 
                                   placeholder="Masukkan nomor telepon supplier">
                            @error('no_telp')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="fw-semibold text-secondary">Email</label>
                            <input type="email" 
                                   class="form-control rounded-3 @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $suppliers->email) }}" 
                                   placeholder="Masukkan email supplier">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kontak Person -->
                        <div class="form-group mb-3">
                            <label for="kontak_person" class="fw-semibold text-secondary">Kontak Person</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('kontak_person') is-invalid @enderror" 
                                   id="kontak_person" 
                                   name="kontak_person" 
                                   value="{{ old('kontak_person', $suppliers->kontak_person) }}" 
                                   placeholder="Masukkan kontak person">
                            @error('kontak_person')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group mb-4">
                            <label for="keterangan" class="fw-semibold text-secondary">Keterangan</label>
                            <input type="text" 
                                   class="form-control rounded-3 @error('keterangan') is-invalid @enderror" 
                                   id="keterangan" 
                                   name="keterangan" 
                                   value="{{ old('keterangan', $suppliers->keterangan) }}" 
                                   placeholder="Masukkan keterangan tambahan">
                            @error('keterangan')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
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
