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

  $querySelect = mysqli_query($con,"CALL bukti_transfer_sales('".$id."')");

  $page = 'setoransales';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Bukti Transfer
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
          <h5 class="modal-title">Detail Bukti Transfer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="infoDetailBukti">

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
          <div class="col-lg-12">
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">BUKTI TRANSFER</h3>
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
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                          $no=1;
                          while($data = mysqli_fetch_assoc($querySelect)) {
                      ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['nama_depan'] ?> <?= $data['nama_belakang'] ?></td>
                          <td><?= date('d-m-Y',strtotime($data['tgl_setoran'])) ?></td>
                          <td>Rp <?= number_format( $data['total'], 0 , '' , '.' ) . ',-' ?></td>
                          <td>
                              <a href="uploadtransfer/<?= $data['bukti_transfer'] ?>" target="_blank" data-toggle="tooltip" data-placement="bottom"
                                title="Download Gambar" class="text-info mr-3">
                                <i class="fas fa-cloud-download-alt fa-lg"></i>
                              </a>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom"
                                title="Detail Data" class="text-success detailBukti" id="<?= $data['tgl_setoran'] ?>">
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
  <!-- ajax detail bukti -->
  <?php include("../includes/ajax/detail-bukti-transfer.php"); ?>
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

    $(document).ready(function () {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("totalsetoran").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang3").innerHTML = terbilang(input).replace(/  +/g, ' ');
    })
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
    })
  </script>
  <!-- get file name upload -->
  <script>
    $('.custom-file-input').on('change', function () {
      let fileName = Array.from(this.files).map(x => x.name).join(', ')
      $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
    });
  </script>
  <!-- reset value upload -->
  <script>
    $(document).ready(function () {
      $('#resetUpload').click(function () {
        $('.custom-file-input').val('');
        $('.custom-file-label').html('Pilih File...');
      });
    });
  </script>
</body>

</html>