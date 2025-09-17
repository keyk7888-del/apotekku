@extends('layouts.app')
@section('title', 'Detail Admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body p-0">
                <table class="table table-striped">
                    <tr>
                        <th width="25%">ID</th>
                        <td width="10px">:</td>
                        <td>{{ $admin->id }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Nama</th>
                        <td width="10px">:</td>
                        <td>{{ $admin->name }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Email</th>
                        <td width="10px">:</td>
                        <td>{{ $admin->email }}</td>
                    </tr>
                    <tr>
                        <th width="25%">Dibuat pada</th>
                        <th width="10%">:</th>
                        <td>{{ Carbon\Carbon::parse($admin->created_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
                    </tr>
                    <tr>
                        <th width="25%">Diperbarui</th>
                        <th width="10%">:</th>
                        <td>{{ Carbon\Carbon::parse($admin->update_at)->isoFormat('DD/MM/Y HH:mm')}}</td>
                    </tr>
                </table>
            </div>

            <div class="d-flex gap-2 mt-3">
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    <span class="ti ti-arrow-left me-1"></span>
                    Kembali
                </a>

                <a href="{{ route('admin.edit', $admin->id) }}" class="btn btn-primary">
                    <span class="ti ti-pencil me-1"></span>
                    Edit
                </a>
            </div>
        </div>
    </div>
@endsection