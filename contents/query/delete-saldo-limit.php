<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');
    
    $id_saldo = htmlspecialchars($_POST['idLimit']);

    //query
    $result = mysqli_query($con,"CALL delete_saldo_limit_by_id('".$id_saldo."')");

    mysqli_next_result($con);

?>