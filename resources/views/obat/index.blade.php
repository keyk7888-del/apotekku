@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Obat</h3>
        <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Obat</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Expired Date</th>
                        <th>Images</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obat as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_obat }}</td>
                            <td>{{ $item->category->nama ?? '-' }}</td>
                            <td>{{ $item->supplier->nama ?? '-' }}</td>
                            <td>{{ $item->expired_date }}</td>
                            <td>
                                @if($item->images)
                                    <img src="{{ asset('storage/images/' . $item->images) }}" alt="obat" width="70" class="rounded shadow-sm">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('obat.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('obat.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('obat.destroy', $item->id) }}" method="POST" class="d-inline">
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