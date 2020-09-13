<?php

//akses
include('hak-akses.php');

//panggil prosedur select all
if($rolle == 'admin'){
    $result = mysqli_query($con, "CALL select_invoice_tagihan_all()");
    mysqli_next_result($con);
    $result2 = mysqli_query($con, "CALL select_invoice_tagihan_belum_proses_all()");
    $count = mysqli_num_rows($result2);
    mysqli_next_result($con);
}else{
    $result = mysqli_query($con, "CALL select_invoice_tagihan_sales('".$id."')");
    mysqli_next_result($con);
    $result2 = mysqli_query($con, "CALL select_invoice_tagihan_belum_proses_sales('".$id."')");
    $count = mysqli_num_rows($result2);
    mysqli_next_result($con);
}

?>