@extends('layouts.app')


@section('content')
    <div class="container">
        <h3>Data Obat</h3>
        <a href="{{ route('obat.create') }}" class="btn btn-primary my-3">Tambah Obat</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Images</th>
                    <th>Category_id</th>
                    <th>Stok Obat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($obat as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->images }}</td>
                        <td>{{ $item->category_id }}</td>
                        <td>{{ $item->stok_obat }}</td>
                        <td> 
                            <a href="{{ route('obat.show', $item->id) }}">Detail</a>
                            <a href="{{ route('obat.edit', $item->id) }}">Edit</a>
                            <a href="javascript:;" onclick="handleDelete('{{ $item->id }}')" class="text-danger">Hapus</a>
                         </td>

                @endforeach
            </tbody>
        </table>
    </div>

    <form action="" id="form-delete" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        function handleDelete(id) {
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Data Yang Dihapus Tidak Bisa Dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#343a40",
                confirmButtonText: "Ya, Hapus!",
                cencelButtonText: "Batal"
                }).then((result) => {
                if (result.isConfirmed) {
                    var form = document.getElementById('form-delete');
                    form.setAttribute('action','{{ url("/obat") }}/' + id); //http::localhost:8000/obat/id
                    form.submit();
                }
                });
        }
    </script>
@endpush