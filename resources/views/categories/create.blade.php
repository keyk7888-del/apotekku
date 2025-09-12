@extends('layouts.app')

@section('content')
    <div class="container">
        <h3> Add New Category</h3>

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('category.store') }}" method="POST">
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
                            <label for="images" class="form-label">Images</label>
                            <input type="file" name="images" id="images" class="form-control"/>

                            @error('images')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                            </div>
                            
                            <div class="flex">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                    </div>
                </form>
            </div>
    </div>
@endsection