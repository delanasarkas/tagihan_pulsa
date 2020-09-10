<?php

    //session

    if($rolle=='admin'){
        //baru
        $result3 = mysqli_query($con, "CALL select_transaksi_penembakan_log_baru_admin");
        $count = mysqli_num_rows($result3);
        mysqli_next_result($con);
        //penambahan
        $result4 = mysqli_query($con, "CALL select_transaksi_penembakan_log_penambahan_admin");
        $count2 = mysqli_num_rows($result4);
        mysqli_next_result($con);
        //dikembalikan
        $result5 = mysqli_query($con, "CALL select_transaksi_penembakan_log_dikembalikan_admin");
        $count3 = mysqli_num_rows($result5);
        mysqli_next_result($con);
    } else {
        //baru
        $result3 = mysqli_query($con, "CALL select_transaksi_penembakan_log_baru_sales('".$id."')");
        $count = mysqli_num_rows($result3);
        mysqli_next_result($con);
        //penambahan
        $result4 = mysqli_query($con, "CALL select_transaksi_penembakan_log_penambahan_sales('".$id."')");
        $count2 = mysqli_num_rows($result4);
        mysqli_next_result($con);
        //dikembalikan
        $result5 = mysqli_query($con, "CALL select_transaksi_penembakan_log_dikembalikan_sales('".$id."')");
        $count3 = mysqli_num_rows($result5);
        mysqli_next_result($con);
    }
?>
<script>
    var label = ["Data Baru", "Data Penambahan", "Data Dikembalikan"];
    var color = ["rgb(75, 192, 192)", "rgb(255, 152, 41)", "rgb(255, 99, 132)"];

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
        var ctx = document.getElementById('chart-datasales').getContext('2d');
        window.myPie = new Chart(ctx, config);
    };
</script>