@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="text-white mb-4">Tambah Kategori</h3>

    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card card-body" style="background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                    
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label text-white">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control bg-transparent text-white border-light" placeholder="Masukkan nama kategori" />
                        @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="deskripsi" class="form-label text-white">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control bg-transparent text-white border-light" rows="3" placeholder="Masukkan deskripsi kategori"></textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="foto" class="form-label text-white">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control bg-transparent text-white border-light" />
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-outline-light">
                            <span class="ti ti-send me-1"></span>
                            Simpan
                        </button>
                        <a href="{{ route('category.index') }}" class="btn btn-outline-light">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
