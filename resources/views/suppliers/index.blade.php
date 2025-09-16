@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Suppliers</h3>
        <a href="{{ route('suppliers.create') }}" class="btn btn-primary">Tambah suppliers</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @if($suppliers->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Supplier is empty</td>
                        </tr>
                    @endif
                    @foreach($suppliers  as $index => $item)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->keterangan }}</td>
                            <td>
                                <a href="{{ route('suppliers.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('suppliers.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('suppliers.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection