<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');
    //get id
    $id = $_SESSION['userId'];
    
     //variable
     $kodepenembakan = htmlspecialchars($_POST['kodepenembakan']);
     $kodesales = $id;
     $namasales =  htmlspecialchars($_POST['namasales']);
     $namapelanggan = htmlspecialchars($_POST['namapelanggan']);
     $tanggalpenembakan = htmlspecialchars($_POST['tanggalpenembakan']);
     $tanggalpenagihan = htmlspecialchars($_POST['tanggalpenagihan']);
     $jumlahtransaksipenembakan = filter_var($_POST['jumlahtransaksipenembakan'], FILTER_SANITIZE_NUMBER_INT);

     $result = mysqli_query($con,"CALL insert_transaksi_baru(
         '".$kodesales."',
         '".$namapelanggan."',
         '".$kodepenembakan."',
         '".$tanggalpenembakan."',
         '".$tanggalpenagihan."',
         '".$jumlahtransaksipenembakan."',
         '".$jumlahtransaksipenembakan."',
         '".$namasales."'
     )");
     mysqli_next_result($con);
 
     $result2 = mysqli_query($con,"CALL insert_transaksi_log(
         '".$kodesales."',
         '".$namapelanggan."',
         '".$kodepenembakan."',
         '".$tanggalpenembakan."',
         NULL,
         '".$tanggalpenagihan."',
         '".$jumlahtransaksipenembakan."',
         NULL,
         '".$jumlahtransaksipenembakan."',
         'baru'
     )");
     mysqli_next_result($con);
    
?>