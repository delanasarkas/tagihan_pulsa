<?php

//akses
include('hak-akses.php');

//panggil prosedur select all
if($rolle == 'admin'){
    $result = mysqli_query($con, "CALL select_sales_all()");
    mysqli_next_result($con);
}

?>