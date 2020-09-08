<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $kodepenembakan = htmlspecialchars($_POST['kodepenembakan']);
    $id = $_SESSION['userId'];
    $kodesales = $id;
    $namasales =  htmlspecialchars($_POST['namasales']);
    $namapelanggan = htmlspecialchars($_POST['namapelanggan']);
    $tanggalpenembakan = htmlspecialchars($_POST['tanggalpenembakan']);
    $tanggalpenagihan = htmlspecialchars($_POST['tanggalpenagihan']);
    $jumlahtransaksipenembakan = filter_var($_POST['sisatransaksipenembakan'], FILTER_SANITIZE_NUMBER_INT);

    $transaksiPenambahan = filter_var($_POST['jumlahpenambahantransaksipenembakan'], FILTER_SANITIZE_NUMBER_INT);
    $totalPenambahan = filter_var($_POST['totaltransaksipenembakan'], FILTER_SANITIZE_NUMBER_INT);

    $result = mysqli_query($con,"CALL insert_transaksi_penambahan(
        '".$transaksiPenambahan."',
        '".$totalPenambahan."',
        '".$namasales."',
        '".$kodepenembakan."'
    )");
    mysqli_next_result($con);

    $result2 = mysqli_query($con,"CALL insert_transaksi_log(
        '".$kodesales."',
        '".$namapelanggan."',
        '".$kodepenembakan."',
        '".$tanggalpenembakan."',
        CURDATE(),
        '".$tanggalpenagihan."',
        '".$jumlahtransaksipenembakan."',
        '".$transaksiPenambahan."',
        '".$totalPenambahan."',
        'update'
    )");
    mysqli_next_result($con);

?>