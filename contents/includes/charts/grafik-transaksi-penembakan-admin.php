<?php

    //aktif
    $result3 = mysqli_query($con, "CALL select_transaksi_penembakan_for_admin()");
    mysqli_next_result($con);
    //tidak aktif
    $result4 = mysqli_query($con, "CALL select_transaksi_penembakan_for_admin()");
    mysqli_next_result($con);


?>

<script>
    var nama_sales = [<?php while ($nama_sales = mysqli_fetch_assoc($result3)) { echo '"' . $nama_sales['nama_depan'] . '",';}?>];
    var total = [<?php while ($total = mysqli_fetch_assoc($result4)) { echo '"' . $total['total'] . '",';}?>];
    var config = {
        type: 'line',
        data: {
            labels: nama_sales,
            datasets: [{
                label: 'Rp ',
                backgroundColor: window.chartColors.red,
                borderColor: window.chartColors.red,
                data: total,
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
        var ctx = document.getElementById('myChart').getContext('2d');
        window.myLine = new Chart(ctx, config);
    };

</script>