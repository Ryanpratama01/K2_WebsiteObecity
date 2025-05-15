<!-- resources/views/beranda.blade.php -->
@extends('layouts.main')

@section('title', 'Obecity Check - Beranda')

@section('content')
    <!-- Dashboard Header -->
    <div class="page-header">
        <div class="container">
            <h3 class="welcome-text text-center">Dashboard Kesehatan Anda</h3>
            <p class="text-center header-subtitle">
                Pantau berat badan dan kesehatan Anda dengan mudah. Catat berat badan terbaru, 
                lihat perkembangan, dan dapatkan rekomendasi yang tepat untuk mencapai target ideal Anda.
            </p>
        </div>
    </div>
    
    <div class="container">
        <!-- Quick Stats -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-speedometer2"></i></div>
                    <h5>BMI Saat Ini</h5>
                    <h3 class="stat-value">23.5</h3>
                    <div class="status-badge status-normal">
                        <i class="bi bi-check-circle"></i> Normal
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-graph-up"></i></div>
                    <h5>Berat Saat Ini</h5>
                    <h3 class="stat-value">60 kg</h3>
                    <div class="status-badge status-info">
                        <i class="bi bi-arrow-down"></i> -1 kg
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-calendar-check"></i></div>
                    <h5>Hari Pencatatan</h5>
                    <h3 class="stat-value">15</h3>
                    <div class="status-badge status-primary">
                        <i class="bi bi-award"></i> Konsisten
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-7">
                <!-- Grafik -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-graph-up me-2"></i> Grafik Perkembangan Berat Badan
                    </div>
                    <div class="card-body">
                        <canvas id="weightChart" height="240"></canvas>
                    </div>
                </div>
                
                <!-- Status BMI -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-info-circle me-2"></i> Status BMI Terkini
                    </div>
                    <div class="card-body">
                        <div class="status-badges-container">
                            <div class="status-badge status-primary">
                                <i class="bi bi-check-circle me-1"></i> Kategori: Normal
                            </div>
                            <div class="status-badge status-info">
                                <i class="bi bi-rulers me-1"></i> BMI: 23.5
                            </div>
                            <div class="status-badge status-info">
                                <i class="bi bi-calendar3 me-1"></i> Update: 29 April 2025
                            </div>
                            <div class="status-badge status-info">
                                <i class="bi bi-arrow-down-circle me-1"></i> Perubahan: -1 kg
                            </div>
                        </div>
                        <div class="info-alert">
                            <i class="bi bi-lightbulb me-2"></i> Anda juga dapat mengecek trend & status badan terakhir untuk melihat hasil perkembanganmu!
                        </div>
                        <div class="text-end">
                            <a href="/detail-status" class="btn-gradient">
                                <i class="bi bi-eye me-1"></i> Lihat Detail Status
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <!-- Input Berat -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-plus-circle me-2"></i> Input Berat Badan Terbaru
                    </div>
                    <div class="card-body">
                        <form id="weightForm">
                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat badan (kg):</label>
                                <select id="weight" class="form-select weight-select">
                                    @for ($i = 30; $i <= 150; $i++)
                                        <option value="{{ $i }}" {{ $i == 60 ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tanggal:</label>
                                <input type="date" id="date" class="form-control weight-select" value="{{ date('Y-m-d') }}">
                            </div>
                            <button type="submit" class="btn-gradient btn-block">
                                <i class="bi bi-save me-2"></i> Simpan Berat Badan
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- Riwayat Berat Badan -->
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <i class="bi bi-clock-history me-2"></i> Riwayat Berat Badan
                    </div>
                    <div class="card-body">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Berat (kg)</th>
                                    <th>Perubahan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>29 Apr 2025</td>
                                    <td>60</td>
                                    <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -1.0</span></td>
                                </tr>
                                <tr>
                                    <td>22 Apr 2025</td>
                                    <td>61</td>
                                    <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -0.5</span></td>
                                </tr>
                                <tr>
                                    <td>15 Apr 2025</td>
                                    <td>61.5</td>
                                    <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -0.5</span></td>
                                </tr>
                                <tr>
                                    <td>08 Apr 2025</td>
                                    <td>62</td>
                                    <td><span class="text-danger"><i class="bi bi-arrow-up-short"></i> +0.5</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-3">
                            <a href="/history" class="btn-gradient">
                                <i class="bi bi-list-ul me-1"></i> Lihat Semua Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk grafik
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('weightChart').getContext('2d');
        
        const gradient = ctx.createLinearGradient(0, 0, 0, 300);
        gradient.addColorStop(0, 'rgba(32, 201, 151, 0.4)');
        gradient.addColorStop(1, 'rgba(32, 201, 151, 0.0)');
        
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Berat Badan (kg)',
                data: [65, 64, 63, 61.5, 60],
                fill: true,
                backgroundColor: gradient,
                borderColor: '#20c997',
                borderWidth: 3,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#20c997',
                pointBorderWidth: 2,
                pointRadius: 5,
                tension: 0.3
            }]
        };
        
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return `Berat: ${context.parsed.y} kg`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            display: true,
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.05)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        };
        
        const weightChart = new Chart(ctx, config);
    });
</script>
@endpush