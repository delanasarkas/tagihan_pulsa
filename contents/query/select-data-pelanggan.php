<?php

//akses
include('hak-akses.php');

//panggil prosedur select all
if($rolle == 'admin'){
    $result = mysqli_query($con, "CALL select_pelanggan_all()");
    mysqli_next_result($con);
} else {
    //berdasarkan id sales
    $result = mysqli_query($con, "CALL select_pelanggan_by_sales('".$id."')");
    mysqli_next_result($con);
}

?>