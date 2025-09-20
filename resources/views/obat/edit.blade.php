@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Obat</h3>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('obat.update', $obat->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" id="nama_obat" name="nama_obat" value="{{ old('nama_obat') ?? $obat->nama_obat }}" />
                        @error('nama_obat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Pilih kategori</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nama }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="supplier_id" class="form-label">Supplier</label>
                        <select name="supplier_id" id="supplier_id" class="form-select">
                            <option value="">Pilih Supplier</option>
                            @foreach ($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                            @endforeach
                        </select>
                        @error('supplier_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control" required>
                            <option value="">Pilih Jenis Obat</option>
                            <option value="Tablet">Tablet</option>
                            <option value="Kapsul">Kapsul</option>
                            <option value="Sirup">Sirup</option>
                            <option value="Salep">Salep</option>
                            <option value="Injeksi">Injeksi</option>
                        </select>
                        @error('jenis')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') ?? $obat->deskripsi }}" />
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga') ?? $obat->harga }}" />
                        @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="stok_obat">Stok Obat</label>
                        <input type="number" class="form-control @error('stok_obat') is-invalid @enderror" id="stok_obat" name="stok_obat" value="{{ old('stok_obat') ?? $obat->stok_obat }}" />
                        @error('stok_obat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="kedaluwarsa">Kedaluwarsa</label>
                        <input type="date" class="form-control @error('kedaluwarsa') is-invalid @enderror" id="kedaluwarsa" name="kedaluwarsa" value="{{ old('kedaluwarsa') ?? $obat->kedaluwarsa }}" />
                        @error('kedaluwarsa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ old('foto') ?? $obat->foto }}" />
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>

                            <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
