@extends('layouts.app')

@section('content')
<div class='container'>
    <h3>Detail Kategori</h3>

    <table class="table table-bordered table-striped">
        <tbody>
             <tr>
                <td colspan="2">
                    <img src="{{ asset('storage/images/' . $categories->foto) }}" width="300">
                </td>
            </tr>
       
                <tr>
                    <th width="25">ID</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->id }}</td>
                </tr>

                <tr>
                    <th width="25">Nama</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->nama }}</td>
                </tr>

                <tr>
                    <th width="25">Deskripsi</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->deskripsi }}</td>
                </tr>

                <tr>
                    <th width="25%">Foto</th>
                    <th width="10%">:</th>
                    <td>{{ $categories->foto}}</td>
                </tr>
                <tr>
                    <th width="25%">Dibuat pada</th>
                    <th width="10%">:</th>
                    <td>{{ Carbon\Carbon::parse($categories->created_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
                </tr>
                <tr>
                    <th width="25%">Diperbarui</th>
                    <th width="10%">:</th>
                    <td>{{ Carbon\Carbon::parse($categories->update_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
                </tr>
        </table> 

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">
                <span class="ti ti-arrow-left me-1"></span>
                Kembali
            </a>
        </div>
</div>
@endsection