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
  $validasi = "";
  $setoran = "";
  //select setoran
  include('../query/select-setoran-sales.php');
  if(isset($_POST['upload'])){
    $totalsetoran = $_POST['totalsetoran'];
    $nama_file = $_FILES['uploadtransfer']['name'];
    $ukuran_file = $_FILES['uploadtransfer']['size'];
    $tipe_file = $_FILES['uploadtransfer']['type'];
    $tmp_file = $_FILES['uploadtransfer']['tmp_name'];
    // Set path folder tempat menyimpan gambarnya
    $path = "uploadtransfer/".$nama_file;

    if(empty($totalsetoran)){
      $setoran = "Tidak ada total setoran";
    }

    if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
        // Jika tipe file yang diupload JPG / JPEG / PNG, lakukan :
        if($ukuran_file <= 500000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
          // Jika ukuran file kurang dari sama dengan 1MB, lakukan :
          // Proses upload
          if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
            // Jika gambar berhasil diupload, Lakukan :  
            // Proses simpan ke Database
            $query = mysqli_query($con, "CALL update_setoran_sales('".$nama_file."','".$id."')");
            if($query){ // Cek jika proses simpan ke database sukses atau tidak
              // Jika Sukses, Lakukan :
              header("location:setoransales?suksesTransfer"); // Redirectke halaman index.php
            }else{
              // Jika Gagal, Lakukan :
              $validasi = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Terjadi kesalahan menyimpan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
            }
          }else{
            // Jika gambar gagal diupload, Lakukan :
            $validasi = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Gambar gagal diupload
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
          }
        }else{
          // Jika ukuran file lebih dari 1MB, lakukan :
          $validasi = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Ukuran gambar max 500Kb
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
        }
      }else{
        // Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
        $validasi = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> Format harus jpeg atau png
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ';
      }
  }      

  if(isset($_GET['suksesTransfer'])){
    $validasi = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Upload Berhasil!</strong> selanjutnya tunggu konfirmasi admin
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
    ';
  }

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
  <!-- Pesan Modal -->
  <div class="modal fade" id="modalPesan" tabindex="-1" role="dialog" aria-labelledby="modalPesan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Pesan Setoran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="infoPesanSetoran">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger mr-2" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Pesan Modal -->
  <!-- Detail Modal -->
  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Detail Setoran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="infoDetailSetoran">
         
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
          <?php if($rolle=="sales"){ ?>
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
          <?php } ?>
          <div class="<?= $rolle=='admin' ? 'col-lg-12' : 'col-lg-8'; ?>">
            <div class="alert alert-danger alert-with-icon alert-dismissible fade show" data-notify="container">
              <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
              </button>
              <span data-notify="icon" class="nc-icon nc-bell-55"></span>
              <span data-notify="message">Jumlah data setoran yang pending pada hari ini adalah
              <strong><?= $count; ?></strong></span>
            </div>
            <div class="card card-stats shadow">
              <div class="card-header">
                <div class="mobile">
                  <h3 class="card-title d-inline title-table">SETORAN SALES</h3>
                  <!-- <div class="float-rights">
                    <a type="submit" href="javascript::" data-toggle="modal" data-target="#modalCreate"
                      class="btn btn-primary btn-round d-inline">
                      <i class="fas fa-plus"></i> Tambah Setoran
                    </a>
                  </div> -->
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
                        <?php 
                          $no=1;
                          while($data = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= substr($data['id_invoice'],0,7) ?></td>
                          <td><?= $data['nama_pelanggan'] ?></td>
                          <td><span class="badge badge-pill <?php if($data['keterangan'] == 'pending'){ echo 'badge-warning'; }else if($data['keterangan'] == 'belum konfirmasi'){ echo 'badge-info'; }else if($data['keterangan'] == 'diterima'){ echo 'badge-success'; }else if($data['keterangan'] == 'ditolak'){ echo 'badge-danger'; } ?>"><?= $data['keterangan'] ?></span></td>
                          <td>
                              <?php if($data['keterangan'] == 'ditolak') { ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-primary pesanSetoran mr-3" id="<?= $data['id_setoran'] ?>">
                                <i class="fas fa-comment-dots fa-lg"></i> Pesan
                              </a>
                              <?php } ?>
                              <a href="javascript:;" data-toggle="tooltip" data-placement="bottom" title="Detail Data"
                                class="text-success detailSetoran" id="<?= $data['id_setoran'] ?>">
                                <i class="fas fa-list fa-lg"></i> Detail
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
  <!-- ajax detail setoran -->
  <?php include("../includes/ajax/detail-setoran-sales.php"); ?>
  <!-- ajax pesan setoran -->
  <?php include("../includes/ajax/pesan-setoran-sales.php"); ?>
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