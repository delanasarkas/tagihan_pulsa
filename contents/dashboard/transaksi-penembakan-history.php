<?php
  //session
  session_start();
  
  $page = 'transaksipenembakan';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    History Transaksi Penembakan
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
        <!-- Keluar Modal -->
        <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar"
          aria-hidden="true">
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
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3>KETERANGAN HISTORY</h3>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
                  <canvas id="chart-historypenembakan"></canvas>
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
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">HISTORY TRANSAKSI PENEMBAKAN</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline invisible">
                      <i class="fas fa-plus"></i> Tambah Data
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
                          <th>Kode Penembakan</th>
                          <th>Nama Sales</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal Penembakan</th>
                          <th>Tanggal Penambahan</th>
                          <th>Tanggal Penagihan</th>
                          <th>Transaksi Penembakan</th>
                          <th>Tambah Penembakan</th>
                          <th>Total Transaksi</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>2919288</td>
                          <td>System Architect</td>
                          <td>Njunaedi</td>
                          <td>11/12/2020</td>
                          <td>11/12/2020</td>
                          <td>14/12/2020</td>
                          <td>Rp.2.000.000</td>
                          <td>Rp.2.000.000</td>
                          <td>Rp.4.000.000</td>
                          <td>Data Baru, Data Perubahan, Data Penambahan, Data Terhapus</td>
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
  <!-- chart transaksi penembakan -->
  <script src="../../assets/dashboard/js/chartjs/charthistorypenembakan.js"></script>
</body>

</html>