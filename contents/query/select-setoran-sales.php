<?php

//akses
include('hak-akses.php');

//panggil prosedur select all
if($rolle == 'admin'){
    $result = mysqli_query($con, "CALL select_setoran_sales_all()");
    mysqli_next_result($con);
    $result2 = mysqli_query($con, "CALL select_setoran_sales_pending_all()");
    $count = mysqli_num_rows($result2);
    mysqli_next_result($con);
}else{
    $result = mysqli_query($con, "CALL select_setoran_sales('".$id."')");
    mysqli_next_result($con);
    $result2 = mysqli_query($con, "CALL select_setoran_sales_pending('".$id."')");
    $count = mysqli_num_rows($result2);
    mysqli_next_result($con);
}

?>