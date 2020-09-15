<?php

    //session

    //belum konfirmasi
    $result3 = mysqli_query($con, "SELECT * FROM setoran_sales WHERE keterangan = 'belum konfirmasi'");
    $count = mysqli_num_rows($result3);
    mysqli_next_result($con);
    //diterima
    $result4 = mysqli_query($con, "SELECT * FROM setoran_sales WHERE keterangan = 'diterima'");
    $count2 = mysqli_num_rows($result4);
    mysqli_next_result($con);
    //ditolak
    $result5 = mysqli_query($con, "SELECT * FROM setoran_sales WHERE keterangan = 'ditolak'");
    $count3 = mysqli_num_rows($result5);
    mysqli_next_result($con);

?>
<script>
    var label = ["Belum Konfirmasi","Diterima","Ditolak"];
    var color = ["rgb(54, 162, 235)","rgb(75, 192, 192)","rgb(255, 99, 132)"];

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    '<?php echo json_encode($count); ?>',
                    '<?php echo json_encode($count2); ?>',
                    '<?php echo json_encode($count3); ?>'
                ],
                backgroundColor: this.color,
            }],
            labels: this.label
        },
        options: {
            responsive: true
        }
    };

    window.onload = function () {
        var ctx = document.getElementById('chart-kofirmasisetoran').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };
</script>