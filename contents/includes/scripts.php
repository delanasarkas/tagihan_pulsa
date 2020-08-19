<!--   Core JS Files   -->
<script src="../../assets/dashboard/js/datatables/jquery.js"></script>
<script src="../../assets/dashboard/js/core/popper.min.js"></script>
<script src="../../assets/dashboard/js/core/bootstrap.min.js"></script>
<script src="../../assets/dashboard/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="../../assets/dashboard/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../../assets/dashboard/js/plugins/bootstrap-notify.js"></script>
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="../../assets/dashboard/demo/demo.js"></script>
<!-- Datatable -->
<script src="../../assets/dashboard/js/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.rowReorder.min.js"></script>
<script src="../../assets/dashboard/js/datatables/dataTables.responsive.min.js"></script>
<script src="../../assets/dashboard/js/datatables/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="../../assets/dashboard/js/select2/select2.min.js"></script>
<!-- jquery mask -->
<script src="../../assets/dashboard/js/jquery-mask.js"></script>
<script src="../../assets/dashboard/js/terbilang.js"></script>
<!-- chart -->
<script src="../../assets/dashboard/js/chartjs/chart.min.js"></script>
<script src="../../assets/dashboard/js/chartjs/utils.js"></script>
<script>
  $(document).ready(function () {
    var table = $('#example').DataTable({
      responsive: true,
      "scrollX": true,
      language: {
        search: "<i class='fas fa-search'></i>",
        searchPlaceholder: "Cari Data"
      }
    });
  });
</script>
<!-- ------------------------------------------------------------------------------------------ -->
<script>
  $(document).ready(function () {
    // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
    demo.initChartsPages();
  });
</script>
<!-- tooltip -->
<script>
  $(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>
<!-- get tanggal -->
<script>
  $(document).ready(function () {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;

    document.getElementById("tanggalpenembakan").value = today;
    // document.getElementById("tanggalpenagihan").value = tomorrow;
  });
</script>
<script>
  $(document).ready(function () {
    var tommorow = new Date();
    var dd = String(tommorow.getDate()+3).padStart(2, '0');
    var mm = String(tommorow.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = tommorow.getFullYear();

    tommorow = mm + '/' + dd + '/' + yyyy;

    document.getElementById("tanggalpenagihan").value = tommorow;
    // document.getElementById("tanggalpenagihan").value = tomorrow;
  });
</script>
<script>
  $(':input[readonly]').css({
    'background-color': 'white'
  });
</script>
<!-- generate penembakan -->
<script>
  function generate() {
    String.random = function (length) {
      let radom13chars = function () {
        return Math.random().toString(16).substring(2, 15)
      }
      let loops = Math.ceil(length / 13)
      return new Array(loops).fill(radom13chars).reduce((string, func) => {
        return string + func()
      }, '').substring(0, length)
    }

    document.getElementById("kodepenembakan").value = String.random(7);
    document.getElementById("kodepenembakan").classList.remove("is-invalid");
    document.getElementById("kodepenembakan").classList.add("is-valid");
    document.getElementById("feedbackpenembakan").classList.remove("invalid-feedback");
    document.getElementById("feedbackpenembakan").classList.add("valid-feedback");
    document.getElementById("feedbackpenembakan").innerHTML = "Kode sudah digenerate";
  }
</script>
<!-- select2 fungsi -->
<script>
  $("#single").select2({
    theme: "bootstrap"
  });
</script>
<script>
  $("#single2").select2({
    theme: "bootstrap"
  });
</script>
<!-- rupiah -->
<script>
  function inputTerbilang() {
    // Format mata uang.
    $('.rupiah').mask('0.000.000.000', {
      reverse: true
    });
    var input = document.getElementById("jumlahtransaksipenembakan").value.replace(/\./g, "");
    //menampilkan hasil dari terbilang
    document.getElementById("terbilang").innerHTML = terbilang(input).replace(/  +/g, ' ');
  }
</script>

<!-- chart pie -->
<script>
		var randomScalingFactor = function() {
			return Math.round(Math.random() * 100);
		};

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor(),
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Red',
					'Orange',
					'Yellow',
					'Green',
					'Blue'
				]
			},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

	</script>