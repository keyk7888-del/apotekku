@extends('layouts.frontend')

@section('content')
<style>
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    .obat-container {
        background: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 40px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    }

    .card {
        background: rgba(255, 255, 255, 0.7);
        backdrop-filter: blur(6px);
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
    }

    .btn-success {
        background-color: #03193a;
        border: none;
        transition: 0.3s;
    }

    .btn-success:hover {
        background-color: #141379;
    }

    .btn-outline-secondary {
        background: rgba(255, 255, 255, 0.4);
        backdrop-filter: blur(4px);
        border: 1px solid rgba(0, 0, 0, 0.2);
        color: #333;
        transition: 0.3s;
    }

    .btn-outline-secondary:hover {
        background: rgba(255, 255, 255, 0.7);
        color: #000;
    }

    .badge {
        background: rgba(0, 184, 255, 0.3);
        backdrop-filter: blur(3px);
    }
</style>

<div class="container py-5 obat-container">
    <div class="row g-4 align-items-center">

        <!-- 🧴 Gambar Obat -->
        <div class="col-md-5 text-center">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <img src="{{ asset('storage/images/'.$obat->foto) }}" 
                         alt="{{ $obat->nama_obat }}" 
                         class="img-fluid rounded-4 shadow-sm"
                         style="max-height: 350px; object-fit: contain;">
                </div>
            </div>
        </div>

        <!-- 💊 Detail Obat -->
        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4">
                <h2 class="fw-bold text-dark mb-2">{{ $obat->nama_obat }}</h2>
                <p class="text-success fw-bold h4 mb-3">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
                <p class="text-muted" style="line-height:1.6;">{{ $obat->deskripsi }}</p>

                <hr class="my-4">

                <!-- 🛒 Form Tambah ke Keranjang -->
                <form action="{{ route('keranjang.tambah', $obat->id) }}" method="POST">
                    @csrf
                    <div class="d-flex align-items-center mb-3">
                        <label for="jumlah" class="me-2 fw-semibold">Jumlah:</label>
                        <input type="number" name="jumlah" value="1" min="1" id="jumlah"
                               class="form-control w-25 text-center border-success">
                    </div>

                    <button type="submit" class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
                        <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                    </button>

                    <a href="{{ route('obatshop.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill ms-2">
                        ⬅ Kembali
                    </a>
                </form>

                <!-- 📦 Info Kategori -->
                <div class="mt-4">
                    <p><strong>Kategori:</strong> 
                        <span class="badge text-dark px-3 py-2 rounded-pill">
                            {{ $obat->category->nama ?? 'Tidak ada kategori' }}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
