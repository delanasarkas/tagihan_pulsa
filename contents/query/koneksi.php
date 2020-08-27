<?php

    //inisialisasi variable
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "tagihan_pulsa";
    
    //koneksi
    $con = mysqli_connect($server, $user, $pass, $database) or die("database tidak terhubung");

?>