// dashboard.js
document.addEventListener('DOMContentLoaded', function () {
    // Fetch data from the server
    fetch('getData.php')
        .then(response => response.json())
        .then(data => {
            // Render chart using Chart.js
            renderChart(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

    function renderChart(data) {
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
                scales: {
                    x: {
                        type: 'category',
                        labels: data.labels,
                    },
                    y: {
                        beginAtZero: true,
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
            },
        });
    }
});
