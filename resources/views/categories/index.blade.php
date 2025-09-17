@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Categories</h3>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Tambah Category</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Images</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">Categories is empty</td>
                        </tr>
                    @endif
                    @foreach($categories as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                                @if($item->images)
                                    <img src="{{ asset('storage/images/' . $item->images) }}" alt="category" width="70" class="rounded shadow-sm">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('category.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('category.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('category.destroy', $item->id) }}" method="POST" class="d-inline">
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

<script>
function handleDelete(id) {
    if(confirm('Are you sure want to delete this category?')) {
        // buat form delete secara dinamis
        let form = document.createElement('form');
        form.method = 'POST';
        form.action = '/category/' + id;
        form.innerHTML = '@csrf @method("DELETE")';
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endsection
