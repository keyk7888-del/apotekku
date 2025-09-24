@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Obat</h2>
    <div class="row">
        @foreach ($obatshop as $obat)
            <div class="col-md-3">
                <div class="card mb-4">
                    <!-- tampilkan foto jika ada -->
                    @if($obat->foto)
                        <img src="{{ asset('storage/'.$obat->foto) }}" class="card-img-top" alt="{{ $obat->nama }}">
                    @else
                        <img src="{{ asset('images/logo.apotek.png') }}" class="card-img-top" alt="Tidak ada gambar">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $obat->nama }}</h5>
                        <p>Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>
                        <p>{{ $obat->deskripsi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
