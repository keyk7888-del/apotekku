@extends('layouts.app')
@section('title', 'Detail Pesanan')

@section('content')
<div class="container-fluid py-4" style="background: linear-gradient(135deg, #e3f2fd, #f8f9fa);">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Judul Tengah -->
            <h3 class="text-center fw-bold text-primary mb-4">
                📦 Detail Pesanan
            </h3>

            <!-- Card Transparan -->
            <div class="card shadow-lg border-0 rounded-4" 
                 style="background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(15px);">
                <div class="card-body p-4">
                    <table class="table table-borderless align-middle text-dark">
                        <tbody>
                            <tr>
                                <th width="30%" class="text-secondary">ID</th>
                                <td width="10px">:</td>
                                <td>{{ $pesanan->id }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nomor Transaksi</th>
                                <td>:</td>
                                <td>{{ $pesanan->nomor_transaksi }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Tanggal Transaksi</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_transaksi)->timezone('Asia/Jakarta')->isoFormat('DD/MM/Y HH:mm') }} WIB</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nama Lengkap</th>
                                <td>:</td>
                                <td>{{ $pesanan->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Nomor Telepon</th>
                                <td>:</td>
                                <td>{{ $pesanan->nomor_telepon }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Alamat Lengkap</th>
                                <td>:</td>
                                <td>{{ $pesanan->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Produk</th>
                                <td>:</td>
                                <td>{{ $pesanan->produk }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Harga</th>
                                <td>:</td>
                                <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Jumlah</th>
                                <td>:</td>
                                <td>{{ $pesanan->jumlah }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Subtotal</th>
                                <td>:</td>
                                <td>Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Metode Pembayaran</th>
                                <td>:</td>
                                <td>
                                    <span class="badge bg-success bg-opacity-75 px-3 py-2">
                                        {{ strtoupper($pesanan->metode_pembayaran) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Dibuat Pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($pesanan->created_at)->timezone('Asia/Jakarta')->isoFormat('DD/MM/Y HH:mm') }} WIB</td>
                            </tr>
                            <tr>
                                <th class="text-secondary">Diperbarui Pada</th>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($pesanan->updated_at)->timezone('Asia/Jakarta')->isoFormat('DD/MM/Y HH:mm') }} WIB</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Bawah Tengah -->
                <div class="card-footer text-center bg-transparent border-0">
                    <a href="{{ route('pesanan.index') }}" 
                       class="btn rounded-pill shadow-sm border border-primary bg-transparent text-primary px-4 mt-3">
                        ⬅ Kembali ke Daftar Pesanan
                    </a>
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
