@extends('layouts.app')
@section('title', 'Tambah Admin')

@section('content')
<style>
    .card {
        background: rgba(255, 255, 255, 0.75);
        backdrop-filter: blur(8px);
        border-radius: 15px;
        box-shadow: 0 4px 25px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .page-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .page-header i {
        font-size: 28px;
        color: #003566;
        background: rgba(0, 53, 102, 0.1);
        padding: 10px;
        border-radius: 12px;
    }

    .page-header h3 {
        margin: 0;
        color: #003566;
        font-weight: 700;
    }

    .form-label {
        font-weight: 600;
        color: #1e293b;
    }

    .form-control {
        border-radius: 10px;
        border: 1px solid #cbd5e1;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        border-color: #0096c7;
        box-shadow: 0 0 0 0.2rem rgba(0, 150, 199, 0.25);
    }

    .btn-primary {
        background-color: #003566;
        border: none;
        border-radius: 10px;
        transition: 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        border-radius: 10px;
    }
</style>

<div class="container py-4">
    <div class="col-md-6 mx-auto">
        <div class="page-header">
            <i class="ti ti-user-plus"></i>
            <h3>Tambah Admin</h3>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Admin</label>
                        <input type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               id="name" name="name"
                               placeholder="Masukkan nama admin"
                               value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email"
                               placeholder="Masukkan email admin"
                               value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password"
                               class="form-control"
                               id="password_confirmation"
                               name="password_confirmation"
                               placeholder="Ulangi password">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Kembali
                        </a>

                        <button type="submit" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
