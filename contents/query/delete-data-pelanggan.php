<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');
    $id_pelanggan2 = htmlspecialchars($_POST['id_pelanggan2']);

    //query
    $result = mysqli_query($con,"CALL delete_pelanggan_by_id('".$id_pelanggan2."')");

    mysqli_next_result($con);

?>