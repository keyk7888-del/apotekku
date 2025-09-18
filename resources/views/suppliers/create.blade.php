@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Suppliers</h3>
        <a href="{{ Route('suppliers.index') }}">Kembali</a>

            <div class="row">
                <div class="col-md-6">
                <div class="card card-body">
                <form action="{{ route('suppliers.store') }}" method="POST">
                @csrf

            <div class="form-group mb-3">
                <label for="">Nama </label>
                <input type="text" name="nama" id="nama" class="form-control"/>
                @error('nama')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control"/>
                @error('alamat')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">No Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control"/>
                @error('no_telp')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control"/>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Kontak Person</label>
                <input type="text" name="kontak_person" id="kontak_person" class="form-control"/>
                @error('kontak_person')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="">Keterangan</label>
                <input type="text" name="keterangan" id="keterangan" class="form-control"/>
                @error('keterangan')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

        
            <div class="flex">
                <button type="submit" class="btn btn-primary">
                    <span class="ti ti-send me-1"></span>
                        Simpan
                </button>

                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection