@extends('layouts.main')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="{{ asset('assets/web_user/css/rekomendasi.css') }}" rel="stylesheet">
<style>
    .category-card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')

<!-- Konten Rekomendasi -->
<div class="container my-4">
    <h4 class="fw-bold text-primary mb-4">Rekomendasi</h4>

    <div class="card category-card p-4">
        <h5 class="fw-bold text-center">Insufficient Weight</h5>
        <p class="text-center text-muted">Sumber: CDC & WHO</p>

        <h6 class="fw-semibold">Definisi</h6>
        <p>Keadaan dimana seseorang memiliki status gizi yang tidak memadai dan berat badannya berada di bawah kisaran standar untuk usianya...</p>

        <h6 class="fw-semibold">Rekomendasi</h6>
        <ul>
            <li>Konsumsi lima porsi buah dan sayur setiap hari.</li>
            <li>Pilih makanan tinggi karbohidrat dan protein.</li>
            <li>Konsumsi makanan berkalori tinggi, seperti kacang-kacangan, pasta, nasi.</li>
            <li>Makan lebih sering dengan porsi kecil tapi sering.</li>
            <li>Minum susu tinggi kalori, bukan minuman rendah kalori.</li>
        </ul>
    </div>
</div>
@endsection
