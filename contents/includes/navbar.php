<?php  

//include koneksi
include('../query/koneksi.php');
//get id
$id = $_SESSION['userId'];
$rolle = $_SESSION['rolle'];
if($rolle=='admin'){
    $queryInvoice = mysqli_query($con,"SELECT a.status_invoice, b.tgl_penagihan 
    FROM invoice_tagihan a, transaksi_penembakan b 
    WHERE a.id_transaksi = b.id_transaksi 
    AND (a.status_invoice = 'belum proses' AND b.tgl_penagihan = CURDATE())");
    $countInvoice = mysqli_num_rows($queryInvoice);

    $queryKonfirmasi = mysqli_query($con,"SELECT * FROM setoran_sales WHERE keterangan='belum konfirmasi' AND tgl_setoran = CURDATE()");
    $countKonfirmasi = mysqli_num_rows($queryKonfirmasi);

    $total = $countInvoice + $countKonfirmasi;
}else{
    $queryInvoice = mysqli_query($con,"SELECT a.status_invoice, b.tgl_penagihan 
    FROM invoice_tagihan a, transaksi_penembakan b 
    WHERE a.id_transaksi = b.id_transaksi 
    AND (a.status_invoice = 'belum proses' AND b.tgl_penagihan = CURDATE()) AND a.id_users = '$id'");
    $countInvoice = mysqli_num_rows($queryInvoice);

    $querySetoran = mysqli_query($con,"SELECT * FROM setoran_sales WHERE keterangan='pending' AND tgl_setoran = CURDATE() AND id_users = '$id'");
    $countSetoran = mysqli_num_rows($querySetoran);

    $total = $countInvoice + $countSetoran;
}

?>
<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="javascript:;">DASHBOARD <?= strtoupper($_SESSION["rolle"]); ?></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
                <div class="input-group">
                    <input type="text" value="" class="form-control" id="cari" placeholder="Cari Disini..." autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text bg-white">
                            <a href="#" id="cari2"><i class="nc-icon nc-zoom-split"></i></a>
                        </div>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i>
                        <span class="badge badge-danger"><?= $total; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if($page=="invoicesales"){echo 'active text-white';}?>" href="invoicesales">
                            Invoice (Tagihan)
                            <span class="badge badge-info"><?= $countInvoice; ?></span>
                        </a>
                        <?php if($_SESSION['rolle'] == 'admin') { ?>
                        <a class="dropdown-item <?php if($page=="setoransales"){echo 'active text-white';}?>" href="konfirmasisetoran">
                            Konfirmasi Setoran
                            <span class="badge badge-info"><?= $countKonfirmasi; ?></span>
                        </a>
                        <?php } ?>
                        <?php if($_SESSION['rolle'] == 'sales') { ?>
                        <a class="dropdown-item <?php if($page=="setoransales"){echo 'active text-white';}?>" href="setoransales">
                            Status Setoran
                            <span class="badge badge-info"><?= $countSetoran; ?></span>
                        </a>
                        <?php } ?>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:;" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-single-02"></i> AKUN ANDA
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if($page=="profil"){echo 'active text-white';}?>" href="profil?id_users=<?= $_SESSION["userId"]; ?>"><i class="fa fa-user fa-fw"></i> <?= $_SESSION['namaDepan']; ?> </a>
                        <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>