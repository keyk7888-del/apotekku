@extends('layouts.app')
@section('title', 'Edit Obat')

@section('content')
<div class="container-fluid py-4" 
     style="background: linear-gradient(135deg, #cfe9ff, #f8f9fa); min-height: 100vh;">
    <div class="row justify-content-center">

        <!-- Judul -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-edit me-2"></i> Edit Obat
            </h4>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 glass-card">
                <div class="card-body p-4">
                    <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama_obat" class="fw-semibold text-secondary">Nama Obat</label>
                            <input type="text" class="form-control rounded-3 @error('nama_obat') is-invalid @enderror" 
                                   id="nama_obat" name="nama_obat" 
                                   value="{{ old('nama_obat', $obat->nama_obat) }}" placeholder="Masukkan nama obat">
                            @error('nama_obat')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="fw-semibold text-secondary">Kategori</label>
                            <select name="category_id" id="category_id" 
                                    class="form-select rounded-3 @error('category_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" 
                                        {{ $category->id == $obat->category_id ? 'selected' : '' }}>
                                        {{ $category->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplier_id" class="fw-semibold text-secondary">Supplier</label>
                            <select name="supplier_id" id="supplier_id" 
                                    class="form-select rounded-3 @error('supplier_id') is-invalid @enderror">
                                <option value="">-- Pilih Supplier --</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" 
                                        {{ $supplier->id == $obat->supplier_id ? 'selected' : '' }}>
                                        {{ $supplier->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis" class="fw-semibold text-secondary">Jenis</label>
                            <select name="jenis" id="jenis" 
                                    class="form-select rounded-3 @error('jenis') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Obat --</option>
                                @foreach (['Tablet', 'Kapsul', 'Sirup', 'Salep', 'Suppositoria', 'Injeksi'] as $jenis)
                                    <option value="{{ $jenis }}" 
                                        {{ $obat->jenis == $jenis ? 'selected' : '' }}>
                                        {{ $jenis }}
                                    </option>
                                @endforeach
                            </select>
                            @error('jenis')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="fw-semibold text-secondary">Deskripsi</label>
                            <textarea class="form-control rounded-3 @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3"
                                      placeholder="Tuliskan deskripsi obat">{{ old('deskripsi', $obat->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga" class="fw-semibold text-secondary">Harga</label>
                            <input type="number" class="form-control rounded-3 @error('harga') is-invalid @enderror" 
                                   id="harga" name="harga" 
                                   value="{{ old('harga', $obat->harga) }}" placeholder="Masukkan harga obat">
                            @error('harga')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="stok_obat" class="fw-semibold text-secondary">Stok Obat</label>
                            <input type="number" class="form-control rounded-3 @error('stok_obat') is-invalid @enderror" 
                                   id="stok_obat" name="stok_obat" 
                                   value="{{ old('stok_obat', $obat->stok_obat) }}" placeholder="Masukkan stok obat">
                            @error('stok_obat')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="kedaluwarsa" class="fw-semibold text-secondary">Kedaluwarsa</label>
                            <input type="date" class="form-control rounded-3 @error('kedaluwarsa') is-invalid @enderror" 
                                   id="kedaluwarsa" name="kedaluwarsa" 
                                   value="{{ old('kedaluwarsa', $obat->kedaluwarsa) }}">
                            @error('kedaluwarsa')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="foto" class="fw-semibold text-secondary">Foto</label>
                            <input type="file" class="form-control rounded-3 @error('foto') is-invalid @enderror" 
                                   id="foto" name="foto">
                            @if($obat->foto)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/images/' . $obat->foto) }}" 
                                         alt="Foto {{ $obat->nama_obat }}" width="120" 
                                         style="border-radius:8px; box-shadow:0 3px 8px rgba(0,0,0,0.15);">
                                </div>
                            @endif
                            @error('foto')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-start gap-2">
                            <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <a href="{{ route('obat.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm px-4">
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
