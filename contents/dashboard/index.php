<?php
  //session
  session_start();

  //include akses
  include('../query/hak-akses.php');

  //get pesan
  if (isset($_GET['messageLogin'])){
    echo "<script>
        window.setTimeout(function(){
            Notiflix.Notify.Success('Login Berhasil');
        },100);
    </script>";
  }

  //include koneksi
  include('../query/koneksi.php');

  //get id
  $id = $_SESSION['userId'];
  $rolle = $_SESSION['rolle'];

  if($rolle=='admin'){
    $queryInvoice = mysqli_query($con,"SELECT a.status_invoice, b.tgl_penagihan 
    FROM invoice_tagihan a, transaksi_penembakan b 
    WHERE a.id_transaksi = b.id_transaksi 
    AND (a.status_invoice = 'belum proses' AND b.tgl_penagihan = CURDATE())");
    $countInvoice = mysqli_num_rows($queryInvoice);

    $queryTransaksi = mysqli_query($con,"SELECT * FROM transaksi_penembakan");
    $countTransaksi = mysqli_num_rows($queryTransaksi);

    $queryPelanggan = mysqli_query($con,"SELECT * FROM data_pelanggan");
    $countPelanggan = mysqli_num_rows($queryPelanggan);

    $queryKonfirmasi = mysqli_query($con,"SELECT * FROM setoran_sales WHERE keterangan='belum konfirmasi' AND tgl_setoran = CURDATE()");
    $countKonfirmasi = mysqli_num_rows($queryKonfirmasi);
  }else{
    $queryInvoice = mysqli_query($con,"SELECT a.status_invoice, b.tgl_penagihan 
    FROM invoice_tagihan a, transaksi_penembakan b 
    WHERE a.id_transaksi = b.id_transaksi 
    AND (a.status_invoice = 'belum proses' AND b.tgl_penagihan = CURDATE()) AND a.id_users = '$id'");
    $countInvoice = mysqli_num_rows($queryInvoice);

    $queryTransaksi = mysqli_query($con,"SELECT * FROM transaksi_penembakan WHERE id_users='$id' AND status_lunas='0'");
    $countTransaksi = mysqli_num_rows($queryTransaksi);

    $queryPelanggan = mysqli_query($con,"SELECT * FROM data_pelanggan WHERE id_users='$id'");
    $countPelanggan = mysqli_num_rows($queryPelanggan);

    $querySetoran = mysqli_query($con,"SELECT * FROM setoran_sales WHERE keterangan='pending' AND tgl_setoran = CURDATE() AND id_users = '$id'");
    $countKonfirmasi = mysqli_num_rows($querySetoran);
  }
  $result3 = mysqli_query($con,"SELECT SUM(a.total) total, b.nama_depan FROM transaksi_penembakan a, users b WHERE a.id_users = b.id_users AND status_lunas = '0' GROUP BY a.id_users");
  $result4 = mysqli_query($con,"SELECT SUM(a.total) total, b.nama_depan FROM transaksi_penembakan a, users b WHERE a.id_users = b.id_users AND status_lunas = '0' GROUP BY a.id_users");
  $page = 'dashboard';
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard Aplikasi Tagihan Pulsa Masika Reload
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
  <?php
    include("../includes/css.php");
  ?>
  <style>
    @media(max-width:720px){
      .oke{
        display:none;
      }
    }
  </style>
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
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats shadow">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">INVOICE TAGIHAN</p>
                      <p class="card-title"><?= $countInvoice; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total Invoice Tagihan
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats shadow">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-paper text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">TRANSAKSI</p>
                      <p class="card-title"><?= $countTransaksi; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total Transaksi
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats shadow">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-circle-10 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">PELANGGAN</p>
                      <p class="card-title"><?= $countPelanggan; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total Pelanggan
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats shadow ">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-bell-55 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">
                        <?php if($rolle == 'admin'){ ?>
                        KONF SETORAN
                        <?php }else{ ?>
                        SETORAN
                        <?php } ?>
                      </p>
                      <p class="card-title"><?= $countKonfirmasi; ?><p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Total Inbox
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row oke">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-header ">
                <h5 class="card-title">Data Transaksi Sales</h5>
              </div>
              <div class="card-body pb-5">
                <div id="canvas-holder" style="width:100%">
                  <canvas id="canvas" height="90px"></canvas>
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
  <script>
    var nama_sales = [<?php while ($nama_sales = mysqli_fetch_assoc($result3)) { echo '"' . $nama_sales['nama_depan'] . '",';}?>];
    var transaksi = [<?php while ($transaksi = mysqli_fetch_assoc($result4)) { echo '"' . $transaksi['total'] . '",';}?>];
    var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		var config = {
			type: 'line',
			data: {
				labels: nama_sales,
				datasets: [{
          label: 'Rp ',
          animation: {
						y: {
							duration: 2000,
							delay: 100
						}
					},
					backgroundColor: window.chartColors.red,
          borderColor: window.chartColors.red,
          pointRadius: 10,
					pointHoverRadius: 15,
					data: transaksi,
          fill: false,
          borderDash: [5, 5]
				}]
			},
			options: {
        animation: {
					y: {
						easing: 'easeInOutElastic',
						from: 0
					}
				},
        legend: {
            display: false
        },
				responsive: true,
				title: {
					display: true,
					text: 'Total Transaksi Sales'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					x: {
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Nama Sales'
						}
					},
					y: {
            min:100000,
            display: true,
            ticks: {
							callback: function(tick) {
								return 'Rp '+tick.toString();
							}
						},
						scaleLabel: {
							display: true,
							labelString: 'Total Transaksi'
						}
					}
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myLine = new Chart(ctx, config);
		};
  </script>
</body>

</html>