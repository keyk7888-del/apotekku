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

    h3 {
        color: #004f8c;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
        text-shadow: 1px 1px 2px rgba(255,255,255,0.5);
    }

    .table {
        color: #004f8c;
        background: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        background: rgba(0, 79, 140, 0.85);
        color: white;
    }

    .table tbody tr:hover {
        background: rgba(255,255,255,0.7);
        transform: scale(1.01);
        transition: all 0.2s ease;
    }

    .btn-outline-primary {
        border-radius: 8px;
        border: 1px solid #004f8c;
        color: #004f8c;
        background: transparent;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background-color: #004f8c;
        color: white;
        transform: scale(1.03);
    }

    .alert-info, .alert-warning {
        background: rgba(255, 255, 255, 0.6);
        border: none;
        border-radius: 12px;
        backdrop-filter: blur(6px);
        color: #004f8c;
    }

    #obatTable.table-sm td, 
    #obatTable.table-sm th {
        padding: 8px 10px !important;
        font-size: 13px;
        vertical-align: middle;
    }

    #obatTable thead th {
        text-align: center;
        vertical-align: middle;
    }

    .table-responsive {
        border-radius: 15px;
        overflow: hidden;
    }
</style>

<div class="container py-5">
    <div class="transparent-container">
        <h3>📑 Riwayat Pesanan</h3>

        {{-- Jika error --}}
        @if(session('error'))
            <div class="alert alert-info shadow-sm">{{ session('error') }}</div>
        @endif

        {{-- Jika ada data pesanan --}}
        @isset($pesanan)
            @if($pesanan->isEmpty())
                <div class="alert alert-warning text-center shadow-sm">
                    <i class="bi bi-exclamation-circle"></i> Tidak ada pesanan ditemukan.
                </div>
            @else
                <div class="table-responsive shadow-sm">
                    <table class="table table-bordered table-striped table-hover table-sm text-center align-middle" id="obatTable">
                        <thead>
                            <tr>
                                <th>No</th> 
                                <th>Nomor Transaksi</th>
                                <th>Nama Lengkap</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Subtotal</th>
                                <th>Metode Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->nomor_transaksi }}</td>
                                    <td>{{ $order->nama_lengkap }}</td>
                                    <td>{{ $order->produk }}</td>
                                    <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                    <td>{{ strtoupper($order->metode_pembayaran) }}</td>
                                    <td>
                                        <a href="{{ route('pesananku.show', $order->id) }}" 
                                           class="btn btn-sm btn-outline-primary" 
                                           title="Lihat Detail">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @endisset
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush
