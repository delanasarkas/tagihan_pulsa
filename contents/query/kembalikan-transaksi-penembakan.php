<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');
    $kd_penembakan = htmlspecialchars($_POST['kd_penembakan']);
    $kdSales= htmlspecialchars($_POST['kd_sales']);
    $idPelanggan=htmlspecialchars($_POST['id_pelanggan']);
    $transPenembakan=htmlspecialchars($_POST['trans_penenmbakan']);
    $total=htmlspecialchars($_POST['total']);
    $tglPenembakan=htmlspecialchars($_POST['tgl_penembakan']);
    $tglPenambahan=htmlspecialchars($_POST['tgl_penambahan']);
    $tglPenagihan=htmlspecialchars($_POST['tgl_penagihan']);
    $penambahan=htmlspecialchars($_POST['trans_penambahan']);

    //query
    $result = mysqli_query($con,"CALL kembalikan_transaksi_penembakan('".$kd_penembakan."')");

    mysqli_next_result($con);

    $result2 = mysqli_query($con,"CALL insert_transaksi_log(
        '".$kdSales."',
        '".$idPelanggan."',
        '".$kd_penembakan."',
        '".$tglPenembakan."',
        '".$tglPenambahan."',
        '".$tglPenagihan."',
        '".$transPenembakan."',
        '".$penambahan."',
        '".$total."',
        'dikembalikan'
    )");
    mysqli_next_result($con);

?>