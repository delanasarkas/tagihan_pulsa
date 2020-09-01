<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');
    $id_sales2 = htmlspecialchars($_POST['id_sales2']);

    //query
    $result = mysqli_query($con,"CALL delete_sales_by_id('".$id_sales2."')");

    mysqli_next_result($con);

?>