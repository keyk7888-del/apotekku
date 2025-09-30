@extends('layouts.app')
@section('title', 'Detail Pesanan')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-title">Detail Pesanan</h3>
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <td width="10px">:</td>
                        <td>{{ $pesanan->id }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Transaksi</th>
                        <td>:</td>
                        <td>{{ $pesanan->nomor_transaksi }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($pesanan->tanggal_transaksi)->isoFormat('DD/MM/Y HH:mm') }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap</th>
                        <td>:</td>
                        <td>{{ $pesanan->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>:</td>
                        <td>{{ $pesanan->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Lengkap</th>
                        <td>:</td>
                        <td>{{ $pesanan->alamat_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Produk</th>
                        <td>:</td>
                        <td>{{ $pesanan->produk }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>:</td>
                        <td>Rp {{ number_format($pesanan->harga, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>:</td>
                        <td>{{ $pesanan->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Subtotal</th>
                        <td>:</td>
                        <td>Rp {{ number_format($pesanan->subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Metode Pembayaran</th>
                        <td>:</td>
                        <td>{{ $pesanan->metode_pembayaran }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat pada</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($pesanan->created_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                    </tr>
                    <tr>
                        <th>Diperbarui pada</th>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($pesanan->updated_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span>
                    Kembali
                </a>

            </div>
        </div>
    </div>
@endsection
