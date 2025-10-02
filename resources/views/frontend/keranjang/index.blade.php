@extends('layouts.frontend')

@section('content')
<div class="container my-5" style="background-color: #bfd4d4; padding:20px;">
    <h2 class="mb-4 text-white">🛒 Keranjang Obat</h2>

    @if(session('success'))
        <div class="alert alert-succes">{{ session('success') }}</div>
    @endif

    @if(count($keranjang) > 0)
    <div class="row">
        <!-- Bagian daftar produk -->
        <div class="col-md-8">
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
            <div class="card shadow-lg border-0" style="background-color: #f8fff8;">
                <div class="card-body">
                    <h5 class="card-title text-dark">Ringkasan Pesanan</h5>
                    <hr>
                    <p class="d-flex justify-content-between text-muted">
                        <span>Subtotal:</span> 
                        <strong class="text-dark">Rp {{ number_format($subtotal, 0, ',', '.') }}</strong>
                    </p>
                    <p class="d-flex justify-content-between text-muted">
                        <span>Ongkir:</span> 
                        <strong class="text-dark">Gratis</strong>
                    </p>
                    <hr>
                    <h5 class="d-flex justify-content-between">
                        <span>Total:</span>
                        <span class="text-dark fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </h5>
                    <a href="{{ route('beli.index') }}" class="btn btn-dark w-100">Beli Obat</a>
                </div>
            </div>
        </div>
    </div>
    @else
        <p>Keranjang kosong. <a href="{{ route('obatshop.index') }}">Tambah obat sekarang</a>.</p>
    @endif
</div>
@endsection
