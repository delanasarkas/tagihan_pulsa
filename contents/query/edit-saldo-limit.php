<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $id_saldo = htmlspecialchars($_POST['idLimit']);
    $saldo = filter_var($_POST['nominalsaldopengirimanubah'], FILTER_SANITIZE_NUMBER_INT);

    $result = mysqli_query($con,"CALL update_saldo_limit('".$id_saldo."','".$saldo."')");

    mysqli_next_result($con);

?>