<?php
  
  include('contents/query/proses-registrasi.php');
  
?>
<!-- Header -->
<body class="bg-gradient-light">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">
                      Registrasi Akun Sales
                    </h1>
                  </div>
                  <form class="user" action="" method="POST" autocomplete="off">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="nama_depan" name="nama_depan" placeholder="Nama Depan" maxlength="15" value="<?php echo isset($_POST["nama_depan"]) ? $_POST["nama_depan"] : ''; ?>">
                            <span class="error-text">
                              <?= $errorNamaDepan; ?>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" maxlength="15" value="<?php echo isset($_POST["nama_belakang"]) ? $_POST["nama_belakang"] : ''; ?>">
                            <span class="error-text">
                              <?= $errorNamaBelakang; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email_address" name="email_address" placeholder="Email Address" value="<?php echo isset($_POST["email_address"]) ? $_POST["email_address"] : ''; ?>">
                        <span class="error-text">
                          <?= $errorEmail; ?>
                        </span>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" maxlength="8" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                            <span class="error-text">
                              <?= $errorPassword; ?>
                            </span>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="confirm_password" name="confirm_password" placeholder="Ulangi Password" maxlength="8" value="<?php echo isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : ''; ?>">
                            <span class="error-text">
                              <?= $errorConfirmPassword; ?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="kode_registrasi" name="kode_registrasi" placeholder="Kode Registrasi" maxlength="12" value="<?php echo isset($_POST["kode_registrasi"]) ? $_POST["kode_registrasi"] : ''; ?>">
                        <span class="error-text">
                            <?= $errorKodeRegistrasi; ?>
                        </span>
                    </div>
                    <button type="submit" name="register" class="btn btn-success btn-user btn-block">
                        Registrasi Akun
                    </button>
                    <hr>
                    <a href="login" class="btn btn-google btn-user btn-block">
                      Kembali
                    </a>
                </form>
                <hr>
                <?php
                  include("contents/login/footer.php")
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
