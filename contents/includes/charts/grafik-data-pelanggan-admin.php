<?php


?>

<script>
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
        'November', 'December'
    ];
    var config = {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: '',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: [
                    10,
                    12,
                    7,
                    20,
                    6,
                    11,
                    70
                ],
                fill: false,
            }]
        },
        options: {
            legend: {
                display: false
            },
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
                x: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Sales'
                    }
                },
                y: {
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Jumlah Pelanggan'
                    }
                }
            }
        }
    };

    window.onload = function () {
        var ctx = document.getElementById('canvas').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };

</script>