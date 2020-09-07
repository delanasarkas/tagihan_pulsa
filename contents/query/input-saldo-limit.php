<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    $nameDepan = $_SESSION['namaDepan'];
    $nameBelakang = $_SESSION['namaBelakang'];

    //variable
    $id_sales = htmlspecialchars($_POST['namasales']);
    $saldo = filter_var($_POST['nominalsaldopengiriman'], FILTER_SANITIZE_NUMBER_INT);

    $resultcek = mysqli_query($con,"CALL select_sales_by_id(
        '".$id_sales."'
    )");
    $data = mysqli_fetch_assoc($resultcek);
    $ambilSaldo = $data['limits'];
    $fixSaldo = $saldo + $ambilSaldo;

    mysqli_next_result($con);

    $result = mysqli_query($con,"CALL insert_saldo_limit(
        '".$id_sales."',
        '".$nameDepan." ".$nameBelakang."',
        '".$saldo."'
    )");
    mysqli_next_result($con);

?>