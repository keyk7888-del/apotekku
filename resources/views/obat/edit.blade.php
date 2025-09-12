@extends('layouts.app')

@section('content')
    <div class='container'>
        <h3>New Obat</h3>
            <a href="{{ Route('obat.index') }}">Back</a>

                 <div class="row">
                        <div class="col-md-6">
                            <div class="card card-body">
                            <form action="{{ route('obat.update',$obat->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"/>

                                @error('nama')
                                    <span class="texte-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <input type="text" name="deskripsi" id="deskripsi" class="form-control"/>

                                @error('deskripsi')
                                    <span class="texte-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control"/>

                                @error('harga')
                                    <span class="texte-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="images">images</label>
                                <input type="file" name="images" id="images" class="form-control"/>

                                @error('images')
                                    <span class="texte-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-select">
                                        <option value="">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{$category->nama}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            <div class="form-group mb-3">
                                <label for="stok_obat">Stok Obat</label>
                                <input type="text" name="stok_obat" id="stok_obat" class="form-control"/>

                                @error('stok_obat')
                                    <span class="texte-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                 </div>
    </div>
@endsection