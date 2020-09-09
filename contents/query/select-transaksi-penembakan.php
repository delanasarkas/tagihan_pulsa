<?php

    //akses
    include('hak-akses.php');

    if($rolle == 'admin'){
        $resultSelect = mysqli_query($con, "CALL select_transaksi_penembakan()");
        mysqli_next_result($con);
    } else if($rolle == 'sales'){
        $resultSelect = mysqli_query($con, "CALL select_transaksi_penembakan_by_sales('".$id."')");
        mysqli_next_result($con);
    }

?>