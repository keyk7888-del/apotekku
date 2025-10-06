@extends('layouts.app')

@section('title', 'Daftar Tamu')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #e3f2fd, #f8f9fa);">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Judul di atas ID -->
            <h4 class="text-center mb-4 fw-bold text-primary">
                <i class="fas fa-user me-2"></i> Detail Pelanggan
            </h4>

            <div class="card border-0 shadow-lg rounded-4" 
                 style="background: rgba(255, 255, 255, 0.35); backdrop-filter: blur(15px);">
                <div class="card-body p-4">
                    <table class="table table-borderless align-middle text-dark mb-0">
                        <tr>
                            <th width="30%" class="text-secondary">ID</th>
                            <td width="10px">:</td>
                            <td>{{ $daftarpelanggan->id }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Nama</th>
                            <td>:</td>
                            <td>{{ $daftarpelanggan->nama }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Nomor Telp</th>
                            <td>:</td>
                            <td>{{ $daftarpelanggan->no_telp }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Email</th>
                            <td>:</td>
                            <td>{{ $daftarpelanggan->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Keperluan</th>
                            <td>:</td>
                            <td>{{ $daftarpelanggan->keperluan }}</td>
                        </tr>
                        <tr>
                            <th class="text-secondary">Berkunjung Pada</th>
                            <td>:</td>
                            <td>{{ optional($daftarpelanggan->created_at)->isoFormat('DD MMM Y HH:mm') }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Tombol di bawah -->
                <div class="card-footer text-start border-0" 
                     style="background: rgba(255, 255, 255, 0.25); backdrop-filter: blur(10px);">
                    <a href="{{ route('daftarpelanggan.index') }}" 
                       class="btn btn-outline-secondary rounded-pill shadow-sm bg-transparent border-1 px-4">
                        <i class="fas fa-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
