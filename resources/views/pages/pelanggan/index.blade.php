@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                       <!-- Content -->

                                <div class="container-xxl">
                                <div class="row justify-content-center py-5">
                                    <div class="col-md-7">
                                    <div class="card card-body shadow">
                                        <h5 class="mb-0 fw-bold text-center">PELANGGAN</h5>
                                        <hr>

                                        <form action="{{ route('pelanggan.store') }}" method="post">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" id="nama" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                            <label for="telp" class="form-label">Nomor Telepon</label>
                                            <input type="text" id="telp" name="telp"
                                                    class="form-control @error('telp') is-invalid @enderror"
                                                    value="{{ old('telp') }}">
                                            @error('telp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="keperluan" class="form-label">Keperluan</label>
                                            <input type="text" id="keperluan" name="keperluan"
                                                class="form-control @error('keperluan') is-invalid @enderror"
                                                value="{{ old('keperluan') }}">
                                            @error('keperluan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">
                                            <i class="ti ti-send me-2"></i> Submit
                                            </button>
                                        </div>
                                        </form>

                                    </div>
                                    </div>
                                </div>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
