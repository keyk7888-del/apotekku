@extends('layouts.app')
@section('title', 'Detail Supplier')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #e3f2fd, #f8f9fa);">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Judul Tengah -->
            <h4 class="text-center fw-bold mb-4 text-primary">
                <i class="ti ti-truck me-2"></i> Detail Supplier
            </h4>

            <!-- Card Transparan -->
            <div class="card shadow-lg border-0 rounded-4" 
                 style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(15px);">
                <div class="card-body p-4">

                    <table class="table table-borderless align-middle text-dark">
                        <tbody>
                            <tr>
                                <th width="30%" class="text-secondary">ID</th>
                                <td width="10px">:</td>
                                <td>{{ $suppliers->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama</th>
                                <td>:</td>
                                <td>{{ $suppliers->nama }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Alamat</th>
                                <td>:</td>
                                <td>{{ $suppliers->alamat }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">No. Telepon</th>
                                <td>:</td>
                                <td>{{ $suppliers->no_telp }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Email</th>
                                <td>:</td>
                                <td>{{ $suppliers->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Kontak Person</th>
                                <td>:</td>
                                <td>{{ $suppliers->kontak_person }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Keterangan</th>
                                <td>:</td>
                                <td>{{ $suppliers->keterangan ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Dibuat pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($suppliers->created_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Diperbarui pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($suppliers->updated_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Tombol Bawah -->
                    <div class="text-start mt-4">
                        <a href="{{ route('suppliers.index') }}" 
                           class="btn rounded-pill shadow-sm border border-secondary bg-transparent text-secondary px-4 me-2">
                            <i class="ti ti-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('suppliers.edit', $suppliers->id) }}" 
                           class="btn rounded-pill shadow-sm border border-primary bg-transparent text-primary px-4">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<style>
    body {
        background-color: #e3f2fd;
    }
    .table th, .table td {
        color: #2c3e50;
    }
    .table tr:hover td {
        background: rgba(255, 255, 255, 0.2) !important;
    }
    .btn {
        transition: all 0.2s ease-in-out;
    }
    .btn:hover {
        transform: scale(1.03);
    }
</style>
@endsection
