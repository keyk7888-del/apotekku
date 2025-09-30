@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar Pesanan</h3> 
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm text-center align-middle" id="obatTable">
                <input type="text" id="searchInput" class="form-control w-25" placeholder="Cari Pesanan"><br>
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nomor Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Produk</th>
                        <th>Metode Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pesanan as $row)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $row->nomor_transaksi }}</td>
                        <td>{{ $row->nama_lengkap }}</td>
                        <td>{{ $row->alamat_lengkap }}</td>
                        <td>{{ $row->produk }}</td>
                        <td>{{ $row->metode_pembayaran }}</td>
                        <td>
                            <a href="{{ route('pesanan.show', $row->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="javascript:;" class="btn btn-sm btn-danger" onclick="actionDelete('{{ route('pesanan.destroy', $row->id) }}')">
                                <span class="ti ti-trash"></span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada pesanan</td>
                    </tr>
                    @endforelse
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

    <style>
        /* 🔽 Perkecil tabel */
        #obatTable.table-sm td, 
        #obatTable.table-sm th {
            padding: 6px 10px !important; /* lebih rapat */
            font-size: 13px;              /* font lebih kecil */
            vertical-align: middle;       /* teks pas di tengah */
        }

        /* 🔽 Supaya tombol lebih kecil dan sejajar */
        #obatTable .btn {
            padding: 4px 8px;
            font-size: 12px;
        }

        /* 🔽 Header tabel biar rapi */
        #obatTable thead th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
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

        // 🔍 Script Search Admin
        document.getElementById("searchInput").addEventListener("keyup", function() {
            let value = this.value.toLowerCase();
            let rows = document.querySelectorAll("#obatTable tbody tr");
            
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