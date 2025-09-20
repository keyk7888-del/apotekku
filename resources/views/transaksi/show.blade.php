@extends('layouts.app')

@section('content')
<div class='container'>
    <h3>Detail Transaksi</h3>

    <table class="table table-bordered table-striped">
        <tbody>
             
            <tr>
                <th width="25%">Pelanggan</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->daftarpelanggan->nama ?? '-'  }}</td>
            </tr>
             <tr>
                <th width="25%">Nomor Transaksi</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->nomor_transaksi }}</td>
            </tr>
             <tr>
                <th width="25%">Tanggal Transakssi</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->tanggal_transaksi }}</td>
            </tr>
            <tr>
                <th width="25%">Obat</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->obat->nama_obat ?? '-'  }}</td>
            </tr>
            <tr>
                <th width="25%">Harga</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->harga }}</td>
            </tr>
            <tr>
                <th width="25%">Subtotal</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->subtotal }}</td>
            </tr>
            <tr>
                <th width="25%">Metode Pembayaran</th>
                <th width="10%">:</th>
                <td>{{ $transaksi->metode_pembayaran }}</td>
            </tr>
            <tr>
                <th width="25%">Dibuat pada</th>
                <th width="10%">:</th>
                <td>{{ Carbon\Carbon::parse($transaksi->created_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
            </tr>
            <tr>
                <th width="25%">Diperbarui</th>
                <th width="10%">:</th>
                <td>{{ Carbon\Carbon::parse($transaksi->update_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
            </tr>
        </table> 

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                <span class="ti ti-arrow-left me-1"></span>
                Kembali
            </a>
        </div>
</div>
@endsection