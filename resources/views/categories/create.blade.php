@extends('layouts.app')
@section('title', 'Tambah Kategori')

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

    .btn-secondary {
        border-radius: 10px;
    }
</style>

<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <!-- Judul di luar form -->
    <div class="text-center mb-4">
        <h3>Tambah Kategori</h3>
    </div>

    <div class="form-container">
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama kategori" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi kategori"></textarea>
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" name="photo" class="form-control">
            </div>

             <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary rounded-pill shadow-sm">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>

                <a href="{{ route('category.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                    <i class="fas fa-times me-1"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
