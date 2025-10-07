@extends('layouts.app')
@section('title', 'Detail Admin')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #e3f2fd, #f8f9fa);">
    <div class="row justify-content-center">
        <!-- Judul di Tengah -->
        <div class="col-lg-8 text-center mb-4">
            <h4 class="fw-bold text-primary">
                <i class="fas fa-user-shield me-2"></i> Detail Admin
            </h4>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-lg border-0 rounded-4 bg-white bg-opacity-75 backdrop-blur">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle">
                            <tr>
                                <th width="30%" class="text-secondary">ID</th>
                                <td width="10px">:</td>
                                <td class="fw-semibold text-dark">{{ $admin->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama</th>
                                <td>:</td>
                                <td class="fw-semibold text-dark">{{ $admin->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Email</th>
                                <td>:</td>
                                <td class="fw-semibold text-dark">{{ $admin->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Dibuat pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($admin->created_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Diperbarui pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($admin->updated_at)->isoFormat('DD MMMM Y - HH:mm') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Tombol di kiri bawah -->
                <div class="card-footer d-flex justify-content-start gap-2 rounded-bottom-4">
                    <a href="{{ route('admin.index') }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
