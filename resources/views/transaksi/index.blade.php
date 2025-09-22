@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Transaksi</h3>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center align-middle" id="transaksiTable">
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari Transaksi"><br>
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Pelanggan Id</th>
                        <th>Nomor Transaksi</th>
                        <th>Tanggal Transaksi</th>
                        <th>Obat</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->daftarpelanggan->nama ?? '-' }}</td>
                            <td>{{ $item->nomor_transaksi}}</td>
                            <td>{{ $item->tanggal_transaksi}}</td>
                            <td>{{ $item->obat->nama_obat ?? '-' }}</td>
                            <td>{{ $item->metode_pembayaran }}</td>
                            <td>
                                <a href="{{ route('transaksi.show', $item->id) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="javascript:;" class="btn btn-sm btn-danger" onclick="actionDelete('{{ route('transaksi.destroy', $item->id) }}')">
                                    <span class="ti ti-trash"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<form id="form-delete" action="" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendor/libs/sweetalert2/sweetalert2.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
     <script src="{{ asset('/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.dataTable').DataTable();
        });

        function actionDelete(url){
            Swal.fire({
                title: "Apakah Kamu Yakin?",
                text: "Kamu Tidak Dapat Mengembalikan Data Yang Telah Dihapus",
                icon: "warning",
                showCancelButton: true, 
                confirmButtonText: "Ya Saya Yakin, Hapus!",
            }).then((result)=>{
                if (result.isConfirmed) {
                    $('#form-delete').attr('action', url);
                    $('#form-delete').submit();
                }
            });
        }

        // 🔍 Script Search Supplier
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#supplierTable tbody tr");
            
            rows.forEach(function(row) {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(value) ? "" : "none";
            });
        });
    </script>

    @if(Session::has('success'))
    <script type="text/javascript">
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 1000
        });
    </script>
    @endif
@endpush