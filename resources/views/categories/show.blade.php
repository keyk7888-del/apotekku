@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Detail Category</h3>

        <table class="table table-striped">
            <tbody>
                <tr>
                    <th width="25">ID</th>
                    <th width="10px">:</th>
                    <td>{{ $category->id }}</td>
                </tr>

                <tr>
                    <th width="25">NAMA</th>
                    <th width="10px">:</th>
                    <td>{{ $category->nama }}</td>
                </tr>

                <tr>
                    <th width="25">Deskripsi</th>
                    <th width="10px">:</th>
                    <td>{{ $category->deskripsi }}</td>
                </tr>

                <tr>
                    <th width="25">Images</th>
                    <th width="10px">:</th>
                    <td>{{ $category->images }}</td>
                </tr>

                <tr>
                    <th width="25">Created At</th>
                    <th width="10px">:</th>
                    <td>{{ \Carbon\Carbon::parse($category->created_at)->isoformat('DD/MM/Y HH:mm')}}</td>
                </tr>

                <tr>
                    <th width="25">Update At</th>
                    <th width="10px">:</th>
                    <td>{{ \Carbon\Carbon::parse($category->update_at)->isoformat('DD/MM/Y HH:mm')}}</td>
                </tr>
            </tbody>
        </table>

        <div class="mt-3">
            <a href="{{ route('category.index') }}" class="btn btn-primary">Back</a>
            <a href="{{ route('category.edit' , $category->id) }}" class="btn btn-secondary">Edit</a>
        </div>
    </div>
@endsection