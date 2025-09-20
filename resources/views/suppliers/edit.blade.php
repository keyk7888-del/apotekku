@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Edit Supplier</h3>
        <a href="{{ Route('suppliers.index') }}">Kembali</a>

        <div class="row">
            <div class="col-md-6">
            <div class="card card-body">
            <form action="{{ route('suppliers.update', $suppliers->id) }}" method="POST">
            @csrf
            @method('PUT')

                <div class="form-group mb-3">
                    <label for="nama" class="form-label">Nama </label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $suppliers->nama }}" />
                    @error('nama')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') ?? $suppliers->alamat }}" />
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="no_telp" class="form-label">No Telp</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') ?? $suppliers->no_telp }}" />
                    @error('no_telp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $suppliers->email }}" />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="kontak_person" class="form-label">Kontak Person</label>
                    <input type="text" class="form-control @error('kontak_person') is-invalid @enderror" id="kontak_person" name="kontak_person" value="{{ old('kontak_person') ?? $suppliers->kontak_person }}" />
                    @error('kontak_person')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" value="{{ old('keterangan') ?? $suppliers->keterangan }}" />
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex">
                    <button type="submit" class="btn btn-primary">
                        <span class="ti ti-send me-1"></span>
                        Simpan
                    </button>

                    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection