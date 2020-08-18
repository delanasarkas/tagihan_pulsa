<?php
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
  <form action="">
  <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreate"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Input Transaksi Penembakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("transaksi-penembakan-input.php");?>
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

  <!-- Edit Modal -->
  <form action="">
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEdit"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Transaksi Penembakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("transaksi-penembakan-ubah.php");?>
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
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Transaksi Penembakan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php include("transaksi-penembakan-detail.php");?>
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
          <div class="col-lg-12">
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">TRANSAKSI PENEMBAKAN</h3>
                  <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate" class="btn btn-primary btn-round d-inline">
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
                          <th>Nama Pelanggan</th>
                          <th>Tanggal Penembakan</th>
                          <th>Jumlah Penembakan</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>2919288</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>
                            <span data-toggle="modal" data-target="#modalEdit">
                              <a href="javascript::" data-toggle="tooltip" data-placement="bottom"
                                title="Edit Data" class="text-primary mr-3">
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
                                <i class="fas fa-file-alt fa-lg"></i>
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
</body>

</html>