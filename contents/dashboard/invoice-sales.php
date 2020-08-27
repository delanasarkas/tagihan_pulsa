<?php
  $page = 'invoicesales';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Invoice Sales
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <?php
    include("../includes/css.php");
  ?>
</head>

<body class="">
  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Invoice</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("invoice-sales-detail.php");?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Detail Modal -->
  <!-- Keluar Modal -->
  <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-warning text-dark">
          <h5 class="modal-title">Konfirmasi Keluar</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Yakin Keluar Dari Halaman ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
          <a href="keluar" class="btn btn-outline-danger">Keluar</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Keluar Modal -->
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
          <div class="col-lg-4">
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3>STATUS INVOICE</h3>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
                  <canvas id="chart-transaksipenembakan"></canvas>
                </div>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Dynamic Grafik
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="alert alert-danger alert-with-icon alert-dismissible fade show" data-notify="container">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span data-notify="icon" class="nc-icon nc-bell-55"></span>
              <span data-notify="message">Jumlah data invoice yang belum di proses pada hari ini adalah
                <strong>13</strong></span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">INVOICE (TAGIHAN)</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" class="btn btn-outline-primary btn-round d-inline">
                      <i class="fas fa-print"></i> Cetak Data
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Table -->
                    <table id="example" class="table table-hover display nowrap" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode Invoice</th>
                          <th>Nominal Tagihan</th>
                          <th>Status Invoice</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>818282</td>
                          <td>Rp.40.000.000</td>
                          <td><span class="badge badge-pill badge-danger">Belum Proses</span></td>
                          <td>
                            <span data-toggle="modal" data-target="#modalDetail">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success mr-3">
                                <i class="fas fa-list fa-lg"></i>
                              </a>
                            </span>
                            <span>
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Setor"
                                class="text-warning">
                                <i class="fas fa-donate fa-lg"></i>
                              </a>
                            </span>
                          </td>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- End Table -->
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
  <!-- chart invoice sales -->
  <script src="../../assets/dashboard/js/chartjs/chartinvoicesales.js"></script>
</body>

</html>