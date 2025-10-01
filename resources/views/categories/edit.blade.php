@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Kategori</h3>
        <a href="{{ Route('category.index') }}">Kembali</a>

        <div class="row">
            <div class="col-md-6">
            <div class="card card-body">
            <form action="{{ route('category.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama </label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $categories->nama }}" />
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" value="{{ old('deskripsi') ?? $categories->deskripsi }}" />
                    @error('deskripsi')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" />
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                    {{-- Tampilkan foto lama biar admin tahu --}}
                    @if ($categories->foto)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $categories->foto) }}" width="120" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <div class="flex">
                    <button type="submit" class="btn btn-primary">
                        <span class="ti ti-send me-1"></span>
                        Simpan
                    </button>

                    <a href="{{ route('category.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection