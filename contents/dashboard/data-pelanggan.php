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

  //include query select pelanggan
  include('../query/select-data-pelanggan.php');

  $page = 'datapelanggan';
?>
<!DOCTYPE html>
<html>

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
  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Data Pelanggan</h5>
          <a type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body">
          <form method="POST" id="formInput" autocomplete="off">
            <?php include("data-pelanggan-input.php");?>
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
          <h5 class="modal-title">Edit Data Pelanggan</h5>
          <a href="javascript:;" class="close" id="batalEdit">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <form method="POST" action="#" id="editForm">
          <div class="modal-body" id="infoUpdatePelanggan">

          </div>
          <div class="modal-footer">
            <a href="javascript:;" class="btn btn-danger mr-2" id="batalEdit2">Tutup</a>
            <button type="button" class="btn btn-success" id="editPelanggan">Edit</button>
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
            <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form action="#" method="POST" id="deleteForm">
            <div class="modal-body" id="infoDeletePelanggan">
              
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-outline-danger" id="deletePelanggan">Hapus</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <!-- End Delete Modal -->

  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog"
    aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Data Pelanggan</h5>
          <a href="javascript:;" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body" id="infoDetailPelanggan">
          
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
                  <h3>
                    <?php if($rolle=='admin') { ?>
                    DATA DOWNLINE
                    <?php } else { ?>
                    STATUS PELANGGAN
                    <?php } ?>
                  </h3>
                </div>
              </div>
              <div class="card-body">
                <div id="canvas-holder" style="width:100%">
                  <?php if($rolle=='sales') { ?>
                  <canvas id="chart-datapelanggansales"></canvas>
                  <?php } else { ?>
                  <canvas id="canvas"></canvas>
                  <?php } ?>
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
                  <h3 class="card-title d-inline title-table">DATA
                    <?php echo $rolle == 'admin' ? 'SELURUH ' : ''; ?>PELANGGAN</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript:;" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline <?php echo $rolle == 'sales' ? 'visible' : 'invisible'; ?>">
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
                      <?php 
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                      ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $data['nama_pelanggan']; ?></td>
                          <td>Rp <?= number_format( $data['limits'], 0 , '' , '.' ) ?></td>
                          <td><span
                              class="badge badge-pill <?php echo $data['status_aktif'] == 'aktif' ? 'badge-success' : 'badge-danger'; ?>"><?= $data['status_aktif']; ?></span>
                          </td>
                          <td>
                            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                              class="text-primary mr-3 updatePelanggan" id="<?= $data['id_pelanggan']; ?>">
                              <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <?php if($rolle == 'admin') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Delete Data"
                                class="text-danger mr-3 deletePelanggan" id="<?= $data['id_pelanggan']; ?>">
                                <i class="fas fa-trash fa-lg"></i>
                              </a>
                            <?php } ?>
                            <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                              class="text-success detailPelanggan" id="<?= $data['id_pelanggan']; ?>">
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

      ?>
    </div>
  </div>
  <?php
    include("../includes/scripts.php");
  ?>
  <!-- chart data pelanggan sales -->
  <?php
  if($rolle=='sales') {
    include("../includes/charts/grafik-data-pelanggan-sales.php");
  } else {
    include("../includes/charts/grafik-data-pelanggan-admin.php");
  }
  ?>
  <!-- ajax input pelanggan -->
  <?php
  if($rolle=='sales') {
    include("../includes/ajax/input-pelanggan.php");
  }
  ?>
  <!-- ajax edit pelanggan -->
  <?php
    include("../includes/ajax/edit-pelanggan.php");
  ?>
  <!-- ajax detail pelanggan -->
  <?php
    include("../includes/ajax/detail-pelanggan.php");
  ?>
  <!-- ajax delete pelanggan -->
  <?php
  if($rolle=='admin') {
    include("../includes/ajax/delete-pelanggan.php");
  }
  ?>
  <!-- reset modal create -->
  <script>
    $('#modalCreate').on('hidden.bs.modal', function (e) {
      $(this)
        .find('input, textarea')
        .val('')
        .end()
        .find('#statusaktif')
        .val('Tidak Aktif')
        .end()
        .find('.status')
        .addClass('has-danger')
        .removeClass('has-success')
        .end()
        .find('#statusaktif')
        .addClass('form-control-danger')
        .removeClass('form-control-success')
        .end()
    })
  </script>

  <!-- select status -->
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

  <!-- edit batal -->
  <script>
    $('#batalEdit, #batalEdit2').on('click', function () {
      // Loading indicator with a message
      Notiflix.Loading.Standard('Loading...');
      setTimeout(function () {
        window.location.href = "datapelanggan";
      }, 200);
    });
  </script>
</body>

</html>