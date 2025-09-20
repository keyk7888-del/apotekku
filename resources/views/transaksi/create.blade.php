@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Transaksi</h3>
    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-body">
                <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf

                    <div class="form-group mb-3">
                        <label for="pelanggan_id" class="form-label">Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-select">
                            <option value="">Pilih Pelanggan</option>
                            @foreach ($daftarpelanggan as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="nomor_transaksi">Nomor Transaksi</label>
                        <input type="text" name="nomor_transaksi" id="nomor_transaksi" class="form-control"/>
                        @error('nomor_transaksi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="tanggal_transaksi">Tanggal Transaksi</label>
                        <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control"/>
                        @error('tanggal_transaksi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="obat_id">Obat</label>
                        <select name="obat_id" id="obat_id" class="form-control">
                            <option value="">Pilih Obat</option>
                            @foreach($obat as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_obat }}</option>
                            @endforeach
                        </select>
                        @error('obat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control"/>
                        @error('harga')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="jumlah_obat">Jumlah Obat</label>
                        <input type="number" name="jumlah_obat" id="jumlah_obat" class="form-control"/>
                        @error('jumlah_obat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="subtotal">Subtotal</label>
                        <input type="number" name="subtotal" id="subtotal" class="form-control" readonly/>
                        @error('subtotal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran" id="metode_pembayaran" class="form-control" required>
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="Cash">Cash</option>
                            <option value="Transfer">Transfer</option>
                        </select>
                        @error('metode_pembayaran')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex">
                        <button type="submit" class="btn btn-primary">
                            <span class="ti ti-send me-1"></span>
                            Simpan
                        </button>

                        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const harga = document.getElementById("harga");
        const jumlah_obat = document.getElementById("jumlah_obat");
        const subtotal = document.getElementById("subtotal");

        function hitungSubtotal() {
            let h = parseFloat(harga.value) || 0;
            let j = parseInt(jumlah_obat.value) || 0;
            subtotal.value = h * j;
        }

        harga.addEventListener("input", hitungSubtotal);
        jumlah_obat.addEventListener("input", hitungSubtotal);
    });
</script>
@endsection
