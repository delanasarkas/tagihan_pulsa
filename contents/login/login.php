<?php
  //include proses login
  include('contents/query/proses-login.php');

  //get pesan
  if (isset($_GET['messageLogout'])){
    echo "<script>
        window.setTimeout(function(){
            Notiflix.Notify.Success('Logout Berhasil');
        },10);
    </script>";
  }
  if(isset($_GET['messageRegistrasi'])){
    echo "<script>
        window.setTimeout(function(){
            Notiflix.Notify.Success('Registrasi Berhasil');
        },10);
        window.setTimeout(function(){
            window.location.href = 'login';
        },2000);
    </script>";
  }
?>
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
                      Aplikasi Tagihan Pulsa
                      <br>
                      <strong>Masika Reload</strong>
                    </h1>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="email_address" placeholder="Enter Email Address..." value="<?php echo isset($_POST["email_address"]) ? $_POST["email_address"] : ''; ?>">
                      <span class="error-text">
                        <?= $errorEmail; ?>
                      </span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" maxlength="8" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                      <span class="error-text">
                        <?= $errorPassword; ?>
                        <?= $errorData; ?>
                      </span>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="check" id="check" />
                        <label class="custom-control-label" for="check">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                    <hr>
                    <a href="daftar" class="btn btn-google btn-user btn-block">
                      <i class="fas fa-user-plus fa-fw"></i> Daftar Akun Sales
                    </a>
                    <a href="whatsapp" target="_blank" class="btn btn-facebook btn-user btn-block">
                      <i class="fas fa-exclamation-circle fa-fw"></i> Laporan & Saran
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
