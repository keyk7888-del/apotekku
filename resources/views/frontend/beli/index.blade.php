@extends('layouts.frontend')

@section('content')
<div class="container py-5" style="background-color: #bfd4d4; padding:20px;">
    <h2 class="mb-4 fw-bold">PENGIRIMAN DAN PEMBAYARAN</h2>

    <div class="row">
        <!-- Form alamat -->
        <div class="col-md-6">
            <h5 class="fw-bold mb-3">DETAIL PENGIRIMAN</h5>
            <form action="{{ route('beli.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon" required>
                </div>

                <h5 class="fw-bold mt-4 mb-3">Metode Pembayaran</h5>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" value="transfer" required>
                    <label class="form-check-label">Kartu Debit / Kredit</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" value="paypal">
                    <label class="form-check-label">Paypal</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="metode_pembayaran" value="cod">
                    <label class="form-check-label">Bayar di Tempat (COD)</label>
                </div>

                <button type="submit" class="btn btn-dark mt-4 w-100">BUAT PESANAN</button>
            </form>
        </div>

        <!-- Ringkasan pesanan -->
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="fw-bold mb-3">PESANAN ANDA</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>PRODUK</th>
                            <th class="text-end">SUBTOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keranjang as $item)
                        <tr>
                            <td>{{ $item['nama_obat'] }} x {{ $item['jumlah'] }}</td>
                            <td class="text-end">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>Subtotal</td>
                            <td class="text-end">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Pengiriman</td>
                            <td class="text-end">Gratis</td>
                        </tr>
                        <tr class="fw-bold">
                            <td>Total</td>
                            <td class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
