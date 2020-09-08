<?php

//akses
include('hak-akses.php');

    $resultSelect = mysqli_query($con, "CALL select_transaksi_penembakan()");
    mysqli_next_result($con);

?>