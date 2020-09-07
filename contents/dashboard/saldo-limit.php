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
 $limitSaldos=0;

 //include query select pelanggan
 include('../query/select-saldo-limit.php');
  
  $page = 'saldolimit';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Saldo Limit
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
            <h5 class="modal-title">Input Saldo Limit</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <div class="modal-body">
          <form method="POST" id="formInput" autocomplete="off">
            <?php include("saldo-limit-input.php");?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-success" id="simpanButton">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Create Modal -->

  <!-- Edit Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Saldo Limit</h5>
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form method="POST" action="#" id="editForm">
          <div class="modal-body" id="infoUpdateSaldoLimit">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-success" id="editSaldoLimit">Edit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Edit Modal -->

  <!-- Delete Modal -->
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
          <form method="POST" id="deleteForm">
          <div class="modal-body" id="infoDeleteSaldoLimit">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-outline-danger" id="deleteSaldoLimit">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Delete Modal -->

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
                  <h3>TOTAL SALDO TERKIRIM</h3>
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
                  <h3 class="card-title d-inline title-table">SALDO LIMIT</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript:;" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline">
                      <i class="fas fa-plus"></i> Tambah Saldo
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
                          <th>Saldo</th>
                          <th>Tanggal Pengiriman</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                      ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['email_address'] ?></td>
                          <td>Rp <?= number_format( $data['saldo'], 0 , '' , '.' ) . ',-' ?></td>
                          <td><?= $data['created_at'] ?></td>
                          <td>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                class="text-primary mr-3 updateSaldoLimit" id="<?= $data['id_saldo']; ?>">
                                <i class="fas fa-edit fa-lg"></i>
                              </a>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete Data"
                                class="text-danger mr-3 deleteSaldoLimit" id="<?= $data['id_saldo']; ?>">
                                <i class="fas fa-trash fa-lg"></i>
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
  <!-- chart saldo limit -->
  <script src="../../assets/dashboard/js/chartjs/chartsaldolimit.js"></script>
  <!-- ajax -->
  <?php
  if($rolle=='admin') {
    //input saldo limit
    include("../includes/ajax/input-saldo-limit.php");
    //edit saldo limit
    include("../includes/ajax/edit-saldo-limit.php");
    //hapus saldo limit
    include("../includes/ajax/delete-saldo-limit.php");
  }
  ?>
  <script>
    function inputTerbilang() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("nominalsaldopengiriman").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang2").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
  </script>
  <!-- edit saldo limit -->
  <script>
    function inputTerbilang2() {
      // Format mata uang.
      $('.rupiah').mask('0.000.000.000', {
        reverse: true
      });
      var input = document.getElementById("nominalsaldopengirimanubah").value.replace(/\./g, "");
      //menampilkan hasil dari terbilang
      document.getElementById("terbilang3").innerHTML = terbilang(input).replace(/  +/g, ' ');
    }
  </script>
  <!-- reset modal -->
  <script>
    $('#modalCreate, #modalEdit').on('hidden.bs.modal', function (e) {
      $(this)
        .find('#single2')
        .val('Pilih Nama Sales')
        .trigger('change')
        .end()
        .find('#feedbacksaldolimit')
        .addClass('invalid-feedback')
        .html('Harap pilih nama sales')
        .end()
        .find("#limitsaldo, #nominalsaldopengiriman, #totallimit, textarea")
        .val('')
        .end()
        .find("small,#errorNamaSales")
        .html('')
        .end()
        .find("input[type=checkbox], input[type=radio]")
        .prop("checked", "")
        .end();
    })
  </script>
</body>

</html>