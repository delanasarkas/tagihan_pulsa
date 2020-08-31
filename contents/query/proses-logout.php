<?php
    //deklarasi hapus
    session_start();

    //akses
    include('hak-akses.php');
    
    session_unset();
    session_destroy();

    //kosongkan session
    $_SESSION = [];
    
    //hapus cookie 
    setcookie ('user_login','',time() - (60 * 60 * 24 * 7), '/');
    setcookie ('user_password','',time() - (60 * 60 * 24 * 7), '/');

    //kembali ke login
    header('location:../../index.php?halaman=login&messageLogout=logoutberhasil');
    exit;
    
?>