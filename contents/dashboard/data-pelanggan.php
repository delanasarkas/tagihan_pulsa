<?php
  $page = 'datapelanggan';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Data Pelanggan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <?php
    include("../includes/css.php");
  ?>
</head>

<body class="">
  <!-- Create Modal -->
  <form action="">
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Tambah Data Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php include("data-pelanggan-input.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Create Modal -->

  <!-- Create Penambahan Modal -->
  <form action="">
    <div class="modal fade" id="modalCreatePenambahan" tabindex="-1" role="dialog"
      aria-labelledby="modalCreatePenambahan" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Penambahan Transaksi Penembakan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php include("transaksi-penembakan-penambahan.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Create Penambahan Modal -->

  <!-- Edit Modal -->
  <form action="">
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Data Pelanggan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php include("data-pelanggan-ubah.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success">Edit</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Edit Modal -->

  <!-- Delete Modal -->
  <form action="">
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDelete"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Hapus Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Yakin Hapus Data 827172 ?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-outline-danger">Hapus</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- End Delete Modal -->

  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Data Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("data-pelanggan-detail.php");?>
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
                  <h3>DATA DOWNLINE</h3>
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
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">DATA PELANGGAN</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline">
                      <i class="fas fa-plus"></i> Tambah Pelanggan
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
                          <th>Nama Pelanggan</th>
                          <th>Limit Saldo</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Agung Njan</td>
                          <td>Rp.20.000.000</td>
                          <td><span class="badge badge-pill badge-success">Aktif</span></td>
                          <td>
                            <span data-toggle="modal" data-target="#modalEdit">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                class="text-primary mr-3">
                                <i class="fas fa-edit fa-lg"></i>
                              </a>
                            </span>
                            <span data-toggle="modal" data-target="#modalDelete">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Delete Data"
                                class="text-danger mr-3">
                                <i class="fas fa-trash fa-lg"></i>
                              </a>
                            </span>
                            <span data-toggle="modal" data-target="#modalDetail">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success">
                                <i class="fas fa-list fa-lg"></i>
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
  <!-- chart data pelanggan -->
  <script src="../../assets/dashboard/js/chartjs/chartdatapelanggan.js"></script>
  <script>
    $(document).ready(function () {
      $('#statusaktif').change(function () {
        var selectedValue = $(this).val();

        if (selectedValue === 'Tidak Aktif') {
          $('.status').addClass('has-danger');
          $('.status').removeClass('has-success');
          $(this).addClass('form-control-danger');
          $(this).removeClass('form-control-success');
        } else if (selectedValue === 'Aktif') {
          $('.status').addClass('has-success');
          $('.status').removeClass('has-danger');
          $(this).addClass('form-control-success');
          $(this).removeClass('form-control-danger');
        }
      });
    });
  </script>
</body>

</html>