<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $id_users = htmlspecialchars($_POST['id_users']);
    $status_aktif = htmlspecialchars($_POST['status_aktif']);

    $result = mysqli_query($con,"CALL update_sales('".$id_users."','".$status_aktif."')");

    mysqli_next_result($con);

?>