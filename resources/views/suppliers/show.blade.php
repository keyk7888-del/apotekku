@extends('layouts.app')

@section('content')
<div class='container'>
    <h3>Detail Suppliers</h3>

    <table class="table table-bordered table-striped">
        <tr>
            <th width="25%">Nama</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->nama }}</td>
        </tr>
        <tr>
            <th width="25%">Alamat</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->alamat }}</td>
        </tr>
        <tr>
            <th width="25%">No Telp</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->no_telp}}</td>
        </tr>
        <tr>
            <th width="25%">Email</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->email }}</td>
        </tr>
        <tr>
            <th width="25%">Kontak Person</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->kontak_person}}</td>
        </tr>
        <tr>
            <th width="25%">Keterangan</th>
            <th width="10%">:</th>
            <td>{{ $suppliers->keterangan }}</td>
        </tr>
        <tr>
            <th width="25%">Dibuat pada</th>
            <th width="10%">:</th>
            <td>{{ Carbon\Carbon::parse($suppliers->created_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
        </tr>
        <tr>
            <th width="25%">Diperbarui</th>
            <th width="10%">:</th>
            <td>{{ Carbon\Carbon::parse($suppliers->update_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
        </tr>
    </table>    
<div class="mt-3">
    <a href="{{ route('suppliers.index') }}">Kembali</a>
    Edit Hapus
    </div>
</div>
@endsection