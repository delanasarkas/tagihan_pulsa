<?php
  //session
  session_start();
  
  //include akses
  include('../query/hak-akses.php');
  
  //include koneksi
  include('../query/koneksi.php');
  //get id
  $id = $_SESSION['userId'];
  $rolle = $_SESSION['rolle'];
 
  //select transaksi penembakan
  include('../query/select-invoice-tagihan.php');

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
  <!-- Setor Modal -->
    <div class="modal fade" id="modalSetor" tabindex="-1" role="dialog" aria-labelledby="modalSetor"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Tambah Setoran</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" id="setorForm" autocomplete="off">
          <div class="modal-body" id="infoSetorInvoice">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" id="setorButton">Setor</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Setor Modal -->
  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Invoice</h5>
          <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body" id="infoDetailInvoice">
          
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
                  <canvas id="chartcanvas"></canvas>
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
                <strong><?= $count; ?></strong></span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">INVOICE (TAGIHAN)</h3>
                  <div class="float-rights">
                    <a href="cetakinvoice" target="_blank" class="btn btn-outline-primary btn-round d-inline">
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
                        <?php 
                          $no=1;
                          while($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= substr($data['id_invoice'],0,7) ?></td>
                          <td>Rp <?= number_format( $data['total'], 0 , '' , '.' ) . ',-'; ?></td>
                          <td><span class="badge badge-pill <?php if($data['status_invoice'] == 'belum proses'){ echo 'badge-danger'; }else{ echo 'badge-success'; } ?>"><?= $data['status_invoice'] ?></span></td>
                          <td>
                              <?php if($data['status_invoice'] == 'belum proses' && $rolle == 'sales') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Setor"
                                class="text-warning mr-3 setorInvoice" id="<?= $data['id_invoice'] ?>">
                                <i class="fas fa-donate fa-lg"></i>
                              </a>
                              <?php } ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success detailInvoice" id="<?= $data['id_invoice'] ?>">
                                <i class="fas fa-list fa-lg"></i>
                              </a>
                          </td>
                        </tr>
                        <?php } ?>
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
  <!-- ajax detail invoice -->
  <?php
    include("../includes/ajax/detail-invoice.php");
  ?>
  <!-- ajax setor invoice -->
  <?php include("../includes/ajax/invoice-tagihan-setor.php"); ?>
  <!-- chart data invoice -->
  <?php 
    include("../includes/charts/grafik-invoice-tagihan.php"); 
  ?>
  <!-- reset modal -->
  <script>
    $('#modalCreate').on('hidden.bs.modal', function (e) {
      $(this)
        .find('#single4')
        .val('Pilih Kode Invoice')
        .trigger('change')
        .end()
        .find('#feedbacksetoransales')
        .addClass('invalid-feedback')
        .html('Harap pilih kode invoice')
        .end()
        .find("#kodepenembakan, #namasales, #namapelanggan, #tanggaltagihan, #limitsaldo, #jumlahsetoran, textarea")
        .val('')
        .end()
        .find("small")
        .html('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
    })
  </script>
</body>

</html>