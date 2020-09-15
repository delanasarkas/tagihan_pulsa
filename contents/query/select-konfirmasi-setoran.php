<?php

//akses
include('hak-akses.php');

//panggil prosedur select all
if($rolle == 'admin'){
    $result = mysqli_query($con, "CALL select_konfirmasi_setoran_all()");
    mysqli_next_result($con);
    $result2 = mysqli_query($con, "CALL select_konfirmasi_setoran_belumkonf_all()");
    $count = mysqli_num_rows($result2);
    mysqli_next_result($con);
}

?>