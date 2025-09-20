@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Tambah Category</h3>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">>
                    @csrf

                        <div class="card card-body">
                            <div class="form-group mb-3" >
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"/>

                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group mb-3" >
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>

                                @error('deskripsi')
                                <span class="text-danger">{{ $message }}</span>
                                 @enderror
                            </div>
                            
                            <div class="form-group mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control"/>

                            @error('foto')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            
                            <div class="flex">
                            <button type="submit" class="btn btn-primary">
                                <span class="ti ti-send me-1"></span>
                                Simpan
                            </button>

                            <a href="{{ route('category.index') }}" class="btn btn-secondary">
                                Batal
                            </a>
                        </div>
                    </div>
                </form>
            </div>
    </div>
@endsection