@extends('web_admin.app')

@section('title', 'Tambah Rekomendasi')

@section('contents')
    <hr />

    <form action="{{ route('recommends.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kategori BMI</label>
            <select name="kategori_bmi" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Underweight">Underweight</option>
                <option value="Normal">Normal</option>
                <option value="Overweight">Overweight</option>
                <option value="Obesitas">Obesitas</option>
            </select>
        </div>

        {{-- <div class="mb-3">
            <label for="saran">Definisi</label>
            <textarea name="definisi" id="definisi" class="form-control" rows="4" required></textarea>
        </div> --}}

        <div class="mb-3">
            <label for="saran">Saran Makanan</label>
            <textarea name="saran_makanan" id="saran_makanan" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="saran">Saran Aktivitas</label>
            <textarea name="saran_aktivitas" id="saran_aktiv" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="saran">Saran Lain</label>
            <textarea name="saran_lain" id="saran_lain" class="form-control" rows="4" required></textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('recommends') }}" class="btn btn-primary">Go Back</a>
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>


@endsection