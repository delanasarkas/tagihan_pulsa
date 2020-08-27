<?php
  //session
  session_start();

  //include akses
  include('../query/koneksi.php');

  //include query
  include('../query/update-profil.php');

  $page = 'profil';

  //get pesan
  if (isset($_GET['messageUpdateProfil'])){
    echo "<script>
        window.setTimeout(function(){
            Notiflix.Notify.Success('Update Berhasil');
        },50);
        window.setTimeout(function(){
          window.location.href='profil?id_users=$id_users';
      },1500);
    </script>";
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Data Sales
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
      <div class="content">
        <!-- Keluar Modal -->
        <div class="modal fade" id="modalKeluar" tabindex="-1" role="dialog" aria-labelledby="modalKeluar"
          aria-hidden="true">
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
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../../assets/image/dashboard/damir-bosnjak.jpg">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="../../assets/image/dashboard/default-avatar.png">
                    <h5 class="title"><?= $_SESSION['namaDepan']; ?></h5>
                  </a>
                  <p class="description">
                    <?= $_SESSION['email']; ?>
                  </p>
                </div>
                <p class="description text-center">
                  <!-- "I like the way you work it <br>
                  No diggity <br>
                  I wanna bag it up" -->
                  <?php 
                    if($_SESSION['bio'] == ""){ ?>
                  "Bio Masih Kosong"
                  <?php } else {
                      $_SESSION['bio'];
                    } ?>
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-4 col-md-6 col-6 ml-auto">
                      <h5>12<br><small>Pelanggan</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5>2GB<br><small>Transaksi</small></h5>
                    </div>
                    <div class="col-lg-4 mr-auto">
                      <h5>24,6$<br><small>Setoran</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Downline (pelanggan)</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../../assets/image/dashboard/default-avatar.png" alt="Circle Image"
                            class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        DJ Khaled
                        <br />
                        <span class="text-muted"><small>Alamat</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-whatsapp"></i>
                        </btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../../assets/image/dashboard/default-avatar.png" alt="Circle Image"
                            class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Creative Tim
                        <br />
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-whatsapp"></i>
                        </btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../../assets/image/dashboard/default-avatar.png" alt="Circle Image"
                            class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Flume
                        <br />
                        <span class="text-danger"><small>Busy</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-whatsapp"></i>
                        </btn>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profil Anda</h5>
              </div>
              <div class="card-body">
                <form action="" method="POST" autocomplete="off">
                  <?php 
                    while($data = mysqli_fetch_assoc($result)){
                  ?>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Depan</label>
                        <input type="text" class="form-control" placeholder="Company" value="<?= $data['nama_depan'] ?>"
                          name="nama_depan">
                      </div>
                      <span class="error-text">
                        <?= $errorNamaDepan; ?>
                      </span>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nama Belakang</label>
                        <input type="text" class="form-control" placeholder="Last Name"
                          value="<?= $data['nama_belakang'] ?>" name="nama_belakang">
                      </div>
                      <span class="error-text">
                        <?= $errorNamaBelakang; ?>
                      </span>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-at"></i></div>
                          </div>
                          <input type="email" class="form-control" placeholder="Email Address"
                            value="<?= $data['email_address'] ?>" name="email_address">
                        </div>
                        <span class="error-text">
                          <?= $errorEmail; ?>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Nomor Telepon</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                          </div>
                          <input type="number" class="form-control" placeholder="Nomor Telepon"
                            value="<?= $data['no_tlp'] ?>" maxlength="12" name="no_tlp">
                        </div>
                        <span class="error-text">
                          <?= $errorNoTlp; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control textarea" placeholder="Alamat"
                          name="alamat"><?= $data['alamat'] ?></textarea>
                        <span class="error-text">
                          <?= $errorAlamat; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Password</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                          </div>
                          <input type="password" maxlength="8" class="form-control" placeholder="Password" name="pass">
                        </div>
                        <span class="error-text">
                          <?= $errorPassword; ?>
                        </span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Limit Saldo</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-coins"></i></div>
                          </div>
                          <input type="number" class="form-control" placeholder="Limit Saldo"
                            value="<?= $data['limit'] ?>" name="limits"
                            <?php echo $_SESSION['rolle'] == 'admin' ? 'readonly' : '' ?>>
                        </div>
                        <span class="error-text">
                          <?= $errorLimitSaldo; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Bio</label>
                        <textarea class="form-control textarea" placeholder="Bio"
                          name="bio"><?= $data['bio'] ?></textarea>
                        <span class="error-text">
                          <?= $errorBio; ?>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round" name="update">Update Profil</button>
                    </div>
                  </div>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End main -->
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