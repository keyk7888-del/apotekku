@extends('layouts.frontend')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4 text-black">🔎 Detail Pesanan</h3>

    <div class="card shadow-sm border-0" style="background-color:#e8f9f0;"> 
        <div class="card-body">
            <p><strong>Nomor Transaksi:</strong> {{ $pesanan->nomor_transaksi }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($pesanan->tanggal_transaksi)->format('d-m-Y H:i') }}</p>
            <p><strong>Nama:</strong> {{ $pesanan->nama_lengkap }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->alamat_lengkap }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $pesanan->metode_pembayaran }}</p>
        </div>
    </div>

    <h5 class="mt-4 text-black">Produk Pesanan</h5>
    <table class="table table-bordered table-striped">
        <thead class="table-success">
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody style="background-color:#f6fffa;">
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
