<!-- resources/views/kalkulator.blade.php -->
@extends('layouts.main')

@section('title', 'Obecity Check - Kalkulator BMI')

@section('content')
    <!-- Kalkulator BMI Header -->
    <div class="page-header">
        <div class="container">
            <h3 class="welcome-text text-center">Kalkulator BMI</h3>
            <p class="text-center header-subtitle">
                Hitung Body Mass Index (BMI) Anda untuk mengetahui status berat badan dan risiko kesehatan.
                Isi data dengan lengkap untuk mendapatkan hasil yang akurat.
            </p>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-calculator me-2"></i> Masukkan Data Anda
                    </div>
                    <div class="card-body">
                        <form id="bmiForm">
                            <!-- Pilihan Jenis Kelamin -->
                            <div class="mb-4 text-center">
                                <div class="btn-group" role="group" aria-label="Gender">
                                    <input type="radio" class="btn-check" name="gender" id="male" value="male" autocomplete="off">
                                    <label class="btn btn-outline-info gender-toggle" for="male">
                                        <i class="bi bi-gender-male"></i> Pria
                                    </label>
                            
                                    <input type="radio" class="btn-check" name="gender" id="female" value="female" autocomplete="off">
                                    <label class="btn btn-outline-danger gender-toggle" for="female">
                                        <i class="bi bi-gender-female"></i> Wanita
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Usia</label>
                                        <input type="text" id="age" class="form-control weight-select" placeholder="Contoh : 21">
                                    </div>
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Tinggi Badan (cm)</label>
                                        <input type="text" id="height" class="form-control weight-select" placeholder="Contoh : 155">
                                    </div>
                                    <div class="mb-3">
                                        <label for="weight" class="form-label">Berat Badan (kg)</label>
                                        <input type="text" id="weight" class="form-control weight-select" placeholder="Contoh : 42.5">
                                    </div>
                                    <div class="mb-3">
                                        <label for="meal-pattern" class="form-label">Pola Makan Sehari-hari</label>
                                        <input type="text" id="meal-pattern" class="form-control weight-select" placeholder="Contoh : 3 kali sehari">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <!-- Riwayat Keluarga -->
                                    <div class="mb-3">
                                        <label class="form-label">Apakah ada riwayat keluarga yang mengalami kelebihan berat badan?</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-4">
                                                <input type="radio" name="keluarga" id="keluarga-yes" value="Yes" class="form-check-input">
                                                <label class="form-check-label" for="keluarga-yes">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="keluarga" id="keluarga-no" value="No" class="form-check-input">
                                                <label class="form-check-label" for="keluarga-no">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Makanan Berkalori Tinggi -->
                                    <div class="mb-3">
                                        <label class="form-label">Apakah sering mengkonsumsi makanan berkalori tinggi?</label>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check me-4">
                                                <input type="radio" name="kalori" id="kalori-yes" value="Yes" class="form-check-input">
                                                <label class="form-check-label" for="kalori-yes">Ya</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="kalori" id="kalori-no" value="No" class="form-check-input">
                                                <label class="form-check-label" for="kalori-no">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Camilan -->
                                    <div class="mb-3">
                                        <label class="form-label">Apakah sering makan camilan di antara waktu makan?</label>
                                        <div class="d-flex flex-wrap">
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="camilan" id="camilan-never" value="Tidak Pernah" class="form-check-input">
                                                <label class="form-check-label" for="camilan-never">Tidak Pernah</label>
                                            </div>
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="camilan" id="camilan-rare" value="Jarang" class="form-check-input">
                                                <label class="form-check-label" for="camilan-rare">Jarang</label>
                                            </div>
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="camilan" id="camilan-often" value="Sering" class="form-check-input">
                                                <label class="form-check-label" for="camilan-often">Sering</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="radio" name="camilan" id="camilan-always" value="Selalu" class="form-check-input">
                                                <label class="form-check-label" for="camilan-always">Selalu</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Aktivitas Fisik -->
                                    <div class="mb-3">
                                        <label class="form-label">Frekuensi Aktivitas Fisik</label>
                                        <div class="d-flex flex-wrap">
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="aktivitas" id="aktivitas-never" value="Tidak Pernah" class="form-check-input">
                                                <label class="form-check-label" for="aktivitas-never">Tidak Pernah</label>
                                            </div>
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="aktivitas" id="aktivitas-rare" value="Jarang" class="form-check-input">
                                                <label class="form-check-label" for="aktivitas-rare">Jarang</label>
                                            </div>
                                            <div class="form-check me-3 mb-2">
                                                <input type="radio" name="aktivitas" id="aktivitas-often" value="Sering" class="form-check-input">
                                                <label class="form-check-label" for="aktivitas-often">Sering</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="radio" name="aktivitas" id="aktivitas-always" value="Selalu" class="form-check-input">
                                                <label class="form-check-label" for="aktivitas-always">Selalu</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn-gradient">
                                    <i class="bi bi-calculator me-2"></i> Hitung BMI
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Hasil Perhitungan BMI (Initially Hidden) -->
                <div class="dashboard-card mb-4" id="bmiResult" style="display: none;">
                    <div class="card-header-custom">
                        <i class="bi bi-clipboard2-data me-2"></i> Hasil Perhitungan BMI
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bmi-score-container text-center">
                                    <div class="bmi-score">
                                        <span id="bmiValue">23.5</span>
                                    </div>
                                    <h5 class="mt-3">BMI Anda</h5>
                                    <div class="status-badge status-normal mt-2">
                                        <i class="bi bi-check-circle"></i> Berat Badan Normal
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bmi-info">
                                    <h5>Kategori BMI:</h5>
                                    <ul class="bmi-categories">
                                        <li class="bmi-category"><span class="badge bg-danger">Kekurangan BB</span> &lt; 18.5</li>
                                        <li class="bmi-category"><span class="badge bg-success">Normal</span> 18.5 - 24.9</li>
                                        <li class="bmi-category"><span class="badge bg-warning text-dark">Kelebihan BB</span> 25.0 - 29.9</li>
                                        <li class="bmi-category"><span class="badge bg-danger">Obesitas</span> &gt; 30.0</li>
                                    </ul>
                                    
                                    <div class="info-alert mt-4">
                                        <i class="bi bi-info-circle me-2"></i> BMI tidak selalu menjadi indikator sempurna kesehatan. Konsultasikan dengan profesional kesehatan untuk evaluasi menyeluruh.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rekomendasi Berdasarkan BMI -->
                <div class="dashboard-card mb-4" id="bmiRecommendation" style="display: none;">
                    <div class="card-header-custom">
                        <i class="bi bi-clipboard2-heart me-2"></i> Rekomendasi untuk Anda
                    </div>
                    <div class="card-body">
                        <div id="recommendationContent">
                            <!-- Content will be filled by JavaScript -->
                            <h5>Berdasarkan perhitungan BMI dan informasi yang Anda berikan:</h5>
                            <ul class="recommendation-list">
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pertahankan pola makan sehat dan seimbang</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Lakukan aktivitas fisik setidaknya 30 menit setiap hari</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Batasi konsumsi makanan tinggi gula dan lemak jenuh</li>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> Pastikan cukup tidur (7-8 jam per malam)</li>
                            </ul>
                            <div class="text-end mt-4">
                                <a href="/rekomendasi" class="btn-gradient">
                                    <i class="bi bi-arrow-right me-1"></i> Lihat Rekomendasi Lengkap
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // For demo purposes - show the result sections when form is submitted
        const bmiForm = document.getElementById('bmiForm');
        const bmiResult = document.getElementById('bmiResult');
        const bmiRecommendation = document.getElementById('bmiRecommendation');
        
        if(bmiForm) {
            bmiForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real implementation, you would calculate BMI here
                // For now, just show the results
                bmiResult.style.display = 'block';
                bmiRecommendation.style.display = 'block';
                
                // Scroll to results
                bmiResult.scrollIntoView({behavior: 'smooth'});
            });
        }
    });
</script>
@endpush