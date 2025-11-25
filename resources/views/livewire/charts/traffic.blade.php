<div>
    <canvas id="trafficChart" height="300px"></canvas>

    <script>
        document.addEventListener('livewire:init', _ => {
            // Get chart context
            let ctx = document.getElementById('trafficChart').getContext('2d');
            // Create the chart
            let chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($labels),
                    datasets: [
                        {
                            label: 'Sales',
                            data: @json($sales),
                            borderWidth: 2,
                            tension: 0.3
                        },
                        {
                            label: 'Revenue',
                            data: @json($revenue),
                            borderWidth: 2,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });
            // Auto update the chart
            Livewire.on('updateChart', data => {
                chart.data.labels = data.labels;
                chart.data.datasets[0].data = data.sales;
                chart.data.datasets[1].data = data.revenue;
                chart.update();
            });
            // Auto update every 3 secs
            // let update = setInterval(() => {
            //     Livewire.find(@js($this->id)).call('generateData');
            // }, 3000);
        });
    </script>
</div>
