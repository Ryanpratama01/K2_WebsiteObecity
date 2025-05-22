@extends('web_admin.app')
  
@section('title', 'Edit User')
  
@section('contents')
    <hr />
    <form action="{{ route('users.update', $user->id_User) }}" method="POST">
    @method('PUT')
    @csrf
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="Nama" class="form-control" value="{{ $user->Nama }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="Jenis_Kelamin" class="form-control">
                    <option value="Laki-laki" {{ $user->Jenis_Kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $user->Jenis_Kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Usia</label>
                <input type="number" name="Usia" class="form-control" value="{{ $user->Usia }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Tinggi Badan (cm)</label>
                <input type="number" step="0.01" name="Tinggi_Badan" class="form-control" value="{{ $user->Tinggi_Badan }}">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Berat Badan (kg)</label>
                <input type="number" step="0.01" name="Berat_Badan" class="form-control" value="{{ $user->Berat_Badan }}">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="Date" class="form-control" value="{{ $user->Date }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>

        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Password (Kosongkan jika tidak diubah)</label>
                <input type="password" name="Password" class="form-control">
            </div>
            <div class="col mb-3">
                <label class="form-label">Role</label>
                <select name="Role" class="form-control">
                    <option value="User" {{ $user->Role == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Admin" {{ $user->Role == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="SuperAdmin" {{ $user->Role == 'SuperAdmin' ? 'selected' : '' }}>SuperAdmin</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('users') }}" class="btn btn-primary">Go Back</a>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>

@endsection