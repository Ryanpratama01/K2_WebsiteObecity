@extends('web_admin.app')

@section('title', 'Detail User')

@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" value="{{ $user->Nama }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" value="{{ $user->Jenis_Kelamin }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Usia</label>
            <input type="number" class="form-control" value="{{ $user->Usia }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Tinggi Badan (cm)</label>
            <input type="text" class="form-control" value="{{ $user->Tinggi_Badan }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Berat Badan (kg)</label>
            <input type="text" class="form-control" value="{{ $user->Berat_Badan }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">IMT</label>
            <input type="text" class="form-control" value="{{ $user->IMT }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Tanggal</label>
            <input type="text" class="form-control" value="{{ $user->Date }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="{{ $user->Email }}" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Role</label>
            <input type="text" class="form-control" value="{{ $user->Role }}" readonly>
        </div>
    </div>


    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('users') }}" class="btn btn-primary">Go Back</a>
    </div>


@endsection