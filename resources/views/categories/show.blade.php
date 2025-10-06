@extends('layouts.app')

@section('content')
<div class="container-fluid py-4" style="background-color: #e3f2fd;">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h4 class="fw-bold mb-4" style="color:#2c3e50;">Detail Kategori</h4>

            <div class="card shadow-sm">
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover align-middle">
                        <tbody>
                            <tr>
                                <td width="35%">ID</td>
                                <td width="5%">:</td>
                                <td>{{ $categories->id }}</td>
                            </tr>
                            <tr>
                                <td>Nama Kategori</td>
                                <td>:</td>
                                <td>{{ $categories->nama }}</td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td>{{ $categories->deskripsi ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td>Foto</td>
                                <td>:</td>
                                <td class="text-center">
                                    @if($categories->foto)
                                        <img src="{{ asset('storage/images/' . $categories->foto) }}" 
                                             alt="{{ $categories->nama }}" width="150"
                                             style="border-radius:10px; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="Tidak ada foto" width="150"
                                             style="border-radius:10px; box-shadow:0 3px 8px rgba(0,0,0,0.1);">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Dibuat pada</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($categories->created_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                            </tr>
                            <tr>
                                <td>Diperbarui pada</td>
                                <td>:</td>
                                <td>{{ \Carbon\Carbon::parse($categories->updated_at)->isoFormat('DD/MM/Y HH:mm') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{ route('category.index') }}" class="btn btn-secondary me-2 px-4">
                            <i class="ti ti-arrow-left me-1"></i> Kembali
                        </a>
                        <a href="{{ route('category.edit', $categories->id) }}" class="btn btn-primary px-4">
                            <i class="ti ti-pencil me-1"></i> Edit
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
