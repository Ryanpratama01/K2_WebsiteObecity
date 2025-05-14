<!-- resources/views/rekomendasi.blade.php -->
@extends('layouts.main')

@section('title', 'Obecity Check - Rekomendasi')

@push('styles')
<link href="{{ asset('assets/web_user/css/rekomendasi.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h3 class="welcome-text text-center">Rekomendasi Kesehatan</h3>
            <p class="text-center header-subtitle">
                Dapatkan rekomendasi kesehatan dan diet yang sesuai dengan kondisi dan target berat badan ideal Anda.
                Semua rekomendasi berdasarkan standar medis dan penelitian terbaru.
            </p>
        </div>
    </div>
    
    <div class="container">
        <!-- Status BMI dan Kategori -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-speedometer2"></i></div>
                    <h5>BMI Saat Ini</h5>
                    <h3 class="stat-value">20.1</h3>
                    <div class="status-badge status-normal">
                        <i class="bi bi-check-circle"></i> Normal
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-person-fill"></i></div>
                    <h5>Status Berat</h5>
                    <h3 class="stat-value">Insufficient Weight</h3>
                    <div class="status-badge status-warning">
                        <i class="bi bi-exclamation-triangle"></i> Perlu Perhatian
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-bullseye"></i></div>
                    <h5>Target Berat</h5>
                    <h3 class="stat-value">65 kg</h3>
                    <div class="status-badge status-info">
                        <i class="bi bi-arrow-up"></i> +5 kg
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Konten Rekomendasi -->
        <div class="row">
            <div class="col-lg-8">
                <!-- Rekomendasi Utama -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-clipboard2-heart me-2"></i> Rekomendasi untuk Kategori Anda
                    </div>
                    <div class="card-body">
                        <h5 class="fw-bold">Insufficient Weight</h5>
                        <p class="text-muted">Sumber: CDC & WHO</p>
                        
                        <h6 class="fw-semibold mt-4">Definisi</h6>
                        <p>Keadaan dimana seseorang memiliki status gizi yang tidak memadai dan berat badannya berada di bawah kisaran standar untuk usianya. Kondisi ini dapat menyebabkan berbagai masalah kesehatan seperti kelemahan sistem kekebalan tubuh, gangguan hormonal, dan kesulitan menjalankan fungsi normal tubuh.</p>
                        
                        <h6 class="fw-semibold mt-4">Rekomendasi Diet</h6>
                        <ul>
                            <li>Konsumsi lima porsi buah dan sayur setiap hari.</li>
                            <li>Pilih makanan tinggi karbohidrat dan protein.</li>
                            <li>Konsumsi makanan berkalori tinggi, seperti kacang-kacangan, pasta, nasi.</li>
                            <li>Makan lebih sering dengan porsi kecil tapi sering.</li>
                            <li>Minum susu tinggi kalori, bukan minuman rendah kalori.</li>
                        </ul>
                        
                        <h6 class="fw-semibold mt-4">Rekomendasi Aktivitas Fisik</h6>
                        <ul>
                            <li>Lakukan latihan beban ringan hingga sedang untuk membangun massa otot.</li>
                            <li>Fokus pada latihan kekuatan, bukan kardio yang berlebihan.</li>
                            <li>Istirahat yang cukup antara sesi latihan (1-2 hari).</li>
                            <li>Kombinasikan dengan protein yang cukup untuk membangun massa otot.</li>
                            <li>Konsultasikan dengan ahli gizi atau pelatih pribadi untuk program yang lebih efektif.</li>
                        </ul>
                        
                        <div class="info-alert mt-4">
                            <i class="bi bi-lightbulb me-2"></i> Catatan: Rekomendasi ini adalah panduan umum. Konsultasikan dengan dokter sebelum melakukan perubahan signifikan pada diet atau rutinitas olahraga Anda.
                        </div>
                    </div>
                </div>
                
                <!-- Progress Target -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-graph-up me-2"></i> Progress Menuju Target
                    </div>
                    <div class="card-body">
                        <div class="progress-container">
                            <div class="progress-label">
                                <span>Saat ini: 60 kg</span>
                                <span>Target: 65 kg</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                            </div>
                        </div>
                        
                        <div class="status-badges-container mt-4">
                            <div class="status-badge status-info">
                                <i class="bi bi-clock me-1"></i> Estimasi: 5 minggu lagi
                            </div>
                            <div class="status-badge status-primary">
                                <i class="bi bi-arrow-up-circle me-1"></i> Progres yang baik
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Kategori BMI -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-info-circle me-2"></i> Kategori BMI
                    </div>
                    <div class="card-body">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>BMI (kg/m²)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Underweight</td>
                                    <td>< 18.5</td>
                                </tr>
                                <tr class="table-active">
                                    <td>Normal</td>
                                    <td>18.5 - 24.9</td>
                                </tr>
                                <tr>
                                    <td>Overweight</td>
                                    <td>25.0 - 29.9</td>
                                </tr>
                                <tr>
                                    <td>Obesity Class I</td>
                                    <td>30.0 - 34.9</td>
                                </tr>
                                <tr>
                                    <td>Obesity Class II</td>
                                    <td>35.0 - 39.9</td>
                                </tr>
                                <tr>
                                    <td>Obesity Class III</td>
                                    <td>≥ 40.0</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Tips Harian -->
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <i class="bi bi-lightbulb me-2"></i> Tips Harian
                    </div>
                    <div class="card-body">
                        <div class="daily-tip">
                            <i class="bi bi-star-fill tip-icon"></i>
                            <h6>Tingkatkan protein harian</h6>
                            <p>Tambahkan sumber protein di setiap makanan utama seperti telur, ayam, ikan, dan kacang-kacangan untuk membangun massa otot.</p>
                        </div>
                        <hr>
                        <div class="daily-tip">
                            <i class="bi bi-star-fill tip-icon"></i>
                            <h6>Smoothie bergizi tinggi</h6>
                            <p>Buat smoothie dengan susu, pisang, selai kacang, dan oatmeal sebagai camilan kaya kalori dan nutrisi.</p>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/tips" class="btn-gradient">
                                <i class="bi bi-list-ul me-1"></i> Lihat Semua Tips
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection