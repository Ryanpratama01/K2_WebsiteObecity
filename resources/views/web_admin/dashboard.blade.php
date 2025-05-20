@extends('web_admin.app')
@section('contents')
<div class="container">
            <div class="welcome-card">
                <h1 class="welcome-title">Selamat Datang Kembali Admin</h1>
                <p class="welcome-subtitle">Di Dashboard Admin</p>
            </div>
            
            <div class="stats-container">
                <div class="stats-card">
                    <div class="stats-title">Jumlah User Bulan/Tahun</div>
                    <div class="chart-container">
                        <canvas id="userChart"></canvas>
                    </div>
                </div>
                
                <div class="stats-card">
                    <div class="stats-title">Persentase Pengguna</div>
                    <div class="donut-container">
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div class="legend">
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #424242;"></div>
                            <div class="legend-label">Insufficient</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #4CAF50;"></div>
                            <div class="legend-label">Normal</div>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color" style="background-color: #80CBC4;"></div>
                            <div class="legend-label">Overweight</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <script>
        // Line Chart
        const userCtx = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(userCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Jumlah User',
                    data: [35, 40, 30, 45, 35, 55, 65, 60, 80, 75, 65, 80],
                    fill: true,
                    backgroundColor: 'rgba(77, 182, 172, 0.2)',
                    borderColor: '#26a69a',
                    pointBackgroundColor: '#26a69a',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        ticks: {
                            stepSize: 20
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Donut Chart
        const donutCtx = document.getElementById('donutChart').getContext('2d');
        const donutChart = new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Insufficient', 'Normal', 'Overweight'],
                datasets: [{
                    data: [30, 45, 25],
                    backgroundColor: ['#424242', '#4CAF50', '#80CBC4'],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
@endsection