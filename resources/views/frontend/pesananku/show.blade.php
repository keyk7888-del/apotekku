@extends('layouts.frontend')

@section('content')
<style>
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        background: rgba(255, 255, 255, 0.6); /* putih transparan */
        backdrop-filter: blur(10px); /* efek blur kaca */
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    table {
        background: rgba(255, 255, 255, 0.6); /* transparan juga */
        backdrop-filter: blur(6px);
        border-radius: 10px;
        overflow: hidden;
    }

    thead {
        background-color: rgba(200, 255, 230, 0.8) !important;
    }

    .btn-outline-secondary {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(5px);
        border: 1px solid rgba(0,0,0,0.2);
        color: #333;
        transition: 0.3s;
    }

    .btn-outline-secondary:hover {
        background: rgba(255, 255, 255, 0.7);
        color: #000;
    }
</style>

<div class="container mt-4">

    <h3 class="mb-4 text-black">🔎 Detail Pesanan</h3>

    <div class="card shadow-sm border-0 p-3">
        <div class="card-body">
            <p><strong>Nomor Transaksi:</strong> {{ $pesanan->nomor_transaksi }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pesanan->tanggal_transaksi)->format('d-m-Y H:i') }}</p>
            <p><strong>Nama:</strong> {{ $pesanan->nama_lengkap }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->alamat_lengkap }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
        </div>
    </div>

    <h5 class="mt-4 text-black">Produk Pesanan</h5>
    <table class="table table-bordered text-center align-middle">
        <thead class="table-success">
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pesanan->produk }}</td>
                <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                <td>{{ $pesanan->jumlah }}</td>
                <td>Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="text-center mt-4">
        <a href="{{ route('pesananku.index') }}" class="btn btn-outline-secondary me-2">
            ⬅ Kembali
        </a>
    </div>
</div>
@endsection
