@extends('layouts.frontend')

@section('content')
<style>
    /* 🌈 Background halaman */
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* 🌤️ Kontainer utama transparan lembut */
    .transparent-container {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 0 20px rgba(0,0,0,0.15);
    }

    h4 {
        color: #004f8c;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.4);
    }

    .card {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(6px);
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: scale(1.01);
    }

    .card-body {
        color: #004f8c;
    }

    input.form-control, textarea.form-control {
        background: rgba(255,255,255,0.8);
        border: 1px solid #ccc;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    input.form-control:focus, textarea.form-control:focus {
        background: rgba(255,255,255,1);
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0,123,255,0.3);
    }

    .btn-dark {
        border-radius: 10px;
        background-color: #030d2c;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #1e446d;
        transform: scale(1.02);
    }

    .table {
        color: #004f8c;
    }

    .table th {
        background: rgba(255,255,255,0.8);
    }

    .table td, .table th {
        border: none;
    }

    .text-success {
        color: #2a9d8f !important;
    }
</style>

<div class="container py-5">
    <div class="transparent-container">
        <h4 class="mb-4 text-uppercase">📦 Pengiriman dan Pembayaran 💳</h4>

        <div class="row g-4">
            <!-- Form alamat -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3 text-uppercase">Detail Pengiriman</h6>
                        <form action="{{ route('beli.store') }}" method="POST" class="small">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="nama" class="form-control form-control-sm" placeholder="Nama Lengkap" required>
                            </div>
                            <div class="mb-3">
                                <textarea name="alamat" class="form-control form-control-sm" placeholder="Alamat Lengkap" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="telepon" class="form-control form-control-sm" placeholder="Nomor Telepon" required>
                            </div>

                            <h6 class="fw-bold mt-4 mb-2 text-uppercase">Metode Pembayaran</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="transfer" required>
                                <label class="form-check-label">Kartu Debit / Kredit</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="paypal">
                                <label class="form-check-label">PayPal</label>
                            </div>
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" value="cod">
                                <label class="form-check-label">Bayar di Tempat (COD)</label>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 py-2 fw-semibold small">
                                Buat Pesanan
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Ringkasan pesanan -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body p-4 small">
                        <h6 class="fw-bold mb-3 text-uppercase">Pesanan Anda</h6>
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($keranjang as $item)
                                <tr>
                                    <td>{{ $item['nama_obat'] }} x {{ $item['jumlah'] }}</td>
                                    <td class="text-end">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                                <tr class="fw-semibold">
                                    <td>Subtotal</td>
                                    <td class="text-end">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="fw-semibold">
                                    <td>Pengiriman</td>
                                    <td class="text-end text-success">Gratis</td>
                                </tr>
                                <tr class="fw-bold border-top">
                                    <td>Total</td>
                                    <td class="text-end">Rp {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
