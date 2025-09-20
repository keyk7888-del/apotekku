@extends('layouts.app')

@section('content')
<div class='container'>
    <h3>Detail Obat</h3>

    <table class="table table-bordered table-striped">
        <tbody>
             <tr>
                <td colspan="2">
                    <img src="{{ asset('storage/images/' . $obat->foto) }}" width="300">
                </td>
            </tr>
       
            <tr>
                <th width="25%">Nama Obat</th>
                <th width="10%">:</th>
                <td>{{ $obat->nama_obat }}</td>
            </tr>
             <tr>
                <th width="25%">Kategori</th>
                <th width="10%">:</th>
                <td>{{ $obat->category->nama}}</td>
            </tr>
             <tr>
                <th width="25%">Supplier</th>
                <th width="10%">:</th>
                <td>{{ $obat->supplier->nama}}</td>
            </tr>
             <tr>
                <th width="25%">Jenis</th>
                <th width="10%">:</th>
                <td>{{ $obat->jenis }}</td>
            </tr>
            <tr>
                <th width="25%">Deskripsi</th>
                <th width="10%">:</th>
                <td>{{ $obat->deskripsi }}</td>
            </tr>
            <tr>
                <th width="25%">Harga</th>
                <th width="10%">:</th>
                <td>{{ $obat->harga }}</td>
            </tr>
            <tr>
                <th width="25%">Stok Obat</th>
                <th width="10%">:</th>
                <td>{{ $obat->stok_obat }}</td>
            </tr>
            <tr>
                <th width="25%">Kedaluwarsa</th>
                <th width="10%">:</th>
                <td>{{ $obat->kedaluwarsa }}</td>
            </tr>
            <tr>
                <th width="25%">Foto</th>
                <th width="10%">:</th>
                <td>{{ $obat->foto}}</td>
            </tr>
            <tr>
                <th width="25%">Dibuat pada</th>
                <th width="10%">:</th>
                <td>{{ Carbon\Carbon::parse($obat->created_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
            </tr>
            <tr>
                <th width="25%">Diperbarui</th>
                <th width="10%">:</th>
                <td>{{ Carbon\Carbon::parse($obat->update_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
            </tr>
        </table> 

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                <span class="ti ti-arrow-left me-1"></span>
                Kembali
            </a>

            <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-primary">
                <span class="ti ti-pencil me-1"></span>
                Edit
            </a>
            </div>
</div>
@endsection