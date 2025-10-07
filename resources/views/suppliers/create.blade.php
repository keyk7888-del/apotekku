@extends('layouts.app')
@section('title', 'Tambah Supplier')

@section('content')
<style>
    .form-container {
        background-color: rgba(255, 255, 255, 0.85);
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        max-width: 600px;
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
        <h3>Tambah Supplier</h3>
    </div>

    <div class="form-container">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Supplier</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama supplier" required>
                @error('nama')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat supplier" required>
                @error('alamat')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" placeholder="Masukkan nomor telepon" required>
                @error('no_telp')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email supplier">
                @error('email')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kontak_person" class="form-label">Kontak Person</label>
                <input type="text" name="kontak_person" id="kontak_person" class="form-control" placeholder="Masukkan nama kontak person">
                @error('kontak_person')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" id="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan tambahan"></textarea>
                @error('keterangan')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>

                <a href="{{ route('suppliers.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
