@extends('layouts.app')
@section('title', 'Tambah Obat')

@section('content')
<style>
    .form-container {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 650px;
        margin: 20px auto 50px auto;
    }

    h3 {
        text-align: center;
        color: #7d5fff;
        font-weight: 600;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        color: #555;
    }

    .form-control, .form-select {
        border: 2px solid #c6a9ff;
        border-radius: 10px;
        box-shadow: none;
    }

    .form-control:focus, .form-select:focus {
        border-color: #7d5fff;
        box-shadow: 0 0 5px rgba(125, 95, 255, 0.3);
    }

    .btn-primary {
        background-color: #7d5fff;
        border-color: #7d5fff;
        border-radius: 10px;
        font-weight: 500;
    }

    .btn-primary:hover {
        background-color: #6c4fe0;
    }

    .btn-outline-secondary {
        border-radius: 10px;
    }
</style>

<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <!-- Judul di luar form -->
    <div class="text-center mb-4">
        <h3>Tambah Obat</h3>
    </div>

    <div class="form-container">
        <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" class="form-control" placeholder="Masukkan nama obat" required>
                @error('nama_obat')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" id="category_id" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="supplier_id" class="form-label">Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-select" required>
                    <option value="">Pilih Supplier</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Obat</label>
                <select name="jenis" id="jenis" class="form-select" required>
                    <option value="">Pilih Jenis</option>
                    <option value="Tablet">Tablet</option>
                    <option value="Kapsul">Kapsul</option>
                    <option value="Sirup">Sirup</option>
                    <option value="Salep">Salep</option>
                    <option value="Suppositoria">Suppositoria</option>
                    <option value="Injeksi">Injeksi</option>
                </select>
                @error('jenis')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi obat"></textarea>
                @error('deskripsi')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga obat" required>
                @error('harga')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok_obat" class="form-label">Stok Obat</label>
                <input type="number" name="stok_obat" id="stok_obat" class="form-control" placeholder="Masukkan jumlah stok" required>
                @error('stok_obat')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kedaluwarsa" class="form-label">Tanggal Kedaluwarsa</label>
                <input type="date" name="kedaluwarsa" id="kedaluwarsa" class="form-control" required>
                @error('kedaluwarsa')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="foto" class="form-label">Foto Obat</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @error('foto')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>

                <a href="{{ route('obat.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
