@extends('layouts')

@section('title', 'Ubah Profil')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ubah Profil</h5>
                    <p class="card-text">Halaman Untuk Mengubah Profil</p>

                    <form action="{{ route('profil.update') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback d-block"  role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback d-block"  role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" class="form-control" id="password" name="password" value="{{ $user->password }}">
                            @error('password')
                                <span class="invalid-feedback d-block"  role="alert"><strong>{{$message}}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ $user->password_confirmation }}">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection