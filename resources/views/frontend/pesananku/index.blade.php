@extends('layouts.frontend')

@section('content')
<div class="container mt-4">
    <h3 class="mb-4 text-black">📑 Riwayat Pesanan</h3>

    {{-- Jika error --}}
    @if(session('error'))
        <div class="alert alert-info">{{ session('error') }}</div>
    @endif

    {{-- Jika ada data pesanan --}}
    @isset($pesanan)
        @if($pesanan->isEmpty())
            <div class="alert alert-warning">Tidak ada pesanan ditemukan.</div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover table-sm text-center align-middle" id="obatTable">
                    <thead class="table-success">
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
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $order->nomor_transaksi }}</td>
                                <td>{{ $order->nama_lengkap }}</td>
                                <td>{{ $order->produk }}</td>
                                <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</td>
                                <td>{{ $order->metode_pembayaran }}</td>
                                <td>
                                    <a href="{{ route('pesananku.show', $order->id) }}" class="btn btn-sm btn-outline-primary" title="Detail">
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
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">

    <style>
        /* 🔽 Perkecil tabel */
        #obatTable.table-sm td, 
        #obatTable.table-sm th {
            padding: 6px 10px !important; /* lebih rapat */
            font-size: 13px;              /* font lebih kecil */
            vertical-align: middle;       /* teks pas di tengah */
        }

        /* 🔽 Supaya tombol lebih kecil dan sejajar */
        #obatTable .btn {
            padding: 4px 8px;
            font-size: 12px;
        }

        /* 🔽 Header tabel biar rapi */
        #obatTable thead th {
            text-align: center;
            vertical-align: middle;
        }

        .text-purple { color: #7c7db6; } /* ungu untuk detail */
    </style>
@endpush
