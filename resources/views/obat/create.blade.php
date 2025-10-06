@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="text-center text-primary mb-4">Tambah Obat</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0" style="background-color: transparent;">
                <div class="card-body">
                    <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="nama_obat" class="fw-bold">Nama Obat</label>
                            <input type="text" name="nama_obat" id="nama_obat" class="form-control bg-transparent border-primary" />
                            @error('nama_obat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="category_id" class="fw-bold">Kategori</label>
                            <select name="category_id" id="category_id" class="form-select bg-transparent border-primary">
                                <option value="">Pilih Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="supplier_id" class="fw-bold">Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="form-select bg-transparent border-primary">
                                <option value="">Pilih Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                @endforeach
                            </select>
                            @error('supplier_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="jenis" class="fw-bold">Jenis</label>
                            <select name="jenis" id="jenis" class="form-select bg-transparent border-primary" required>
                                <option value="">Pilih Jenis Obat</option>
                                <option value="Tablet">Tablet</option>
                                <option value="Kapsul">Kapsul</option>
                                <option value="Sirup">Sirup</option>
                                <option value="Salep">Salep</option>
                                <option value="Suppositoria">Suppositoria</option>
                                <option value="Injeksi">Injeksi</option>
                            </select>
                            @error('jenis')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="fw-bold">Deskripsi</label>
                            <input type="text" name="deskripsi" id="deskripsi" class="form-control bg-transparent border-primary" />
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga" class="fw-bold">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control bg-transparent border-primary" />
                            @error('harga')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="stok_obat" class="fw-bold">Stok Obat</label>
                            <input type="number" name="stok_obat" id="stok_obat" class="form-control bg-transparent border-primary" />
                            @error('stok_obat')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="kedaluwarsa" class="fw-bold">Kedaluwarsa</label>
                            <input type="date" name="kedaluwarsa" id="kedaluwarsa" class="form-control bg-transparent border-primary" />
                            @error('kedaluwarsa')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="foto" class="fw-bold">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control bg-transparent border-primary" />
                            @error('foto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
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
        </div>
    </div>
</div>
@endsection
