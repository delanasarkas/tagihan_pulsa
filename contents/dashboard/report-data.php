<?php
  $page = 'reportdata';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Report Harian
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <?php
    include("../includes/css.php");
  ?>
</head>

<body class="">
    <div class="wrapper ">
        <!-- Sidebar -->
        <?php
      include("../includes/sidebar.php");
    ?>
        <div class="main-panel bg-white">
            <!-- Navbar -->
            <?php
      include("../includes/navbar.php");
    ?>
            <!-- End Navbar -->
            <!-- Main -->
            <div class="content bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-stats shadow">
                            <div class="card-header">
                                <div class="mobile">
                                    <h3 class="card-title d-inline title-table">REPORT DATA MASIKA RELOAD</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="../../assets/image/dashboard/report.png" alt="..." class="img-fluid rounded-circle">
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="jumbotron bg-white">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <h5 class="card-title">Report Harian</h5>
                                                    <p class="card-text">Data report harian ini untuk mencetak data transaksi setoran yang dilakukan oleh sales masika reload.</p>
                                                    <a href="#" class="btn btn-outline-primary btn-round"><i class="fas fa-print"></i> Cetak Harian</a>
                                                    <hr class="my-4">
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5 class="card-title">Report Bulanan</h5>
                                                    <p class="card-text">Data report bulanan ini untuk mencetak data transaksi setoran yang dilakukan oleh sales masika reload.</p>
                                                    <a href="#" class="btn btn-outline-primary btn-round"><i class="fas fa-print"></i> Cetak Bulanan</a>
                                                    <hr class="my-4">
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5 class="card-title">Report Tahunan</h5>
                                                    <p class="card-text">Data report tahunan ini untuk mencetak data transaksi setoran yang dilakukan oleh sales masika reload.</p>
                                                    <a href="#" class="btn btn-outline-primary btn-round"><i class="fas fa-print"></i> Cetak Tahunan</a>
                                                    <hr class="my-4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Data Terupdate
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Main -->
            <!-- Footer -->
            <?php
      include("../includes/footer.php");
      ?>
        </div>
    </div>
    <?php
    include("../includes/scripts.php");
  ?>
</body>

</html>