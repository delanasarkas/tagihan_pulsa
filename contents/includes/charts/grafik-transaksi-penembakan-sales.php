<?php

    //aktif
    $result3 = mysqli_query($con, "CALL select_transaksi_penembakan_for_sales('".$id."')");
    mysqli_next_result($con);
    //tidak aktif
    $result4 = mysqli_query($con, "CALL select_transaksi_penembakan_for_sales('".$id."')");
    mysqli_next_result($con);

?>
	<script>
        var nama_pelanggan = [<?php while ($nama_pelanggan = mysqli_fetch_assoc($result3)) { echo '"' . $nama_pelanggan['nama_pelanggan'] . '",';}?>];
        var total = [<?php while ($total = mysqli_fetch_assoc($result4)) { echo '"'. $total['total'] . '",';}?>];
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: nama_pelanggan,
				datasets: [{
					label: '',
					data: total,
					backgroundColor:'rgba(255, 99, 132, 0.2)',
					borderColor:'rgba(255,99,132,1)',
					borderWidth: 1
				}]
			},
			options: {
                legend: {
                    display: false
                },
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>