@extends('layouts.frontend')

@section('content')
<style>
    /* 🌈 Background halaman */
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* 🌤️ Kontainer utama transparan */
    .transparent-container {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
    }

    .alert-success {
        background: rgba(255, 255, 255, 0.5);
        border: none;
        color: #007b55;
        font-weight: 600;
        backdrop-filter: blur(8px);
    }

    h4, h5 {
        color: #004f8c;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    table {
        color: #004f8c;
    }

    .table-light {
        background: rgba(255, 255, 255, 0.8);
    }

    .table-striped > tbody > tr:nth-of-type(odd) {
        background: rgba(255, 255, 255, 0.5);
    }

    .table-success {
        background: rgba(220, 255, 220, 0.6) !important;
    }

    .badge {
        border-radius: 10px;
        font-size: 12px;
        background-color: #1888b8;
    }

    .btn-outline-secondary, .btn-success {
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-outline-secondary:hover {
        background-color: #004f8c;
        color: white;
    }

    .btn-dark:hover {
        background-color: #2e3b85;
        transform: scale(1.03);
    }

    .card {
        background: rgba(255, 255, 255, 0.4);
        border: none;
        border-radius: 18px;
        backdrop-filter: blur(6px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .text-muted {
        color: #556 !important;
    }
</style>

<div class="container py-5">
    <div class="transparent-container">

        <div class="text-center mb-5">
            <div class="alert alert-success d-inline-flex align-items-center shadow-sm rounded-3 px-4 py-3">
                <h4 class="mb-0 fw-bold">
                    ✅ Pesanan Anda Berhasil!
                </h4>
            </div>
            <p class="mt-2 text-muted">Terima kasih, pesanan Anda sudah kami terima dan sedang diproses. 💚</p>
        </div>

        <div class="card">
            <div class="card-body p-4">
                <h4>📋 Detail Pesanan</h4>
                <table class="table table-borderless mb-4">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 220px;">Nomor Transaksi :</td>
                            <td>{{ $nomor_transaksi }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Tanggal Transaksi :</td>
                            <td>{{ $tanggal_transaksi }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nama Lengkap :</td>
                            <td>{{ $nama }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Nomor Telepon :</td>
                            <td>{{ $telepon }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Alamat Lengkap :</td>
                            <td>{{ $alamat }}</td>
                        </tr>
                    </tbody>
                </table>

                <h5 class="fw-bold mb-3">🛒 Produk Dipesan</h5>
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $item)
                        <tr>
                            <td>{{ $item['nama_obat'] }}</td>
                            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                            <td>{{ $item['jumlah'] }}</td>
                            <td class="text-end">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        
                        <tr>
                            <td colspan="3"><strong>Subtotal</strong></td>
                            <td class="text-end">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>

                        <tr>
                            <td colspan="3" class="fw-bold">Pengiriman</td>
                            <td class="text-end text-success">Gratis</td>
                        </tr>
                        <tr class="table-success">
                            <td colspan="3" class="fw-bold fs-5">Total</td>
                            <td class="text-end fw-bold fs-5 text-danger">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="fw-bold">Metode Pembayaran</td>
                            <td class="text-end">
                                <span class="badge px-3 py-2">{{ strtoupper($metode_pembayaran) }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="text-center mt-4">
                    <a href="{{ route('obatshop.index') }}" class="btn btn-outline-secondary me-2">
                        ⬅ Kembali
                    </a>

                    <a href="{{ route('pesananku.index') }}" class="btn btn-dark">
                        <i class="bi bi-receipt"></i> Lihat Pesanan Saya
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
