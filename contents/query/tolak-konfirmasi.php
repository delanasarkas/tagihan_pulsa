<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $id_users = htmlspecialchars($_POST['id_users']);
    $keteranganditolak = htmlspecialchars($_POST['keteranganditolak']);

    $result = mysqli_query($con,"CALL update_setoran_sales_konfirmasi_tolak('".$id_users."','".$keteranganditolak."')");

    mysqli_next_result($con);

?>