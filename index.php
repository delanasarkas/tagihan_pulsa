<?php
//include header
include("contents/login/header.php");

//include main
$pages = (ISSET($_GET['halaman']))?$_GET['halaman']:"main";
switch($pages){
    case'login':
        include("contents/login/login.php");
        break;
    case'daftar':
        include("contents/login/register.php");
        break;
    case'whatsapp':
        echo "<script>window.location.href='https://api.whatsapp.com/send?phone=+6285780167941&text=Silahkan Chat Kepada Admin Mengenai Laporan atau Saran Anda Sebagai Sales'</script>";
        break;
    case'main':
    default:
        include("contents/login/login.php");
}
//include footer
include("contents/login/scripts.php");
?>