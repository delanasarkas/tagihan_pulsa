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
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" id="cari" placeholder="Cari Disini..." autocomplete="off">
                    <div class="input-group-append">
                        <div class="input-group-text">
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
                        <span class="badge badge-danger">5</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if($page=="invoicesales"){echo 'active';}?>" href="invoicesales">
                            Invoice (Tagihan)
                            <span class="badge badge-info">3</span>
                        </a>
                        <?php if($_SESSION['rolle'] == 'admin') { ?>
                        <a class="dropdown-item" href="konfirmasisetoran">
                            Konfirmasi Setoran
                            <span class="badge badge-info">2</span>
                        </a>
                        <?php } ?>
                        <a class="dropdown-item" href="setoransales">
                            Status Setoran
                            <span class="badge badge-info">2</span>
                        </a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript::" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-single-02"></i> AKUN ANDA
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item <?php if($page=="profil"){echo 'active text-white';}?>" href="profil?id_users=<?= $_SESSION["userId"]; ?>"><i class="fa fa-user fa-fw"></i> <?= $_SESSION['namaDepan']; ?> </a>
                        <a class="dropdown-item" href="javascript::" data-toggle="modal" data-target="#modalKeluar"><i class="fas fa-sign-out-alt fa-fw"></i> Keluar</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>