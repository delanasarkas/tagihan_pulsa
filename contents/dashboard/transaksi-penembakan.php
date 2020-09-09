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
  include('../query/select-transaksi-penembakan.php');

  $page = 'transaksipenembakan';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Transaksi Penembakan
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <?php
    include("../includes/css.php");
  ?>
</head>

<body class="">
  <!-- Create Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Data Baru Transaksi Penembakan</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
          <form method="POST" id="formInput" autocomplete="off">
            <?php include("transaksi-penembakan-input.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" id="simpanButton" class="btn btn-success">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Create Modal -->

  <!-- Create Penambahan Modal -->
    <div class="modal fade" id="modalCreatePenambahan" tabindex="-1" role="dialog"
      aria-labelledby="modalCreatePenambahan" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Penambahan Transaksi Penembakan</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" id="penambahanForm" autocomplete="off">
          <div class="modal-body" id="infoPenambahanTransaksi">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" id="simpanPerubahanButton">Tambah</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Create Penambahan Modal -->

  <!-- Kembalikan Modal -->
    <div class="modal fade" id="modalKembali" tabindex="-1" role="dialog" aria-labelledby="modalKembali"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title">Konfirmasi</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" id="kembaliForm">
          <div class="modal-body" id="infoKembaliTransaksi">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-outline-danger" id="konfirmasiKembali">Konfirmasi</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End kembalikan Modal -->

  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Transaksi Penembakan</h5>
          <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body" id="infoDetailTransaksi">

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
                  <h3>TOTAL TRANSAKSI</h3>
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
                  <h3 class="card-title d-inline title-table">TRANSAKSI PENEMBAKAN</h3>
                  <?php if($rolle=='sales') { ?>
                  <div class="float-rights">
                    <a type="submit" href="javascript:;" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline">
                      <i class="fas fa-plus"></i> Data Baru
                    </a>
                  </div>
                  <?php } ?>
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
                          <th>Nama Pelanggan</th>
                          <th>Transaksi</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=1;
                        while($data = mysqli_fetch_assoc($resultSelect)) {
                        ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['kode_penembakan'] ?></td>
                          <td><?= $data['nama_pelanggan'] ?></td>
                          <td>Rp <?= number_format( $data['total'], 0 , '' , '.' ) . ',-' ?></td>
                          <td>
                            <?php if($rolle == 'sales') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Penambahan Transaksi"
                                class="text-primary mr-3 penambahanTransaksi" id="<?= $data['kode_penembakan'] ?>">
                                <i class="fas fa-plus-circle fa-lg"></i>
                              </a>
                            <?php } ?>
                            <?php if($rolle == 'admin') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Batal"
                                class="text-danger mr-3 batalTransaksi" id="<?= $data['kode_penembakan']; ?>">
                                <i class="fas fa-undo fa-lg"></i>
                              </a>
                            <?php } ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success detailTransaksi" id="<?= $data['kode_penembakan'] ?>">
                                <i class="fas fa-list fa-lg"></i>
                              </a>
                          </td>
                        </tr>
                        <?php } ?>
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
  <script src="../../assets/dashboard/js/chartjs/charttransaksipenembakan.js"></script>
  <!-- rupiah data baru-->
  <!-- ajax input transaksi -->
  <?php include("../includes/ajax/input-transaksi.php"); ?>
  <!-- ajax penambahan transaksi -->
  <?php include("../includes/ajax/penambahan-transaksi.php"); ?>
  <!-- ajax detail transaksi -->
  <?php include("../includes/ajax/detail-transaksi-penembakan.php"); ?>
  <!-- ajax kembali transaksi -->
  <?php include("../includes/ajax/kembali-penambahan-transaksi.php"); ?>
  <script>
    function inputTerbilang() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("jumlahtransaksipenembakan").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("saldosales").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang2").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })
  </script>
  <!-- rupiah penambahan transaksi-->
  <script>
    function inputTerbilang2() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("jumlahpenambahantransaksipenembakan").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang4").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
  </script>
  <!-- rupiah edit transaksi-->
  <script>
    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("saldosales3").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang7").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })

    function inputTerbilang3() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("jumlahtransaksipenembakan2").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang8").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
  </script>
  <!-- reset modal -->
  <script>
    $('#modalCreate, #modalCreatePenambahan, #modalEdit').on('hidden.bs.modal', function (e) {
      $(this)
        .find('#feedbackpenembakan')
        .addClass('invalid-feedback')
        .html('Harap generate kode penembakan')
        .end()
        .find('#kodepenembakan')
        .addClass('is-invalid')
        .end()
        .find("#jumlahtransaksipenembakan, #jumlahpenambahantransaksipenembakan, textarea")
        .val('')
        .end()
        .find('#single')
        .val('Pilih Nama Pelanggan')
        .trigger('change')
        .end()
        .find('#single3')
        .val('Pilih Kode Penembakan')
        .trigger('change')
        .end()
        .find('#feedbackpenamabahanpenembakan')
        .addClass('invalid-feedback')
        .html('Harap pilih kode penembakan')
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