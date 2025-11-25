<div>
    <canvas id="projectChart" height="300px"></canvas>

    <script>
        document.addEventListener('livewire:init', _ => {
            // Get chart context
            let ctx = document.getElementById('projectChart').getContext('2d');
            // Create the chart
            let chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Finished', 'Binding', 'In Progress'],
                    datasets: [
                        {
                            label: 'Projects',
                            data: [30,60,5],
                            backgroundColor: [
                                '#f65c5c90',
                                '#ffcd5690',
                                '#36a2eb90',
                            ],
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    hoverOffset: 5
                }
            });
        });
    </script>
</div>
