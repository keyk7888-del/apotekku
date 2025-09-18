@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Category</h3>

        <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    <img src="{{ asset('storage/images/' .$categories->images) }}" width="300">
                </td>
            </tr>

                <tr>
                    <th width="25">ID</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->id }}</td>
                </tr>

                <tr>
                    <th width="25">NAMA</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->nama }}</td>
                </tr>

                <tr>
                    <th width="25">Deskripsi</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->deskripsi }}</td>
                </tr>

                <tr>
                    <th width="25">Images</th>
                    <th width="10px">:</th>
                    <td>{{ $categories->images }}</td>
                </tr>

                <tr>
                    <th width="25">Created At</th>
                    <th width="10px">:</th>
                    <td>{{ \Carbon\Carbon::parse($categories->created_at)->isoformat('DD/MM/Y HH:mm')}}</td>
                </tr>

                <tr>
                    <th width="25">Update At</th>
                    <th width="10px">:</th>
                    <td>{{ \Carbon\Carbon::parse($categories->update_at)->isoformat('DD/MM/Y HH:mm')}}</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('category.index') }}" class="btn btn-secondary">
                <span class="ti ti-arrow-left me-1"></span>
                Kembali
            </a>

            </div>
    </div>
@endsection