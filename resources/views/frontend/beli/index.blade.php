@extends('layouts.frontend')

@section('content')
<div class="container py-5" style="background-color: #bfd4d4;">
    <h4 class="mb-4 fw-bold text-uppercase text-center">Pengiriman dan Pembayaran</h4>

    <div class="row g-4">
        <!-- Form alamat -->
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-3">
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
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-body p-4 small">
                    <h6 class="fw-bold mb-3 text-uppercase">Pesanan Anda</h6>
                    <table class="table table-sm align-middle">
                        <thead class="table-light">
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
@endsection
