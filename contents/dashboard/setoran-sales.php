<?php
  $page = 'setoransales';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Setoran Sales
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
          <h5 class="modal-title">Tambah Setoran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("setoran-sales-input.php");?>
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

  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Setoran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("setoran-sales-detail.php");?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Detail Modal -->
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
            <div class="alert alert-info alert-with-icon alert-dismissible fade show" data-notify="container">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span data-notify="icon" class="nc-icon nc-cloud-upload-94"></span>
              <span data-notify="message">Silahkan upload transfer hari ini</span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3>UPLOAD BUKTI</h3>
                </div>
              </div>
              <div class="card-body">
                <?php include('setoran-sales-upload.php'); ?>
              </div>
              <div class="card-footer">
                <hr>
                <div class="stats">
                  <i class="fa fa-file-archive"></i>
                  Bukti Transfer
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
              <span data-notify="message">Jumlah data setoran yang belum di setor pada hari ini adalah <strong>13</strong></span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">SETORAN SALES</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate" class="btn btn-primary btn-round d-inline">
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
                          <th>Kode Invoice</th>
                          <th>Nama Pelanggan</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>8174758</td>
                          <td>Aji Kuproy</td>
                          <td><span class="badge badge-pill badge-info">Belum Setor</span></td>
                          <td>
                            <span data-toggle="modal" data-target="#modalDetail">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success">
                                <i class="fas fa-list fa-lg"></i> Detail
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
    $(document).ready(function() {
      $('#resetUpload').click(function() {
        $('.custom-file-input').val('');
        $('.custom-file-label').html('Pilih File...');
      });
    });
  </script>
</body>

</html>