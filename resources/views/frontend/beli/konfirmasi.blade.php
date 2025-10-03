@extends('layouts.frontend')

@section('content')
<div class="container py-5" style="background-color: #bfd4d4; padding:20px;">
    <div class="text-center mb-5">
        <div class="alert alert-success d-inline-flex align-items-center shadow-sm rounded-3 px-4 py-3">
            <h4 class="mb-0 fw-bold">
                <i class="bi bi-check-circle-fill me-2"></i>☑️ Pesanan Anda Berhasil!
            </h4>
        </div>
        <p class="mt-2 text-muted">Terima kasih, pesanan Anda sudah kami terima.</p>
    </div>

    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-4 text-primary">📋 Detail Pesanan</h4>
            <table class="table table-borderless mb-4">
                <tbody>
                    <tr>
                        <td class="fw-bold" style="width: 200px;">Nomor Transaksi :</td>
                        <td>{{ $nomor_transaksi }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Tanggal Transaksi :</td>
                        <td>{{ $tanggal_transaksi }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Nama Lengka :</td>
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


            <h5 class="fw-bold mb-3 text-primary">🛒 Produk Dipesan</h5>
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
                        <td class="text-end">Gratis</td>
                    </tr>
                    <tr class="table-success">
                        <td colspan="3" class="fw-bold fs-5">Total</td>
                        <td class="text-end fw-bold fs-5 text-danger">Rp {{ number_format($total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="fw-bold">Metode Pembayaran</td>
                        <td class="text-end">
                            <span class="badge bg-primary px-3 py-2">{{ strtoupper($metode_pembayaran) }}</span>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ route('obatshop.index') }}" class="btn btn-outline-secondary me-2">
                    ⬅ Kembali
                </a>

                <!-- Tombol menuju daftar pesanan -->
                <a href="{{ route('pesananku.index') }}" class="btn btn-success">
                    <i class="bi bi-receipt"></i> Lihat Pesanan Saya
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
