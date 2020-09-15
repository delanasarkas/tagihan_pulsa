<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $id_users = htmlspecialchars($_POST['id_users']);

    $result = mysqli_query($con,"CALL update_setoran_sales_konfirmasi_terima('".$id_users."')");

    mysqli_next_result($con);

?>