@extends('layouts.app')

@section('content')
<div class='container'>
    <h3>Detail Obat</h3>

    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    <img src="{{ asset('storage/images/' .$obat->images) }}" width="300">
                </td>
            </tr>
       
            <tr>
                <th width="25%">Nama</th>
                <th width="10%">:</th>
                <td>{{ $obat->nama }}</td>
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
                <th width="25%">Images</th>
                <th width="10%">:</th>
                <td>{{ $obat->images}}</td>
            </tr>
        
            <tr>
                <th width="25%">Category_id</th>
                <th width="10%">:</th>
                <td>{{ $obat->category_id }}</td>
            </tr>
            <tr>
                <th width="25%">Stok Obat</th>
                <th width="10%">:</th>
                <td>{{ $obat->stok_obat }}</td>
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

        <div class="mt-3">
        <a href="{{ route('obat.index') }}">Kembali</a>
        Edit Delete
        </div>
</div>
@endsection