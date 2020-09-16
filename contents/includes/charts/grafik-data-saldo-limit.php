<?php

    $result3 = mysqli_query($con, "CALL select_sum_saldo_limit_sales");
    mysqli_next_result($con);
    $result4 = mysqli_query($con, "CALL select_sum_saldo_limit_sales");
    mysqli_next_result($con);

?>

<script>
    var nama_sales = [<?php while ($nama_sales = mysqli_fetch_assoc($result3)) { echo '"' . $nama_sales['nama_depan'] . '",';}?>];
    var jumlah_saldo = [<?php while ($jumlah_saldo = mysqli_fetch_assoc($result4)) { echo '"' . $jumlah_saldo['limits'] . '",';}?>];
    var config = {
        type: 'line',
        data: {
            labels: nama_sales,
            datasets: [{
                label: 'Rp ',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: jumlah_saldo,
                fill: true,
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
                    ticks: {
							callback: function(tick) {
								return 'Rp '+tick.toString();
							}
					},
                    display: true,
                    scaleLabel: {
                        display: true,
                        labelString: 'Total Saldo'
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