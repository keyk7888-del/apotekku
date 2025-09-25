@extends('layouts.frontend')

@section('content')
<div class="container py-5" style="background-color:#bfd4d4;">
    <div class="row">
        <!-- Gambar Obat -->
        <div class="col-md-6">
            <img src="{{ asset('storage/images/'.$obat->foto) }}" 
                 alt="{{ $obat->nama_obat }}" 
                 class="img-fluid rounded shadow">
        </div>

        <!-- Detail Obat -->
        <div class="col-md-6">
            <h2>{{ $obat->nama_obat }}</h2>
            <p class="text-danger h4">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
            <p class="mt-3">{{ $obat->deskripsi }}</p>

            <!-- Form Tambah ke Keranjang -->
            <form action="{{ route('keranjang.tambah', $obat->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <label class="me-2">Jumlah:</label>
                    <input type="number" name="quantity" value="1" min="1" class="form-control w-25">
                </div>
                <button type="submit" class="btn btn-dark px-4">Tambah ke Keranjang</button>
            </form>

            <div class="mt-4">
                <p><strong>Kategori:</strong> {{ $obat->category->nama ?? 'Tidak ada kategori' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
