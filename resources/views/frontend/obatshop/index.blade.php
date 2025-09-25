@extends('layouts.frontend')

@section('content')
<div class="container" style="background-color: #bfd4d4; padding:20px;">
    <h2 class="mb-4">Daftar Obat</h2>

    <!-- Filter Pencarian -->
    <form method="GET" action="{{ route('obatshop.index') }}" class="mb-4">
        <div class="row">
            <!-- Dropdown kategori -->
            <div class="col-md-3">
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

            <!-- Input search -->
            <div class="col-md-6">
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="form-control" placeholder="Cari obat...">
            </div>

            <!-- Tombol search -->
            <div class="col-md-3">
                <button class="btn btn-dark w-100">Cari</button>
            </div>
        </div>
    </form>

    <!-- Grid Produk -->
    <div class="row">
        @forelse($obatshop as $obat)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <!-- Gambar obat bisa diklik -->
                <a href="{{ route('obatshop.show', $obat->id) }}">
                    <img src="{{ asset('storage/images/'.$obat->foto) }}" 
                         class="card-img-top" 
                         style="height:250px; object-fit:cover;" 
                         alt="{{ $obat->nama_obat }}">
                </a>
                <div class="card-body">
                    <!-- Nama obat juga link -->
                    <h6 class="mt-2">
                        <a href="{{ route('obatshop.show', $obat->id) }}" 
                           class="text-dark text-decoration-none">
                            {{ $obat->nama_obat }}
                        </a>
                    </h6>
                    <p class="text-danger mb-1">
                        Rp {{ number_format($obat->harga, 0, ',', '.') }}
                    </p>
                    <small class="text-muted">
                        {{ Str::limit($obat->deskripsi, 40) }}
                    </small>
                    <br>
                    <span class="badge bg-info text-dark mt-2">
                        {{ $obat->category->nama ?? 'Tidak ada kategori' }}
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center text-muted">Tidak ada obat ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
