@extends('layouts.app')

@section('title', 'Daftar Tamu')

@section('content')
    <div class="row">
    <div class="col-md-12">
         <h3 class="page-title">Detail Pelanggan</h3>
        <div class="card card-body p-0">
            <table class="table table-striped">
                <tr>
                        <th width="25%">Id</th>
                        <th width="10%">:</th>
                        <td>{{ $daftarpelanggan->id }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Nama</th>
                        <th width="10%">:</th>
                        <td>{{ $daftarpelanggan->nama }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Nomor Telp</th>
                        <th width="10%">:</th>
                        <td>{{ $daftarpelanggan->no_telp }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Email</th>
                        <th width="10%">:</th>
                        <td>{{ $daftarpelanggan->email }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Keperluan</th>
                        <th width="10%">:</th>
                        <td>{{ $daftarpelanggan->keperluan }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Berkunjung Pada</th>
                        <th width="10%">:</th>
                        <td>{{ optional($daftarpelanggan->created_at)->isoFormat('DD MMM Y HH:mm') }}</td>
                    </tr>
            </table>
        </div>
        <a href="{{ route('daftarpelanggan.index') }}" class="btn btn-sm primary">
            <span class="ti ti-arrow-left"></span>Kembali
        </a>
    </div>
    </div>
@endsection