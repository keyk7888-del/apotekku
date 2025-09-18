@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Obat</h3>
    <a href="{{ route('obat.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf

                    <div class="form-group mb-3">
                        <label for="nama_obat">Nama Obat</label>
                        <input type="text" name="nama_obat" id="nama_obat" class="form-control"/>
                        @error('nama_obat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-select">
                            <option value="">Choose Category</option>
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
                            <option value="">Choose Supplier</option>
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
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control"/>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control"/>
                        @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="stok_obat">Stok Obat</label>
                        <input type="number" name="stok_obat" id="stok_obat" class="form-control"/>
                        @error('stok_obat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="kedaluwarsa">Kedaluwarsa</label>
                        <input type="date" name="kedaluwarsa" id="kedaluwarsa" class="form-control"/>
                        @error('kedaluwarsa')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control"/>
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
