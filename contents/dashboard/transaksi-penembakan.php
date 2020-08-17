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
                    <button type="submit" class="btn btn-primary btn-round d-inline">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                  </div>
                  </div>
                </div>
                <div class="card-body">
                  <!-- Table -->
                  <table id="example" class="table table-hover display nowrap" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Sales</th>
                          <th>Nama Pelanggan</th>
                          <th>Tanggal Penembakan</th>
                          <th>Jumlah Penembakan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>1</td>
                          <td>Abdi</td>
                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>
                            <a href="" data-toggle="tooltip" data-placement="bottom" title="Edit Data" class="text-primary mr-3">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>
                            <a href="" data-toggle="tooltip" data-placement="bottom" title="Delete Data" class="text-danger mr-3">
                                <i class="fas fa-trash fa-lg"></i>
                            </a>
                            <a href="" data-toggle="tooltip" data-placement="bottom" title="Detail Data" class="text-success">
                                <i class="fas fa-file-alt fa-lg"></i>
                            </a>
                          </td>
                      </tr>
                  </tfoot>
                  </table>
                  <!-- End Table -->
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