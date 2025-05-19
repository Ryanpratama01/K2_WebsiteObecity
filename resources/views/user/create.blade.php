@extends('web_admin.app')

@section('title', 'Tambah User')

@section('contents')
    <hr />

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama</label>
            <textarea name="Nama" id="Nama" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="Jenis_Kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Usia</label>
            <input type="number" name="Usia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tinggi Badan (cm)</label>
            <input type="number" step="0.01" name="Tinggi_Badan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Berat Badan (kg)</label>
            <input type="number" step="0.01" name="Berat_Badan" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>IMT (optional)</label>
            <input type="number" step="0.01" name="IMT" class="form-control">
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="Date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <textarea name="Email" id="Email" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="Password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="Role" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
                <option value="SuperAdmin">SuperAdmin</option>
            </select>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('users') }}" class="btn btn-primary">Go Back</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>


@endsection