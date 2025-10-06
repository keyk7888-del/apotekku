@extends('layouts.frontend')

@section('content')
<style>
    /* 🌿 Background utama halaman */
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* Container utama dengan efek kaca buram */
    .keranjang-container {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(8px);
        border-radius: 20px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        margin-top: 40px;
    }
    .alert-success {
        background: rgba(144, 238, 144, 0.3);
        border: 1px solid rgba(0, 255, 0, 0.3);
        border-radius: 10px;
    }

    /* Tombol */
    .btn-success {
        background-color: #00b894;
        border: none;
        border-radius: 10px;
        padding: 8px 15px;
    }

    .btn-success:hover {
        background-color: #019875;
    }

    .btn-dark {
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .btn-dark:hover {
        background-color: #2b2168;
    }

    h2 {
        color: #004f8c;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    /* Tabel transparan */
    table {
        background: rgba(255, 255, 255, 0.55);
        backdrop-filter: blur(6px);
        border-radius: 12px;
        overflow: hidden;
    }

    table th {
        background: rgba(0, 79, 140, 0.2);
        color: #004f8c;
        font-weight: 600;
    }

    table td {
        vertical-align: middle;
    }

    .img-thumbnail {
        border-radius: 10px;
    }

    /* Ringkasan Pesanan */
    .card {
        background: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(6px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .card-body {
        color: #004f8c;
    }

    .card-body h5 {
        font-weight: 600;
    }

    hr {
        border-color: rgba(0,0,0,0.1);
    }
</style>
<div class="container my-5" style="background: transparent;">
    
    <h2>🛒 Keranjang Obat</h2>

    @if(session('success'))
        <div class="alert alert-succes">{{ session('success') }}</div>
    @endif

    @if(count($keranjang) > 0)
    <div class="row">
        <!-- Bagian daftar produk -->
        <div class="col-md-8 card card-transparent shadow-lg p-3">
            <div class="mb-3">
                <a href="{{ route('obatshop.index') }}" class="btn btn-outline-success">
                    + Tambah Obat
                </a>
            </div>


            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="text-center">Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keranjang as $id => $item)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/images/'.$item['foto']) }}" alt="{{ $item['nama_obat'] }}" width="70" class="me-3 rounded">
                                <span>{{ $item['nama_obat'] }}</span>
                            </div>
                        </td>
                        <td class="text-secondary">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>
                            <span class="px-3">{{ $item['jumlah'] }}</span>
                        </td>
                        <td class="text-dark">Rp {{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.hapus', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">×</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bagian ringkasan total -->
        <div class="col-md-4">
            <div class="card card-transparent shadow-lg p-3">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Pesanan</h5>
                    <hr>
                    <p class="d-flex justify-content-between text-muted">
                        <span>Subtotal:</span> 
                        <strong>Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </p>
                    <p class="d-flex justify-content-between text-muted">
                        <span>Ongkir:</span> 
                        <strong>Gratis</strong>
                    </p>
                    <hr>
                    <h5 class="d-flex justify-content-between">
                        <span>Total:</span>
                        <span class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </h5>
                    <a href="{{ route('beli.index') }}" class="btn btn-dark w-100 mt-3">Beli Obat</a>
                </div>
        </div>
    </div>
    @else
        <p>Keranjang kosong. <a href="{{ route('obatshop.index') }}">Tambah obat sekarang</a>.</p>
    @endif
</div>
@endsection
