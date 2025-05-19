@extends('web_admin.app')

@section('title', 'Detail Rekomendasi')

@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Kategori BMI</label>
            <input type="text" class="form-control" value="{{ $recommend->kategori_bmi }}" readonly>
        </div>
    </div> 
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Definisi</label>
            <input type="text" class="form-control" value="{{ $recommend->definisi }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Makanan</label>
            <input type="text" class="form-control" value="{{ $recommend->saran_makanan }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Aktivitas</label>
            <input type="text" class="form-control" value="{{ $recommend->saran_aktivitas }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Saran Lain</label>
            <input type="text" class="form-control" value="{{ $recommend->saran_lain }}" readonly>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('recommends') }}" class="btn btn-primary">Go Back</a>
    </div>


@endsection