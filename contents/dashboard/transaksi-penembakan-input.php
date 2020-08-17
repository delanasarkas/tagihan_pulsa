<?php
  $page = 'transaksipenembakan';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Input Transaksi Penembakan
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
            <div class="col-lg-8 offset-lg-2">
            <div class="card card-stats shadow">
              <div class="card-header">
                  <div class="mobile">
                    <h3 class="card-title d-inline title-table">INPUT TRANSAKSI PENEMBAKAN</h3>
                  </div>
              </div>
              <div class="card-body ">
                <div class="row">
                    <div class="col-lg-12">
                    <form>
                        <div class="form-group">
                            <label class="control-label required" for="kodepenembakan">Kode Penembakan</label>
                            <div class="form-inline">
                                <input type="text" class="form-control is-invalid input-kode-penembakan <?php if($page=="transaksipenembakan"){echo 'active';}?>" id="kodepenembakan" placeholder="Kode Penembakan" value="" readonly>
                                <button type="button" onclick="generate();" class="btn btn-primary mb-2 ml-2">Generate</button>
                                <div class="invalid-feedback d-block" id="feedbackpenembakan">
                                    Harap generate kode penembakan
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="namasales">Nama Sales</label>
                            <input type="text" class="form-control kode-penembakan" id="namasales" placeholder="Nama Sales">
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="namapelanggan">Nama Pelanggan</label>
                            <select class="form-control single2" id="exampleFormControlSelect1">
                                <option>Pilih Nama Pelanggan</option>
                                <option>Agung Waras</option>
                                <option>Ndin Talimah</option>
                                <option>Kentung Saidi</option>
                                <option>Naenapi Sayan</option>
                                <option>Sumon Zera</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="tanggalpenembakan">Tanggal Penembakan</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-calendar-day"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Tanggal Penembakan" id="tanggalpenembakan" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label required" for="jumlahtransaksipenembakan">Jumlah Transaksi Penembakan</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-coins"></i></div>
                                </div>
                                <input type="text" class="form-control rupiah" id="jumlahtransaksipenembakan" placeholder="Jumlah Transaksi Penembakan" onkeyup="inputTerbilang();">
                            </div>
                            <small id="terbilang" class="form-text text-muted"></small>
                        </div>
                        <button type="button" class="btn btn-success">Simpan</button>
                        <a type="button" href="transpenembakan" class="btn btn-danger">Kembali</a>
                    </form>
                    </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
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