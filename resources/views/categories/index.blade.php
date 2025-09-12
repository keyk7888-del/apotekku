@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Categories</h3>

        <a href="{{ route('category.create') }}" class="btn btn-primary my-3">Add New Category</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center text-muted">
                            Categories is empty
                        </td>
                    </tr>
                @endif
                @foreach ($categories as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->images }}</td>
                    <td>
                        <a href="{{ route('category.show', $item->id) }}">Show</a>
                        <a href="{{ route('category.edit', $item->id) }}">Edit</a>
                        <a href="javascript:;"onclick="handleDelete('{{ $item->id }}')"class="text-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection