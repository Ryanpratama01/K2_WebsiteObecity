// Membuat Chart.js untuk grafik
const ctx = document.getElementById('weightChart').getContext('2d');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
            label: 'Berat Badan',
            data: [60, 61, 59, 62, 61],
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.3,
            fill: true
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});

// AJAX Navigasi + Animasi untuk transisi antar halaman
document.querySelectorAll('.nav-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const url = this.getAttribute('href');
        const content = document.getElementById('content');

        // Menambahkan animasi fade-out
        content.classList.add('fade-out');
        
        fetch(url)
            .then(res => res.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.getElementById('content').innerHTML;

                // Setelah animasi fade-out, mengganti konten dan menambah animasi fade-in
                setTimeout(() => {
                    content.innerHTML = newContent;
                    content.classList.remove('fade-out');
                    content.classList.add('fade-in');
                }, 300);
            });
    });
});
