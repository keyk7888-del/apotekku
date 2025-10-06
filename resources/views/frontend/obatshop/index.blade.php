@extends('layouts.frontend')
@section('content')
<style>
    /* 🌈 Background halaman */
    body {
        background: url('{{ asset('images/bg.pelanggan.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        font-family: 'Poppins', sans-serif;
    }

    /* Kontainer utama dengan efek transparan lembut */
    .transparent-container {
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(6px);
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }

    /* Hilangkan border dan background pada obat */
    .obat-item {
        background: transparent;
        border: none;
        text-align: center;
        transition: transform 0.3s ease;
    }

    .obat-item:hover {
        transform: scale(1.05);
    }

    .obat-item img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .obat-nama {
        color: #004f8c;
        font-weight: 600;
        font-size: 15px;
        margin-top: 10px;
    }

    .obat-nama:hover {
        color: #007bff;
    }

    .obat-harga {
        color: #e63946;
        font-weight: 600;
        margin-bottom: 5px;
    }

    h2 {
        color: #004f8c;
        font-weight: 700;
        text-align: center;
        margin-bottom: 30px;
    }

    .badge {
        border-radius: 10px;
        font-size: 12px;
        background-color: #1888b8;
    }

    .btn-primary {
        border-radius: 8px;
        background-color: #031930;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<div class="container my-4 transparent-container">
    <h2>💊 Daftar Obat</h2>

    <!-- Filter Pencarian -->
    <form method="GET" action="{{ route('obatshop.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-3 mb-2">
                <select name="category_id" class="form-control">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" 
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-2">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control" placeholder="Cari obat...">
            </div>

            <div class="col-md-3 mb-2">
                <button class="btn btn-dark w-100">Cari</button>
            </div>
        </div>
    </form>

    <!-- Daftar Obat Tanpa Card -->
    <div class="row">
        @forelse($obatshop as $obat)
        <div class="col-md-3 mb-4 obat-item">
            <a href="{{ route('obatshop.show', $obat->id) }}">
                <img src="{{ asset('storage/images/'.$obat->foto) }}" 
                     alt="{{ $obat->nama_obat }}">
            </a>
            <a href="{{ route('obatshop.show', $obat->id) }}" class="obat-nama d-block text-decoration-none">
                {{ $obat->nama_obat }}
            </a>
            <div class="obat-harga">Rp {{ number_format($obat->harga, 0, ',', '.') }}</div>
            <small class="text-muted d-block mb-2">
                {{ Str::limit($obat->deskripsi, 40) }}
            </small>
            <span class="badge">
                {{ $obat->category->nama ?? 'Tidak ada kategori' }}
            </span>
            <form action="{{ route('keranjang.tambah', $obat->id) }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-primary w-100">
                    + Tambah ke Keranjang
                </button>
            </form>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
            <p>Tidak ada obat ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
