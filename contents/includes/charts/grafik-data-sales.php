<?php

    //session

    //aktif
    $result3 = mysqli_query($con, "CALL select_sales_aktif");
    $count = mysqli_num_rows($result3);
    mysqli_next_result($con);
    //tidak aktif
    $result4 = mysqli_query($con, "CALL select_sales_nonaktif");
    $count2 = mysqli_num_rows($result4);
    mysqli_next_result($con);

?>
<script>
    var label = ["Aktif","Tidak Aktif"];
    var color = ["rgb(75, 192, 192)","rgb(255, 99, 132)"];

    var config = {
        type: 'pie',
        data: {
            datasets: [{
                data: [
                    '<?php echo json_encode($count); ?>',
                    '<?php echo json_encode($count2); ?>',
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