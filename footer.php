</div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/tooltip.js"></script>

    <script src="js/bootstrap.min.js"></script>
	
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="js/bootstrapValidator.min.js"></script>

    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scroll-up-bar.min.js"></script>
    <script src="js/sa-functions.js"></script>
    <script src="js/chart.min.js"></script>
    
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    label: 'Statistics',
                    data: [460, 458, 330, 502, 430, 610, 488],
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });

        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    label: 'Statistics',
                    data: [460, 458, 330, 502, 430, 610, 488],
                    borderWidth: 2,
                    backgroundColor: 'rgb(87,75,144)',
                    borderColor: 'rgb(87,75,144)',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
    
    <script src="js/summernote-lite.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>