<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //get id
    $id = $_SESSION['userId'];
    $name = $_SESSION['namaDepan'];

    //variable
    $nama_pelanggan = htmlspecialchars(ucwords($_POST['nama_pelanggan']));
    $alamat_pelanggan = htmlspecialchars(ucwords($_POST['alamat_pelanggan']));
    $nomor_telepon = htmlspecialchars($_POST['nomor_telepon']);
    $status_aktif = htmlspecialchars($_POST['status_aktif']);

    $result = mysqli_query($con,"CALL insert_pelanggan(
        '".$id."',
        '".$nama_pelanggan."',
        '".$alamat_pelanggan."',
        '".$nomor_telepon."',
        '".$status_aktif."',
        CURDATE(),
        '".$name."'
    )");
    mysqli_next_result($con);

?>