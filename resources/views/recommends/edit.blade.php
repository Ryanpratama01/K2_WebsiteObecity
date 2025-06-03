@extends('web_admin.app')
  
@section('title', 'Edit Rekomendasi')
  
@section('contents')
    <hr />
    <form action="{{ route('recommends.update', $recommend->id_rekomendasi) }}" method="POST">
    @method('PUT')
    @csrf
        <div class="row">
        <div class="col mb-3">
            <label class="form-label">Kategori BMI</label>
            <select name="kategori_bmi" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Underweight">Underweight</option>
                <option value="Normal">Normal</option>
                <option value="Overweight">Overweight</option>
                <option value="Obesitas">Obesitas</option>
            </select>
        </div>
    </div> 

    {{-- <div class="row">
        <div class="col mb-3">
            <label class="form-label">Definisi</label>
            <input type="text" name="definisi" class="form-control" value="{{ $recommend->definisi }}">
        </div>
    </div> --}}

    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Makanan</label>
            <input type="text" name="saran_makanan" class="form-control" value="{{ $recommend->saran_makanan }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Aktivitas</label>
            <input type="text" name="saran_aktivitas" class="form-control" value="{{ $recommend->saran_aktivitas }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Lain</label>
            <input type="text" name="saran_lain" class="form-control" value="{{ $recommend->saran_lain }}">
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('recommends') }}" class="btn btn-primary">Go Back</a>
        <button type="submit" class="btn btn-warning">Update</button>
    </div>

@endsection