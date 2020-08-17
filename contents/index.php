<?php
//include header
include("includes/header.php");

//include main
$pages = (ISSET($_GET['halaman']))?$_GET['halaman']:"main";
switch($pages){
    case'dashboard':
        include("dashboard/dashboard.php");
        break;
    case'main':
    default:
        include("dashboard/dashboard.php");
}
//include footer
include("includes/scripts.php");
?>