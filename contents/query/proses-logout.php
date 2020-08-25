<?php
    //deklarasi hapus
    session_start();
    session_unset();
    session_destroy();

    //kosongkan session
    $_SESSION["userId"] = "";
    $_SESSION['email'] = "";
    $_SESSION['namaDepan'] = "";
    $_SESSION['bio'] = "";
    $_SESSION['rolle'] = "";
    
    //hapus cookie 
    setcookie ("user_login","");
    setcookie ("userpassword","");

    //kembali ke login
    header('location:../../index.php?halaman=login&messageLogout=logoutberhasil');
    exit();
    
?>