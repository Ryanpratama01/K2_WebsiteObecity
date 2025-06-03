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
                             <!-- <div class="legend-color" style="background-color: #424242;"></div> -->
                            <!-- <div class="legend-label">Insufficient</div>  -->
                        </div>
                        <div class="legend-item">
                            <!-- <div class="legend-color" style="background-color: #4CAF50;"></div>
                            <div class="legend-label">Normal</div> -->
                        </div>
                        <div class="legend-item">
                            <!-- <div class="legend-color" style="background-color: #80CBC4;"></div> -->
                            <!-- <div class="legend-label">Overweight</div> -->
                        </div>
                    </div>
                </div>
            </div>
    </div>

   
@endsection

@section('script')
 <script>
        // Line Chart
         fetch('/get-user-data')
        .then(response => response.json())
        .then(data => {
            const userCtx = document.getElementById('userChart').getContext('2d');
            const userChart = new Chart(userCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                             'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Jumlah User',
                        data: data, // ← diisi dari Laravel
                        fill: true,
                        backgroundColor: 'rgba(77, 182, 172, 0.2)',
                        pointBackgroundColor: '#26a69a',
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
                            ticks: {
                                
                                // stepSize: 1
                                //  precision: 0
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
        })
        .catch(error => {
            console.error('Gagal memuat data chart:', error);
        });

        // Donut Chart
        fetch('/bmi-data')
        .then(response => response.json())
        .then(data => {
            const donutCtx = document.getElementById('donutChart').getContext('2d');
            const donutChart = new Chart(donutCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Underweight', 'Normal', 'Overweight', 'Obesitas'],
                    datasets: [{
                        data: data,
                        backgroundColor: ['#424242', '#4CAF50', '#80CBC4', '#FF9800'],
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
        })
        .catch(error => {
            console.error('Gagal memuat data donut chart:', error);
        });
    </script>
@endsection