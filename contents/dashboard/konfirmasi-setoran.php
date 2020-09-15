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

  //select konfirmasi setoran
  include('../query/select-konfirmasi-setoran.php');

  $page = 'setoransales';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Konfirmasi Setoran
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <?php
    include("../includes/css.php");
  ?>
</head>

<body class="">
  <!-- Terima Modal -->
    <div class="modal fade" id="modalTerima" tabindex="-1" role="dialog" aria-labelledby="modalTerima"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Konfirmasi Terima</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" action="#" id="editForm" autocomplete="off">
          <div class="modal-body" id="infoKonfirmasiTerima">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" id="editButton">Terima</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Terima Modal -->

  <!-- Tolak Modal -->
    <div class="modal fade" id="modalTolak" tabindex="-1" role="dialog" aria-labelledby="modalTolak" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Konfirmasi Tolak</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" action="#" id="tolakForm" autocomplete="off">
          <div class="modal-body" id="infoKonfirmasiTolak">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" id="tolakButton">Tolak</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Tolak Modal -->

  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Konfirmasi Setoran</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
        </div>
        <div class="modal-body" id="infoDetailKonfirmasi">
          
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
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
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
                  <h3>STATUS KONFIRMASI</h3>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
                  <canvas id="chart-kofirmasisetoran"></canvas>
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
              <span data-notify="message">Jumlah data setoran yang belum di konfirmasi pada hari ini adalah
                <strong><?= $count; ?></strong></span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">KONFIRMASI SETORAN</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline invisible">
                      <i class="fas fa-plus"></i> Tambah Setoran
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
                          <th>Nama Sales</th>
                          <th>Tanggal Setor</th>
                          <th>Total Setor</th>
                          <th>Status</th>
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
                          <td><?= $data['nama_depan'] ?> <?= $data['nama_belakang'] ?></td>
                          <td><?= date('d-m-Y',strtotime($data['tgl_setoran'])) ?></td>
                          <td>Rp <?= number_format( $data['total'], 0 , '' , '.' ) . ',-' ?></td>
                          <td><span class="badge badge-pill <?php if($data['keterangan'] == 'belum konfirmasi'){ echo 'badge-info'; }else if($data['keterangan'] == 'diterima'){ echo 'badge-success'; }else if($data['keterangan'] == 'ditolak'){ echo 'badge-danger'; } ?>"><?= $data['keterangan'] ?></span></td>
                          <td>
                              <?php if($data['keterangan'] == 'belum konfirmasi') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom"
                                title="Terima Setoran" class="text-primary mr-3 konfirmasiTerima" id="<?= $data['id_users'] ?>">
                                <i class="fas fa-check fa-lg"></i>
                              </a>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Tolak Setoran"
                                class="text-danger mr-3 konfirmasiTolak" id="<?= $data['id_users'] ?>">
                                <i class="fas fa-times fa-lg"></i>
                              </a>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom"
                                title="Detail Setoran" class="text-success detailKonfirmasi" id="<?= $data['tgl_setoran'] ?>">
                                <i class="fas fa-list fa-lg"></i>
                              </a>
                              <?php } ?>
                              <?php if($data['keterangan'] == 'diterima' || $data['keterangan'] == 'ditolak') { ?>
                              -
                              <?php } ?>
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
  <!-- ajax detail konfirmasi -->
  <?php include("../includes/ajax/detail-konfirmasi-setoran.php"); ?>
  <!-- ajax terima-->
  <?php include("../includes/ajax/terima-konfirmasi.php"); ?>
  <!-- ajax tolak -->
  <?php include("../includes/ajax/tolak-konfirmasi.php"); ?>
  <!-- chart konfirmasi setoran -->
  <?php 
    include("../includes/charts/grafik-data-konfirmasi.php"); 
  ?>
  <!-- tambah setoran -->
  <script>
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("limitsaldo").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })

    function inputTerbilang() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("jumlahsetoran").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang2").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
  </script>
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
      }) <
      /body>

      <
      /html>