<?php

    //session
    session_start();

    //akses
    include('hak-akses.php');
    
    //include koneksi
    include('koneksi.php');

    //variable
    $idSales = $_SESSION['userId'];
    $kodeInvoice = htmlspecialchars($_POST['kode_invoice']);
    $idPelanggan = htmlspecialchars($_POST['idpelanggan']);
    $idTransaksi = htmlspecialchars($_POST['idtransaksi']);
    $tanggalsetoran =  htmlspecialchars($_POST['tanggalsetoran']);
    $limitsaldo = filter_var($_POST['limitsaldo'], FILTER_SANITIZE_NUMBER_INT);
    $jumlahsetoran = filter_var($_POST['jumlahsetoran'], FILTER_SANITIZE_NUMBER_INT);
    $hasil = filter_var($_POST['hasil'], FILTER_SANITIZE_NUMBER_INT);

    $result = mysqli_query($con,"CALL insert_setoran_sales(
        '".$idSales."',
        '".$idPelanggan."',
        '".$idTransaksi."',
        '".$kodeInvoice."',
        '".$jumlahsetoran."',
        '".$tanggalsetoran."'
    )");
    mysqli_next_result($con);

    //jika setoran lunas
    if($hasil == 0){
        $result2 = mysqli_query($con,"CALL update_transaksi_after_setor_lunas(
            '".$idTransaksi."'
        )");
        mysqli_next_result($con);
        $result3 = mysqli_query($con,"CALL update_invoice_after_setor(
            '".$kodeInvoice."'
        )");
        mysqli_next_result($con);
        $result4 = mysqli_query($con,"CALL update_pelanggan_after_setor_lunas(
            '".$idPelanggan."'
        )");
        mysqli_next_result($con);
    } else {
        $result2 = mysqli_query($con,"CALL update_transaksi_after_setor_belum_lunas(
            '".$jumlahsetoran."',
            '".$idTransaksi."'
        )");
        mysqli_next_result($con);
    }

?>