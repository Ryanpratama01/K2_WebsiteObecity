<!-- resources/views/history.blade.php -->
@extends('layouts.main')

@section('title', 'Obecity Check - Riwayat Berat Badan')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h3 class="welcome-text text-center">Riwayat Berat Badan</h3>
            <p class="text-center header-subtitle">
                Lihat perkembangan berat badan Anda dari waktu ke waktu dan analisis perubahan yang terjadi
                untuk membantu mencapai target kesehatan ideal.
            </p>
        </div>
    </div>
    
    <div class="container">
        <!-- Summary Stats -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-hourglass-split"></i></div>
                    <h5>Berat Awal</h5>
                    <h3 class="stat-value">70 kg</h3>
                    <div class="status-badge status-warning">
                        <i class="bi bi-calendar-check"></i> 1 Apr 2025
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-graph-up"></i></div>
                    <h5>Berat Terkini</h5>
                    <h3 class="stat-value">68 kg</h3>
                    <div class="status-badge status-primary">
                        <i class="bi bi-calendar-check"></i> 13 Apr 2025
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-arrow-down-circle"></i></div>
                    <h5>Perubahan Total</h5>
                    <h3 class="stat-value">-2 kg</h3>
                    <div class="status-badge status-success">
                        <i class="bi bi-check-circle"></i> Progres Baik
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="dashboard-card stat-card">
                    <div class="stat-icon"><i class="bi bi-speedometer2"></i></div>
                    <h5>Rata-rata Per Minggu</h5>
                    <h3 class="stat-value">-0.5 kg</h3>
                    <div class="status-badge status-info">
                        <i class="bi bi-lightning-charge"></i> Konsisten
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <!-- Filter -->
                <div class="dashboard-card mb-4">
                    <div class="card-header-custom">
                        <i class="bi bi-funnel me-2"></i> Filter Data
                    </div>
                    <div class="card-body">
                        <form id="filterForm">
                            <div class="mb-3">
                                <label for="dateRange" class="form-label">Rentang Waktu:</label>
                                <select id="dateRange" class="form-select weight-select">
                                    <option value="1">1 Bulan Terakhir</option>
                                    <option value="3" selected>3 Bulan Terakhir</option>
                                    <option value="6">6 Bulan Terakhir</option>
                                    <option value="12">1 Tahun Terakhir</option>
                                    <option value="all">Semua Data</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="fromDate" class="form-label">Dari Tanggal:</label>
                                <input type="date" id="fromDate" class="form-control weight-select">
                            </div>
                            <div class="mb-3">
                                <label for="toDate" class="form-label">Sampai Tanggal:</label>
                                <input type="date" id="toDate" class="form-control weight-select" value="{{ date('Y-m-d') }}">
                            </div>
                            <button type="submit" class="btn-gradient btn-block">
                                <i class="bi bi-search me-2"></i> Tampilkan Data
                            </button>
                        </form>
                    </div>
                </div>
                
                <!-- BMI Status Info -->
                <div class="dashboard-card">
                    <div class="card-header-custom">
                        <i class="bi bi-info-circle me-2"></i> Informasi Status BMI
                    </div>
                    <div class="card-body">
                        <div class="info-alert mb-3">
                            <i class="bi bi-lightbulb me-2"></i> Status BMI membantu Anda mengetahui kondisi berat badan ideal.
                        </div>
                        <div class="status-badges-container mb-3">
                            <div class="status-badge status-danger">
                                <i class="bi bi-exclamation-circle me-1"></i> Overweight: BMI > 25
                            </div>
                            <div class="status-badge status-warning">
                                <i class="bi bi-exclamation me-1"></i> Slightly Over: BMI 23-25
                            </div>
                            <div class="status-badge status-success">
                                <i class="bi bi-check-circle me-1"></i> Normal: BMI 18.5-23
                            </div>
                            <div class="status-badge status-info">
                                <i class="bi bi-exclamation-triangle me-1"></i> Underweight: BMI < 18.5
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="/detail-status" class="btn-gradient">
                                <i class="bi bi-calculator me-1"></i> Hitung BMI Saya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Time Line -->
        <div class="dashboard-card mt-4">
            <div class="card-header-custom">
                <i class="bi bi-clock-history me-2"></i> Timeline Riwayat Berat Badan
            </div>
            <div class="card-body">
                <table class="table table-custom">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Berat Badan (kg)</th>
                            <th>Perubahan</th>
                            <th>Status BMI</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>13 Apr 2025</td>
                            <td>68.0</td>
                            <td><span class="text-muted"><i class="bi bi-dash"></i> 0.0</span></td>
                            <td>
                                <div class="status-badge status-success">
                                    <i class="bi bi-check-circle me-1"></i> Normal
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>10 Apr 2025</td>
                            <td>68.0</td>
                            <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -0.5</span></td>
                            <td>
                                <div class="status-badge status-success">
                                    <i class="bi bi-check-circle me-1"></i> Normal
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>7 Apr 2025</td>
                            <td>68.5</td>
                            <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -0.5</span></td>
                            <td>
                                <div class="status-badge status-warning">
                                    <i class="bi bi-exclamation me-1"></i> Slightly Over
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>4 Apr 2025</td>
                            <td>69.0</td>
                            <td><span class="text-success"><i class="bi bi-arrow-down-short"></i> -1.0</span></td>
                            <td>
                                <div class="status-badge status-warning">
                                    <i class="bi bi-exclamation me-1"></i> Slightly Over
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>1 Apr 2025</td>
                            <td>70.0</td>
                            <td><span class="text-muted"><i class="bi bi-dash"></i> Data Awal</span></td>
                            <td>
                                <div class="status-badge status-danger">
                                    <i class="bi bi-exclamation-circle me-1"></i> Overweight
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil"></i></button>
                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="pagination-info">
                        Menampilkan 5 dari 15 data
                    </div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="mt-4 mb-5 text-center">
            <a href="/beranda" class="btn-gradient me-2">
                <i class="bi bi-house me-1"></i> Kembali ke Beranda
            </a>
            <a href="/export-data" class="btn-gradient-secondary">
                <i class="bi bi-download me-1"></i> Export Data
            </a>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Initialize any scripts needed for the history page
    document.addEventListener('DOMContentLoaded', function() {
        // Add any JavaScript functionality here if needed
    });
</script>
@endpush