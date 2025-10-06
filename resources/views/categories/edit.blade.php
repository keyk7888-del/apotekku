@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3 class="text-center text-primary mb-4">Edit Kategori</h3>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0" style="background-color: transparent;">
                <div class="card-body">
                    <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="nama" class="fw-bold">Nama Kategori</label>
                            <input 
                                type="text" 
                                class="form-control bg-transparent border-primary @error('nama') is-invalid @enderror" 
                                id="nama" 
                                name="nama" 
                                value="{{ old('nama') ?? $categories->nama }}" 
                            />
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="deskripsi" class="fw-bold">Deskripsi</label>
                            <input 
                                type="text" 
                                class="form-control bg-transparent border-primary @error('deskripsi') is-invalid @enderror" 
                                id="deskripsi" 
                                name="deskripsi" 
                                value="{{ old('deskripsi') ?? $categories->deskripsi }}" 
                            />
                            @error('deskripsi')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="foto" class="fw-bold">Foto</label>
                            <input 
                                type="file" 
                                class="form-control bg-transparent border-primary @error('foto') is-invalid @enderror" 
                                id="foto" 
                                name="foto"
                            />
                            @error('foto')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror

                            @if ($categories->foto)
                                <div class="mt-3 text-center">
                                    <img src="{{ asset('storage/' . $categories->foto) }}" width="150" class="img-thumbnail shadow-sm rounded-4">
                                    <p class="text-muted small mt-2">Foto saat ini</p>
                                </div>
                            @endif
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
        </div>
    </div>
</div>
@endsection
